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
</head>


<body class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    @include('user.layouts.header')

    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Login</li>
                            </ul>
                            <h1 class="title">Login</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Contact Area  -->
        <div class="axil-contact-page-area ptb--20">
            <div class="container">
                <div class="axil-contact-page">
                    <div class="row row--30 justify-content-center">
                        <div class="col-lg-6">
                            <div>
                                <div class="axil-signin-form">
                                    <h3 class="title">Welcome to Yash Tools<br> Please log in to access your account.
                                    </h3>
                                    <p class="b2 mb--55">Enter your detail below</p>
                                    <form class="singin-form" action="{{ route('auth.user') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                aria-describedby="email" name="email">
                                            @error('email')
                                                <div class="invalid-feedback" id="email">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password<span>*</span></label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                aria-describedby="password" name="password">
                                            @error('password')
                                                <div class="invalid-feedback" id="password">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <button type="submit"
                                                class="axil-btn btn-bg-primary submit-btn">Login</button>
                                            <a href="forgot-password.php" class="forgot-btn">Forget password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact Area  -->
    </main>
    @include('user.layouts.footer')
