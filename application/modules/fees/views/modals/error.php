<div id="error" class="modal modal-styled fade in">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Info</h3>
			</div>
			<div class="owner step-three div-hidden">
				<?php //$this->load->view('fees/tabs/owners/step_three'); ?>			
			</div>			
				<div class="modal-body">
					<div class="container">
							<span class="badge alert-warning"></span><h3 class="msg"></h3>
					</div> <!-- End of Container -->
				</div> <!-- End of Modal Body -->			
				
				<div class="hidden_info">
					<input type="hidden" name="application_id" id ="application_id"/>
					<input type="hidden" name="app_id" id ="app_id"/>
					<input type="hidden" name="business_id" id="business_id"/>
					<input type="hidden" name="buss_nature_id" id="buss_nature_id"/>
					<input type="hidden" name="bus_line_id" id="bus_line_id"/>
					<!--input type="hidden" name="year[]" id="year[]"/-->
				</div>
				<div class="modal-footer">
					<div class="action-block">						
						<div class="submit-btnf inline-block">
							<a href="#" class="btn btn-outline btn-info pull-left cancel">Cancel</a>
							<a href="#" class="btn btn-outline btn-danger pull-left ok">OK</a>
						</div>
					</div>
				</div>
		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->