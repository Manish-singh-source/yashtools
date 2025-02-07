<!DOCTYPE html>
<html lang="en">
<head>
	<!-- PAGE TITLE HERE -->
	<title>Yash Tools Admin</title>

	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="WorldNIC is a powerful PHP Admin Dashboard Bootstrap Template, designed for seamless management and data visualization in various web applications.">
<meta name="author" content="Dexignlabs">
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
<meta name="description" content="WorldNIC template, PHP admin dashboard, Bootstrap admin template, web application dashboard, data visualization template, responsive admin panel, PHP dashboard design, admin dashboard features, Bootstrap 5 admin, customizable dashboard template.">
<meta name="og:title" content="Yash Tools Admin">
<meta name="og:description" content="WorldNIC template, PHP admin dashboard, Bootstrap admin template, web application dashboard, data visualization template, responsive admin panel, PHP dashboard design, admin dashboard features, Bootstrap 5 admin, customizable dashboard template.">
<meta name="og:image" content="../social-image.png">
<meta name="format-detection" content="telephone=no">
<meta name="twitter:description" content="WorldNIC template, PHP admin dashboard, Bootstrap admin template, web application dashboard, data visualization template, responsive admin panel, PHP dashboard design, admin dashboard features, Bootstrap 5 admin, customizable dashboard template.">
<meta name="twitter:title" content="Yash Tools Admin">
<meta name="twitter:image" content="../social-image.png">
<meta name="twitter:card" content="summary_large_image">

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">

	<link href="assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/vendor/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>
<link href="assets/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>

	
	<?php include"header.php"; ?>
		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<div class="container-fluid">

				<!-- Row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-8">
								<div class="card h-auto">
									<div class="card-body">
										<form>
											<div class="mb-3">
												<label class="form-label">Product Name</label>
												<input type="text" class="form-control" >
											</div>
											<div class="mb-3">
												<label class="form-label">Product Quantity</label>
												<input type="number" class="form-control">
											</div>
											<div class="mb-3">
												<label class="form-label">Price</label>
												<input type="number" class="form-control" >
											</div>
											<div class="mb-3">
												<label class="form-label">Days to Dispatch</label>
												<select class="form-control default-select h-auto wide"
												aria-label="Default select example">
												<option selected>Same Days</option>
												<option value="1">1 Day to Dispatch</option>
												<option value="1">2 Day to Dispatch</option>
												<option value="1">3 Day to Dispatch</option>
												<option value="1">4 Day to Dispatch</option>
												<option value="1">5 Day to Dispatch</option>
												<option value="1">None</option>
											</select>
											</div>
										</form>
										<label class="form-label">Description</label>
										<div id="ckeditor"></div>
									</div>
								</div>
								<div class="card h-auto">
									<div class="card-header py-3">
										<h4 class="card-title--medium mb-0">Media</h4>
									</div>
									<div class="card-body">
										<div class="dz-default ic-message upload-img mb-3">
											<form action="#" class="dropzone">

												<div class="fallback">
													<input name="file" type="file" multiple>

												</div>
											</form>
										</div>

									</div>
								</div>
								<div class="card h-auto">
									<div class="card-header py-3">
										<h4 class="card-title--medium mb-0">Upload File</h4>
									</div>
										<form>
											<div class="card">
												<div class="card-body">
													<div class="mb-3">
													  <label for="formFile" class="form-label">Upload Catalogue</label>
													  <input class="form-control" type="file" id="formFile">
													</div>
													<div class="mb-3">
													  <label for="formFileMultiple" class="form-label">Upload PDF</label>
													  <input class="form-control" type="file" id="formFileMultiple" multiple="">
													</div>
													<div class="mb-3">
													  <label for="formFileDisabled" class="form-label">Upload Drawing</label>
													  <input class="form-control" type="file" id="formFileDisabled" disabled="">
													</div>
												</div>
										</form>

									</div>
								</div>

							</div>
							<div class="col-xl-4">
								<div class="right-sidebar-sticky">
									<div class="card">
										<div class="card-header py-3">
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
									<div class="card h-auto">
										<div class="card-header py-3">
											<h4 class="card-title--medium mb-0">Brand </h4>
										</div>
										<div class="card-body">

											<label class="form-label">Select Brand</label>
											<select class="form-control default-select h-auto wide"
												aria-label="Default select example">
												<option selected>manish</option>
												<option value="1">manish1</option>
											</select>

										</div>
									</div>
									<div class="card h-auto">
										<div class="card-header py-3">
											<h4 class="card-title--medium mb-0">Catogery</h4>
										</div>
										<div class="card-body">
											<label class="form-label">Select Catogery</label>
											<select class="form-control default-select h-auto wide"
												aria-label="Default select example">
												<option selected>Electronics</option>
												<option value="1">Office stationary</option>
												<option value="2">Fashion</option>
											</select>
										</div>
										<div class="card-body">
											<label class="form-label">Select Sub Catogery</label>
											<select class="form-control default-select h-auto wide"
												aria-label="Default select example">
												<option selected>Electronics</option>
												<option value="1">Office stationary</option>
												<option value="2">Fashion</option>
											</select>
										</div>
									</div>
									<div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Products</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value=""
                                                        >New Products
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Product Offers
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
									<a href="#" class="btn btn-primary btn-sm text-end">Add product</a>
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

		<script>
	var enableSupportButton = '1'
</script>
<script>
	var asset_url = 'assets/index.html'
</script>

<script src="assets/vendor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="assets/vendor/dropzone/dist/dropzone.js" type="text/javascript"></script>


		<?php include"footer.php"; ?>