<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<style type="text/css">
	.forth{
		  color: #000;
		  font-weight: 600;
		  border: 1px solid #3a3a3a;
		 /* background-color: #444;*/
		  border-bottom-width: 2px;
	}
</style>
<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading"><h1>DTI REPORT</h1></div>
	    		<div class="panel-body">
	    			<div class="row">
	    				<div id="pr(int)this" >
						<table style="font-size:9px" id="business_report_dti" class="table table-striped table-bordered table-hover" 
							data-provide="datatable" 
							data-display-rows="10"
							data-info="false"
							data-search="false"
							data-length-change="false"
							data-paginate="false"
						>
							<thead>
								<tr>
									<th style="font-size:11px" rowspan="2" align="center">No</th>
									<th style="font-size:11px" rowspan="2" align="center">Business Name</th>
									<th style="font-size:11px" rowspan="2" align="center">Nature of Business</th>
									<th style="font-size:11px" rowspan="2" align="center">Business Address</th>	
									<th style="font-size:11px" colspan="3" align="center">OWNER'S PROFILE</th>
									<th style="font-size:11px" align="center">CONTACT DETAILS</th>
									<th style="font-size:11px" rowspan="2" align="center">Date of Registration</th>
									<th style="font-size:11px" rowspan="2" align="center">No. Of Years/ Months</th>
									<th style="font-size:11px" rowspan="2" align="center">Gross<br>Sales/Capitalization</th>
									<th style="font-size:11px" colspan="2" align="center">No. Of Employees</th>
								</tr>
								<tr>
									<td style="font-size:9px" rowspan="3" align="center" class="forth">Name of Business Owner</td>
									<td style="font-size:9px" rowspan="3" align="center"  class="forth">Gender</td>
									<td style="font-size:9px" align="center"  class="forth">Identify if Owner is:<br>
										ABLED/PWD/INDIGENOUS PERSON</br>
									</td>
									<td style="font-size:9px" align="center"  class="forth">Telephone,Fax<br>
										#,Mobile,Email-Add
									</td>
									<td style="font-size:9px" align="center"  class="forth">Male</td>
									<td style="font-size:9px" align="center"  class="forth">Female</td>
									
								</tr>
							</thead>
							<tbody>
								<?php $i=1; 
									foreach($result as $r){
									$tot_employee  = 0;
									$male_emp = 0;
									$female_emp = 0;
								?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $r->business_name?></td>
												<td><?php echo $r->business_nature;?></td>
												<td><?php echo $r->street_address?></td>
												<td><?php echo $r->firstname .' ' .$r->middlename . ' '. $r->lastname;?></td>
													<?php 
													if($r->gender=="M"){
												?>
													<td><?php echo 'Male'; ?></td>
												<?php 
													}else if($r->gender=="F"){
												?>
													<td><?php echo 'Female'; ?></td>
												<?php
													} else {
												?>

													<td><?php echo '__'; ?></td>
												<?php
													}
												?>
												<td><?php echo $r->contact_number. '' .$r->mobile_number?></td>
												<td><?php echo $r->capital;?></td>
												<!-- <td><?php echo date('m-d-Y',strtotime($r->date_applied))?></td> -->
												<td><?php echo $r->date_applied?></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
									<?php $i++; }?>
							</tbody>
						</table>
					</div>
	    			</div>
				<br>
				<br>					
	    		</div>
	    		<div class="panel-footer">
	    		</div>
	    	</div>
	    </div>
	</div>
</div>