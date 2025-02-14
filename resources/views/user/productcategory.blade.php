@extends('user.layouts.masterlayout')

@section('content')
    <div class="container-fluid">
        <div class="row text-center mhedc">
            <div class="col-lg-3">
                <a href="productcategory.php">
                    <div class="w-100 tagnew1 cth"><i class="fa fa-list"></i>
                        Categories</div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="productbrand.php">
                    <div class="w-100 tagnew1"><i class="fa fa-briefcase"></i>
                        Brand</div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="#">
                    <div class="w-100 tagnew1"><i class="fa fa-tags"></i>
                        New Products</div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="#">
                    <div class="w-100 tagnew1"><i class="fa fa-tags"></i>
                        Sale</div>
                </a>
            </div>
        </div>
    </div>
    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="axil-shop-sidebar">
                        <div class="d-lg-none">
                            <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="toggle-list product-categories active">
                            <h6 class="title">CATEGORIES</h6>
                            <div class="shop-submenu">
                                <ul>
                                    <li class="current-cat"><a href="#">Sun Care</a></li>
                                    <li><a href="#">Night Care</a></li>
                                    <li><a href="#">Treatments</a></li>
                                    <li><a href="#">Moisturizers</a></li>
                                    <li><a href="#">Eye Care</a></li>
                                    <li><a href="#">Masks</a></li>
                                    <li><a href="#">Featured</a></li>
                                    <li><a href="#">On Sale</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="toggle-list product-categories product-gender active">
                            <h6 class="title">Brand</h6>
                            <div class="shop-submenu">
                                <ul>
                                    <li class="chosen"><a href="#">Men (40)</a></li>
                                    <li><a href="#">Women (56)</a></li>
                                    <li><a href="#">Unisex (18)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="toggle-list product-categories product-gender active">
                            <h6 class="title">New & Sale</h6>
                            <div class="shop-submenu">
                                <ul>
                                    <li class="chosen"><a href="#">New Products</a></li>
                                    <li><a href="#">Sale</a></li>
                                </ul>
                            </div>
                        </div>
                        <button class="axil-btn btn-bg-primary">All Reset</button>
                    </div>
                    <!-- End .axil-shop-sidebar -->
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="axil-shop-top mb--20">
                                <div
                                    class="category-select align-items-center justify-content-lg-end justify-content-between">
                                    <!-- Start Single Select  -->
                                    <span class="filter-results">Showing 1-12 of 84 results</span>
                                    <select class="single-select">
                                        <option>Short by Latest</option>
                                        <option>Short by Name</option>
                                    </select>
                                    <!-- End Single Select  -->
                                </div>
                                <div class="d-lg-none">
                                    <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i>
                                        FILTER</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .row -->
                    <div class="row row--15 mt-5">
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\1.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">Slides & Accessiries </a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\2.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">Side Core Base</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\3.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">Guide Rail</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\4.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">center Guide Rail</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\5.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">Wear Plate</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\6.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">Best Consultation</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\7.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">Part & Mould
                                                Identification</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\8.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">International Meet</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\1.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">SLIDES & ACCESSORIES</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\2.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">Side Core Base</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\3.png" alt="Product Images">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="productdetails.php">Guide Rail</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="productdetails.php">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets\images\product\4.png" alt="Product Images">
                                    </a>

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
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->
@endsection
