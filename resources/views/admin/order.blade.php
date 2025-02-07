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
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>

<?php include"header.php"; ?>
		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Enquiry</h4>Date Range of Enquiry
								<input type="text" class="datef"  name="dates" value="01/01/2018 - 01/15/2018"/>
							</div>
							<div class="card-body">
								<div class="table-responsive">
								<table class="table display" id="projectlist">
										<thead>
											<tr>
												<th class="align-middle">
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input" id="checkAll">
														<label class="form-check-label" for="checkAll"></label>
													</div>
												</th>
												<th class="align-middle">Enquiry ID </th>
												<th class="align-middle">Customer</th>
												<th class="align-middle pr-7">Date</th>
												<th class="align-middle text-end">Status</th>
												<th class="text-end">Action</th>
											</tr>
										</thead>
										<tbody id="orders">
											<tr class="btn-reveal-trigger">
												<td class="py-2">
													<div class="form-check custom-checkbox checkbox-success">
														<input type="checkbox" class="form-check-input" id="checkbox">
														<label class="form-check-label" for="checkbox"></label>
													</div>
												</td>
												<td class="py-2">
													<a href="order-details.php">
														<strong>#181</strong></a>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>Ricky
														Antony</strong><br><a
														href="mailto:ricky@example.com">ricky@example.com</a>
												</td>
												
												<td class="py-2">20/04/2020</td>
												
												<td class="py-2 text-end"><span
														class="badge badge-success">Completed<span
															class="ms-1 fa fa-check"></span></span>
												</td>
												
												<td class="py-2 text-end">
													<div class="dropdown text-sans-serif"><button
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
																	href="#!">Enquiry Enquiry Dismissed</a><a class="dropdown-item"
																	href="#!">Order Confirmeded</a><a class="dropdown-item"
																	href="#!">Order Delivered</a><a class="dropdown-item"
																	href="#!">Payment Received</a>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr class="btn-reveal-trigger">
												<td class="py-2">
													<div class="form-check custom-checkbox checkbox-success">
														<input type="checkbox" class="form-check-input" id="checkbox">
														<label class="form-check-label" for="checkbox"></label>
													</div>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>#181</strong></a>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>Ricky
														Antony</strong><br><a
														href="mailto:ricky@example.com">ricky@example.com</a>
												</td>
												
												<td class="py-2">20/04/2020</td>
												
												<td class="py-2 text-end"><span
														class="badge badge-success">Completed<span
															class="ms-1 fa fa-check"></span></span>
												</td>
												
												<td class="py-2 text-end">
													<div class="dropdown text-sans-serif"><button
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
																	href="#!">Enquiry Dismissed</a><a class="dropdown-item"
																	href="#!">Order Confirmed</a><a class="dropdown-item"
																	href="#!">Order Delivered</a><a class="dropdown-item"
																	href="#!">Payment Received</a>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr class="btn-reveal-trigger">
												<td class="py-2">
													<div class="form-check custom-checkbox checkbox-success">
														<input type="checkbox" class="form-check-input" id="checkbox">
														<label class="form-check-label" for="checkbox"></label>
													</div>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>#181</strong></a>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>Ricky
														Antony</strong><br><a
														href="mailto:ricky@example.com">ricky@example.com</a>
												</td>
												
												<td class="py-2">20/04/2020</td>
												
												<td class="py-2 text-end"><span
														class="badge badge-success">Completed<span
															class="ms-1 fa fa-check"></span></span>
												</td>
												
												<td class="py-2 text-end">
													<div class="dropdown text-sans-serif"><button
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
																	href="#!">Enquiry Dismissed</a><a class="dropdown-item"
																	href="#!">Order Confirmed</a><a class="dropdown-item"
																	href="#!">Order Delivered</a><a class="dropdown-item"
																	href="#!">Payment Received</a>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr class="btn-reveal-trigger">
												<td class="py-2">
													<div class="form-check custom-checkbox checkbox-success">
														<input type="checkbox" class="form-check-input" id="checkbox">
														<label class="form-check-label" for="checkbox"></label>
													</div>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>#181</strong></a>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>Ricky
														Antony</strong><br><a
														href="mailto:ricky@example.com">ricky@example.com</a>
												</td>
												
												<td class="py-2">20/04/2020</td>
												
												<td class="py-2 text-end"><span
														class="badge badge-success">Completed<span
															class="ms-1 fa fa-check"></span></span>
												</td>
												
												<td class="py-2 text-end">
													<div class="dropdown text-sans-serif"><button
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
																	href="#!">Enquiry Dismissed</a><a class="dropdown-item"
																	href="#!">Order Confirmed</a><a class="dropdown-item"
																	href="#!">Order Delivered</a><a class="dropdown-item"
																	href="#!">Payment Received</a>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr class="btn-reveal-trigger">
												<td class="py-2">
													<div class="form-check custom-checkbox checkbox-success">
														<input type="checkbox" class="form-check-input" id="checkbox">
														<label class="form-check-label" for="checkbox"></label>
													</div>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>#181</strong></a>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>Ricky
														Antony</strong><br><a
														href="mailto:ricky@example.com">ricky@example.com</a>
												</td>
												
												<td class="py-2">20/04/2020</td>
												
												<td class="py-2 text-end"><span
														class="badge badge-success">Completed<span
															class="ms-1 fa fa-check"></span></span>
												</td>
												
												<td class="py-2 text-end">
													<div class="dropdown text-sans-serif"><button
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
																	href="#!">Enquiry Dismissed</a><a class="dropdown-item"
																	href="#!">Order Confirmed</a><a class="dropdown-item"
																	href="#!">Order Delivered</a><a class="dropdown-item"
																	href="#!">Payment Received</a>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr class="btn-reveal-trigger">
												<td class="py-2">
													<div class="form-check custom-checkbox checkbox-success">
														<input type="checkbox" class="form-check-input" id="checkbox">
														<label class="form-check-label" for="checkbox"></label>
													</div>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>#181</strong></a>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>Ricky
														Antony</strong><br><a
														href="mailto:ricky@example.com">ricky@example.com</a>
												</td>
												
												<td class="py-2">20/04/2020</td>
												
												<td class="py-2 text-end"><span
														class="badge badge-success">Completed<span
															class="ms-1 fa fa-check"></span></span>
												</td>
												
												<td class="py-2 text-end">
													<div class="dropdown text-sans-serif"><button
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
																	href="#!">Enquiry Dismissed</a><a class="dropdown-item"
																	href="#!">Order Confirmed</a><a class="dropdown-item"
																	href="#!">Order Delivered</a><a class="dropdown-item"
																	href="#!">Payment Received</a>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr class="btn-reveal-trigger">
												<td class="py-2">
													<div class="form-check custom-checkbox checkbox-success">
														<input type="checkbox" class="form-check-input" id="checkbox">
														<label class="form-check-label" for="checkbox"></label>
													</div>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>#181</strong></a>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>Ricky
														Antony</strong><br><a
														href="mailto:ricky@example.com">ricky@example.com</a>
												</td>
												
												<td class="py-2">20/04/2020</td>
												
												<td class="py-2 text-end"><span
														class="badge badge-success">Completed<span
															class="ms-1 fa fa-check"></span></span>
												</td>
												
												<td class="py-2 text-end">
													<div class="dropdown text-sans-serif"><button
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
																	href="#!">Enquiry Dismissed</a><a class="dropdown-item"
																	href="#!">Order Confirmed</a><a class="dropdown-item"
																	href="#!">Order Delivered</a><a class="dropdown-item"
																	href="#!">Payment Received</a>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr class="btn-reveal-trigger">
												<td class="py-2">
													<div class="form-check custom-checkbox checkbox-success">
														<input type="checkbox" class="form-check-input" id="checkbox">
														<label class="form-check-label" for="checkbox"></label>
													</div>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>#181</strong></a>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>Ricky
														Antony</strong><br><a
														href="mailto:ricky@example.com">ricky@example.com</a>
												</td>
												
												<td class="py-2">20/04/2020</td>
												
												<td class="py-2 text-end"><span
														class="badge badge-success">Completed<span
															class="ms-1 fa fa-check"></span></span>
												</td>
												
												<td class="py-2 text-end">
													<div class="dropdown text-sans-serif"><button
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
																	href="#!">Enquiry Dismissed</a><a class="dropdown-item"
																	href="#!">Order Confirmed</a><a class="dropdown-item"
																	href="#!">Order Delivered</a><a class="dropdown-item"
																	href="#!">Payment Received</a>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr class="btn-reveal-trigger">
												<td class="py-2">
													<div class="form-check custom-checkbox checkbox-success">
														<input type="checkbox" class="form-check-input" id="checkbox">
														<label class="form-check-label" for="checkbox"></label>
													</div>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>#181</strong></a>
												</td>
												<td class="py-2">
													<a href="#">
														<strong>Ricky
														Antony</strong><br><a
														href="mailto:ricky@example.com">ricky@example.com</a>
												</td>
												
												<td class="py-2">20/04/2020</td>
												
												<td class="py-2 text-end"><span
														class="badge badge-success">Completed<span
															class="ms-1 fa fa-check"></span></span>
												</td>
												
												<td class="py-2 text-end">
													<div class="dropdown text-sans-serif"><button
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
																	href="#!">Enquiry Dismissed</a><a class="dropdown-item"
																	href="#!">Order Confirmed</a><a class="dropdown-item"
																	href="#!">Order Delivered</a><a class="dropdown-item"
																	href="#!">Payment Received</a>
															</div>
														</div>
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

<script>
	$('input[name="dates"]').daterangepicker();
</script>
		<?php include"footer.php"; ?>