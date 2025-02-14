<!-- Start Header -->
<header class="header axil-header header-style-5">
    <!-- Start Mainmenu Area -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="index.php" class="logo logo-dark">
                        <img src="assets/images/logo/logo.png" alt="Site Logo">
                    </a>
                    <a href="index.php" class="logo logo-light">
                        <img src="assets/images/logo/logo-light.png" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmenu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="index.php" class="logo">
                                <img src="assets/images/logo/logo.png" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li><a href="{{ route('user.home') }}">Home</a></li>
                            <li><a href="about-us.php">About Us</a></li>
                            <li class="menu-item-has-children mega-menu-parent">
                                <a href="{{ route('user.shop') }}">Products</a>
                                <div class="axil-megamenu">
                                    <div class="megamenu-column">
                                        <h4 class="menu-title">Category</h4>
                                        <ul>
                                            @forelse ($categories as $category)
                                                <li><a href="shop.php">{{ $category->category_name }}</a></li>
                                            @empty
                                                <li><a href="shop.php">Please Add Category</a></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="megamenu-column">
                                        <h4 class="menu-title">Sub Category</h4>
                                        <ul>
                                            @forelse ($subcategories as $subcategory)
                                                <li><a href="shop.php">{{ $subcategory->sub_category_name }}</a></li>
                                            @empty
                                                <li><a href="shop.php">Please Add Category</a></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="megamenu-column">
                                        <h4 class="menu-title">Brands</h4>
                                        <ul>
                                            @forelse ($brands as $brand)
                                                <li><a href="shop.php">{{ $brand->brand_name }}</a></li>
                                            @empty
                                                <li><a href="shop.php">Manish1</a></li>
                                                <li><a href="shop.php">Manish2</a></li>
                                                <li><a href="shop.php">Manish</a></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="event.php">Events</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmenu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search d-xl-block d-none">
                            <input type="search" class="placeholder product-search-input" name="search2" id="search2"
                                value="" maxlength="128" placeholder="Search" autocomplete="off">
                            <button type="submit" class="icon wooc-btn-search">
                                <i class="flaticon-magnifying-glass"></i>
                            </button>
                        </li>
                        <li class="axil-search d-xl-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon mys" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('signin') }}" class="headerlist"><i
                                    class="fas fa-sign-in-alt icon dn"></i> <span>Login</span></a></li>
                        <li><a href="{{ route('signup') }}" class="headerlist"><i class="fas fa-user-plus icon dn"></i>
                                <span>Sign Up</span></a></li>
                        <!-- <li class="my-account">
                            <a class="useraccount" href="my-account.php">
                                <i class="flaticon-person"></i>
                            </a>
                        </li> -->
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
<!-- End Header -->
