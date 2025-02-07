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
							<div class="col-xl-12">
								<div class="card h-auto">
									<div class="card-body">
										<form>
											<div class="mb-3">
												<label class="form-label required">Category Name</label>
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
									
							<a href="add-categary.php" class="btn btn-primary btn-sm" contenteditable="false" style="cursor: pointer;">Add Category</a>
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


		<?php include"footer.php"; ?>