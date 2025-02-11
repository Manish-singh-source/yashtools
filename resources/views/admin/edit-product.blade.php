@extends('admin.layouts.app')

@section('content-body')
    <!--**********************************
                                                                                                        Content body start
                                                                                                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <!-- Row -->
            <div class="row">
                <form action="{{ route('admin.update.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="hidden" class="form-control" name="productId"
                                                value="{{ $selectedProduct->id }}">
                                            <input type="text" class="form-control" name="product_name"
                                                value="{{ $selectedProduct->product_name }}">
                                            @error('product_name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product Quantity</label>
                                            <input type="number" class="form-control" name="product_quantity"
                                                value="{{ $selectedProduct->product_quantity }}">
                                            @error('product_quantity')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number" class="form-control" name="product_price"
                                                value="{{ $selectedProduct->product_price }}">
                                            @error('product_price')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Days to Dispatch</label>
                                            <select class="form-control default-select h-auto wide"
                                                aria-label="Default select example" name="product_days_to_dispatch">

                                                <option value="0" @if ($selectedProduct->product_dispatch == '0') selected @endif>
                                                    Same Days</option>
                                                <option value="1" @if ($selectedProduct->product_dispatch == '1') selected @endif>1
                                                    Day to Dispatch</option>
                                                <option value="2" @if ($selectedProduct->product_dispatch == '2') selected @endif>2
                                                    Day to Dispatch</option>
                                                <option value="3" @if ($selectedProduct->product_dispatch == '3') selected @endif>3
                                                    Day to Dispatch</option>
                                                <option value="4" @if ($selectedProduct->product_dispatch == '4') selected @endif>4
                                                    Day to Dispatch</option>
                                                <option value="5" @if ($selectedProduct->product_dispatch == '5') selected @endif>5
                                                    Day to Dispatch</option>
                                            </select>
                                            @error('product_days_to_dispatch')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="product_description">{{ $selectedProduct->product_discription }}</textarea>
                                            @error('product_description')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card h-auto">
                                    <div class="card-header py-3">
                                        <h4 class="card-title--medium mb-0">Media</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="dz-default ic-message upload-img mb-3">
                                            <div class="dropzone">
                                                <div class="fallback">
                                                    <input type="file" name="excelFile" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        @error('excelFile')
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
                                                    name="product_catalogue" accept=".png, .jpg, .jpeg">
                                            </div>
                                            @error('product_catalogue')
                                                {{ $message }}
                                            @enderror
                                            <div class="mb-3">
                                                <label for="formFileMultiple" class="form-label">Upload PDF</label>
                                                <input class="form-control" type="file" id="formFileMultiple"
                                                    name="product_pdf" accept=".png, .jpg, .jpeg">
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
                                                        <div id="imagePreview"
                                                            style="background-image: url(assets/images/no-img-avatar.png);">
                                                        </div>
                                                    </div>
                                                    <div class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type='file' class="form-control d-none" id="imageUpload"
                                                            accept=".png, .jpg, .jpeg" name="product_image">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">Select
                                                            Image</label>
                                                        @error('product_image')
                                                            {{ $message }}
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
                                                    @if ($selectedProduct->product_brand_id == $brand->id)
                                                        <option selected value="{{ $brand->id }}">
                                                            {{ $brand->brand_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                        </option>
                                                    @endif
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
                                            <select class="form-control default-select h-auto wide"
                                                aria-label="Default select example" name="product_category">
                                                @foreach ($categories as $category)
                                                    @if ($selectedProduct->product_category_id == $category->id)
                                                        <option value="{{ $category->id }}" selected>
                                                            {{ $category->category_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->category_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('product_category')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="card-body">
                                            <label class="form-label">Select Sub Catogery</label>
                                            <select class="form-control default-select h-auto wide"
                                                aria-label="Default select example" name="product_sub_category">
                                                @foreach ($subcategories as $subcategory)
                                                    @if ($selectedProduct->product_sub_category_id == $subcategory->id)
                                                        <option value="{{ $subcategory->id }}" selected>
                                                            {{ $subcategory->sub_category_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $subcategory->id }}">
                                                            {{ $subcategory->sub_category_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
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
                                                                    value="new" name="new_products"
                                                                    @if ($selectedProduct->product_arrivals) checked @endif>New
                                                                Products
                                                            </label>
                                                            @error('new_products')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    @if ($selectedProduct->product_sale) checked @endif
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
                                        style="cursor: pointer;">Update Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
	
    <script src="assets/vendor/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="assets/vendor/dropzone/dist/dropzone.js" type="text/javascript"></script>
@endsection
