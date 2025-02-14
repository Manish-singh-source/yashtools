@extends('user.layouts.masterlayout')
@section('style')
    <style>
        .date-filter {
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
                                <li class="axil-breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Favourites
                                </li>
                            </ul>
                            <h1 class="title">My Favourites</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Wishlist Area  -->
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-shop-top">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="category-select">



                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                        <!-- Start Single Select  -->
                                        <select class="single-select">
                                            <option>Sort by Latest</option>
                                            <option>Sort by Name</option>
                                            <option>Sort by Viewed</option>
                                        </select>
                                        <!-- End Single Select  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row--15 mt-5">
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="productdetails.php">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets\images\product\1.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="#" contenteditable="false"
                                                style="cursor: pointer;"><i class="far fa-bookmark"></i>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="productdetails.php">Slides & Accessiries </a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="productdetails.php">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets\images\product\2.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="#" contenteditable="false"
                                                style="cursor: pointer;"><i class="far fa-bookmark"></i>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="productdetails.php">Side Core Base</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="productdetails.php">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets\images\product\3.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="#" contenteditable="false"
                                                style="cursor: pointer;"><i class="far fa-bookmark"></i>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="productdetails.php">Guide Rail</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="productdetails.php">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets\images\product\4.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="#" contenteditable="false"
                                                style="cursor: pointer;"><i class="far fa-bookmark"></i>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="productdetails.php">center Guide Rail</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                </div>
                <div class="text-center pt--30">
                    <div class="center">
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->

        </div>
        <!-- End Wishlist Area  -->


    </main>
@endsection
