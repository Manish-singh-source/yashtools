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
                                <ul id="category_filter">
                                    @forelse ($categories as $category)
                                        <li data-categoryid="{{ $category->id }}"><a
                                                href="#">{{ $category->category_name }}</a></li>
                                    @empty
                                        <li class="current-cat"><a href="#">Night Care</a></li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="toggle-list product-categories product-gender active">
                            <h6 class="title">Brand</h6>
                            <div class="shop-submenu">
                                <ul id="brand_filter">
                                    @forelse ($brands as $brand)
                                        <li data-brandid="{{ $brand->id }}"><a
                                                href="#">{{ $brand->brand_name }}</a></li>
                                    @empty
                                        <li class="chosen"><a href="#">Men (40)</a></li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="toggle-list product-categories product-gender active">
                            <h6 class="title">New & Sale</h6>
                            <div class="shop-submenu">
                                <ul id="tags_filter">
                                    <li data-tagid="new"><a href="#">New Products</a></li>
                                    <li data-tagid="offer"><a href="#">Sale</a></li>
                                </ul>
                            </div>
                        </div>
                        <button class="axil-btn btn-bg-primary" id="resetFilters">All Reset</button>
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
                                    <span class="filter-results">
                                        {{-- Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of
                                        {{ $products->total() }}
                                        results --}}
                                    </span>
                                    <select class="single-select" id="sort_by">
                                        <option value="">Sort By</option>
                                        <option value="latest">Short by Latest</option>
                                        <option value="by_name">Short by Name</option>
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
                    <div class="row row--15 mt-5" id="product_list">
                    </div>

                    <!-- Pagination Links -->
                    <div id="pagination_links"></div>

                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            fetchProducts();

            function fetchProducts(page = 1) {
                let sortBy = $('#sort_by').val();

                // Get all selected categories
                let selectedCategories = $("#category_filter li.chosen").map(function() {
                    return $(this).data("categoryid");
                }).get(); // Convert jQuery object to an array

                // Get all selected categories
                let selectedBrand = $("#brand_filter li.chosen").map(function() {
                    return $(this).data("brandid");
                }).get(); // Convert jQuery object to an array

                // Get all selected categories
                let selectedTags = $("#tags_filter li.chosen").map(function() {
                    return $(this).data("tagid");
                }).get(); // Convert jQuery object to an array

                $.ajax({
                    url: "/shop-api?page=" + page,
                    type: "GET",
                    data: {
                        sort_by: sortBy,
                        category: selectedCategories,
                        brand: selectedBrand,
                        tags: selectedTags
                    },
                    success: function(response) {
                        $('#product_list').html('');
                        $.each(response.data, function(index, product) {
                            // console.log(index);
                            // console.log(product);
                            $('#product_list').append(
                                `<div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="/product-detail-info/${product.product_slug}">
                                                <img
                                                    src="{{ asset('uploads/products/thumbnails/${product.product_thumbain}') }}"
                                                    alt="Product Images">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a
                                                        href="/product-detail-info/${product.product_slug}">${product.product_name}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                            );
                        });

                        // Pagination Links
                        $('#pagination_links').html('');
                        if (response.links) {
                            $.each(response.links, function(index, link) {
                                if (link.url) {
                                    $('#pagination_links').append(
                                        `<div class="text-center pt--30">
                                            <div class="center">
                                                <div class="pagination">
                                                    <a href="#">&laquo;</a>
                                                    <a href="${link.url}" class="active">${link.label}</a>
                                                    <a href="#">&raquo;</a>
                                                </div>
                                            </div>
                                        </div>`
                                    );
                                }
                            });
                        }
                    }
                });
            }

            // Sort and Filter Change Events
            $('#sort_by').change(function() {
                fetchProducts();
            });

            $("#category_filter").on("click", "li", function() {
                $(this).toggleClass("chosen");
                fetchProducts();
            });

            $("#brand_filter").on("click", "li", function() {
                $(this).toggleClass("chosen");
                fetchProducts();
            });

            $("#tags_filter").on("click", "li", function() {
                $(this).toggleClass("chosen");
                fetchProducts();
            });

            // Handle Pagination Click
            $(document).on('click', '.pagination-link', function() {
                let pageUrl = $(this).data('page');
                let pageNumber = pageUrl.split('=')[1]; // Extract page number
                fetchProducts(pageNumber);
            });

            $(document).on('click', '#resetFilters', function() {
                $("#category_filter li").map((index, element) => {
                    $(element).removeClass("chosen");
                });

                $("#brand_filter li").map((index, element) => {
                    $(element).removeClass("chosen");
                });

                $("#tags_filter li").map((index, element) => {
                    $(element).removeClass("chosen");
                });
                fetchProducts();
            });
        });
    </script>
@endsection
