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
                            <h5>Enquiry No - <span class="text-primary">{{ $order[0]->enquiry_id }}</span></h5>
                            <span class="float-right text-muted">Estimated delivery:
                                {{ $order[0]->products[0]->product->product_dispatch }}</span>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
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
                                                <td>₹<span
                                                        class="product_price">{{ $product->products[0]->product->product_price }}</span>
                                                </td>
                                                <td>{{ $product->quantity }}</td>
                                            </tr>
                                            <!-- Add more products as needed -->
                                        </tbody>
                                    @endforeach
                                @else
                                    <tbody>
                                        <!-- Repeat this TR block for each product -->
                                        <tr>
                                            <td class="text-center" colspan="3">No Enquiries Found</td>
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
                                    <div class="ml-auto"> {{ $statusDetail->created_at }}</div>
                                </div>
                            @endforeach

                            {{-- @if ($order[0]->status == 'confirmed')
                                <div class="status">Status: <span
                                        class="badge badge-sm badge-success light border-0"><span
                                            class="text-success">{{ $order[0]->status }}</span></span>
                                </div>
                                <div class="step">
                                    <div class="icon bg-primary text-white">1</div>
                                    <div class="text">Order Confirm</div>
                                    <div class="ml-auto">{{ $order[0]->created_at }}</div>
                                </div>
                            @elseif($order[0]->status == 'delivered')
                                <div class="status">Status: <span
                                        class="badge badge-sm badge-success light border-0"><span
                                            class="text-success">{{ $order[0]->status }}</span></span>
                                </div>
                                <div class="step">
                                    <div class="icon bg-primary text-white">1</div>
                                    <div class="text">Order Confirm</div>
                                    <div class="ml-auto">{{ $order[0]->created_at }}</div>
                                </div>
                                <div class="step">
                                    <div class="icon bg-primary text-white">2</div>
                                    <div class="text">Order Delivered</div>
                                    <div class="ml-auto">{{ $order[0]->created_at }}</div>
                                </div>
                            @elseif($order[0]->status == 'payment_received')
                                <div class="status">Status: <span
                                        class="badge badge-sm badge-primary light border-0"><span
                                            class="text-primary">{{ $order[0]->status }}</span></span>
                                </div>
                                <div class="step">
                                    <div class="icon bg-primary text-white">1</div>
                                    <div class="text">Order Confirm</div>
                                    <div class="ml-auto">{{ $order[0]->created_at }}</div>
                                </div>
                                <div class="step">
                                    <div class="icon bg-primary text-white">2</div>
                                    <div class="text">Order Delivered</div>
                                    <div class="ml-auto">{{ $order[0]->created_at }}</div>
                                </div>
                                <div class="step">
                                    <div class="icon bg-primary text-white">3</div>
                                    <div class="text">Payment Received</div>
                                    <div class="ml-auto">{{ $order[0]->created_at }}</div>
                                </div>
                            @elseif($order[0]->status == 'dismissed')
                                <div class="status">Status: <span class="badge badge-sm badge-danger light border-0"><span
                                            class="text-danger">{{ $order[0]->status }}</span></span>
                                </div>
                                <div class="step">
                                    <div class="icon bg-danger text-white">1</div>
                                    <div class="text text-danger">Order Dismissed</div>
                                    <div class="ml-auto text-danger">{{ $order[0]->created_at }}</div>
                                </div>
                            @else
                                <div class="status">Status: <span
                                        class="badge badge-sm badge-primary light border-0"><span
                                            class="text-primary">{{ $order[0]->status }}</span></span>
                                </div>
                                <div class="step">
                                    <div class="icon bg-danger text-white">1</div>
                                    <div class="text text-danger">Order Pending</div>
                                    <div class="ml-auto text-danger">{{ $order[0]->created_at }}</div>
                                </div>
                            @endif --}}
                            <!-- Repeat for other steps -->
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
        let sum = 0;
        $(".product_price").each(function() {
            sum += parseFloat($(this).text());
        });

        $(".totalPrice").html(sum);
    </script>
@endsection
