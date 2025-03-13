@extends('admin.layouts.app')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content-body')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                @can('isSuperAdmin')
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Admin</h4>
                            </div>
                            <div class="dropdown text-sans-serif text-end"><button class="btn btn-primary tp-btn-light sharp"
                                    type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                    aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2">
                                                </circle>
                                            </g>
                                        </svg></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                    <div class="py-2"><a class="dropdown-item" id="deleteAll">Delete
                                            All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('add.admin') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" placeholder="Enter Your Full Name"
                                                    class="form-control @error('fullname') is-invalid @enderror"
                                                    name="fullname">
                                                @error('fullname')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror"
                                                    name="email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Number</label>
                                                <input type="text" placeholder="Enter Your Contact Number"
                                                    class="form-control @error('mobile_number') is-invalid @enderror"
                                                    name="mobile_number">
                                                @error('mobile_number')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password</label>
                                                <input type="password" placeholder="Enter Your Password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Profile</label>
                                                <input type="file"
                                                    class="form-control @error('profile') is-invalid @enderror" name="profile">
                                                @error('profile')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Admin List</h4>
                        </div>
                        <div class="dropdown text-sans-serif text-end"><button class="btn btn-primary tp-btn-light sharp"
                                type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2">
                                            </circle>
                                        </g>
                                    </svg></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                <div class="py-2"><a class="dropdown-item" id="deleteAll">Delete
                                        All</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="projectlist" class="display">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">
                                                <div class="form-check custom-checkbox checkbox-primary  me-3">
                                                    <input type="checkbox" class="form-check-input" id="checkAll"
                                                        value="0" required="">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            @can('isSuperAdmin')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($admins as $admin)
                                            <tr>
                                                <td>
                                                    <div class="form-check custom-checkbox checkbox-primary me-3">
                                                        <input type="checkbox"
                                                            class="form-check-input multiSelectCheckbox"
                                                            id="customCheckBox2" value="{{ $admin->id }}"
                                                            required="">
                                                        <label class="form-check-label" for="customCheckBox2"></label>
                                                    </div>
                                                </td>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('uploads/profile/' . $admin->profile) }}"
                                                            class="rounded-lg me-2" width="40" alt="">
                                                    </div>
                                                </td>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center">

                                                        <div>
                                                            <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                {{ $admin->fullname ?? 'No name' }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $admin->email }}</td>
                                                @can('isSuperAdmin')
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{ route('admin.edit.admin', $admin->id) }}"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="fa fa-pencil"></i></a>
                                                            <form action="{{ route('delete.admin') }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="adminId"
                                                                    value="{{ $admin->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-danger shadow btn-xs sharp">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                @endcan
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
@endsection


@section('scripts')
    <script>
        var enableSupportButton = '1'
    </script>
    <script>
        var asset_url = 'assets/index.html'
    </script>

    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/delete-selected.js') }}"></script>
@endsection
