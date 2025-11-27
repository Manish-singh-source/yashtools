<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\OrdersTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EnvoiceController extends Controller
{
    public function addInvoice(Request $request)
    {
        // Validate the request
        $validations = Validator::make($request->all(), [
            'enquiry_id' => 'required',
            'courier_name' => 'required',
            'courier_number' => 'required|numeric',
            'courier_website' => 'required',
            'invoice_file' => 'required|mimes:pdf|max:10240',
        ]);

        // Check validation errors
        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        // Create new product
        $invoice = new OrdersTrack();
        $invoice->enquiry_id = $request->enquiry_id;
        $invoice->courier_name = $request->courier_name;
        $invoice->courier_number = $request->courier_number;
        $invoice->courier_website = $request->courier_website;

        // Handle PDF upload
        if (!empty($request->invoice_file)) {
            $image2 = $request->invoice_file;
            $ext2 = $image2->getClientOriginalExtension();
            $imageName2 = time() . "." . $ext2;
            $image2->move(public_path('/uploads/invoices/'), $imageName2);
            $invoice->invoice_file = $imageName2;
        }
        $invoice->save();

        flash()->success('Invoice Details Added Successfully.');
        return redirect()->route('admin.order');
    }

    public function updateInvoice(Request $request)
    {
        // Validate the request
        $validations = Validator::make($request->all(), [
            'invoice_id' => 'required',
            'enquiry_id' => 'required',
            'courier_name' => 'required',
            'courier_number' => 'required|numeric',
            'courier_website' => 'required',
            'invoice_file' => 'mimes:pdf|max:10240',
        ]);

        // Check validation errors
        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        // Create new product
        $invoice = OrdersTrack::find($request->invoice_id);
        $invoice->enquiry_id = $request->enquiry_id;
        $invoice->courier_name = $request->courier_name;
        $invoice->courier_number = $request->courier_number;
        $invoice->courier_website = $request->courier_website;

        // Handle PDF upload
        if (!empty($request->invoice_file)) {
            $image2 = $request->invoice_file;
            $ext2 = $image2->getClientOriginalExtension();
            $imageName2 = time() . "." . $ext2;
            $image2->move(public_path('/uploads/invoices/'), $imageName2);
            $invoice->invoice_file = $imageName2;
        }
        $invoice->save();

        flash()->success('Invoice Details Updated Successfully.');
        return redirect()->route('admin.order');
    }


    public function ordersList(Request $request)
    {

        // $query = Enquiry::whereIn('status', ['pending', 'confirmed'])->where('customer_id', Auth::id())->with('invoice')->with('products.product');
        $query = Enquiry::where('customer_id', Auth::id())->with('invoice')->with('products.product');

        if ($request->filled('fromDate') && $request->filled('toDate')) {
            $fromDate = Carbon::parse($request->fromDate)->startOfDay(); // Sets time to 00:00:00
            $toDate = Carbon::parse($request->toDate)->endOfDay(); // Sets time to 23:59:59

            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }

        $sortBy = in_array($request->sort_by, ['asc', 'desc']) ? $request->sort_by : 'desc';
        $query->orderBy('updated_at', $sortBy);
        $products = $query->whereIn('id', function ($query) {
            $query->selectRaw('MIN(id)')
                ->from('enquiries')
                ->groupBy('enquiry_id');
        })
            ->orderBy('id', 'desc')->paginate(5);

        return response()->json($products);
    }
    public function enquiriesList(Request $request)
    {

        $query = Enquiry::whereIn('status', ['pending', 'confirmed'])->where('customer_id', Auth::id())->with('invoice')->with('products.product');

        if ($request->filled('fromDate') && $request->filled('toDate')) {
            $fromDate = Carbon::parse($request->fromDate)->startOfDay(); // Sets time to 00:00:00
            $toDate = Carbon::parse($request->toDate)->endOfDay(); // Sets time to 23:59:59

            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }

        $sortBy = in_array($request->sort_by, ['asc', 'desc']) ? $request->sort_by : 'desc';
        $query->orderBy('updated_at', $sortBy);
        $products = $query->whereIn('id', function ($query) {
            $query->selectRaw('MIN(id)')
                ->from('enquiries')
                ->groupBy('enquiry_id');
        })->orderBy('id', 'desc')->paginate(5);

        return response()->json($requst->all());
    }
}
