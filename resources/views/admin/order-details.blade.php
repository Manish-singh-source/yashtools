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
                            <h5>Enquiry No - <span class="text-primary">{{ $order->enquiry_id }}</span></h5>
                            <span class="float-right text-muted">Estimated delivery: 30 Nov 2023</span>
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
                                @forelse ($order->products as $product)
                                    <tbody>
                                        <!-- Repeat this TR block for each product -->
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/images/category-images/d14.jpg" class="rounded-lg me-2"
                                                        width="40" alt="">
                                                    <div>
                                                        <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                            {{ $product->product->product_name }}
                                                        </h6>
                                                        <small>{{ $product->product->product_discription }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product_price">${{ $product->product->product_price }}</td>
                                            <td>{{ $product->product->product_quantity }}</td>
                                        </tr>
                                        <!-- Add more products as needed -->
                                    </tbody>
                                @empty
                                    <tbody>
                                        <!-- Repeat this TR block for each product -->
                                        <tr>
                                            <td class="text-center" colspan="3">No Enquiries Found</td>
                                        </tr>
                                        <!-- Add more products as needed -->
                                    </tbody>
                                @endforelse
                            </table>
                        </div>
                    </div>


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
                                                    value="{{ $order->enquiry_id }}" type="hidden" required>
                                                <input class="form-control" name="invoice_id"
                                                    value="{{ $invoiceDetails->id }}" type="hidden" required>
                                                <input class="form-control @error('courier_name') is-invalid @enderror"
                                                    name="courier_name" value="{{ $invoiceDetails->courier_name }}"
                                                    type="text">
                                                @error('courier_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Courier Number</label>
                                                <input class="form-control @error('courier_number') is-invalid @enderror"
                                                    name="courier_number" value="{{ $invoiceDetails->courier_number }}"
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
                                                    name="courier_website"
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
                                                    value="{{ $order->enquiry_id }}" type="hidden" required>
                                                <input class="form-control @error('courier_name') is-invalid @enderror"
                                                    name="courier_name" type="text">
                                                @error('courier_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Courier Number</label>
                                                <input class="form-control @error('courier_number') is-invalid @enderror"
                                                    name="courier_number" type="text">
                                                @error('courier_number')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Courier Website</label>
                                                <input class="form-control @error('courier_website') is-invalid @enderror"
                                                    name="courier_website" type="text">
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
                                                    <a href="{{ asset('uploads/invoices/' . $invoice->invoice_file) }}" target="_blank">
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
                                        <a href="{{ route('admin.order.details', [$order->id, $invoice->id]) }}"
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
                            <div class="status">Status: <span class="text-success">Shipping</span></div>
                            <div class="step">
                                <div class="icon bg-primary text-white">1</div>
                                <div class="text">Order Confirm</div>
                                <div class="ml-auto">May 15</div>
                            </div>
                            <div class="step">
                                <div class="icon bg-primary text-white">2</div>
                                <div class="text">Order Delivered</div>
                                <div class="ml-auto">jun 15</div>
                            </div>
                            <div class="step">
                                <div class="icon bg-primary text-white">3</div>
                                <div class="text">Payment Received</div>
                                <div class="ml-auto">jun 26</div>
                            </div>
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
                                <strong>$3,129</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
