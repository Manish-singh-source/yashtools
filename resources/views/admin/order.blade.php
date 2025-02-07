@extends('admin.layouts.app')

@section('content-body')
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
													<a href="{{ route('admin.order.details') }}">
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
@endsection