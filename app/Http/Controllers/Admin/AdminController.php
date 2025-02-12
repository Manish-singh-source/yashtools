<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            "profile" => "image",
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
        if (!empty($user->events_image)) {
            File::delete(public_path('/uploads/profile/' . $user->profile));
        }
        $user->delete();

        if ($user) {
            return back()->with('success', 'Successfully Deleted Banner Image');
        }

        return back()->with('error', 'Please Try Again.');
    }
}
