@extends('user.layouts.app')

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
                                    <h2 class="product-title margbot">{{ $selectedProduct->product_name }}</h2>
                                    <h6 class="title margbot">Brand: <span
                                            class="spnc">{{ $selectedProduct->brands->brand_name }}</span></h6>
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
                                    <ul class="product-meta margbot">
                                        @if ($selectedProduct->product_quantity > 0)
                                            <li><i class="fal fa-check"></i>In stock</li>
                                        @else
                                            <li class="text-danger"><i class="fal fa-times"></i>Out of stock</li>
                                        @endif
                                    </ul>

                                    <h6 class="title margbot">Days to Dispatch :<span class="spnc">
                                            {{ $selectedProduct->product_dispatch }}</span></h6>
                                    <div class="manish1 margbot">
                                        <ul class="icon-list-row d-flex">
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
                                    </div>

                                    <a class="wishlist-btn margbot" id="wishlistBtn">
                                        <i class="fas fa-heart"></i> Add to Favourites
                                    </a>

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
                        <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab"
                            aria-controls="description" aria-selected="true">Specifications</a>
                    </li>
                    <li class="nav-item" role="presentation">
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
                                                            <th>{{ $column }}</th>
                                                        @endforeach
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (array_slice($sheetData, 1) as $row)
                                                        <tr data-code="{{ $row[0] }}" data-d1="{{ $row[1] }}"
                                                            data-d2="{{ $row[2] }}" data-d3="{{ $row[3] }}"
                                                            data-k="{{ $row[4] }}" data-l="{{ $row[5] }}"
                                                            data-l1="{{ $row[6] }}" data-l2="{{ $row[7] }}"
                                                            data-l3="{{ $row[8] }}">

                                                            <td data-label="Code">{{ $row[0] }}</td>
                                                            <td data-label="d1">{{ $row[1] }}</td>
                                                            <td data-label="d2">{{ $row[2] }}</td>
                                                            <td data-label="d3">{{ $row[3] }}</td>
                                                            <td data-label="k">{{ $row[4] }}</td>
                                                            <td data-label="L">{{ $row[5] }}</td>
                                                            <td data-label="L1">{{ $row[6] }}</td>
                                                            <td data-label="L2">{{ $row[7] }}</td>
                                                            <td data-label="L3">{{ $row[8] }}</td>
                                                            <td>{{ $row[9] ?? '---' }}</td>
                                                            <td data-label="Action"><button class="action-btn">3D</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
                                        <p>{{ $selectedProduct->product_discription }}</p>
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
                                        src="{{ asset('assets\images\product\1.png') }}" alt="Product Images">
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
                                        src="{{ asset('assets\images\product\2.png') }}" alt="Product Images">
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
                                        src="{{ asset('assets\images\product\3.png') }}" alt="Product Images">
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
                                        src="{{ asset('assets\images\product\4.png') }}" alt="Product Images">
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let table = document.querySelector("table");
            let headers = table.querySelectorAll("thead th");
            let rows = table.querySelectorAll("tbody tr");

            let uniqueValues = {};

            // Collect unique values for each column
            rows.forEach(row => {
                let cells = row.querySelectorAll("td");
                cells.forEach((cell, index) => {
                    let columnLabel = headers[index].dataset.column || headers[index].innerText
                        .trim();
                    let value = cell.innerText.trim();

                    if (!uniqueValues[columnLabel]) {
                        uniqueValues[columnLabel] = new Set();
                    }
                    uniqueValues[columnLabel].add(value);
                });
            });

            // Populate <select> elements
            headers.forEach((header, index) => {
                let columnLabel = header.dataset.column || header.innerText.trim();
                if (uniqueValues[columnLabel]) {
                    let select = document.createElement("select");
                    select.setAttribute("onchange", `filterTable(${index}, this.value)`);

                    let defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.textContent = "All";
                    select.appendChild(defaultOption);

                    uniqueValues[columnLabel].forEach(value => {
                        let option = document.createElement("option");
                        option.value = value;
                        option.textContent = value;
                        select.appendChild(option);
                    });

                    // Clear existing content and append new elements
                    header.innerHTML = `${columnLabel} <br>`;
                    header.appendChild(select);
                }
            });
        });

        // Function to filter table rows
        function filterTable(columnIndex, value) {
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let cell = row.cells[columnIndex];
                if (cell) {
                    let cellValue = cell.innerText.trim();
                    row.style.display = value === "" || cellValue === value ? "" : "none";
                }
            });
        }


        // function filterTable(column, value) {
        //     const rows = document.querySelectorAll("tbody tr");
        //     rows.forEach(row => {
        //         const cellValue = row.dataset[column];
        //         row.style.display = value === "" || cellValue === value ? "" : "none";
        //     });
        // }
    </script>
@endsection
