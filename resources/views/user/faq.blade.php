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
                                <li class="axil-breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">FAQ's</li>
                            </ul>
                            <h1 class="title">FAQ's</h1>
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
                                                class="accordion-title">What does YASH TOOLS specialize in?</span><span
                                                class="icon" aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>YASH TOOLS specializes in providing high-performance tooling solutions
                                                tailored to enhance efficiency and reduce your Total Cost of Production. We
                                                work closely with our customers to understand their unique needs and deliver
                                                world-class tools, technologies, and support.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button id="accordion-button-2" aria-expanded="false"><span
                                                class="accordion-title">How is YASH TOOLS different from other tool
                                                suppliers?</span><span class="icon" aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>We go beyond just selling tools—we partner with our clients as part of their
                                                team. Our solutions focus on improving productivity, reducing total costs,
                                                and enhancing performance through ongoing support, training, and follow-ups.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button id="accordion-button-3" aria-expanded="false"><span
                                                class="accordion-title">How can I get started with YASH TOOLS?</span><span
                                                class="icon" aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>You can reach out to us through our website's Contact us form, Phone No,
                                                email id or visit our physical store. Once we understand your requirements,
                                                we’ll begin a collaborative process to deliver the best possible tooling
                                                solution for your application.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button id="accordion-button-4" aria-expanded="false"><span
                                                class="accordion-title">Do you provide technical support after the
                                                sale?</span><span class="icon" aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>Absolutely. We offer continuous technical support and follow-up services to
                                                ensure our solutions exceed your expectations.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button id="accordion-button-5" aria-expanded="false"><span
                                                class="accordion-title">Do you offer customized tooling
                                                solutions?</span><span class="icon" aria-hidden="true"></span></button>
                                        <div class="accordion-content">
                                            <p>Yes, we provide customized solutions tailored to your specific
                                                requirements—especially for complex materials, tight tolerances, or
                                                challenging production environments.</p>
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
