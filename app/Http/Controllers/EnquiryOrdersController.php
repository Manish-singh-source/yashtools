<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Cart;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Product;
use App\Mail\adminEnquiry;
use App\Models\OrdersTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\EnquiryProducts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Notifications\EnquiryNotification;

class EnquiryOrdersController extends Controller
{
    //
    public function showOrders(Request $request)
    {
        // Build base query with filters
        $baseQuery = Enquiry::query();

        if ($request->filled('startDate') && $request->filled('endDate')) {
            $start_date = Carbon::parse($request->startDate)->startOfDay(); // Sets time to 00:00:00
            $end_date = Carbon::parse($request->endDate)->endOfDay(); // Sets time to 23:59:59

            $baseQuery->whereBetween('updated_at', [$start_date, $end_date]); // Use parsed Carbon objects
        }

        // Ensure customer is not soft deleted
        $baseQuery->whereHas('customer', function ($q) {
            $q->whereNull('deleted_at');
        });

        // Build a distinct enquiry_id collection (one entry per enquiry_id)
        $distinctQuery = (clone $baseQuery)
            ->selectRaw('enquiry_id, MIN(id) as min_id, MAX(updated_at) as max_updated_at')
            ->groupBy('enquiry_id')
            ->orderBy('max_updated_at', 'desc');

        // Get all distinct groups (no pagination) so DataTables can do client-side paging
        $unique = $distinctQuery->get();

        // Load all Enquiry records that belong to these enquiry_id groups
        $enquiryIds = collect($unique)->pluck('enquiry_id')->toArray();

        $groups = Enquiry::whereIn('enquiry_id', $enquiryIds)
            ->with('customer', 'notificationsMorph')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->groupBy('enquiry_id');

        // For each distinct group, pick a summary (latest) model and attach group_records (all records)
        $grouped = collect($unique)->map(function ($item) use ($groups) {
            $id = $item->enquiry_id;
            $records = $groups[$id] ?? collect();
            $summary = $records->first();
            if (!$summary) {
                $summary = Enquiry::where('enquiry_id', $id)->with('customer', 'notificationsMorph')->first();
            }
            // Attach the group's records so views can render full details if needed
            $summary->group_records = $records->values();
            return $summary;
        });

        $orders = $grouped->values();
        return view('admin.order', compact('orders'));
    }



    public function showOrderDetails($id, $invoice_id = null)
    {
        $order = Enquiry::with('statusMorph')->with('customer')->with('enquiries')->with('products.product')->where('enquiry_id', $id)->get();
        $invoiceDetails = OrdersTrack::where('id', $invoice_id)->first();
        // fetch product detail using order tracks table
        $invoice = OrdersTrack::with('orders.products.product')->where('enquiry_id', $id)->first();
        $poInfo = Po::where('enquiry_id', $id)->first();
        return view('admin.order-details', compact('order', 'invoice', 'invoiceDetails', 'poInfo'));
    }

    public function addEnquiry(Request $request)
    {
        $cartData = $request->cartData; // Expecting an array of cart items

        $prefix = "YASH";
        $lastEnquiry = Enquiry::orderBy('id', 'desc')->first();

        if ($lastEnquiry && preg_match('/YASH(\d{3})$/', $lastEnquiry->enquiry_id, $matches)) {
            // Continue numbering from last 3-digit ID
            $lastNumber = (int) $matches[1];
            $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            // Start fresh from 001
            $nextNumber = "001";
        }

        $enquiryID = $prefix . $nextNumber;

        $productIds = [];
        $productQuantities = [];
        foreach ($cartData as $item) {
            // Handle Part Number
            $partNumber = $item['partNumber'] == 'Select Part Number' ? null : $item['partNumber'];

            // Create Enquiry
            $enquiry = Enquiry::create([
                'customer_id' => $item['userId'],
                'enquiry_id' => $enquiryID,
                'quantity' => $item['enquiryQuantity'],
                'part_number' => $partNumber,
                'price' => $item['price'],
                'total_price' => $item['totalPrice'],
                'discount' => $item['discountPercentage'],
                'original_price' => $item['originalPrice'],
            ]);

            // Add Product to EnquiryProducts
            EnquiryProducts::create([
                'enquiry_id' => $enquiry->id,
                'product_id' => $item['productId']
            ]);

            array_push($productIds, $item['productId']);
            array_push($productQuantities, $item['enquiryQuantity']);
            // Remove from Cart
            Cart::where('user_id', Auth::id())->where('product_id', $item['productId'])->delete();
        }

        $productData = Product::whereIn('id', $productIds)->get();
        $user = User::where('id', Auth::id())->first();
        $adminEmail = "sales@yashtools.in";
        $userEmail = $user->email;

        Mail::to($adminEmail)->send(new adminEnquiry($productData, $productQuantities, $enquiryID, $user, $partNumber));
        Mail::to($userEmail)->send(new adminEnquiry($productData, $productQuantities, $enquiryID, $user, $partNumber));

        $orderDetails = [
            'order_id' => $enquiryID, // Random order ID
        ];

        $user->notify(new EnquiryNotification($orderDetails));
        flash()->success('Your order has been successfully submitted.');
        return response()->json([
            'status' => true,
            'message' => 'Your order has been successfully submitted.',
            'partNo' => $partNumber
        ]);
    }

    public function getEnquiriesBetweenDates(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

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
                'message' => 'No orders found for the given date range.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully.',
            'data' => $enquiries,
        ], 200);
    }

    public function productInfo($enquiry_id)
    {
        $user = User::with('userDetail')->where('id', Auth::id())->first();
        $data = Enquiry::with('products.product')->where('enquiry_id', $enquiry_id)->get();
        $invoiceDetails = OrdersTrack::where('enquiry_id', $enquiry_id)->first();
        $poInfo = Po::where('enquiry_id', $enquiry_id)->first();
        return view('user.product-info', compact('data', 'user', 'invoiceDetails', 'poInfo'));
    }

    public function uploadPO(Request $request)
    {

        $validations = Validator::make($request->all(), [
            "po_file" => "mimes:pdf|max:10240",
            'enquiry_id' => 'required',
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $po = new Po();
        $po->po_file = $request->po_file;
        $po->enquiry_id = $request->enquiry_id;

        if (!empty($request->po_file)) {
            if (!empty($banner->po_file)) {
                File::delete(public_path('/uploads/po_file/' . $po->po_file));
            }
            $image = $request->po_file;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/po_file'), $imageName);

            $po->po_file = $imageName;
        }

        $po->save();

        flash()->success('PO Uploaded Successfully.');
        return redirect()->route('product.info', $request->enquiry_id);
    }
}
