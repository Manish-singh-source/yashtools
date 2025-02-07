<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
