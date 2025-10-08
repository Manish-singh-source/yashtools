@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card h-auto">
                        <div class="card-header">
                            <h5>Customer Details <span class="text-primary"></span></h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Personal Details</h5>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Name: <span
                                                    class="text-primary">{{ $customerDetail->fullname }}</span></p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Username: <span
                                                    class="text-primary">{{ $customerDetail->username }}</span></p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Email: <span
                                                    class="text-primary">{{ $customerDetail->email }}</span></p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Phone: <span
                                                    class="text-primary">{{ $customerDetail->mobile_number }}</span></p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Address: <span
                                                    class="text-primary">{{ $customerDetail->userDetail?->company_address ?? 'N/A' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>&nbsp;</h5>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Customer Role: <span
                                                    class="text-primary">{{ $customerDetail->role }}</span></p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Customer Type: <span
                                                    class="text-primary">{{ $customerDetail->customer_type }}</span></p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Status: <span
                                                    class="text-primary">{{ $customerDetail->status }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card h-auto">
                        <div class="card-header">
                            <h5>Address Details <span class="text-primary"></span></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-muted">Company Name: <span
                                                    class="text-primary">{{ $customerDetail->userDetail?->company_name ?? 'N/A' }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Company Address: <span
                                                    class="text-primary">{{ $customerDetail->userDetail?->company_address ?? 'N/A' }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Country: <span
                                                    class="text-primary">{{ $customerDetail->userDetail?->country ?? 'N/A' }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">State: <span
                                                    class="text-primary">{{ $customerDetail->userDetail?->state ?? 'N/A' }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">City: <span
                                                    class="text-primary">{{ $customerDetail->userDetail?->city ?? 'N/A' }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">Pincode: <span
                                                    class="text-primary">{{ $customerDetail->userDetail?->pincode ?? 'N/A' }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted">GSTIN: <span
                                                    class="text-primary">{{ $customerDetail->userDetail?->gstin ?? 'N/A' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Customer</h4>
                            {{-- <a href="{{ route('admin.add-customer-category-percentage') }}"
                                class="btn btn-primary btn-sm">Add Category and Percentage</a> --}}

                            <button class="btn btn-sm border-2 border-primary" data-bs-toggle="modal"
                                data-bs-target="#approveBackdrop1" class="btn btn-sm border-2 border-primary">
                                Add Category and Percentage
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table display" id="projectlist">
                                    <thead>
                                        <tr>
                                            <th>Sub Category</th>
                                            <th>Percentage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customerDetail->userCategory as $category)
                                            <tr>
                                                <td>
                                                    {{ $category->subcategory->sub_category_name ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $category->percentage ?? '' }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <a href="{{ route('admin.edit-customer-category-percentage', $category->id) }}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <form
                                                            action="{{ route('admin.delete-customer-category-percentage') }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('Delete')
                                                            <input type="hidden" name="id"
                                                                value="{{ $category->id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
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


    <!-- Modal -->
    <div class="modal fade" id="approveBackdrop1" data-bs-backdrop="approve" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="approveBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form class="profile-form" action="{{ route('admin.store-customer-category-percentage') }}"
                    method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="approveBackdropLabel">Add Category and Percentage
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" name="user_id" value="{{ $customerDetail->id }}">

                        <div class="mb-3">
                            <label class="form-label" for="Name">Sub Category</label>
                            <select class="form-control @error('sub_category_id') is-invalid @enderror"
                                name="sub_category_id">
                                <option selected disabled value="0">-- Select Sub Category --
                                </option>
                                @foreach ($subcategories as $sub_category)
                                    <option value="{{ $sub_category->id }}"
                                        {{ old('sub_category_id') == $sub_category->id ? 'selected' : '' }}>
                                        {{ $sub_category->sub_category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sub_category_id')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="Name">Percentage</label>
                            <input type="text" class="form-control" value="{{ old('percentage') }}"
                                name="percentage" id="Name">
                            @error('percentage')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
