
<div id="new_surcharge" class="modal modal-styled fade in">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
			
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Add Surcharge</h3>
			</div>
				<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'form_surcharge',
				'role' => 'form'
			)); ?>
			<div class="modal-body">
				<div class="container">
					<div id="edit-tfo-form" class="row">
						<div class="col-sm-6">
					
							<div class="form-group">
								<?php echo form_label('Date:', 'renew_date', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									<?php echo form_input(array(
											'name' => 'date_renew',
											'id' => 'date_renew',
											'placeholder' => 'Date YYYY-MM-DD',
											'class' => 'form-control'
											
										)); ?>
								</div>
							</div>
							<div class="form-group">
								<?php echo form_label('Surcharge:', 'surcharge', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									<?php echo form_input(array(
											'name' => 'surcharge',
											'id' => 'surcharge',
											'placeholder' => 'Surcharge',
											'class' => 'form-control'
										)); ?>
								</div>
							</div>
								<div class="form-group">
									<?php echo form_label('Interest:', 'interest', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
												'name' => 'interest',
												'id' => 'interest',
												'placeholder' => 'Interest',
												'class' => 'form-control'
											)); ?>
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
						<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
						<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-primary','id'=> 'save_surcharge')); ?>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
