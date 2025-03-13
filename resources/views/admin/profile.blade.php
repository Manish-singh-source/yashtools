@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body">
        <div class="container-fluid">

            <!-- Row -->
            <!-- row -->
            <form class="profile-form" method="POST" action="{{ route('admin.profile.update') }}"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="clearfix">
                            <div class="card  profile-card author-profile m-b30">
                                <div class="card-body">
                                    <div class="p-5">
                                        <div class="author-profile">
                                            <div class="author-media">
                                                @if ($user->profile != '')
                                                    <img src="{{ asset('uploads/profile/' . $user->profile) }}"
                                                        alt="">
                                                @else
                                                    <img src="{{ asset('admin/assets/images/profile/profile.png') }}"
                                                        alt="">
                                                @endif
                                                <div class="upload-link" title="" data-toggle="tooltip"
                                                    data-placement="right" data-original-title="update">
                                                    <input type="file" class="update-flie" name="profileImage">
                                                    <i class="fa fa-camera"></i>
                                                </div>
                                            </div>
                                            <div class="author-info">
                                                <h6 class="title">{{ $user->fullname }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="card profile-card m-b30">
                            <div class="card-header">
                                <h4 class="card-title">Personal Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Name">Full Name</label>
                                            <input type="hidden" class="form-control" name="userId"
                                                value="{{ $user->id }}" id="Name">
                                            <input type="text"
                                                class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                                placeholder="Enter Full Name" value="{{ $user->fullname }}" id="Name">
                                            @error('fullname')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Name">Username</label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                placeholder="Enter Your Username" value="{{ $user->username }}"
                                                id="Name">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="number"
                                                class="form-control @error('mobile_number') is-invalid @enderror"
                                                name="mobile_number" placeholder="Enter Your Contact No"
                                                value="{{ $user->mobile_number }}" placeholder="0123456789">
                                            @error('mobile_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Email">Email address</label>
                                            <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                                name="email" placeholder="Enter Your E-mail" value="{{ $user->email }}"
                                                id="Email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">UPDATE</button>
                                <a href="page-forgot-password.html" class="text-hover float-end">Forgot your
                                    password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <form action="{{ route('update.password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                    </div>
                    <div class="col-lg-9">
                        <div class="card profile-card m-b30">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                                <div class="text-end">
                                    @include('admin.layouts.session-messages')
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input type="hidden" name="id" value="{{ Auth::id() }}"
                                                class="form-control">
                                            <label class="form-label" for="Email">Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Email">New Password</label>
                                            <input type="password" name="new_password"
                                                class="form-control @error('new_password') is-invalid @enderror">
                                            @error('new_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Email">Confirm Password</label>
                                            <input type="password" name="new_password_confirmation"
                                                class="form-control @error('new_password_confirmation') is-invalid @enderror">
                                            @error('new_password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">UPDATE PASSWORD</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
