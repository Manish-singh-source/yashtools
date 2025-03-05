<section class="headb pt-4 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mobme text-center">
                <a href="{{ route('user.dashboard') }}"><img src="{{ asset('assets\images\logo\logo.png') }}"
                        alt=""></a>
                <a class="d-md-none" id="sidebarToggle">
                    <i class="fa fa-bars"></i> <!-- Hamburger icon -->
                </a>
            </div>
        </div>
    </div>

</section>

<!-- Main Content (3 Columns) -->
<section class="headb1">
    <div class="container-fluid">
        <!-- Hamburger Icon to open the sidebar on mobile -->

        <!-- Sidebar Menu -->
        <div class="sidebar" id="sidebarMenu">
            <div class="d-flex justify-content-between">
                <button class="btn btn-close" id="closeSidebar">X</button>
            </div>
            <div class="text-center">
                <a href="{{ route('user.dashboard') }}" class="d-block mb-3">
                    <div class="tagnew {{ Route::currentRouteName() == 'user.dashboard' ? 'activeTab' : '' }}">
                        <i class="fa fa-home"></i>
                        Home
                    </div>
                </a>
                
                <a href="{{ route('user.product.category') }}" class="d-block mb-3">
                    <div class="tagnew {{ Route::currentRouteName() == 'user.product.category' ? 'activeTab' : '' }}">
                        <i class="fa fa-shopping-bag"></i>
                        Products
                    </div>
                </a>
                <a href="{{ route('user.maincart') }}" class="d-block mb-3">
                    <div class="tagnew {{ Route::currentRouteName() == 'user.maincart' ? 'activeTab' : '' }}">
                        <i class="fa fa-shopping-cart"></i>
                        Cart
                    </div>
                </a>

                <a href="{{ route('user.favourites') }}">
                    <div class="tagnew {{ Route::currentRouteName() == 'user.favourites' ? 'activeTab' : '' }}">
                        <i class="fa fa-heart"></i>
                        Favourites
                    </div>
                </a>
                <a href="{{ route('user.account') }}" class="d-block mb-3">
                    <div class="tagnew {{ Route::currentRouteName() == 'user.account' ? 'activeTab' : '' }}">
                        <i class="fa fa-user"></i>
                        Orders
                    </div>
                </a>
            </div>
        </div>

        <!-- Main content (optional, if needed to show on top of sidebar) -->
        <div class="row text-center">
            <div class="col-12 d-none d-md-block">
                <div class="mainhed">
                    <a href="{{ route('user.dashboard') }}">
                        <div class="tagnew {{ Route::currentRouteName() == 'user.dashboard' ? 'activeTab' : '' }}">
                            <i class="fa fa-home"></i>
                            Home
                        </div>
                    </a>
                    <a href="{{ route('user.product.category') }}">
                        <div class="tagnew {{ Route::currentRouteName() == 'user.product.category' ? 'activeTab' : '' }}">
                            <i class="fa fa-shopping-bag"></i>
                            Products
                        </div>
                    </a>
                    <a href="{{ route('user.maincart') }}">
                        <div class="tagnew {{ Route::currentRouteName() == 'user.maincart' ? 'activeTab' : '' }}">
                            <i class="fa fa-shopping-cart"></i>
                            Cart
                        </div>
                    </a>

                    <a href="{{ route('user.favourites') }}">
                        <div class="tagnew {{ Route::currentRouteName() == 'user.favourites' ? 'activeTab' : '' }}">
                            <i class="fa fa-heart"></i>
                            Favourites
                        </div>
                    </a>
                    <a href="{{ route('user.account') }}">
                        <div class="tagnew {{ Route::currentRouteName() == 'user.account' ? 'activeTab' : '' }}">
                            <i class="fa fa-user"></i>
                            My Account
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add the CSS for Sidebar Styling -->
<style>
    .sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        background-color: #2e3667;
        padding-top: 60px;
        transition: 0.3s;
        z-index: 1000;
    }

    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar .btn-close {
        font-size: 30px;
        color: white;
        background: transparent;
        border: none;
    }

    /* When Sidebar is Open */
    .sidebar.open {
        left: 0;
    }
</style>

<!-- Add the JS to Toggle Sidebar -->
<script>
    // Toggle sidebar open/close
    const sidebarToggle = document.getElementById("sidebarToggle");
    const sidebar = document.getElementById("sidebarMenu");
    const closeSidebar = document.getElementById("closeSidebar");

    sidebarToggle.addEventListener("click", function() {
        sidebar.classList.add("open");
    });

    closeSidebar.addEventListener("click", function() {
        sidebar.classList.remove("open");
    });
</script>
