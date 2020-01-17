<div id="add_announcement" class="modal modal-styled fade">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">New Announcement Form</h3>
			</div>

			<?php echo form_open('', array('class' => 'form-horizontal adding_announcement', 'role' => 'form')); ?>
				<div class="modal-body">
					<div class="container">
						<div class="row">
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
									<?php echo form_label('Create At', 'create_at', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
											'name' => 'created_at',
											'id' => 'created_at',
											'placeholder' => date('Y-m-d '),
											'class' => 'form-control',
											'readonly'=>'readonly'
										)); ?>
									</div>
								</div>

									<div class="form-group">
									<?php echo form_label('Added By', 'added_by', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php
											$check=$this->db
													->select('firstname, lastname')
													->from('users')
													->where('username', $username)
													->get();
												foreach($check->result() as $t){

										echo form_input(array(
											'name' => 'added_by',
											'id' => 'added_by',
											'value' => $t->firstname.' '. $t->lastname,
											'class' => 'form-control',
											'readonly'=>'readonly'
										));
										} ?>
									</div>
								</div>
								<input type="hidden" name="announce_id"/>
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
