@extends('user.layouts.app')

@section('content')
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
                                                <input class="form-control @error('company_address') is-invalid @enderror"
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
                                                    aria-describedby="password_confirmation" name="password_confirmation">
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
@endsection
