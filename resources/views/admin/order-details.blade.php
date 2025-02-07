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

	<link href="assets/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>



	<?php include "header.php"; ?>

	<!--**********************************
            Content body start
        ***********************************-->
	<div class="content-body">
		<div class="container-fluid">
			<div class="row">
				<style>
					.order-tracking .step {
						display: flex;
						align-items: center;
						margin-bottom: 10px;
					}

					.order-tracking .step .icon {
						width: 30px;
						height: 30px;
						background-color: #f1f1f1;
						border-radius: 50%;
						display: flex;
						justify-content: center;
						align-items: center;
						margin-right: 10px;
					}

					.order-tracking .step .text {
						flex-grow: 1;
					}

					.order-summary .summary-item {
						display: flex;
						justify-content: space-between;
						margin-bottom: 10px;
					}
				</style>
				<div class="col-md-8">
					<div class="card h-auto">
						<div class="card-header">
							<h5>Enquiry No - <span class="text-primary">#SPK-7832</span></h5>
							<span class="float-right text-muted">Estimated delivery: 30 Nov 2023</span>
						</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th>Item</th>
										<th>Price</th>
										<th>Quantity</th>
									</tr>
								</thead>
								<tbody>
									<!-- Repeat this TR block for each product -->
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/category-images/d14.jpg" class="rounded-lg me-2" width="40" alt="">
												<div>
													<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner
													</h6>
													<small>Our computers and tablets include all the big
														brands.</small>
												</div>

											</div>
										</td>
										
										<td>$1,249</td>
										<td>1</td>
									</tr>
									<!-- Add more products as needed -->
								</tbody>
								<tbody>
									<!-- Repeat this TR block for each product -->
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/category-images/d14.jpg" class="rounded-lg me-2" width="40" alt="">
												<div>
													<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner
													</h6>
													<small>Our computers and tablets include all the big
														brands.</small>
												</div>

											</div>
										</td>
										
										<td>$1,249</td>
										<td>1</td>
									</tr>
									<!-- Add more products as needed -->
								</tbody>
								<tbody>
									<!-- Repeat this TR block for each product -->
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/category-images/d14.jpg" class="rounded-lg me-2" width="40" alt="">
												<div>
													<h6 class="w-space-no mb-0 fs-14 font-w600">Air Conditioner
													</h6>
													<small>Our computers and tablets include all the big
														brands.</small>
												</div>

											</div>
										</td>
										
										<td>$1,249</td>
										<td>1</td>
									</tr>
									<!-- Add more products as needed -->
								</tbody>
							</table>
						</div>
					</div>
					<div class="card h-auto">
						<div class="card-header py-3">
							<h4 class="card-title--medium mb-0">Upload File</h4>
						</div>
						<form>
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 mb-3">
											<label for="formFile" class="form-label">Attached Invoice</label>
											<input class="form-control" type="file" id="formFile">
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Courier Name</label>
											<input class="form-control" type="text" required>
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Courier Number</label>
											<input class="form-control" type="text" required>
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Courier Website</label>
											<input class="form-control" type="text" required>
										</div>
									</div>
									<div class="text-end">
										<a href="#" class="btn btn-primary btn-sm">Upload</a>
									</div>
								</div>
							</div>
						</form>
					</div>

				</div>
				<div class="col-md-4">
					<div class="card h-auto order-tracking mb-4">
						<div class="card-header">
							<h5>Order Tracking</h5>
						</div>
						<div class="card-body">
							<div class="status">Status: <span class="text-success">Shipping</span></div>
							<div class="step">
								<div class="icon bg-primary text-white">1</div>
								<div class="text">Order Confirm</div>
								<div class="ml-auto">May 15</div>
							</div>
							<div class="step">
								<div class="icon bg-primary text-white">2</div>
								<div class="text">Order Delivered</div>
								<div class="ml-auto">jun 15</div>
							</div>
							<div class="step">
								<div class="icon bg-primary text-white">3</div>
								<div class="text">Payment Received</div>
								<div class="ml-auto">jun 26</div>
							</div>
							<!-- Repeat for other steps -->
						</div>
					</div>
					<div class="card h-auto order-summary">
						<div class="card-header">
							<h5>Order Summary</h5>
						</div>
						<div class="card-body">
							<!-- <div class="summary-item">
								<span>Total Items:</span>
								<span>06</span>
							</div>
							<div class="summary-item">
								<span>Applied Coupon:</span>
								<span>SP0578A</span>
							</div>
							<div class="summary-item">
								<span>Delivery Fees:</span>
								<span>+$29</span>
							</div>
							<div class="summary-item">
								<span>Sub Total:</span>
								<span>$3,799</span>
							</div> -->
							<div class="summary-item">
								<strong>Total Price:</strong>
								<strong>$3,129</strong>
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


	<?php include "footer.php"; ?>