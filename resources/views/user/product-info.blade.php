@extends('user.layouts.masterlayout')

@section('style')
    <style>
        .date-filter {
            padding: 8px;
            font-size: 16px;
            width: 200px;
            margin-top: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .mks {
            line-height: 4;
            margin: 5px;
        }

        .fs {
            font-size: 20px;
        }
    </style>
@endsection

@section('content')
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                            </ul>
                            <h1 class="title">My Account</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start My Account Area  -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="axil-dashboard-author">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="title mb-0">Enquiry Details : {{ $data[0]->enquiry_id }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row gap-x-5">
                        <div class="{{ isset($invoiceDetails->id) ? 'col-xl-9 col-md-12' : 'col-12' }}">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Product Image</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="product_list">
                                                    @foreach ($data as $order)
                                                        <tr>
                                                            <td><img width="40" height="40"
                                                                    src="{{ asset('uploads/products/thumbnails/' . $order->products[0]->product->product_thumbain) }}" />
                                                            </td>
                                                            <td>{{ $order->products[0]->product->product_name }}</td>
                                                            <td>{{ $order->quantity }}</td>
                                                            <td>{{ $data[0]->status }}</td>
                                                            <td>
                                                                @isset($poInfo->id)
                                                                    <a href="{{ asset('uploads/po_file/' . $poInfo->po_file) }}"
                                                                        target="_blank">View PO</a>
                                                                @endisset
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div id="pagination_links"></div>
                                </div>
                            </div>
                        </div>

                        @isset($invoiceDetails->id)
                            <div class="col-xl-3 col-md-12 ">
                                <div class="card bg-light border-0 outline-0 p-3">
                                    <h5 class="card-title text-center mb-3">Invoice Details</h5>
                                    <div class="card-body">
                                        <p><strong>Courier:</strong> {{ $invoiceDetails->courier_name }}</p>
                                        <p><strong>Courier No:</strong> {{ $invoiceDetails->courier_number }}</p>
                                        <p><strong>Courier Website:</strong>
                                            <a href="{{ $invoiceDetails->courier_website }}" target="_blank"
                                                class="text-primary">
                                                {{ $invoiceDetails->courier_website }}
                                            </a>
                                        </p>
                                        <p><strong>Invoice File:</strong>
                                            @if ($invoiceDetails->invoice_file)
                                                <a href="{{ asset('uploads/invoices/' . $invoiceDetails->invoice_file) }}"
                                                    class="btn btn-sm btn-success" target="_blank">
                                                    Download Invoice
                                                </a>
                                            @else
                                                <span class="text-muted">No file available</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @else
                            @empty($poInfo->id)
                                <form action="{{ route('po.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <label for="po_file" class="form-label">Upload PO File</label>
                                        <input class="form-control" type="file" name="po_file" id="po_file">
                                        @error('po_file')
                                            {{ $message }}
                                        @enderror
                                        <input class="form-control" type="text" name="enquiry_id"
                                            value="{{ $data[0]->enquiry_id }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" name="submit" value="Send PO">
                                    </div>
                                </form>
                            @endempty
                        @endisset

                    </div>
                    <!-- End My Account Area  -->

    </main>
    <!-- Start Footer Area  -->
@endsection

@section('script')
    <script>
        $("#SubmitPO").submit(function(event) {
            event.preventDefault();

            this.submit(); // Submit the form
        });
    </script>
@endsection
