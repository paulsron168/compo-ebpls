<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading">
	    			<h1>TEMPORARY PERMIT REPORT</h1>
	    		</div>
	    		<div class="panel-body">
	    			<div class="row">
	    				<div id="printthis">
							<table id="business_report" class="table table-striped table-bordered table-hover thistable"
								data-display-rows="10"
								data-info="false"
								data-search="false"
								data-length-change="false"
								data-paginate="false"
							>
								<thead>
									<tr>
										<th>No</th>
										<th>Business Name</th>
										<th>Taxpayer</th>
										<th>Business Address</th>
										<th>Application Type</th>
										<th>Payment</th>
										<th>Expiry Date</th>
										<th>Expired?</th>
									
									</tr>
								</thead>
								<tbody>
									<?php $i=1; 
										foreach($result as $r){?>
											<tr>
											<?php $fa = $r->requirements.','.$r->na_requirements; $fas = explode(',',$fa); sort($fas); $reqss = implode(',',$fas); 
											
											if($reqss=="1,2,3,4,5,6,7,8,9,10,11"){

											}else{

						
											?>
												<td><?php echo $i; ?></td>
												<td><?php echo $r->business_name?></td>
												<td><?php echo $r->firstname .' ' .$r->middlename . ' '. $r->lastname;?></td>
												<td><?php echo $r->brgy?></td>
												<td><?php 
												if($r->application_id==1){echo "New";}
												if($r->application_id==2){echo "Renew";}
												?></td>
												<td><?php echo date('F d, Y', strtotime($r->payment_date));?></td>
												<td><?php $newdate = strtotime ( '+1 month' , strtotime ( date( $r->payment_date) ) ) ;
												$newdate = date ( 'F d, Y' , $newdate );

												echo $newdate;?></td>
												
												<td><?php 
												$date1=date_create($newdate);
												$date2=date_create(date('F d, Y')); 
												$diffDate = date_diff($date2,$date1); $day = $diffDate->format("%r%m%d"); if($day<0){echo '<button class="btn btn-danger">Yes</button>';}else{echo '<button class="btn btn-primary">No</button>';}?></td>
												
												
											</tr>
									<?php $i++; }?>
									<?php  }?>
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
