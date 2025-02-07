<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomersController extends Controller
{
    public function customersList() {
        $customers = User::with('userDetail')->where('role', 'customer')->get();
        return view('admin.customer-list', compact('customers'));
    }
    
}
