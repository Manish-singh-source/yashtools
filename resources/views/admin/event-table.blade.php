@extends('admin.layouts.app')

@section('content-body')
    <!--**********************************
                                                                Content body start
                                                            ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Event List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="projectlist" class="display">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">
                                                <div class="form-check custom-checkbox checkbox-primary  me-3">
                                                    <input type="checkbox" class="form-check-input" id="checkAll"
                                                        required="">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Event</th>
                                            <th>Date</th>
                                            <th>Tag</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($events as $event)
                                            <tr>
                                                <td>
                                                    <div class="form-check custom-checkbox checkbox-primary me-3">
                                                        <input type="checkbox" class="form-check-input" id="customCheckBox2"
                                                            required="">
                                                        <label class="form-check-label" for="customCheckBox2"></label>
                                                    </div>
                                                </td>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('uploads/events/' . $event->events_image) }}"
                                                            class="rounded-lg me-2" width="40" alt="">
                                                        <div>
                                                            <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                {{ $event->events_title }}
                                                            </h6>
                                                            <small>{{ $event->events_description }}</small>
                                                        </div>

                                                    </div>
                                                </td>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                {{ $event->events_date }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                {{ $event->events_tag }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.edit.event', $event->id) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <form action="{{ route('admin.delete.event') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="eventId"
                                                                value="{{ $event->id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    <h6>No Records Found</h6>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--**********************************
                                                                Content body end
                                                            ***********************************-->
@endsection
