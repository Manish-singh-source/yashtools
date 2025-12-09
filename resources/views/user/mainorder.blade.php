@extends('user.layouts.masterlayout')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('style')
    <style>
        .date-filter,
        .enquiry-date-filter {
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

        .custom-form-input {
            height: auto;
            padding: 10px 30px;
            border-color: var(--color-light);
            color: var(--color-body);
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
                                <li class="axil-breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
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
                                <h5 class="title mb-0 text-capitalize">Hello {{ $user->fullname ?? 'User' }}</h5>
                                <span class="joining-date">Yash Tools Member Since
                                    {{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d-M-Y') : '' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard"
                                            role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                        {{-- <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-enquiries"
                                            role="tab" aria-selected="false"><i
                                                class="fas fa-shopping-cart"></i>Enquiries</a> --}}
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab"
                                            aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab"
                                            aria-selected="false"><i class="fas fa-user"></i>Account
                                            Details</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-forgot" role="tab"
                                            aria-selected="false"><i class="fas fa-key"></i>Change Password</a>
                                        <a class="nav-item nav-link" href="{{ route('customer.logout') }}"><i
                                                class="fal fa-sign-out"></i>Logout</a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                    <div class="axil-dashboard-overview">
                                        <div class="welcome-text text-capitalize">Hello {{ $user->fullname ?? 'User' }} (not
                                            <span class="text-capitalize">{{ $user->fullname ?? 'User' }}?</span> <a
                                                href="{{ route('customer.logout') }}">Log
                                                Out</a>)
                                        </div>
                                        <p>From your account dashboard you can view your recent orders, manage your
                                            shipping and billing addresses, and edit your password and account details.
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-enquiries" role="tabpanel">
                                    <div class="axil-shop-top">
                                        <div class="row mb-4">
                                            <div class="col-lg-9">
                                                <div class="category-select">

                                                    <!-- Start Single Select  -->
                                                    <label class="mks" for="enquiry-from-date">From:</label>
                                                    <input type="date" id="enquiry-from-date"
                                                        class="enquiry-date-filter">

                                                    <label class="mks" for="enquiry-to-date">To:</label>
                                                    <input type="date" id="enquiry-to-date" class="enquiry-date-filter">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                                    <!-- Start Single Select  -->
                                                    <select class="single-select" id="sort_enquiries_by">
                                                        <option value="">--Select --</option>
                                                        <option value="asc">Sort by Ascending</option>
                                                        <option value="desc">Sort by Descending</option>
                                                    </select>
                                                    <!-- End Single Select  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Sr.&nbsp;No.</th>
                                                        <th scope="col" class="text-center">Order&nbsp;Id</th>
                                                        <th scope="col" class="text-center">Product&nbsp;Name</th>
                                                        <th scope="col" class="text-center">Quantity</th>
                                                        <th scope="col" class="text-center">Status</th>
                                                        <th scope="col" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="enquiries_list">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="pagination_links_enquiries"></div>
                                </div>
                                <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                    <div class="axil-shop-top">
                                        <div class="row mb-4">
                                            <div class="col-lg-9">
                                                <div class="category-select">

                                                    <!-- Start Single Select  -->
                                                    <label class="mks" for="from-date">From:</label>
                                                    <input type="date" id="from-date" class="date-filter">

                                                    <label class="mks" for="to-date">To:</label>
                                                    <input type="date" id="to-date" class="date-filter">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                                    <!-- Start Single Select  -->
                                                    <select class="single-select" id="sort_by">
                                                        <option value="">--Select --</option>
                                                        <option value="asc">Sort by Ascending</option>
                                                        <option value="desc">Sort by Descending</option>
                                                    </select>
                                                    <!-- End Single Select  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Sr.&nbsp;No.</th>
                                                        <th scope="col" class="text-center">Order&nbsp;Id</th>
                                                        <th scope="col" class="text-center">Product&nbsp;Name</th>
                                                        <th scope="col" class="text-center">Quantity</th>
                                                        <th scope="col" class="text-center">Date</th>
                                                        <th scope="col" class="text-center">Status</th>
                                                        <th scope="col" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="product_list">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="pagination_links"></div>
                                </div>
                                <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                    <div class="col-lg-12">
                                        <div class="axil-dashboard-account">
                                            <form class="account-details-form" action="{{ route('user.update.account') }}"
                                                method="POST">
                                                @csrf
                                                @method('POST')

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input type="hidden" class="form-control" name="userId"
                                                                value="{{ $user->id }}">
                                                            <input type="text" class="form-control" name="fullname"
                                                                value="{{ $user->fullname }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" name="username"
                                                                value="{{ $user->username }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email"
                                                                value="{{ $user->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Company Name</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->userDetail?->company_name }}"
                                                            name="company_name">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Company Address</label>
                                                        <textarea class=" custom-form-input" rows="4" name="company_address">{{ $user->userDetail?->company_address }}</textarea>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Mobile Number</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->mobile_number }}" name="mobile_number">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>GSTIN</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->userDetail?->gstin }}" name="gstin">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->userDetail?->city }}" name="city">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="form-label" for="state">State</label>
                                                        {{-- <input type="text" class="form-control"
                                                            value="{{ $user->userDetail->state }}" name="state"> --}}
                                                        <select
                                                            class="custom-form-input @error('state') is-invalid @enderror"
                                                            name="state" id="state">
                                                            <option selected disabled value="0">-- Select State --
                                                            </option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Andaman and Nicobar Islands' ? 'selected' : '' }}
                                                                value="Andaman and Nicobar Islands">Andaman and Nicobar
                                                                Islands
                                                            </option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Andhra Pradesh' ? 'selected' : '' }}
                                                                value="Andhra Pradesh">Andhra Pradesh</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Arunachal Pradesh' ? 'selected' : '' }}
                                                                value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Assam' ? 'selected' : '' }}
                                                                value="Assam">Assam</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Bihar' ? 'selected' : '' }}
                                                                value="Bihar">Bihar</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Chhattisgarh' ? 'selected' : '' }}value="Chhattisgarh">
                                                                Chhattisgarh</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Delhi' ? 'selected' : '' }}
                                                                value="Delhi">Delhi</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Goa' ? 'selected' : '' }}
                                                                value="Goa">Goa</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Gujarat' ? 'selected' : '' }}
                                                                value="Gujarat">Gujarat</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Haryana' ? 'selected' : '' }}
                                                                value="Haryana">Haryana</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Himachal Pradesh' ? 'selected' : '' }}
                                                                value="Himachal Pradesh">Himachal Pradesh</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Jammu and Kashmir' ? 'selected' : '' }}
                                                                value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Jharkhand' ? 'selected' : '' }}
                                                                value="Jharkhand">Jharkhand</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Karnataka' ? 'selected' : '' }}
                                                                value="Karnataka">Karnataka</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Kerala' ? 'selected' : '' }}
                                                                value="Kerala">Kerala</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Madhya Pradesh' ? 'selected' : '' }}
                                                                value="Madhya Pradesh">Madhya Pradesh</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Maharashtra' ? 'selected' : '' }}
                                                                value="Maharashtra">Maharashtra</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Manipur' ? 'selected' : '' }}
                                                                value="Manipur">Manipur</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Meghalaya' ? 'selected' : '' }}
                                                                value="Meghalaya">Meghalaya</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Mizoram' ? 'selected' : '' }}
                                                                value="Mizoram">Mizoram</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Nagaland' ? 'selected' : '' }}
                                                                value="Nagaland">Nagaland</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Odisha' ? 'selected' : '' }}
                                                                value="Odisha">Odisha</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Punjab' ? 'selected' : '' }}
                                                                value="Punjab">Punjab</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Rajasthan' ? 'selected' : '' }}
                                                                value="Rajasthan">Rajasthan</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Sikkim' ? 'selected' : '' }}
                                                                value="Sikkim">Sikkim</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Tamil Nadu' ? 'selected' : '' }}
                                                                value="Tamil Nadu">Tamil Nadu</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Telangana' ? 'selected' : '' }}
                                                                value="Telangana">Telangana</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Uttar Pradesh' ? 'selected' : '' }}
                                                                value="Uttar Pradesh">Uttar Pradesh</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'Uttarakhand' ? 'selected' : '' }}
                                                                value="Uttarakhand">Uttarakhand</option>
                                                            <option
                                                                {{ $user->userDetail?->state == 'West Bengal' ? 'selected' : '' }}
                                                                value="West Bengal">West Bengal</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->userDetail?->country }}" name="country">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Pin Code</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->userDetail?->pincode }}" name="pin_code">
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <input type="submit" class="axil-btn" value="Save Changes">
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-forgot" role="tabpanel">
                                    <div class="col-lg-12">
                                        <div class="axil-dashboard-account">

                                            <form class="account-details-form"
                                                action="{{ route('update.user.password') }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="title">Change Your Password </h5>
                                                        <div class="text-end">
                                                            @include('admin.layouts.session-messages')
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="hidden" name="id"
                                                                value="{{ Auth::id() }}" class="form-control">
                                                            <input type="password" name="password"
                                                                class="form-control @error('password') is-invalid @enderror">
                                                            @error('password')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input type="password" name="new_password"
                                                                class="form-control @error('new_password') is-invalid @enderror">
                                                            @error('new_password')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm New Password</label>
                                                            <input type="password" name="new_password_confirmation"
                                                                class="form-control @error('new_password_confirmation') is-invalid @enderror">
                                                            @error('new_password_confirmation')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <input type="submit" class="axil-btn" value="UPDATE PASSWORD">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End My Account Area  -->

    </main>
    <!-- Start Footer Area  -->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // orders table
            fetchProducts();

            function fetchProducts(page = 1) {
                let sortBy = $('#sort_by').val();
                let fromDate = $('#from-date').val();
                let toDate = $('#to-date').val();

                $.ajax({
                    url: "/orders?page=" + page,
                    type: "GET",
                    data: {
                        sort_by: sortBy,
                        fromDate: fromDate,
                        toDate: toDate,
                    },
                    success: function(response) {
                        console.log(response)
                        $('#product_list').html('');
                        let productCount = 0;
                        $.each(response.data, function(index, product) {
                            $('#product_list').append(
                                `<tr>
                                    <td class="text-center">${index + 1}</td>
                                    <td class="text-center">${product.enquiry_id}</td>
                                    <td>${product.products[0]?.product.product_name ? product.products[0]?.product.product_name : 'NA'}</td>
                                    <td class="text-center">${product.quantity}</td>
                                    <td class="text-center">
                                        ${new Date(product.created_at).toLocaleDateString('en-GB', {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric'
                                        }).replace(/ /g, '-')}
                                    </td>
                                    <td class="text-capitalize text-center">
                                        ${product.status === 'payment_received' ? 'Payment Done' : product.status ? product.status : 'Pending'}
                                    </td>
                                    <td class="text-center"> 
                                        <div><a href='/product-info/${product.enquiry_id}'>View</a> </div>
                                    </td>
                                </tr>`
                            );
                        });

                        $('#pagination_links').html(''); // Clear existing pagination

                        if (response.links) {
                            let paginationHtml = `<div class="text-center pt--30">
                                                        <div class="center">
                                                    <div class="pagination">`;

                            $.each(response.links, function(index, link) {
                                if (link.url) {
                                    let activeClass = link.active ? 'active' : '';
                                    paginationHtml +=
                                        `<a href="javascript:void(0)" class="pagination-link ${activeClass}" data-page="${link.url}">${link.label}</a>`;
                                }
                            });

                            paginationHtml += `</div></div></div>`;

                            $('#pagination_links').append(paginationHtml);
                        }
                    }
                });
            }
            // Sort and Filter Change Events
            $('#sort_by, .date-filter').change(function() {
                fetchProducts();
            });
            // Handle Pagination Click
            $(document).on('click', '.pagination-link', function() {
                let pageUrl = $(this).data('page');
                let urlParams = new URLSearchParams(pageUrl.split('?')[1]);
                let pageNumber = urlParams.get('page'); // Extract page number from URL

                if (pageNumber) {
                    fetchProducts(pageNumber);
                }
            });

            // enquiries table
            fetchEnquiries();

            function fetchEnquiries(page = 1) {
                let sortBy = $('#sort_enquiries_by').val();
                let fromDate = $('#enquiry-from-date').val();
                let toDate = $('#enquiry-to-date').val();

                $.ajax({
                    url: "/enquiries?page=" + page,
                    type: "GET",
                    data: {
                        sort_by: sortBy,
                        fromDate: fromDate,
                        toDate: toDate,
                    },
                    success: function(response) {
                        console.log(response)
                        $('#enquiries_list').html('');
                        $.each(response.data, function(index, product) {

                            $('#enquiries_list').append(
                                `<tr>
                                    <td>${index + 1}</td>
                                    <td>${product.enquiry_id}</td>
                                    <td>${product.products[0]?.product.product_name ? product.products[0]?.product.product_name : 'NA'}</td>
                                    <td>${product.quantity}</td>
                                    <td class="text-capitalize">
                                        ${product.status === 'payment_received' ? 'Payment Done' : product.status ? product.status : 'Pending'}
                                    </td>
                                    <td>
                                        <div><a href='/product-info/${product.enquiry_id}'>View</a> </div>
                                    </td>
                                </tr>`
                            );
                        });

                        $('#pagination_links_enquiries').html(''); // Clear existing pagination

                        if (response.links) {
                            let paginationHtml = `<div class="text-center pt--30">
                                                        <div class="center">
                                                    <div class="pagination">`;

                            $.each(response.links, function(index, link) {
                                if (link.url) {
                                    let activeClass = link.active ? 'active' : '';
                                    paginationHtml +=
                                        `<a href="javascript:void(0)" class="enquiry-pagination-link ${activeClass}" data-page="${link.url}">${link.label}</a>`;
                                }
                            });

                            paginationHtml += `</div></div></div>`;

                            $('#pagination_links_enquiries').append(paginationHtml);
                        }
                    }
                });
            }
            // Sort and Filter Change Events
            $('#sort_enquiries_by, .enquiry-date-filter').change(function() {
                fetchEnquiries();
            });
            // Handle Pagination Click
            $(document).on('click', '.enquiry-pagination-link', function() {
                let pageUrl = $(this).data('page');
                let urlParams = new URLSearchParams(pageUrl.split('?')[1]);
                let pageNumber = urlParams.get('page'); // Extract page number from URL

                if (pageNumber) {
                    fetchEnquiries(pageNumber);
                }
            });
        });
    </script>
@endsection
