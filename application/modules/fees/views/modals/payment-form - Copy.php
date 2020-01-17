<div id="payment-form" class="modal modal-styled fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Payment Form</h3>
			</div>
			<div class="modal-body">
				<div class="container details">
					<div class="row">
						<div class="col-sm-4">
							<p>
								Transaction Type: <strong><span class="trans-type"></span></strong><br />
								Payment Mode: <strong><span class="payment-mode"></span></strong><br />
								Payment Status: <strong><span class="payment-status"></span></strong>
							</p>
						</div>
						<div class="col-sm-8">
							<p>
								Owner Name: <strong><span class="owner"></span></strong><br />
								Address: <strong><span class="address"></span></strong><br />
								Contact Number: <strong><span class="contact-number"></span></strong>
							</p>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-sm-12">
							<h4>Assessment</h4>
						</div>
						
						<div class="col-sm-6">
							<ul id="myTab1" class="nav nav-tabs">
								<li class="active"><a href="#payment-breakdown" data-toggle="tab">Breakdown</a></li>
								<li><a href="#payment-history" data-toggle="tab">Payment History</a></li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane fade in active" id="payment-breakdown">
									<div class="portlet">
										<div class="payment-message"></div>
										<div class="portlet-header">
											<h3>Payment Breakdown</h3>
										</div>

										<div class="portlet-content">
											<table class="table table-bordered table-styled breakdown">
												<thead>
													<tr>
														<th>Items / Fees</th>
														<th>Due</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="tab-pane fade in" id="payment-history">									 
									<div class="portlet">									
										<div class="payment-message"><p>No payment history yet.</p></div>
										<div class="portlet-header">
											<h3>Payment History</h3>
										</div>										
										<div class="portlet-content">
											<p class="pull-right">Total Paid: &#8369; <span class="label label-success total-history"></span></p>
											<table class="table table-bordered table-styled"  id="hist">
												<thead>
													<tr>
														<th>Payment Mode</th>
														<th>Payment Date</th>
														<th>Amount Paid</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>														
													</tr>
													<tr>
														<td></td>
														<td></td>														
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div> <!-- End of Tab Content -->
						</div>
						<div class="col-sm-6">
							<p class="payment-total-due">Total: &#8369; <span class="payment-total font-30 label label-success">20,155.00</span></p>
							<div class="payment-method">
								<a href="#" class="method cash btn btn-success"><i class="fa fa-money"></i> CASH</a>
								<a href="#" class="method check btn btn-info"><i class="fa fa-check"></i> CHECK</a>
							</div>
							<div class="method-cash col-sm-12 save-cash" style="display: none">	
								<div class="col-sm-12 form-group cashni">
									<?php echo form_open('', array(
										'class' => 'form-horizontal save-cash-by-payer',
										'id' => 'form-cash',
										'role' => 'form'
									)); ?>
										
										<input type="hidden" name="assessment_id" value="" />
										<input type="hidden" name="owner_id" value="" />
										<input type="hidden" name="buss_id" value="" />
										<input type="hidden" name="total_amount" value="" />

										<table class="table table-bordered table-styled">
											<thead>
												<th colspan="6" class="text-center">CASH</th>
											</thead>
											<tbody id="cashni">
												<tr>
													<td>
														<div class="form-group">
															<label class="col-sm-4 control-label">O.R. #</label>
															<div class="col-sm-8 padding-left-0">
																<input type="text" class="form-control" required name="or_number" value="" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-4 control-label">Cash Tendered:</label>
															<div class="input-group col-sm-8 padding-left-0">
																<span class="input-group-addon">&#8369;</span>
																<input type="text" class="form-control" required name="cash_tendered" value="" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-4 control-label">Change:</label>
															<div class="input-group col-sm-8 padding-left-0">
																<span class="input-group-addon">&#8369;</span>
																<input type="text" class="form-control" name="change" value="" />
															</div>
														</div>
														<div class="form-group">
															<div class="col-sm-12">
																<input type="submit" class="btn btn-info form-control pay-cash-now" value="Pay Now" />
															</div>
														</div>

														<div class="msg"></div>
													</td>
												</tr>
											</tbody>
										</table>
									<?php echo form_close();?>
								</div>
							</div>
							<div class="method-check col-sm-12 save-check" style="display: none">
								<div class="col-sm-6 form-group checkni">
									<?php echo form_open('', array(
										'class' => 'form-horizontal save-check-by-payer',
										'id' => 'form-check',
										'role' => 'form'
									)); ?>	
									
									<table class="table table-bordered table-styled">
											<thead>
												<th colspan="6" class="text-center">CHECK</th>
											</thead>
											<tbody>
												<tr>
													<td></td>
												</tr>
											</tbody>
										</table>		
									<?php echo form_close();?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="messages">
				<div class="alert alert-danger fade in" style="margin: 20px; display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>teststset</p>
				</div>
			</div>
		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->