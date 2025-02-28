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
                                            <th class="align-middle pr-7">Created Date</th>
                                            <th class="align-middle pr-7">Updated Date</th>
                                            <th class="align-middle text-end">Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product_list">


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
    <script src="{{ asset('admin/assets/js/delete-selected.js') }}"></script>

    <script>
        function fetchAllEnquiries(startDate = null, endDate = null) {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });


            $.ajax({
                url: '/get-data-between-dates',
                type: 'POST',
                data: {
                    start_date: startDate,
                    end_date: endDate,
                },
                success: function(response) {
                    console.log(response);
                    console.log(response.data);
                    $('#product_list').html('');
                    $.each(response.data.data, function(index, product) {
                        let statusClass = "";
                        let statusText = product.status;

                        switch (product.status) {
                            case "confirmed":
                            case "delivered":
                                statusClass = "text-success";
                                break;
                            case "dismissed":
                                statusClass = "text-danger";
                                break;
                            case "payment_received":
                                statusClass = "text-primary";
                                break;
                            default:
                                statusClass = "text-success";
                                statusText = "Enquiry";
                        }

                        $('#product_list').append(
                            `<tr class="btn-reveal-trigger">
                                        <td class="py-2">
                                            <div class="form-check custom-checkbox checkbox-primary me-3">
                                                <input type="checkbox" class="form-check-input multiSelectCheckbox"
                                                    id="customCheckBox2" value="${product.id}" required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td class="py-2">
                                            <a href="/order-details/${product.id}">
                                                <strong>${product.enquiry_id}</strong></a>
                                        </td>
                                        <td class="py-2">
                                            <a href="/customer-overview/${product.customer_id}">
                                                <strong>${product.customer.fullname}</strong><br>
                                                <a href="mailto:${product.customer.email}">${product.customer.email}</a> 
                                            </a>

                                        </td>
                                        <td class="py-2">${product.created_at}</td>
                                        <td class="py-2">${product.updated_at}</td>
                                        <td class="py-2 text-end">
                                            <span class="${statusClass}"><span class="ms-1 fa fa-check"></span> ${statusText}</span>
                                        </td>
                                        <td class="py-2 text-end">
                                            <div class="dropdown text-sans-serif">
                                                <button class="btn btn-primary tp-btn-light sharp" type="button"
                                                    id="order-dropdown-${product.id}" data-bs-toggle="dropdown"
                                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end border py-0"
                                                    aria-labelledby="order-dropdown-${product.id}">
                                                    <div class="py-2">
                                                        <a class="dropdown-item changeStatus" data-orderid="${product.id}" data-orderstatus="dismissed" href="#!">Enquiry Dismissed</a>
                                                        <a class="dropdown-item changeStatus" data-orderid="${product.id}" data-orderstatus="confirmed" href="#!">Order Confirmed</a>
                                                        <a class="dropdown-item changeStatus" data-orderid="${product.id}" data-orderstatus="delivered" href="#!">Order Delivered</a>
                                                        <a class="dropdown-item changeStatus" data-orderid="${product.id}" data-orderstatus="payment_received" href="#!">Payment Received</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>`
                        );
                    });


                    // Pagination Links
                    $('#pagination_links').html('');

                    if (response.links) {
                        let paginationHtml =
                            `<div class="text-center pt--30"><div class="center"><div class="pagination">`;

                        $.each(response.links, function(index, link) {
                            if (link.url) {
                                let pageNum = new URL(link.url)
                                    .searchParams.get("page");
                                let activeClass = link.active ?
                                    'active' : '';
                                paginationHtml +=
                                    `<a href="javascript:void(0)" class="pagination-link ${activeClass}" data-page="${pageNum}">${link.label}</a>`;
                            }
                        });

                        paginationHtml += `</div></div></div>`;

                        $('#pagination_links').append(paginationHtml);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                },
            });

        }

        fetchAllEnquiries();

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
