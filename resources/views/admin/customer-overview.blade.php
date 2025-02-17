@extends('admin.layouts.app')

@section('content-body')
    <!--**********************************
                                                                            Content body start
                                                                        ***********************************-->
    <div class="content-body default-height">
        <div class="container-fluid">


            <div class="tab-content" id="tabContentMyProfileBottom">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="card-title">Profile Details</h6>
                                <a href="{{ route('admin.edit.customer', $customerDetail->id) }}"
                                    class="btn btn-sm btn-primary">Edit Profile</a>
                            </div>
                            <div class="card-body">
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">Full Name</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-13 fw-semibold">{{ $customerDetail->fullname }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">Company</span>
                                    </div>
                                    <div class="col-6">
                                        <span
                                            class="fs-13 fw-semibold">{{ $customerDetail->userDetail->company_name ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">Mobile Number</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-13 fw-semibold">{{ $customerDetail->mobile_number }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">Company Address</span>
                                    </div>
                                    <div class="col-6">
                                        <span
                                            class="fs-13 fw-semibold">{{ $customerDetail->userDetail->company_address ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">GSTIN</span>
                                    </div>
                                    <div class="col-6">
                                        <span
                                            class="fs-13 fw-semibold">{{ $customerDetail->userDetail->gstin ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">City</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-13 fw-semibold">{{ $customerDetail->userDetail->city ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">State</span>
                                    </div>
                                    <div class="col-6">
                                        <span
                                            class="fs-13 fw-semibold">{{ $customerDetail->userDetail->state ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">Country</span>
                                    </div>
                                    <div class="col-6">
                                        <span
                                            class="fs-13 fw-semibold">{{ $customerDetail->userDetail->country ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">Pin Code</span>
                                    </div>
                                    <div class="col-6">
                                        <span
                                            class="fs-13 fw-semibold">{{ $customerDetail->userDetail->pincode ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-header border-0 py-3 pb-0">
                                <h4 class="heading mb-0">Customer Report</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-1 table-striped-thead table-wide table-md table-border-last-0">
                                        <thead>
                                            <tr>
                                                <th>Enquiry Id</th>
                                                <th>Date Added</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($customerDetail->enquiries as $products)
                                                <tr>
                                                    <td>{{ $products->enquiry_id }}</td>
                                                    <td>Nov 01, 2024</td>
                                                    <td><span
                                                            class="badge badge-sm badge-success light border-0">Completed</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>There are no orders for this customer</td>
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

    </div>
@endsection
