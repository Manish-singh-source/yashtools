@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <style>
                    .order-tracking .step {
                        display: flex;
                        align-items: center;
                        margin-bottom: 10px;
                    }

                    .order-tracking .step .icon {
                        width: 30px;
                        height: 30px;
                        background-color: #f1f1f1;
                        border-radius: 50%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-right: 10px;
                    }

                    .order-tracking .step .text {
                        flex-grow: 1;
                    }

                    .order-summary .summary-item {
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: 10px;
                    }
                </style>
                <div class="col-md-8">
                    <div class="card h-auto">
                        <div class="card-header">
                            <h5>Order No - <span class="text-primary">{{ $order[0]->enquiry_id }}</span></h5>
                            <span class="float-right text-muted">Estimated delivery:
                                {{ $order[0]->products[0]->product->product_dispatch }}</span>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Original Price</th>
                                        <th>Discount (%)</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                @isset($order)
                                    @foreach ($order as $product)
                                        <tbody>
                                            <!-- Repeat this TR block for each product -->
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('/uploads/products/thumbnails/' . $product->products[0]->product->product_thumbain) }}"
                                                            class="rounded-lg me-2" width="40" alt="">
                                                        <div>
                                                            <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                {{ $product->products[0]->product->product_name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $product->quantity }}</td>
                                                </td>
                                                <td>₹<span>{{ $product->original_price }}</span></td>
                                                <td>{{ $product->discount . ' %' }}</td>
                                                <td>₹<span>{{ $product->price }}</span>

                                                <td>₹<span class="product_price">{{ $product->total_price }}</span>
                                                </td>
                                            </tr>
                                            <!-- Add more products as needed -->
                                        </tbody>
                                    @endforeach
                                @else
                                    <tbody>
                                        <!-- Repeat this TR block for each product -->
                                        <tr>
                                            <td class="text-center" colspan="3">No Orders Found</td>
                                        </tr>
                                        <!-- Add more products as needed -->
                                    </tbody>
                                @endisset

                            </table>
                        </div>
                    </div>


                    @isset($poInfo->id)
                        <div class="card h-auto">
                            <div class="card-header py-3">
                                <h4 class="card-title--medium mb-0">View Purchase Order</h4>
                            </div>

                            <div class="card-body">
                                <div class="col-md-6 mb-3">
                                    <div class="col-lg-3 col-sm-6">
                                        <a href="{{ asset('/uploads/po_file/' . $poInfo->po_file) }}" target="_blank">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <img src="{{ asset('admin/assets/images/files/pdf.png') }}" width="35"
                                                        alt="">
                                                </div>
                                                <div class="clearfix">
                                                    <h6 class="mb-0">PDF</h6>
                                                    <span class="fs-13">1.5MB</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                    @if ($invoiceDetails != null)
                        <div class="card h-auto">
                            <div class="card-header py-3">
                                <h4 class="card-title--medium mb-0">Upload Invoice Details</h4>
                            </div>
                            <form action="{{ route('update.invoice') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="formFile" class="form-label">Attached Invoice</label>
                                                <input class="form-control @error('invoice_file') is-invalid @enderror"
                                                    type="file" name="invoice_file" id="formFile" accept=".pdf">
                                                @error('invoice_file')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Courier Name</label>
                                                <input class="form-control" name="enquiry_id"
                                                    value="{{ $invoiceDetails->enquiry_id }}" type="hidden" required>
                                                <input class="form-control" name="invoice_id"
                                                    value="{{ $invoiceDetails->id }}" type="hidden" required>
                                                <input class="form-control @error('courier_name') is-invalid @enderror"
                                                    placeholder="Enter Courier Name" name="courier_name"
                                                    value="{{ $invoiceDetails->courier_name }}" type="text">
                                                @error('courier_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Courier Number</label>
                                                <input class="form-control @error('courier_number') is-invalid @enderror"
                                                    name="courier_number" placeholder="Enter Courier Number"
                                                    value="{{ $invoiceDetails->courier_number }}" type="text">
                                                @error('courier_number')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Courier Website</label>
                                                <input class="form-control @error('courier_website') is-invalid @enderror"
                                                    name="courier_website" placeholder="Enter Courier Website"
                                                    value="{{ $invoiceDetails->courier_website }}"type="text">
                                                @error('courier_website')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @elseif($invoice == null)
                        <div class="card h-auto">
                            <div class="card-header py-3">
                                <h4 class="card-title--medium mb-0">Upload Invoice Details</h4>
                            </div>
                            <form action="{{ route('add.invoice') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="formFile" class="form-label">Attached Invoice</label>
                                                <input class="form-control @error('invoice_file') is-invalid @enderror"
                                                    type="file" name="invoice_file" accept=".pdf" id="formFile">
                                                @error('invoice_file')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Courier Name</label>
                                                <input class="form-control" name="enquiry_id"
                                                    value="{{ $order[0]->enquiry_id }}" type="hidden" required>
                                                <input class="form-control @error('courier_name') is-invalid @enderror"
                                                    placeholder="Enter Courier Name" name="courier_name" type="text">
                                                @error('courier_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Courier Number</label>
                                                <input class="form-control @error('courier_number') is-invalid @enderror"
                                                    placeholder="Enter Courier Number" name="courier_number"
                                                    type="text">
                                                @error('courier_number')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Courier Website</label>
                                                <input class="form-control @error('courier_website') is-invalid @enderror"
                                                    placeholder="Enter Courier Website" name="courier_website"
                                                    type="text">
                                                @error('courier_website')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @elseif($invoice != null)
                        <div class="card h-auto">
                            <div class="card-header py-3">
                                <h4 class="card-title--medium mb-0">View Invoice Details</h4>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div>Attached Invoice</div>
                                            <div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <a href="{{ asset('/uploads/invoices/' . $invoice->invoice_file) }}"
                                                        target="_blank">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-3">
                                                                <img src="{{ asset('admin/assets/images/files/pdf.png') }}"
                                                                    width="35" alt="">
                                                            </div>
                                                            <div class="clearfix">
                                                                <h6 class="mb-0">PDF</h6>
                                                                <span class="fs-13">1.5MB</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div>Courier Name</div>
                                            <div>{{ $invoice->courier_name }}</div>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div>Courier Number</div>
                                            <div>{{ $invoice->courier_number }}</div>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div>Courier Website</div>
                                            <div>{{ $invoice->courier_website }}</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <a href="{{ route('admin.order.details', [$order[0]->enquiry_id, $invoice->id]) }}"
                                            class="btn btn-primary btn-sm">Update</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
                <div class="col-md-4">
                    <div class="card h-auto order-tracking mb-4">
                        <div class="card-header">
                            <h5>Order Tracking</h5>
                        </div>
                        <div class="card-body">

                            {{-- make a logic for displaying status history of enquiries : morphtable --}}

                            <div class="status">Status: <span
                                    class="badge badge-sm @if ($order[0]->status == 'confirmed' || $order[0]->status == 'delivered') badge-info
                                        @elseif ($order[0]->status == 'dismissed')
                                            badge-danger
                                        @elseif ($order[0]->status == 'payment_received')
                                            badge-primary @else badge-primary @endif light border-0"><span
                                        class="@if ($order[0]->status == 'confirmed' || $order[0]->status == 'delivered') text-info
                                        @elseif ($order[0]->status == 'dismissed')
                                            text-danger
                                        @elseif ($order[0]->status == 'payment_received')
                                            text-primary @endif">
                                        {{ ucfirst(str_replace('_', ' ', $order[0]->status)) }}

                                    </span></span>
                            </div>
                            @foreach ($order[0]->statusMorph as $key => $statusDetail)
                                <div class="step">
                                    <div class="icon bg-primary text-white">{{ $key + 1 }}</div>
                                    <div class="text">
                                        {{ ucfirst(str_replace('_', ' ', $statusDetail->status)) }}
                                    </div>
                                    <div class="ml-auto">
                                        {{ $statusDetail->created_at ? \Carbon\Carbon::parse($statusDetail->created_at)->format('d-M-Y') : '' }}
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card h-auto order-summary">
                        <div class="card-header">
                            <h5>Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="summary-item">
                                <strong>Total Price:</strong>
                                <strong>₹<span class="totalPrice">0</span></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        // Helper function to format number with commas for display only
        function formatPriceDisplay(number) {
            return parseFloat(number).toLocaleString('en-IN', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        // Helper function to extract numeric value from formatted price string
        function extractNumericPrice(priceText) {
            return parseFloat(priceText.replace(/[^0-9.\-]/g, ''));
        }

        $(document).ready(function() {
            let sum = 0;

            // Format all price columns and calculate total with raw numeric values
            $(".product_price").each(function() {
                // Extract numeric value for calculation
                var numPrice = extractNumericPrice($(this).text());
                sum += numPrice;
                // Display formatted price with commas
                $(this).text(formatPriceDisplay(numPrice));
            });

            // Format Original Price column
            $('td').each(function() {
                var text = $(this).text().trim();
                // Check if this is an original price cell (contains ₹ and a number)
                if (text.includes('₹') && !$(this).hasClass('product_price')) {
                    var numPrice = extractNumericPrice(text);
                    if (!isNaN(numPrice) && numPrice > 0) {
                        $(this).text('₹' + formatPriceDisplay(numPrice));
                    }
                }
            });

            // Display formatted total price
            $(".totalPrice").text(formatPriceDisplay(sum));
        });
    </script>
@endsection
