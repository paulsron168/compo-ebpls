<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/mayor_permit.css'); ?>" type="text/css" />
<meta charset="utf-8">
	<title></title>
<style>
.boxes{
	float:left;
	margin-top: -5%;
	margin-left: -9%;
}
.picturee{
	float:right;margin-top:0%;margin-left:70%;position:absolute;
}
.print-btn{
	margin-top:5%;
}

@media print{
	.picturee{
		float:right;margin-top:-10%;margin-left:70%;position:absolute;
	}
	.print-btn{
	display:none;
}
}

</style>
</head>
<body>
					

	<div id="page-wrapper">
<button class="btn btn-danger print-btn" onclick="myPrint()">Click this button<br> to PRINT</button>	
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4">
					<div class="col-md-4" id="lgo">
						<img src="<?php echo base_url('assets/img/logos/logo2.png'); ?>" width="100" heigth="100" style="position:absolute;margin-left:-30%;margin-top:2%;">
						
					</div>
					<!--<img src="<?php echo base_url('assets/img/afooter.png'); ?>"  width="120" heigth="80" style="position:absolute;margin-left:80%;margin-top:5%;">-->
				
						<br>
				</div>
				</div>
				<center>
				<p>Republic of the Philippines<br>
				Province of Cebu</br>
				<b>MUNICIPALITY OF COMPOSTELA</b></br>--oOo--<br>
				<!-- <b style="font-size:17px;">BUSINESS PERMIT AND LICENSING OFFICE</b><br> -->
				<b style="font-size:17px;">OFFICE OF THE MUNICIPAL TREASURER</b><br>
				
				</p>
	
			</center>
		<hr style="border: 2px solid black;">
	
		<div class="row">
			<div class="col-md-4"></div><br>
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<br>
			<br>
			<br>
				<span class="may"><h1 style="font-family: Times New Roman; font-size:25px;margin-top:-2%;"><b>CERTIFICATION</b></h1></span>
			</div>
		</div>
		
		<br><br>
	<br>
	<br>
		<div class="row">
			<div class="col-md-12" style="margin-top:-20px;">
			<p style="font-size:16px; text-align:justify;">Per record in this office, Mr/Mrs. <?php if($details->permitee==null || $details->permitee=="N/A" ){echo strtoupper($details->firstname. ' '.$details->middlename. ' '.$details->lastname);}else{echo strtoupper($details->permitee);}?> business permitee of this municipality 
			
			<?php
				if($details->business_name == "none"){
					
				}else{
			?>
				bearing the business name 
				<?php echo strtoupper( $details->business_name) ?> 
				
			<?php } ?>

			appeared before the undersigned to formally inform this office for permanent closure of his/her 
			<?php 
			if(stripos($details->business_nature,'-Renew')!==false){
				echo strtoupper( str_replace('-Renew','',$details->business_nature));
			
			} else if(stripos($details->business_nature,'-New')!==false){
				echo strtoupper( str_replace('-New','',$details->business_nature));
			}

			 ?> business effective <?php echo date('F d, Y', strtotime($details->payment_date));?> per letter of notification hereto attached.

			<br><br>
			THIS CERTIFICATION was issued and executed to attest and clear his/her name for any monetary 
			liabilities to this Local Government Unit and for whatever legal purpose it may serve his/her best.
			<br><br>
			Done at the Municipality of Compostela, Province of Cebu, Philippines this <?php echo date('F d, Y');?></p>
			</div>
		</div>
		
		<br><br><br><br>
		<hr style="border: 0.5px solid black;">
		
			<br>
			<p >RECOMMENDED FOR APPROVAL: 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- APPROVED FOR RETIREMENT:	 -->
			</p>
			<br><br>
			<p style="text-align:left;"><b style="font-size:16px;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo strtoupper($admin[3]->firstName." ".$admin[3]->middleName." ".$admin[3]->lastName)?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
				
			<!-- <?php echo strtoupper($admin[0]->firstName." ".$admin[0]->middleName." ".$admin[0]->lastName)?>-->
			</b></p>
			<p style="margin-top:-4%;">_____________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- _______________________ -->
				</p>
			<p style="text-align:left;margin-top:-2%;" >
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $admin[3]->designation?> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- <?php echo $admin[0]->designation?>  -->
				</p>
			</div>
		

			<br><br><br><br><br><br>
			<div class="row">
				
				Certification Fee : &#8369; 75.00 <br>
				Documentary Stamp : &#8369; 30.00 <br>
				<?php
					if(empty($details->cert_or_number)){
				?>
				Official Receipt No. : <?php echo $details->or_number; ?><br>
				<?php
					}else{
				?>
					Official Receipt No. : <?php echo $details->cert_or_number; ?><br>
				<?php
					}
				?>
				
				Date Issued. : <?php echo date('F d, Y', strtotime($details->payment_date));?>
			
			</div>	

						
	</div>

</body>
</html>
<script>
function myPrint(){
	window.print();
}
</script>