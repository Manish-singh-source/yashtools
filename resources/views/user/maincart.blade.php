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
                        <a href="#" class="conts">Please Continue Shopping to Add Products</a>
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
                                    <th scope="col" class="product-thumbnail">Enquiry No</th>
                                    <th scope="col" class="product-thumbnail">Product</th>
                                    <th scope="col" class="product-title"></th>
                                    <th scope="col" class="product-price">Part No</th>
                                    <th scope="col" class="product-quantity">Quantity</th>
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-remove">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="3" class="vlt">20/12/25</td>
                                    <td rowspan="3" class="vlt">ENQ-001</td>
                                    <td class="product-thumbnail"><a href="single-product.php"><img
                                                src="assets\images\myimg\cart.png" alt="Digital Product"></a></td>
                                    <td class="product-title"><a href="single-product.php">Wireless PS Handler</a></td>
                                    <td class="product-price" data-title="Price">VB1.1/001</td>
                                    <td class="product-quantity" data-title="Qty">
                                        <div class="pro-qty">
                                            <input type="number" class="quantity-input" value="1">
                                        </div>
                                    </td>
                                    <td class="product-remove"><a href="#" class="remove-wishlist"><i
                                                class="fal fa-times"></i></a></td>

                                    <td rowspan="3" class="vlt"><a href="shop.php" class="cartbtn">Send Enquiry</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="single-product-2.php"><img
                                                src="assets\images\myimg\cart.png" alt="Digital Product"></a></td>
                                    <td class="product-title"><a href="single-product-2.php">Gradient Light Keyboard</a>
                                    </td>
                                    <td class="product-price" data-title="Price">VB1.1/002</td>
                                    <td class="product-quantity" data-title="Qty">
                                        <div class="pro-qty">
                                            <input type="number" class="quantity-input" value="1">
                                        </div>
                                    </td>
                                    <td class="product-remove"><a href="#" class="remove-wishlist"><i
                                                class="fal fa-times"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="single-product-3.php"><img
                                                src="assets\images\myimg\cart.png" alt="Digital Product"></a></td>
                                    <td class="product-title"><a href="single-product-3.php">HD CC Camera</a></td>
                                    <td class="product-price" data-title="Price">VB1.1/003</td>
                                    <td class="product-quantity" data-title="Qty">
                                        <div class="pro-qty">
                                            <input type="number" class="quantity-input" value="1">
                                        </div>
                                    </td>
                                    <td class="product-remove"><a href="#" class="remove-wishlist"><i
                                                class="fal fa-times"></i></a></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td rowspan="3" class="vlt">26/12/25</td>
                                    <td rowspan="3" class="vlt">ENQ-001</td>
                                    <td class="product-thumbnail"><a href="single-product.php"><img
                                                src="assets\images\myimg\cart.png" alt="Digital Product"></a></td>
                                    <td class="product-title"><a href="single-product.php">Wireless PS Handler</a></td>
                                    <td class="product-price" data-title="Price">VB1.1/001</td>
                                    <td class="product-quantity" data-title="Qty">
                                        <div class="pro-qty">
                                            <input type="number" class="quantity-input" value="1">
                                        </div>
                                    </td>
                                    <td class="product-remove"><a href="#" class="remove-wishlist"><i
                                                class="fal fa-times"></i></a></td>

                                    <td rowspan="3" class="vlt"><a href="shop.php" class="cartbtn">Send
                                            Enquiry</a></td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="single-product-2.php"><img
                                                src="assets\images\myimg\cart.png" alt="Digital Product"></a></td>
                                    <td class="product-title"><a href="single-product-2.php">Gradient Light Keyboard</a>
                                    </td>
                                    <td class="product-price" data-title="Price">VB1.1/002</td>
                                    <td class="product-quantity" data-title="Qty">
                                        <div class="pro-qty">
                                            <input type="number" class="quantity-input" value="1">
                                        </div>
                                    </td>
                                    <td class="product-remove"><a href="#" class="remove-wishlist"><i
                                                class="fal fa-times"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="single-product-3.php"><img
                                                src="assets\images\myimg\cart.png" alt="Digital Product"></a></td>
                                    <td class="product-title"><a href="single-product-3.php">HD CC Camera</a></td>
                                    <td class="product-price" data-title="Price">VB1.1/003</td>
                                    <td class="product-quantity" data-title="Qty">
                                        <div class="pro-qty">
                                            <input type="number" class="quantity-input" value="1">
                                        </div>
                                    </td>
                                    <td class="product-remove"><a href="#" class="remove-wishlist"><i
                                                class="fal fa-times"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->
@endsection
