<div id="add-new-requirement" class="modal modal-styled fade">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Requirement Form</h3>
			</div>

			<?php echo form_open('', array('class' => 'form-horizontal new-requirement-form', 'role' => 'form')); ?>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php echo form_label('Requirement:', 'description', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
											'name' => 'description',
											'id' => 'description',
											'class' => 'form-control'
										)); ?>
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

				<div class="modal-footer">
					<div class="action-block">
						<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
						<div class="submit-btn inline-block">
							<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
							<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-primary')); ?>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>

		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->