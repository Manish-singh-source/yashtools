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

	<link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>

<?php include"header.php"; ?>
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
								<h4 class="card-title">Product List</h4>
								<a href="add-categary.php" class="btn btn-primary btn-sm">Add Product</a>
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
												<th>Product</th>
												<th>Category</th>
												<th>Brand</th>
												<th>Quantity</th>
												<th class="text-end">Action</th>
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
														<img src="assets/images/category-images/d14.jpg"
															class="rounded-lg me-2" width="40" alt="">
														<div>
															<a href="product-details.php">
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner
															</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
															</a>	
														</div>

													</div>
												</td>
												<td>Electronics</td>
												<td>Electronics</td>
												</td>
												<td>25</td>


												<td class="text-end">
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
															id="customCheckBox3" required="">
														<label class="form-check-label" for="customCheckBox3"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d3.jpg" class="rounded-lg me-2"
															width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Dress</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>Fashion</td>
												<td>Electronics</td>
												<td>25</td>



												<td class="text-end">
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
															id="customCheckBox4" required="">
														<label class="form-check-label" for="customCheckBox4"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d10.jpg"
															class="rounded-lg me-2" width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Bag</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>School Bag</td>
												<td>Electronics</td>
												</td>
												<td>25</td>



												<td class="text-end">
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
															id="customCheckBox5" required="">
														<label class="form-check-label" for="customCheckBox5"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d14.jpg"
															class="rounded-lg me-2" width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner
															</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>Appliances</td>
												<td>Electronics</td>
												</td>
												<td>25</td>



												<td class="text-end">
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
															id="customCheckBox6" required="">
														<label class="form-check-label" for="customCheckBox6"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d14.jpg"
															class="rounded-lg me-2" width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner
															</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>Electronics</td>
												<td>Electronics</td>
												</td>
												<td>25</td>



												<td class="text-end">
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
															id="customCheckBox7" required="">
														<label class="form-check-label" for="customCheckBox7"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d3.jpg" class="rounded-lg me-2"
															width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Dress</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>Fashion</td>
												<td>Electronics</td>
												<td>25</td>



												<td class="text-end">
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
															id="customCheckBox8" required="">
														<label class="form-check-label" for="customCheckBox8"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d8.jpg" class="rounded-lg me-2"
															width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">laptop</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>Electronics</td>
												<td>Electronics</td>
												<td>25</td>



												<td class="text-end">
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
															id="customCheckBox9" required="">
														<label class="form-check-label" for="customCheckBox9"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d2.jpg" class="rounded-lg me-2"
															width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Men Jacket</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>Fashion Jacket</td>
												<td>Electronics</td>
												</td>
												<td>25</td>



												<td class="text-end">
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
															id="customCheckBox10" required="">
														<label class="form-check-label" for="customCheckBox10"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d14.jpg"
															class="rounded-lg me-2" width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner
															</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>Appliances</td>
												<td>Electronics</td>
												</td>
												<td>25</td>



												<td class="text-end">
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
															id="customCheckBox11" required="">
														<label class="form-check-label" for="customCheckBox11"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d8.jpg" class="rounded-lg me-2"
															width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">laptop</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>Laptop</td>
												<td>Electronics</td>
												<td>25</td>



												<td class="text-end">
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
															id="customCheckBox12" required="">
														<label class="form-check-label" for="customCheckBox12"></label>
													</div>
												</td>
												<td style="width: 30%;">
													<div class="d-flex align-items-center">
														<img src="assets/images/category-images/d13.jpg"
															class="rounded-lg me-2" width="40" alt="">
														<div>
															<h6 class="w-space-no mb-0 fs-14 font-w600">Fan</h6>
															<small>Our computers and tablets include all the big
																brands.</small>
														</div>

													</div>
												</td>
												<td>Electrical</td>
												<td>Electronics</td>
												</td>
												<td>25</td>



												<td class="text-end">
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


		<?php include"footer.php"; ?>