<style>
.alert.success {background-color: #4CAF50;color:white;}
.alert.warning {background-color: #ff9800;color:white;}
</style>
<div id="assess" class="modal modal-styled fade in">
<?php echo form_open('', array('class' => 'form-horizontal assessment')); ?>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Assessment</h3>
			</div>
			
				<div class="modal-body" id="mb">
					<div class="container">
						<div class="row header-detail">
							<div class="col-sm-4">
								<p>OWNER: <strong><span class="owner"></span></strong></p>
							</div> <!-- End of Column -->
							<div class="col-sm-4">
								<p>BUSINESS: <strong><span class="business"></span></strong></p>
							</div> <!-- End of Column -->
							
							<div class="col-sm-4">
								<p>PAYMENT MODE: <strong><span class="payment"></span></strong></p>
							</div>
							<div class="col-sm-4">
								<p>DATE OF ASSESSMENT: <strong><span class="assess_date"></span></strong></p>
								
							</div>
							
							 <!-- End of Column -->
						
						</div> <!-- End of Row -->
						<hr />

						<div class="business-natures">
							<p>	</p>
						</div>
						<!--start of additional tfo-->
						<div class="row addtfos" style="display: none">
							<div class="panel panel-danger">
								<div class="panel-heading"><h3>ADDITIONAL CHARGES</h3></div>
									<div class="panel-body">
										<div class="col-md-6">
											<table class="table table-bordered table-striped" border="1">
												<thead>
													<tr>
														<th>TFO</th>
														<th>AMOUNT</th>
														<th>DUE</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								<div class="panel-footer"></div>
							</div>
							<div class="col-md-6">
								<!--h2>Quarter</h2-->
							</div>
							
						</div>

						
						<!--end of additinal tfo-->

						<!-- <div class="row">
							<div class="panel panel-danger">
								<div class="panel-heading"><h3>INTEREST AND SURCHARGE</h3></div>
									<div class="panel-body">
										<div class="col-md-6">
											
												
													<div class="hiddenfields">
													<label>Surcharge</label>
													<input type="text" class="form-control" name="surcharge" value="" readonly/>
													<label>Interest</label>
													<input type="text" class="form-control" name="interest" value="" readonly/>
													</div>
												
										</div>
									</div>
								<div class="panel-footer"></div>
							</div>
							<div class="col-md-6">
							>Quarter</h2
							</div>
							</div> -->
						

						<div class="alert success">		
							<strong>Success!</strong> Requirements are completed. Please proceed to assess the business.
						</div>
						<div class="alert warning">
							<strong>Warning!</strong> Lacking of requirements. Please update first before assessing. 
						</div>
						<div class="row numaddtfo">
							<div class="panel panel-danger">
								<div class="panel-heading"><h3>Number of Additional TFO</h3></div>
									<div class="panel-body">
										<div class="col-md-10">
											<table class="table table-bordered table-striped abab" id="abab" border="1">
												<tbody>
													<!-- <input type="text" id="nochapter" placeholder="# of Additional TFO's"/>
													<input
													 type="button" value="Click to Add input" class="col_bot"/>
													<div id="ch" class="abab"></div>
													<input type="button" name="addtfo" value="Add TFO" id="addtfo" class="addtfo" style="display:none"/>
													<br>
													<input type="hidden" id="eg_hidden" name="eg_hidden" /> -->
													<!-- Summary -->

												</tbody>
											</table>
											<div id="ch" class="abab"></div>
										</div>
									</div>
								<div class="panel-footer"></div>
							</div>
						</div>

				<!-- ADDITIONAL TFO SHOW IF ANY -->
				<div class="row addttfos hidden">
							<div class="panel panel-danger">
								<div class="panel-heading"><h3>Additional TFO's</h3></div>
									<div class="panel-body">
										<div class="col-md-6">
											<table class="table table-bordered table-striped" border="1">
												<thead>
													<tr>
														<th>TFO Name</th>
														<th>Amount</th>
													</tr>
												</thead>
												<tbody>
												
												
												</tbody>
											</table>
										</div>
									</div>
								<div class="panel-footer"></div>
							</div>
							<div class="col-md-6">
								<!--h2>Quarter</h2-->
							</div>
						</div>


						<div class="row">
							<!-- <div class="col-sm-4">
								<?php echo form_label('Signage Fee?');?>
								<input type="radio" name="signageFee" value="1"/>Yes&nbsp;<input type="radio" name="signageFee" value="0"/>No
							</div> -->

							<div class="col-sm-8">
								<div class="excess" style="display:none">
									<div class="col-sm-1">
										&#8369;
									</div>
									<div class= "col-sm-4">
										<input type="text" name="signagefee" id="signagefee" value="120" class="form-control">
									</div>
									<div class="col-sm-4">
										<a type="button" class="btn btn-sm btn-success attachfee" title="Attach">
											<i class="fa fa-plus-circle">Attach Sign Fee</i>
										</a>
									</div>
								</div>
							</div>

						</div>
						<!--Div for annual-->

		
						<div class="row stall" style="display: none">
							<div class="panel panel-danger">
								<div class="panel-heading"><h3>Public Market Stall</h3></div>
									<div class="panel-body">
										<div class="col-md-12">
											<table class="table table-bordered table-striped" border="1" >
												<tr>
													<th>Stall No.</th>
													<th>Area by sqm.</th>
													<th>Value</th>
													<th>Due</th>
												</tr>
												<tr>
													<td class = 'stallnum'></td>
													<td class = 'stallarea'></td>

													<td>
														<span class = 'pull-left'>₱</span>
														<b><span class = 'pull-right stallval'></span></b>
														<input type ='hidden' id = 'hidstall_val1' value = '' name = 'hid_val' />
													</td>

													<td>
														<span class = 'pull-left'>₱</span>
														<b><span class = 'pull-right stalldue'></span></b>
														<input type ='hidden' id = 'hidstall_val' value = '' name = 'hid_val' />
													</td>

												</tr>
											</table>
										</div>
									</div>
								<div class="panel-footer"></div>
							</div>
							<div class="col-md-6">
								<!--h2>Quarter</h2-->
							</div>
						</div>
						
					
					
						<div class="row annual" style="display: none">
							<div class="panel panel-danger">
								<div class="panel-heading"><h3>BREAKDOWN</h3></div>
									<div class="panel-body">
										<div class="col-md-6">
											<table class="table table-bordered table-striped" border="1">
												<thead>
													<tr>
														<th class="payment_mode">Payment Mode : </th>
														<th>Due Date</th>
														<th>Status</th>
														<th>Amount</th>
													</tr>
												</thead>
												<tbody>
												
												</tbody>
											</table>
										</div>
									</div>
								<div class="panel-footer"></div>
							</div>
							<div class="col-md-6">
								<!--h2>Quarter</h2-->
							</div>
						</div>
						
						
						<div class="row nino">
							<div class="col-sm-4"></div>
							<div class="col-sm-4"></div>
							<div class="col-sm-4 totals">
								<p class="pull-right total-amounts" style="color:#1768fb;font-size:14px;"><b>Amount Due: ₱</b><span class="total-amount" style="color:#1768fb;font-size:14px;font-weight:bold;">0.00</span></p>
							</div>
						</div> <!-- End of Row -->
						<div class="row nino">
							<div class="col-sm-4"></div>
							<div class="col-sm-4"></div>
							<div class="col-sm-4 totals">
								<p class="pull-right " style="color:#1768fb;font-size:14px;"><b>Surchages</b>: ₱<span class="surchargessamplezz" style="color:#1768fb;font-size:14px;font-weight:bold;">0.00</span></p>
							</div>
						</div> <!-- End of Row -->
						<div class="row nino">
							<div class="col-sm-4"></div>
							<div class="col-sm-4"></div>
							<div class="col-sm-4 totals">
								<p class="pull-right" style="color:red;font-size:24px;"><b>Total Amount</b>: ₱<span class="total-overallzz" style="color:red;font-size:24px;font-weight:bold;">0.00</span></p>								
							</div>
						</div> <!--End of Row-->

						<div class="row paul">
							<div class="col-sm-4"></div>
							<div class="col-sm-4"></div>
							<div class="col-sm-4 totals">
								<p class="pull-right total-amounts" style="color:red;font-size:24px;"><b>Total Amount</b>: ₱<span class="total-amount" style="color:red;font-size:24px;font-weight:bold;">0.00</span></p>								
							</div>
						</div> <!--End of Row-->

						<!--End of Div for annual-->
						<div class="info">
							<p><b>Assessed By:</b> <span class="assessed_by"><u>Admin</u></span><br/>
							<b>Received By:</b> _________________<br>
							<b>Date Received:</b> <u><?php echo date('F d, Y');?></u></p>
						</div>
						<!--End of Div for Bi - annual-->

					</div> <!-- End of Container -->
				</div> <!-- End of Modal Body -->
				<div class="hiddenfields">
					<input type="hidden" name="app_id" value="" id="app_id"/>
					<input type="hidden" name="application_id" value="" />
					<input type="hidden" name="total_tax_due" value="" />
					<input type="hidden" name="payment_mode" value="" />
					<input type="hidden" name="payment" value="" />
					<input type="hidden" name="annually" value="" />
					<input type="hidden" name="semi-annually" value="" />
					<input type="hidden" name="quarterly" value="" />
					<input type="hidden" name="first_semi_annual" value="" />
					<input type="hidden" name="second_semi_annual" value="" />
					<input type="hidden" name="first_quarter" value="" />
					<input type="hidden" name="second_quarter" value="" />
					<input type="hidden" name="third_quarter" value="" />
					<input type="hidden" name="fourth_quarter" value="" />
					<input type="hidden" name="tfos" id="tfos" value="" />
					<input type="hidden" name="stallss" id="stallss" value="" />
					<input type="hidden" name="breakdowns" value="" />
					<input type="hidden" name="total" value="" />
					<input type="hidden" name="addtltfo" value="" />
					<input type="hidden" name="total_add_charges" value="" />
					<input type="hidden" name="assessment_date" value="" />

					
					<p id="tfodb" style="display:none"><?php foreach($tfo as $t){ echo "<option vid=".$t->tfo_id.">".$t->tfo."</option>";} ?></p>
					
					<?php ?>
					<!-- tfolist -->
				
				</div>
				<div class="modal-footer">
					<div class="action-block">
						<a href="#" class="btn btn-outline btn-success pull-left clear-requirements">Clear Requirements</a>
						<a href="#"><button class="btn btn-outline btn-warning assess-now"><i class="fa fa-dot-circle-o"></i> Assess Now</button></a>
						<div class="submit-btn inline-block ass_btns">
							<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
							<!--<a href="#" class="btn btn-outline btn-info print-assessment" onclick="PrintAssess('mb');"><i class="fa fa-print"></i> Print </a>-->
							<!-- <a href="#" class="btn btn-outline btn-info print_assessment" id="print_assessment" target="_blank"><i class="fa fa-print"></i> Print </a> -->
						</div>
					</div>
				</div>
		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of Assessment -->

<div class="clones" style="display:none">
	<div class="clone">
		<div class="row business-detail">
			<div class="col-sm-6">
				<p>TYPE OF BUSINESS: <strong><span class="nature"></span>&nbsp;<span class = "delinquent"></span></strong></p>
				
			</div>
			<div class="col-sm-6">
				<p class="pull-right">&nbsp;&nbsp;BUSINESS ADDRESS: <strong><span class="address"></span></strong></p>
				<p class="pull-right">GROSS SALES / CAPITALIZATION: <strong>₱ <span class="capital"></span>
				<!--<span class="penalty"></span>-->
				</strong></p>

			</div>
			<!-- <p class="pull-right"><strong>PENALTY: ₱<input type="text" name="penalty" style="border:none;" readonly></strong></p> -->
			<!--<span class="penalty"></span>-->
		</div> <!-- End of Row -->

		<div class="row">
			<div class="panel panel-danger">
				<div class="panel-heading"><h3>CHARGES</h3></div>
				<div class="panel-body">
					<div class="col-sm-12">
						<table class="table table-bordered table-striped" border="1">
							<thead>
								<tr>
									<th>TFO</th>
									<th>AMOUNT</th>
									<th>DUE</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								</tr>
							</tbody>
						</table>
						<!-- <div class="messages"></div> -->
						<!--<span class="penalty"></span>-->
					</div>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div> <!-- End of Row -->
	</div>
<?php echo form_close(); ?>
</div>
