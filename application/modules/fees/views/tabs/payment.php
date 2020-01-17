<div class="tab-pane fade in" id="payment">
	<div class="portlet">
		<div class="portlet-header">
			<ul class="portlet-tools pull-left">
				<h3><i class="fa fa-table"></i>Assessed Business</h3>
			</ul>
		</div>
		<div class="portlet-content">
			<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable"
				 data-display-rows="10" data-info="true" data-search="true"
				data-length-change="true" data-paginate="true" id="business-payment"
				aria-describedby="business-payment_info">
				<thead>
					<tr>
						<th class="text-center">Permit Number</th>
						<th class="text-center">Business Owner</th>
						<th class="text-center">Business Name</th>
						<th class="text-center">Assessment Date</th>
						<th class="text-center">Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($for_payment->result() as $details) {
					?>
					<tr> 
						<td><?php echo $details->permit_number;?></td>
						<?php if ($details->ownership_id=="1"){ ?>
							<td>
								<?php echo wordwrap(ucfirst($details->firstname). ' '.ucfirst($details->middlename).' '.ucfirst($details->lastname),24,'<br>'); ?>								
							</td>
							<?php } else { //echo $details->permitee; ?>
							<td>
								<?php //echo wordwrap($details->permitee != "N/A" ? ucfirst($details->permitee) : ucfirst($details->firstname). ' '.ucfirst($details->middlename).' '.ucfirst($details->lastname),24,'<br>'); ; 
										echo  wordwrap( ucfirst($details->firstname). ' '.ucfirst($details->middlename).' '.ucfirst($details->lastname),24,'<br>');
									?>
							</td>
							<?php } ?>
						<td><?php echo $details->business_name;?></td>
						<td><?php echo date('F d, Y', strtotime($details->assessment_date))?></td>						
						<td><?php 
					$expire1 = '01/20/'.substr($details->permit_number,0,4).'';
					$expire2 = '04/20/'.substr($details->permit_number,0,4).'';
					$expire3 = '07/20/'.substr($details->permit_number,0,4).'';
					$expire4 = '10/20/'.substr($details->permit_number,0,4).'';
					if($details->count==1 && $details->payment_modes=="Annual"){
						echo "Paid Annually";
					} else if($details->payment_modes=="Bi-Annual"){
						
						if(stripos($details->count,'1')!==false){
							echo "1st Bi-Annual Paid <br>";
						}else{
							if(stripos($details->count,'1')==false){
								if(strtotime('now')>strtotime($expire1)){
									echo "<b style='color:red'>1st Bi-Annual Delinquent</b> <br>";
								}else{
									echo "<i style='color:red'>1st Bi-Annual Not Paid</i> <br>";
								}
								
							}
						}

						if(stripos($details->count,'2')!==false){
							echo "2nd Bi-Annual Paid";
						}else{
							if(stripos($details->count,'2')==false){
								if(strtotime('now')>strtotime($expire3)){
									echo "<b style='color:red'>2nd Bi-Annual Delinquent</b> <br>";
								}else{
									echo "<i style='color:red'>2nd Bi-Annual Not Paid</i> <br>";
								}
								
							}
						}
					}else if($details->payment_modes=="Quarterly"){
										
						if(stripos($details->count,'1')!==false){
							echo "1st Quarter Paid <br>";	
						} else{
							if(stripos($details->count,'1')==false){
								if(strtotime('now')>strtotime($expire1)){
									echo "<b style='color:red'>1st Quarter Delinquent</b> <br>";
								}else{
									echo "<i style='color:red'>1st Quarter Not Paid</i> <br>";
								}
								
							}
						}
						
						if(stripos($details->count,'2')!==false){
							echo "2nd Quarter Paid <br>";
						} else{
							if(stripos($details->count,'2')==false){
								if(strtotime('now')>strtotime($expire2)){
									echo "<b style='color:red'>2nd Quarter Delinquent</b> <br>";
								}else{
									echo "<i style='color:red'>2nd Quarter Not Paid</i> <br>";
								}
							}
						}
						if(stripos($details->count,'3')!==false){
							echo "3rd Quarter Paid <br>";
						}else{
							if(stripos($details->count,'3')==false){
								if(strtotime('now')>strtotime($expire3)){
									echo "<b style='color:red'>3rd Quarter Delinquent</b> <br>";
								}else{
									echo "<i style='color:red'>3rd Quarter Not Paid</i> <br>";
								}
							}
						}

						if(stripos($details->count,'4')!==false){
							echo "4th Quarter Paid";
						}else{
							if(stripos($details->count,'4')==false){
								if(strtotime('now')>strtotime($expire4)){
									echo "<b style='color:red'>4th Quarter Delinquent</b> <br>";
								}else{
									echo "<i style='color:red'>4th Quarter Not Paid</i> <br>";
								}
							}
						}
					}else{
						if(strtotime('now')>strtotime($expire1)){
							echo "<b><i style='color:red'>Annual Delinquent</i></b> <br>";
						}else{
							echo "<i style='color:red'>Not yet paid</i> <br>";
						}
					
					}
					?></td>
							<?php 
								if ($details->status == "unpaid"){
							?>
								<td>
									<a href="#"  class="btn btn-primary btn-xs selectpayer" 
									data-assessmentid="<?php echo $details->assessment_id; ?>" 
									data-ownerid="<?php echo $details->owner_id ?>" 
									data-businessid="<?php echo $details->buss_id;?> ">
									<i class="fa fa-credit-card"></i> Pay Now</a>
									<a href="#"  class="btn btn-danger btn-xs reassessment" 
									data-assessmentid="<?php echo $details->assessment_id; ?>" 
									data-ownerid="<?php echo $details->owner_id ?>" 
									data-businessid="<?php echo $details->buss_id;?> ">
									<i class="fa fa-repeat"></i> Reassess</a>

									<?php if($details->closed == 1){ 
											if(empty($details->pay_id)){?>
												<br/>
												<a href="#" class="btn btn-danger btn-xs retire_pay" style = 'margin-top: 3px;' data-appid="<?php echo $details->app_id; ?>"><i class="fa fa-credit-card"></i> PAY CANCEL</a>
									<?php 	} else{ 	?>
												<br/>
												<a href="#" class="btn btn-success btn-xs retire_pay" disabled="disabled" style = 'margin-top: 3px;' data-appid="<?php echo $details->app_id; ?>"><i class="fa fa-check"></i> Cancel Paid</a>
									<?php 	}  }else{ } ?>
									
									<?php if(empty($details->stall_num)) { }else { ?>
										<br/>
										<a href="#" class="btn btn-info btn-xs pay_stall" style = 'margin-top: 3px;' data-appid="<?php echo $details->app_id; ?>"><i class="fa fa-credit-card"></i> PAY STALL</a>
									<?php }?>

									</td>
							<?php	} else {
							?>
								<td>
									<a href="#"  class="btn btn-warning btn-xs selectpayer"  disabled="disabled"  
									data-assessmentid="<?php echo $details->assessment_id; ?>" 
									data-ownerid="<?php echo $details->owner_id ?>"
									data-businessid="<?php echo $details->buss_id; ?>"><i class="fa fa-check"></i> Already Paid</a>
									

									<?php if($details->closed == 1){ 
											if(empty($details->pay_id)){?>
												<br/>
												<a href="#" class="btn btn-danger btn-xs retire_pay"  style = 'margin-top: 3px;' data-appid="<?php echo $details->app_id; ?>"><i class="fa fa-credit-card"></i> PAY CANCEL</a>
									<?php 	} else{ 	?>
												<br/>
												<a href="#" class="btn btn-success btn-xs retire_pay" disabled="disabled" style = 'margin-top: 3px;' data-appid="<?php echo $details->app_id; ?>"><i class="fa fa-check"></i> Cancel Paid</a>
									<?php 	}  }else{ } ?>

									<?php if(empty($details->stall_num)) { }else { ?>
										<br/>
										<a href="#" class="btn btn-info btn-xs pay_stall" style = 'margin-top: 3px;' data-appid="<?php echo $details->app_id; ?>"><i class="fa fa-credit-card"></i> PAY STALL</a>
									<?php }?>
									</td>
							<?php } ?>
					</tr>
					<?php  } ?>
				</tbody>
			</table>			
		</div>		
		</div> <!-- End of Portlet Content -->
	</div> <!-- End of Portlet -->
	