<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Enquiry;
use App\Models\OrdersTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\EnquiryProducts;
use Illuminate\Support\Facades\Auth;

class EnquiryOrdersController extends Controller
{
    //
    public function showOrders()
    {
        $orders = Enquiry::with('customer')->orderBy('id', 'desc')->get();
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
        $lastEnquiry = Enquiry::orderBy('id', 'desc')->first();
        $nextEnquiryId = $lastEnquiry ? $lastEnquiry->enquiry_id + 1 : 90000;

        foreach ($cartData as $item) {
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

    public function getEnquiriesBetweenDates(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        // Validate input dates
        // if (!$start_date || !$end_date) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Start date and end date are required.',
        //     ], 400);
        // }

        // Validate date format
        // if (!strtotime($start_date) || !strtotime($end_date)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Invalid date format. Please use YYYY-MM-DD.',
        //     ], 400); 
        // }

        // Ensure start date is not greater than end date
        if ($start_date > $end_date) {
            return response()->json([
                'status' => false,
                'message' => 'Start date cannot be greater than end date.',
            ], 400);
        }


        // Fetch enquiries
        $query = Enquiry::with('customer');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $start_date = Carbon::parse($request->start_date)->startOfDay(); // Sets time to 00:00:00
            $end_date = Carbon::parse($request->end_date)->endOfDay(); // Sets time to 23:59:59

            $query->whereBetween('updated_at', [$start_date, $end_date]);
        }

        $enquiries = $query->orderBy('id', 'desc')->paginate(10);

        // Check if any records exist
        if ($enquiries->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No enquiries found for the given date range.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully.',
            'data' => $enquiries,
        ], 200);
    }
}
