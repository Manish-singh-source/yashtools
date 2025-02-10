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
                        <div class="card-header">
                            <h4 class="card-title">Edit Admin</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('admin.update.admin') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Full Name</label>
                                            <input type="hidden" class="form-control" name="adminId"
                                                value="{{ $admin->id }}" placeholder="Manish">
                                            <input type="text" class="form-control" name="fullname"
                                                value="{{ $admin->fullname }}" placeholder="Manish">
                                            @error('fullname')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" value="{{ $admin->email }}"
                                                name="email">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                value="{{ $admin->mobile_number }}">
                                            @error('mobile_number')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Profile</label>
                                            <input type="file" class="form-control" name="profile">
                                            @error('profile')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
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
