@extends('admin.layouts.app')

@section('content-body')
    <!--**********************************
                                                                                        Content body start
                                                                                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <!-- Row -->
            <div class="row">
                <form action="{{ route('admin.update.event') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-xl-12">
                        <div class="card h-auto">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="eventTitle" value="{{ $selectedEvent->events_title }}"
                                        class="form-control @error('eventTitle') is-invalid @enderror">
                                    @error('eventTitle')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('eventDescription') is-invalid @enderror" name="eventDescription" id="">{{ $selectedEvent->events_description }}</textarea>
                                    @error('eventDescription')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tag</label>
                                    <input type="text" class="form-control @error('eventTag') is-invalid @enderror"
                                        value="{{ $selectedEvent->events_tag }}" name="eventTag">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control @error('eventDate') is-invalid @enderror"
                                        value="{{ $selectedEvent->events_date }}" name="eventDate">
                                    <input type="hidden" class="form-control" value="{{ $selectedEvent->id }}"
                                        name="eventId">
                                    @error('eventDate')
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
                                    <h4 class="card-title--medium mb-0">Image</h4>
                                </div>
                                <div class="card-body">
                                    <div class="avatar-upload d-flex align-items-center">
                                        <div class=" position-relative ">
                                            <div class="avatar-preview">
                                                <img id="imagePreview"
                                                            src="{{ asset('uploads/events/' . $selectedEvent->events_image) }}"
                                                            alt="Image Preview" style="width: 200px; height: auto;">
                                            </div>
                                            <div class="change-btn d-flex align-items-center flex-wrap">
                                                <input type='file'
                                                    class="form-control d-none @error('eventImage') is-invalid @enderror"
                                                    id="imageUpload" name="eventImage" accept=".png, .jpg, .jpeg, .webp">
                                                <label for="imageUpload" class="btn btn-sm btn-primary light ms-0">Select
                                                    Image</label>
                                                @error('eventImage')
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
                                style="cursor: pointer;">Update Event</button>
                        </div>
                    </div>
                </form>

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
