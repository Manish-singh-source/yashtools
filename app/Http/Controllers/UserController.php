<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\UserDetail;
use App\Models\Userdetails;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function signinView() {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        return view('user.signin', compact('categories', 'brands', 'subcategories'));
    }

    public function signupView() {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        return view('user.signup', compact('categories', 'brands', 'subcategories'));
    }
 
    public function registerData(Request $request)
    {
        $validations = Validator::make($request->all(), [
            "company_name" => "required",
            "fullname" => "required",
            "email" => "required|email|unique:users,email",
            "company_address" => "required",
            "mobile_number" => "required|digits:10",
            "gstin" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "pin_code" => "required|digits:6",
            "password" => "required|confirmed|min:6",
            "password_confirmation" => "required",
        ]);


        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->password = $request->password;
        $user->save();


        $userDetail = new UserDetail();
        $userDetail->user_id = $user->id;
        $userDetail->company_name = $request->company_name;
        $userDetail->company_address = $request->company_address;
        $userDetail->city = $request->city;
        $userDetail->state = $request->state;
        $userDetail->country = $request->country;
        $userDetail->pincode = $request->pin_code;
        $userDetail->gstin = $request->gstin;
        $userDetail->save();

        return redirect()->route('signin');
    }

    public function  authUser(Request $request)
    {
        $validations = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:6",
        ]);
        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Please check your credentials.');
    }


    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('user.signin');
    }


    // Admin registraion 
    public function registerAdminData(Request $request)
    {
        $validations = Validator::make($request->all(), [
            "username" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 'admin';
        $user->save();

        return redirect()->route('admin.signin');
    }

    public function authAdmin(Request $request)
    {
        $validations = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Please check your credentials.');
    }


    public function logout()
    {
        if (Auth::user()->role === 'superadmin') {
            Auth::logout();
            return redirect()->route('admin.signin');
        } else if (Auth::user()->role === 'admin') {
            Auth::logout();
            return redirect()->route('admin.signin');
        } else if (Auth::user()->role === 'customer') {
            Auth::logout();
            return redirect()->route('signin');
        }
    }
}
