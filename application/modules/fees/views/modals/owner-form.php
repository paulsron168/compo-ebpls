<div id="edit-owner-details" class="modal modal-styled fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Update Owner</h3>
			</div>

			<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'edit-form-owner',
				'role' => 'form'
			)); ?>
				<div class="modal-body">
					<div id="step1" class="container">
						<div class="col-md-12 loaders">
							<div class="notification-image-left">
								<img src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>" />
							</div>
							<p class="placement-one">Loading data...please wait</p>
						</div>
						<!-- Edit owner form -->
						<div id="edit-owner-form">
								<div class="col-md-5">
									<div class="form-group">
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
											$male=array('id'=>'1','name'=>'gender', 'value'=>'1');  
											$female=array('id'=>'2','name'=>'gender', 'value'=>'2'); 
											echo form_radio($male)." Male ".form_radio($female)." Female"."<br>";
										?>
										</div>
									</div>
									
									<div class="form-group">
										<?php echo form_label('House/Bldg No. Bldg. Name:', 'house_no_bldg_name', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8">
											<?php echo form_input(array(
												'name' => 'house_no_bldg_name',
												'id' => 'house_no_bldg_name',
												'placeholder' => 'House/Bldg#',
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
												'type' => 'text',
												'placeholder' => 'Email Address',
												'class' => 'form-control'
											)); ?>
										</div>
									</div>
								</div>								
						</div>
						<div class="form-group">
										<?php echo form_label('Remarks', 'remarks', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8">
											<?php echo form_input(array(
												'name' => 'remarks',
												'id' => 'remarks',
												'placeholder' => 'Remarks',
												'class' => 'form-control'
											), ''); ?>
										</div>
									</div>		 <!-- End of Owner Form -->
						<div class="container president" style="display:none">
							<div class="col-sm-6"></div>
							<div class="col-sm-6">
								<span style="center"><b>Name of President/Treasurer of Corporation</b></span>
							</div><br>
							<div class="form-group">
								<span style="color:#F00"><b>*</b></span>
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
								<span style="color:#F00"><b>*</b></span>						
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
								<span style="color:#F00"><b>*</b></span>
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
								<div class="col-sm-8">
									<?php echo form_label('OR:', 'or', array('class' => 'col-sm-4 control-label')); ?>
								</div>
							</div>
							<div class="form-group">
								<span style="color:#F00"><b>*</b></span>
								<?php echo form_label('Permitee:', 'permitee', array('class' => 'col-sm-4 control-label')); ?>
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
							<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-outline btn-info')); ?>
						</div>
					</div>
				</div>
				<input type="hidden" name="owner_id" value="" />
				<input type="hidden" name="ownership_id" value="" />
			<?php echo form_close(); ?>

		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->