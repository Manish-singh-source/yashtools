@extends('user.layouts.app')

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
                                    <h2 class="product-title margbot">Step Ejector pins</h2>
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
                                    <ul class="product-meta margbot">
                                        <li><i class="fal fa-check"></i>In stock</li>
                                    </ul>

                                    <h6 class="title margbot">Days to Dispatch :<span class="spnc"> Same day</span></h6>
                                    <div class="manish1 margbot">
                                        <ul class="icon-list-row d-flex">
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
                                                    <th>
                                                        Stock Available <br>(Qty)
                                                    </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr data-code="VB1.1/001" data-d1="16" data-d2="22" data-d3="26"
                                                    data-k="6" data-l="59" data-l1="25" data-l2="30"
                                                    data-l3="9">
                                                    <td data-label="Code">VB1.1/001</td>
                                                    <td data-label="d1">16</td>
                                                    <td data-label="d2">22</td>
                                                    <td data-label="d3">26</td>
                                                    <td data-label="k">6</td>
                                                    <td data-label="L">59</td>
                                                    <td data-label="L1">25</td>
                                                    <td data-label="L2">30</td>
                                                    <td data-label="L3">9</td>
                                                    <td>---</td>
                                                    <td data-label="Action"><button class="action-btn">3D</button></td>
                                                </tr>
                                                <tr data-code="VB1.1/002" data-d1="16" data-d2="22" data-d3="26"
                                                    data-k="6" data-l="64" data-l1="25" data-l2="35"
                                                    data-l3="9">
                                                    <td data-label="Code">VB1.1/002</td>
                                                    <td data-label="d1">16</td>
                                                    <td data-label="d2">22</td>
                                                    <td data-label="d3">26</td>
                                                    <td data-label="k">6</td>
                                                    <td data-label="L">64</td>
                                                    <td data-label="L1">25</td>
                                                    <td data-label="L2">35</td>
                                                    <td data-label="L3">9</td>
                                                    <td>Available</td>
                                                    <td data-label="Action"><button class="action-btn">3D</button></td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr data-code="VB1.1/001" data-d1="16" data-d2="22" data-d3="26"
                                                    data-k="6" data-l="59" data-l1="25" data-l2="30"
                                                    data-l3="9">
                                                    <td data-label="Code">VB1.1/001</td>
                                                    <td data-label="d1">16</td>
                                                    <td data-label="d2">22</td>
                                                    <td data-label="d3">26</td>
                                                    <td data-label="k">6</td>
                                                    <td data-label="L">59</td>
                                                    <td data-label="L1">25</td>
                                                    <td data-label="L2">30</td>
                                                    <td data-label="L3">9</td>
                                                    <td>---</td>
                                                    <td data-label="Action"><button class="action-btn">3D</button></td>
                                                </tr>
                                                <tr data-code="VB1.1/002" data-d1="16" data-d2="22" data-d3="26"
                                                    data-k="6" data-l="64" data-l1="25" data-l2="35"
                                                    data-l3="9">
                                                    <td data-label="Code">VB1.1/002</td>
                                                    <td data-label="d1">16</td>
                                                    <td data-label="d2">22</td>
                                                    <td data-label="d3">26</td>
                                                    <td data-label="k">6</td>
                                                    <td data-label="L">64</td>
                                                    <td data-label="L1">25</td>
                                                    <td data-label="L2">35</td>
                                                    <td data-label="L3">9</td>
                                                    <td>Available</td>
                                                    <td data-label="Action"><button class="action-btn">3D</button></td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr data-code="VB1.1/001" data-d1="16" data-d2="22" data-d3="26"
                                                    data-k="6" data-l="59" data-l1="25" data-l2="30"
                                                    data-l3="9">
                                                    <td data-label="Code">VB1.1/001</td>
                                                    <td data-label="d1">16</td>
                                                    <td data-label="d2">22</td>
                                                    <td data-label="d3">26</td>
                                                    <td data-label="k">6</td>
                                                    <td data-label="L">59</td>
                                                    <td data-label="L1">25</td>
                                                    <td data-label="L2">30</td>
                                                    <td data-label="L3">9</td>
                                                    <td>Available</td>
                                                    <td data-label="Action"><button class="action-btn">3D</button></td>
                                                </tr>
                                                <tr data-code="VB1.1/002" data-d1="16" data-d2="22" data-d3="26"
                                                    data-k="6" data-l="64" data-l1="25" data-l2="35"
                                                    data-l3="9">
                                                    <td data-label="Code">VB1.1/002</td>
                                                    <td data-label="d1">16</td>
                                                    <td data-label="d2">22</td>
                                                    <td data-label="d3">26</td>
                                                    <td data-label="k">6</td>
                                                    <td data-label="L">64</td>
                                                    <td data-label="L1">25</td>
                                                    <td data-label="L2">35</td>
                                                    <td data-label="L3">9</td>
                                                    <td>Available</td>
                                                    <td data-label="Action"><button class="action-btn">3D</button></td>
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
                                        <p>We’ve created a full-stack structure for our working workflow processes, were
                                            from the funny the century initial all the made, have spare to negatives. But
                                            the structure was from the funny the century rather,
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
@endsection
