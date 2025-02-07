@extends('admin.layouts.app')

@section('content-body')

	<!--**********************************
            Content body start
        ***********************************-->
	<div class="content-body">
		<div class="container-fluid">

			<!-- Row -->
			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-xl-12">
							<div class="card h-auto">
								<div class="card-body">
									<form>
									<div class="mb-3">
											<label class="form-label">Select Categorey</label>
											<div class="dropdown bootstrap-select default-select form-control wide"><select class="default-select form-control wide" tabindex="null">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
												</select>
												</button>
												
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label required">Sub Categorey Name</label>
											<input type="text" class="form-control" placeholder="Food">
										</div>
									</form>

								</div>
							</div>
							<div class="right-sidebar-sticky">
								<div class="card h-auto">
									<div class="card-header  py-3">
										<h4 class="card-title--medium mb-0">Thumbnail</h4>
									</div>
									<div class="card-body">
										<div class="avatar-upload d-flex align-items-center">
											<div class=" position-relative ">
												<div class="avatar-preview">
													<div id="imagePreview"
														style="background-image: url(assets/images/no-img-avatar.png);">
													</div>
												</div>
												<div class="change-btn d-flex align-items-center flex-wrap">
													<input type='file' class="form-control d-none" id="imageUpload"
														accept=".png, .jpg, .jpeg">
													<label for="imageUpload"
														class="btn btn-sm btn-primary light ms-0">Select
														Image</label>
												</div>
											</div>
										</div>
									</div>

								</div>

								<a href="add-categary.php" class="btn btn-primary btn-sm" contenteditable="false" style="cursor: pointer;">Edit Sub Category</a>
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