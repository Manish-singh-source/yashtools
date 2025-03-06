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
                                <li class="axil-breadcrumb-item active" aria-current="page">Forgot</li>
                            </ul>
                            <h1 class="title">Forgot</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Contact Area  -->
        <div class="axil-contact-page-area axil-section-gap">
            <div class="container">
                <div class="axil-contact-page">
                    <div class="row row--30 justify-content-center">
                        <div class="col-lg-6">
                            <div>
                                <div class="axil-signin-form">
                                    <h3 class="title">Forgot Password?</h3>
                                    <p class="b2 mb--55">Enter the email address you used when you joined and we’ll send you
                                        instructions to reset your password.</p>
                                    <form class="singin-form" action="{{ route('user.reset.pass.link') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Your E-mail">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Send Reset
                                                Instructions</button>
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
