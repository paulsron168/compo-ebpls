<div id="edit-tfo" class="modal modal-styled fade in">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Edit TFO Information</h3>
			</div>
				<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'edit-form-tfo',
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
								<?php echo form_label('Description:', 'tfo', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									<?php echo form_input(array(
											'name' => 'tfo',
											'id' => 'tfo',
											'placeholder' => 'Description',
											'class' => 'form-control'
										)); ?>
								</div>
							</div>
							<div class="form-group">
								<?php echo form_label('Default Amount:', 'amount', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									<?php echo form_input(array(
											'name' => 'amount',
											'id' => 'amount',
											'placeholder' => 'Amount',
											'class' => 'form-control'
										)); ?>
								</div>
							</div>
							<div class="form-group">
								<?php echo form_label('Behavior:', 'all', array('class' => 'col-sm-4 control-label')); ?>
								<!-- <div class="col-sm-8">
									<?php echo form_input(array(
											'name' => 'all',
											'id' => 'all',
											'placeholder' => 'Behavior',
											'class' => 'form-control'
										)); ?>
								</div> -->
								<div class="col-sm-8">
									 <?php 
										echo form_dropdown('all', $behavior, '', 'class="form-control"');
										 ?>
								</div>
							</div>
							<div class="form-group">
								<?php echo form_label('Indicator:', 'payment_id', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									 <?php 
										echo form_dropdown('payment_id', $paymenttype, '', 'class="form-control"');
										 ?>
								</div>
							</div>
							<div class="form-group">
								<?php echo form_label('Type:', 'type', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									 <?php 
										echo form_dropdown('type', $tfotype, '', 'class="form-control"');
										 ?>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" name="tfo_id" value="" />
				</div>
			</div>

			<div class="modal-footer">
				<div class="action-block">
					<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
					<div class="submit-btn inline-block">
						<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
						<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-outline btn-info','id'=> 'update_tfo')); ?>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
