<?php echo form_open('', array(
	'class' => 'form-horizontal step-one',
	'id' => 'form-add-buss',
	'role' => 'form'
)); ?>
	<div class="modal-body">		
		<div id="step1" class="container">			
			<div id="owner-searches" class="row">
				<div class="col-md-6 padding-left-0">
					<!-- Owner search result -->
					<div class="form collapse search">
						<ul class="list-group owners search-results"></ul>
					</div>
				</div>
			</div>
			
			<div class="container" style="width: 940px; margin-right: 0px; margin-top: 20px; margin-left: 0px;">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="text-center form-title margin-bottom-20">Business Owner Information</h3>
					</div>
				</div>
			</div>


			<!-- New owner form -->
			<div id="owner-form" class="container div-hidden">
					<div class="col-md-5">
						<div class="form-group">
							<?php echo form_label('First Name:', 'firstname', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'firstname',
									'id' => 'firstname',
									'placeholder' => 'First Name',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo form_label('Middle Name:', 'middlename', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'middlename',
									'id' => 'middlename',
									'placeholder' => 'Middle Name',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo form_label('Last Name:', 'lastname', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'lastname',
									'id' => 'lastname',
									'placeholder' => 'Last Name',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo form_label('Address:', 'address', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_textarea(array(
									'name' => 'address',
									'rows' => 5,
									'id' => 'address',
									'placeholder' => 'Address',
									'class' => 'form-control'
								), ''); ?>
							</div>
						</div>
					</div>

					<div class="col-md-5">
						<div class="form-group">
							<?php echo form_label('Barangay:', 'brgy', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_dropdown('brgy_id', $brgy, '', 'class="form-control"'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo form_label('Phone Number:', 'contact_number', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'contact_number',
									'id' => 'contact_number',
									'placeholder' => 'Phone Number',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo form_label('Email Address:', 'email', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'email',
									'id' => 'email',
									'type' => 'email',
									'placeholder' => 'Email Address',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
					
			</div> <!-- End of Owner Form -->
		</div> <!-- End of Step 1 -->
	</div> <!-- End of Modal Body -->

	<div class="messages">
		<div class="alert alert-danger fade in" style="margin: 20px; display: none;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p>teststset</p>
		</div>
	</div>

	<div class="modal-footer">
		<div class="action-block">
			<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
			<div class="submit-btn inline-block">
				<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
				<?php echo form_submit(array('value' => 'Save and Continue', 'class' => 'btn btn-primary')); ?>
			</div>
		</div>
	</div>
<?php echo form_close(); ?>