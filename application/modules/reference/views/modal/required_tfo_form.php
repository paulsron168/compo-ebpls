<div id="add_tfo_form" class="modal modal-styled fade in">
	<div class="modal-dialog width-500-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Tax, Fees and Other Charges</h3>
			</div>

			<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'add-tfo-form'
			)); ?>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<?php echo form_hidden('buss_nature_id', ''); ?>
						<div class="col-sm-12">
							<div class="form-group">
								<?php echo form_label('Description:', 'tfo', array('class' => 'col-sm-4 control-label text-right')); ?>
								<div class="col-sm-8 padding-left-0">
									<?php echo form_input(array(
										'name' => 'tfo',
										'id' => 'tfo',
										'class' => 'form-control',
										'placeholder' => 'Tax, Fee Title, Charges'
									)); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo form_label(form_checkbox(array(
									'name' => 'all',
									'class' => 'checkbox-item',
									'value' => 1
								)).' <span>Apply to all Business Nature</span>', 'all',
								array('class' => 'col-sm-8 pull-right padding-left-0 control-label')); ?>
							</div>

							<div class="form-group">
								<?php echo form_label('Type:', 'type', array('class' => 'col-sm-4 control-label text-right')); ?>
								<div class="col-sm-8 padding-left-0">
									<?php echo form_dropdown('type', array(
										'Tax' => 'Tax',
										'Regulatory Fee' => 'Regulatory Fee',
										'Special Fee' => 'Special Fee',
										'Other Charges' => 'Other Charges',
									), '', 'class="form-control"'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo form_label('Amount:', 'amount', array('class' => 'col-sm-4 control-label')); ?>
								<div class="input-group col-sm-8 padding-left-0">
									<span class="input-group-addon">&#8369;</span>
									<?php echo form_input(array(
										'name' => 'amount',
										'id' => 'amount',
										'placeholder' => 0.00,
										'class' => 'col-sm-4 form-control'
									)); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo form_label('Indicator:', 'indicator', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8 padding-left-0">
									<?php echo form_dropdown('indicator', array(
										'Normal (Annual)' => 'Normal (Annual)',
										'Monthly' => 'Monthly',
										'Quarterly' => 'Quarterly',
										'Semi-Annually' => 'Semi-Annually',
										'Once Every Two Years' => 'Once Every Two Years',
										'Once Every 5 Years' => 'Once Every 5 Years',
									), '', 'class="form-control"'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div class="action-block">
					<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
					<div class="submit-btn inline-block">
						<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
						<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-primary')); ?>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>		
	</div>
</div>