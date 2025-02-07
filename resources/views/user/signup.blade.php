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
                                <li class="axil-breadcrumb-item active" aria-current="page">Sign Up</li>
                            </ul>
                            <h1 class="title">Sign Up</h1>
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
                    <div class="row row--30">
                        <div class="col-lg-12">
                            <div>
                                <div class="axil-signin-form">
                                    <h3 class="title">Sign Up and Stay Connected!</h3>
                                    <p class="b2 mb--55">Plase Enter your detail below</p>
                                    <form class="signin-form" action="{{ route('register.user') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label>Company Name<span>*</span></label>
                                                <input type="text"
                                                    class="form-control @error('company_name') is-invalid @enderror"
                                                    aria-describedby="company_name" name="company_name">
                                                @error('company_name')
                                                    <div class="invalid-feedback" id="company_name">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Authorised Name<span>*</span></label>
                                                <input type="text"
                                                    class="form-control @error('fullname') is-invalid @enderror"
                                                    aria-describedby="fullname" name="fullname">
                                                @error('fullname')
                                                    <div class="invalid-feedback" id="fullname">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Email Id<span>*</span></label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    aria-describedby="email" name="email">
                                                @error('email')
                                                    <div class="invalid-feedback" id="email">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Company Address<span>*</span></label>
                                                <input
                                                    class="form-control @error('company_address') is-invalid @enderror"
                                                    aria-describedby="company_address" name="company_address">
                                                @error('company_address')
                                                    <div class="invalid-feedback" id="company_address">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Mobile Number<span>*</span></label>
                                                <input type="text"
                                                    class="form-control @error('mobile_number') is-invalid @enderror"
                                                    aria-describedby="mobile_number" name="mobile_number">
                                                @error('mobile_number')
                                                    <div class="invalid-feedback" id="mobile_number">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>GSTIN<span>*</span></label>
                                                <input type="text"
                                                    class="form-control  @error('gstin') is-invalid @enderror"
                                                    aria-describedby="gstin" name="gstin">
                                                @error('gstin')
                                                    <div class="invalid-feedback" id="gstin">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>City<span>*</span></label>
                                                <input type="text"
                                                    class="form-control  @error('city') is-invalid @enderror"
                                                    aria-describedby="city" name="city">
                                                @error('city')
                                                    <div class="invalid-feedback" id="city">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>State<span>*</span></label>
                                                <input type="text"
                                                    class="form-control  @error('state') is-invalid @enderror"
                                                    aria-describedby="state" name="state">
                                                @error('state')
                                                    <div class="invalid-feedback" id="state">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Country<span>*</span></label>
                                                <input type="text"
                                                    class="form-control @error('country') is-invalid @enderror"
                                                    aria-describedby="country" name="country">
                                                @error('country')
                                                    <div class="invalid-feedback" id="country">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Pin Code<span>*</span></label>
                                                <input type="text"
                                                    class="form-control @error('pin_code') is-invalid @enderror"
                                                    aria-describedby="pin_code" name="pin_code">
                                                @error('pin_code')
                                                    <div class="invalid-feedback" id="pin_code">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form-group">
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
                                            <div class="col-md-4 form-group">
                                                <label>Confirm Password<span>*</span></label>
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    aria-describedby="password_confirmation"
                                                    name="password_confirmation">
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback" id="password_confirmation">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign
                                                    Up</button>
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
