<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function viewDashboard()
    {
        $totalCustomers = User::where('role', 'customer')->count();
        return view('admin.index', compact('totalCustomers'));
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
            return back()->with('success', 'Successfully Deleted Banner Image');
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
            "fullname" => "required",
            "username" => "required",
            "mobile_number" => "required|digits:10",
            'profileImage' => 'image',
            "email" => "required|email",
        ];

        $validations = Validator::make($request->all(), $rules);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $user = User::find($request->userId);
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->mobile_number = $request->mobile_number;
        $user->email = $request->email;

        if (!empty($user->profile)) {
            File::delete(public_path('/uploads/profile/' . $user->profile));
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
            return redirect()->route('admin.dashboard');
        }
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

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Please enter correct password');
    }
}
