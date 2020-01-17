<div id="reassess" class="modal modal-styled fade in">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Re-Assessment Form</h3>
			</div>

			<?php echo form_open('', array('class' => 'form-horizontal re-assessment')); ?>
				<div class="modal-body">
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
							</div> <!-- End of Column -->
						</div> <!-- End of Row -->
						<hr />

						<div class="business-nature">
							
						</div>

						<div class="row">
							<div class="col-sm-4"></div>
							<div class="col-sm-4"></div>
							<div class="col-sm-4 totals">
								<p class="pull-right">Total: ₱<span class="total-amount">0.00</span></p>
							</div>
						</div> <!-- End of Row -->

						<!--Div for annual-->
						<div class="row annual" style="display: none">
							<div class="col-md-6">
								<h3>Breakdown</h3>
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Semester</th>
											<th>Due Date</th>
											<th>Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>First Semester</td>
											<td>Due</td>
											<td>Amount</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6">
								<!--h2>Quarter</h2-->
							</div>
						</div>
						<!--End of Div for annual-->
						<!--Div for Bi - annual-->
						<div class="row bi-annual" style="display: none">
							<div class="col-md-6">
								<h3>Breakdown</h3>
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Semester</th>
											<th>Due Date</th>
											<th>Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>First Semester</td>
											<td>Due</td>
											<td>Amount</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6">
								<!--h2>Quarter</h2-->
							</div>
						</div>
						<!--End of Div for Bi - annual-->
						<div class="row quarterly" style="display: none">
							<div class="col-md-6">
								<h3>Breakdown</h3>
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Quarter</th>
											<th>Due Date</th>
											<th>Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>First Quarter</td>
											<td>Due</td>
											<td>Amount</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6">
								<!--h2>Quarter</h2-->
							</div>
						</div>
					</div> <!-- End of Container -->
				</div> <!-- End of Modal Body -->
				
				<input type="hidden" name="app_id" value="" />
				<input type="hidden" name="application_id" value="" />
				<input type="hidden" name="payment" value="" />
				<input type="hidden" name="annually" value="" />
				<input type="hidden" name="semi_annually" value="" />
				<input type="hidden" name="quarterly" value="" />
				<input type="hidden" name="total_tax_due" value="" />

				<div class="modal-footer">
					<div class="action-block">
						<a href="#" class="btn btn-success pull-left clear-requirements">Clear Requirements</a>
						<a href="#" class="btn btn-warning reassess-now"><i class="fa fa-dot-circle-o"></i> Re-assess Now</a>
						<div class="submit-btn inline-block">
							<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
							<a href="#" class="btn btn-info print-assessment"><i class="fa fa-print"></i> Print</a>
							<!--a href="#" class="btn btn-success approve-now"><i class="fa fa-check-circle"></i> Approval</a-->
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->


<div class="clones1" style="display:none">
	<div class="clone1">
		<div class="row business-detail">
			<div class="col-sm-6">
				<p>TYPE OF BUSINESS: <strong><span class="nature"></span>&nbsp;<span class="delinquent"></span></strong></p>
				<p>DATE OF ASSESSMENT: <strong><span class="assess_date"><?php echo date('F d, Y', time()); ?></span></strong></p>
			</div>
			<div class="col-sm-6">
				<p class="pull-right">&nbsp;&nbsp;BUSINESS ADDRESS: <strong><span class="address"></span></strong></p>
				<p class="pull-right">GROSS SALES / CAPITALIZATION: <strong>₱ <span class="capital"></span></strong></p>
			</div>
		</div> <!-- End of Row -->

		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>											
							<th>FEES / CHARGES</th>
							<th>AMOUNT / FORMULA</th>
							<th>TAX DUE</th>
						</tr>
					</thead>
					<tbody>
						<tr>											
							<!--td id ="amount"><span class="pull-right"></span></td>
							<td id="tax_due"><span class="pull-right"></span>												
							</td-->											
						</tr>										
					</tbody>
				</table>
				<div class="messages"></div>
			</div>
		</div> <!-- End of Row -->
	</div>
</div>