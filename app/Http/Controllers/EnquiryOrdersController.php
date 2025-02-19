<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\OrdersTrack;
use Illuminate\Http\Request;

class EnquiryOrdersController extends Controller
{
    //
    public function showOrders()
    {
        $orders = Enquiry::with('customer')->get();
        return view('admin.order', compact('orders'));
    }

    public function showOrderDetails($id, $invoice_id = null)
    {
        $order = Enquiry::with('customer')->with('products.product')->where('id', $id)->first();
        $invoiceDetails = OrdersTrack::where('id', $invoice_id)->first();
        $invoice = OrdersTrack::where('enquiry_id', $order->enquiry_id)->first();
        return view('admin.order-details', compact('order', 'invoice', 'invoiceDetails'));
    }


}
