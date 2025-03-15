<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>Yash Tools Admin</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords"
        content="WorldNIC is a powerful PHP Admin Dashboard Bootstrap Template, designed for seamless management and data visualization in various web applications.">
    <meta name="author" content="Dexignlabs">
    <meta name="robots" content="index, follow">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="description"
        content="WorldNIC template, PHP admin dashboard, Bootstrap admin template, web application dashboard, data visualization template, responsive admin panel, PHP dashboard design, admin dashboard features, Bootstrap 5 admin, customizable dashboard template.">
    <meta name="og:title" content="Yash Tools Admin">
    <meta name="og:description"
        content="WorldNIC template, PHP admin dashboard, Bootstrap admin template, web application dashboard, data visualization template, responsive admin panel, PHP dashboard design, admin dashboard features, Bootstrap 5 admin, customizable dashboard template.">
    <meta name="og:image" content="../social-image.png">
    <meta name="format-detection" content="telephone=no">
    <meta name="twitter:description"
        content="WorldNIC template, PHP admin dashboard, Bootstrap admin template, web application dashboard, data visualization template, responsive admin panel, PHP dashboard design, admin dashboard features, Bootstrap 5 admin, customizable dashboard template.">
    <meta name="twitter:title" content="Yash Tools Admin">
    <meta name="twitter:image" content="../social-image.png">
    <meta name="twitter:card" content="summary_large_image">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">

    <link href="{{ asset('admin/assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="login-aside text-center  d-flex flex-column flex-row-auto">
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <div class="text-center mb-4 pt-5">
                    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets\images\myimg\logo.png') }}" class="dark-login"
                            alt=""></a>
                    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets\images\myimg\logo.png') }}" class="light-login"
                            alt=""></a>
                </div>
                <h3 class="mb-2">Welcome back!</h3>
                <p>User Experience & Interface Design <br>Strategy SaaS Solutions</p>
            </div>
            <div class="aside-image" style="background-image:url(admin/assets/images/myimg/login.png);"></div>
        </div>
        <div
            class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex justify-content-center h-100 align-items-center">
                <div class="authincation-content style-2">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">

                                <h4 class="text-center mb-4">Forgot Password</h4>
                                <form action="{{ route('user.reset.pass.link') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"  placeholder="Enter Your Email">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script>
        var enableSupportButton = '1'
    </script>
    <script>
        var asset_url = 'assets/index.php'
    </script>

    <script src="{{ asset('admin/assets/vendor/global/global.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin/assets/js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/ic-sidenav-init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/demo.js') }}" type="text/javascript"></script>
</body>

</html>
