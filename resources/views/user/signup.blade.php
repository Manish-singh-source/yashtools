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
                                <li class="axil-breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
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
                                    <p class="b2 mb--55 text-capitalize">Plase Enter your details below</p>
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
                                                <label>Authorised Person Name<span>*</span></label>
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
                                                <select class="@error('state') is-invalid @enderror" name="state">
                                                    <option selected disabled value="0">-- Select State --</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Odisha">Odisha</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>
                                                {{-- <input type="text"
                                                    class="form-control  @error('state') is-invalid @enderror"
                                                    aria-describedby="state" name="state"> --}}
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
                                            <div class="col-md-4 form-group">
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
