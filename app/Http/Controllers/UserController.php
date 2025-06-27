<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Mail\welcomeemail;
use App\Models\Categories;
use App\Models\UserDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function signinView()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        return view('user.signin', compact('categories', 'brands', 'subcategories'));
    }

    public function signupView()
    {
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
        
        $subject = "Yash Tools Registeration";
        Mail::to($request->email)->send(new welcomeemail($subject, $request->fullname));

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

        $remember = $request->has('remember'); // Check if "Remember Me" is checked

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Please check your credentials.');
    }

    public function updateUserPassword(Request $request)
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
            return redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Please enter correct password');
    }

    public function logout()
    {
        if (Auth::user()->role === 'superadmin') {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('admin.signin');
        } else if (Auth::user()->role === 'admin') {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('admin.signin');
        } else if (Auth::user()->role === 'customer') {
            Auth::logout();
            return redirect()->route('signin');
        }
    }


    public function forgotPassword()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        return view('user.forgot-password', compact('categories', 'brands', 'subcategories'));
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $token = Str::random(64);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['error' => 'Invalid Email Address.']);
        }
        $user->password_reset_token = $token;
        $user->save();

        $mail = Mail::to($request->email)->send(new ResetPasswordMail($token));

        if ($mail) {
            flash()->success('Password reset link sent to email.');
            return redirect()->back()->with('message', 'Password reset link sent to email.');
        } else {
            flash()->error('Something Wrong Happened.');
            return redirect()->back()->with('message', 'Something Wrong Happened.');
        }
    }

    public function resetPassword(Request $request)
    {
        $token = $request->token;
        return view('user.reset-password', compact('token'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        $user = User::where('password_reset_token', $request->token)->first();
        $userRole = $user->role;
        if (!$user) {
            return back()->withErrors(['error' => 'Invalid or expired token.']);
        }

        $user->password = $request->password;
        $user->password_reset_token = null;
        $user->save();

        flash()->success('Password updated successfully! You can now log in.');
        if ($userRole == 'admin' || $userRole == 'superadmin') {
            return redirect()->route('admin.signin')->with('message', 'Password updated successfully! You can now log in.');
        } elseif ($userRole == 'customer') {
            return redirect()->route('signin')->with('message', 'Password updated successfully! You can now log in.');
        }
    }
}
