@extends('admin.layouts.app')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content-body')
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
                                                        <input type="checkbox" class="form-check-input multiSelectCheckbox"
                                                            id="customCheckBox2" value="{{ $product->id }}" required="">
                                                        <label class="form-check-label" for="customCheckBox2"></label>
                                                    </div>
                                                </td>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->product_thumbain) }}"
                                                            class="rounded-lg me-2" width="40" alt="">
                                                        <div>
                                                            <a href="{{ route('admin.product.details', $product->product_slug) }}">
                                                                <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                    {{ $product->product_name }}
                                                                </h6>
                                                                {{-- <small
                                                                    style = "-webkit-line-clamp: 2;-webkit-box-orient: vertical;display: -webkit-box;overflow: hidden;">{!! $product->product_discription !!}</small> --}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $product->categories->category_name ?? '' }}</td>
                                                <td>{{ $product->subcategories->sub_category_name ?? '' }}</td>
                                                <td>{{ $product->brands->brand_name ?? 'Not Added' }}</td>
                                                <td>{{ $product->product_quantity }}</td>
                                                <td>{{ $product->product_price }}</td>
                                                <td>
                                                    <div
                                                        class="form-check
                                                                    form-switch">
                                                        <input type="hidden" value="{{ $product->status }}"
                                                            class="status">
                                                        <input class="form-check-input toggleSwitch" type="checkbox"
                                                            role="switch" id="flexSwitchCheckChecked"
                                                            value="{{ $product->id }}"
                                                            @if ($product->status == '1') checked @endif>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.edit.product', $product->product_slug) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a>

                                                        <form action="{{ route('admin.delete.product') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="product_slug"
                                                                value="{{ $product->product_slug }}">
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
    <script src="{{ asset('admin/assets/js/toggle-status.js') }}"></script>
    <script src="{{ asset('admin/assets/js/delete-selected.js') }}"></script>
@endsection
