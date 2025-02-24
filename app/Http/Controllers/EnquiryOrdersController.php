<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Enquiry;
use App\Models\OrdersTrack;
use Illuminate\Http\Request;
use App\Models\EnquiryProducts;
use Illuminate\Support\Facades\Auth;

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
        $order = Enquiry::with('customer')->with('enquiries')->with('products.product')->where('id', $id)->first();
        $invoiceDetails = OrdersTrack::where('id', $invoice_id)->first();
        $invoice = OrdersTrack::where('enquiry_id', $order->enquiry_id)->first();
        // dd($order);
        return view('admin.order-details', compact('order', 'invoice', 'invoiceDetails'));
    }

    public function addEnquiry(Request $request)
    {
        $cartData = $request->cartData; // Expecting an array of cart items

        foreach ($cartData as $item) {
            $lastEnquiry = Enquiry::orderBy('id', 'desc')->first();
            $nextEnquiryId = $lastEnquiry ? $lastEnquiry->enquiry_id + 1 : 90000;

            // Handle Part Number
            $partNumber = $item['partNumber'] == 'Select Part Number' ? null : $item['partNumber'];

            // Create Enquiry
            $enquiry = Enquiry::create([
                'customer_id' => $item['userId'],
                'enquiry_id' => $nextEnquiryId,
                'quantity' => $item['enquiryQuantity'],
                'part_number' => $partNumber
            ]);

            // Add Product to EnquiryProducts
            EnquiryProducts::create([
                'enquiry_id' => $enquiry->id,
                'product_id' => $item['productId']
            ]);

            // Remove from Cart
            Cart::where('user_id', Auth::id())->where('product_id', $item['productId'])->delete();
        }

        return response()->json([
            'status' => true,
            'message' => 'Your enquiry has been successfully submitted.'
        ]);
    }
}
