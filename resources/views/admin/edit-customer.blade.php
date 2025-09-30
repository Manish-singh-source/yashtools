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
                                            {{-- <input type="text" class="form-control"
                                                value="{{ $customerDetail->userDetail->state ?? '' }}" name="state"
                                                id="Specialty"> --}}
                                            <select class="form-control @error('state') is-invalid @enderror"
                                                name="state">
                                                <option selected disabled value="0">-- Select State --</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Andaman and Nicobar Islands' ? 'selected' : '' }}
                                                    value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                                </option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Andhra Pradesh' ? 'selected' : '' }}
                                                    value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Arunachal Pradesh' ? 'selected' : '' }}
                                                    value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Assam' ? 'selected' : '' }}
                                                    value="Assam">Assam</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Bihar' ? 'selected' : '' }}
                                                    value="Bihar">Bihar</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Chhattisgarh' ? 'selected' : '' }}value="Chhattisgarh">
                                                    Chhattisgarh</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Delhi' ? 'selected' : '' }}
                                                    value="Delhi">Delhi</option>
                                                <option {{ $customerDetail->userDetail->state == 'Goa' ? 'selected' : '' }}
                                                    value="Goa">Goa</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Gujarat' ? 'selected' : '' }}
                                                    value="Gujarat">Gujarat</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Haryana' ? 'selected' : '' }}
                                                    value="Haryana">Haryana</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Himachal Pradesh' ? 'selected' : '' }}
                                                    value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Jammu and Kashmir' ? 'selected' : '' }}
                                                    value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Jharkhand' ? 'selected' : '' }}
                                                    value="Jharkhand">Jharkhand</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Karnataka' ? 'selected' : '' }}
                                                    value="Karnataka">Karnataka</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Kerala' ? 'selected' : '' }}
                                                    value="Kerala">Kerala</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Madhya Pradesh' ? 'selected' : '' }}
                                                    value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Maharashtra' ? 'selected' : '' }}
                                                    value="Maharashtra">Maharashtra</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Manipur' ? 'selected' : '' }}
                                                    value="Manipur">Manipur</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Meghalaya' ? 'selected' : '' }}
                                                    value="Meghalaya">Meghalaya</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Mizoram' ? 'selected' : '' }}
                                                    value="Mizoram">Mizoram</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Nagaland' ? 'selected' : '' }}
                                                    value="Nagaland">Nagaland</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Odisha' ? 'selected' : '' }}
                                                    value="Odisha">Odisha</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Punjab' ? 'selected' : '' }}
                                                    value="Punjab">Punjab</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Rajasthan' ? 'selected' : '' }}
                                                    value="Rajasthan">Rajasthan</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Sikkim' ? 'selected' : '' }}
                                                    value="Sikkim">Sikkim</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Tamil Nadu' ? 'selected' : '' }}
                                                    value="Tamil Nadu">Tamil Nadu</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Telangana' ? 'selected' : '' }}
                                                    value="Telangana">Telangana</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Uttar Pradesh' ? 'selected' : '' }}
                                                    value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'Uttarakhand' ? 'selected' : '' }}
                                                    value="Uttarakhand">Uttarakhand</option>
                                                <option
                                                    {{ $customerDetail->userDetail->state == 'West Bengal' ? 'selected' : '' }}
                                                    value="West Bengal">West Bengal</option>
                                            </select>
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
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="customer_type">Customer Type</label>
                                            <select class="form-control @error('customer_type') is-invalid @enderror"
                                                name="customer_type">
                                                <option selected disabled value="0">-- Select Customer Type --
                                                </option>
                                                <option {{ $customerDetail->customer_type == 'regular' ? 'selected' : '' }}
                                                    value="regular">Regular</option>
                                                <option {{ $customerDetail->customer_type == 'loyal' ? 'selected' : '' }}
                                                    value="loyal">Loyal</option>
                                                <option {{ $customerDetail->customer_type == 'dealer' ? 'selected' : '' }}
                                                    value="dealer">Dealer</option>
                                            </select>
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
