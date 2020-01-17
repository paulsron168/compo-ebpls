<?php echo form_open('', array(
	'class' => 'form-horizontal step-three',
	'id' => 'form-business',
	'role' => 'form'
)); ?>
	<div class="modal-body">
		<ul class="progress-icons">
			<li>
				<span class="number-button" id="num1">1</span>
				Owner Information
				<span class="pull-right">&rarr;</span>
			</li>
			<li>
				<span class="number-button" id="num2">2</span>
				Business Information
				<span class="pull-right">&rarr;</span>
			</li>
			<li class="active">
				<span class="number-button">3</span>
				Application Details
			</li>
		</ul> <!-- End of Progress Icons -->

		<div id="step1" class="container">

			<!-- New application form -->
			<div id="application-form" class="row">
				<div class="col-md-6 owner-details">
					<div class="form-group">
						<?php echo form_label('Business Owner:', 'business_owner', array('class' => 'col-sm-4 control-label')); ?>
						<div class="col-sm-8 padding-left-0">
							<p class="owner field-values"></p>
						</div>
					</div>
				</div>
				<div class="col-md-6 business-details">
					<div class="form-group">
						<?php echo form_label('Business Name:', 'business_name', array('class' => 'col-sm-4 control-label')); ?>
						<div class="col-sm-8 padding-left-0">
							<p class="business field-values"></p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3 class="border-bottom">Add new lines of business</h3>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<div class="form-group">
							<?php echo form_label('Business Nature:', 'buss_nature_id', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-4 padding-left-0">
								<?php echo form_dropdown('buss_nature_id', $nature, '', 'class="form-control business-nature"'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo form_label('Capital Investment:', 'capital', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-4 input-group">
								<span class="input-group-addon">₱</span>
								<?php echo form_input(array(
									'name' => 'capital',
									'id' => 'capital',
									'placeholder' => '0.00',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
						<hr>
						<div class="col-sm-3">
							<div class="">
								<label for="">
								Addt'l TFO's For Weights and Measures
								</label>
							</div>
							<div class="">
								<input 
									type="text"
									placeholder="kg"
									name="kg"
									class=""
									style="margin-top: 3px;">
							</div>
							<div class="">
								<input 
									type="text"
									placeholder="l" 
									name="l"
									class=""
									style="margin-top: 3px;">
							</div>
							<div class="">
								<input 
									type="text"
									placeholder="m" 
									name="m"
									class=""
									style="margin-top: 3px;">
							</div>
						</div>
						<div class="col-sm-9">
							<div class="">
								<div class="form-group">
									<?php echo form_label('Business Requirements:', 'requirements', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8 requirement-list">
										<?php echo form_checkbox(array(
											'name' => 'requirements[]',
											'id' => 'requirements[]',
											'value' => 1
										)); ?>
										<?php echo form_label('Sample', 'requirements[]', array('class' => 'control-label')); ?>
									</div>
									<?php echo form_label('', '', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">								
										<?php /* echo form_checkbox(array(
												'name' => 'checkAll',
												'id' => 'checkAll',
												'value' => ''
												));  */
										?>	
										<?php //echo form_label('Check All', 'checkAll', array('class' => 'control-label')); ?>									
									</div>	
								</div>
							</div>
						</div>
						<!-- <div class="col-sm-8 form-group">
							<div class="col-sm-6 form-group">
								<?php echo form_label('Quantity:', 'requirements', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-1 input-group quantity">
									<?php echo form_input(array(
										'name' => 'quantity',
										'id' => 'quantity',
										'placeholder' => '0',
										'class' => 'form-control'
									)); ?>
								</div>
								<div class="col-sm-2 input-group unit">
									<input type="radio" name="unit" id="unit" value="1"/> Meter
									<input type="radio" name="unit" id="unit" value="2"/> Kg
									<input type="radio" name="unit" id="unit" value="3"/> Liter
								</div>
							</div>

						</div> -->
					</div>
				</div>
				<input type="hidden" name="application_id" id="application_id"/>
				<input type="hidden" name="buss_id" id="buss_id"/>
			</div> <!-- End of Owner Form -->
		</div> <!-- End of Step 1 -->
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
				<?php echo form_submit(array('value' => 'Save and Continue', 'class' => 'btn btn-outline btn-info')); ?>
			</div>
		</div>
	</div>
<?php echo form_close(); ?>