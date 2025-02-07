@extends('admin.layouts.app')

@section('content-body')
    <!--**********************************
                                                                            Content body start
                                                                        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block">
                            <div class="me-auto mb-sm-0 mb-3">
                                <h4 class="card-title">Customer</h4>
                                @include('admin.layouts.session-messages')

                            </div>

                        </div>
                        <div class="card-body pt-3">
                            <div class="table-responsive">
                                <table class="table display" id="projectlist">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Coustomer</th>
                                            <th>State</th>
                                            <th>Date</th>
                                            <th>Company Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customers as $customer)
                                            <tr>
                                                <td>
                                                    <h6>1.</h6>
                                                </td>
                                                <td>
                                                    <div class="media style-1">
                                                        <div class="media-body">
                                                            <a href="{{ route('customer.overview', $customer->id) }}">
                                                                <h6 class="mb-0">{{ $customer->fullname }}</h6>
                                                                <span>{{ $customer->email }}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h6>{{ $customer->userDetail->state }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        @php
                                                            $date = '10-02-2025';
                                                            $formattedDate = date('Y-M-d', strtotime($date));
                                                        @endphp
                                                        <h6 class="text-primary">{{ $formattedDate }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $customer->userDetail->company_name }}
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchCheckChecked"
                                                            @if ($customer->status == 'active') checked @endif>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('admin.edit.customer', $customer->id) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a>

                                                        <form action="{{ route('admin.delete.customer') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="customerId"
                                                                value="{{ $customer->id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        {{-- <a href="javascript:void(0);"
                                                            class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Coustomer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
