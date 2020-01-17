<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<style type="text/css">
	.forth{
		  color: #000;
		  font-weight: 600;
		  border: 1px solid #3a3a3a;
		 /* background-color: #444;*/
		  border-bottom-width: 2px;
	}
	.t_amount{
		float: right;
		margin-right:200px;
	}
</style>
<img src="<?php echo base_url('assets/img/logos/logo2.png'); ?>" width="120" heigth="120" style="position:absolute;margin-left:15%;margin-top:0%;">
</head>
<body>
<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	   
			<?php foreach($result as $r){ }?>
			<center><span class='' style="font-size:16px;text-align:center;">Republic of the Philippines</span><br>
					<span class='' style="font-size:16px;text-align:center;">Province of Cebu</span><br>
					<span class="" style="font-size:16px;text-align:center;">MUNICIPALITY OF ALEGRIA</span><br>
		
			<h5 style="font-weight:bold">LIST OF DELIQUENCIES</h5>
			<h5 style="font-weight:bold">As of <?php echo date('F d, ');echo substr($r->permit_number,0,4)?></h5></center>
			</center>
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
									<th style="font-size:11px" rowspan="3" align="center"><center><font size="3">Business Permit No.</th>
									<th style="font-size:11px" rowspan="3" align="center"><center><font size="3">Owner's Name</th>
									<th style="font-size:11px" rowspan="3" align="center"><center><font size="3">Business Name</th>
									<th style="font-size:11px" rowspan="3" align="center"><center><font size="3">Delinquency</th>
									<th style="font-size:11px" rowspan="3" align="center"><center><font size="3">Business Address</th>	
									<th style="font-size:11px" rowspan="3" align="center"><center><font size="3">Action</th>	
									
									
								</tr>
								
							</thead>
							<tbody>
								<?php 
									$totaldelinquent=0;
									
									// print_r($result);
									foreach($result as $r){
										
										$expire1 = new Datetime('01/21/'.substr($r->permit_number,0,4).'');
										$expire2 = new Datetime('04/21/'.substr($r->permit_number,0,4).'');
										$expire3 = new Datetime('07/21/'.substr($r->permit_number,0,4).'');
										$expire4 = new Datetime('10/21/'.substr($r->permit_number,0,4).'');
										$datenow = new Datetime();


								?>
					
											<?php if($r->count==1 && $r->payment_modes=="Annual"){ ?>
												<tr style="display: none;">
											<?php } else if($r->payment_modes=="Bi-Annual" && stripos($r->count,'1,2')!==false || $r->payment_modes=="Bi-Annual" && $datenow <= $expire3){?>
												<tr style="display: none;">
											<?php } else if($r->payment_modes=="Quarterly" && stripos($r->count,'1,2,3,4')!==false){?>
												<tr style="display: none;">
										
											<?php } else{ $totaldelinquent++;?>
												<tr>
											<?php } ?> 
												<td><font size="2">
												<?php 						
													echo $r->permit_number;
													
												?></td>

												<td><font size="2"><?php 
												
														if($r->permitee!="N/A"){
																	echo $r->permitee;
														}else{
																	echo $r->lastname.', '.$r->firstname.' '.$r->middlename;
														}	
												 ?></td>

												<td><font size="2">
												<?php
												
																	echo $r->business_name;
																?>
												
												</td>
											
												<td><font size="2">
												<?php 
												
													if($r->count==1 && $r->payment_modes=="Annual"){
													
													} else if($r->payment_modes=="Bi-Annual"){
														
														if(stripos($r->count,'1')!==false){
														
														}else{
															if(stripos($r->count,'1')==false){
																if($datenow >= $expire1){
																	echo "<b style='color:red'>1st Bi-Annual Delinquent</b> <br>";
																}else{
																	echo "<i style='color:red'>1st Bi-Annual Not Paid</i> <br>";
																}
																
															}
														}

														if(stripos($r->count,'2')!==false){
														
														}else{
															if(stripos($r->count,'2')==false){
																if($datenow >= $expire3){
																	echo "<b style='color:red'>2nd Bi-Annual Delinquent</b> <br>";
																}else{
																	
																}
																
															}
														}
													}else if($r->payment_modes=="Quarterly"){
																		
														if(stripos($r->count,'1')!==false){
															
														} else{
															if(stripos($r->count,'1')==false){
																if($datenow >= $expire1){
																	echo "<b style='color:red'>1st Quarter Delinquent</b> <br>";
																}else{
																
																}
																
															}
														}
														
														if(stripos($r->count,'2')!==false){
														
														} else{
															if(stripos($r->count,'2')==false){
																if($datenow >= $expire2){
																	echo "<b style='color:red'>2nd Quarter Delinquent</b> <br>";
																}else{
																	
																}
															}
														}
														if(stripos($r->count,'3')!==false){
														
														}else{
															if(stripos($r->count,'3')==false){
																if($datenow >= $expire3){
																	echo "<b style='color:red'>3rd Quarter Delinquent</b> <br>";
																}else{
																																}
															}
														}

														if(stripos($r->count,'4')!==false){
															
														}else{
															if(stripos($r->count,'4')==false){
																if($datenow >= $expire4){
																	echo "<b style='color:red'>4th Quarter Delinquent</b> <br>";
																}else{
																}
															}
														}
													}else{
														if($datenow >= $expire1){
															echo "<b><i style='color:red'>Annual Delinquent</i></b> <br>";
														}else{
															
														}
													
													}

													?>
												</td>
										
												
												<td><font size="2"><?php 
											
																	echo $r->brgy;
															?></td>
													<td><font size="2">
												<?php
																	echo "<input type='button' class='btn btn-info btn-xs' value='Final Demand Letter'>";
																?>
												
												</td>
											
													</tr>
									<?php  }?>
							</tbody>
						</table>
						<div class="t_amount">
								<?php echo '<b>TOTAL AMOUNT OF DELINQUENCY: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#8369;'.$totaldelinquent ?>
							</div>
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
</body>
</html>