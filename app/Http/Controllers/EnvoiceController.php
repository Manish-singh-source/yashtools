<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\OrdersTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class EnvoiceController extends Controller
{
    public function addInvoice(Request $request)
    {
        // Validate the request
        $validations = Validator::make($request->all(), [
            'enquiry_id' => 'required',
            'courier_name' => 'required',
            'courier_number' => 'required|alpha_num',
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
            'courier_number' => 'required|alpha_num',
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
        // Base query for this customer
        $baseQuery = Enquiry::where('customer_id', Auth::id());

        // Filter by date range
        if ($request->filled('fromDate') && $request->filled('toDate')) {
            $fromDate = Carbon::parse($request->fromDate)->startOfDay();
            $toDate = Carbon::parse($request->toDate)->endOfDay();

            $baseQuery->whereBetween('created_at', [$fromDate, $toDate]);
        }

        // Build grouped query to get distinct enquiry_ids (and a representative min id)
        $grouped = (clone $baseQuery)
            ->selectRaw('enquiry_id, MIN(id) as min_id, MAX(created_at) as max_created_at')
            ->groupBy('enquiry_id');

        // Sort group results
        if ($request->filled('sort_by')) {
            $sortBy = in_array($request->sort_by, ['asc', 'desc']) ? $request->sort_by : 'desc';
            $grouped->orderBy('enquiry_id', $sortBy);
        } else {
            $grouped->orderBy('max_created_at', 'desc');
        }

        // Get all grouped results (representative rows) so client-side can paginate
        $groups = $grouped->get();

        // Fetch full Enquiry models for the representative ids and preserve order
        $minIds = collect($groups)->pluck('min_id')->toArray();

        $models = Enquiry::whereIn('id', $minIds)
            ->with(['invoice', 'products.product'])
            ->get()
            ->keyBy('id');

        $items = collect($groups)->map(function ($g) use ($models) {
            return $models[$g->min_id] ?? Enquiry::where('enquiry_id', $g->enquiry_id)
                ->with(['invoice', 'products.product'])->first();
        })->values();

        return response()->json(['data' => $items, 'total' => $items->count()]);
    }

    public function enquiriesList(Request $request)
    {
        // Base query for this customer's enquiries with specific statuses
        $baseQuery = Enquiry::whereIn('status', ['pending', 'confirmed'])->where('customer_id', Auth::id());

        if ($request->filled('fromDate') && $request->filled('toDate')) {
            $fromDate = Carbon::parse($request->fromDate)->startOfDay(); // Sets time to 00:00:00
            $toDate = Carbon::parse($request->toDate)->endOfDay(); // Sets time to 23:59:59

            $baseQuery->whereBetween('created_at', [$fromDate, $toDate]);
        }

        // Group by enquiry_id and get representative min id
        $grouped = (clone $baseQuery)
            ->selectRaw('enquiry_id, MIN(id) as min_id, MAX(created_at) as max_created_at')
            ->groupBy('enquiry_id');

        // Sort groups
        if ($request->filled('sort_by')) {
            $sortBy = in_array($request->sort_by, ['asc', 'desc']) ? $request->sort_by : 'desc';
            $grouped->orderBy('enquiry_id', $sortBy);
        } else {
            $grouped->orderBy('max_created_at', 'desc');
        }

        $groups = $grouped->get();

        $minIds = collect($groups)->pluck('min_id')->toArray();

        $models = Enquiry::whereIn('id', $minIds)
            ->with(['invoice', 'products.product'])
            ->get()
            ->keyBy('id');

        $items = collect($groups)->map(function ($g) use ($models) {
            return $models[$g->min_id] ?? Enquiry::where('enquiry_id', $g->enquiry_id)
                ->with(['invoice', 'products.product'])->first();
        })->values();

        return response()->json(['data' => $items, 'total' => $items->count()]);
    }
}
