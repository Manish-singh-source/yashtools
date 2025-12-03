@extends('user.layouts.app')

@section('style')
    <style>
        :root {
            --banner-image1: url("assets/images/myimg/Yash.png");
            --banner-image2: url("assets/images/myimg/yash1.png");
            --banner-image3: url("assets/images/myimg/yash1.png");
        }

        .slider {
            background: #00000030;
            height: 100vh;
            position: relative;
            text-align: center;
            width: 100%;
        }

        .moretext {
            display: none;

        }

        .rem {
            cursor: pointer;
        }

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
            /* background-image: url("assets/images/myimg/Yash.png"); */
            background-image: var(--banner-image1);
        }

        .slide:nth-of-type(2) {
            /* background-image: url("assets/images/myimg/yash1.png"); */
            background-image: var(--banner-image2);
        }

        .slide:nth-of-type(3) {
            /* background-image: url("assets/images/myimg/yash1.png"); */
            background-image: var(--banner-image3);
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

        .banner-heding {
            font-size: 48px;
            color: red;
            filter: drop-shadow(1px 2px 1px black);
        }

        /* Hide nested submenus by default */
        /* General Dropdown Styling */
        .slide {
            background-repeat: no-repeat;
            background-size: 100% 100%;
            color: #fff;
            height: 100%;
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .slide div {
            max-width: 80%;
        }

        .banner-heding {
            font-size: 48px;
            color: red;
            filter: drop-shadow(1px 2px 1px black);
        }

        @media(max-width: 768px) {
            .banner-heding {
                font-size: 27px;
                color: red;
                filter: drop-shadow(1px 2px 1px black);
            }
        }
    </style>
@endsection

@section('content')
    <main class="main-wrapper">

        <div class="slider">
            @foreach ($banners as $banner)
                <div class="slide" style="background-image: url({{ asset('/uploads/banner/' . $banner->banner_image) }})">
                    <div>
                        <h1 class="banner-heding">{{ $banner->banner_title }}</h1>
                        <p>{{ $banner->banner_description }}</p>
                    </div>
                </div>
                <ul class="slide-nav"></ul>
            @endforeach
        </div>


        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap pb--0">
            <div class="container">
                <div class="product-area pb--80">
                    <div class="section-title-wrapper">
                        <h2 class="title">Shop by Category</h2>
                    </div>
                    <div class="row row--15">
                        @forelse ($categories as $category)
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="{{ route('user.shop', $category->category_slug) }}">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                src="{{ asset('/uploads/categories/' . $category->category_image) }}"
                                                alt="Product Images">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a
                                                    href="{{ route('user.shop', $category->category_slug) }}">{{ $category->category_name }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <h2> There Are No Categories Found</h2>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- End Expolre Product Area  -->
        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap pb--0">
            <div class="container">
                <div class="product-area pb--80">
                    <div class="section-title-wrapper">
                        <h2 class="title">Shop by Brand</h2>
                    </div>
                    <div class="row row--15">
                        @forelse ($brands as $brand)
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="{{ route('user.shop', $brand->brand_slug) }}">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                src="{{ asset('/uploads/brands/' . $brand->brand_image) }}"
                                                alt="Product Images">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a
                                                    href="{{ route('user.shop', $brand->brand_slug) }}">{{ $brand->brand_name }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <h2>There Are No Products Found</h2>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- End Expolre Product Area  -->
        <!-- Start About Area  -->
        <div class="axil-about-area about-style-1 axil-section-gap ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-6">
                        <div class="about-thumbnail">
                            <div class="thumbnail">
                                <img src="assets/images/about/about-01.png" alt="About Us">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6">
                        <div class="about-content content-right">
                            <!-- <span class="title-highlighter highlighter-primary2"> About Us</span> -->
                            <h2 class="title m-0">About Yash Tools</h2>
                            <div class="row">
                                <div class="col-lg-12 how-to-sell">

                                    <p style="margin-bottom: 7px;">YASH TOOLS was founded on the principle of working
                                        together with our
                                        customers to fully understand your individual applications and needs and making
                                        every effort to provide you with the best possible solutions.

                                        This focus encompasses supplying the best tools from around the world, introducing
                                        the best technology, providing ongoing service, and continuous follow-up to ensure
                                        our solutions are exceeding all your requirements.
                                    </p>
                                    <p style="margin-bottom: 7px;">Today most companies are facing ever increasing pressure
                                        to reduce costs and improve
                                        productivity. Reducing costs goes beyond the simple cost of acquisition of tools,
                                        equipments and other supplies. We need to look at the Total Cost of Production.
                                        Focusing solely on the basic cost of acquisition is doomed to failure.
                                    </p>
                                    <p style="margin-bottom: 7px;">Reducing the Total Cost of Production requires examining
                                        many factors such as the
                                        tools, machines, technology, processes, operator training and methods. To achieve
                                        the goal of reducing the Total Cost of Production we need the cooperation of the
                                        entire team from purchasing, engineering, operators and suppliers.
                                    </p>
                                    <p style="margin-bottom: 7px;">YASH TOOLS fills the role of tool supplier. We have years
                                        of experience examining
                                        applications and processes from all over the world. It is our goal to work with you
                                        as a member of your team to introduce and evaluate all the possible options for your
                                        applications.
                                    </p>
                                    <p style="margin-bottom: 7px;" class="moretext">We don’t simply sell our products, we
                                        work as a member of your
                                        company to provide
                                        with the best solutions to reduce your Total Cost of production and increase your
                                        capabilities. Bring us your problems, your difficult applications, your worst
                                        materials, your tightest tolerances, your biggest headaches we will find a solution
                                        that will help you deliver your product on time and in specification.
                                    </p>
                                    <p style="margin-bottom: 7px;" class="moretext">As set forth in our guiding policy: ”Our
                                        customers are the most
                                        important part of
                                        our business. Without them we would not be here.”
                                    </p><a class="moreless-button rem">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area  -->



        <!-- Start Best Sellers Product Area  -->
        <!-- Start Categories Area  -->
        <div class="axil-categorie-area bg-c bg-color-white axil-section-gap pb--0">
            <div class="container">
                <div class="pb--50">
                    <div class="section-title-wrapper">
                        <h2 class="title text-white">Our Clients</h2>
                    </div>
                    <div class="categrie-product-activation-3 slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\daikin.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\bkt.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\joorij.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\gold.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\hitachi.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\raja.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\maruti.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\short.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\motherson.png"
                                        alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\nilkamal.png"
                                        alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="assets\images\myimg\superme.png" alt="product categorie">
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- Start Why Choose Area  -->
        <div class="how-to-sell-area axil-section-gap">
            <div class="container">
                <div class="product-area">
                    <div class="section-title-wrapper section-title-center">
                        <h2 class="title">Why Choose Us</h2>
                        {{--
                        give me a short 2 lines description about these topics
                        1. 25+ Years of experience
                        2. International Tie Up’s & Collaborations
                        3. 1000+ Clients served across India
                        4. Trust, Transparency & Commitment 
                        --}}
                    </div>
                    <div class="row row-cols-xl-4 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1 row--20">
                        <div class="col">
                            <div class="service-box how-to-sell">
                                <div class="icon">
                                    <img src="assets/images/icons/choose.png" alt="Service">
                                </div>
                                <h6 class="title">25+ Years of experience</h6>
                                <p>Leveraging over 25 years of industry expertise to deliver best products and 
                                    innovative solutions.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="service-box how-to-sell">
                                <div class="icon">
                                    <img src="assets/images/icons/protection.png" alt="Service">
                                </div>
                                <h6 class="title">International Tie Up’s & Collaborations</h6>
                                <p>Strategic global partnerships enhancing our reach and capabilities for world-class
                                    service delivery.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="service-box how-to-sell">
                                <div class="icon">
                                    <img src="assets/images/icons/purchasing.png" alt="Service">
                                </div>
                                <h6 class="title">1000+ Clients served across India</h6>
                                <p>Trusted by over 1000 clients nationwide, providing tailored solutions and exceptional
                                    service. </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="service-box how-to-sell">
                                <div class="icon">
                                    <img src="assets/images/icons/dancing.png" alt="Service">
                                </div>
                                <h6 class="title">Trust, Transparency  <br> & Commitment</h6>
                                <p>Building long-term relationships through unwavering trust, clear communication, and
                                    dedicated service.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Why Choose Area  -->
        <!-- End  Best Sellers Product Area  -->

        <div class="axil-categorie-area statistic-section bg-color-white pb--0">
            <div class="container">
                <form action="{{ route('Newsletter.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="etrade-newsletter-wrapper bg_image ">
                        <!-- <div class="newsletter-content">
                                                                                                                                    <span class="title-highlighter highlighter-primary2">Newsletter</span> -->
                        {{-- <img src="./assets/images/logo/logo.png" alt=""> --}}
                        <h2 class="title mb--40 mb_sm--30">Subscribe to Stay Updated</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="email" name="email">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Start Axil Newsletter Area  -->
        <!-- Start Expolre Product Area  -->
        <!-- End Expolre Product Area  -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            // The function toggles more (hidden) text when the user clicks on "Read more". The IF ELSE statement ensures that the text 'read more' and 'read less' changes interchangeably when clicked on.
            $('.moreless-button').click(function() {
                $('.moretext').slideToggle();
                if ($('.moreless-button').text() == "Read more") {
                    $(this).text("Read less")
                } else {
                    $(this).text("Read more")
                }
            });
        </script>

    </main>
@endsection

@section('script')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
