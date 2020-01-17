<div id="logout_user_modal" class="modal modal-styled fade in">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Edit User Account</h3>
			</div>
				<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'logout_form',
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
						<div class="col-sm-12">
							<h4 class="message-header">Are you sure you want to logout this user?
							 </h4>
						</div>
					<input type="hidden" name="user_id" value="" />
					
				</div>
			</div>

			<div class="modal-footer">
				<div class="action-block">
					<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
					<div class="submit-btn inline-block">
						<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
						<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-primary','id'=> 'edit_user')); ?>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
