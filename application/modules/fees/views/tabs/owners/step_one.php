<?php echo form_open('', array(
	'class' => 'form-horizontal step-one',
	'id' => 'form-owner',
	'role' => 'form'
)); ?>
	<div class="modal-body">
		<ul class="progress-icons">
			<li class="active">
				<span class="number-button" id="num1">1</span>
				Owner Information
				<span class="pull-right">&rarr;</span>
			</li>
			<li>
				<span class="number-button" id="num2">2</span>
				Business Information
				<span class="pull-right">&rarr;</span>
			</li>
			<li>
				<span class="number-button">3</span>Application Details
			</li>
		</ul> <!-- End of Progress Icons -->

		<div id="step1" class="container">
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group margin-bottom-0">
						<div class="input-group">
							<input class="form-control owner-search" type="text" id="owner-search">
							<span class="input-group-btn">
								<a href="javascript:void(0);" id="search-owner"  class="btn btn-outline btn-success">
									<i class="fa fa-search"></i> Search
								</a>
							</span>
						</div>
					</div>

					<div id="owner-searches" class="form-group">
						<!-- Owner search result -->
						<div class="form search">
							<ul class="list-group owners search-results"></ul>
						</div>
					</div>

				</div>

				<div class="col-md-1">
					<p>or</p>
				</div>
				<div class="col-md-5">
					<div class="pull-left add-owner">
						<a id="add-new-owner" href="javascript:void(0);" class="btn btn-outline btn-info"><i class="fa fa-plus-circle"></i> Add New Owner</a>
					</div>
				</div>
			</div>
			<div class="row ownership_type" style="display:none">
				<div class="col-sm-6"><br>
					<div class="form-group ">
						<?php echo form_label('Organization Type:', 'ownership_id', array('class' => 'col-sm-4 control-label'));?>
						<div class="col-sm-8">
						<span style="color:#F00"><b>*</b></span>
							<?php echo form_dropdown('ownership_id', $ownership, '', 'class="form-control"'); ?>
						</div>
					</div>
				</div>
			</div>
				
			<!-- New owner form -->
			
			<div id="owner-form" class="container" style="display: none;">
				<div class="row">
					<div class="col-sm-12"><br>
						<h3 class="text-center form-title margin-bottom-20">Business Owner Information</h3>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">	
						<div class="form-group">
							<div class="col-sm-8">						
								 <p> <b><span style="color:#F00">*</span> &nbsp;Required Field</b></p>						
							</div>
						</div>
					</div>
					
					<div class="col-sm-5 ownerinfo" style="display:none">
						<div class="form-group">
							<span style="color:#F00"><b>*</b></span>
							<?php echo form_label('First Name:', 'firstname', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'firstname1',
									'id' => 'firstname1',
									'placeholder' => 'First Name',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>

						<div class="form-group">
							<span style="color:#F00"><b>*</b></span>						
							<?php echo form_label('Middle Name:', 'middlename', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'middlename1',
									'id' => 'middlename1',
									'placeholder' => 'Middle Name',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>

						<div class="form-group">
							<span style="color:#F00"><b>*</b></span>
							<?php echo form_label('Last Name:', 'lastname', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'lastname1',
									'id' => 'lastname1',
									'placeholder' => 'Last Name',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
						
						<div class="form-group">
							<span style="color:#F00"><b>*</b></span>
							<?php echo form_label('Gender', 'gender', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php
								$male=array('id'=>'2','name'=>'gender', 'value'=>'1');  
								$female=array('id'=>'3','name'=>'gender', 'value'=>'2'); 
								echo form_radio($male)." Male ".form_radio($female)." Female"."<br>";
							?>
							</div>
						</div>
						
						<div class="form-group">
							<?php echo form_label('House/Bldg No. Bldg. Name:', 'house_no', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'house_no_bldg_name',
									'id' => 'house_no_bldg_name',
									'placeholder' => 'House/Bldg No. Bldg. Name',
									'class' => 'form-control'
								), ''); ?>
							</div>
						</div>											
																
					</div> <!-- End of First Column -->
					
					<div class="col-sm-5 address"  style="display:none">
						<div class="form-group">
							<span style="color:#F00"><b>*</b></span>
							<?php echo form_label('Barangay:', 'brgy', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_dropdown('brgy_id', $brgy, '', 'class="form-control"'); ?>
							</div>							 					
						</div>
						
						<div class="form-group">
							<?php echo form_label('Street:Subd:', 'o_subdivision_street', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'o_subdivision_street',									
									'id' => 'o_subdivision_street',
									'placeholder' => 'Street:Subd',
									'class' => 'form-control'
								), ''); ?>
							</div>
						</div>
						
						<div class="form-group">
							<?php echo form_label('City/Municipality:', 'o_muni', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'o_muni',									
									'id' => 'o_muni',
									'value' => 'Compostela',
									'class' => 'form-control'
								), ''); ?>
							</div>
						</div>
						
						<div class="form-group">
							<?php echo form_label('Province:', 'o_province', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'o_province',									
									'id' => 'o_province',
									'value' => 'Cebu',
									'class' => 'form-control'
								), ''); ?>
							</div>
						</div>
						
						<div class="form-group">
							<?php echo form_label('Phone/Fax Number:', 'contact_number', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'contact_number',
									'id' => 'contact_number',
									'placeholder' => 'Phone/Fax Number',
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
					</div> <!-- End of Second Column -->
				</div> <!-- End Row -->					
			</div> <!-- End of Owner Form -->

			<div class="container president" style="display:none">
				<div class="col-sm-5"></div>
				<div class="col-sm-6">
					<span style="center"><b>Name of President/Treasurer of Corporation</b></span>
				</div><br>

				<div class="form-group">
					<!--span style="color:#F00"><b>*</b></span-->
					<?php echo form_label('First Name:', 'firstname', array('class' => 'col-sm-3 control-label')); ?>
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
					<!--span style="color:#F00"><b>*</b></span-->				
					<?php echo form_label('Middle Name:', 'middlename', array('class' => 'col-sm-3 control-label')); ?>
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
					<!--span style="color:#F00"><b>*</b></span-->
					<?php echo form_label('Last Name:', 'lastname', array('class' => 'col-sm-3 control-label')); ?>
					<div class="col-sm-8">
						<?php echo form_input(array(
							'name' => 'lastname',
							'id' => 'lastname',
							'placeholder' => 'Last Name',
							'class' => 'form-control'
						)); ?>
					</div>
				</div>

				<!-- start of owner location -->
						<div class="form-group">
							<?php echo form_label('House/Bldg No. Bldg. Name:', 'house_no', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'house_no_bldg_name12',
									'id' => 'house_no_bldg_name12',
									'placeholder' => 'House/Bldg No. Bldg. Name',
									'class' => 'form-control'
								), ''); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo form_label('Street:Subd:', 'o_subdivision_street', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'o_subdivision_street12',									
									'id' => 'o_subdivision_street12',
									'placeholder' => 'Street:Subd',
									'class' => 'form-control'
								), ''); ?>
							</div>
						</div>
						
						<div class="form-group">
							<span style="color:#F00"><b>*</b></span>
							<?php echo form_label('Barangay:', 'brgy', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_dropdown('brgy_id12', $brgy, '', 'class="form-control"'); ?>
							</div>							 					
						</div>
						
						<div class="form-group">
							<?php echo form_label('City/Municipality:', 'o_muni', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'o_muni12',									
									'id' => 'o_muni12',
									'value' => 'Compostela',
									'class' => 'form-control'
								), ''); ?>
							</div>
						</div>
						
						<div class="form-group">
							<?php echo form_label('Province:', 'o_province', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'o_province12',									
									'id' => 'o_province12',
									'value' => 'Cebu',
									'class' => 'form-control'
								), ''); ?>
							</div>
						</div>
				<!-- end of owner location -->

				<div class="form-group">
					<div class="col-sm-8">
						<?php echo form_label('OR:', 'or', array('class' => 'col-sm-3 control-label')); ?>
					</div>
				</div>
				<div class="form-group">
					<span style="color:#F00"><b>*</b></span>
					<?php echo form_label('Permitee:', 'permitee', array('class' => 'col-sm-3 control-label')); ?>
					<div class="col-sm-8">
						<?php echo form_input(array(
							'name' => 'permitee',
							'id' => 'permitee',
							'placeholder' => 'Permitee',
							'class' => 'form-control'
						)); ?>
					</div>
				</div>
			</div>
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
				<?php echo form_submit(array('value' => 'Save and Continue', 'class' => 'btn btn-outline btn-info')); ?>
			</div>
		</div>
	</div>
<?php echo form_close(); ?>