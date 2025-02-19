<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\OrderTrack;
use App\Models\OrdersTrack;
use Illuminate\Http\Request;
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
            $image2->move(public_path('uploads/invoices/'), $imageName2);
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
            $image2->move(public_path('uploads/invoices/'), $imageName2);
            $invoice->invoice_file = $imageName2;
        }
        $invoice->save();

        flash()->success('Invoice Details Updated Successfully.');
        return redirect()->route('admin.order');
    }


    public function ordersList(Request $request)
    {

        $query = Enquiry::where('customer_id', Auth::id())->with('invoice');

        // Apply sorting
        $sortBy = in_array($request->sort_by, ['asc', 'desc']) ? $request->sort_by : 'desc';
        $query->orderBy('updated_at', $sortBy);

        // Fetch paginated data (5 records per page)
        $products = $query->paginate(5);

        // Return JSON response
        return response()->json($products);
    }
}
