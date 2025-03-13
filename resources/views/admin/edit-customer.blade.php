@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="card profile-card m-b30">
                        <div class="card-header">
                            <h4 class="card-title">Customer Details</h4>
                        </div>
                        <form class="profile-form" action="{{ route('admin.update.customer') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" class="form-control" value="{{ $customerDetail->id }}" name="customer_id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Name">Company Name</label>
                                            <input type="text" class="form-control"
                                                value="{{ $customerDetail->userDetail->company_name ?? '' }}"
                                                placeholder="Enter Company Name" name="company_name" id="company_name">
                                            @error('company_name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Surname">Full name</label>
                                            <input type="text" class="form-control" placeholder="Enter Full name"
                                                value="{{ $customerDetail->fullname }}" name="fullname" id="fullname">
                                            @error('fullname')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Skills">Company Address</label>
                                            <textarea placeholder="Enter Company Address" name="company_address" class="form-control">{{ $customerDetail->userDetail->company_address ?? '' }}</textarea>
                                            @error('company_address')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mobile number</label>
                                            <input type="number" class="form-control" placeholder="Enter Mobile number"
                                                value="{{ $customerDetail->mobile_number }}" name="mobile_number">
                                            @error('mobile_number')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Specialty">GSTIN</label>
                                            <input type="text" class="form-control" placeholder="Enter GSTIN"
                                                value="{{ $customerDetail->userDetail->gstin ?? '' }}" name="gstin"
                                                id="Specialty">
                                            @error('gstin')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Specialty">City</label>
                                            <input type="text" class="form-control" placeholder="Enter City"
                                                value="{{ $customerDetail->userDetail->city ?? '' }}" name="city"
                                                id="Specialty">
                                            @error('city')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Specialty">State</label>
                                            <input type="text" class="form-control"
                                                value="{{ $customerDetail->userDetail->state ?? '' }}" name="state"
                                                id="Specialty">
                                            @error('state')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Specialty">Country</label>
                                            <input type="text" class="form-control"
                                                value="{{ $customerDetail->userDetail->country ?? '' }}" name="country"
                                                id="Specialty">
                                            @error('country')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Specialty">Pin Code</label>
                                            <input type="text" class="form-control" placeholder="Enter Pin Code"
                                                value="{{ $customerDetail->userDetail->pincode ?? '' }}" name="pin_code"
                                                id="Specialty">
                                            @error('pin_code')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Email">Email address</label>
                                            <input type="text" class="form-control"
                                                value="{{ $customerDetail->email }}" placeholder="Enter Email address"
                                                name="email" id="Email">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
