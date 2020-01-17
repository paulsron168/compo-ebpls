<div id="retire-pay" class="modal modal-styled fade in">
<div class="modal-dialog width-701-important">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 class="modal-title">Payment</h3>
		</div>
		<div class="modal-body">
			<div class="container detailretire">
				<div class="row">
					<div class="col-lg-6">
					<!-- FOR NEW APPLICATION -->
								
					<input type="hidden" name="permit_number" value="" />
								<input type="hidden" name="app_type" value="" />
								<input type="hidden" name="application_date" value="" />
								<input type="hidden" name="payment_method" value="" />
								<input type="hidden" name="app_type" value="" />
								<input type="hidden" name="organization_type" value="" />
								<input type="hidden" name="business_name" value="" />
								<input type="hidden" name="building_name" value="" />
								<input type="hidden" name="barangay" value="" />
								<input type="hidden" name="province" value="" />
								<input type="hidden" name="email_add" value="" />
								<input type="hidden" name="street_subd" value="" />
								<input type="hidden" name="street_name" value="" />
								<input type="hidden" name="city" value="" />
								<input type="hidden" name="phone_no" value="" />
								<input type="hidden" name="abled_male" value="" />
								<input type="hidden" name="abled_female" value="" />
								<input type="hidden" name="pwd_male" value="" />
								<input type="hidden" name="pwd_female" value="" />
								<input type="hidden" name="abled_male_lgu" value="" />
								<input type="hidden" name="abled_female_lgu" value="" />
								<input type="hidden" name="pwd_male_lgu" value="" />
								<input type="hidden" name="pwd_female_lgu" value="" />
								<input type="hidden" name="classification" value="" />
								<input type="hidden" name="occupancy_type" value="" />
								<input type="hidden" name="firstname" value="" />
								<input type="hidden" name="middlename" value="" />
								<input type="hidden" name="lastname" value="" />
								<input type="hidden" name="gender" value="" />
								<input type="hidden" name="bldg_no" value="" />
								<input type="hidden" name="business_nature" value="" />
								<input type="hidden" name="capital" value="" />
								<input type="hidden" name="gross" value="" />
								<input type="hidden" name="requirements" value="" />

								
						<div class="panel panel-default">
							<!-- <div class="panel-heading">
								<h3>BUSINESS INFO</h3>
							</div> -->
							<div class="panel-body">
								<!-- <div class="col-sm-5"> -->
									<p>
										
										Transaction Type: <strong><span class="trans-type"></span></strong><br />
										Payment Mode: <strong><span class="payment-mode"></span></strong><br />
										<!--Payment Status: <strong><span class="payment-status"></span></strong> -->
										Business Nature: <strong><span class="business-nature"></span></strong>
							
									</p>
								<!-- </div> -->
							</div>							
						</div>
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default">
							<!-- <div class="panel-heading">
								<h3>OWNER INFO</h3>
							</div> -->

							<div class="panel-body">
								<!-- <div class="col-sm-5"> -->
									<p>
										Owner Name: <strong><span class="owner"></span></strong><br />
										Address: <strong><span class="address"></span></strong><br />
										Contact Number: <strong><span class="contact-number"></span></strong>
									</p>
								<!-- </div> -->
							</div>								
						</div>
					</div>
				</div>
				<hr />


				<!--Div for annual-->
				<div class="row annual" style="display: none">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3>BREAKDOWN</h3>
							</div>
							
							<div class="panel-body">
								<div class="col-lg-12">
									<table class="table table-bordered table-striped annual">
										<thead>
											<tr>
												<th>Payment</th>
												<th>Payment_Due</th>		
												<th>Date_Payment</th>
												<th>BusinessGross</th>				
												<th>BusinessTax</th>		
												<th>CertFee</th>
												<th>DocuStamp</th>
												<th>Surcharge</th>
												<th>Sum_Amount</th>
				
												<th colspan="4">Payment Type</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>First Semester</td>
												<td>Due</td>
												<td colspan="4">Amount</td>
												
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
							
							<div class="panel-footer">
							</div>
						</div>
					</div>
				</div>
					<!--End of Div for annual-->
				<div class="row">					
					<div class="col-sm-12">
						<p class="payment-total-due"> <span class="payment-total font-30 label label-success"></span></p>							
						<div class="method-cash col-sm-12 save-cash" style="display: none">	
							<div class="col-sm-12 form-group cashni">
								<?php echo form_open('', array(
									'class' => 'form-horizontal save-cash-by-payer',
									'id' => 'form-cash1',
									'role' => 'form'
								)); ?>
								
								<input type="hidden" name="payall" value="" />
								<input type="hidden" name="assessment_id" value="" />
								<input type="hidden" name="owner_id" value="" />
								<input type="hidden" name="buss_id" value="" />
								<input type="hidden" name="total_amount" value="" />
								<input type="hidden" name="payment_id" value="" />	

								
							

									<div class="col-md-6">
										<div class="panel panel-default">
											<div class="panel-heading"><h3 align="center">CASH</h3></div>
											<div class="panel-body">
												<table class="table table-bordered table-styled cash-click">														
													<tbody id="cashni">
														<tr>
															<td>
																<div class="form-group">
																	<label class="col-sm-4 control-label">O.R. #</label>
																	<div class="col-sm-6 padding-left-0">
																		<input type="text" class="form-control" required name="or_number" value="" />
																		<input type="hidden" name="paid_tax" id="paid_tax"/>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Cert O.R. #</label>
																	<div class="col-sm-6 padding-left-0">
																		<input type="text" class="form-control" name="cert_or_number" value="" />
																		
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Cash Tendered:</label>
																	<div class="input-group col-sm-6 padding-left-0">
																		<span class="input-group-addon">&#8369;</span>
																		<input type="text" class="form-control" required name="cash_tendered" value="" />
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Date:</label>
																	<div class="input-group col-sm-6 padding-left-0">
																		<span class="input-group-addon">&#8369;</span>
																		<input type="text" class="form-control payment_date" required name="payment_date" id="date_applied" value="<?php echo date("m/d/Y");?>" />
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Change:</label>
																	<div class="input-group col-sm-6 padding-left-0">
																		<span class="input-group-addon">&#8369;</span>
																		<input type="text" class="form-control" name="change" readonly />
																		<input type="hidden" name="paid_tax" id="paid_tax" />
																		<input type="hidden" name="total_amount_" id="total_amount_" />
																		<input type="hidden" name="balance" id="balance" />
																		<input type="hidden" name="interest" id="interest"/>
																		<input type="hidden" name="surcharge" id="surcharge"/>
																 		<input type="hidden" name="breakdowns" id="breakdowns"/>
																		<input type="hidden" name="paid_breakdowns" id="paid_breakdowns"/>
																		<input type="hidden" name="payment_mode" id="payment_mode"/>
																		<input type="hidden" name="count" id="count"/>
																		<input type="hidden" name="payment_modes" id="payment_modes"/>

																	</div>
																</div>
																<div class="form-group">
																	<div class="col-sm-6" style="text-align: center;">
																		<input type="submit" class="btn btn-info form-control pay-cash-now" value="Pay Now" />
																	</div>
																</div>

																<div class="msg"></div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>												
										</div>
									</div>
								
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
