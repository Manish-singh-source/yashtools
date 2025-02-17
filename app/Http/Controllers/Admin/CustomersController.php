<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Flasher\Prime\FlasherInterface;

class CustomersController extends Controller
{
    public function customersList()
    {
        $customers = User::with('userDetail')->where('role', 'customer')->get();
        return view('admin.customer-list', compact('customers'));
    }

    public function deleteCustomer(Request $request)
    {
        $customer = User::find($request->customerId);
        $customer->delete();

        if ($customer) {
            return back()->with('success', 'Successfully Deleted Customer');
        }
        return back()->with('error', 'Please Try Again.');
    }

    public function customerOverview(String $id)
    {
        $customerDetail = User::with('userDetail')->with('enquiries.products')->where('role', 'customer')->find($id);
        // dd($customerDetail);
        return view('admin.customer-overview', compact('customerDetail'));
    }

    public function editCustomerDetails(String $id)
    {
        $customerDetail = User::with('userDetail')->where('role', 'customer')->find($id);
        return view('admin.edit-customer', compact('customerDetail'));
    }

    public function updateCustomerDetails(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'customer_id' => 'required',
            "company_name" => "required",
            "fullname" => "required",
            "company_address" => "required",
            "mobile_number" => "required|digits:10",
            "gstin" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "pin_code" => "required|digits:6",
            "email" => "required",
        ]);


        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $user = User::find($request->customer_id);
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->save();

        $userdetail = UserDetail::where('user_id', $user->id)->first();
        // dd($userdetail);
        if (isset($userdetail)) {
            $userdetail->company_name = $request->company_name;
            $userdetail->company_address = $request->company_address;
            $userdetail->city = $request->city;
            $userdetail->state = $request->state;
            $userdetail->country = $request->country;
            $userdetail->pincode = $request->pin_code;
            $userdetail->gstin = $request->gstin;
            $userdetail->save();
        } else {
            $userdetail = new UserDetail();
            $userdetail->user_id = $user->id;
            $userdetail->company_name = $request->company_name;
            $userdetail->company_address = $request->company_address;
            $userdetail->city = $request->city;
            $userdetail->state = $request->state;
            $userdetail->country = $request->country;
            $userdetail->pincode = $request->pin_code;
            $userdetail->gstin = $request->gstin;
            $userdetail->save();
        }

        if ($user) {
            flash()->success('Customer Details Updated Successfully.');
            return redirect()->route('admin.customers.list');
        }

        return back()->with('error', 'Please Try Again.');
    }
}
