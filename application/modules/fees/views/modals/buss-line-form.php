<div id="edit-buss-line" class="modal modal-styled fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Edit Business Line</h3>
			</div>

			<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'edit-form-owner',
				'role' => 'form'
			)); ?>
				<div class="modal-body">
					<div id="step1" class="container">
						<div class="col-md-12 loaders">
							<div class="notification-image-left">
								<img src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>" />
							</div>
							<p class="placement-one">Loading data...please wait</p>
						</div>
						<!-- Edit owner form -->
						<div id="edit-owner-form">
								<div class="col-md-5">
									<div class="form-group">
										<?php echo form_label('First Name:', 'firstname', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8">
											<?php echo form_input(array(
												'name' => 'firstname',
												'id' => 'firstname',
												'placeholder' => 'First Name',
												'class' => 'form-control'
											)); ?>
										</div>
									</div>

									<div class="form-group">
										<?php echo form_label('Middle Name:', 'middlename', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8">
											<?php echo form_input(array(
												'name' => 'middlename',
												'id' => 'middlename',
												'placeholder' => 'Middle Name',
												'class' => 'form-control'
											)); ?>
										</div>
									</div>

									<div class="form-group">
										<?php echo form_label('Last Name:', 'lastname', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8">
											<?php echo form_input(array(
												'name' => 'lastname',
												'id' => 'lastname',
												'placeholder' => 'Last Name',
												'class' => 'form-control'
											)); ?>
										</div>
									</div>

									<div class="form-group">
										<?php echo form_label('Address:', 'address', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8">
											<?php echo form_textarea(array(
												'name' => 'address',
												'rows' => 5,
												'id' => 'address',
												'placeholder' => 'Address',
												'class' => 'form-control'
											), ''); ?>
										</div>
									</div>
								</div>

								<div class="col-md-5">
									<div class="form-group">
										<?php echo form_label('Barangay:', 'brgy', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8">
											<?php echo form_dropdown('brgy_id', $brgy, '', 'class="form-control"'); ?>
										</div>
									</div>

									<div class="form-group">
										<?php echo form_label('Phone Number:', 'contact_number', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8">
											<?php echo form_input(array(
												'name' => 'contact_number',
												'id' => 'contact_number',
												'placeholder' => 'Phone Number',
												'class' => 'form-control'
											)); ?>
										</div>
									</div>

									<div class="form-group">
										<?php echo form_label('Email Address:', 'email', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8">
											<?php echo form_input(array(
												'name' => 'email',
												'id' => 'email',
												'type' => 'email',
												'placeholder' => 'Email Address',
												'class' => 'form-control'
											)); ?>
										</div>
									</div>
								</div>
								
						</div> <!-- End of Owner Form -->
					</div> <!-- End of Step 1 -->
				</div> <!-- End of Modal Body -->

				<div class="messages">
					<div class="alert alert-danger fade in" style="margin: 20px; display: none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>teststset</p>
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
				<input type="hidden" name="owner_id" value="" />
			<?php echo form_close(); ?>

		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->