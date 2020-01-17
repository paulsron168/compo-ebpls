<div id="new-application" class="modal modal-styled fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">New Business Permit Application</h3>
			</div>

			<div class="owner step-one">
				<?php $this->load->view('fees/tabs/owners/step_one'); ?>
			</div>

			<div class="owner step-two div-hidden">
				<?php $this->load->view('fees/tabs/owners/step_two'); ?>
			</div>

			<div class="owner step-three div-hidden">
				<?php $this->load->view('fees/tabs/owners/step_three'); ?>
			</div>

		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->