@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sub Category List</h4>
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
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Products</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subcategories as $subcategory)
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

                                                        <div>
                                                            <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                {{ $subcategory->category->category_name ?? "" }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('uploads/subcategories/' . $subcategory->sub_category_image) }}"
                                                            class="rounded-lg me-2" width="40" alt="">
                                                        <div>
                                                            <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                {{ $subcategory->sub_category_name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $subcategory->products_count_count }}</td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.edit.subcategory', $subcategory->id) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        {{-- <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a> --}}
                                                        <form action="{{ route('admin.delete.subcategory') }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="subcategoryId"
                                                                value="{{ $subcategory->id }}">
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
                                                <td colspan="5" class="text-center">
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
