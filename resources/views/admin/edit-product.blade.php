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
                                            <input type="text"
                                                class="form-control @error('product_name') is-invalid @enderror"
                                                name="product_name" value="{{ $selectedProduct->product_name }}">
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
                                                name="product_quantity" value="{{ $selectedProduct->product_quantity }}">
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
                                                name="product_price" value="{{ $selectedProduct->product_price }}">
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
                                                <option value="Same Days" @if ($selectedProduct->product_dispatch == 'Same Days') selected @endif>
                                                    Same Days</option>
                                                <option value="1 Day to Dispatch"
                                                    @if ($selectedProduct->product_dispatch == '1 Day to Dispatch') selected @endif>1
                                                    Day to Dispatch</option>
                                                <option value="2 Day to Dispatch"
                                                    @if ($selectedProduct->product_dispatch == '2 Day to Dispatch') selected @endif>2
                                                    Day to Dispatch</option>
                                                <option value="3 Day to Dispatch"
                                                    @if ($selectedProduct->product_dispatch == '3 Day to Dispatch') selected @endif>3
                                                    Day to Dispatch</option>
                                                <option value="4 Day to Dispatch"
                                                    @if ($selectedProduct->product_dispatch == '4 Day to Dispatch') selected @endif>4
                                                    Day to Dispatch</option>
                                                <option value="5 Day to Dispatch"
                                                    @if ($selectedProduct->product_dispatch == '5 Day to Dispatch') selected @endif>5
                                                    Day to Dispatch</option>
                                            </select>
                                            @error('product_days_to_dispatch')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control @error('product_description') is-invalid @enderror" name="product_description">{{ $selectedProduct->product_discription }}</textarea>
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
                                        <h4 class="card-title--medium mb-0">Media</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="dz-default ic-message upload-img mb-3">
                                            <div class="dropzone">
                                                <div class="fallback">
                                                    <input type="file" accept=".xlsx, .csv, .xls" name="product_specs" multiple id="fileInput">
                                                    <span id="removeFile" style="cursor: pointer; color: rgb(0, 0, 0); font-weight: bold; margin-left: 10px; display: none;">
                                                        ❌
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('excelFile')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    
                                    <script>
                                        document.getElementById('fileInput').addEventListener('change', function () {
                                            let removeBtn = document.getElementById('removeFile');
                                            if (this.files.length > 0) {
                                                removeBtn.style.display = 'inline'; // Show cross button
                                            }
                                        });
                                    
                                        document.getElementById('removeFile').addEventListener('click', function () {
                                            let fileInput = document.getElementById('fileInput');
                                            fileInput.value = ""; // Clear selected file
                                            this.style.display = 'none'; // Hide cross button
                                        });
                                    </script>
                                    
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
                                            <!-- Upload Catalogue -->
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Upload Catalogue</label>
                                                <div class="d-flex align-items-center">
                                                    <input class="form-control" type="file" id="formFile" name="product_catalogue" accept=".pdf" onchange="showDeleteButton('formFile', 'deleteFileBtn')">
                                                    <button type="button" class="btn btn-danger ms-2 d-none" id="deleteFileBtn" onclick="removeFile('formFile', 'deleteFileBtn')">&#10006;</button>
                                                </div>
                                            </div>
                                            @error('product_catalogue')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        
                                            <!-- Upload PDF -->
                                            <div class="mb-3">
                                                <label for="formFileMultiple" class="form-label">Upload PDF</label>
                                                <div class="d-flex align-items-center">
                                                    <input class="form-control" type="file" id="formFileMultiple" name="product_pdf" accept=".pdf" onchange="showDeleteButton('formFileMultiple', 'deleteFileBtn2')">
                                                    <button type="button" class="btn btn-danger ms-2 d-none" id="deleteFileBtn2" onclick="removeFile('formFileMultiple', 'deleteFileBtn2')">&#10006;</button>
                                                </div>
                                            </div>
                                            @error('product_pdf')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        
                                            <!-- Upload Drawing -->
                                            <div class="mb-3">
                                                <label for="formFileDisabled" class="form-label">Upload Drawing</label>
                                                <div class="d-flex align-items-center">
                                                    <input class="form-control" type="file" id="formFileDisabled" name="product_drawing" accept=".png, .jpg, .jpeg, .webp" onchange="showDeleteButton('formFileDisabled', 'deleteFileBtn3')">
                                                    <button type="button" class="btn btn-danger ms-2 d-none" id="deleteFileBtn3" onclick="removeFile('formFileDisabled', 'deleteFileBtn3')">&#10006;</button>
                                                </div>
                                            </div>
                                            @error('product_drawing')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <script>
                                            function showDeleteButton(fileInputId, deleteBtnId) {
                                                let fileInput = document.getElementById(fileInputId);
                                                let deleteBtn = document.getElementById(deleteBtnId);
                                                
                                                // Ensure the button shows only if a file is selected
                                                if (fileInput && fileInput.files.length > 0) {
                                                    deleteBtn.classList.remove('d-none');
                                                } else {
                                                    deleteBtn.classList.add('d-none');
                                                }
                                            }
                                        
                                            function removeFile(fileInputId, deleteBtnId) {
                                                let fileInput = document.getElementById(fileInputId);
                                                let deleteBtn = document.getElementById(deleteBtnId);
                                                
                                                // Reset file input and hide delete button
                                                if (fileInput) {
                                                    fileInput.value = "";
                                                }
                                                if (deleteBtn) {
                                                    deleteBtn.classList.add('d-none');
                                                }
                                            }
                                        </script>
                                        

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
                                                            src="{{ asset('uploads/products/thumbnails/' . $selectedProduct->product_thumbain) }}"
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
                                            <select class="form-control h-auto product_category"
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
                                            <select class="form-control h-auto wide" name="product_sub_category"
                                                id="product_sub_category">
                                                @isset($selectedProduct->product_sub_category_id)
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
                                                @else
                                                    <option value="0">Select Sub Category</option>
                                                @endisset
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
@endsection

@section('scripts')
    <script>
        var enableSupportButton = '1'
    </script>
    <script>
        var asset_url = 'assets/index.html'
    </script>

    <script src="{{ asset('admin/assets/vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendor/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/category-filter.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/assets/js/image-preview.js') }}" type="text/javascript"></script>
@endsection
