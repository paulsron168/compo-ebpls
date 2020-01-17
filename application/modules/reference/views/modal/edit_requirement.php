<div id="edit-requirement" class="modal modal-styled fade in">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Edit TFO Information</h3>
			</div>
				<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'edit-form-req',
				'role' => 'form'
			)); ?>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 loader">
							<div class="notification-image-left">
								<img src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>" />
							</div>
							<p class="placement-one"> Loading data...please wait</p>
						</div>
					</div><!--end of row1-->

					<div id="edit-tfo-form" class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<?php echo form_label('Description:', 'description', array('class' => 'col-sm-4	 control-label')); ?>
								<div class="col-sm-8">
									<?php echo form_input(array(
											'name' => 'description',
											'id' => 'description',
											'placeholder' => 'Description',
											'class' => 'form-control'
										)); ?>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" name="requirement_id" value="" />
				</div>
			</div>

			<div class="modal-footer">
				<div class="action-block">
					<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
					<div class="submit-btn inline-block">
						<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
						<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-primary','id'=> 'update_tfo')); ?>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
