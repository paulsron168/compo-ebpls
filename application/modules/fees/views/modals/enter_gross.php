<div id="enter_gross" class="modal modal-styled fade in">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Enter Gross Sales</h3>
			</div>
			<div class="owner step-three div-hidden">
				<?php $this->load->view('fees/tabs/owners/nature_form'); ?>
			</div>			
				<div class="modal-body">
					<div class="container">
						
					</div> <!-- End of Container -->
				</div> <!-- End of Modal Body -->			

				<div class="modal-footer">
					<div class="action-block">
						<a href="#" class="btn btn-success pull-left clear-requirements">Clear Requirements</a>
						<a href="#" class="btn btn-warning assess-now"><i class="fa fa-dot-circle-o"></i> Assess Now</a>
						<div class="submit-btn inline-block">
							<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
							<a href="#" class="btn btn-info print-assessment"><i class="fa fa-print"></i> Print</a>
							<!--a href="#" class="btn btn-success approve-now"><i class="fa fa-check-circle"></i> Approval</a-->
						</div>
					</div>
				</div>
		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->