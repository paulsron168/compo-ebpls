<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/mayor_permit.css'); ?>" type="text/css" />
<meta charset="utf-8">
	<title></title>
</head>
<style>
.bpermit{
		color:maroon;
	}	
.first{
	background-color: orange!important;
}
body{
		zoom:86%;
		-webkit-print-color-adjust: exact !important;
	}
	
@media print{
	body{
		zoom:86%;
		-webkit-print-color-adjust: exact !important;
	}
	@page {
        size: A4 portrait;
        margin: 0cm;
    }
	.bpermit{
		color:red!important;
	}
	.first{
	background-color: orange!important;
}



}
}
</style>
<body class="collage_bg">
	<img src="<?php echo base_url('assets/img/2020/header_style2020.png'); ?>" width="300" heigth="300" style="position:absolute;right: 0px;">

	<div id="page-wrapper">
		<div class="row">
			<div class="col-md-12">
			<div class="col-md-4">
						<img src="<?php echo base_url('assets/img/logos/logo2.png'); ?>" width="190px" height="190px" style="position:absolute;margin-top:8%;margin-left:4%;">
			
			</div>
				<div class="col-md-4">
					
				
				 <p style="margin-left:28%;margin-top:10%;font-size:18px;font-family:Times New Roman;"><br>Republic of the Philippines <br>
				 MUNICIPAL GOVERNMENT OF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b style="font-size:47px;font-family:Calibri;position:absolute;margin-top:-3%;margin-left:-12%;transform:scale(.6,1);width: 700px;">B.P. No. 2020-0001-1001</b> <br>
				 <b style="font-size:29px;font-family:Wide Latin;transform:scale(1.2,1);display:inline-block;margin-left:6%;margin-top:1%;	">COMPOSTELA</b> <br>
				 <u class="bpermit" style="font-size:58px;font-family:Arial;color:red;font-weight:bold;margin-top:-2%;display:inline-block;width: 700px;">BUSINESS PERMIT</u> <br>
				 <b style="font-size:25px;font-family:Arial;">BUSINESS PERMIT AND LICENSING OFFICE</b>
				  </p>
				 </div>
				 <div class="col-md-4" style="position:absolute;margin-left:60%;margin-top:-150px;">
				
				 </div>
				<?php
					if(empty($details->image)){
						echo " ";
					}else{ ?>
					<img src="<?php //echo base_url($details->image); ?>">
				<?php	}
				?>
					<!--<img src="<?php echo base_url(!empty($details->image) ? $details->image : 'assets/img/person.jpg'); ?>" width="100" heigth="100">-->
				<!-- </div>  -->
			</div>
				<br>
			
		<!-- <div class="row">
			<div style="font-weight: ; font-size:20px;" class="col-md-12">
					<div class="col-lg-6" style="float:left;margin-left:8%;">
						Permit No. COMP-<?php echo $details->permit_number; ?>
						<br><?php echo $details->ownership_type?>
					</div>
					<div class="col-lg-4" style="float:right;margin-right:5%; ">
						<?php if($details->app_idd==1){echo "NEW";}
							  if($details->app_idd==2){echo "RENEWAL";};;
						?>
					</div>
			</div>
		</div> -->
		<div class="row">
			<div class="col-lg-12">
			<img src="<?php echo base_url('assets/img/2019/ourhome.png'); ?>"  style="position:absolute;margin-left:9%;margin-top:-8%;height:50px;width:155px;">
			
				<!-- <h3 style="font-weight:bold"><?php echo strtoupper( $details->business_name)?></h3> -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h3 style="font-weight:bold;font-family: Times new roman;font-size:30px;"></h3>
			</div>
		</div>
		
		<div class="row">

			<div class="col-lg-12" style="margin-top:-3%;margin-left:2px">
				<table style = "position: relative;top: 0px;left: 100px;width: calc(100% - 200px);font-weight: bold;word-wrap: break-word;">
					<tr style = 'text-align: center;'>
						<td colspan = '2' style = "padding: 0px 0px 20px 0px;"><u style="text-align:center;font-size:30px;font-family: Calibri;"><b><i>This Certifies that</i></b></u></td>
					</tr>
					<tr>
						<td style="font-size: 18px;width: 35%;"> NAME </td>
						<td style="font-size: 18px; word-wrap: break-word;"> 	
										: <?php if($details->firstname!="N/A"  || $details->lastname!="N/A"){ echo mb_strtoupper(str_replace('N/A','',$details->firstname. ' '.$details->middlename. ' '.$details->lastname));}else{echo mb_strtoupper($details->permitee);}?>
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px;width: 35%;"> BUSINESS NAME </td>
						<td style="font-size: 18px; word-wrap: break-word;"> 	
							: <?php echo strtoupper( $details->business_name)?>
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px;width: 35%;"> ADDRESS </td>
						<td style="font-size: 18px;word-wrap: break-word;"> 	
							: <?php 
							if(empty($details->street_address)){

							}else{
								echo "Purok ".$details->street_address.", ";
							}
							if(empty($details->street_address2)){

							}else{
								echo "Sitio ".$details->street_address2.", ";
							}
								?> 
								
							Brgy.  <?php echo $details->bbrgy?>, Compostela, Cebu
							</td>
						</tr>
						<tr>
							<td style="font-size: 18px;width: 35%;"> Telafax / Mobile No. </td>
							<td style="font-size: 18px; word-wrap: break-word;"> 	
								: <?php if(!empty($details->contact_number)){
												echo strtoupper($details->contact_number);
												}else{
													echo "NONE";
												}
									?>
							</td>
						</tr>
				</table>
			</div>
		</div>

		<!-- <div class="row">
			<div class="col-lg-12">
				<h3 style="font-weight:bold;font-family: Times new roman;font-size:30px;"></h3>
			</div>
		</div> -->
		<br/>

		<div class="row">
			<div class="col-lg-12" style="left: 100px;width: 80%;text-align:center;font-size:16px;text-align: justify;margin-top: 10px;">
		has been granted PERMIT to operate the following business/es pursuant to the provisions of Section 3A.01 Chapter III Article A of Municipal Ordinance No. 4 otherwise known as the Revised Municipal  Tax Revenue Code of 2015, and after payment of the taxes, fees and other regulatory charges and subject to the compliance of such other pertinent laws, ordinances and related regulations.
			 </div>
		</div>
		 <br>
		 <center>
		 <!-- <table class="table table-bordered" style="width:80%;font-size:16px;">
		 <tr class="first">
						<td style="background-color:#eb6913!important;border:solid orange 2px!important;">Kind of Business</td>
						<td style="background-color:#eb6913!important;border:solid orange 2px!important;width:40%;"><?php 
							$counts=0;
							foreach($getdet as $getd){
								$counts++;
								if($counts > 1){
									echo ", ";
									echo str_replace('(Additional)','',$getd->business_nature);
								}else{
									if(stripos($getd->business_nature,'Lessor')!==false){
										echo str_replace('(Additional)','',$getd->business_nature).' ['.$details->units_no.' Rooms/Units]';
									}
									else if(stripos($getd->business_nature,'Peso')!==false){
										if(stripos($getd->business_nature,'[More than 3 Units]')!==false){
											echo str_replace('[More than 3 Units]','',$getd->business_nature).' ['.$details->units_no.' Units]';
										}
										else if(stripos($getd->business_nature,'[Less than 3 Units]')!==false){
											echo str_replace('[More than 3 Units]','',$getd->business_nature).' ['.$details->units_no.' Units]';
										}else{
											echo str_replace('(Additional)','',$getd->business_nature).' ['.$details->units_no.' Units]';
										}
			
										
									}
									else{
										echo str_replace('(Additional)','',$getd->business_nature);
										
									}
								}
							 
						
						   }
						 ?></td>
						<td style="background-color:#eb6913!important;border:solid orange 2px!important;">Bus. Permit No.</th>
						<td style="background-color:#eb6913!important;border:solid orange 2px!important;"><?php echo $details->permit_number; ?></th>
		</tr>
		<tr>
						<?php if($details->app_idd==1){echo "<td style='background-color:#f88b59e1!important;border:solid orange 2px!important;'>Starting Capital</td>";}
							      if($details->app_idd==2){echo "<td style='background-color:#f88b59e1!important;border:solid orange 2px!important;'>Gross Sales</td>";};
							?>
						<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;"><?php 
							   $capitals=0;
							   if($details->app_idd==1){
								foreach($getdet as $getd){
									$capitals += $getd->capital;
								   }
								   echo '&#8369;'.number_format($capitals,2);
								}
							   if($details->app_idd==2){ 
								foreach($getdet as $getd){
									$capitals += $getd->capital;
								   }
								echo '&#8369;'.number_format($capitals,2);};

							  
							   ?></td>
						<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;">Bus. Plate No.</td>
						<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;"><?php echo $details->plate_no; ?></td>
		</tr>
		<tr>
								<td style="background-color:#fabb9ee1!important;border:solid orange 2px!important;">Amount Paid</td>
								<td style="background-color:#fabb9ee1!important;border:solid orange 2px!important;"><?php echo '&#8369;'.number_format($details->paid_tax,2); ?></td>
								<td style="background-color:#fabb9ee1!important;border:solid orange 2px!important;">Type of Business</td>
								<td style="background-color:#fabb9ee1!important;border:solid orange 2px!important;"><?php echo $details->ownership_type?></td>
		</tr>
		<tr>
								<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;">O.R. No.</td>
								<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;"><?php echo strtoupper($details->or_number); ?></td>
								<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;">Business Status</td>
								<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;">	<?php if($details->app_idd==1){echo "NEW";}
							  if($details->app_idd==2){echo "RENEWED";};;
						?></td>
		</tr>
		<tr>
								<td style="background-color:#fabb9ee1!important;border:solid orange 2px!important;">Date Paid</td>
								<td style="background-color:#fabb9ee1!important;border:solid orange 2px!important;"><?php echo date('F d, Y',strtotime($details->payment_date)); ?></td>
								<td style="background-color:#fabb9ee1!important;border:solid orange 2px!important;">No. of Employees</td>
								<td style="background-color:#fabb9ee1!important;border:solid orange 2px!important;"><?php
							   $total=0;
							   $total += $details->abled_female_emp_estab;
							   $total += $details->abled_male_emp_estab;
							   $total += $details->abled_male_emp_info_estab;
							   $total += $details->abled_female_emp_info_estab;
							   $total += $details->pwd_male_emp_estab;
							   $total += $details->pwd_female_emp_estab;
							   $total += $details->pwd_male_emp_info_estab;
							   $total += $details->pwd_female_emp_info_estab;
							   $total += $details->pwd_male_emp_lgu;
							   $total += $details->pwd_female_emp_lgu;
							   $total += $details->pwd_male_emp_info_lgu;
							   $total += $details->pwd_female_emp_info_lgu;
							   $total += $details->indi_male_emp;
							   $total += $details->indi_female_emp;
							   $total += $details->abled_male_emp_lgu; 	
							   $total += $details->abled_female_emp_lgu;
							   $total += $details->abled_male_emp_info_lgu;
							   $total += $details->abled_female_emp_info_lgu;
							   

							   echo $total; ?></td>
		</tr>
		<tr>
								<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;">Valid Until</td>
								<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;">December 31, <?php echo date('Y'); ?></td>
								<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;">Contact No.</td>
								<td style="background-color:#f88b59e1!important;border:solid orange 2px!important;"><?php
							  if(!empty($details->contact_number)){
								echo strtoupper($details->contact_number);
								}else{
									echo "NONE";
								}
						   
							    ?></td>
		</tr>
		 </table>  -->
		 <table class="table table-bordered" style="width:80%;font-size:16px;font-weight: bold;">
					<tr>
								<td style = "width: 35%;">Kind of Business</td>
								<td><?php 
													$counts=0;
													foreach($getdet as $getd){
														$counts++;
														if($counts > 1){
															echo ", ";
															echo str_replace('(Additional)','',$getd->business_nature);
														}else{
															if(stripos($getd->business_nature,'Lessor')!==false){
																echo str_replace('(Additional)','',$getd->business_nature).' ['.$details->units_no.' Rooms/Units]';
															}
															else if(stripos($getd->business_nature,'Peso')!==false){
																if(stripos($getd->business_nature,'[More than 3 Units]')!==false){
																	echo str_replace('[More than 3 Units]','',$getd->business_nature).' ['.$details->units_no.' Units]';
																}
																else if(stripos($getd->business_nature,'[Less than 3 Units]')!==false){
																	echo str_replace('[More than 3 Units]','',$getd->business_nature).' ['.$details->units_no.' Units]';
																}else{
																	echo str_replace('(Additional)','',$getd->business_nature).' ['.$details->units_no.' Units]';
																}
									
																
															}
															else{
																echo str_replace('(Additional)','',$getd->business_nature);
																
															}
														}
													
												
													}
												?>
								</td>
					</tr>

					<tr>
					<?php if($details->app_idd==1){echo "<td  style = 'width: 35%;'>Starting Capital</td>";}
							  if($details->app_idd==2){echo "<td  style = 'width: 35%;'>Gross Receipts</td>";};
					?>
						<td>
								<?php 
										$capitals=0;
										if($details->app_idd==1){
										foreach($getdet as $getd){
											$capitals += $getd->capital;
											}
											echo '&#8369;'.number_format($capitals,2);
										}
										if($details->app_idd==2){ 
										foreach($getdet as $getd){
											$capitals += $getd->capital;
											}
										echo '&#8369;'.number_format($capitals,2);};
									?>
							</td>
					</tr>
					<tr>
							<td style = "width: 35%;">Amount Paid</td>
							<td><?php echo '&#8369;'.number_format($details->paid_tax,2); ?></td>
					</tr>
					<tr>
							<td style = "width: 35%;">O.R. No.</td>
							<td><?php echo strtoupper($details->or_number); ?></td>
					</tr>
					<tr>
							<td style = "width: 35%;">Date Paid</td>
							<td><?php echo date('F d, Y',strtotime($details->payment_date)); ?></td>
					</tr>
					<tr>
							<td style = "width: 35%;">Type of Business</td>
							<td><?php echo $details->ownership_type?></td>
					</tr>
					<tr>
							<td style = "width: 40%;">Business Status</td>
							<td>	<?php if($details->app_idd==1){echo "NEW";}
														if($details->app_idd==2){echo "RENEWED";};
										?>
							</td>
					</tr>

					<tr>
							<td style = "width: 35%;">Valid Until</td>
							<td>December 31, <?php echo date('Y'); ?></td>
					</tr>
		 
		 </table>
		 
		 
		 
		 </center>


		

			<!-- <br> -->

					<!-- <table class="table table-bordered" style="width:80%;text-align:center;" align="center">
  						<tr>
    						<th style="text-align:center;" width="30%">KIND OF BUSINESS</th>
							<?php if($details->app_idd==1){echo "<th>Starting Capital</th>";}
							      if($details->app_idd==2){echo "<th>Gross Sales</th>";};
							?>
   							<th style="text-align:center;">AMOUNT PAID</th>
   							<th style="text-align:center;">O.R No.</th>
   							<th style="text-align:center;">DATE ISSUED</th>
               			</tr>
  						<tr>
   							<td><?php 
							$counts=0;
							foreach($getdet as $getd){
								$counts++;
								if($counts > 1){
									echo ", ";
									echo str_replace('(Additional)','',$getd->business_nature);
								}else{
									echo str_replace('(Additional)','',$getd->business_nature);
								}
							 
						   }
						 ?></td>
							   <td><?php 
							   $capitals=0;
							   if($details->app_idd==1){
								foreach($getdet as $getd){
									$capitals += $getd->capital;
								   }
								   echo '&#8369;'.number_format($capitals,2);
								}
							   if($details->app_idd==2){ 
								   $gross_det = $details->gross;
								   $gr = json_decode($gross_det);
								   echo empty($gr) ?  '&#8369;'.number_format(0,2) : '&#8369;'.number_format($gr[0]->gross,2);
							    };

							  
							   ?></td>
    						<td><?php echo '&#8369;'.number_format($details->paid_tax,2); ?></td>
    						<td><?php echo strtoupper($details->or_number); ?></td>
    						<td><?php echo date('F d, Y',strtotime($details->payment_date)); ?></td>
  						</tr>
  					</table>

			<br>

					<table class="table table-bordered" style="width:80%;text-align:center;" align="center">
  						<tr>
    						<th style="text-align:center;">NO. OF EMPLOYEES</th>
   							<th style="text-align:center;">CONTACT NUMBER</th>
							<th style="text-align:center;">BUSINESS PLATE NO.</th>
   							<th style="text-align:center;">VALID UNTIL</th>

               			</tr>
  						<tr>
   							<td><?php
							   $total=0;
							   $total += $details->abled_female_emp_estab;
							   $total += $details->abled_male_emp_estab;
							   $total += $details->abled_male_emp_info_estab;
							   $total += $details->abled_female_emp_info_estab;
							   $total += $details->pwd_male_emp_estab;
							   $total += $details->pwd_female_emp_estab;
							   $total += $details->pwd_male_emp_info_estab;
							   $total += $details->pwd_female_emp_info_estab;
							   $total += $details->pwd_male_emp_lgu;
							   $total += $details->pwd_female_emp_lgu;
							   $total += $details->pwd_male_emp_info_lgu;
							   $total += $details->pwd_female_emp_info_lgu;
							   $total += $details->indi_male_emp;
							   $total += $details->indi_female_emp;
							   $total += $details->abled_male_emp_lgu; 	
							   $total += $details->abled_female_emp_lgu;
							   $total += $details->abled_male_emp_info_lgu;
							   $total += $details->abled_female_emp_info_lgu;
							   

							   echo $total; ?></td> 
   							<td><?php
							   if(!empty($details->mobile_number)){
									echo strtoupper($details->mobile_number);
							   }else{
								   echo "NONE";
							   }
							    ?></td>
								<td><?php echo $details->plate_no; ?></td>
    						<td>December 31, <?php echo date('Y'); ?></td>

  						</tr>
  					</table> -->

			<!-- <br>

		<div class="row">
			<div class="col-lg-12">
			
			
			</div>
		</div>

			<div class="col-lg-12">
				<div class="col-lg-4"  style="font-weight:;margin-left:75px;font-size:10px">
				
				</div>
			</div>

			<br>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4"  style="font-weight:;margin-left:61%;margin-top:-5%;font-size:16px">
					 <span>APPROVED:</span> <br><br>
					<span><?php echo strtoupper($settings[0]->firstName). ' ' .strtoupper($settings[0]->middleName). ' ' .strtoupper($settings[0]->lastName);?></span><br>
					<span style="font-weight:;font-size:14px;"><?php echo $settings[0]->designation?></span>
				</div>
			</div>
		</div> -->


		<!-- <div class="col-lg-6" style="margin-left:6%;padding-right:2cm;">
		<img src="<?php echo base_url('./assets/img/municipal_hall3.png'); ?>"  style="position:absolute;margin-top:-13%;width:420px;">
					
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4"  style="font-weight:;margin-left:61%;font-size:12px"><br><br><span>BY AUTHORITY OF THE MUNICIPAL MAYOR:</span><br>
					<br><span style="font font-weight: ;font-size: 14px;"><br><br>TEODORICO L. CAGANG</span><br>
					<span>Senior Administrative Assistant III</span>
				</div>
			</div>
		</div>
		<br> -->
		<!-- <div class="row">
			<div class="col-lg-12">
				<p style="margin-left:90px; font-size:14px; color: red; padding-right: 20px;text-align: justify;"><b>IMPORTANT: </b>
					<br>
					
					<span style=" color: black; font-size: 12px; font-family:Arial"> This permit shall be posted conspicuously at the place where the business/s is/are being conducted and shall be presented and or surrendered to competent authorities upon demand. NOT TRANSFERRABLE AND NOT VALID WITHOUT THE CORRESPONDING OFFICIAL RECEIPTS SHOWING PAYMENT OF MAYOR'S PERMIT FEES AND MUNICIPAL BUSINESS TAXES.  In case of closure of business, surrender this permit to the Municipal Treasurer for official retirement. ERASURE AND/OR ALTERATIONS WILL INVALIDATE THIS PERMIT.
					</span>


					 <span style="margin-left:130px">VALID UP TO DECEMBER 31, <?php echo date('Y');?></span>
				</p>

			</div>
		</div> -->
		<center>
		<label style="font-weight:bold;font-family: Arial;font-size:15px;margin-top: -5px;margin-left: 0px;width: calc(100% - 200px);text-align: justify;">
								 FAILURE TO COMPLY WITH THE TERMS AND CONDITIONS WRITTEN HEREOF SHALL CAUSE THE IMMEDIATE REVOCATION OF THIS PERMIT.
		</label>

		
		<table style="font-size:12px;width:80%;" class="">
		<tr style="text-align:justify;">
				<td style="border:solid transparent 2px!important;width: 60%;">
							   <b>REMINDER:</b>
					<ol>
						<li>DISPLAY THIS permit conspicuously at your business establishment with the Official Receipt and other clearances.</li>
						<li>Always present this PERMIT upon Renewal and or Retirement of Business.</li>
						<li>Real State Lessor shall regularly monitor the economic activities of their Lessees and report to the Office of the Mayor suspicious illegal activities.</li>
						<li>When not available at the time of Permit Renewal or Business Permit Application, the DTI/SEC Registration, SSS,PAG-IBIG,PHILHEALTH Clearances should be submitted within 30 days from release of Business Permit.</li>
						<li>Business premises are subject to regular inspection by concerned authorized officess.</li>
						<li>Not transferable and not valid without the corresponding official receipts showing payment of Mayor's / Business Permit Fees and Municipal Business Taxes.</li>
					</ol>
				</td>

				<td style="border:solid transparent 2px!important;">
				<br> <br><br>
				<b >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				APPROVED:
				</b><br><br><br><br><br>

				<div style="padding-left:25%">
					<b style="font-size:20px;"><?php echo strtoupper($settings[0]->firstName). ' ' .strtoupper($settings[0]->middleName). ' ' .strtoupper($settings[0]->lastName);?></b> <br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style= 'font-size: 16px;'><?php echo $settings[0]->designation?></b>
				</div> <br>
				<!-- For and by authority of the Municipal Mayor: <br><br><br><br>

				<div style="padding-left:35%;font-family:Times New Roman;">
				<b style="font-size:16px;"><?php echo strtoupper($settings[4]->firstName). ' ' .strtoupper($settings[4]->middleName). ' ' .strtoupper($settings[4]->lastName);?></b> <br>
					&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $settings[4]->designation?>
				</div> -->
			</td>
		</tr>
		</table>
		<br/>
		<p style="font-family: Arial;font-size:12px;margin-top: -10px;margin-left: 0px;width: calc(100% - 200px);text-align: justify;">
								 <b>Remarks :</b> <?php if(empty($details->remarks)){echo "N/A";}else{echo $details->remarks; }?>
		</p>
		<p style="font-family: Arial;font-size:12px;margin-left: 0px;width: calc(100% - 200px);text-align: justify;">
				<i>Subject to presentation to Barangay Clearance with in 7 days from the date hereof, otherwise this premit shall be considered NULL and VOID. 
				(Disregard if Barangay Clearance is already secured).</i>
		</p>
		
		</center>

		<img src="<?php echo base_url('assets/img/2020/footer_style2020.png'); ?>" style="position:absolute;top:29%;width: 100%;right: -5px;z-index:-1;">

</body>
</html>
