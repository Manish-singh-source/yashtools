@extends('user.layouts.masterlayout')


@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


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

                <div class="row row--15 mt-5">
                    @forelse ($favouriteItems as $item)
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="{{ route('user.single.product', $item->products->product_slug) }}">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="uploads/products/thumbnails/{{ $item->products->product_thumbain }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist">
                                                @isset($favouriteItems->status)
                                                    @if ($favouriteItems->status == '1')
                                                        <a class="wishlist-btn text-danger" id="wishlistBtn"
                                                            data-productid="{{ $favouriteItems->id }}">
                                                            <i class="fas fa-heart text-danger"></i>
                                                        </a>
                                                        <input type="hidden" value="active" class="status">
                                                    @else
                                                        <a class="wishlist-btn" id="wishlistBtn"
                                                            data-productid="{{ $favouriteItems->id }}">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <input type="hidden" value="inactive" class="status">
                                                    @endif
                                                @else
                                                    <a class="wishlist-btn" id="wishlistBtn"
                                                        data-productid="{{ $item->products->id }}">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @endisset
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a
                                                href="{{ route('user.single.product', $item->products->product_slug) }}">{{ $item->products->product_name }}
                                            </a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>No Items On Favourites</div>
                    @endforelse
                </div>
                {{ $favouriteItems->links('user.layouts.pagination') }}
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->

        </div>
        <!-- End Wishlist Area  -->


    </main>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $("#showError").hide();
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $(document).on("click", "#wishlistBtn", function() {
                let productid = $(this).data("productid");
                let productStatus = $(this).siblings(".status").val() || 0;

                console.log(productid)
                console.log(productStatus)

                $.ajax({
                    url: "/check-auth", // Check if the user is logged in
                    type: "GET",
                    success: function(response) {
                        if (!response.isAuthenticated) {
                            $("#showError").show();
                            $("#showError").html(
                                "Please <a href='/signin'>register</a> to add Product to favourites"
                            ); // Show login popup
                            return;
                        }

                        $.ajax({
                            url: "/add-to-favourite",
                            type: "POST",
                            data: {
                                productid: productid,
                                productStatus: productStatus,
                            },
                            success: function(data) {
                                if (data.status) {
                                    console.log(data.status);
                                    console.log(data.message);
                                    console.log(data.data);
                                    location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                            },
                        });

                    }
                });
            });
        });
    </script>
@endsection
