<div id="add-barangay" class="modal modal-styled fade in">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Barangay Form</h3>
			</div>
			
			<?php 
			echo form_open('', array(
			'class' => 'form-horizontal',
			'id' => 'barangay-form',
			'role' => 'form'
			)); ?>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-6">																		
								<div class="form-group">
									<?php echo form_label('Barangay Name:', 'brgy', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8 padding-left-0">
										<?php echo form_input(array(
											'name' => 'brgy',
											'id' => 'brgy',
											'class' => 'form-control',
											'placeholder' => 'Barangay Name'
										)); ?>
									</div>
								</div>

								<div class="form-group">
									<?php echo form_label('Brgy Code:', 'code', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8 padding-left-0">
										<?php echo form_input(array(
											'name' => 'code',
											'id' => 'code',
											'class' => 'form-control'
										)); ?>
									</div>
								</div>

								<div class="form-group" style="display:none">
									<?php echo form_label('Garbage Zone:', 'garbage', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8 padding-left-0">
										<?php echo form_dropdown('garbage', array(
											'No' => 'No',
											'Yes' => 'Yes'
										), '', 'class="form-control"'); ?>
									</div>
								</div>
							</div>									
						</div>
					</div>	
				</div>		
				<div class="messages">
					<div class="alert alert-danger fade in" style="margin: 20px; display: none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p></p>
					</div>
				</div>

				<div class="modal-footer">
					<div class="action-block">
						<!--?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?-->
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