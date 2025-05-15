<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Yash Tools A HOUSE OF DIE & MOLD POLISHING & FINISHING PRODUCTSYash Tools A HOUSE OF DIE & MOLD POLISHING &
        FINISHING PRODUCTS</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('csrf-token')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <!-- <link href="https://example.com/path-to-authein-font.css" rel="stylesheet"> -->
    <!-- CSS ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    @yield('style')
</head>


<body class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <header class="header axil-header header-style-5">
        <!-- Start Mainmenu Area -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="{{ route('user.home') }}" class="logo logo-dark">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" style="width: 100%;" alt="Site Logo">
                        </a>
                        <a href="{{ route('user.home') }}" class="logo logo-light">
                            <img src="{{ asset('assets/images/logo/logo-light.png') }}" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmenu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="{{ route('user.home') }}" class="logo">
                                    <img src="assets/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="{{ route('user.home') }}">Home</a></li>
                                <li><a href="{{ route('user.about.us') }}">About Us</a></li>
                                <li class="menu-item-has-children mega-menu-parent">
                                    <a href="{{ route('user.shop') }}">Products</a>
                                    <div class="axil-megamenu">
                                        <div class="megamenu-column">
                                            <h4 class="menu-title">Category</h4>
                                            <ul>
                                                @forelse ($categories as $category)
                                                    <li><a
                                                            href="{{ route('user.shop', $category->category_slug) }}">{{ $category->category_name }}</a>
                                                    </li>
                                                @empty
                                                    <li><a href="#">No
                                                            Categories Found</a></li>
                                                @endforelse
                                            </ul>
                                        </div>

                                        <div class="megamenu-column">
                                            <h4 class="menu-title">Brands</h4>
                                            <ul>
                                                @forelse ($brands as $brand)
                                                    <li><a
                                                            href="{{ route('user.shop', $brand->brand_slug) }}">{{ $brand->brand_name }}</a>
                                                    </li>
                                                @empty
                                                    <li><a href="#">No Brands Found</a></li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="{{ route('user.event') }}">Events</a></li>
                                <li><a href="{{ route('user.contact.us') }}">Contact Us</a></li>
                            </ul>
                        </nav>
                        <!-- End Mainmenu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">

                            <li><a href="{{ route('signin') }}" class="headerlist"><i
                                        class="fas fa-sign-in-alt icon dn"></i> <span>Login</span></a></li>
                            <li><a href="{{ route('signup') }}" class="headerlist"><i
                                        class="fas fa-user-plus icon dn"></i>
                                    <span>Sign Up</span></a></li>

                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
    <!-- End Header -->



    @yield('content')

    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-1 footer-dark">
        <!-- Start Footer Top Area  -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-md-3 col-sm-12">
                        <div class="axil-footer-widget">
                            <div class="logo mb--30">
                                <a href="{{ route('user.home') }}">
                                    <img class="light-logo" src="{{ asset('assets/images/logo/logo-light.png') }}"
                                        alt="Logo Images">
                                </a>
                            </div>
                            <div class="inner">
                                <p>YASH TOOLS INDIA PVT. LTD. focuses on collaboration with customers.
                                </p>
                                <div class="social-share">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Quick Links</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="{{ route('signin') }}">Login / Signup</a></li>
                                    <li><a href="{{ route('user.about.us') }}">About Us</a></li>
                                    <li><a href="{{ route('user.shop') }}">Products</a></li>
                                    <li><a href="{{ route('user.event') }}">Events</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Support</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('terms.conditions') }}">Terms and Conditions</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ's</a></li>
                                    <li><a href="{{ route('feedback') }}">Feedback</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- End Single Widget  -->
                    <div class="col">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Reach Us</h5>

                            <div class="inner">
                                <p>
                                    YASH TOOLS INDIA LLP. LTD.,
                                    A- 202 B, Jaswanti Allied Business Centre,
                                    Kanchpada, Ramchandra Lane, Next to Khwaish Hotel
                                    Malad (West),
                                    Mumbai- 400064.
                                    India
                                </p>
                                <ul class="support-list-item">
                                    <li><a href="mailto:sales@yashtools.in" contenteditable="false"
                                            style="cursor: pointer;"><i
                                                class="fal fa-envelope-open"></i>sales@yashtools.in</a></li>
                                                <li><a href="mailto:nikhil@yashtools.in" contenteditable="false"
                                            style="cursor: pointer;"><i
                                                class="fal fa-envelope-open"></i>nikhil@yashtools.in</a></li>
                                    <li><a href="tel:+919326178710" contenteditable="false"
                                            style="cursor: pointer;"><i class="fal fa-phone-alt"></i>+91-9326 17
                                            8710</a></li>
                                    <li><a href="tel:+919322258458" contenteditable="false"
                                            style="cursor: pointer;"><i class="fal fa-phone-alt"></i>+91-9322 25
                                            8458</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single Widget  -->
                    <div class="col">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Contact Us</h5>
                            <div class="inner">
                                <ul>

                                    <li><a>If you have any questions ? please feel free to contact us.</a></li>
                                    <li>
                                        <div class="form-group mb--0">
                                            <a href="{{ route('user.contact.us') }}" type="submit" id="submit"
                                                class="axil-btn btn-bg-primary">Contact Us</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-xl-start justify-content-center">

                            <ul class="quick-link">
                                <li>© 2025. All rights reserved by <a target="_blank"
                                        href="https://yashtools.in/">Yashtools</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12">
                        <div
                            class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Designed &amp; Developed By TECHNOFRA</span>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->

    </footer>
    <!-- End Footer Area  -->
    <div class="floating_btn">
        <a target="_blank" href="https://wa.me/+919326178710">
            <div class="contact_icon">
                <i class="fa fa-whatsapp my-float"></i>
            </div>
        </a>
        <p class="text_icon">Talk to us?</p>
    </div>





    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/js.cookie.js') }}"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js') }}"></script> -->
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('script')
</body>

</html>
