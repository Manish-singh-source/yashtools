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
                        <form action="{{ route('admin.update.subcategory') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-xl-12">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="dropdown bootstrap-select default-select form-control wide">
                                                <label class="form-label">Select Categorey</label>
                                                <select
                                                    class="default-select form-control wide @error('categoryImage') is-invalid @enderror"
                                                    name="categoryId">
                                                    @foreach ($categories as $category)
                                                        @if ($category->id == $selectedSubcategory->category_id)
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
                                                @error('subcategoryId')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Sub Categorey Name</label>
                                            <input type="hidden" name="selectedSubcategoryId" class="form-control"
                                                value="{{ $selectedSubcategory->id }}">
                                            <input type="text" name="subcategory_name"
                                                class="form-control @error('subcategory_name') is-invalid @enderror"
                                                value="{{ $selectedSubcategory->sub_category_name }}"
                                                placeholder="Enter Sub Category Name">

                                            @error('subcategory_name')
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
                                                        <img id="imagePreview"
                                                            src="{{ asset('/uploads/subcategories/' . $selectedSubcategory->sub_category_image) }}"
                                                            alt="Image Preview" style="width: 200px; height: auto;">
                                                    </div>
                                                    <div class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type='file'
                                                            class="form-control d-none @error('subcategoryImage') is-invalid @enderror"
                                                            id="imageUpload" accept=".png, .jpg, .jpeg, .webp"
                                                            name="subcategoryImage">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">Select
                                                            Image</label>
                                                        @error('subcategoryImage')
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
                                        style="cursor: pointer;">Edit Sub Category</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                                                                                Content body end
                                                                            ***********************************-->
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/assets/js/image-preview.js') }}" type="text/javascript"></script>
@endsection
