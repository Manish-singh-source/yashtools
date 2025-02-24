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
                                <li class="axil-breadcrumb-item active" aria-current="page">Contact</li>
                            </ul>
                            <h1 class="title">Connect With Us</h1>
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
                    <div class="row row--30">
                        <div class="col-lg-8">
                            <div class="contact-form">
                                <p>If you are looking to work with us or have any enquiry?</p>
                                <h3 class="title mb--10">Send Us a Message</h3>

                                <form  method="POST"
                                    action="{{route('user.contact.store')}}"
                                   >
                                    @csrf
                                    @method('POST')
                                    <div class="row row--10">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-name">Name <span>*</span></label>
                                                <input type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-phone">Phone <span>*</span></label>
                                                <input type="text" name="phone" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-email">E-mail <span>*</span></label>
                                                <input type="email" name="email" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-message">Your Message<span>*</span></label>
                                                <textarea name="message" cols="1" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb--0">
                                                <button type="submit"  class="axil-btn btn-bg-primary" value="">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="contact-location mb--40">
                                <h4 class="title mb--20">Our Office Address</h4>
                                <span class="address mb--20">Yash Tools (India) Pvt. Ltd.,
                                    Shop No.2, Louis Palace, Tank Road, Orlem, Malad (West), Mumbai - 400 064. India</span>
                                <span class="phone">Phone: +91-22-2863 1094</span>
                                <span class="email">Email: nikhil@yashtools.in</span>
                            </div>
                            <div class="opening-hour">
                                <h4 class="title mb--20">Working Hours:</h4>
                                <p>Monday to Saturday: 9am - 10pm
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Google Map Area  -->
                <div class="axil-google-map-wrap axil-section-gap pb--0">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="1080" height="500" id="gmap_canvas"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7535.878388230458!2d72.839978!3d19.197858000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b6dd97d27969%3A0xb6dd26be431ddfe3!2sYash%20Tools%20India%20Private%20Limited!5e0!3m2!1sen!2sus!4v1736251813115!5m2!1sen!2sus"></iframe>
                        </div>
                    </div>
                </div>
                <!-- End Google Map Area  -->
            </div>
        </div>
        <!-- End Contact Area  -->
    </main>
@endsection
