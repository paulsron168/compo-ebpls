<div id="retire" class="modal modal-styled fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Retire Business</h3>
			</div>
			<?php echo form_open('', array('class' => 'form form-horizontal retire')); ?>
			<div class="modal-body" id="t">
			
				<h5 style="text-align:center">Republic of the Philippines</h5>
				<h5 style="text-align:center">Province of Cebu</h5>
				<h5 style="text-align:center">Municipality of Compostela</h5><br>


				<h5 style="text-align:center"><b> APPLICATION FOR RETIREMENT/TERMINATION OF BUSINESS</b></h5>
	
				<br>

				<p>
<!-- 											
											Business Name: <strong><span class="business-name"></span></strong><br />
											Business Address: <strong><span class="business-add"></span></strong><br />
											Owner's Name: <strong><span class="owner-name"></span></strong><br />
											Owner's Address: <strong><span class="owner-add"></span></strong>
											 -->
								
										</p>

										<input type="hidden" name="buss_id" id="buss_id" readonly>
				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<?php echo form_label('Owners Name:', '', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'owner_name',
									'id' => 'owner_name',
									'class' => 'form-control'
								)); ?>
								</div>
							</div>
						</div>
					<div class="col-sm-6">
						<div class="form-group">
							<?php echo form_label('Name of Establishment:', '', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
							<?php echo form_input(array(
								'name' => 'business_name',
								'id' => 'business_name',
								'class' => 'form-control'
							)); ?>
							</div>
						</div>
					</div>

					
				</div>
				
				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<?php echo form_label('Business Address:', '', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'business_address',
									'id' => 'business_address',
									'class' => 'form-control'
								)); ?>
								</div>
							</div>
						</div>

					<div class="col-sm-6">
						<div class="form-group">
							<?php echo form_label('Stall No. for Market Vendors:', '', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
							<?php echo form_input(array(
								'name' => 'stall_no',
								'id' => 'stall_no',
								'class' => 'form-control'
							)); ?>
							</div>
						</div>
					</div>
			
				
				</div>
				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<?php echo form_label('Nature of Business (to be retired):', '', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'nature_retired',
									'id' => 'nature_retired',
									'class' => 'form-control'
								)); ?>
								</div>
							</div>
						</div>

					<div class="col-sm-6">
						<div class="form-group">
							<?php echo form_label('Type of Retirement:', '', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
										<?php 
										$levelid= array(
												'1'=>'Permanent',
												'2'=>'Partial',
											);
										echo form_dropdown('typeof_retire', $levelid, '', 'class="form-control"');?>
							</div>
						</div>
					</div>
			
				
				</div>
				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<?php echo form_label('Business Permit No:', '', array('class' => 'col-sm-4 control-label')); ?>
								<div class="col-sm-8">
								<?php echo form_input(array(
									'name' => 'permit_no',
									'id' => 'permit_no',
									'class' => 'form-control'
								)); ?>
								</div>
							</div>
						</div>

					<div class="col-sm-6">
						<div class="form-group">
							<?php echo form_label('No. of Employees:', '', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
							<?php echo form_input(array(
								'name' => 'employees',
								'id' => 'employees',
								'class' => 'form-control'
							)); ?>
							</div>
						</div>
					</div>
			
				
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<?php echo form_label('Date Filed:', '', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
							<?php echo form_input(array(
								'name' => 'date_filed',
								'id' => 'date_filed',
								'class' => 'form-control',
								'value' => date("m/d/Y")
							)); ?>
							</div>
						</div>
					</div>
				<div class="col-sm-6">
					<table class="retiree" >
							<tbody><b>Gross By Business Nature:</b></tbody>
					</table>
						<!-- <input type="hidden" id="ggross" name="gross"> -->
						</div>
					</div>
				</div>
			
			
				<!-- <div class="row">
					<div class="col-sm-8"></div>
					<div class="col-sm-4">
					______________________________________________<br>
						Signature of Applicant over Printed Name
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-sm-6">
					_________________________________________<br>
					 		<span style="align=center">Inspector</span><br>
					 		(Signature over Printed Name)
					</div>
					<div class="col-sm-6">
						<?php echo form_label('Findings:', '', array('class' => 'col-sm-4 control-label')); ?><br>
							_________________________________<br>
						<span style="padding-left:192px;">_________________________________</span><br>
						<span style="padding-left:192px;">_________________________________</span><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8"></div>
					<div class="col-sm-2">
						<div class="form-group">
							<?php echo form_label('Date:', '', array('class' => 'col-sm-4 control-label')); ?>
							<div class="col-sm-8">
								<?php echo form_input(array(
									  'name' =>'date_end',
									  'id'	=>'date_end',
									  'class' =>'form-control'
								))?>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-7"></div>
					<div class="col-sm-5">
						Recommended for Approval:
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-sm-7"></div>
					<div class="col-sm-5">
						<?php
							
							$name = (strlen($settings[1]->middleName) > 1) ? '-' : '. ';		
							echo '<u><b>'.$settings[1]->firstName. ' '.$settings[1]->middleName.$name.$settings[1]->lastName.'</b></u>';
						?><br>
						<?php echo $settings[1]->designation;?>
					</div>
				</div>
				<br><br><br>
				<div class="row">
					<div class="col-sm-7"></div>
					<div class="col-sm-5">
						Approved:
					</div>
				</div>
				<div class="row">
					<div class="col-sm-7"></div>
					<div class="col-sm-5">
						<?php
							
							$name = (strlen($settings[0]->middleName) > 1) ? '-' : '. ';		
							echo '<u><b>'.$settings[0]->firstName. ' '.$settings[0]->middleName.$name.$settings[0]->lastName.'</b></u>';
						?><br>
						<?php echo $settings[0]->designation;?>
					</div>
				</div> -->
			</div>
			
			<div class="hidden-fields">
				
				
			</div>
			<div class="modal-footer">
				<div class="submit-btn inline-block">
					<b style="color:red;font-size:12px">Note: </b><font style="font-size:12px">Business Retirement will cancel the owner's right to have a business. <b>Are you sure?</b>&nbsp;&nbsp;</font>
					<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
					<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-outline btn-info ')); ?>
					<!-- <a href="#" class="btn btn-outline btn-success print-terminate" onclick="PrintTerminate('t');"><i class="fa fa-print"></i> Print</a>				 -->

				</div>
			</div>
			<?php echo form_close(); ?>							
		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->