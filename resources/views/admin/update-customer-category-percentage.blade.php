@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            {{-- Adding Category and percentage to the user --}}
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="card profile-card m-b30">
                        <div class="card-header">
                            <h4 class="card-title">Add Sub Category and Percentage</h4>
                        </div>
                        <form class="profile-form" action="{{ route('admin.update-customer-category-percentage') }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $userCategory->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $userCategory->id }}">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Name">Sub Category</label>
                                            <select class="form-control @error('sub_category_id') is-invalid @enderror"
                                                name="sub_category_id">
                                                <option selected disabled value="0">-- Select Category --
                                                </option>
                                                @foreach ($subcategories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($category->id == $userCategory->sub_category_id) selected @endif>
                                                        {{ $category->sub_category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sub_category_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Name">Percentage</label>
                                            <input type="text" class="form-control" value="{{ old('percentage', $userCategory->percentage) }}"
                                                name="percentage" id="Name">
                                            @error('percentage')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
