@extends('user.layouts.masterlayout')
@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('style')
    <style>
        .product-quantity,
        .product-info {
            width: 100px;
            margin-right: 20px;
            margin-left: 20px;
        }

        .pro-qty {
            width: auto;
            display: flex;
            align-items: center;
        }

        .pro-qty .enquiryQuantity {
            width: auto;
            min-width: 30px;
            border: 1px solid #ccc;
            padding: 4px 6px;
            font-size: 14px;
        }
    </style>
@endsection

@section('content')
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
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
                        <a href="{{ route('user.product.category') }}" class="conts">Please Continue Shopping</a>
                    </div>
                    <div class="clear-all-cart">
                        <a href="#" class="crlar">Clear Shoping Cart</a>
                    </div>
                </div>
                <div class="axil-product-cart-wrap">


                    <div class="table-responsive">
                        <table class="table axil-product-table axil-cart-table mb--40">
                            <thead>
                                <tr class="text-start">
                                    <th scope="col" class="product-thumbnail">Date</th>
                                    <th scope="col" class="product-thumbnail">Product</th>
                                    <th scope="col" class="product-title">Title</th>
                                    <th scope="col" class="product-price">Part&nbsp;No</th>
                                    <th scope="col" class="product-quantity">Quantity</th>
                                    @if (Auth::user()->customer_type != 'regular')
                                        <th scope="col" class="product-price">Original&nbsp;Price</th>
                                        <th scope="col" class="product-price">Discount</th>
                                        <th scope="col" class="product-price">Price&nbsp;Per&nbsp;Peice</th>
                                        <th scope="col" class="product-price">Total&nbsp;Price</th>
                                    @endif
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-remove">Action</th>
                                </tr>
                            </thead>
                            @forelse ($groupedCartItems as $date => $cartItems)
                                <tbody class="cart-items-list">
                                    @foreach ($cartItems as $index => $cartItem)
                                        <tr class="text-start">
                                            @if ($index === 0)
                                                {{-- Apply rowspan only on the first row --}}
                                                <td rowspan="{{ $cartItems->count() }}" class="vlt">
                                                    {{ \Carbon\Carbon::parse($date)->format('d-M-Y') }}
                                                </td>
                                            @endif
                                            <td class="product-thumbnail">
                                                <a
                                                    href="{{ route('user.product.details', $cartItem->products->product_slug) }}"><img
                                                        src="{{ asset('/uploads/products/thumbnails/' . $cartItem->products->product_thumbain) }}"
                                                        alt="Digital Product"></a>
                                            </td>
                                            <td class="product-title">
                                                <input type="hidden" name="productId" class="productId"
                                                    value="{{ $cartItem->products->id }}">
                                                <input type="hidden" name="userId" class="userId"
                                                    value="{{ Auth::id() }}">
                                                <input type="hidden" class="cartId" value="{{ $cartItem->id }}">
                                                <a
                                                    href="{{ route('user.product.details', $cartItem->products->product_slug) }}">{{ $cartItem->products->product_name }}</a>
                                            </td>
                                            <td class="partNumber">{{ $cartItem->part_number }}</td>
                                            <td class="product-info" data-title="Qty">
                                                <div class="pro-qty">
                                                    <span class="dec qtybtn">-</span>
                                                    <input type="number" min="1" step="1"
                                                        class="enquiryQuantity" value="{{ $cartItem->quantity ?? 1 }}">
                                                    <span class="inc qtybtn">+</span>
                                                </div>
                                            </td>
                                            @if (Auth::user()->customer_type != 'regular')
                                                <td class="original-price" data-title="Price">
                                                    {{ $cartItem->original_price }}
                                                </td>
                                                <td class="discounted-percentage" data-title="Price">
                                                    {{ $cartItem->discount }}
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    {{ $cartItem->price }}
                                                </td>
                                                <td class="products-total-price" data-title="Price">
                                                    {{ $cartItem->total }}
                                                </td>
                                            @endif
                                            <td class="product-remove">
                                                <a href="#" data-cartid="{{ $cartItem->id }}"
                                                    class="remove-wishlist"><i class="fal fa-times"></i></a>
                                            </td>
                                            @if ($index === 0)
                                                <td rowspan="{{ $cartItems->count() }}" id="addEnquiry" class="vlt">
                                                    <a href="#" class="cartbtn">Place Order(s)</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <td class="text-center" colspan="9">You don't have any items in your cart. <a
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        // Helper function to format number with commas for display only
        function formatPriceDisplay(number) {
            return parseFloat(number).toLocaleString('en-IN', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        // Helper function to extract numeric value from formatted price string
        function extractNumericPrice(priceText) {
            return parseFloat(priceText.replace(/[^0-9.\-]/g, ''));
        }

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(document).on("click", ".remove-wishlist", function() {
            let cartid = $(this).data("cartid");

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
            var button = $(this).prop("disabled", true);
            button.find("a").text("Processing...");

            let parentTBody = $(this).closest(".cart-items-list");
            let cartList = $(parentTBody).children();
            let cartData = [];

            cartList.each(function() {
                let productId = $(this).find(".productId").val();
                let userId = $(this).find(".userId").val();
                let enquiryQuantity = $(this).find(".enquiryQuantity").val();
                let partNumber = $(this).find(".partNumber").text();
                let price = $(this).find(".product-price").text();
                let totalPrice = $(this).find(".products-total-price").text();
                let discountedPercentage = $(this).find(".discounted-percentage").text();
                let originalPrice = $(this).find(".original-price").text();

                cartData.push({
                    productId: productId,
                    userId: userId,
                    enquiryQuantity: enquiryQuantity,
                    partNumber: partNumber,
                    price: price,
                    totalPrice: totalPrice,
                    discountPercentage: discountedPercentage,
                    originalPrice: originalPrice
                });
            });


            // Check authentication before sending enquiry
            $.ajax({
                url: "/check-auth",
                type: "GET",
                success: function(response) {
                    if (!response.isAuthenticated) {
                        $("#showError").show().html(
                            "Please <a href='/signin'>register</a> to send an order."
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
                                location.reload(); // Reload page after successful enquiry
                            }
                        },
                        error: function(xhr, status, error) {
                            location.reload(); // Reload page after successful enquiry
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

        $(document).on("change", ".enquiryQuantity", function() {
            let quantity = $(this).val();
            if (quantity < 1) {
                quantity = 1;
                $(this).val(1);
            }
            priceCal($(this));
        });

        $(document).on("click", ".qtybtn", function() {
            var $input = $(this).closest(".pro-qty").find(".enquiryQuantity");
            let quantity = parseInt($input.val()) || 0;
            if (quantity < 1) {
                quantity = 1;
                $input.val(1);
            }
            priceCal($input);
        });

        function priceCal($input) {
            // $input is a jQuery object for the quantity input
            var quantity = parseFloat($input.val());
            if (isNaN(quantity) || quantity < 0) quantity = 0;

            // Find the price text in the same row and extract numeric value
            var priceText = $input.closest("tr").find(".product-price").text() || '';
            // Use helper function to extract numeric value safely
            var priceNum = extractNumericPrice(priceText);
            if (isNaN(priceNum)) priceNum = 0;

            var total = quantity * priceNum;
            // Update total cell (if present) — format to 2 decimals with comma display
            var $totalCell = $input.closest("tr").find(".products-total-price");
            if ($totalCell.length) {
                $totalCell.text(formatPriceDisplay(total));
            }
            return total;
        }

        document.querySelectorAll('.enquiryQuantity').forEach(function(input) {
            // Ensure attributes exist and enforce minimum value of 1
            input.setAttribute('min', '1');
            input.setAttribute('step', '1');
            // initialize width based on content
            input.style.width = input.value.length + 1 + 'ch';
            input.addEventListener('input', function() {
                if (this.value === '') return;
                if (parseInt(this.value) < 1) this.value = 1;
                this.style.width = (this.value.length + 1) + 'ch';
            });
            input.addEventListener('paste', function() {
                setTimeout(() => {
                    if (this.value === '') return;
                    if (parseInt(this.value) < 1) this.value = 1;
                    this.style.width = (this.value.length + 1) + 'ch';
                }, 0);
            });
        });

        // Format all existing prices on page load (display only, doesn't affect logic)
        $(document).ready(function() {
            // Format price-per-piece column
            $('td.product-price').each(function() {
                var priceText = $(this).text();
                if (priceText && priceText !== '-') {
                    var numPrice = extractNumericPrice(priceText);
                    if (!isNaN(numPrice)) {
                        $(this).text(formatPriceDisplay(numPrice));
                    }
                }
            });

            // Format total-price column
            $('td.products-total-price').each(function() {
                var priceText = $(this).text();
                if (priceText && priceText !== '-') {
                    var numPrice = extractNumericPrice(priceText);
                    if (!isNaN(numPrice)) {
                        $(this).text(formatPriceDisplay(numPrice));
                    }
                }
            });

            // Format original-price column
            $('td.original-price').each(function() {
                var priceText = $(this).text();
                if (priceText && priceText !== '-') {
                    var numPrice = extractNumericPrice(priceText);
                    if (!isNaN(numPrice)) {
                        $(this).text(formatPriceDisplay(numPrice));
                    }
                }
            });
        });
    </script>
@endsection
