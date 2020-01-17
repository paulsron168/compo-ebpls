<div id="new-signage" class="modal modal-styled fade">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">New Signage</h3>
			</div>

			<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'add-form-signage',
				'role' => 'form'
			)); ?>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php echo form_label('Type:', 'types', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
												'name' => 'types',
												'id' => 'types',
												'placeholder' => 'Type',
												'class' => 'form-control'
											)); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo form_label('Business Signs:', 'business_sign', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
												'name' => 'business_sign',
												'id' => 'business_sign',
												'placeholder' => 'Due Date(m/d/yyyy)',
												'class' => 'form-control'
											)); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo form_label('Advertising Sign:', 'advertising_sign', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
												'name' => 'advertising_sign',
												'id' => 'advertising_sign',
												'placeholder' => 'Due Date(m/d/yyyy)',
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