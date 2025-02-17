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

        /* Hide nested submenus by default */
        /* General Dropdown Styling */
    </style>
@endsection

@section('content')
    <main class="main-wrapper">

        <div class="slider">
            <div class="slide" style="var()">
            </div>
            <div class="slide"></div>
            <div class="slide"></div>
            <ul class="slide-nav"></ul>
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
                                        <a href="{{ route('user.shop') }}">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                src="{{ asset('uploads/categories/' . $category->category_image) }}"
                                                alt="Product Images">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a
                                                    href="{{ route('user.shop') }}">{{ $category->category_name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="shop.php">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                src="assets\images\myimg\1.png" alt="Product Images">
                                        </a>

                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="shop.php">SLIDES & ACCESSORIES</a></h5>
                                        </div>
                                    </div>
                                </div>
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
                                        <a href="{{ route('user.shop') }}">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                src="{{ asset('uploads/brands/' . $brand->brand_image) }}"
                                                alt="Product Images">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a
                                                    href="{{ route('user.shop') }}">{{ $brand->brand_name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="shop.php">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                src="assets\images\myimg\2.png" alt="Product Images">
                                        </a>

                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="shop.php">Side Core Base</a></h5>
                                        </div>
                                    </div>
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
                                    <p>
                                        YASH TOOLS ( I ) PVT. LTD. was founded on the principle of working together with
                                        our customers to fully understand your individual applications and needs and
                                        making every effort to provide you with the best possible solutions.

                                        This focus encompasses supplying the best products from around the world,
                                        introducing the best technology, providing ongoing service, and continuous
                                        follow-up to ensure our solutions are exceeding all your requirements.

                                        OToday most companies are facing ever increasing pressure to reduce costs and
                                        improve productivity. Reducing costs goes beyond the simple cost of acquisition
                                        of tools, equipments and other supplies. We need to look at the Total Cost of
                                        Production. Focusing solely on the basic cost of acquisition is doomed to
                                        failure.

                                        Reducing the Total Cost of Production requires examining many factors such as
                                        the tools, machines, technology, processes, operator training and methods. To
                                        achieve the goal of reducing the Total Cost of Production we need the
                                        cooperation of the entire team from purchasing, engineering, operators and
                                        suppliers.

                                        YASH TOOLS fills the role of tool supplier. We have years of experience
                                        examining applications and processes from all over the world. It is our goal to
                                        work with you as a member of your team to introduce and evaluate all the
                                        possible options for your applications.

                                        We don’t want to simply sell you products we want to work as a member of your
                                        company to provide you with the best solutions to reduce your Total Cost of
                                        Production and increase your capabilities.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area  -->



        <!-- Start Slider Area -->
        <!-- <div class="axil-main-slider-area main-slider-style-3">
                                                                                    <div class="container">
                                                                                        <div class="row align-items-center">
                                                                                            <div class="col-xl-6 col-lg-6">
                                                                                                <div class="main-slider-content">
                                                                                                    <span class="subtitle"><i class="fas fa-fire"></i>Largest NFT marketplace</span>
                                                                                                    <h1 class="title">Discover, collect, and sell extraordinary NFTs</h1>
                                                                                                    <div class="shop-btn">
                                                                                                        <a href="shop.php" class="axil-btn btn-bg-white right-icon">Explore <i class="fal fa-long-arrow-right"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xl-6 col-lg-6">
                                                                                                <div class="main-slider-large-thumb">
                                                                                                    <div class="slider-thumb-activation-two axil-slick-dots">
                                                                                                        <div class="single-slide slick-slide">
                                                                                                            <div class="axil-product product-style-five">
                                                                                                                <div class="thumbnail">
                                                                                                                    <a href="single-product-7.php">
                                                                                                                        <img src="assets/images/product/nft/product-17.png" alt="Product Images">
                                                                                                                    </a>

                                                                                                                </div>
                                                                                                                <div class="product-content">
                                                                                                                    <div class="inner">
                                                                                                                        <h5 class="title"><a href="single-product-7.php">Anime #001</a></h5>
                                                                                                                        <div class="product-price-variant">
                                                                                                                            <span class="price current-price">$5000</span>
                                                                                                                        </div>
                                                                                                                        <ul class="cart-action">
                                                                                                                            <li class="select-option"><a href="single-product-7.php">Buy Product</a></li>
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="single-slide slick-slide">
                                                                                                            <div class="axil-product product-style-five">
                                                                                                                <div class="thumbnail">
                                                                                                                    <a href="single-product-7.php">
                                                                                                                        <img src="assets/images/product/nft/product-16.png" alt="Product Images">
                                                                                                                    </a>

                                                                                                                </div>
                                                                                                                <div class="product-content">
                                                                                                                    <div class="inner">
                                                                                                                        <h5 class="title"><a href="single-product-7.php">Anime #002</a></h5>
                                                                                                                        <div class="product-price-variant">
                                                                                                                            <span class="price current-price">$5000</span>
                                                                                                                        </div>
                                                                                                                        <ul class="cart-action">
                                                                                                                            <li class="select-option"><a href="single-product-7.php">Buy Product</a></li>
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="single-slide slick-slide">
                                                                                                            <div class="axil-product product-style-five">
                                                                                                                <div class="thumbnail">
                                                                                                                    <a href="single-product-7.php">
                                                                                                                        <img src="assets/images/product/nft/product-15.png" alt="Product Images">
                                                                                                                    </a>

                                                                                                                </div>
                                                                                                                <div class="product-content">
                                                                                                                    <div class="inner">
                                                                                                                        <h5 class="title"><a href="single-product-7.php">Anime #003</a></h5>
                                                                                                                        <div class="product-price-variant">
                                                                                                                            <span class="price current-price">$5000</span>
                                                                                                                        </div>
                                                                                                                        <ul class="cart-action">
                                                                                                                            <li class="select-option"><a href="single-product-7.php">Buy Product</a></li>
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="single-slide slick-slide">
                                                                                                            <div class="axil-product product-style-five">
                                                                                                                <div class="thumbnail">
                                                                                                                    <a href="single-product-7.php">
                                                                                                                        <img src="assets/images/product/nft/product-1.png" alt="Product Images">
                                                                                                                    </a>

                                                                                                                </div>
                                                                                                                <div class="product-content">
                                                                                                                    <div class="inner">
                                                                                                                        <h5 class="title"><a href="single-product-7.php">Anime #004</a></h5>
                                                                                                                        <div class="product-price-variant">
                                                                                                                            <span class="price current-price">$5000</span>
                                                                                                                        </div>
                                                                                                                        <ul class="cart-action">
                                                                                                                            <li class="select-option"><a href="single-product-7.php">Buy Product</a></li>
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
        <!-- End Slider Area -->

        <!-- Start Best Sellers Product Area  -->
        <!-- Start Categorie Area  -->
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
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg\gesswein_logo.png"
                                        alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <!-- End .categrie-product -->
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg/100368.webp" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <!-- End .categrie-product -->
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg/vijaydeep.png"
                                        alt="product categorie">
                                </a>
                            </div>
                            <!-- End .categrie-product -->
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg\misumi.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <!-- End .categrie-product -->
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg\kojex.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <!-- End .categrie-product -->
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg\gesswein_logo.png"
                                        alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <!-- End .categrie-product -->
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg/100368.webp" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <!-- End .categrie-product -->
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg/vijaydeep.png"
                                        alt="product categorie">
                                </a>
                            </div>
                            <!-- End .categrie-product -->
                        </div>
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg\misumi.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <!-- End .categrie-product -->
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                                data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="assets\images\myimg\kojex.png" alt="product categorie">
                                </a>
                            </div>
                        </div>
                        <!-- End .categrie-product -->


                        <!-- End .slick-single-layout -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Categorie Area  -->
        <!-- Start Why Choose Area  -->
        <div class="how-to-sell-area axil-section-gap">
            <div class="container">
                <div class="product-area">
                    <div class="section-title-wrapper section-title-center">
                        <h2 class="title">Why Choose Us</h2>
                    </div>
                    <div class="row row-cols-xl-4 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1 row--20">
                        <div class="col">
                            <div class="service-box how-to-sell">
                                <div class="icon">
                                    <img src="assets/images/icons/choose.png" alt="Service">
                                </div>
                                <h6 class="title">25 years of experience</h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas expedita veritatis
                                    ipsum, culpa, asperiores.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="service-box how-to-sell">
                                <div class="icon">
                                    <img src="assets/images/icons/protection.png" alt="Service">
                                </div>
                                <h6 class="title">Product Range</h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas expedita veritatis
                                    ipsum, culpa, asperiores.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="service-box how-to-sell">
                                <div class="icon">
                                    <img src="assets/images/icons/purchasing.png" alt="Service">
                                </div>
                                <h6 class="title">Trust</h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas expedita veritatis
                                    ipsum, culpa, asperiores.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="service-box how-to-sell">
                                <div class="icon">
                                    <img src="assets/images/icons/dancing.png" alt="Service">
                                </div>
                                <h6 class="title">Commitment</h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas expedita veritatis
                                    ipsum, culpa, asperiores.</p>
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
                <div class="">
                    <div class="etrade-newsletter-wrapper bg_image ">
                        <!-- <div class="newsletter-content">
                                                                                                <span class="title-highlighter highlighter-primary2">Newsletter</span> -->
                        <img src="./assets/images/logo/logo.png" alt="">
                        <h2 class="title mb--40 mb_sm--30">Subscribe to Stay Updated</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Axil Newsletter Area  -->
        <!-- Start Expolre Product Area  -->
        <!-- End Expolre Product Area  -->


    </main>
@endsection

@section('script')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
