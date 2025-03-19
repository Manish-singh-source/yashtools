<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Enquiry;
use App\Mail\AdminCreation;
use Illuminate\Http\Request;
use App\Models\EnquiryProducts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function viewDashboard()
    {
        $totalCustomers = User::where('role', 'customer')->count();
        $totalEnquiries = Enquiry::count();
        $totalOrders = EnquiryProducts::whereHas('enquiry', function ($query) {
            $query->where('status', 'payment_received');
        })->count();
        return view('admin.index', compact('totalCustomers', 'totalEnquiries', 'totalOrders'));
    }

    public function getChartData(Request $request)
    {

        $customersCountOfMonthlyChart = User::where('role', 'customer')
            ->join('user_details', 'user_details.user_id', '=', 'users.id') // Join with user_details
            ->selectRaw('YEAR(users.created_at) as year, MONTH(users.created_at) as month, COUNT(*) as count')
            ->whereYear('users.created_at', $request->year) // Filter users created in the requested year
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc');

        if ($request->state != 'all') {
            $customersCountOfMonthlyChart->where('user_details.state', $request->state);
        }

        $customersCountOfMonthlyChart = $customersCountOfMonthlyChart->orderBy('month', 'asc')->get();


        // Enquiries count details
        $EnqueriesCountOfMonthlyChart = Enquiry::whereYear('enquiries.created_at', $request->year)
            ->join('user_details', 'user_details.user_id', '=', 'enquiries.customer_id')
            ->selectRaw('YEAR(enquiries.created_at) as year, MONTH(enquiries.created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc');

        if ($request->state != 'all') {
            $EnqueriesCountOfMonthlyChart->where('user_details.state', $request->state);
        }

        // Fixing the whereIn condition to avoid incorrect grouping
        $EnqueriesCountOfMonthlyChart = $EnqueriesCountOfMonthlyChart
            ->whereIn('enquiries.customer_id', function ($query) {
                $query->selectRaw('MIN(customer_id)') // Assuming unique customers per enquiry
                    ->from('enquiries')
                    ->groupBy('customer_id');
            })
            ->orderBy('month', 'asc')
            ->get();


        // Enquiries fulfilled count 
        $enquiriesFulfilledCount = Enquiry::whereYear('enquiries.created_at', $request->year)
            ->join('user_details', 'user_details.user_id', '=', 'enquiries.customer_id')
            ->where('status', '=', 'payment_received') // Moved before orderBy()
            ->selectRaw('YEAR(enquiries.created_at) as year, MONTH(enquiries.created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc');

        if ($request->state != 'all') {
            $enquiriesFulfilledCount->where('user_details.state', $request->state);
        }

        // Fixed the `whereIn` condition to avoid incorrect grouping
        $enquiriesFulfilledCount = $enquiriesFulfilledCount
            ->whereIn('enquiries.customer_id', function ($query) {
                $query->selectRaw('MIN(customer_id)') // Assuming unique customers per enquiry
                    ->from('enquiries')
                    ->groupBy('customer_id');
            })
            ->orderBy('month', 'asc')
            ->get();


        // Initialize the array with all months set to 0 count
        $monthlyUserCounts = array_fill(0, 12, ['year' => $request->year, 'month' => 0, 'count' => 0]);
        $monthlyEnquiryCounts = array_fill(0, 12, ['year' => $request->year, 'month' => 0, 'count' => 0]);
        $monthlyEnquiryFulfilledCounts = array_fill(0, 12, ['year' => $request->year, 'month' => 0, 'count' => 0]);

        // Loop through each record and update the count for the corresponding month
        foreach ($customersCountOfMonthlyChart as $record) {
            $monthIndex = $record->month - 1; // Since month starts from 1 (January), we subtract 1 for 0-based index
            $monthlyUserCounts[$monthIndex] = [
                'year'  => $record->year,
                'month' => $record->month,
                'count' => $record->count
            ];
        }

        foreach ($EnqueriesCountOfMonthlyChart as $record) {
            $monthIndex = $record->month - 1; // Since month starts from 1 (January), we subtract 1 for 0-based index
            $monthlyEnquiryCounts[$monthIndex] = [
                'year'  => $record->year,
                'month' => $record->month,
                'count' => $record->count
            ];
        }

        foreach ($enquiriesFulfilledCount as $record) {
            $monthIndex = $record->month - 1; // Since month starts from 1 (January), we subtract 1 for 0-based index
            $monthlyEnquiryFulfilledCounts[$monthIndex] = [
                'year'  => $record->year,
                'month' => $record->month,
                'count' => $record->count
            ];
        }

        if (!$monthlyUserCounts) {
            return response()->json([
                'status' => false,
                'message' => 'No data found.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $monthlyUserCounts,
            'enquiry' => $monthlyEnquiryCounts,
            'enquiryFulfilled' => $monthlyEnquiryFulfilledCounts,
            'message' => 'Status Changed successfully.',
        ], 200);
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

        // Fetch all notifications 
        $notifications = DB::table('notifications')
            ->join('users', 'users.id', '=', 'notifications.notifiable_id')
            ->select('users.fullname', 'users.email', 'notifications.id', 'notifications.data', 'notifications.created_at')
            ->where('notifications.read_at', '=', null)
            ->orderBy('notifications.created_at', 'desc')
            ->latest()->take(3)->get();

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

        // Send E-mail on Creating an Admin
        Mail::to($request->email)->send(new AdminCreation($request->fullname, $request->email, $request->mobile_number, $request->password, 'admin'));

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
            return back()->with('success', 'Successfully Deleted Admin');
        }

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
