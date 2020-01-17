<div id="new-requirement" class="modal modal-styled fade">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Requirement Form</h3>
			</div>

			<?php echo form_open('', array('class' => 'form-horizontal requirement-form', 'role' => 'form')); ?>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<?php echo form_hidden('buss_nature_id', ''); ?>
								<div class="form-group">
									<?php echo form_label('Requirements:', 'description', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8 requirement-list">															
									</div>									
									<?php echo form_label('', '', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8 check-all" style="display:none">
										<?php echo form_checkbox(array(
												'name' => 'checkAll',
												'id' => 'checkAll',
												'value' => ''
												)); 
										?>	
										<?php echo form_label('Check All', 'checkAll', array('class' => 'control-label')); ?>
									</div>
									<div class="col-sm-8 no-reqt">
										<p class="msg"></p>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- End of Container -->
				</div> <!-- End of Modal Body -->
				
				<div class="messages">
					<div class="alert alert-danger fade in" style="margin: 20px; display: none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p></p>
					</div>
				</div>

				<div class="modal-footer" style="display:none">
					<div class="action-block">
						<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
						<div class="submit-btn inline-block">
							<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
							<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-primary')); ?>
						</div>
					</div>
				</div>
				<input type="hidden" name="application_id" id="application_id" value=""/>
			<?php echo form_close(); ?>
		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->