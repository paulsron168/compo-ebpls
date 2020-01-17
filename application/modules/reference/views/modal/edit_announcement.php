<div id="edit_announcement" class="modal modal-styled fade in">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Edit Announcement</h3>
			</div>
				<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'edit_form_announcement',
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
						<div class="col-md-6">
							<div class="form-group">
									<?php echo form_label('Title:', 'title', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
											'name' => 'title',
											'id' => 'title',
											'placeholder' => 'Title',
											'class' => 'form-control'
										)); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo form_label('Content:', 'announce_content', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_textarea(array(
											'name' => 'announce_content',
											'id' => 'announce_content',
											'placeholder' => 'Content',
											'class' => 'form-control'
										)); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo form_label('Created At', 'create_at', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
											'name' => 'created_at',
											'id' => 'created_at',
											'placeholder' => 'DD/MM/YY',
											'class' => 'form-control',
										)); ?>
									</div>
								</div><div class="form-group">
									<?php echo form_label('Added By', 'added_by', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
											'name' => 'added_by',
											'id' => 'added_by',
											'placeholder' => 'Username',
											'class' => 'form-control',
										)); ?>
									</div>
								</div>
						</div>
					</div>
					<input type="hidden" name="announce_id" value="" />

				</div>
			</div>

			<div class="modal-footer">
				<div class="action-block">
					<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
					<div class="submit-btn inline-block">
						<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
						<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-primary','id'=> 'update_announcement')); ?>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
