<div id="renew" class="modal modal-styled fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Renew Business</h3>
			</div>
			<?php echo form_open('', array('class' => 'form form-horizontal renew')); ?>
			<div class="modal-body">

				<div class="container details">
					<div class="row"><div class="message" style="display:none"></div></div>
					<div class="row">
						<div class="col-sm-4">
							<p>OWNER: <strong><span class="owner"></span></strong></p>
						</div> <!-- End of Column -->
						<div class="col-sm-4">
							<p>BUSINESS: <strong><span class="business"></span></strong></p>
						</div> <!-- End of Column -->
						<div class="col-sm-4">
							<p class="pull-left">&nbsp;&nbsp;BUSINESS ADDRESS: <strong><span class="address"></span></strong></p>
						</div> <!-- End of Column -->
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="col-sm-4">
								<p>PAYMENT MODE: <strong><span class="payment"></span></strong></p>
							</div>
						</div>
						<div class="col-md-12 buss_info" style="display:none">
							<div class="col-sm-1">
								<p>BUSINESS NATURE: <strong><span class="bnauture"></span></strong></p>
							</div>
							<!--div class="col-sm-4 tpgross" style="display:none">
								<p>GROSS: <strong><span class="tpgross_input"></span></strong></p>
							</div-->
							<!--div class="col-sm-4 tpbn" style="display:none">
								<p>BUSINESS NATURE: <strong><span class="tpbn_input"></span></strong></p>
							</div-->
						</div>
							<!--p>&nbsp;&nbsp;GROSS: <strong><span class="gross"></span></strong></p-->
						<div class="col-md-5 business-nature-gross">

						</div>

						<div class="col-md-7 addtionalreqt" style="display:none">
							<div class="form-group">
								<?php echo form_label('Additional Requirements:', 'requirements', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8 requirement-list">
									<?php echo form_checkbox(array(
										'name' => 'requirements[]',
										'id' => 'requirements[]',
										'value' => 1
									)); ?>
									<?php echo form_label('Sample', 'requirements[]', array('class' => 'control-label')); ?>
								</div>
								<div class="col-sm-8 check-all" style="display : none">
									<div class="col-sm-12">
										<?php echo form_checkbox(array(
												'name' => 'checkAll',
												'id' => 'checkAll',
												'value' => ''
												));
										?>
										<?php echo form_label('Check All', 'checkAll', array('class' => 'control-label')); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr />
				</div>
			</div>

			<div class="hidden-fields">
				<input type="hidden" name="application_id" value="2" />
			</div>
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
						<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-outline btn-info')); ?>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->
