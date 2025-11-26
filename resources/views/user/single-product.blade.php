@extends('user.layouts.app')

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
            color: #555;
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

        p {
            margin: 0 0 8px;
        }
    </style>
@endsection
@section('content')
    <!-- End Header -->
    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area pt--50 pb--0 bg-color-white">
            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @foreach ($breadcrumbs as $breadcrumb)
                                        @if (!$loop->last)
                                            <li class="breadcrumb-item">
                                                <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                                            </li>
                                        @else
                                            <li class="breadcrumb-item active text-capitalize" aria-current="page">
                                                {{ $breadcrumb['name'] }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 mb--40">
                            <div class="single-product-thumbnail-wrap zoom-gallery">
                                <div class="single-product-thumbnail product-large-thumbnail-3">
                                    <div class="thumbnail">
                                        <a href="{{ asset('/uploads/products/thumbnails/' . $selectedProduct->product_thumbain) }}"
                                            class="popup-zoom">
                                            <img src="{{ asset('/uploads/products/thumbnails/' . $selectedProduct->product_thumbain) }}"
                                                alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    @isset($selectedProduct->product_name)
                                        <h2 class="product-title margbot text-capitalize">{{ $selectedProduct->product_name }}
                                        </h2>
                                    @endisset
                                    @isset($selectedProduct->brands->brand_name)
                                        <h6 class="title margbot">Brand: <span
                                                class="spnc">{{ $selectedProduct->brands->brand_name }}</span></h6>
                                    @endisset

                                    {{-- 
                                    @if (Auth::user() && isset($selectedProduct->product_country_of_origin))
                                        <h6 class="title margbot">Country Of Origin: <span class="spnc">
                                                {{ $selectedProduct->product_country_of_origin }}
                                            </span></h6>
                                    @endif 
                                    --}}

                                    <div class="custom-dropdown margbot part-number-section" id="dropdown">
                                        <div class="dropdown-selected">
                                            Part Number
                                            <span>▼</span>
                                        </div>
                                        <div class="dropdown-options">
                                            <input type="text1" class="search-box" placeholder="Search...">
                                        </div>
                                    </div>

                                    <div class="manish1 margbot">
                                        <ul class="icon-list-row d-flex">
                                            @isset($selectedProduct->product_drawing)
                                                <li>
                                                    <i class="fas fa-pencil-ruler"></i><a target="_blank"
                                                        href="{{ asset('/uploads/products/drawing/' . $selectedProduct->product_drawing) }}">Drawing</a>
                                                </li>
                                            @endisset
                                            @isset($selectedProduct->product_pdf)
                                                <li>
                                                    <i class="fas fa-file-pdf"></i> <a target="_blank"
                                                        href="{{ asset('/uploads/products/pdf/' . $selectedProduct->product_pdf) }}">PDF</a>
                                                </li>
                                            @endisset
                                            {{-- 
                                            @if (Auth::user())
                                                @isset($selectedProduct->product_catalouge)
                                                    <li>
                                                        <i class="fas fa-book"></i> <a target="_blank"
                                                            href="{{ asset('/uploads/products/catalogue/' . $selectedProduct->product_catalouge) }}">Catalogue</a>
                                                    </li>
                                                @endisset
                                            @endif 
                                            --}}
                                        </ul>
                                    </div>
                                    <div id="showError" class="px-2 py-3 text-danger"></div>
                                    @isset($favouritesProducts->status)
                                        @if ($favouritesProducts->status == '1')
                                            <a class="wishlist-btn text-danger cursor-pointer" id="wishlistBtn"
                                                data-productid="{{ $selectedProduct->id }}">
                                                <i class="fas fa-heart text-danger"></i> Add to Favourites
                                            </a>
                                            <input type="hidden" value="active" class="status">
                                        @else
                                            <a class="wishlist-btn cursor-pointer" id="wishlistBtn"
                                                data-productid="{{ $selectedProduct->id }}">
                                                <i class="fas fa-heart"></i> Add to Favourites
                                            </a>
                                            <input type="hidden" value="inactive" class="status">
                                        @endif
                                    @else
                                        <a class="wishlist-btn cursor-pointer" id="wishlistBtn"
                                            data-productid="{{ $selectedProduct->id }}">
                                            <i class="fas fa-heart"></i> Add to Favourites
                                        </a>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .single-product-thumb -->

        @if (isset($sheetData) &&
                count($sheetData) > 0 &&
                isset($leadTimeData) &&
                !empty($leadTimeData) &&
                isset($selectedProduct->product_discription) &&
                !empty($selectedProduct->product_discription))
            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        @if (isset($sheetData) && count($sheetData) > 0)
                            @php
                                // Remove completely empty rows
                                $filteredRows = array_filter($sheetData, function ($row) {
                                    return collect($row)->filter(fn($cell) => !empty($cell))->isNotEmpty();
                                });

                                // Transpose to get column-wise data
                                $transposed = [];
                                foreach ($filteredRows as $row) {
                                    foreach ($row as $key => $cell) {
                                        $transposed[$key][] = $cell;
                                    }
                                }

                                // Get indices of columns with at least one non-empty cell
                                $nonEmptyCols = [];
                                foreach ($transposed as $colIndex => $colCells) {
                                    if (collect($colCells)->filter(fn($c) => !empty($c))->isNotEmpty()) {
                                        $nonEmptyCols[] = $colIndex;
                                    }
                                }

                                $excludedCols = ['price', 'quantity'];
                                $colsToShow = collect($nonEmptyCols)
                                    ->filter(
                                        fn($colIndex) => !in_array(
                                            strtolower(trim($sheetData[0][$colIndex] ?? '')),
                                            $excludedCols,
                                        ),
                                    )
                                    ->all();
                            @endphp
                            @if (count($filteredRows) > 0 && count($colsToShow) > 0)
                                <li class="nav-item" role="presentation">
                                    <a class="active" id="description-tab" data-bs-toggle="tab" href="#description"
                                        role="tab" aria-controls="description" aria-selected="true">Specifications</a>
                                </li>
                            @endif
                        @endif
                        @if (isset($leadTimeData) && !empty($leadTimeData))
                            <li class="nav-item" role="presentation">
                                <a @if (!isset($sheetData) || count($sheetData) <= 0) class="active" @endif id="lead-time-tab"
                                    data-bs-toggle="tab" href="#lead-time" role="tab" aria-controls="lead-time"
                                    aria-selected="false">Lead Time</a>
                            </li>
                        @endif
                        @if (!isset($selectedProduct->product_discription) && $selectedProduct->product_discription != '')
                            <li class="nav-item " role="presentation">
                                <a @if ((!isset($sheetData) || count($sheetData) <= 0) && (!isset($leadTimeData) || empty($leadTimeData))) class="active" @endif id="additional-info-tab"
                                    data-bs-toggle="tab" href="#additional-info" role="tab"
                                    aria-controls="additional-info" aria-selected="false">Description</a>
                            </li>
                        @endif
                    </ul>
                    @if (isset($sheetData) && !empty($sheetData))
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="product-desc-wrapper">
                                    <div class="row">
                                        <!-- End .col-lg-6 -->
                                        <div class="col-lg-12 mb--30">
                                            <div class="table-responsive">
                                                @if (isset($sheetData) && count($sheetData) > 0)
                                                    @php
                                                        // Remove completely empty rows
                                                        $filteredRows = array_filter($sheetData, function ($row) {
                                                            return collect($row)
                                                                ->filter(fn($cell) => !empty($cell))
                                                                ->isNotEmpty();
                                                        });

                                                        // Transpose to get column-wise data
                                                        $transposed = [];
                                                        foreach ($filteredRows as $row) {
                                                            foreach ($row as $key => $cell) {
                                                                $transposed[$key][] = $cell;
                                                            }
                                                        }

                                                        // Get indices of columns with at least one non-empty cell
                                                        $nonEmptyCols = [];
                                                        foreach ($transposed as $colIndex => $colCells) {
                                                            if (
                                                                collect($colCells)
                                                                    ->filter(fn($c) => !empty($c))
                                                                    ->isNotEmpty()
                                                            ) {
                                                                $nonEmptyCols[] = $colIndex;
                                                            }
                                                        }

                                                        $excludedCols = ['price', 'quantity'];
                                                        $colsToShow = collect($nonEmptyCols)
                                                            ->filter(
                                                                fn($colIndex) => !in_array(
                                                                    strtolower(trim($sheetData[0][$colIndex] ?? '')),
                                                                    $excludedCols,
                                                                ),
                                                            )
                                                            ->all();
                                                    @endphp

                                                    @if (count($filteredRows) > 0 && count($colsToShow) > 0)
                                                        <table class="specification-table">
                                                            <thead>
                                                                <tr>
                                                                    @foreach ($colsToShow as $colIndex)
                                                                        <th>{{ $sheetData[0][$colIndex] ?? '' }}</th>
                                                                    @endforeach
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-body">
                                                                @foreach (array_slice($filteredRows, 1) as $row)
                                                                    <tr data-row-value="{{ $row[0] ?? '' }}">
                                                                        @foreach ($colsToShow as $colIndex)
                                                                            <td
                                                                                data-label="{{ $sheetData[0][$colIndex] ?? 'Column ' . $colIndex }}">
                                                                                {{ $row[$colIndex] ?? '' }}
                                                                            </td>
                                                                        @endforeach
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p>No valid data available.</p>
                                                    @endif
                                                @elseif (!empty($selectedProduct->product_optional_pdf))
                                                    <div class="single-product-thumbnail-wrap zoom-gallery">
                                                        <div
                                                            class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                                            <div class="thumbnail">
                                                                <a href="{{ asset('/uploads/products/product_optional_pdf/' . $selectedProduct->product_optional_pdf) }}"
                                                                    class="popup-zoom">
                                                                    <img src="{{ asset('/uploads/products/product_optional_pdf/' . $selectedProduct->product_optional_pdf) }}"
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
                                    <!-- End .col-lg-6 -->
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .product-desc-wrapper -->
                        </div>
                    @endif
                    <!-- Lead Time Tab -->
                    @if (isset($leadTimeData) && !empty($leadTimeData))
                        <div class="tab-pane fade @if (!isset($sheetData) || count($sheetData) <= 0) show active @endif" id="lead-time"
                            role="tabpanel" aria-labelledby="lead-time-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 mb--30">
                                        <div class="lead-time-content">

                                            @if (isset($leadTimeType) && $leadTimeType === 'excel' && is_array($leadTimeData))
                                                <!-- Excel Data Display -->
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                @foreach ($leadTimeData[0] as $column)
                                                                    @if (!empty($column))
                                                                        <th class="text-center">{{ $column }}</th>
                                                                    @endif
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (array_slice($leadTimeData, 1) as $row)
                                                                <tr>
                                                                    @foreach ($row as $key => $value)
                                                                        @if (!empty($value) || $value === '0' || $value === 0)
                                                                            <td class="text-center">{{ $value }}
                                                                            </td>
                                                                        @elseif (isset($leadTimeData[0][$key]) && !empty($leadTimeData[0][$key]))
                                                                            <td class="text-center text-muted">-</td>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Download Link for Excel File -->
                                                @if (!empty($selectedProduct->lead_time))
                                                    <div class="mt-3">
                                                        <a href="{{ asset('/uploads/products/lead_time/' . $selectedProduct->lead_time) }}"
                                                            class="btn btn-outline-primary btn-sm" download>
                                                            <i class="fas fa-download"></i> Download Excel File
                                                        </a>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($selectedProduct->product_discription) && !empty($selectedProduct->product_discription))
                        <div class="tab-pane fade" id="additional-info" role="tabpanel"
                            aria-labelledby="additional-info-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 mb--30">
                                        <div class="single-desc">
                                            <p>{!! $selectedProduct->product_discription ?? 'No additional information available.' !!}</p>
                                        </div>
                                    </div>
                                    <!-- End .col-lg-6 -->
                                </div>
                                <!-- End .row -->
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- woocommerce-tabs -->

            </div>
            <!-- End Shop Area  -->
        @endif

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
                                    <a href="{{ route('user.single.product', $product->product_slug) }}">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="{{ asset('/uploads/products/thumbnails/' . $product->product_thumbain) }}"
                                            alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a
                                                href="{{ route('user.single.product', $product->product_slug) }}">{{ $product->product_name }}</a>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
        $(document).ready(function() {
            let $table = $("table.specification-table");
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
                    let iteration = 0;

                    if (uniqueValues[columnLabel]) {
                        uniqueValues[columnLabel].forEach(value => {
                            let $option = $("<option>").val(value).text(value);
                            $select.append($option);
                        });
                    }
                    console.log($select);
                    $(this).append($select);
                }
            });


            $rows.each(function() {
                let partNumbers = {};
                let $row = $(this).find("td");

                let key = $row.eq(0).text().trim(); // Get the first <td> text
                partNumbers[key] = key;

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

            $(document).on("click", "#wishlistBtn", function() {
                let productid = $(this).data("productid");
                let productStatus = $(this).siblings(".status").val() || 0;

                $.ajax({
                    url: "/check-auth", // Check if the user is logged in
                    type: "GET",
                    success: function(response) {
                        console.log(response)
                        if (!response.isAuthenticated) {
                            $("#showError").show();
                            $("#showError").html(
                                "Please <a href='/signup'>Register</a>/<a href='/signin'>Login</a> To Add Product To Favourites."
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
