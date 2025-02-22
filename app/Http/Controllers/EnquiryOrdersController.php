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
        $order = Enquiry::with('customer')->with('products.product')->where('id', $id)->first();
        $invoiceDetails = OrdersTrack::where('id', $invoice_id)->first();
        $invoice = OrdersTrack::where('enquiry_id', $order->enquiry_id)->first();
        return view('admin.order-details', compact('order', 'invoice', 'invoiceDetails'));
    }

    public function addEnquiry(Request $request)
    {
        $lastEnquiry = Enquiry::orderBy('id', 'desc')->first();
        $nextEnquiryId = $lastEnquiry ? $lastEnquiry->enquiry_id + 1 : 90000; // Default to 1 if no records exist
        $partNumber = $request->partNumber;

        if ($partNumber == 'Select Part Number') {
            $partNumber = null;
        }

        $enquiry = new Enquiry();
        $enquiry->customer_id = $request->userId;
        $enquiry->enquiry_id = $nextEnquiryId;
        $enquiry->quantity = $request->enquiryQuantity;
        $enquiry->part_number = $partNumber;
        $enquiry->save();

        $enquiry_product = new EnquiryProducts();
        $enquiry_product->enquiry_id = $enquiry->id;
        $enquiry_product->product_id = $request->productId;
        $enquiry_product->save();

        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $request->productId)->first();
        if ($cartItem) {
            $cartItem->delete();
        }

        if ($enquiry_product) {
            flash()->success('Your Enquiry Successfull.');
            return response()->json([
                'status' => true,
                'message' =>  'Your Enquiry Successfull',
            ]);
        }

        flash()->error('Your Enquiry Failed.');
        return response()->json([
            'status' => false,
            'error' => 'Your Enquiry Failed',
        ]);
    }
}
