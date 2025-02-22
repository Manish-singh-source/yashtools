@extends('admin.layouts.app')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content-body')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Enquiry</h4>Date Range of Enquiry
                            <input type="text" class="datef" name="dates" value="01/01/2018 - 01/15/2018" />
                        </div>
                        <div class="dropdown text-sans-serif text-end"><button class="btn btn-primary tp-btn-light sharp"
                                type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2">
                                            </circle>
                                        </g>
                                    </svg></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                <div class="py-2"><a class="dropdown-item" id="deleteAll">Delete
                                        All</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table display" id="projectlist">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="align-middle">Enquiry ID </th>
                                            <th class="align-middle">Customer</th>
                                            <th class="align-middle pr-7">Date</th>
                                            <th class="align-middle text-end">Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @forelse ($orders as $order)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="form-check custom-checkbox checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="checkbox">
                                                        <label class="form-check-label" for="checkbox"></label>
                                                    </div>
                                                </td>
                                                <td class="py-2">
                                                    <a href="{{ route('admin.order.details', $order->id) }}">
                                                        <strong>{{ $order->enquiry_id }}</strong></a>
                                                </td>
                                                <td class="py-2">
                                                    <a href="{{ route('customer.overview', $order->customer->id) }}">
                                                        <strong>{{ $order->customer->fullname }}</strong><br><a
                                                            href="mailto:ricky@example.com">{{ $order->customer->email }}</a>
                                                </td>

                                                <td class="py-2">{{ $order->created_at }}</td>

                                                <td class="py-2 text-end">
                                                    @if ($order->status == 'confirmed')
                                                        <span class="text-success"><span class="ms-1 fa fa-check"></span>
                                                            {{ $order->status }}</span>
                                                    @elseif($order->status == 'dismissed')
                                                        <span class="text-danger"><span class="ms-1 fa fa-check"></span>
                                                            {{ $order->status }}</span>
                                                    @elseif($order->status == 'delivered')
                                                        <span class="text-success"><span class="ms-1 fa fa-check"></span>
                                                            {{ $order->status }}</span>
                                                    @elseif($order->status == 'payment_received')
                                                        <span class="text-primary"><span class="ms-1 fa fa-check"></span>
                                                            {{ $order->status }}</span>
                                                    @else
                                                        <span class="text-success">Enquiry<span
                                                                class="ms-1 fa fa-check"></span></span>
                                                    @endif
                                                </td>

                                                <td class="py-2 text-end">
                                                    <div class="dropdown text-sans-serif"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            id="order-dropdown-0" data-bs-toggle="dropdown"
                                                            data-boundary="viewport" aria-haspopup="true"
                                                            aria-expanded="false"><span><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <circle fill="#000000" cx="5"
                                                                            cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12"
                                                                            cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="19"
                                                                            cy="12" r="2">
                                                                        </circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                                            aria-labelledby="order-dropdown-0">
                                                            <div class="py-2">
                                                                <a class="dropdown-item changeStatus"
                                                                    data-orderid="{{ $order->id }}"
                                                                    data-orderstatus="dismissed" href="#!">Enquiry
                                                                    Dismissed</a>
                                                                <a class="dropdown-item changeStatus"
                                                                    data-orderid="{{ $order->id }}"
                                                                    data-orderstatus="confirmed" href="#!">Order
                                                                    Confirmeded</a>
                                                                <a class="dropdown-item changeStatus"
                                                                    data-orderid="{{ $order->id }}"
                                                                    data-orderstatus="delivered" href="#!">Order
                                                                    Delivered</a>
                                                                <a class="dropdown-item changeStatus"
                                                                    data-orderid="{{ $order->id }}"
                                                                    data-orderstatus="payment_received"
                                                                    href="#!">Payment Received</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="form-check custom-checkbox checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="checkbox">
                                                        <label class="form-check-label" for="checkbox"></label>
                                                    </div>
                                                </td>
                                                <td class="py-2">
                                                    <a href="#">
                                                        <strong>#181</strong></a>
                                                </td>
                                                <td class="py-2">
                                                    <a href="#">
                                                        <strong>Ricky
                                                            Antony</strong><br><a
                                                            href="mailto:ricky@example.com">ricky@example.com</a>
                                                </td>
                                                <td class="py-2">20/04/2020</td>
                                                <td class="py-2 text-end"><span class="badge badge-success">Completed<span
                                                            class="ms-1 fa fa-check"></span></span>
                                                </td>

                                                <td class="py-2 text-end">
                                                    <div class="dropdown text-sans-serif"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            id="order-dropdown-0" data-bs-toggle="dropdown"
                                                            data-boundary="viewport" aria-haspopup="true"
                                                            aria-expanded="false"><span><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <circle fill="#000000" cx="5"
                                                                            cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12"
                                                                            cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="19"
                                                                            cy="12" r="2">
                                                                        </circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                                            aria-labelledby="order-dropdown-0">
                                                            <div class="py-2"><a class="dropdown-item"
                                                                    href="#!">Enquiry Dismissed</a><a
                                                                    class="dropdown-item" href="#!">Order
                                                                    Confirmed</a><a class="dropdown-item"
                                                                    href="#!">Order Delivered</a><a
                                                                    class="dropdown-item" href="#!">Payment
                                                                    Received</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('input[name="dates"]').daterangepicker();
    </script>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $(document).on("click", ".changeStatus", function() {
                let id = parseInt($(this).data('orderid')) || 0;
                let status = $(this).data('orderstatus') || 0;

                console.log(id);
                console.log(status);

                $.ajax({
                    url: '/order-status',
                    type: "POST",
                    data: {
                        enquiryid: id,
                        enquiryStatus: status,
                    },
                    success: function(data) {
                        if (data.status) {
                            console.log(data.status);
                            console.log(data.message)
                            console.log(data.data)
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    },
                });
            });
        });
    </script>
@endsection
