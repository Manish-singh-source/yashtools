<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>Yash Tools Admin</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords"
        content="WorldNIC is a powerful PHP Admin Dashboard Bootstrap Template, designed for seamless management and data visualization in various web applications.">
    <meta name="author" content="Dexignlabs">
    <meta name="robots" content="index, follow">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="description"
        content="WorldNIC template, PHP admin dashboard, Bootstrap admin template, web application dashboard, data visualization template, responsive admin panel, PHP dashboard design, admin dashboard features, Bootstrap 5 admin, customizable dashboard template.">
    <meta name="og:title" content="Yash Tools Admin">
    <meta name="og:description"
        content="WorldNIC template, PHP admin dashboard, Bootstrap admin template, web application dashboard, data visualization template, responsive admin panel, PHP dashboard design, admin dashboard features, Bootstrap 5 admin, customizable dashboard template.">
    <meta name="og:image" content="../social-image.png">
    <meta name="format-detection" content="telephone=no">
    <meta name="twitter:description"
        content="WorldNIC template, PHP admin dashboard, Bootstrap admin template, web application dashboard, data visualization template, responsive admin panel, PHP dashboard design, admin dashboard features, Bootstrap 5 admin, customizable dashboard template.">
    <meta name="twitter:title" content="Yash Tools Admin">
    <meta name="twitter:image" content="../social-image.png">
    <meta name="twitter:card" content="summary_large_image">
    @yield('csrf-token')
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/assets/images/favicon.png') }}">

    <!-- Swiper CSS -->
    <link href="{{ asset('admin/assets/vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables CSS -->
    <link href="{{ asset('admin/assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- jQvMap CSS -->
    <link href="{{ asset('admin/assets/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Select CSS -->
    <link href="{{ asset('admin/assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Dropzone CSS -->
    <link href="{{ asset('admin/assets/vendor/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />

    <!-- Select2 CSS -->
    <link href="{{ asset('admin/assets/vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom Style CSS -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <!-- Date Range Picker -->
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Popup Message Script -->
    <script src="{{ asset('admin/assets/js/popup-message.js') }}"></script>

    <style>
        .bootstrap-select .btn {
            border: 1px solid var(--border);
            background-color: var(--card);
            font-weight: 400;
            color: var(--text);
            font-size: 0.875rem;
            line-height: 1.5;
            height: 2.4rem;
        }

        .bootstrap-select .dropdown-toggle .filter-option-inner-inner {
            overflow: hidden;
            color: #000000;
            font-size: 13px;
            font-weight: 500;
        }

        .bootstrap-select .btn {
            border: 1px solid var(--border);
            background-color: #f9f9fb;
            font-weight: 400;
            color: var(--text);
            font-size: 0.875rem;
            line-height: 1.5;
            height: 2.4rem;
        }

        .spc {
            margin: 0 4px;
        }
    </style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
    <div class="loading-wave">
        <div class="loading-bar"></div>
        <div class="loading-bar"></div>
        <div class="loading-bar"></div>
        <div class="loading-bar"></div>
    </div>
</div> -->
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="show">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('admin.dashboard') }}" class="brand-logo">
                <img src="{{ asset('admin\assets\images\myimg\mobilelogo.png') }}" class="logo-abbr" alt="">

                <div class="brand-title">
                    <img src="{{ asset('admin\assets\images\myimg\logo-large.png') }}" alt="">
                </div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div> <!--**********************************
            Nav header end
        ***********************************-->



        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            {{-- <li class="nav-item d-flex align-items-center">
                                    <div class="input-group search-area">
                                        <input type="text" class="form-control" placeholder="Search anything">
                                        <span class="input-group-text"><a href="javascript:void(0)"><i
                                                    class="flaticon-search-interface-symbol"></i></a></span>
                                    </div>
                                </li> --}}
                            <li class="nav-item dropdown notification_dropdown">
                                <button class="ic-theme-mode" type="button">
                                    <span class="light">Light</span>
                                    <span class="dark">Dark</span>
                                </button>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z"
                                            fill="#717579" />
                                        <path
                                            d="M9.98192 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1839 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.98192Z"
                                            fill="#717579" />
                                    </svg>

                                    <span class="badge text-white badge-primary">16</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="widget-media ic-scroll p-3"
                                        style="height:auto;">
                                        <ul class="timeline">
                                            @forelse ($notifications as $index => $notification)
                                                <li class="d-flex align-items-start mb-3"
                                                    id="notification-{{ $notification->id }}">
                                                    <a href="javascript:void(0)"
                                                        class="timeline-panel p-3 border rounded shadow-sm bg-light mark-as-read"
                                                        data-id="{{ $notification->id }}">
                                                        <div class="media-body">
                                                            <h6 class="mb-1 text-primary">
                                                                <i class="fas fa-user-circle"></i>
                                                                {{ $notification->fullname ?? 'No Name' }}
                                                            </h6>
                                                            <p class="mb-1 text-muted">
                                                                <i class="fas fa-envelope"></i>
                                                                {{ $notification->email ?? 'No Email' }}
                                                            </p>
                                                            <p class="mb-1 font-weight-bold">
                                                                <i class="fas fa-box"></i> Order ID:
                                                                {{ json_decode($notification->data)->order_id ?? 'N/A' }}
                                                            </p>
                                                            <p class="mb-2 text-dark">
                                                                <i class="fas fa-bell"></i>
                                                                {{ json_decode($notification->data)->message ?? 'No Message' }}
                                                            </p>
                                                            <small class="d-block text-muted">
                                                                <i class="far fa-clock"></i>
                                                                {{ \Carbon\Carbon::parse($notification->created_at)->format('d M Y, h:i A') }}
                                                            </small>
                                                        </div>
                                                    </a>
                                                </li>
                                            @empty
                                                <li class="text-center text-muted">No new notifications</li>
                                            @endforelse

                                        </ul>
                                    </div>
                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i
                                            class="ti-arrow-end"></i></a>
                                </div>
                            </li>



                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button"
                                    data-bs-toggle="dropdown">
                                    @if (Auth::user()->profile != '')
                                        <img src="{{ asset('uploads/profile/' . Auth::user()->profile) }}"
                                            width="20" alt>
                                    @else
                                        <img src="{{ asset('admin/assets/images/user.jpg') }}" width="20" alt>
                                    @endif
                                    <div class="header-info ms-3">
                                        <span class="fs-14 font-w600 mb-0">{{ Auth::user()->fullname }}</span>
                                    </div>
                                    <svg class="ms-4 mt-1 h-line" width="12" height="10" viewBox="0 0 12 10"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="0.5" width="12" height="1" fill="white" />
                                        <rect y="4.5" width="12" height="1" fill="white" />
                                        <rect y="8.5" width="12" height="1" fill="white" />
                                    </svg>

                                </a>
                                <div class="profile-detail card">
                                    <div class="card-body p-0">
                                        <div class="d-flex profile-media justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <div class="ms-3">
                                                    <h4 class="mb-0">{{ Auth::user()->fullname }}</h4>
                                                    <p>{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                            <a href="{{ route('admin.profile') }}">
                                                <div class="icon-box">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18.379 8.44975L8.96409 17.8648C8.68489 18.144 8.32929 18.3343 7.9421 18.4117L5.00037 19.0001L5.58872 16.0583C5.66615 15.6711 5.85646 15.3155 6.13565 15.0363L15.5506 5.62132M18.379 8.44975L19.7932 7.03553C20.1837 6.64501 20.1837 6.01184 19.7932 5.62132L18.379 4.20711C17.9885 3.81658 17.3553 3.81658 16.9648 4.20711L15.5506 5.62132M18.379 8.44975L15.5506 5.62132"
                                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="media-box">
                                            <ul class="d-flex flex-colunm gap-2 flex-wrap">
                                                <li>
                                                    <a href="{{ route('admin.profile') }}">
                                                        <div class="icon-box-lg">
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M5 20C5 11.7157 11.7157 5 20 5C28.2843 5 35 11.7157 35 20C35 28.2843 28.2843 35 20 35C11.7157 35 5 28.2843 5 20Z"
                                                                    fill="white" fill-opacity="0.25" />
                                                                <circle cx="19.9997" cy="16.6667" r="6.66667"
                                                                    fill="white" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M30.4335 30.5196C30.4904 30.6167 30.4727 30.7398 30.3915 30.8178C27.6957 33.4079 24.034 35 20.0004 35C15.9668 35 12.3051 33.4079 9.60933 30.8179C9.52818 30.7399 9.51048 30.6169 9.56735 30.5198C11.4843 27.2465 15.4363 25 20.0005 25C24.5645 25 28.5165 27.2464 30.4335 30.5196Z"
                                                                    fill="white" />
                                                            </svg>
                                                            <p>Profile</p>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('admin.logout') }}">
                                                        <div class="icon-box-lg">
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.25"
                                                                    d="M28.6325 11.2111L16.3162 7.10573C15.6687 6.88989 15 7.37186 15 8.05442V31.9462C15 32.6288 15.6687 33.1108 16.3162 32.8949L28.6325 28.7895C29.4491 28.5173 30 27.753 30 26.8921V13.1085C30 12.2476 29.4491 11.4834 28.6325 11.2111Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M19.1663 15.833L23.333 19.9997M23.333 19.9997L19.1663 24.1663M23.333 19.9997H6.66634"
                                                                    stroke="white" stroke-linecap="round" />
                                                            </svg>
                                                            <p>Logout</p>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="ic-sidenav">
            <div class="ic-sidenav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="{{ route('admin.dashboard') }}" class="ai-icon" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="fa-solid fa-image"></i>
                            <span class="nav-text">Slider</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.view.banner') }}">Add Slider</a></li>
                            <li><a href="{{ route('admin.view.banner.table') }}">Slider Table</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="fas fa-th-list"></i>

                            <span class="nav-text">Categories</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Categories</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('admin.add.category') }}">Add Categories</a></li>
                                    <li><a href="{{ route('admin.table.category') }}">Categories Table</a></li>
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Sub
                                    Categories</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('admin.view.subcategory') }}">Add Sub Categories</a></li>
                                    <li><a href="{{ route('admin.table.subcategory') }}">Sub Categories Table</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="fas fa-tools"></i>
                            <span class="nav-text">Brand</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.view.brand') }}">Add Brand</a></li>
                            <li><a href="{{ route('admin.table.brand') }}">Brand Table</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="fa-solid fa-shop"></i>
                            <span class="nav-text">Products</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.view.product') }}">Add Product</a></li>
                            <li><a href="{{ route('admin.table.product') }}">Product Table</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.order') }}" class="ai-icon" aria-expanded="false">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                            <span class="nav-text">Enquiry</span>
                        </a>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                            <span class="nav-text">Customers</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.customers.list') }}">Customer Table</a></li>
                            {{-- <li><a href="{{ route('admin.edit.customer') }}">Edit Customer</a></li> --}}
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="fa-solid fa-calendar"></i>
                            <span class="nav-text">Event</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.view.event') }}">Add Event</a></li>
                            <li><a href="{{ route('admin.table.event') }}">Event Table</a></li>
                            {{-- <li><a href="{{ route('admin.edit.event') }}">Edit Event</a></li> --}}
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="fas fa-user-cog"></i>
                            <span class="nav-text">Multi-Admin</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.view.multi.admin') }}">Add Admin</a></li>
                            {{-- <li><a href="{{ route('admin.edit.admin') }}">Edit Admin</a></li> --}}
                        </ul>
                    </li>

                </ul>
            </div>
        </div> <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->

        @yield('content-body')

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://technofra.com/"
                        target="_blank">Technofra</a> <span class="current-year">2024</span></p>
            </div>
        </div> <!--**********************************
                    Footer end
                ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
        ***********************************-->

    <!--**********************************
            Scripts
            ***********************************-->
    <!-- Required vendors -->
    <script>
        var enableSupportButton = '1';
        var asset_url = "{{ asset('admin/assets/') }}"; // Ensure proper asset path
    </script>
    <!-- CKEditor -->

    <script src="{{ asset('admin/assets/vendor/ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.3/classic/ckeditor.js"></script> --}}
    @yield('scripts')

    <!-- Dropzone (Uncomment if needed) -->
    <!-- <script src="{{ asset('admin/assets/vendor/dropzone/dist/dropzone.js') }}"></script> -->

    <!-- Global Dependencies -->
    <script src="{{ asset('admin/assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

    <!-- Charts & Data Visualization -->
    <script src="{{ asset('admin/assets/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart-js/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('admin/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins-init/datatables.init.js') }}"></script>

    <!-- Maps -->
    <script src="{{ asset('admin/assets/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>

    <!-- Dashboard -->
    <script src="{{ asset('admin/assets/js/dashboard/dashboard-1.js') }}"></script>

    <!-- Swiper -->
    <script src="{{ asset('admin/assets/vendor/swiper/js/swiper-bundle.min.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ic-sidenav-init.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo.js') }}"></script>

    {{-- <script src="{{ asset('admin/assets/js/styleSwitcher.js') }}" type="text/javascript"></script>  --}}

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1.5,
            spaceBetween: 15,
            navigation: {
                nextEl: "",
                prevEl: "",
            },
            breakpoints: {
                360: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 40,
                },
                1200: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
            },
        });
        var swiper = new Swiper(".mySwiper1", {
            slidesPerView: 4,
            spaceBetween: 15,
            navigation: {
                nextEl: "",
                prevEl: "",
            },
            breakpoints: {
                360: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3.5,
                    spaceBetween: 20,
                },
            },
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.mark-as-read').click(function() {
                var notificationId = $(this).data('id');
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
                        }
                    },
                    error: function(xhr) {
                        alert('Error marking notification as read.');
                    }
                });
            });
        });
    </script>
</body>

</html>
