@extends('admin.layouts.app')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content-body')
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
                                            <input type="text" placeholder="Enter Product Name"
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
                                            <input type="number" placeholder="Enter Product Quantity"
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
                                            <input type="number" placeholder="Enter Event Price"
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
                                            <input type="number" placeholder="Enter Days to Dispatch"
                                                class="form-control @error('product_days_to_dispatch') is-invalid @enderror"
                                                name="product_days_to_dispatch"
                                                value="{{ $selectedProduct->product_dispatch }}">
                                            @error('product_days_to_dispatch')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            {{-- <div id="ckeditor"></div> --}}
                                            <textarea placeholder="Enter Product Description" id="ckeditor"
                                                class="form-control @error('product_description') is-invalid @enderror" name="product_description"
                                                style="display: none">{{ $selectedProduct->product_discription }}</textarea>
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
                                        <div class="mb-3">
                                            <h6><i class="fas fa-file-alt"></i> Upload Product Specification(CSV File)</h6>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a id="product_specs_preview"
                                                    href="{{ asset('/uploads/products/product_specs/' . $selectedProduct->product_specs) }}"
                                                    target="_blank" class="text-primary fw-bold">
                                                    <i class="fas fa-eye"></i> View Catalogue
                                                </a>
                                                <input type="file" accept=".xlsx, .csv, .xls" name="product_specs"
                                                    class="form-control w-50" id="product_specs">
                                            </div>
                                        </div>

                                        @error('product_specs')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror



                                        <!-- Lead Time Section -->
                                        <div class="mb-3">
                                            <label for="lead_time_excel" class="form-label">
                                                <i class="fas fa-file-excel"></i> Lead Time Excel File
                                            </label>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                @if (!empty($selectedProduct->lead_time))
                                                    <a href="{{ asset('/uploads/products/lead_time/' . $selectedProduct->lead_time) }}"
                                                        target="_blank" class="text-success fw-bold">
                                                        <i class="fas fa-file-excel"></i> View Current Excel File
                                                    </a>
                                                @else
                                                    <span class="text-muted">
                                                        <i class="fas fa-info-circle"></i> No Lead Time Data
                                                    </span>
                                                @endif
                                            </div>
                                            <input class="form-control @error('lead_time_excel') is-invalid @enderror"
                                                type="file" id="lead_time_excel" name="lead_time_excel"
                                                accept=".xlsx,.xls,.csv">
                                            <div class="form-text">Upload Excel file containing lead time data. Supported
                                                formats: .xlsx, .xls, .csv (Max: 10MB)</div>
                                            @error('lead_time_excel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="card-body">
                                        <div class="mb-3">
                                            <h6><i class="fas fa-file-alt"></i> Upload PDF (Optional)</h6>

                                            <div class="d-flex align-items-center justify-content-between">
                                                <a id="product_optional_pdf_preview"
                                                    href="{{ asset('/uploads/products/catalogue/' . $selectedProduct->product_catalouge) }}"
                                                    target="_blank" class="text-primary fw-bold">
                                                    <i class="fas fa-eye"></i> View Catalogue
                                                </a>
                                                <input class="form-control w-50" type="file" id="product_optional_pdf"
                                                    name="product_optional_pdf" accept=".pdf">
                                            </div>
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
                                            <div class="mb-4 p-3 border rounded ">
                                                <h6><i class="fas fa-file-alt"></i> Upload Catalogue</h6>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <a id="product_catalogue_preview"
                                                        href="{{ asset('/uploads/products/catalogue/' . $selectedProduct->product_catalouge) }}"
                                                        target="_blank" class="text-primary fw-bold">
                                                        <i class="fas fa-eye"></i> View Catalogue
                                                    </a>
                                                    <input class="form-control w-50" type="file"
                                                        id="product_catalogue" name="product_catalogue" accept=".pdf">
                                                </div>
                                                @error('product_catalogue')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Upload PDF -->
                                            <div class="mb-4 p-3 border rounded ">
                                                <h6><i class="fas fa-file-pdf"></i> Upload PDF</h6>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <a id="product_pdf_preview"
                                                        href="{{ asset('/uploads/products/pdf/' . $selectedProduct->product_pdf) }}"
                                                        target="_blank" class="text-primary fw-bold">
                                                        <i class="fas fa-eye"></i> View PDF
                                                    </a>
                                                    <input class="form-control w-50" type="file" id="product_pdf"
                                                        name="product_pdf">
                                                </div>
                                                @error('product_pdf')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Upload Drawing -->
                                            <div class="mb-4 p-3 border rounded ">
                                                <h6><i class="fas fa-image"></i> Upload Drawing</h6>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <img id="product_drawing_preview"
                                                        src="{{ asset('/uploads/products/drawing/' . $selectedProduct->product_drawing) }}"
                                                        alt="Drawing Preview" class="rounded shadow-sm"
                                                        style="width: 100px; height: auto;">
                                                    <input class="form-control w-50" type="file" id="productDrawing"
                                                        name="product_drawing">
                                                </div>
                                                @error('product_drawing')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

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
                                                            src="{{ asset('/uploads/products/thumbnails/' . $selectedProduct->product_thumbain) }}"
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
                                                <option value="0" selected>Select Brand</option>
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
                                            <h4 class="card-title--medium mb-0">Country Of Origin</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Country Of Origin</label>
                                                <input type="text" placeholder="Enter Country Of Origin"
                                                    class="form-control @error('product_country_of_origin') is-invalid @enderror"
                                                    name="product_country_of_origin"
                                                    value="{{ old('product_country_of_origin', $selectedProduct->product_country_of_origin) }}">
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
                                            <h4 class="card-title--medium mb-0">Category</h4>
                                        </div>
                                        <div class="card-body">
                                            <label class="form-label">Select Category</label>
                                            <select class="form-control h-auto product_category"
                                                aria-label="Default select example" name="product_category">
                                                <option value="0" selected>Select Category</option>
                                                {{-- @isset($selectedProduct->product_category_id) --}}
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
                                                {{-- @endisset --}}
                                            </select>
                                            @error('product_category')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="card-body">
                                            <label class="form-label">Select Sub Category</label>
                                            <select class="form-control h-auto wide" name="product_sub_category"
                                                id="product_sub_category">
                                                <option value="0" selected>Select Sub Category</option>
                                                {{-- @isset($selectedProduct->product_sub_category_id) --}}
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
                                                {{-- @endisset --}}
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
    <script>
        $(document).ready(function() {
            let originalContent = $("#editorContent").val(); // Get original content

            // Wait for CKEditor instance to be ready
            CKEDITOR.instances.editor.on('instanceReady', function() {
                this.setData(originalContent);
            });

            $("#myForm").submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                let content = CKEDITOR.instances.editor.getData(); // Get CKEditor content
                $("#editorContent").val(content); // Set it in textarea

                $(this).find(":submit").prop("disabled", true); // Prevent multiple clicks
                this.submit(); // Submit the form
            });
        });
    </script>
    <script src="{{ asset('admin/assets/js/category-filter.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/image-preview.js') }}" type="text/javascript"></script>
@endsection
