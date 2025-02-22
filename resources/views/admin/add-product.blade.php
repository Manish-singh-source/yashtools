@extends('admin.layouts.app')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content-body')
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                            Content body start
                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <!-- Row -->
            <div class="row">
                <form action="{{ route('admin.add.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text"
                                                class="form-control @error('product_name') is-invalid @enderror"
                                                name="product_name">
                                            @error('product_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product Quantity</label>
                                            <input type="number"
                                                class="form-control @error('product_quantity') is-invalid @enderror"
                                                name="product_quantity">
                                            @error('product_quantity')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number"
                                                class="form-control @error('product_price') is-invalid @enderror"
                                                name="product_price">
                                            @error('product_price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Days to Dispatch</label>
                                            <select
                                                class="form-control default-select h-auto wide @error('product_days_to_dispatch') is-invalid @enderror"
                                                aria-label="Default select example" name="product_days_to_dispatch">
                                                <option value="Same Days" selected>Same Days</option>
                                                <option value="1 Day to Dispatch">1 Day to Dispatch</option>
                                                <option value="2 Day to Dispatch">2 Day to Dispatch</option>
                                                <option value="3 Day to Dispatch">3 Day to Dispatch</option>
                                                <option value="4 Day to Dispatch">4 Day to Dispatch</option>
                                                <option value="5 Day to Dispatch">5 Day to Dispatch</option>
                                            </select>
                                            @error('product_days_to_dispatch')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control @error('product_description') is-invalid @enderror" name="product_description"></textarea>
                                            @error('product_description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card h-auto">
                                    <div class="card-header py-3">
                                        <h4 class="card-title--medium mb-0">Specifications</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="dz-default ic-message upload-img mb-3">
                                            <div class="dropzone">
                                                <div class="fallback">
                                                    <input type="file" accept=".xlsx, .csv, .xls" name="product_specs"
                                                        multiple>
                                                </div>
                                            </div>
                                        </div>
                                        @error('excelFile')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Upload PDF (Optional)</label>
                                            <input class="form-control" type="file" id="formFileMultiple"
                                                name="product_optional_pdf" accept=".png, .jpg, .jpeg, .webp">
                                        </div>
                                        @error('product_optional_pdf')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="card h-auto">
                                    <div class="card-header py-3">
                                        <h4 class="card-title--medium mb-0">Upload File</h4>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Upload Catalogue</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="product_catalogue" accept=".pdf">
                                            </div>
                                            @error('product_catalogue')
                                                {{ $message }}
                                            @enderror
                                            <div class="mb-3">
                                                <label for="formFileMultiple" class="form-label">Upload PDF</label>
                                                <input class="form-control" type="file" id="formFileMultiple"
                                                    name="product_pdf" accept=".pdf">
                                            </div>
                                            @error('product_pdf')
                                                {{ $message }}
                                            @enderror
                                            <div class="mb-3">
                                                <label for="formFileDisabled" class="form-label">Upload Drawing</label>
                                                <input class="form-control" type="file" id="formFileDisabled"
                                                    name="product_drawing" accept=".png, .jpg, .jpeg">
                                            </div>
                                            @error('product_drawing')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="right-sidebar-sticky">
                                    <div class="card">
                                        <div class="card-header py-3">
                                            <h4 class="card-title--medium mb-0">Thumbnail</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class=" position-relative ">
                                                    <div class="avatar-preview">
                                                        <img id="imagePreview"
                                                            src="{{ asset('admin/assets/images/no-img-avatar.png') }}"
                                                            alt="Image Preview" style="width: 200px; height: auto;">
                                                    </div>
                                                    <div class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type='file'
                                                            class="form-control d-none @error('product_image') is-invalid @enderror"
                                                            id="imageUpload" accept=".png, .jpg, .jpeg, .webp"
                                                            name="product_image">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">Select
                                                            Image</label>
                                                        @error('product_image')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card h-auto">
                                        <div class="card-header py-3">
                                            <h4 class="card-title--medium mb-0">Brand </h4>
                                        </div>
                                        <div class="card-body">

                                            <label class="form-label">Select Brand</label>
                                            <select class="form-control default-select h-auto wide"
                                                aria-label="Default select example" name="product_brand">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('product_brand')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="card h-auto">
                                        <div class="card-header py-3">
                                            <h4 class="card-title--medium mb-0">Catogery</h4>
                                        </div>
                                        <div class="card-body">
                                            <label class="form-label">Select Catogery</label>
                                            <select class="form-control h-auto product_category"
                                                aria-label="Default select example" name="product_category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('product_category')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="card-body">
                                            <label class="form-label">Select Sub Catogery</label>
                                            <select class="form-control h-auto wide" id="product_sub_category"
                                                name="product_sub_category">
                                                <option value="0">Select Sub Category</option>
                                            </select>
                                            @error('product_sub_category')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Add Products</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="new" name="new_products">New Products
                                                            </label>
                                                            @error('new_products')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="offer" name="new_offer">Product Offers
                                                            </label>
                                                            @error('new_offer')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm" contenteditable="false"
                                        style="cursor: pointer;">Add Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var enableSupportButton = '1'
    </script>
    <script>
        var asset_url = 'assets/index.html'
    </script>

    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/category-filter.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/assets/js/image-preview.js') }}" type="text/javascript"></script>
@endsection
