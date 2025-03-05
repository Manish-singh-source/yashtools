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
                            <input type="text" class="datef" name="dates" value="01/01/2025 - 01/15/2025" />
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
                                <table class="" id="projectlist">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">
                                                <div class="form-check custom-checkbox checkbox-primary  me-3">
                                                    <input type="checkbox" class="form-check-input" id="checkAll"
                                                        value="0" required="">
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
                                    <tbody id="product_list">
                                        @forelse ($orders as $order)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="form-check custom-checkbox checkbox-primary me-3">
                                                        <input type="checkbox" class="form-check-input multiSelectCheckbox"
                                                            id="customCheckBox2" value="{{ $order->id }}" required="">
                                                        <label class="form-check-label" for="customCheckBox2"></label>
                                                    </div>
                                                </td>
                                                <td class="py-2">
                                                    <a href="{{ route('admin.order.details', $order->enquiry_id) }}">
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
                                                            Payment Received</span>
                                                    @else
                                                        <span class="text-primary"><span
                                                            class="ms-1 fa fa-check"></span>Pending Enquiry</span>
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
@endsection

@section('scripts')
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
    <script src="{{ asset('admin/assets/js/delete-selected.js') }}"></script>

    <script>
        $('input[name="dates"]').daterangepicker();

        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            let startDate = picker.startDate.format('YYYY-MM-DD');
            let endDate = picker.endDate.format('YYYY-MM-DD');

            fetchAllEnquiries(startDate, endDate);
        });
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": false // Disables pagination
            });
        });
    </script>
@endsection
