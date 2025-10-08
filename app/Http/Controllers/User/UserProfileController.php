<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Enquiry;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function userProfile()
    {
        $user = User::with('userDetail')->where('id', Auth::id())->first();
        $orders = Enquiry::where('customer_id', $user->id)->with('invoice')->distinct('enquiry_id')->get();
        return view('user.mainorder', compact('user', 'orders'));
    }

    public function updateProfile(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'userId' => 'required',
            'fullname' => 'nullable',
            "email" => "nullable|email|unique:users,email," . $request->userId . ",id",
            "company_name" => "nullable",
            "company_address" => "nullable",
            "mobile_number" => "nullable",
            "gstin" => "nullable",
            "city" => "nullable",
            "state" => "nullable",
            "country" => "nullable",
            "pin_code" => "nullable",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $userDetail = User::find($request->userId);
        $userDetail->fullname = $request->fullname;
        $userDetail->username = $request->username;
        $userDetail->email = $request->email;
        $userDetail->mobile_number = $request->mobile_number;
        $userDetail->save();

        $userContactDetail = UserDetail::where('user_id', $userDetail->id)->first();
        $userContactDetail->company_name = $request->company_name;
        $userContactDetail->company_address = $request->company_address;
        $userContactDetail->gstin = $request->gstin;
        $userContactDetail->city = $request->city;
        $userContactDetail->state = $request->state;
        $userContactDetail->country = $request->country;
        $userContactDetail->pincode = $request->pin_code;
        $userContactDetail->save();

        return redirect()->route('user.account');
    }
}
