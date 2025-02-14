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
                            <h1 class="title">Feedback</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Contact Area  -->
        <div class="axil-contact-page-area axil-section-gap">
            <div class="container">
                <div class="">
                    <div class="row row--30">
                        <div class="col-lg-12">
                            <div class="container">
                                <h2 class="title">Frequently Asked Questions</h2>
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <button id="accordion-button-1" aria-expanded="false"><span
                                                class="accordion-title">Why is the moon sometimes out during the
                                                day?</span><span class="icon" aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae
                                                et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button id="accordion-button-2" aria-expanded="false"><span
                                                class="accordion-title">Why is the sky blue?</span><span class="icon"
                                                aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae
                                                et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button id="accordion-button-3" aria-expanded="false"><span
                                                class="accordion-title">Will we ever discover aliens?</span><span
                                                class="icon" aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae
                                                et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button id="accordion-button-4" aria-expanded="false"><span
                                                class="accordion-title">How much does the Earth weigh?</span><span
                                                class="icon" aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae
                                                et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button id="accordion-button-5" aria-expanded="false"><span
                                                class="accordion-title">How do airplanes stay up?</span><span class="icon"
                                                aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae
                                                et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                                        </div>
                                    </div>
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

@section('script')
    <script>
        const items = document.querySelectorAll(".accordion button");

        function toggleAccordion() {
            const itemToggle = this.getAttribute('aria-expanded');

            for (i = 0; i < items.length; i++) {
                items[i].setAttribute('aria-expanded', 'false');
            }

            if (itemToggle == 'false') {
                this.setAttribute('aria-expanded', 'true');
            }
        }

        items.forEach(item => item.addEventListener('click', toggleAccordion));
    </script>
@endsection
