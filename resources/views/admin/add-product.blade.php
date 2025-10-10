@extends('admin.layouts.app')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content-body')
    <div class="content-body">
        <div class="container-fluid">

            <!-- Row -->
            <div class="row">
                <form action="{{ route('admin.add.product') }}" id="myForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" placeholder="Enter Product Name"
                                                class="form-control @error('product_name') is-invalid @enderror"
                                                name="product_name" value="{{ old('product_name') }}">
                                            @error('product_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product Quantity</label>
                                            <input type="number" placeholder="Enter Product Quantity"
                                                class="form-control @error('product_quantity') is-invalid @enderror"
                                                value="{{ old('product_quantity') }}" name="product_quantity">
                                            @error('product_quantity')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number" placeholder="Enter Product Price"
                                                value="{{ old('product_price') }}"
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
                                            <input type="number" placeholder="Enter Days to Dispatch"
                                                value="{{ old('product_days_to_dispatch') }}"
                                                class="form-control @error('product_days_to_dispatch') is-invalid @enderror"
                                                min="0" name="product_days_to_dispatch">
                                                
                                            @error('product_days_to_dispatch')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <div id="ckeditor"></div>
                                            <textarea placeholder="Enter Product Description"
                                                class="form-control @error('product_description') is-invalid @enderror" name="product_description"
                                                style="display: none" id="editorContent"></textarea>
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
                                        <div class="mb-3">
                                            <label for="product_specs" class="form-label">
                                                <i class="fas fa-file-excel"></i> Upload Product Specifications (Excel File)
                                            </label>
                                            <div class="dz-default ic-message upload-img mb-3">
                                                <div class="dropzone">
                                                    <div class="fallback">
                                                        <input type="file" accept=".xlsx, .csv, .xls" name="product_specs"
                                                            multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('product_specs')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <!-- Lead Time Section -->
                                        <div class="mb-3">
                                            <label for="lead_time_excel" class="form-label">
                                                <i class="fas fa-file-excel"></i> Lead Time Excel File
                                            </label>
                                            <input class="form-control @error('lead_time_excel') is-invalid @enderror"
                                                type="file"
                                                id="lead_time_excel"
                                                name="lead_time_excel"
                                                accept=".xlsx,.xls,.csv">
                                            <div class="form-text">Upload Excel file containing lead time data. Supported formats: .xlsx, .xls, .csv (Max: 10MB)</div>
                                            @error('lead_time_excel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Upload PDF (Optional)</label>
                                            <input class="form-control" type="file" id="formFileMultiple"
                                                name="product_optional_pdf">
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
                                                    name="product_catalogue">
                                            </div>
                                            @error('product_catalogue')
                                                {{ $message }}
                                            @enderror
                                            <div class="mb-3">
                                                <label for="formFileMultiple" class="form-label">Upload PDF</label>
                                                <input class="form-control" type="file" id="formFileMultiple"
                                                    name="product_pdf">
                                            </div>
                                            @error('product_pdf')
                                                {{ $message }}
                                            @enderror
                                            <div class="mb-3">
                                                <label for="formFileDisabled" class="form-label">Upload Drawing</label>
                                                <input class="form-control" type="file" id="formFileDisabled"
                                                    name="product_drawing">
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
                                                <option value="0">Select Brand</option>
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
                                            <h4 class="card-title--medium mb-0">Country Of Origin</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Country Of Origin</label>
                                                <input type="text" placeholder="Enter Country Of Origin"
                                                    class="form-control @error('product_country_of_origin') is-invalid @enderror"
                                                    name="product_country_of_origin"
                                                    value="{{ old('product_country_of_origin') }}">
                                                @error('product_country_of_origin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
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
                                                <option value="0">Select Category</option>
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
    <script>
        $("#myForm").submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            let content = editor.getData(); // Get CKEditor content
            $("#editorContent").val(content); // Set it in textarea
            this.submit(); // Submit the form
        });
    </script>
    <script src="{{ asset('admin/assets/vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendor/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/category-filter.js') }}"></script>
    <script src="{{ asset('admin/assets/js/image-preview.js') }}" type="text/javascript"></script>
@endsection
