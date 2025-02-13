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
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
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
    <style>
        .slider {
            background: #00000030;
            height: 100vh;
            position: relative;
            text-align: center;
            width: 100%;
        }

        /* @font-face {
            font-family: 'Authein';
            src: url('fonts/Authein.ttf') format('truetype');
        }
        h2{
            font-family: 'Authein', sans-serif;
        } */
        .arrow {
            background: black;
            border: none;
            border-radius: 10%;
            color: white;
            cursor: pointer;
            display: none;
            opacity: .4;
            padding: 10px;
            position: absolute;
            text-transform: uppercase;
            -webkit-transition: .2s;
            top: 50%;
            transition: .2s;
        }

        .arrow:hover {
            opacity: .8;
        }

        .arrow.next {
            right: 2%
        }

        .arrow.prev {
            left: 2%;
        }

        .slide {
            background-repeat: no-repeat;
            background-size: 100% 100%;
            color: #fff;
            height: 100%;
            padding: 90px 0 0;
            position: absolute;
            width: 100%;
        }

        .slide-title {
            font-size: 40px;
            font-weight: bold;
            margin: 0 auto;
            padding: 15px 0;
            text-transform: uppercase;
        }

        .slide-desc {
            font-size: 20px;
            margin: 40px auto 0;
            width: 65%;
        }

        .slide-image,
        .slide-image img {
            height: 100%;
            width: 100%;
        }

        .slide:first-of-type {
            background-image: url("assets/images/myimg/Yash.png");
        }

        .slide:nth-of-type(2) {
            background-image: url("assets/images/myimg/yash1.png");
        }

        .slide:nth-of-type(3) {
            background-image: url("assets/images/myimg/yash1.png");
        }

        .active {
            display: block;
        }

        .slide-nav {
            bottom: 30px;
            position: absolute;
            width: 100%;
        }

        .nav-item {
            background: #fff;
            border: 2px solid #1a63bd;
            cursor: pointer;
            display: inline-block;
            margin-right: 20px;
            transition: background .4s;
        }

        .nav-item:last-of-type {
            margin-right: 0;
        }

        .nav-item:hover {
            transform: scale(1.3);
        }

        .item-active {
            background: #1a63bd;
            transform: scale(1.3);
        }

        .dot {
            border-radius: 50%;
        }

        .dot,
        .square {
            height: 15px;
            width: 15px;
        }

        .rectangle {
            height: 15px;
            width: 30px;
        }

        .statistic-section {
            background-image: url(assets/images/myimg/bann1.jpg);
            background-size: cover;
            padding-bottom: 70px;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Hide nested submenus by default */
        /* General Dropdown Styling */
    </style>
</head>


<body class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    @include('user.layouts.header')


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
                                <a href="index.php">
                                    <img class="light-logo" src="assets/images/logo/logo-light.png" alt="Logo Images">
                                </a>
                            </div>
                            <div class="inner">
                                <p>YASH TOOLS (I) PVT. LTD. focuses on collaboration with customers.
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
                                    <li><a href="sign-up.php">Login / Signup</a></li>
                                    <li><a href="about-us.php">About US</a></li>
                                    <li><a href="shop.php">Products</a></li>
                                    <li><a href="event.php">Events</a></li>
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
                                    <li><a href="privacy-policy.php">Privacy Policy</a></li>
                                    <li><a href="terms-conditions.php">Terms and Conditions</a></li>
                                    <li><a href="faq.php">FAQ's</a></li>
                                    <li><a href="feedback.php">Feedback</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- End Single Widget  -->
                    <div class="col">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Reach Us</h5>
                            <!-- <div class="logo mb--30">
                        <a href="index.html">
                            <img class="light-logo" src="assets/images/logo/logo.png" alt="Logo Images">
                        </a>
                    </div> -->
                            <div class="inner">
                                <p>Yash Tools (India) Pvt. Ltd., Shop No.2, Louis Palace, Tank Road, Orlem, Malad
                                    (West), Mumbai - 400 064. India
                                </p>
                                <ul class="support-list-item">
                                    <li><a href="mailto:nikhil@yashtools.in" contenteditable="false"
                                            style="cursor: pointer;"><i
                                                class="fal fa-envelope-open"></i>nikhil@yashtools.in</a></li>
                                    <li><a href="tel:+912228631094" contenteditable="false" style="cursor: pointer;"><i
                                                class="fal fa-phone-alt"></i>+91-22-2863 1094</a></li>
                                    <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
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
                                            <button name="submit" type="submit" id="submit"
                                                class="axil-btn btn-bg-primary">Contact Us</button>
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
        <a target="_blank" href="https://wa.me/918080721003">
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
    <script>
        // Slider configuration
        var config = {
            speed: 4000,
            auto: true, // true or false
            arrows: true, // true or false
            nav: true, // true or false
            navStyle: 'default' // square,rectangle, default
        };

        // Slider core
        var slides = $('.slide');
        var totalSlides = slides.length;
        var currentIndex = 0;

        function setSlides() {
            var currentSlide = slides.eq(currentIndex);
            slides.hide();
            currentSlide.fadeIn(1500);
        };
        setSlides();

        // autoplay
        if (config.auto) {
            var autoSlide = setInterval(function() {
                currentIndex += 1;
                if (currentIndex > totalSlides - 1) {
                    currentIndex = 0;
                }
                setSlides();
                navigation();
            }, config.speed);
        };

        // navigation arrows
        if (config.arrows) {
            $('.arrow').addClass('active');
            $('.prev').click(function() {
                clearInterval(autoSlide);
                currentIndex -= 1;
                if (currentIndex < 0) {
                    currentIndex = totalSlides - 1;
                }
                navigation();
                setSlides();
            });
            $('.next').click(function() {
                clearInterval(autoSlide);
                currentIndex += 1;
                if (currentIndex > totalSlides - 1) {
                    currentIndex = 0;
                }
                navigation();
                setSlides();
            });
        };

        // navigation
        if (config.nav) {
            for (i = 0; i < slides.length; i += 1) {
                $('<li/>').attr({
                    'class': 'nav-item',
                    'id': i
                }).appendTo('.slide-nav');
            };
            $('.nav-item').first().addClass('item-active');
            switch (config.navStyle) { // navigation style
                case 'square':
                    $('.nav-item').addClass('square');
                    break;
                case 'rectangle':
                    $('.nav-item').addClass('rectangle');
                    break;
                default:
                    $('.nav-item').addClass('dot');
            };

            function navigation() {
                $('.nav-item').removeClass('item-active');
                $('.nav-item').eq(currentIndex).addClass('item-active');
            };
            $('.nav-item').click(function() {
                clearInterval(autoSlide);
                var navNumb = $(this).attr('id');
                currentIndex = navNumb;
                navigation();
                setSlides();
            });
        };
    </script>
    <script>
        $(document).ready(function($) {
            $('.count-number').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>
</body>

</html>
