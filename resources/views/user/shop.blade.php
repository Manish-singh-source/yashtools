@extends('user.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
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
                                @foreach ($breadcrumbs as $breadcrumb)
                                    @if (!$loop->last)
                                        <li class="breadcrumb-item">
                                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                                        </li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['name'] }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <h1 class="title">Explore All Products</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
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
                                            @if (!is_null($selectedCategories) && $selectedCategories == $category->category_slug)
                                                <li class="chosen" data-categoryid="{{ $category->id }}"><a
                                                        href="#">{{ $category->category_name }}</a></li>
                                            @else
                                                <li data-categoryid="{{ $category->id }}"><a
                                                        href="#">{{ $category->category_name }}</a></li>
                                            @endif
                                        @empty
                                            <li class="current-cat"><a href="#">Night Care</a></li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                            <div class="toggle-list product-categories product-subcategories-section active">
                                <h6 class="title">SUB CATEGORIES</h6>
                                <div class="shop-submenu">
                                    <ul id="sub_category_filter">

                                    </ul>
                                </div>
                            </div>

                            <div class="toggle-list product-categories product-gender active">
                                <h6 class="title">BRAND</h6>
                                <div class="shop-submenu">
                                    <ul id="brand_filter">
                                        @forelse ($brands as $brand)
                                            @if (!is_null($selectedCategories) && $selectedCategories == $brand->brand_slug)
                                                <li class="chosen" data-brandid="{{ $brand->id }}"><a
                                                        href="#">{{ $brand->brand_name }}</a></li>
                                            @else
                                                <li data-brandid="{{ $brand->id }}"><a
                                                        href="#">{{ $brand->brand_name }}</a></li>
                                            @endif
                                        @empty
                                            <li class="chosen"><a href="#">Men (40)</a></li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <div class="toggle-list product-categories product-gender active">
                                <h6 class="title">NEW PRODUCTS & SALE</h6>
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
    </main>
@endsection

@section('script')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".product-subcategories-section").hide();
            categoryFilter();
            fetchProducts();

            function fetchProducts(page = 1) {
                let sortBy = $('#sort_by').val();

                // Get all selected categories
                let selectedCategories = $("#category_filter li.chosen").map(function() {
                    return $(this).data("categoryid");
                }).get(); // Convert jQuery object to an array

                let selectedSubCategories = $("#sub_category_filter li.chosen").map(function() {
                    return $(this).data("subcategoryid");
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
                        subcategory: selectedSubCategories,
                        brand: selectedBrand,
                        tags: selectedTags
                    },
                    success: function(response) {
                        $('#product_list').html('');
                        $.each(response.data, function(index, product) {
                            $('#product_list').append(
                                `<div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="/single-product/${product.product_slug}">
                                                <img
                                                    src="{{ asset('uploads/products/thumbnails/${product.product_thumbain}') }}"
                                                    alt="Product Images">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a
                                                        href="/single-product/${product.product_slug}">${product.product_name}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
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
            $('#sort_by').change(function() {
                categoryFilter();
                fetchProducts();
            });

            $("#category_filter").on("click", "li", function() {
                $(this).toggleClass("chosen");
                if ($(this).find('chosen')) {
                    $(".product-subcategories-section").show();
                } else {
                    $(".product-subcategories-section").show();
                }
                categoryFilter();
                fetchProducts();
            });

            $("#sub_category_filter").on("click", "li", function() {
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

            $(document).on('click', '.pagination-link', function() {
                let pageUrl = $(this).data('page');
                let urlParams = new URLSearchParams(pageUrl.split('?')[1]);
                let pageNumber = urlParams.get('page'); // Extract page number from URL

                if (pageNumber) {
                    fetchProducts(pageNumber);
                }
            });


            $(document).on('click', '#resetFilters', function() {
                $(".product-subcategories-section").hide();
                $("#category_filter li").map((index, element) => {
                    $(element).removeClass("chosen");
                });

                $("#sub_category_filter li").map((index, element) => {
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

            function categoryFilter() {
                let subcategories = $("#category_filter li.chosen").map(function() {
                    return $(this).data("categoryid");
                }).get();

                if (subcategories.length === 0) {
                    $("#sub_category_filter li").map((index, element) => {
                        $(element).removeClass("chosen");
                    });
                    $(".product-subcategories-section").hide();
                } else {
                    $(".product-subcategories-section").show();
                }

                $.ajax({
                    url: "/shop-api-category-filter",
                    type: "GET",
                    data: {
                        subcategory: subcategories,
                    },
                    success: function(response) {
                        $('#sub_category_filter').html('');
                        $.each(response, function(index, product) {
                            $('#sub_category_filter').append(
                                `<li data-subcategoryid="${product.id}"><a href="#">${product.sub_category_name}</a></li>`
                            );
                        });
                    }
                });
            }
        });
    </script>
@endsection
