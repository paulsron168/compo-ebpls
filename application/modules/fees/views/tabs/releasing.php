<div class="tab-pane fade in no-print" id="releasing">
	<div class="portlet">
		<div class="portlet-header">
			<ul class="portlet-tools pull-left">
				<h3><i class="fa fa-table"></i> For Release</h3>
			</ul>
		</div>
		<div class="portlet-content" id="payment_page">
			<table id="for-releasing" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable" 				
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
			>
				<thead>
					<tr>
						<th class="text-center">Permit Number</th>						
						<th class="text-center">Business Owner</th>
						<th class="text-center">Business Name</th>
						<th class="text-center">OR Number</th>
						<th class="text-center" width="5%">Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						
					foreach ($for_release->result() as $r ) {
						
						?>
						<tr>
						<?php $fa = $r->requirements.','.$r->na_requirements; $fas = explode(',',$fa); sort($fas); $reqss = implode(',',$fas);	?>
							<td><?php echo $r->permit_number?></td>							
							<?php if ($r->ownership_id == "1"){ ?>
								<td>									
									<?php echo wordwrap(ucfirst($r->firstname). ' '.ucfirst($r->middlename).' '.ucfirst($r->lastname),24,'<br>'); ?>
									
								</td>
								<?php } else {?>
								<td>								
									<?php echo wordwrap($r->permitee != "N/A" ? ucfirst($r->permitee) : ucfirst($r->firstname). ' '.ucfirst($r->middlename).' '.ucfirst($r->lastname),24,'<br>'); ; ?>
								</td>
								<?php } ?>
							<td><?php echo $r->business_name;?></td>
							<td><?php echo $r->or_number;?></td>

							<?php if ($r->is_released=="Y") { ?>
								<td style="text-align:center">
								<?php if($reqss=="1,2,3,4,5,6,7,8,9,10,11"){?>	
										<button class="btn btn-xs btn-default"><i class="fa fa-check"></i></button>		
								<?php } else {?>
									<?php $date1=date_create($r->payment_date);
											$date2=date_create(date('F d, Y')); 
											$diffDate = date_diff($date2,$date1); $day = $diffDate->format("%r%m%d"); if($day<0){echo '<button class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';}else{echo '<button class="btn btn-xs btn-default"><i class="fa fa-check"></i></button>';}
									?>
								<?php } ?>
							</td>			
							<?php } else {	?> 
							<td style="text-align:center">
								<?php if($reqss=="1,2,3,4,5,6,7,8,9,10,11"){?>	
										<button class="btn btn-xs btn-default"><i class="fa fa-check"></i></button>		
								<?php } else {?>
									<?php $date1=date_create($r->payment_date);
											$date2=date_create(date('F d, Y')); 
											$diffDate = date_diff($date2,$date1); $day = $diffDate->format("%r%m%d"); if($day<0){echo '<button class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';}else{echo '<button class="btn btn-xs btn-default"><i class="fa fa-check"></i></button>';}
									?>
								<?php } ?>
							</td>
								<?php }?>
				
							
								<?php if ($r->is_released=="Y") { ?>
									<td>
								<?php if($reqss=="1,2,3,4,5,6,7,8,9,10,11"){
									
									if(stripos($r->permit_number, 'MP') !== false){?>	
										<a class="btn btn-danger btn-xs btn-block print-permit"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->pay_id;?>" href="<?php echo 	base_url('fees/release_mayorpermit/'.$r->pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Mayor's Permit</a>

									<?php } else if($r->closed=="1"){	?>
											<a class="btn btn-primary btn-xs btn-block print-retire"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->retire_pay_id;?>" href="<?php echo 	base_url('fees/release_retirementcert/'.$r->retire_pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Treasury Copy</a>
											<a class="btn btn-primary btn-xs btn-block print-retire"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->retire_pay_id;?>" href="<?php echo 	base_url('fees/release_retirementcert2/'.$r->retire_pay_id);?>"  target="_blank"><i class="fa fa-print"></i> BPLO Copy</a>	

									<?php }else {?>	
											<a class="btn btn-danger btn-xs btn-block print-permit"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->pay_id;?>" href="<?php echo 	base_url('fees/release/'.$r->pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Owners Copy</a>								
									<?php } ?>			
								<?php } else {?>
										<?php if($r->closed=="1"){	?>
											<a class="btn btn-primary btn-xs btn-block print-retire"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->retire_pay_id;?>" href="<?php echo 	base_url('fees/release_retirementcert/'.$r->retire_pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Treasury Copy</a>
											<a class="btn btn-primary btn-xs btn-block print-retire"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->retire_pay_id;?>" href="<?php echo 	base_url('fees/release_retirementcert2/'.$r->retire_pay_id);?>"  target="_blank"><i class="fa fa-print"></i> BPLO Copy</a>	
										<?php }else {?>	
											<a class="btn btn-warning btn-xs btn-block print-permit"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->pay_id;?>" href="<?php echo 	base_url('fees/release_temp/'.$r->pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Temporary Copy</a>									
										<?php } ?>		
								<?php } ?>
								
							</td>
							<?php } else {	?> 
							<td>
								<?php if($reqss=="1,2,3,4,5,6,7,8,9,10,11"){						
									if(stripos($r->permit_number, 'MP') !== false){?>	
										<a class="btn btn-danger btn-xs btn-block print-permit"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->pay_id;?>" href="<?php echo 	base_url('fees/release_mayorpermit/'.$r->pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Mayor's Permit</a>

									<?php } else if($r->closed=="1"){	?>
										<a class="btn btn-primary btn-xs btn-block print-retire"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->retire_pay_id;?>" href="<?php echo 	base_url('fees/release_retirementcert/'.$r->retire_pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Treasury Copy</a>
											<a class="btn btn-primary btn-xs btn-block print-retire"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->retire_pay_id;?>" href="<?php echo 	base_url('fees/release_retirementcert2/'.$r->retire_pay_id);?>"  target="_blank"><i class="fa fa-print"></i> BPLO Copy</a>	
									<?php }else {?>	
											<a class="btn btn-danger btn-xs btn-block print-permit"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->pay_id;?>" href="<?php echo 	base_url('fees/release/'.$r->pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Owners Copy</a>								
									<?php } ?>			
								<?php } else {?>
										<?php if($r->closed=="1"){	?>
											<a class="btn btn-primary btn-xs btn-block print-retire"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->retire_pay_id;?>" href="<?php echo 	base_url('fees/release_retirementcert/'.$r->retire_pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Treasury Copy</a>
											<a class="btn btn-primary btn-xs btn-block print-retire"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->retire_pay_id;?>" href="<?php echo 	base_url('fees/release_retirementcert2/'.$r->retire_pay_id);?>"  target="_blank"><i class="fa fa-print"></i> BPLO Copy</a>		
										<?php }else {?>	
											<a class="btn btn-warning btn-xs btn-block print-permit"  data-releasingid="<?php echo $r->releasing_id?>" data-payid="<?php echo $r->pay_id;?>" href="<?php echo 	base_url('fees/release_temp/'.$r->pay_id);?>"  target="_blank"><i class="fa fa-print"></i> Temporary Copy</a>									
								<?php } ?>
								<?php } ?>
							</td>
								<?php }?>
						</tr>
					<?php  } ?>
				</tbody>
			</table>			
		</div>		
	</div> <!-- End of Portlet Content -->
</div> <!-- End of Portlet -->

	
<!-- Start of Payment Info -->
	<div class="col-md-12" id="payment_info" style="display: none;">
		<div class="col-md-12" style="background: #CD5C5C; font-weight: bold;">
			<p class="text-center">Transaction Information</p>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<?php echo form_label('Trans Type:', 'trans_type', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="trans_type">			
					</div>		
			
				<?php echo form_label('Payment Type:', 'pay_type', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="pay_type">			
					</div>
			
				<?php echo form_label('Payment Status:', 'pay_status', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="pay_status">							
					</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?php echo form_label('Name:', 'owner', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="owner">			
					</div>					
				<?php echo form_label('Address:', 'address', array('class' => 'col-sm-2 control-label')); ?>
				<div id="address" class="col-sm-1">			
				</div>
				<br>				
				<br>
			</div>
		</div>		
				<?php echo form_label('Phone #:', 'telno', array('class' => 'col-sm-2 control-label')); ?>
				<div class="col-sm-1" id="telno"></div>
				<br>
				<?php echo form_label('Business Name:', 'buss_name', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="buss_name">			
					</div>	
				
				<?php echo form_label('Address:', 'address', array('class' => 'col-sm-2 control-label')); ?>
				<div class="col-sm-1" id="buss_add">			
				</div>					
	</div>		
<!-- End of Payment Info -->