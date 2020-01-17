<?php echo form_open('', array(
	'class' => 'form-horizontal step-two',
	'id' => 'form-business',
	'role' => 'form'
)); ?>


	<div class="modal-body" id="modalTest">
		<ul class="progress-icons">
			<li>
				<span class="number-button" id="num1">1</span>
				Owner Information
				<span class="pull-right">&rarr;</span>
			</li>
			<li class="active">
				<span class="number-button" id="num2">2</span>
				Business Information
				<span class="pull-right">&rarr;</span>
			</li>
			<li>
				<span class="number-button">3</span>Application Details
			</li>
		</ul> <!-- End of Progress Icons -->

		<div id="step1" class="container">
			<div class="col-md-6 owner-details">
				<div class="form-group">
					<?php echo form_label('Business Owner:', 'business_owner', array('class' => 'col-sm-4 control-label')); ?>
					<div class="col-sm-8 padding-left-0">
						<p class="field-values"></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 business-details">
				<div class="form-group">
					<div class="col-sm-8 padding-left-0">
						<p class="field-values">&nbsp;</p>
					</div>
				</div>
			</div>


			<div class="row business">
				<div class="col-md-6">
					<div class="form-group">
						<div class="input-group">
							<input class="form-control business-search" type="text" id="business-search">
							<input type="hidden" name="oid" id="oid"/>
							<span class="input-group-btn">
								<a href="javascript:void(0);" id="search-business" class="btn btn-outline btn-success">
									<i class="fa fa-search"></i> Search
								</a>
							</span>
						</div>
					</div>

					<div id="business-searches" class="form-group">
						<!-- Owner search result -->
						<div class="form search">
							<ul class="list-group businessess search-results"></ul>
						</div>
					</div>

				</div>

				<div class="col-md-1">
					<p>or</p>
				</div>

				<div class="col-md-5">
					<div class="pull-left add-owner">
						<a id="add-new-business" href="javascript:void(0);" class="btn btn-outline btn-info"><i></i> Add New Business</a>
					</div>
				</div>
			</div> <!-- End Row -->

			<!-- New owner form -->
			<div id="business-form" class="container" style="display: none;">
			<br>

				<div class="row">

					<div class="col-md-3">
					<!--h1-->
						<a href="#">
							<!--img src="<?php echo base_url('assets/img/logos/logo_default.jpg'); ?>" alt="Site Logo" /-->
						</a>
					</div>
					<div class="col-md-6">
					<!--/h1-->
						<h5 class="text-center form-title margin-bottom-15"><b>Application Form Business Permit</b></h5>
						<h5 class="text-center form-title margin-bottom-15"><b>TAX YEAR <u><?php echo date ('Y');?> </u></b></h5>
						<h5 class="text-center form-title margin-bottom-15"><b>Municipality of Compostela </b></u></h5>
					</div>
				</div>

				<div class="row">

				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="col-sm-8">
								 <p> <b><span style="color:#F00">*</span> &nbsp;Required Field</b></p>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group" style="text-align:left">
							<?php echo form_label('Permit Number:', 'permit_number', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'permit_number',
									'id' => 'permit_number',
									'class' => 'form-control',
									'value' =>  date('Y').'-',
									'style' => 'font-size: 20px; font-weight: bold'
								)); ?>
							</div>
						</div>
					</div>
				</div>

				<input type="hidden" name="old_buss_id" id="old_buss_id"/>
				<input type="hidden" name="old_permit_number" id="old_permit_number"/>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<?php echo form_label('Application Type:', 'application_id', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
							<span style="color:#F00"><b>*</b></span>
								<?php echo form_dropdown('application_id', $app_type, '', 'class="form-control"'); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Payment Method:', 'payment_id', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
							<span style="color:#F00"><b>*</b></span>
								<?php echo form_dropdown('payment_id', $payment, '', 'class="form-control"'); ?>
							</div>
						</div>
					</div>
					<div class="col-sm-4" style="display:none">
						<div class="form-group">
							<?php echo form_label('Amendment:', 'id', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_dropdown('id', $amendment, '', 'class="form-control"'); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Date of Application:', 'date_applied', array('class' => 'col-sm-4 control-label')); ?>
							<!-- <input type = "text" id="date_applied" class="datepicker"/> -->
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'date_applied',
									'id' => 'date_applied',
									//'value' => date('F j, Y'),
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Notes:', 'reference_no', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'reference_no',
									'id' => 'reference_no',
									'placeholder' => 'Input some notes for the business',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
				<div class = "col-sm-6">
				<div class="form-group">
							<?php echo form_label('Organization Type:', 'ownership_id', array('class' => 'col-sm-4 control-label'));?>
							<div class="col-sm-8">
							<span style="color:#F00"><b>*</b></span>
								<?php echo form_dropdown('ownership_id', $ownership, '', 'class="form-control"'); ?>
							</div>
						</div>
					</div>
					<div class = "col-sm-6">
						<div class="form-group">
							<?php echo form_label('Units:', 'units_no', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
							<span style="color:#F00"><b style="font-size:10px;">Note: For Lessor / Peso Nets only</b></span>
								<?php echo form_input(array(
									'name' => 'units_no',
									'id' => 'units_no',
									'value' => '',
									'placeholder' => 'Units for Lessor / PCs',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
					
			</div>
				<div class="row">
					<div class="col-sm-6">
						
					</div>
					<div class = "col-sm-6">
						<div class="form-group">
							<?php echo form_label('CTC Number:', 'ctc', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
							<span style="color:#F00"><b>*</b></span>
								<?php echo form_input(array(
									'name' => 'ctc',
									'id' => 'ctc',
									'value' => '0',
									'placeholder' => 'CTC Number 0 if none',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
				</div> <!-- End of Row -->

				<div class="row">
					<div class = "col-sm-6">
							<div class="form-group">
								<?php echo form_label('TIN:', 'ctc', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
								<span style="color:#F00"><b>*</b></span>
									<?php echo form_input(array(
										'name' => 'tin',
										'id' => 'tin',
										'value' => '0',
										'placeholder' => 'TIN',
										'class' => 'form-control'
									)); ?>
								</div>
							</div>
						</div>
						<div class = "col-sm-6">
							<div class="form-group">
								<?php echo form_label('Business Plate Number:', 'plate_no', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
								<!--<span style="color:#F00"><b>*</b></span>-->
									<?php echo form_input(array(
										'name' => 'plate_no',
										'id' => 'plate_no',
										'value' => '0',
										'placeholder' => 'Business Plate Number',
										'class' => 'form-control'
									)); ?>
								</div>
							</div>
						</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					  <div class="form-group">
					    <?php echo form_label('DTI#:', 'registrar_number', array('class' => 'col-sm-4 control-label'));
					    //sa db kai registrar account ni xa
					    ?>
					    <div class="col-sm-8">
					      <?php echo form_input(array(
					        'name' => 'dti_no',
					        'id' => 'dti_no',
					        'placeholder' => 'DTI #',
					        'class' => 'form-control'
					      )); ?>
					    </div>
					  </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('DTI Expiration Date:', 'dti_expiration', array('class' => 'col-sm-4 control-label')); ?>
							<!-- <input type = "text" id="date_applied" class="datepicker"/> -->
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'dti_expiration',
									'id' => 'dti_expiration',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					  <div class="form-group">
					    <?php echo form_label('SEC#:', 'sec_no', array('class' => 'col-sm-4 control-label'));
					    //sa db kai registrar account ni xa
					    ?>
					    <div class="col-sm-8">
					      <?php echo form_input(array(
					        'name' => 'sec_no',
					        'id' => 'sec_no',
					        'placeholder' => 'SEC #',
					        'class' => 'form-control'
					      )); ?>
					    </div>
					  </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('SEC Expiration Date:', 'sec_expiration', array('class' => 'col-sm-4 control-label')); ?>
							<!-- <input type = "text" id="date_applied" class="datepicker"/> -->
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'sec_expiration',
									'id' => 'sec_expiration',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					  <div class="form-group">
					    <?php echo form_label('CDA#:', 'cda_no', array('class' => 'col-sm-4 control-label'));
					    //sa db kai registrar account ni xa
					    ?>
					    <div class="col-sm-8">
					      <?php echo form_input(array(
					        'name' => 'cda_no',
					        'id' => 'cda_no',
					        'placeholder' => 'CDA #',
					        'class' => 'form-control'
					      )); ?>
					    </div>
					  </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('CDA Expiration Date:', 'cda_expiration', array('class' => 'col-sm-4 control-label')); ?>
							<!-- <input type = "text" id="date_applied" class="datepicker"/> -->
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'cda_expiration',
									'id' => 'cda_expiration',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class= "col-md-8">
						<div class ="form-group" style="float:left">
							<?php echo form_label('Are you enjoying government tax incentive from any Government Entity   '.
								 'Yes'.form_radio(array (
												'id' => 'govt_incentive',
												'name' => 'govt_incentive',
												'value' => '1'
										)) .
								 ' No'.form_radio(array (
												'id' => 'govt_incentive',
												'name' => 'govt_incentive',
												'value' => '0'
										)), 'govt_incentive', array('class' => 'col-sm-12 control-label'));
							//echo '';
							?>
						</div>
					</div>
					<div class="col-md-4  govt-entity" style="display:none">
						<div class ="form-group">
							<?php echo form_input(array(
								'name' => 'govt_entity',
								'id' => 'govt_entity',
								'placeholder' => 'Please specify the entity',
								'class' => 'form-control'
							)); ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Business Name:', 'business_name', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
							<span style="color:#F00"><b>*</b></span>
								<?php echo form_input(array(
									'name' => 'business_name',
									'id' => 'business_name',
									'placeholder' => 'Business Name',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Tradename/Franchise:', 'trade_name', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'trade_name',
									'id' => 'trade_name',
									'placeholder' => 'Tradename/Franchise',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div> <!-- End of Column -->
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Building Name:', 'bldg_name', array('class' => 'col-sm-4  control-label')); ?>
							<div class="col-sm-8">
							<?php echo form_input(array(
											'name' => 'bldg_name',
											'id' => 'bldg_name',
											'placeholder' => 'Building Name',
											'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
							<?php echo form_label('Sitio Address:', 'street_address2', array('class' => 'col-sm-4  control-label')); ?>
							<div class="col-sm-8">
							<?php echo form_input(array(
											'name' => 'street_address2',
											'id' => 'street_address2',
											'placeholder' => 'Sitio Address',
											'class' => 'form-control'
								)); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo form_label('Purok Address:', 'street_address', array('class' => 'col-sm-4  control-label')); ?>
							<div class="col-sm-8">
							<?php echo form_input(array(
											'name' => 'street_address',
											'id' => 'street_address',
											'placeholder' => 'Purok Address',
											'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Barangay:', 'brgy_id', array('class' => 'col-sm-4  control-label')); ?>
							<div class="col-sm-8">
							<span style="color:#F00"><b>*</b></span>
								<?php echo form_dropdown('brgy_id', $brgy, '', 'class="form-control"'); ?>

								<!-- start of stall -->
								<div class="form-group">
									
										<div class="col-sm-12 lease rental_info123"  style="display:none;">
												<div class="portlet-head" style="font-size: 20px; font-weight: bold">
												<br/>
													Stall Information
												</div>
											<hr/>
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<?php echo form_label('Stall Number:', 'leasor', array('class' => 'col control-label')); ?>
														
														<div class="col" style='padding: 5px 5px;'>
															<select id = 'stall_num' name = 'stall_num' class = 'form-control numstall1'>
															<option class = 'stall_num123' value = ""></option>
																<?php foreach($stallzz as $stalin){
																	echo "<option value = '".$stalin->stall_num."'>".$stalin->stall_num."</option>";
																} ?> 
															</select>
														</div>
														
														
														<!-- <div class="col" style='padding: 5px 5px;'>
															<?php echo form_input(array(
																'name' => 'stall_num',
																'id' => 'stall_num',
																'placeholder' => 'Stall #',
																'type' => 'text',
																'class' => 'form-control numstall'
															)); ?>
														</div> -->
													</div>
												</div> <!-- End of Column -->
												<div class="col-sm-4">
													<div class="form-group">
														<?php echo form_label('Total Area:', 'leasor', array('class' => 'col control-label')); ?>
														<div class="col" style='padding: 5px 5px;'>
															<?php echo form_input(array(
																'name' => 'stall_area',
																'id' => 'stall_area',
																'placeholder' => 'Area',
																'type' => 'text',
																'class' => 'form-control areast',
																'readonly' =>'readonly'
															)); ?>
														</div>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<?php echo form_label('Total Value:', 'leasor', array('class' => 'col control-label')); ?>
														<div class="col" style='padding: 5px 5px;'>
															<?php echo form_input(array(
																'name' => 'stall_val',
																'id' => 'stall_val',
																'placeholder' => 'Value',
																'type' => 'number',
																'class' => 'form-control valuest',
																'readonly' => 'readonly'
															)); ?>
														</div>
													</div>
												</div>
											</div>
										</div><!-- end of stall div -->
									</div>

							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('City/Municipality:', 'brgy_id', array('class' => 'col-sm-4  control-label')); ?>
							<div class="col-sm-8">
							<?php echo form_input(array(
											'name' => 'city',
											'id' => 'city',
											'value' => 'Compostela',
											'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Province:', 'province', array('class' => 'col-sm-4  control-label')); ?>
							<div class="col-sm-8">
							<?php echo form_input(array(
											'name' => 'province',
											'id' => 'province',
											'value' => 'Cebu',
											'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Phone/Fax No:', 'contact_number', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'contact_number',
									'id' => 'contact_number',
									'placeholder' => 'Phone/Fax No',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Email Address:', 'email', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'email',
									'id' => 'email',
									'placeholder' => 'Email Address',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div>
					<div class ="col-md-6">
						<div class="form-group">
								<?php echo form_label('Property Index Number (PIN):', 'pin', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									<?php echo form_input(array(
										'name' => 'pin',
										'id' => 'pin',
										'placeholder' => 'PIN',
										'class' => 'form-control'
									)); ?>
								</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class ="col-md-6">
						<div class="form-group">
							<?php echo form_label('Name of  Authorize Representative/Bookkeeper', 'rep_bookkepr', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									<?php echo form_input(array(
										'name' => 'rep_bookkepr',
										'id' => 'rep_bookkepr',
										'placeholder' => 'Representative/Bookkeeper',
										'class' => 'form-control'
									)); ?>
								</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('Phone Number', 'rep_bookkepr_ph_no', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									<?php echo form_input(array(
										'name' => 'rep_bookkepr_ph_no',
										'id' => 'rep_bookkepr_ph_no',
										'placeholder' => 'Phone Number',
										'class' => 'form-control'
									)); ?>
								</div>
						</div>
					</div>
				</div>
				<div class="portlet-head" style="font-size: 20px; font-weight: bold">
					Employee    <font style="color:red;font-size:12px"></font>
					<!-- Note: </font><font style="font-size:12px">Please be informed that this feature is still under construction.</font> -->
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<?php echo form_label('Male:', 'male', array('class' => 'col-sm-4 control-label')); ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<?php echo form_label('Female:', 'female', array('class' => 'col-sm-4 control-label')); ?>
						</div>
					</div>
					<div class="col-md-4" style="display:none">
						<div class="form-group">
							<?php echo form_label('Total:', 'total', array('class' => 'col-sm-4 control-label')); ?>
						</div>
					</div>
				</div>
				<br>
				<div class="my-form">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 abled_male_estab_field">
								<div class="form-group">
									<?php //echo form_label('Abled Male:', 'abledmale', array('class' => 'col-sm-3 control-label')); ?>
										<?php echo form_input(array(
											'name' => 'abled_male_emp_estab',
											'id' => 'abled_male_emp_estab',
											'placeholder' => 'Abled Male Emp',
											'class' => 'form-control',
											'style' =>'width:100px'
										)); ?><b>Abled Male</b>
								</div>
								<div></div>
							</div> <!-- End of Column -->

								<div class="col-sm-6 abled_female_estab_field">
									<div class="form-group">
									<?php //echo form_label('Abled Female:', 'leasor', array('class' => 'col-sm-3 control-label')); ?>
										<?php echo form_input(array(
											'name' => 'abled_female_emp_estab',
											'id' => 'abled_female_emp_estab',
											'placeholder' => 'Abled Female Emp',
											'class' => 'form-control',
											'style' =>'width:100px'
										)); ?><b>Abled Female</b>
								</div>
							</div> <!-- End of Column -->
							<br>
							<!-- <a class="add-box" href="#">Add More</a> -->
						</div>
						<div class="row">
							<div class="col-sm-6 disabled_male_emp_estab_field">
								<div class="form-group">
									<?php echo form_input(array(
										'name' => 'pwd_male_emp_estab',
										'id' => 'pwd_male_emp_estab',
										'placeholder' => 'PWD Male Emp',
										'class' => 'form-control',
										'style' =>'width:100px'
									)); ?><b>PWD Male</b>
								</div>
							</div> <!-- End of Column -->
							<div class="col-sm-6 disabled_female_emp_estab_field">
								<div class="form-group">
									<?php echo form_input(array(
										'name' => 'pwd_female_emp_estab',
										'id' => 'pwd_female_emp_estab',
										'placeholder' => 'PWD Female Emp',
										'class' => 'form-control',
										'style' =>'width:100px'
									)); ?><b>PWD Female</b>

								</div>
							</div> <!-- End of Column -->
						</div>

					</div>

					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 abled_male_emp_lgu_field">
								<div class="form-group">
									<?php echo form_input(array(
										'name' => 'abled_male_emp_lgu',
										'id' => 'abled_male_emp_lgu',
										'placeholder' => 'Abled Male LGU',
										'class' => 'form-control',
										'style' =>'width:100px'
									)); ?><b>Abled Male LGU</b>

								</div>
							</div> <!-- End of Column -->
							<div class="col-sm-6 abled_female_emp_lgu_field">
								<div class="form-group">
									<?php echo form_input(array(
										'name' => 'abled_female_emp_lgu',
										'id' => 'abled_female_emp_lgu',
										'placeholder' => 'Abled Female LGU',
										'class' => 'form-control',
										'style' =>'width:100px'
									)); ?><b>Abled Female LGU</b>
								</div>
							</div> <!-- End of Column -->
						</div>
					</div>

					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 disabled_male_emp_lgu_field">
								<div class="form-group">
									<?php echo form_input(array(
										'name' => 'pwd_male_emp_lgu',
										'id' => 'pwd_male_emp_lgu',
										'placeholder' => 'PWD Male LGU',
										'class' => 'form-control',
										'style' =>'width:100px'
									)); ?><b>PWD Male LGU</b>

								</div>
							</div> <!-- End of Column -->
							<div class="col-sm-6 disabled_female_emp_lgu_field">
								<div class="form-group">
									<?php echo form_input(array(
										'name' => 'pwd_female_emp_lgu',
										'id' => 'pwd_female_emp_lgu',
										'placeholder' => 'PWD Female LGU',
										'class' => 'form-control',
										'style' =>'width:100px'
									)); ?><b>PWD Female LGU</b>
								</div>
							</div> <!-- End of Column -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Occupancy Type:', 'occupancy_id', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
								<!-- <span style="color:#F00"><b>*</b></span> -->
									<?php echo form_dropdown('occupancy_id', $occupancy, '', 'class="form-control"'); ?>
								</div>
							</div>
						</div> <!-- End of Column -->
					</div>
				</div> <!-- End of myForm -->

				<div class="row" style="display:none">
					<div class="col-sm-4">
						<div class="form-group">
							<?php //echo form_label('Leasor\'s Name:', 'leasor', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-6">
								<?php echo form_input(array(
									'name' => 'pwd_male_emp',
									'id' => 'pwd_male_emp',
									'placeholder' => 'PWD Male Emp',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div> <!-- End of Column -->
					<div class="col-sm-4">
						<div class="form-group">
							<?php //echo form_label('Leasor\'s Name:', 'leasor', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-6">
								<?php echo form_input(array(
									'name' => 'pwd_female_emp',
									'id' => 'pwd_female_emp',
									'placeholder' => 'PWD Female Emp',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>
					</div> <!-- End of Column -->
					<div class="col-sm-4">
						<div class="form-group">
							<?php //echo form_label('Leasor\'s Name:', 'leasor', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-6">
								<?php /*  echo form_input(array(
									'name' => 'total_female_emp',
									'id' => 'total_female_emp',
									'placeholder' => 'Total PWD emp',
									'class' => 'form-control',
									'readonly' => 'readonly'
								));  */?>
							</div>
						</div>
					</div> <!-- End of Column -->
				</div>


				<!-- <div class="row">
					<div class= "col-md-8">
						<div class ="form-group" style="float:left">
							<?php echo form_label('Has   '.
								 'Yes'.form_radio(array (
												'id' => 'govt_incentive',
												'name' => 'govt_incentive',
												'value' => '1'
										)) .
								 ' No'.form_radio(array (
												'id' => 'govt_incentive',
												'name' => 'govt_incentive',
												'value' => '0'
										)), 'govt_incentive', array('class' => 'col-sm-12 control-label'));
							//echo '';
							?>
						</div>
					</div>
				</div> -->
				<br>
				<div class="col-sm-12 property_info" style="display:none">
					<div class="portlet-head" style="font-size: 20px; font-weight: bold">
							Please identify the following
					</div>
					<br>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
							<span style="color:#F00"><b>*</b></span>
								<div class="col-sm-8">
									<?php
									$bldg=array('id'=>'1','name'=>'property', 'value'=>'1');
									$lot=array('id'=>'2','name'=>'property', 'value'=>'2');
									$mach=array('id'=>'3','name'=>'property', 'value'=>'3');
									echo form_radio($bldg)." Bldg ".form_radio($lot)." Lot".form_radio($mach)." Machineries " ."<br>";
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			   <!--Rental Info-->
					<div class="col-sm-12 lease rental_info"  style="display:none">
						<div class="portlet-head" style="font-size: 20px; font-weight: bold">
							Rent Information
						</div>
					<hr/>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<?php //echo form_label('Leasor\'s Name:', 'leasor', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php echo form_input(array(
											'name' => 'lessor_name',
											'id' => 'lessor_name',
											'placeholder' => 'Lessor\'s Name',
											'class' => 'form-control'
										)); ?>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="col-sm-8">
										<?php echo form_input(array(
											'name' => 'Address',
											'id' => 'address',
											'placeholder' => 'Address',
											'class' => 'form-control'
										)); ?>
									</div>
								</div>
							</div>

						</div> <!-- End of Column -->

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="col-sm-8 input-group">
								<span class="input-group-addon">₱</span>
									<?php echo form_input(array(
										'name' => 'rental_fee',
										'id' => 'rental_fee',
										'placeholder' => 'Rental Fee',
										'class' => 'form-control'
									)); ?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<?php //echo form_label('Tel #:', 'leasor_tel_no', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
									<?php echo form_input(array(
										'name' => 'lessor_tel_no',
										'id' => 'lessor_tel_no',
										'placeholder' => 'Tel #',
										'class' => 'form-control'
									)); ?>
								</div>
							</div>
						</div> <!-- End of Column -->
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="col-sm-8">
									<?php echo form_input(array(
										'name' => 'email_add',
										'id' => 'email_add',
										'placeholder' => 'Email Add',
										'class' => 'form-control'
									)); ?>
								</div>
							</div>
						</div> <!-- End of Column -->
					</div> <!-- End of Row -->
					<hr>
					</div>
				</div>
				<!--End of Rental Info-->
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group" style="display:none">
							<?php echo form_label('TIN:', 'tin', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'tin',
									'id' => 'tin',
									'placeholder' => 'TIN',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>

						<div class="form-group" style="display:none">
							<?php echo form_label('PIN:', 'pin', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'pin',
									'id' => 'pin',
									'placeholder' => 'PIN',
									'class' => 'form-control'
								)); ?>
							</div>
						</div>

					</div> <!-- End of Column -->
				</div> <!-- End of Row -->

				<!-- <div class="row address" style="display:none">
					<div class="col-sm-12">
						<div class="form-group">
							<?php echo form_label('Business Address:', 'street_address', array('class' => 'col-sm-2 control-label')); ?>
							<div class="col-sm-10">
								<?php echo form_textarea(array(
											'name' => 'street_address',
											'rows' => 2,
											'id' => 'street_address',
											'placeholder' => 'Business Address (House no./Bldg no., Building name, Unit no., Street, Barangay, Subdivision,Municipality/City, Province)',
											'class' => 'form-control'
											), ''); ?>
							</div>
						</div>
					</div>
				</div>				 -->
			</div> <!-- End of Step1 -->
		</div> <!-- End of Modal body -->

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
				<img class="loader margin-lr-10" style="display: none" src="<?php  echo base_url('assets/img/ajax-loader.gif'); ?>">
				<?php echo form_submit(array('value' => 'Save and Continue', 'class' => 'btn btn-outline btn-info')); ?>
			</div>
		</div>
	</div>
<?php echo form_close(); ?>
