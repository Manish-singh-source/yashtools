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
                            <h4 class="card-title">Slider List</h4>
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
                                            <th>Slider</th>
                                            <th>Action</th>
                                            <th>
                                            <div class="dropdown text-sans-serif text-end"><button
															class="btn btn-primary tp-btn-light sharp" type="button"
															id="order-dropdown-0" data-bs-toggle="dropdown"
															data-boundary="viewport" aria-haspopup="true"
															aria-expanded="false"><span><svg
																	xmlns="http://www.w3.org/2000/svg"
																	xmlns:xlink="http://www.w3.org/1999/xlink"
																	width="18px" height="18px" viewBox="0 0 24 24"
																	version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
																		fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<circle fill="#000000" cx="5" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="12" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="19" cy="12" r="2">
																		</circle>
																	</g>
																</svg></span></button>
														<div class="dropdown-menu dropdown-menu-end border py-0"
															aria-labelledby="order-dropdown-0">
															<div class="py-2"><a class="dropdown-item"
																	href="#!">Delete All</a>
															</div>
														</div>
													</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($banners as $banner)
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
                                                        <img src="/uploads/banner/{{ $banner->banner_image }}"
                                                            class="rounded-lg me-2" width="40" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form action="{{ route('admin.delete.banner') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="bannerId"
                                                                value="{{ $banner->id }}">
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
                                                    No Records Found
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
