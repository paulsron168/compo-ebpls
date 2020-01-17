<div id="new-nature" class="modal modal-styled fade">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">New Business Nature</h3>
			</div>

			<?php echo form_open('', array('class' => 'form-horizontal nature-form', 'role' => 'form')); ?>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
							<div class="form-group" style="display:none;">
								<?php echo form_label('Business Nature:', 'buss_nature_id', array('class' => 'col-sm-4 control-label ')); ?>
									<div class="col-sm-8 padding-left-0">
										<?php //print_r($business_nature->result()); 
										echo form_dropdown('buss_nature_id',
											dropdown_options($business_nature->result(), 'buss_nature_id', 'business_nature', 'Business Nature'),
											'style="width: 240px; font-size: 11px"',
											'class="form-control"'
										); ?>
									</div>
								</div>
								<div class="form-group new-bnature">
									<?php echo form_label('Business Nature:', 'business_nature', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8 padding-left-0">
										<?php echo form_input(array(
											'name' => 'business_nature',
											'id' => 'business_nature',
											'placeholder' => 'Business Nature',
											'class' => 'form-control'
										)); ?>
									</div>
								</div>
								<div class="form-group">
								<?php echo form_label('Transaction:', 'application_id', array('class' => 'col-sm-4 control-label ')); ?>
									<div class="col-sm-8 padding-left-0">
										<?php  echo form_dropdown('application_id',
											dropdown_options($application, 'application_id', 'types', 'Application Type'),
											'',
											'class="form-control"'
										); ?>
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