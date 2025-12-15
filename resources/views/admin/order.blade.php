@extends('admin.layouts.app')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Popup Styling */
        .loading-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }

        .progress-bar-container {
            width: 100%;
            background: #ddd;
            border-radius: 5px;
            margin-top: 10px;
            overflow: hidden;
        }

        .progress-bar {
            width: 0%;
            height: 10px;
            background: #007bff;
            transition: width 0.5s ease-in-out;
        }

        .popup-text {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content-body')
    <div class="content-body">
        <!-- Popup Window -->
        <div class="loading-popup">
            <div class="popup-content">
                <p class="popup-text">Processing your request...</p>
                <div class="progress-bar-container">
                    <div class="progress-bar"></div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Order</h4>
                            <div>
                                Date Range of Order
                                <input type="text" class="datef" name="dates" value="" />
                            </div>
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
                                            <th class="align-middle">Order ID </th>
                                            <th class="align-middle">Customer</th>
                                            <th class="align-middle pr-7">Date</th>
                                            <th class="align-middle text-center">Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product_list">
                                        @forelse ($orders as $order)
                                            @if (!empty($order->customer->id))
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="form-check custom-checkbox checkbox-primary me-3">
                                                        <input type="checkbox" class="form-check-input multiSelectCheckbox"
                                                            id="customCheckBox2" value="{{ $order->id }}" required="">
                                                        <label class="form-check-label" for="customCheckBox2"></label>
                                                    </div>
                                                </td>
                                                <td class="py-2">
                                                    <a href="{{ route('admin.order.details', $order->enquiry_id) }}" class="mark-as-read" data-id="{{ $order->id }}">
                                                        <strong>{{ $order->enquiry_id }}</strong></a>
                                                        <span id="OrderId" style="display: none">
                                                            {{ $order->enquiry_id }}
                                                        </span>
                                                </td>
                                                <td class="py-2">
                                                    <a href="{{ route('customer.overview', $order->customer->id) }}">
                                                        <strong>{{ $order->customer->fullname }}</strong><br><a
                                                            href="mailto:ricky@example.com">{{ $order->customer->email }}</a>
                                                </td>

                                                <td class="py-2">{{ $order->created_at ? \Carbon\Carbon::parse($order->created_at)->format('d-M-Y') : '' }}</td>

                                                <td class="py-2 text-center">
                                                    @if ($order->status == 'confirmed')
                                                        <span class="badge badge-sm badge-success light border-0 w-75">
                                                            <span class="text-success"><span
                                                                    class="ms-1 fa fa-check"></span>
                                                                {{ ucfirst($order->status) }}</span>
                                                        </span>
                                                    @elseif($order->status == 'dismissed')
                                                        <span class="badge badge-sm badge-danger light border-0 w-75">
                                                            <span class="text-danger"><span class="ms-1 fa fa-check"></span>
                                                                {{ ucfirst($order->status) }}</span>
                                                        </span>
                                                    @elseif($order->status == 'delivered')
                                                        <span class="badge badge-sm badge-info light border-0 w-75">
                                                            <span class="text-info"><span
                                                                    class="ms-1 fa fa-check"></span>
                                                                {{ ucfirst($order->status) }}</span>
                                                        </span>
                                                    @elseif($order->status == 'payment_received')
                                                        <span class="badge badge-sm badge-primary light border-0 w-75">
                                                            <span class="text-primary"><span
                                                                    class="ms-1 fa fa-check"></span>
                                                                Payment Received</span>
                                                        </span>
                                                    @else
                                                        <span class="badge badge-sm badge-danger light border-0 w-75">
                                                            <span class="text-danger"><span
                                                                    class="ms-1 fa fa-check"></span>Pending
                                                                Order</span>
                                                        </span>
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
                                                                    data-orderstatus="dismissed" href="#">Order
                                                                    Dismissed</a>
                                                                <a class="dropdown-item changeStatus"
                                                                    data-orderid="{{ $order->id }}"
                                                                    data-orderstatus="confirmed" href="#">Order
                                                                    Confirmed</a>
                                                                <a class="dropdown-item changeStatus"
                                                                    data-orderid="{{ $order->id }}"
                                                                    data-orderstatus="delivered" href="#">Order
                                                                    Delivered</a>
                                                                <a class="dropdown-item changeStatus"
                                                                    data-orderid="{{ $order->id }}"
                                                                    data-orderstatus="payment_received"
                                                                    href="#">Payment Received</a>
                                                                <input type="hidden" name="currentOrderStatus" class="currentOrderStatus"
                                                                    value="{{ $order->status }}">
                                                                </>
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                            @endif
                                        @empty
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2" colspan="">
                                                    No order-status Found
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
                let currentStatus = $(this).siblings('.currentOrderStatus').val() || 0;

                // Show the popup
                $(".loading-popup").fadeIn();
                $(".progress-bar").css("width", "0%");

                // Simulate Progress Bar Animation
                let progress = 0;
                let progressInterval = setInterval(function() {
                    if (progress >= 100) {
                        clearInterval(progressInterval);
                    } else {
                        progress += 10;
                        $(".progress-bar").css("width", progress + "%");
                    }
                }, 500);

                $.ajax({
                    url: '/order-status',
                    type: "POST",
                    data: {
                        enquiryid: id,
                        enquiryStatus: status,
                        currentEnquiryStatus: currentStatus,
                    },
                    success: function(data) {
                        if (data.status) {
                            // Hide the popup after success
                            setTimeout(function() {
                                $(".loading-popup").fadeOut();
                                location.reload();
                            }, 500); // Small delay before hiding
                        }
                    },
                    error: function(xhr, status, error) {
                        // Hide the popup in case of an error
                        setTimeout(function() {
                            $(".loading-popup").fadeOut();
                        }, 500);
                    }
                });
            });

            $(document).on("click", ".mark-as-read", function() {
                var notificationId = $(this).data('id');
                var orderId = $("#OrderId").text().trim();
                var notificationElement = $('#notification-' + notificationId);

                $.ajax({
                    url: '/notifications/read/' + notificationId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}' // Laravel CSRF protection
                    },
                    success: function(response) {
                        if (response.success) {
                            notificationElement.fadeOut('slow', function() {
                                $(this).remove();
                            });

                            location.href = `/order-details/${orderId}`;
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.status)
                        console.log(xhr.responseText)
                        console.log(object)('Error marking notification as read.');
                        // alert("Erroorr")
                    }
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

            // make a form submit action from here using above details and sent to the /order url request using get method
            // Create a form element dynamically
            let form = $('<form>', {
                action: '/order',
                method: 'GET'
            });

            // Append input fields for start and end date
            form.append($('<input>', {
                type: 'hidden',
                name: 'startDate',
                value: startDate
            }));

            form.append($('<input>', {
                type: 'hidden',
                name: 'endDate',
                value: endDate
            }));

            // Append the form to the body and submit
            $('body').append(form);
            form.submit();
        });
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": false // Disables pagination
            });
        });
    </script>
@endsection
