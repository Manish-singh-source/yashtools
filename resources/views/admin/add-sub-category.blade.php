@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <form action="{{ route('admin.add.subcategory') }}" method="POST" enctype="multipart/form-data"
                            id="subcategoryForm">
                            @csrf
                            @method('POST')

                            <div class="col-xl-12">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label required">Select Category</label>
                                            <div
                                                class="dropdown bootstrap-select default-select form-control wide @error('subcategoryId') is-invalid @enderror">
                                                <select class="default-select form-control wide" name="subcategoryId"
                                                    required>
                                                    <option selected disabled>-- select category --</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('subcategoryId') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('subcategoryId')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label required">Sub Category Name</label>
                                            <input type="text" name="subcategory_name"
                                                class="form-control @error('subcategory_name') is-invalid @enderror"
                                                value="{{ old('subcategory_name') }}" placeholder="Enter Sub Category Name"
                                                required>
                                            @error('subcategory_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label required">Display Order</label>
                                            <input type="number" name="display_order"
                                                class="form-control @error('display_order') is-invalid @enderror"
                                                value="{{ old('display_order') }}" placeholder="Enter Display Order"
                                                min="0" required>
                                            @error('display_order')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
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
                                                            src="{{ asset('admin/assets/images/no-img-avatar.png') }}"
                                                            alt="Image Preview"
                                                            style="width: 200px; height: 160px; object-fit: cover; border: 2px dashed #dee2e6; border-radius: 8px;">
                                                    </div>
                                                    <div class="change-btn d-flex align-items-center flex-wrap mt-2">
                                                        <input type='file'
                                                            class="form-control d-none @error('subcategoryImage') is-invalid @enderror"
                                                            name="subcategoryImage" id="imageUpload"
                                                            accept=".png,.jpg,.jpeg,.webp" required>
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0 position-relative"
                                                            tabindex="-1">
                                                            <i class="mdi mdi-camera me-1"></i>Select Image
                                                        </label>

                                                        @error('subcategoryImage')
                                                            <div class="invalid-feedback d-block w-100">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <span class="text-danger ms-2 fw-semibold">
                                                        <i class="mdi mdi-ruler-square me-1"></i>Image should be 300x240px
                                                        (Max 2MB)
                                                    </span>
                                                    <div id="imageValidation" class="ms-3"></div>
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

                                <button type="submit" class="btn btn-primary btn-sm mt-3" id="submitBtn">
                                    <span class="submit-text">Add Sub Category</span>
                                    <span class="submit-spinner d-none">
                                        <i class="mdi mdi-loading spinner"></i> Adding...
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
            // Prevent multiple event bindings
            $('#imageUpload').off('change').on('change', handleImageUpload);

            // Single optimized image handler
            function handleImageUpload(e) {
                const file = e.target.files[0];
                const $preview = $('#imagePreview');
                const $validation = $('#imageValidation');
                const $imageInfo = $('#imageInfo');
                const $input = $('#imageUpload');

                // Reset ALL states immediately
                resetImageStates($preview, $validation, $imageInfo, $input);

                if (!file) {
                    $preview.attr('src', "{{ asset('admin/assets/images/no-img-avatar.png') }}");
                    return;
                }

                // Fast validation first
                if (!validateFileType(file) || !validateFileSize(file)) {
                    $input.val(''); // Clear invalid file
                    return;
                }

                // Show loading state
                $validation.html('<i class="mdi mdi-loading spinner me-1"></i>Checking dimensions...').addClass(
                    'text-info');

                // Load image dimensions (async but optimized)
                loadImageDimensions(file, function(dimensionsValid, actualWidth, actualHeight) {
                    updateImagePreview($preview, $validation, $imageInfo, $input, dimensionsValid,
                        actualWidth, actualHeight, file);
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
                    $('#imageValidation').html('<i class="mdi mdi-alert-circle me-1"></i>Only images allowed!')
                        .addClass('text-danger');
                    $('#imageUpload').addClass('is-invalid');
                    return false;
                }
                return true;
            }

            function validateFileSize(file) {
                if (file.size > 2097152) { // 2MB
                    $('#imageValidation').html('<i class="mdi mdi-alert-circle me-1"></i>File too large (Max 2MB)')
                        .addClass('text-danger');
                    $('#imageUpload').addClass('is-invalid');
                    return false;
                }
                return true;
            }

            function loadImageDimensions(file, callback) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        callback(true, img.naturalWidth, img.naturalHeight);
                    };
                    img.onerror = function() {
                        callback(false, 0, 0);
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }

            function updateImagePreview($preview, $validation, $imageInfo, $input, valid, width, height, file) {
                const REQUIRED_WIDTH = 300;
                const REQUIRED_HEIGHT = 240;

                // Show dimensions
                $('#currentDimensions').text(`${width}x${height}px (${formatBytes(file.size)})`);
                $('#imageInfo').removeClass('d-none');

                // Update preview
                $preview.attr('src', URL.createObjectURL(file));

                // **STRICT DIMENSION VALIDATION** - Only perfect match is "Perfect!"
                if (width === REQUIRED_WIDTH && height === REQUIRED_HEIGHT) {
                    $validation.html('<i class="mdi mdi-check-circle me-1"></i>✅ Perfect dimensions!')
                        .removeClass('text-danger text-info').addClass('text-success fw-semibold');
                    $input.addClass('is-valid').removeClass('is-invalid');
                    $preview.css('border-color', '#28a745');
                } else {
                    $validation.html(
                            `<i class="mdi mdi-close-circle me-1"></i>❌ Wrong dimensions!<br>
                        <small>Required: <strong>${REQUIRED_WIDTH}×${REQUIRED_HEIGHT}px</strong><br>
                        Uploaded: <strong>${width}×${height}px</strong></small>`
                        )
                        .removeClass('text-success text-info').addClass('text-danger');
                    $input.addClass('is-invalid').removeClass('is-valid');
                    $preview.css('border-color', '#dc3545');
                }
            }

            function formatBytes(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['B', 'KB', 'MB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return (bytes / Math.pow(k, i)).toFixed(0) + ' ' + sizes[i];
            }

            // Prevent label double-click lag
            $('label[for="imageUpload"]').on('click', function(e) {
                e.preventDefault();
                $('#imageUpload')[0].click();
            });

            // Form submit with loading
            $('#subcategoryForm').on('submit', function() {
                const $btn = $('#submitBtn');
                $btn.prop('disabled', true);
                $('.submit-text').addClass('d-none');
                $('.submit-spinner').removeClass('d-none');
            });
        });
    </script>
@endsection
