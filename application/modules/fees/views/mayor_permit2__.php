<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" type="text/css" />
<meta charset="utf-8">
	<title></title>
	<style type="text/css">
	

	
	h1 {
		text-align:center
	}
	h2 {
		text-align:center
	}
	h3 {
		text-align:center
	}
	h5 {
		text-align:center;
		margin-top: 3px;
		margin-bottom: 15px;
	
	}



	div.absolute {
	    position: absolute;
	    top: 150px; 
	    width: 120px;
	    height: 120px;
	    border: 1px solid black;
	    right: 75px;
	}
	div.stamp {
	  /*  position: absolute;	 */
	    float: left;
	    width: 130px;
	    height: 130px;
	    border: 1px solid black;
	    margin-left: 90px;	    
	}
	div.stamp2{
	    position: absolute;	 
	    width: 100px;
	    height: 100px;
	    border: 1px solid black;
	    margin-left: 90px;	 
	    visibility: hidden;   
	}


	#lgo{

		margin-left: 120px;
	}
	
	#no2{
		font-family: "Arial" ;
		font-size:13px;
		margin-left:125px;
		margin-top: 60px;
	}
	
	.header {
		margin-top: 30px;
		font-family: 'Arial';
		font-size:20px;	
		font-weight: bold;	
		
	}

	.may{
		font-family: 'Arial';
		font-size: 9px;	
		font-weight: bold;
		margin-top: 60px;
		text-align: center;
	}
	.boxed {
		width: 75px;
		height: 75px;
	 	border: 1px solid black ;
	 	margin-right: 180px;
	 	
	}
	.permit_body{
		font-family: 'Arial';
		font-size: 16px;
		text-align: center;	
		margin-bottom: 20px;
		
	}
	.permit_body_left{
		text-align: left;
		margin-top: -10px;
		margin-left: 99px;
		font-size: 16px;		
	
	}
	.name_applicant{
		font-family: 'Arial';
		margin-top: -10px;
		margin-left: 360px;
		font-size: 12px;
	}
	.ok{
		font-family: 'Arial';
		font-style: italic;
		font-size: 12px;
		text-align: center;
	}
	
	</style>
</head>
<body>
	
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="col-lg-4" id="lgo">
						<img src="<?php echo base_url('assets/img/logos/logo2.png'); ?>" width="120" heigth="120" style="position:absolute;">
					</div>
				</div>
				<div class="col-lg-4">
					<h5><br>
					<span class='header'>Republic of the Philippines</span><br>
					<span class='header'>Province of Cebu</span><br>
					<span class="header">Municipality of Compostela</span><br>
				</h5>
				</div>
				<div class="absolute">
					<img src="<?php echo base_url(!empty($details->image) ? $details->image : 'assets/img/person.jpg'); ?>" width="100" heigth="100">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4"></div><br>
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<span class="may"><h4><b>MAYOR'S PERMIT</b></h4></span>
			</div>
		</div>
		<br><br><br><br>
		<div class="row">
			<div class="col-lg-12">
					<div class="col-lg-4" style="float:left;margin-left:100px;padding-right:50px">
						Permit No.:<?php echo $details->permit_number; ?>
					</div>
					<div class="col-lg-6" style="float:right; margin-right:22px">
						Date:<?php echo ' '.date('M d, Y');?>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h3 style="font-weight:bold"><?php echo strtoupper( $details->business_name)?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h5>BUSINESS NAME</h5>
				<p class="permit_body"> situated at <?php echo $details->bbrgy?> Compostela CEBU 6030 this Municipality</p>
				<p class="permit_body_left">Pursuant to the provision of Revenue Code of the Municipality of Compostela MAYOR'S PERMIT </p>
				<p class="permit_body_left">is hereby granted to</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">					
				<h4 style="text-align:center;font-weight:bold;margin-top:-3px;margin-left:2px"><?php echo strtoupper($details->firstname. ' '.$details->middlename. ' '.$details->lastname); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12" style="font-size:15px;text-align:center;margin-top:-3px;margin-left:2px">	
				(Name of Applicant)
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12" style="font-size:15px;text-align:center;margin-top:10px;margin-left:2px">
				registered proprietor owner/manager of which is
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12" style="text-align:center;margin-top:10px;margin-left:2px"><u style="font-weight:bold;text-align:center"><?php echo strtoupper($details->firstname. ' '.$details->middlename. ' '.$details->lastname);?></u></div>			
		</div>	<br>
		<div class="row">
			<div class="col-lg-12" style="tesxt-align:center;margin-left:130px;font-size:16px">with legal residence/offfice/s at <?php echo $details->obrgy?> Compostela CEBU to operate/construct/install:</div>			
		</div>
		
		<div class="row">
			<div class="col-lg-12" style="text-align:center;font-size:16px">
				<b><?php echo strtoupper($details->business_nature. ' - '.$details->types); ?></b>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12" style="text-align:center;font-size:16px">
				subject to exisiting laws, ordinances; rules and regulations.
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 ok">
				O.K as to business requirements
			</div>
		</div>		
	<br>
		<div class="row">
			<div class="col-lg-12">				
				<div class="col-lg-4"  style="font-weight:bold;margin-left:550px;font-size:16px"><span><?php echo $settings[0]->firstName. ' ' .$settings[0]->middleName. '. ' .$settings[0]->lastName;?></span></div>
			</div>
		</div>
		<div class="col-lg-4 stamp">
			<font style="vertical-align: middle;">DOC STAMPS</font>
		</div>
		<div class="col-lg-8" style="margin-left:2cm;padding-right:2cm;">
			<span style="font-size:11px;padding-left:20px">O.R  No.</span>&nbsp;
			<span style="padding-left:10px;padding-right:90px;width:50%;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">
				<?php echo '<b>'.$details->or_number.'</b>'?>
			</span>
			<span style="font-weight:bold;font-size:14px;margin-left:90px;padding-left:50px;padding-right:20px;"><?php echo $settings[0]->designation?></span>
		</div>
		<div class="col-lg-4" style="margin-left:75px;padding-right:2cm;font-size:12px">
			<span style="font-size:14px;padding-left:20px;padding-right:30px">SERIES :<?php echo '<b>'.date('Y').'</b>'?></span>
		</div>
		<br>
		<br>
		<br>

		<div class="row">
			<div class="col-lg-12" style="margin-left:90px;font-size:11px">
				Not valid without seal
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p style="margin-left:190px; font-size:14px">(NOTE: This permit must be displayed in a conspicuous place within the establishment and must<br>
					<span style="margin-left:15px;">likewise be renewed after every end of the quarter/semester/year. This permit is not valid if<br></span>
					<span style="margin-left:100px">Official Receipt number is not indicated hereon.)</span><br>
					<span style="margin-left:130px">VALID UP TO DECEMBER 31, <?php echo date('Y');?></span></p>
					<p style="margin-left:200px;font-size:13px;font-style:italic">
						(Failure to meet the NGA(National Government Agency) Clearances for a 45 days grace period of <br>
						<span style="margin-left:90px;font-size:11px">completion means automatic revocation of Mayor's Permit)</span>
					</p>
			</div>
		</div>
	</div>

</body>
</html>