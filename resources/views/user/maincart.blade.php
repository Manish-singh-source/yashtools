@extends('user.layouts.masterlayout')
@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">My Cart</li>
                        </ul>
                        <h1 class="title">My Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->
    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 cartbx">
                    <div class="">
                        <a href="{{ route('user.product.category') }}" class="conts">Please Continue Shopping to Add
                            Products</a>
                    </div>
                    <div class="clear-all-cart">
                        <a href="#" class="crlar">Clear Shoping Cart</a>
                    </div>
                </div>
                <div class="axil-product-cart-wrap">


                    <div class="table-responsive">
                        <table class="table axil-product-table axil-cart-table mb--40">
                            <thead>
                                <tr>
                                    <th scope="col" class="product-thumbnail">Date</th>
                                    <th scope="col" class="product-thumbnail">Product</th>
                                    <th scope="col" class="product-title">Title</th>
                                    <th scope="col" class="product-price">Part No</th>
                                    <th scope="col" class="product-quantity">Quantity</th>
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-remove">Action</th>
                                </tr>
                            </thead>
                            @forelse ($groupedCartItems as $date => $cartItems)
                                <tbody class="cart-items-list">
                                    @foreach ($cartItems as $index => $cartItem)
                                        <tr>
                                            @if ($index === 0)
                                                {{-- Apply rowspan only on the first row --}}
                                                <td rowspan="{{ $cartItems->count() }}" class="vlt">{{ $date }}
                                                </td>
                                            @endif
                                            <td class="product-thumbnail">
                                                <a
                                                    href="{{ route('user.product.details', $cartItem->products->product_slug) }}"><img
                                                        src="{{ asset('uploads/products/thumbnails/' . $cartItem->products->product_thumbain) }}"
                                                        alt="Digital Product"></a>
                                            </td>
                                            <td class="product-title">
                                                <a
                                                    href="{{ route('user.product.details', $cartItem->products->product_slug) }}">{{ $cartItem->products->product_name }}</a>
                                            </td>
                                            <td class="partNumber">{{ $cartItem->part_number }}</td>
                                            <input type="hidden" name="productId" class="productId"
                                                value="{{ $cartItem->products->id }}">
                                            <input type="hidden" name="userId" class="userId"
                                                value="{{ Auth::id() }}">
                                            <input type="hidden" class="cartId" value="{{ $cartItem->id }}">
                                            <td class="product-info" data-title="Qty">
                                                <div class="pro-qty">
                                                    <input type="number" class="enquiryQuantity" value="1">
                                                </div>
                                            </td>
                                            <td class="product-remove">
                                                <a href="#" data-cartid="{{ $cartItem->id }}"
                                                    class="remove-wishlist"><i class="fal fa-times"></i></a>
                                            </td>
                                            @if ($index === 0)
                                                <td rowspan="{{ $cartItems->count() }}" id="addEnquiry" class="vlt">
                                                    <a href="#" class="cartbtn">Send Enquiry</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <td class="text-center" colspan="7">You Don't have any cart itmes <a
                                                href="{{ route('user.product.category') }}">Shop Now</a></td>
                                    </tr>
                                </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(document).on("click", ".remove-wishlist", function() {
            let cartid = $(this).data("cartid");
            console.log(cartid);

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
                        url: "/remove-cart-item",
                        type: "POST",
                        data: {
                            cartid: cartid,
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


        $(document).on("click", "#addEnquiry", function() {
            let parentTBody = $(this).closest(".cart-items-list");
            let cartList = $(parentTBody).children();
            let cartData = [];

            cartList.each(function() {
                let productId = $(this).find(".productId").val();
                let userId = $(this).find(".userId").val();
                let enquiryQuantity = $(this).find(".enquiryQuantity").val();
                let partNumber = $(this).find(".partNumber").text();

                cartData.push({
                    productId: productId,
                    userId: userId,
                    enquiryQuantity: enquiryQuantity,
                    partNumber: partNumber
                });
            });

            console.log(cartData); // Debugging

            // Check authentication before sending enquiry
            $.ajax({
                url: "/check-auth",
                type: "GET",
                success: function(response) {
                    if (!response.isAuthenticated) {
                        $("#showError").show().html(
                            "Please <a href='/signin'>register</a> to send an enquiry."
                        );
                        return;
                    }

                    // Send all items in a single request
                    $.ajax({
                        url: "/add-enquiry",
                        type: "POST",
                        data: {
                            cartData: cartData
                        },
                        success: function(data) {
                            if (data.status) {
                                console.log(data.message);
                                location.reload(); // Reload page after successful enquiry
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", error);
                        }
                    });

                }
            });
        });


        $(document).on("click", ".clear-all-cart", function() {
            var cartItems = [];

            $('.cartId').each(function() {
                cartItems.push($(this).val());
            });

            $.ajax({
                url: "/check-auth", // Check if the user is logged in
                type: "GET",
                success: function(response) {
                    if (!response.isAuthenticated) {
                        $("#showError").show();
                        $("#showError").html(
                            "Please <a href='/signin'>register</a> to add Product to favourites"
                        );
                        return;
                    }

                    $.ajax({
                        url: "/remove-all-cart-item",
                        type: "POST",
                        data: {
                            cartItems: cartItems
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
    </script>
@endsection
