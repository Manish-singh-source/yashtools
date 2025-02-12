@extends('admin.layouts.app')

@section('content-body')
    <!--**********************************
                                            Content body start
                                        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <!-- Row -->
           <!-- row -->
				<div class="row">
					<div class="col-xl-3 col-lg-4">
						<div class="clearfix">
							<div class="card  profile-card author-profile m-b30">
								<div class="card-body">
									<div class="p-5">
										<div class="author-profile">
											<div class="author-media">
												<img src="admin/assets/images/user.jpg" alt="">
												<div class="upload-link" title="" data-toggle="tooltip"
													data-placement="right" data-original-title="update">
													<input type="file" class="update-flie">
													<i class="fa fa-camera"></i>
												</div>
											</div>
											<div class="author-info">
												<h6 class="title">Nella Vita</h6>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8">
						<div class="card profile-card m-b30">
							<div class="card-header">
								<h4 class="card-title">Account setup</h4>
							</div>
							<form class="profile-form">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Name">Name</label>
												<input type="text" class="form-control" value="John" id="Name">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Surname">Surname</label>
												<input type="text" class="form-control" value="osib" id="Surname">
											</div>
										</div>
										
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label">Phone</label>
												<input type="number" class="form-control" placeholder="123456789">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Email">Email address</label>
												<input type="text" class="form-control" value="demo@gmail.com"
													id="Email">
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Email">Password</label>
												<input type="password" class="form-control">
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Email">New Password</label>
												<input type="password" class="form-control">
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label" for="Email">Confirm Password</label>
												<input type="password" class="form-control">
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button class="btn btn-primary">UPDATE</button>
									<a href="page-forgot-password.html" class="text-hover float-end">Forgot your
										password?</a>
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
