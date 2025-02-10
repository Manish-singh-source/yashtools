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
                        <form action="{{ route('admin.add.event') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="col-xl-12">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="eventTitle" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="eventDescription" id=""></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tag</label>
                                            <input type="text" class="form-control" name="eventTag">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Date</label>
                                            <input type="date" class="form-control" name="eventDate">
                                        </div>

                                    </div>
                                </div>
                                <div class="right-sidebar-sticky">
                                    <div class="card h-auto">
                                        <div class="card-header  py-3">
                                            <h4 class="card-title--medium mb-0">Image</h4>
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
                                                        <input type='file' class="form-control d-none" id="imageUpload" name="eventImage"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">Select
                                                            Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm" contenteditable="false"
                                        style="cursor: pointer;">Add Event</button>
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
