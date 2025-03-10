<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Models\EnquiryProducts;
use Illuminate\Support\Facades\DB;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function viewDashboard()
    {
        $totalCustomers = User::where('role', 'customer')->count();
        $totalEnquiries = Enquiry::count();
        $totalOrders = EnquiryProducts::count();
        // $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        // dd($notifications);
        return view('admin.index', compact('totalCustomers', 'totalEnquiries', 'totalOrders'));
    }

    public function markAsRead($id)
    {
        $notification = DB::table('notifications')->where('id', $id)->first();

        if ($notification) {
            DB::table('notifications')->where('id', $id)->update(['read_at' => now()]);
            return response()->json(['success' => true, 'message' => 'Notification marked as read']);
        }

        return response()->json(['success' => false, 'message' => 'Notification not found'], 404);
    }

    public function getNotifications()
    {
        // Get authenticated user
        $user = Auth::user(); // No need to manually query

        // Fetch all notifications (modify if you only want user's notifications)
        // $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('notifications')
            ->join('users', 'users.id', '=', 'notifications.notifiable_id')
            ->select('users.fullname', 'users.email', 'notifications.id', 'notifications.data', 'notifications.created_at')
            ->where('notifications.read_at', '=', null)
            ->orderBy('notifications.created_at', 'desc')
            ->get();

        if ($notifications) {
            return response()->json([
                'status' => true,
                'data' => $notifications,
            ], 200);
        }
    }

    public function viewAdmin()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.multi-admin', compact('admins'));
    }

    public function addAdmin(Request $request)
    {
        $rules = [
            "fullname" => "required",
            "email" => "required|email|unique:users,email",
            "mobile_number" => "required|digits:10",
            "password" => "required|min:6",
            "profile" => "image",
        ];

        $validations = Validator::make($request->all(), $rules);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->password = $request->password;
        $user->role = 'admin';
        if (!empty($request->profile)) {
            $image = $request->profile;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/profile'), $imageName);
            $user->profile = $imageName;
        }
        $user->save();

        flash()->success('New Admin Added Successfully.');
        return redirect()->route('admin.view.multi.admin');
    }


    public function editAdmin(String $id)
    {
        $admin = User::find($id);
        return view('admin.edit-admin', compact('admin'));
    }


    public function updateAdmin(Request $request)
    {
        $rules = [
            'adminId' => 'required',
            "fullname" => "required",
            "email" => "required|email",
            "mobile_number" => "required|digits:10",
            "profileImage" => "image",
        ];

        $validations = Validator::make($request->all(), $rules);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        $user->fullname = $request->fullname;
        $user->mobile_number = $request->mobile_number;
        if (!empty($request->profile)) {
            $image = $request->profile;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/profile'), $imageName);
            $user->profile = $imageName;
        }
        $user->save();

        flash()->success('Admin Details Updated Successfully.');
        return redirect()->route('admin.view.multi.admin');
    }

    public function deleteAdmin(Request $request)
    {
        $user = User::find($request->adminId);
        if (!empty($user->profileImage)) {
            File::delete(public_path('/uploads/profile/' . $user->profileImage));
        }
        $user->delete();

        if ($user) {
            // flash()->success('Successfully Deleted Admin.');
            return back()->with('success', 'Successfully Deleted Admin');
        }

        // flash()->error('Please Try Again.');
        return back()->with('error', 'Please Try Again.');
    }

    public function profileView()
    {
        $user = User::where('id', Auth::id())->first();
        return view('admin.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {

        $rules = [
            'userId' => 'required',
            "mobile_number" => "required|digits:10",
            'profileImage' => 'image',
            "email" => "required|email",
        ];

        $validations = Validator::make($request->all(), $rules);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $user = User::find($request->userId);
        $user->mobile_number = $request->mobile_number;
        $user->email = $request->email;

        if (!empty($user->profile)) {
            File::delete(public_path('/uploads/profile/' . $user->profile));
        }

        if (!empty($request->fullname)) {
            $user->fullname = $request->fullname;
        }

        if (!empty($request->fullname)) {
            $user->username = $request->username;
        }

        if (!empty($request->profileImage)) {
            $image = $request->profileImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/profile'), $imageName);

            $user->profile = $imageName;
        }

        $user->save();

        if ($user) {
            flash()->success('Successfully Updated Profile Details.');
            return redirect()->route('admin.dashboard');
        }

        flash()->error('Something Wrong. Please Try Again.');
    }

    public function updatePassword(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'id' => 'required|numeric',
            "password" => "required|min:6",
            "new_password" => "required|min:6|confirmed",
            "new_password_confirmation" => "required|",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        if (Auth::attempt(['id' => $request->id, 'password' => $request->password])) {

            $user = User::find($request->id);
            $user->password = $request->new_password;
            $user->save();

            Auth::logout();

            flash()->success('Your Password Has Been Updated.');
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Please enter correct password');
    }

    public function adminForgotPassword()
    {
        return view('admin.page-forgot-password');
    }
}
