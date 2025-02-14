<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Yash Tools</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/vendor/sal.css">
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vendor/base.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        input[type=text1] {
            font-size: var(--font-size-b2);
            font-weight: 400;
            height: auto;
            line-height: 47px;
            background: #fff;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding: 0 15px;
            outline: none;
            border-radius: 0px;
        }

        .custom-dropdown {
            width: 200px;
            position: relative;
            margin-bottom: 20px;
        }

        .dropdown-selected {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dropdown-selected span {
            margin-left: auto;
        }

        .dropdown-options {
            display: none;
            position: absolute;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
            max-height: 200px;
            overflow-y: scroll;
            /* Allow scrolling */
            z-index: 100;
        }

        /* Hide scrollbar for webkit browsers */
        .dropdown-options::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for other browsers */
        .dropdown-options {
            scrollbar-width: none;
            /* For Firefox */
        }

        .search-box {
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }

        .dropdown-options div {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .dropdown-options div:hover {
            background-color: #f0f0f0;
        }

        .dropdown-options .selected {
            color: #303667;
            font-weight: bold;
        }

        .icon-list-row {
            list-style: none;
            padding: 0;
            margin-bottom: 7px;
            display: flex;
            gap: 20px;
        }

        .icon-list-row li {
            display: flex;
            align-items: center;
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

        .icon-list-row li i {
            margin-right: 8px;
            color: #303667;
            font-size: 18px;
        }

        .manish {
            font-size: 20px;
            font-weight: 500;
            color: #27272e;
        }

        .manish1 {
            margin-top: 20px;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
        }

        th,
        td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #303667;
            color: #fff;
            position: sticky;
            top: 0;
        }

        th select {
            background-color: #ffffff;
            color: #000000;
            border: none;
            padding: 10px;
            outline: none;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 8px;
            }
        }

        .action-btn {
            background-color: #323667;
            color: #fff;
            border: none;
            width: fit-content;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        select,
        .select2 {
            cursor: pointer;
            transition: .3s;
            height: 45px;
            padding: 0 30px;
            outline: none;
            color: var(--color-body);
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            border: 1px solid var(--color-border-light);
            border-radius: 6px;
            background: url(../images/icons/arrow-icon.png) 95% center no-repeat rgba(0, 0, 0, 0);
            padding-right: 32px;
            font-size: var(--font-size-b1);
            line-height: var(--line-height-b1);
            font-family: var(--font-secondary);
        }

        select {
            appearance: none;
            /* Remove default browser styles */
            -webkit-appearance: none;
            /* For Safari */
            -moz-appearance: none;
            /* For Firefox */
            background-color: white;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="%23000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"%3E%3Cpolyline points="6 9 12 15 18 9"%3E%3C/polyline%3E%3C/svg%3E');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 12px;
        }

        select:focus {
            outline: none;
            border-color: #007bff;
            /* Focus border color */
        }
    </style>
</head>


<body class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <?php include 'mainheader.php'; ?>
    <!-- End Header -->
    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Current Page</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-7 mb--40">
                            <div class="single-product-thumbnail-wrap zoom-gallery">
                                <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                    <div class="thumbnail">
                                        <a href="https://dq2c38sk8yrcb.cloudfront.net/product_group/line_drawing/VB1.1LineDrawing.jpg"
                                            class="popup-zoom">
                                            <img src="https://dq2c38sk8yrcb.cloudfront.net/product_group/line_drawing/VB1.1LineDrawing.jpg"
                                                alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-quick-view position-view">
                                    <a href="https://dq2c38sk8yrcb.cloudfront.net/product_group/line_drawing/VB1.1LineDrawing.jpg"
                                        class="popup-zoom">
                                        <i class="far fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title margbot ">Step Ejector pins</h2>
                                    <h6 class="title margbot">Brand: <span class="spnc">Yashtools</span></h6>
                                    <div class="custom-dropdown margbot" id="dropdown">
                                        <div class="dropdown-selected">
                                            Part Number
                                            <span>▼</span>
                                        </div>
                                        <div class="dropdown-options">
                                            <input type="text1" class="search-box" placeholder="Search...">
                                            <div>VB1.1/001</div>
                                            <div class="selected">VB1.1/002</div>
                                            <div>VB1.1/003</div>
                                            <div>VB1.1/004</div>
                                            <div>VB1.1/005</div>
                                            <div>VB1.1/006</div>
                                        </div>
                                    </div>

                                    <div class="product-variation quantity-variant-wrapper margbot">
                                        <h6 class="title">Quantity</h6>
                                        <div class="pro-qty"><input type="text" value="1"></div>
                                    </div>
                                    <ul class="product-meta margbot">
                                        <li><i class="fal fa-check"></i>In stock</li>
                                    </ul>
                                    <h6 class="title margbot">Days to Dispatch :<span class="spnc"> Same day</span>
                                    </h6>
                                    <!-- End Product Action Wrapper  -->
                                    <div class="product-action-wrapper margbot">

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart"><a href="checkout.php"
                                                    class="axil-btn btn-bg-secondary" contenteditable="false"
                                                    style="cursor: pointer;"><i class="far fa-envelope"></i>
                                                    Send Enquiry</a></li>
                                            <li class="add-to-cart"><a href="cart.php"
                                                    class="axil-btn btn-bg-primary" contenteditable="false"
                                                    style="cursor: pointer;"><i class="far fa-shopping-cart"></i> Add
                                                    to Cart</a></li>


                                        </ul>
                                        <!-- End Product Action  -->

                                    </div>
                                    <div class="manish1">

                                        <ul class="icon-list-row">
                                            <li>
                                                <i class="fas fa-pencil-ruler"></i><a href="">Drawing</a>
                                            </li>
                                            <li>
                                                <i class="fas fa-file-pdf"></i> <a href="">PDF</a>
                                            </li>
                                            <li>
                                                <i class="fas fa-book"></i> <a href="">Catalogue</a>
                                            </li>
                                        </ul>
                                        <ul class="icon-list-row">
                                            <li>
                                                <i class="fab fa-whatsapp"></i> <a href="">WhatsApp Enquiry</a>
                                            </li>
                                            <li><a class="wishlist-btn" id="wishlistBtn">
                                                    <i class="fas fa-heart"></i> Add to Favourites
                                                </a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->

            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true">Specifications</a>
                        </li>
                        <li class="nav-item " role="presentation">
                            <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab"
                                aria-controls="additional-info" aria-selected="false">Description</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <!-- End .col-lg-6 -->
                                    <div class="col-lg-12 mb--30">
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Code
                                                            <select onchange="filterTable('code', this.value)">
                                                                <option value="">All</option>
                                                                <option value="VB1.1/001">VB1.1/001</option>
                                                                <option value="VB1.1/002">VB1.1/002</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            d1
                                                            <select onchange="filterTable('d1', this.value)">
                                                                <option value="">All</option>
                                                                <option value="16">16</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            d2
                                                            <select onchange="filterTable('d2', this.value)">
                                                                <option value="">All</option>
                                                                <option value="22">22</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            d3
                                                            <select onchange="filterTable('d3', this.value)">
                                                                <option value="">All</option>
                                                                <option value="26">26</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            k
                                                            <select onchange="filterTable('k', this.value)">
                                                                <option value="">All</option>
                                                                <option value="6">6</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            L
                                                            <select onchange="filterTable('l', this.value)">
                                                                <option value="">All</option>
                                                                <option value="59">59</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            L1
                                                            <select onchange="filterTable('l1', this.value)">
                                                                <option value="">All</option>
                                                                <option value="25">25</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            L2
                                                            <select onchange="filterTable('l2', this.value)">
                                                                <option value="">All</option>
                                                                <option value="30">30</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            L3
                                                            <select onchange="filterTable('l3', this.value)">
                                                                <option value="">All</option>
                                                                <option value="9">9</option>
                                                            </select>
                                                        </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr data-code="VB1.1/001" data-d1="16" data-d2="22"
                                                        data-d3="26" data-k="6" data-l="59" data-l1="25"
                                                        data-l2="30" data-l3="9">
                                                        <td data-label="Code">VB1.1/001</td>
                                                        <td data-label="d1">16</td>
                                                        <td data-label="d2">22</td>
                                                        <td data-label="d3">26</td>
                                                        <td data-label="k">6</td>
                                                        <td data-label="L">59</td>
                                                        <td data-label="L1">25</td>
                                                        <td data-label="L2">30</td>
                                                        <td data-label="L3">9</td>
                                                        <td data-label="Action"><button class="action-btn">3D</button>
                                                        </td>
                                                    </tr>
                                                    <tr data-code="VB1.1/002" data-d1="16" data-d2="22"
                                                        data-d3="26" data-k="6" data-l="64" data-l1="25"
                                                        data-l2="35" data-l3="9">
                                                        <td data-label="Code">VB1.1/002</td>
                                                        <td data-label="d1">16</td>
                                                        <td data-label="d2">22</td>
                                                        <td data-label="d3">26</td>
                                                        <td data-label="k">6</td>
                                                        <td data-label="L">64</td>
                                                        <td data-label="L1">25</td>
                                                        <td data-label="L2">35</td>
                                                        <td data-label="L3">9</td>
                                                        <td data-label="Action"><button class="action-btn">3D</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr data-code="VB1.1/001" data-d1="16" data-d2="22"
                                                        data-d3="26" data-k="6" data-l="59" data-l1="25"
                                                        data-l2="30" data-l3="9">
                                                        <td data-label="Code">VB1.1/001</td>
                                                        <td data-label="d1">16</td>
                                                        <td data-label="d2">22</td>
                                                        <td data-label="d3">26</td>
                                                        <td data-label="k">6</td>
                                                        <td data-label="L">59</td>
                                                        <td data-label="L1">25</td>
                                                        <td data-label="L2">30</td>
                                                        <td data-label="L3">9</td>
                                                        <td data-label="Action"><button class="action-btn">3D</button>
                                                        </td>
                                                    </tr>
                                                    <tr data-code="VB1.1/002" data-d1="16" data-d2="22"
                                                        data-d3="26" data-k="6" data-l="64" data-l1="25"
                                                        data-l2="35" data-l3="9">
                                                        <td data-label="Code">VB1.1/002</td>
                                                        <td data-label="d1">16</td>
                                                        <td data-label="d2">22</td>
                                                        <td data-label="d3">26</td>
                                                        <td data-label="k">6</td>
                                                        <td data-label="L">64</td>
                                                        <td data-label="L1">25</td>
                                                        <td data-label="L2">35</td>
                                                        <td data-label="L3">9</td>
                                                        <td data-label="Action"><button class="action-btn">3D</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr data-code="VB1.1/001" data-d1="16" data-d2="22"
                                                        data-d3="26" data-k="6" data-l="59" data-l1="25"
                                                        data-l2="30" data-l3="9">
                                                        <td data-label="Code">VB1.1/001</td>
                                                        <td data-label="d1">16</td>
                                                        <td data-label="d2">22</td>
                                                        <td data-label="d3">26</td>
                                                        <td data-label="k">6</td>
                                                        <td data-label="L">59</td>
                                                        <td data-label="L1">25</td>
                                                        <td data-label="L2">30</td>
                                                        <td data-label="L3">9</td>
                                                        <td data-label="Action"><button class="action-btn">3D</button>
                                                        </td>
                                                    </tr>
                                                    <tr data-code="VB1.1/002" data-d1="16" data-d2="22"
                                                        data-d3="26" data-k="6" data-l="64" data-l1="25"
                                                        data-l2="35" data-l3="9">
                                                        <td data-label="Code">VB1.1/002</td>
                                                        <td data-label="d1">16</td>
                                                        <td data-label="d2">22</td>
                                                        <td data-label="d3">26</td>
                                                        <td data-label="k">6</td>
                                                        <td data-label="L">64</td>
                                                        <td data-label="L1">25</td>
                                                        <td data-label="L2">35</td>
                                                        <td data-label="L3">9</td>
                                                        <td data-label="Action"><button class="action-btn">3D</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <!-- End .col-lg-6 -->
                                </div>
                                <!-- End .row -->

                                <!-- End .row -->
                            </div>
                            <!-- End .product-desc-wrapper -->
                        </div>
                        <div class="tab-pane fade" id="additional-info" role="tabpanel"
                            aria-labelledby="additional-info-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 mb--30">
                                        <div class="single-desc">
                                            <h5 class="title">Specifications:</h5>
                                            <p>We’ve created a full-stack structure for our working workflow processes,
                                                were from the funny the century initial all the made, have spare to
                                                negatives. But the structure was from the funny the century rather,
                                                initial all the made, have spare to negatives.</p>
                                        </div>
                                    </div>
                                    <!-- End .col-lg-6 -->
                                </div>
                                <!-- End .row -->
                                <!-- End .row -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- woocommerce-tabs -->

        </div>
        <!-- End Shop Area  -->

        <!-- Start Recently Viewed Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper">

                    <h2 class="title">Recently Viewed Items</h2>
                </div>
                <div class="row row--15">
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product.php">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets\images\product\1.png" alt="Product Images">
                                </a>

                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.php">SLIDES & ACCESSORIES</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product.php">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets\images\product\2.png" alt="Product Images">
                                </a>

                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.php">Side Core Base</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product.php">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets\images\product\3.png" alt="Product Images">
                                </a>

                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.php">Guide Rail</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product.php">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets\images\product\4.png" alt="Product Images">
                                </a>

                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.php">center Guide Rail</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Recently Viewed Product Area  -->

    </main>
    <script>
        const dropdown = document.getElementById('dropdown');
        const selected = dropdown.querySelector('.dropdown-selected');
        const options = dropdown.querySelector('.dropdown-options');
        const searchBox = dropdown.querySelector('.search-box');
        const optionItems = options.querySelectorAll('div');

        // Toggle dropdown visibility
        selected.addEventListener('click', () => {
            options.style.display = options.style.display === 'block' ? 'none' : 'block';
        });

        // Filter options based on search input
        searchBox.addEventListener('input', () => {
            const filter = searchBox.value.toLowerCase();
            optionItems.forEach(option => {
                if (option.textContent.toLowerCase().includes(filter)) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });
        });

        // Select an option
        options.addEventListener('click', (event) => {
            if (event.target.tagName === 'DIV') {
                selected.childNodes[0].textContent = event.target.textContent;
                options.style.display = 'none';
                optionItems.forEach(option => option.classList.remove('selected'));
                event.target.classList.add('selected');
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!dropdown.contains(event.target)) {
                options.style.display = 'none';
            }
        });
    </script>
    <script>
        function filterTable(column, value) {
            const rows = document.querySelectorAll("tbody tr");
            rows.forEach(row => {
                const cellValue = row.dataset[column];
                row.style.display = value === "" || cellValue === value ? "" : "none";
            });
        }
    </script>
    <?php include 'footer.php'; ?>
