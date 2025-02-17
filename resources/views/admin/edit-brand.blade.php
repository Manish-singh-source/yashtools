@extends('admin.layouts.app')

@section('content-body')
    <!--**********************************
                                            Content body start
                                        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <form action="{{ route('admin.update.brand') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-xl-12">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label required">Brand Name</label>
                                            <input type="hidden" name="brandId" value="{{ $selectedbrand->id }}"
                                                class="form-control" placeholder="Food">
                                            <input type="text" name="brand_name" value="{{ $selectedbrand->brand_name }}"
                                                class="form-control @error('brand_name') is-invalid @enderror"
                                                placeholder="Food">
                                            @error('brand_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="right-sidebar-sticky">
                                    <div class="card h-auto">
                                        <div class="card-header  py-3">
                                            <h4 class="card-title--medium mb-0">Thumbnail</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class=" position-relative ">
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview"
                                                            style="background-image: url({{asset('uploads/brands/'. $selectedbrand->brand_image) }});">
                                                        </div>
                                                    </div>
                                                    <div class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type='file'
                                                            class="form-control d-none @error('brandImage') is-invalid @enderror"
                                                            id="imageUpload" name="brandImage" accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">Select
                                                            Image</label>
                                                        @error('brandImage')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm" contenteditable="false"
                                        style="cursor: pointer;">Update Brand</button>
                                </div>
                            </div>
                            <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                                            Content body end
                                        ***********************************-->
@endsection
