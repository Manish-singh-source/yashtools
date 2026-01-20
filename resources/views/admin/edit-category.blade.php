@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <form action="{{ route('admin.update.category') }}" method="POST" enctype="multipart/form-data"
                            id="editCategoryForm">
                            @csrf
                            @method('PUT')

                            <div class="col-xl-8">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <input type="hidden" name="category_id" value="{{ $category->id }}">

                                            <label class="form-label required">Category Name</label>
                                            <input type="text"
                                                class="form-control @error('category_name') is-invalid @enderror"
                                                name="category_name"
                                                value="{{ old('category_name', $category->category_name) }}"
                                                placeholder="Enter Category Name" required>
                                            @error('category_name')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="right-sidebar-sticky">
                                    <div class="card h-auto">
                                        <div class="card-header py-3">
                                            <h4 class="card-title--medium mb-0">Thumbnail</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class="position-relative">
                                                    <div class="avatar-preview">
                                                        <img id="imagePreview"
                                                            src="{{ asset('uploads/categories/' . $category->category_image) }}"
                                                            alt="Current Image"
                                                            style="width: 200px; height: 160px; object-fit: cover; border: 2px dashed #dee2e6; border-radius: 8px;">
                                                    </div>
                                                    <div class="change-btn d-flex align-items-center flex-wrap mt-2">
                                                        <input type="file"
                                                            class="form-control d-none @error('categoryImage') is-invalid @enderror"
                                                            name="categoryImage" id="imageUpload"
                                                            accept=".png,.jpg,.jpeg,.webp">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0 position-relative"
                                                            tabindex="-1">
                                                            <i class="mdi mdi-camera me-1"></i>Change Image
                                                        </label>
                                                        <span class="text-danger ms-2 fw-semibold">
                                                            <i class="mdi mdi-ruler-square me-1"></i>Exactly 300x240px
                                                        </span>
                                                        <div id="imageValidation" class="ms-3"></div>
                                                        @error('categoryImage')
                                                            <div class="invalid-feedback d-block w-100">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div id="imageInfo"
                                                        class="mt-2 p-2 bg-light rounded small text-muted d-none">
                                                        <i class="mdi mdi-image-size-select-actual me-1"></i>
                                                        <span id="currentDimensions"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm mt-3" id="submitBtn">
                                    <span class="submit-text">Update Category</span>
                                    <span class="submit-spinner d-none">
                                        <i class="mdi mdi-loading spinner me-1"></i>Updating...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Prevent duplicate bindings
            $('#imageUpload').off('change').on('change', handleImageUpload);

            function handleImageUpload(e) {
                const file = e.target.files[0];
                const $preview = $('#imagePreview');
                const $validation = $('#imageValidation');
                const $imageInfo = $('#imageInfo');
                const $input = $('#imageUpload');

                resetImageStates($preview, $validation, $imageInfo, $input);

                if (!file) {
                    // Restore original image
                    $preview.attr('src', "{{ asset($category->category_image) }}");
                    return;
                }

                if (!validateFileType(file) || !validateFileSize(file)) {
                    $input.val('');
                    return;
                }

                $validation.html('<i class="mdi mdi-loading spinner me-1"></i>Checking size...').addClass(
                    'text-info');

                loadImageDimensions(file, function(isValid, width, height) {
                    updateImagePreview($preview, $validation, $imageInfo, $input, isValid, width, height,
                        file);
                });
            }

            function resetImageStates($preview, $validation, $imageInfo, $input) {
                $validation.removeClass('text-success text-danger text-info').html('');
                $imageInfo.addClass('d-none');
                $input.removeClass('is-invalid is-valid');
                $preview.css('border-color', '#dee2e6');
            }

            function validateFileType(file) {
                if (!file.type.match('image.*')) {
                    $('#imageValidation').html('<i class="mdi mdi-alert-circle me-1"></i>Only images!').addClass(
                        'text-danger');
                    $('#imageUpload').addClass('is-invalid');
                    return false;
                }
                return true;
            }

            function validateFileSize(file) {
                if (file.size > 2097152) {
                    $('#imageValidation').html('<i class="mdi mdi-alert-circle me-1"></i>Max 2MB').addClass(
                        'text-danger');
                    $('#imageUpload').addClass('is-invalid');
                    return false;
                }
                return true;
            }

            function loadImageDimensions(file, callback) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = () => callback(true, img.naturalWidth, img.naturalHeight);
                    img.onerror = () => callback(false, 0, 0);
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }

            function updateImagePreview($preview, $validation, $imageInfo, $input, valid, width, height, file) {
                const REQUIRED_WIDTH = 300;
                const REQUIRED_HEIGHT = 240;

                $('#currentDimensions').text(`${width}x${height}px (${formatBytes(file.size)})`);
                $('#imageInfo').removeClass('d-none');
                $preview.attr('src', URL.createObjectURL(file));

                if (valid && width === REQUIRED_WIDTH && height === REQUIRED_HEIGHT) {
                    $validation.html('<i class="mdi mdi-check-circle me-1"></i>✅ Perfect size!')
                        .removeClass('text-danger text-info').addClass('text-success');
                    $input.addClass('is-valid');
                    $preview.css('border-color', '#28a745');
                } else {
                    $validation.html(`<i class="mdi mdi-close-circle me-1"></i>❌ Need ${REQUIRED_WIDTH}x${REQUIRED_HEIGHT}px<br>
                           <small>Got ${width}x${height}px</small>`)
                        .removeClass('text-success text-info').addClass('text-danger');
                    $input.addClass('is-invalid');
                    $preview.css('border-color', '#dc3545');
                }
            }

            function formatBytes(bytes) {
                if (!bytes) return '0 B';
                return (bytes / 1024).toFixed(0) + ' KB';
            }

            $('label[for="imageUpload"]').on('click', function(e) {
                e.preventDefault();
                $('#imageUpload')[0].click();
            });

            $('#editCategoryForm').on('submit', function() {
                $('#submitBtn').prop('disabled', true).find('.submit-text').addClass('d-none');
                $('#submitBtn .submit-spinner').removeClass('d-none');
            });
        });
    </script>
@endsection
