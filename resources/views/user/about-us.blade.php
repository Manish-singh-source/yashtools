@extends('user.layouts.app')
@section('content')
    <style>
        .moretext {
            display: none;

        }

        .rem {
            cursor: pointer;
        }
    </style>
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">About Us</li>
                            </ul>
                            <h1 class="title">About Yash Tools</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start About Area  -->
        <div class="axil-about-area about-style-1 axil-section-gap ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-6">
                        <div class="about-thumbnail">
                            <div class="thumbnail">
                                <img src="assets/images/about/about-01.png" alt="About Us">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6">
                        <div class="about-content content-right">
                            <!-- <span class="title-highlighter highlighter-primary2"> About Us</span> -->
                            <h2 class="title m-0">About Yash Tools</h2>

                            <div class="row">
                                <div class="col-lg-12 how-to-sell">

                                    <p style="margin-bottom: 7px;">YASH TOOLS was founded on the principle of working
                                        together with our
                                        customers to fully understand your individual applications and needs and making
                                        every effort to provide you with the best possible solutions.

                                        This focus encompasses supplying the best tools from around the world, introducing
                                        the best technology, providing ongoing service, and continuous follow-up to ensure
                                        our solutions are exceeding all your requirements.
                                    </p>
                                    <p style="margin-bottom: 7px;">Today most companies are facing ever increasing pressure
                                        to reduce costs and improve
                                        productivity. Reducing costs goes beyond the simple cost of acquisition of tools,
                                        equipments and other supplies. We need to look at the Total Cost of Production.
                                        Focusing solely on the basic cost of acquisition is doomed to failure.
                                    </p>
                                    <p style="margin-bottom: 7px;">Reducing the Total Cost of Production requires examining
                                        many factors such as the
                                        tools, machines, technology, processes, operator training and methods. To achieve
                                        the goal of reducing the Total Cost of Production we need the cooperation of the
                                        entire team from purchasing, engineering, operators and suppliers.
                                    </p>
                                    <p style="margin-bottom: 7px;">YASH TOOLS fills the role of tool supplier. We have years
                                        of experience examining
                                        applications and processes from all over the world. It is our goal to work with you
                                        as a member of your team to introduce and evaluate all the possible options for your
                                        applications.
                                    </p>
                                    <p style="margin-bottom: 7px;" class="moretext">We don’t simply sell our products, we
                                        work as a member of your
                                        company to provide
                                        with the best solutions to reduce your Total Cost of production and increase your
                                        capabilities. Bring us your problems, your difficult applications, your worst
                                        materials, your tightest tolerances, your biggest headaches we will find a solution
                                        that will help you deliver your product on time and in specification.
                                    </p>
                                    <p style="margin-bottom: 7px;" class="moretext">As set forth in our guiding policy: ”Our
                                        customers are the most
                                        important part of
                                        our business. Without them we would not be here.”
                                    </p><a class="moreless-button rem">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area  -->

        <!-- Start About Area  -->
        <div class="about-info-area">
            <div class="container">
                <div class="row row--20">
                    <div class="col-lg-4">
                        <div class="about-info-box">
                            <div class="thumb">
                                <img src="assets/images/about/shape-01.png" alt="Shape">
                            </div>
                            <div class="content">
                                <h6 class="title">Vision</h6>
                                <p>
                                    To become the industry’s most trusted partner for Quality Assurance. To be the leading
                                    supplier in Die & Mold industry providing comprehensive range of tools and equipments.
                                    Be a great place to work where people are inspired to be the best they can be.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="about-info-box">
                            <div class="thumb">
                                <img src="assets/images/about/shape-02.png" alt="Shape">
                            </div>
                            <div class="content">
                                <h6 class="title">Mission </h6>
                                <p>To exceed our customers’ expectations with innovattive & bespoke Assurance,
                                    Testing, Inspections and Certifications services for their operations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="about-info-box">
                            <div class="thumb">
                                <img src="assets/images/about/shape-03.png" alt="Shape">
                            </div>
                            <div class="content">
                                <h6 class="title">Values</h6>
                                <p>We believe in trust, transparency, and a strong relationship with all our stakeholders.
                                    We have a passion to perform and consistently deliver excellence.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area  -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            // The function toggles more (hidden) text when the user clicks on "Read more". The IF ELSE statement ensures that the text 'read more' and 'read less' changes interchangeably when clicked on.
            $('.moreless-button').click(function() {
                $('.moretext').slideToggle();
                if ($('.moreless-button').text() == "Read more") {
                    $(this).text("Read less")
                } else {
                    $(this).text("Read more")
                }
            });
        </script>

    </main>
@endsection
