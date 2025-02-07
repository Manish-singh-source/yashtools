@extends('admin.layouts.app')

@section('content-body')

		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Admin</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control">
                                            </div>
											<div class="mb-3 col-md-6">
                                                <label class="form-label">Number</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control">
                                            </div>
											<div class="mb-3 col-md-6">
                                                <label class="form-label">Profile</label>
                                                <input type="file" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Admin List</h4>
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
												<th>Name</th>
												<th>Email</th>
												<th >Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input"
															id="customCheckBox2" required="">
														<label class="form-check-label" for="customCheckBox2"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner
															</h6>
															
														</div>

													</div>
												</td>
												<td>manish@technofra.com</td>

												

												<td >
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
																class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i
																class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox checkbox-primary me-3">
														<input type="checkbox" class="form-check-input"
															id="customCheckBox33" required="">
														<label class="form-check-label" for="customCheckBox33"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner
															</h6>
															
														</div>

													</div>
												</td>
												<td>manish@technofra.com</td>


												

												<td >
													<div>
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
																class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i
																class="fa fa-trash"></i></a>
													</div>
												</td>
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
		<!--**********************************
            Content body end
        ***********************************-->	


		@endsection