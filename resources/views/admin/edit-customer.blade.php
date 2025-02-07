@extends('admin.layouts.app')

@section('content-body')
		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<div class="container-fluid">
				<!-- row -->
				<div class="row">
					<div class="col-xl-12 col-lg-8">
						<div class="card profile-card m-b30">
							<div class="card-header">
								<h4 class="card-title">Customer Details</h4>
							</div>
							<form class="profile-form">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Name">Company Name</label>
												<input type="text" class="form-control" value="John" id="Name">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Surname">Full name</label>
												<input type="text" class="form-control" value="osib" id="Surname">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Skills">Company Address</label>
												<textarea name=""  value="kandivali west"  class="form-control" id=""></textarea>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label">Mobile number</label>
												<input type="number" class="form-control" placeholder="123456789">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Specialty">GSTIN</label>
												<input type="text" class="form-control" value="489124"
													id="Specialty">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Specialty">City</label>
												<input type="text" class="form-control" value="Mumbai"
													id="Specialty">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Specialty">State</label>
												<input type="text" class="form-control" value="maharstra"
													id="Specialty">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Specialty">Country</label>
												<input type="text" class="form-control" value="india"
													id="Specialty">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Specialty">Pin Code</label>
												<input type="text" class="form-control" value="400067"
													id="Specialty">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Email">Email address</label>
												<input type="text" class="form-control" value="demo@gmail.com"
													id="Email">
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button class="btn btn-primary">UPDATE</button>
									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Content body end
        ***********************************-->


		@endsection