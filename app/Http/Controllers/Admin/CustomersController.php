<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    public function customersList()
    {
        $customers = User::with('userDetail')->where('role', 'customer')->get();
        // dd($customers);
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
        $customerDetail = User::with('userDetail')->where('role', 'customer')->find($id);
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

        $user->userDetail->company_name = $request->company_name;
        $user->userDetail->company_address = $request->company_address;
        $user->userDetail->city = $request->city;
        $user->userDetail->state = $request->state;
        $user->userDetail->country = $request->country;
        $user->userDetail->pincode = $request->pin_code;
        $user->userDetail->gstin = $request->gstin;
        $user->userDetail->save();

        if ($user) {
            return redirect()->route('admin.customers.list');
        }
    }
}
