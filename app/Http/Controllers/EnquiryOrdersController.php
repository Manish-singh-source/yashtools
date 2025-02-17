<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryOrdersController extends Controller
{
    //
    public function showOrders()
    {
        $orders = Enquiry::with('customer')->get();
        return view('admin.order', compact('orders'));
    }

    public function showOrderDetails($id) {
        $order = Enquiry::with('customer')->with('products.product')->where('id', $id)->first();
        return view('admin.order-details', compact('order'));
    }
}
