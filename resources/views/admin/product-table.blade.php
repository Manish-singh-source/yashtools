@extends('admin.layouts.app')

@section('content-body')
    <!--**********************************
                                                                                    Content body start
                                                                                ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Product List</h4>
                            <a href="{{ route('admin.add.product') }}" class="btn btn-primary btn-sm">Add Product</a>
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
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Brand</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
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
                                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->product_thumbain) }}"
                                                            class="rounded-lg me-2" width="40" alt="">
                                                        <div>
                                                            <a href="{{ route('admin.product.details') }}">
                                                                <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                    {{ $product->product_name }}
                                                                </h6>
                                                                <small>{{ $product->product_discription }}</small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $product->categories->category_name }}</td>
                                                <td>{{ $product->subcategories->sub_category_name }}</td>
                                                <td>{{ $product->brands->brand_name }}</td>
                                                <td>{{ $product->product_quantity }}</td>
                                                <td>{{ $product->product_price }}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchCheckChecked"
                                                            @if ($product->status == 'active') checked @endif>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.edit.product', $product->id) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a>

                                                        <form action="{{ route('admin.delete.product') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="productId"
                                                                value="{{ $product->id }}">
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
    <!--**********************************
                                                                                    Content body end
                                                                                ***********************************-->
@endsection
