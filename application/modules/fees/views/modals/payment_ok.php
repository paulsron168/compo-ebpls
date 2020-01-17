<div id="payment_ok" class="modal modal-styled fade in">
	<div class="modal-dialog width-700-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Payment Successfull</h3>
			</div>
			<div class="errormsg">
				<?php $this->load->view('fees/tabs/owners/step_three'); ?>
			</div>			
				<div class="modal-body">
					<div class="container">						
						<div class="success" style="display: none">
							<p class="msg">Payment has been successfully made :)</p>
						</div>
					</div> <!-- End of Container -->
				</div> <!-- End of Modal Body -->			

				<div class="modal-footer">
					<div class="action-block">
						<a href="#" class="btn btn-success pull-left ok">OK</a>						
					</div>
				</div>
		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->