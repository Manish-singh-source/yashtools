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
                                <a href="edit-customer.php" class="btn btn-sm btn-primary">Edit Profile</a>
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
                                            class="fs-13 fw-semibold">{{ $customerDetail->userDetail->company_name }}</span>
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
                                            class="fs-13 fw-semibold">{{ $customerDetail->userDetail->company_address }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">GSTIN</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-13 fw-semibold">{{ $customerDetail->userDetail->gstin }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">City</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-13 fw-semibold">{{ $customerDetail->userDetail->city }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">State</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-13 fw-semibold">{{ $customerDetail->userDetail->state }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">Country</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-13 fw-semibold">{{ $customerDetail->userDetail->country }}</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-6">
                                        <span class="fs-13">Pin Code</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-13 fw-semibold">{{ $customerDetail->userDetail->pincode }}</span>
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
                                                <th>Sr.no</th>
                                                <th>Enquiry Id</th>
                                                <th>Date Added</th>
                                                <th>Status</th>
                                                <th class="text-end">Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>#PXF-578</td>
                                                <td>Nov 01, 2024</td>
                                                <td><span
                                                        class="badge badge-sm badge-success light border-0">Completed</span>
                                                </td>
                                                <td class="text-end">58 PCS</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>#XGY-356</td>
                                                <td>Sep 27, 2024</td>
                                                <td><span
                                                        class="badge badge-sm badge-danger light border-0">Incompleted</span>
                                                </td>
                                                <td class="text-end">14 PCS</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>#SRR-678</td>
                                                <td>Jul 09, 2024</td>
                                                <td><span
                                                        class="badge badge-sm badge-danger light border-0">Incompleted</span>
                                                </td>
                                                <td class="text-end">58 PCS</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>#XGY-356</td>
                                                <td>May 14, 2024</td>
                                                <td><span
                                                        class="badge badge-sm badge-success light border-0">Completed</span>
                                                </td>
                                                <td class="text-end">11 PCS</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>#XGY-356</td>
                                                <td>Dec 30, 2024</td>
                                                <td><span
                                                        class="badge badge-sm badge-success light border-0">Completed</span>
                                                </td>
                                                <td class="text-end">58 PCS</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>#SRR-678</td>
                                                <td>Oct 25, 2024</td>
                                                <td><span
                                                        class="badge badge-sm badge-danger light border-0">Incompleted</span>
                                                </td>
                                                <td class="text-end">96 PCS</td>
                                            </tr>
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
