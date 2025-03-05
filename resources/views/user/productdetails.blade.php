@extends('user.layouts.masterlayout')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('style')
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

        .single-product-content .inner .product-variation .title1 {
            font-weight: 500;
            font-size: 20px;
            margin-bottom: 0;
            min-width: 70px;
        }
    </style>
@endsection

@section('content')
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
                                        <a href="{{ asset('uploads/products/thumbnails/' . $selectedProduct->product_thumbain) }}"
                                            class="popup-zoom">
                                            <img src="{{ asset('uploads/products/thumbnails/' . $selectedProduct->product_thumbain) }}"
                                                alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title margbot">{{ $selectedProduct->product_name }}</h2>
                                    <h6 class="title margbot">Brand: <span
                                            class="spnc">{{ $selectedProduct->brands->brand_name }}</span></h6>
                                    <div class="custom-dropdown margbot" id="dropdown">
                                        <div class="dropdown-selected">
                                            Select Part Number
                                        </div>
                                        <div class="dropdown-options">
                                            <input type="text1" class="search-box" placeholder="Search...">
                                        </div>
                                    </div>
                                    <input type="hidden" name="productId" class="productId"
                                        value="{{ $selectedProduct->id }}">
                                    <input type="hidden" name="userId" class="userId" value="{{ Auth::id() }}">
                                    <div class="product-variation quantity-variant-wrapper margbot">
                                        <h6 class="title">Quantity</h6>
                                        <div class="pro-qty"><input class="enquiryQuantity" type="text" value="1">
                                        </div>
                                    </div>
                                    <ul class="product-meta margbot">
                                        @if ($selectedProduct->product_quantity > 0)
                                            <li><i class="fal fa-check"></i>In stock</li>
                                        @else
                                            <li class="text-danger"><i class="fal fa-times"></i>Out of stock</li>
                                        @endif
                                    </ul>
                                    @if ($selectedProduct->product_sale != null)
                                        <div class="product-variation quantity-variant-wrapper margbot">
                                            <h6 class="title1">Price :</h6><span
                                                class="spnc">₹{{ $selectedProduct->product_price }}</span>
                                        </div>
                                    @endif
                                    <h6 class="title margbot">Days to Dispatch :<span class="spnc">
                                            {{ $selectedProduct->product_dispatch }}</span>
                                    </h6>
                                    <!-- End Product Action Wrapper  -->
                                    <div class="product-action-wrapper margbot">

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart" id="addEnquiry"><a href="#"
                                                    class="axil-btn btn-bg-secondary" contenteditable="false"
                                                    style="cursor: pointer;"><i class="far fa-envelope"></i>
                                                    Send Enquiry</a></li>
                                            <li class="add-to-cart" id="addCart"><a href="#"
                                                    class="axil-btn btn-bg-primary" contenteditable="false"
                                                    style="cursor: pointer;"><i class="far fa-shopping-cart"></i> Add
                                                    to Cart</a></li>


                                        </ul>
                                        <!-- End Product Action  -->

                                    </div>
                                    <div class="manish1">

                                        <ul class="icon-list-row">
                                            @isset($selectedProduct->product_drawing)
                                                <li>
                                                    <i class="fas fa-pencil-ruler"></i><a target="_blank"
                                                        href="{{ asset('uploads/products/drawing/' . $selectedProduct->product_drawing) }}">Drawing</a>
                                                </li>
                                            @endisset
                                            @isset($selectedProduct->product_pdf)
                                                <li>
                                                    <i class="fas fa-file-pdf"></i> <a target="_blank"
                                                        href="{{ asset('uploads/products/pdf/' . $selectedProduct->product_pdf) }}">PDF</a>
                                                </li>
                                            @endisset
                                            @isset($selectedProduct->product_catalouge)
                                                <li>
                                                    <i class="fas fa-book"></i> <a target="_blank"
                                                        href="{{ asset('uploads/products/catalogue/' . $selectedProduct->product_catalouge) }}">Catalogue</a>
                                                </li>
                                            @endisset
                                        </ul>
                                        <ul class="icon-list-row">
                                            <li>
                                                <i class="fab fa-whatsapp"></i>
                                                <a href="#" id="whatsapp-enquiry">WhatsApp Enquiry</a>
                                            </li>
                                            <li>
                                                @isset($favouritesProducts->status)
                                                    @if ($favouritesProducts->status == '1')
                                                        <a class="wishlist-btn text-danger" id="wishlistBtn"
                                                            data-productid="{{ $selectedProduct->id }}">
                                                            <i class="fas fa-heart text-danger"></i> Add to Favourites
                                                        </a>
                                                        <input type="hidden" value="active" class="status">
                                                    @else
                                                        <a class="wishlist-btn" id="wishlistBtn"
                                                            data-productid="{{ $selectedProduct->id }}">
                                                            <i class="fas fa-heart"></i> Add to Favourites
                                                        </a>
                                                        <input type="hidden" value="inactive" class="status">
                                                    @endif
                                                @else
                                                    <a class="wishlist-btn" id="wishlistBtn"
                                                        data-productid="{{ $selectedProduct->id }}">
                                                        <i class="fas fa-heart"></i> Add to Favourites
                                                    </a>
                                                @endisset
                                            </li>
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
                                            @if (isset($sheetData) && count($sheetData) > 0)
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            @foreach ($sheetData[0] as $column)
                                                                @if (!empty($column))
                                                                    <th>{{ $column }}</th>
                                                                @endif
                                                            @endforeach
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (array_slice($sheetData, 1) as $row)
                                                            <tr
                                                                @foreach ($row as $key => $value)
                                                                @if (!empty($value)) data-col{{ $key }}="{{ $value }}" @endif @endforeach>
                                                                @foreach ($row as $key => $value)
                                                                    @if (!empty($value))
                                                                        <td data-label="Column {{ $key }}">
                                                                            {{ $value }}</td>
                                                                    @endif
                                                                @endforeach
                                                                @foreach ($row as $key => $value)
                                                                    @if (!empty($value))
                                                                        <td data-label="Action"><button
                                                                                class="action-btn">3D</button>
                                                                        </td>
                                                                    @endif
                                                                @break
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @elseif($selectedProduct->product_optional_pdf != '')
                                            <div class="single-product-thumbnail-wrap zoom-gallery">
                                                <div
                                                    class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                                    <div class="thumbnail">
                                                        <a href="{{ asset('uploads/products/product_optional_pdf/' . $selectedProduct->product_optional_pdf) }}"
                                                            class="popup-zoom">
                                                            <img src="{{ asset('uploads/products/product_optional_pdf/' . $selectedProduct->product_optional_pdf) }}"
                                                                alt="Product Images">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <p>No data available or the file is empty.</p>
                                        @endif
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
                                        <p>{!! $selectedProduct->product_discription !!}</p>
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
                @foreach ($similarProducts as $product)
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{ route('user.product.details', $product->product_slug) }}">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="{{ asset('uploads/products/thumbnails/' . $product->product_thumbain) }}"
                                        alt="Product Images">
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a
                                            href="{{ route('user.product.details', $product->product_slug) }}">{{ $product->product_name }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Recently Viewed Product Area  -->

</main>

@endsection

@section('script')
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        let $table = $("table");
        if ($table.length === 0) return;

        let $headers = $table.find("thead th");
        let $rows = $table.find("tbody tr");

        let uniqueValues = {};

        $rows.each(function() {
            let $cells = $(this).find("td");
            $cells.each(function(index) {
                if (!$headers.eq(index).length) return;
                let columnLabel = $headers.eq(index).data("column") || $.trim($headers.eq(index)
                    .text());
                let value = $.trim($(this).text());

                if (!uniqueValues[columnLabel]) {
                    uniqueValues[columnLabel] = new Set();
                }
                if (value !== "") { // Ignore empty values
                    uniqueValues[columnLabel].add(value);
                }
            });
        });

        $headers.each(function(index) {
            let columnLabel = $(this).data("column") || $.trim($(this).text());
            if (columnLabel) {
                let $select = $("<select>").on("change", function() {
                    filterTable(index, $(this).val());
                });

                let $defaultOption = $("<option>").val("").text("All");
                $select.append($defaultOption);

                if (uniqueValues[columnLabel]) {
                    uniqueValues[columnLabel].forEach(value => {
                        let $option = $("<option>").val(value).text(value);
                        $select.append($option);
                    });
                }
                $(this).append($select);
            }
        });


        $rows.each(function() {
            let partNumbers = {};
            let $row = $(this).find("td");

            let key = $row.eq(0).text().trim(); // Get the first <td> text
            partNumbers[key] = key;

            console.log(key); // Correct way to log the text
            if (key) {
                $(".dropdown-options").append(`<div>${key}</div>`);
            }
        });


        function filterTable(columnIndex, value) {
            $rows.each(function() {
                let $cell = $(this).find("td").eq(columnIndex);
                if ($cell.length) {
                    let cellValue = $.trim($cell.text());
                    $(this).toggle(value === "" || cellValue === value);
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {

        $("#showError").hide();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(document).on("click", "#addEnquiry", function() {
            var button = $(this).prop("disabled", true);
            button.find("a").text("Processing...");

            let enquiryQuantity = $(".enquiryQuantity").val();
            let productId = $(".productId").val();
            let userId = $(".userId").val();
            let partNumber = $(".dropdown-selected").text();

            let cartData = [];

            cartData.push({
                userId: userId,
                productId: productId,
                enquiryQuantity: enquiryQuantity,
                partNumber: partNumber,
            });

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
                        url: "/add-enquiry",
                        type: "POST",
                        data: {
                            cartData: cartData
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

        $(document).on("click", "#addCart", function() {
            let productId = $(".productId").val();
            let userId = $(".userId").val();
            let partNumber = $(".dropdown-selected").text();

            if (partNumber.trim() == 'Select Part Number') {
                if (confirm('Please Select Part Number')) {
                    return;
                }
            }
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
                        url: "/add-to-cart",
                        type: "POST",
                        data: {
                            userId: userId,
                            productId: productId,
                            partNumber: partNumber,
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
<script>
    document.getElementById("whatsapp-enquiry").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default link behavior

        // WhatsApp Number (Fixed Number)
        var whatsappNumber = "917039553407"; // Replace with your WhatsApp number (Use country code)

        // Product Details
        var productName = document.querySelector(".product-title").innerText; // Fetch product name dynamically
        var productUrl = window.location.href; // Current page URL

        // WhatsApp message format (Plain URL for Clickable Link)
        var message = "Hello, I want to inquire about:\n\n" +
            "📌 *Product:* " + productName + "\n" +
            "🔗 *Link:* " + productUrl + "\n\n" +
            "Please provide more details.";

        // WhatsApp API URL with fixed number
        var whatsappUrl = "https://wa.me/" + whatsappNumber + "?text=" + encodeURIComponent(message);

        // Open WhatsApp in a new tab
        window.open(whatsappUrl, "_blank");
    });
</script>
@endsection
