@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body default-height">
        <div class="container-fluid">
            <div class="card profile-overview profile-overview-wide">
                <div class="card-body d-flex">
                    <div class="clearfix">
                        <div class="d-inline-block position-relative me-sm-4 me-3 mb-3 mb-lg-0">
                            @if ($productDetails->product_thumbain != '')
                                <img src="{{ asset('uploads/products/thumbnails/' . $productDetails->product_thumbain) }}"
                                    alt="" class="rounded-4 w-100">
                            @else
                                <img src="{{ asset('uploads/products/thumbnails/' . $productDetails->product_thumbain) }}"
                                    alt="" class="rounded-4 w-100">
                            @endif
                        </div>
                    </div>
                    <div class="clearfix d-xl-flex flex-grow-1">
                        <div class="clearfix pe-md-5">
                            <h3 class="fw-semibold mb-1">{{ $productDetails->product_name }}</h3>
                            <h6>Quntity :- <span>{{ $productDetails->product_quantity }}</span></h6>
                            <h6>Price :- <span>{{ $productDetails->product_price }}</span></h6>
                            <h6>Brand Name :- <span>{{ $productDetails->brands->brand_name }}</span></h6>
                            <h6>Category Name :- <span>{{ $productDetails->categories->category_name }}</span></h6>
                            <h6>Sub Category Name :- <span>{{ $productDetails->subcategories->sub_category_name }}</span>
                            </h6>
                            <h6>Description :-</h6>
                            {{-- <ul class="d-flex flex-wrap fs-6 align-items-center"> --}}
                                {{-- <li class="me-3 d-inline-flex align-items-center"> --}}
                                    {!! $productDetails->product_discription !!}
                                {{-- </li> --}}
                            {{-- </ul> --}}
                            <div class="p-md-4 p-3 mt-3 border-opacity-10 rounded">
                                <div class="row g-3">
                                    @if ($productDetails->product_pdf != '')
                                        <div class="col-lg-3 col-sm-6">
                                            <a href="{{ asset('uploads/products/pdf/' . $productDetails->product_pdf) }}" target="_blank">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <img src="{{ asset('admin/assets/images/files/pdf.png') }}"
                                                            width="35" alt="">
                                                    </div>
                                                    <div class="clearfix">
                                                        <h6 class="mb-0">PDF</h6>
                                                        <span class="fs-13">1.5MB</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @if ($productDetails->product_drawing != '')
                                        <div class="col-lg-3 col-sm-6">
                                            <a
                                                href="{{ asset('uploads/products/drawing/' . $productDetails->product_drawing) }}" target="_blank">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <img src="{{ asset('admin/assets/images/files/pdf.png') }}"
                                                            width="35" alt="">
                                                    </div>
                                                    <div class="clearfix">
                                                        <h6 class="mb-0">Drawing</h6>
                                                        <span class="fs-13">1.5MB</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @if ($productDetails->product_catalouge != '')
                                        <div class="col-lg-3 col-sm-6">
                                            <a
                                                href="{{ asset('uploads/products/catalogue/' . $productDetails->product_catalouge) }}" target="_blank">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <img src="{{ asset('admin/assets/images/files/pdf.png') }}"
                                                            width="35" alt="">
                                                    </div>
                                                    <div class="clearfix">
                                                        <h6 class="mb-0">Catalogue</h6>
                                                        <span class="fs-13">1.5MB</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
