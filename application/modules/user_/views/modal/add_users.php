<div id="add_new_user_modal" class="modal modal-styled fade ">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Create new account</h3>
			</div>

			<?php echo form_open('', array('class' => 'form-horizontal ', 'role' => 'form','id'=>'add_users_form')); ?>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">									
										<?php echo form_input(array(
											'name' => 'firstname',
											'id' => 'firstname',
											'placeholder' => 'First Name',
											'class' => 'form-control'
										)); ?>
									
								</div>
								<div class="form-group">									
									
										<?php echo form_input(array(
											'name' => 'lastname',
											'id' => 'lastname',
											'placeholder' => 'Last Name',
											'class' => 'form-control'
										)); ?>
									
								</div>
									<div class="form-group">
									<?php echo form_label('User Level:', 'value', array('class' => 'col-sm-4 control-label')); ?>
									
										<?php 
										$levelid= array(
												'1'=>'Application Officer',
												'2'=>'Assessment Officer',
												'3'=>'Approval Officer',
												'4'=>'Payment Officer',
												'5'=>'Releasing Officer',
												'6'=>'eBPPLIS Administrator'
											);
										echo form_dropdown('level_id', $levelid, '', 'class="form-control"');?>
									
								</div>
								<div class="form-group">								
										<?php echo form_input(array(
											'name' => 'username',
											'id' => 'username',
											'placeholder' => 'Username',
											'class' => 'form-control'
										)); ?>
								
								</div>							
								<div class="form-group">									
										<?php echo form_password(array(
											'name' => 'password',
											'id' => 'password',
											'placeholder' => 'Password',
											'class' => 'form-control'
										)); ?>
									
								</div>
									

							</div>
						</div>
					</div> <!-- End of Container -->
				</div> <!-- End of Modal Body -->
				<input type="hidden" name="user_id" value="">
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