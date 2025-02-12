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
                        <form action="{{ route('admin.update.banner') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-xl-8">
                                <div class="right-sidebar-sticky">
                                    <div class="card h-auto">
                                        <div class="card-header py-3">
                                            <h4 class="card-title--medium mb-0">Slider</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="hidden" name="bannerId" value="{{ $banner->id }}"
                                                    class="form-control">
                                                <input type="text" name="bannerTitle"
                                                    value="@isset($banner->banner_title){{ $banner->banner_title }}@endisset"
                                                    class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="bannerDesciption" id="">
@isset($banner->banner_description)
{{ $banner->banner_description }}
@endisset
</textarea>
                                            </div>
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class="position-relative">
                                                    <div class="avatar-preview">
                                                        @if ($banner->banner_image)
                                                            <div id="imagePreview"
                                                                style="background-image: url({{ asset('uploads/banner/' . $banner->banner_image) }});">
                                                            </div>
                                                        @else
                                                            <div id="imagePreview"
                                                                style="background-image: url({{ asset('admin/assets/images/no-img-avatar.png') }});">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type="file" class="form-control d-none @error('banner_image') is-invalid @enderror" id="imageUpload"
                                                            accept=".png, .jpg, .jpeg" name="banner_image">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">Select
                                                            Slider</label>
                                                        @error('banner_image')
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
                                        style="cursor: pointer;">Update Banner</button>
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
