@extends('user.layouts.masterlayout')

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
                    <div class="">
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
                                    <th scope="col" class="product-title"></th>
                                    <th scope="col" class="product-price">Part No</th>
                                    <th scope="col" class="product-quantity">Quantity</th>
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-remove">Action</th>
                                </tr>
                            </thead>
                            @foreach ($groupedCartItems as $date => $cartItems)
                                <tbody class="cart-items-list">
                                    @foreach ($cartItems as $index => $cartItem)
                                        <tr>
                                            @if ($index === 0)
                                                {{-- Apply rowspan only on the first row --}}
                                                <td rowspan="{{ $cartItems->count() }}" class="vlt">{{ $date }}
                                                </td>
                                            @endif
                                            <td class="product-thumbnail">
                                                <a href="single-product.php"><img src="assets/images/myimg/cart.png"
                                                        alt="Digital Product"></a>
                                            </td>
                                            <td class="product-title">
                                                <a href="single-product.php">{{ $cartItem->products->product_name }}</a>
                                            </td>
                                            <td class="product-price" data-title="Price">{{ $cartItem->part_number }}</td>
                                            <td class="product-quantity" data-title="Qty">
                                                <div class="pro-qty">
                                                    <input type="number" class="quantity-input" value="1">
                                                </div>
                                            </td>
                                            <td class="product-remove">
                                                <input type="hidden" value="{{ $cartItem->id }}">
                                                <a href="#" class="remove-wishlist"><i class="fal fa-times"></i></a>
                                            </td>
                                            @if ($index === 0)
                                                <td rowspan="{{ $cartItems->count() }}" class="vlt">
                                                    <a href="shop.php" class="cartbtn">Send Enquiry</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endforeach

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->
@endsection

@section('script')
    <script></script>
@endsection
