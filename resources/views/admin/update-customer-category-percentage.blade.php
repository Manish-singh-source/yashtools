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
                            <h4 class="card-title">Add Category and Percentage</h4>
                        </div>
                        <form class="profile-form" action="{{ route('admin.update-customer-category-percentage') }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $userCategory->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Name">Customer Role</label>
                                            <select class="form-control @error('user_role') is-invalid @enderror"
                                                name="user_role">
                                                <option selected disabled value="0">-- Select Customer Role --
                                                </option>
                                                @foreach ($user_roles as $user_role)
                                                    <option value="{{ $user_role }}"
                                                        @if ($user_role == $userCategory->user_role) selected @endif>
                                                        {{ ucfirst($user_role) }}
                                                    </option>
                                                @endforeach
                                                @error('user_role')
                                                    {{ $message }}
                                                @enderror
                                            </select>
                                            @error('user_role')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Name">Category</label>
                                            <select class="form-control @error('category_id') is-invalid @enderror"
                                                name="category_id">
                                                <option selected disabled value="0">-- Select Category --
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($category->id == $userCategory->category_id) selected @endif>
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
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
