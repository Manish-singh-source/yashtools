<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\OrdersTrack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function userProfile()
    {
        $user = User::with('userDetail')->where('id', Auth::id())->first();
        $orders = Enquiry::where('customer_id', $user->id)->with('invoice')->distinct('enquiry_id')->get();
        // dd($orders);
        return view('user.mainorder', compact('user', 'orders'));
    }

    public function updateProfile(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'userId' => 'required',
            'fullname' => 'required',
            "email" => "required|email",
            "company_name" => "required",
            "company_address" => "required",
            "mobile_number" => "required",
            "gstin" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "pin_code" => "required",
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
