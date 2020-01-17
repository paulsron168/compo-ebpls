<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/mayor_permit.css'); ?>" type="text/css" />
<meta charset="utf-8">
	<title></title>
</head>

<body class="collage_bg">
	<img src="<?php echo base_url('assets/img/logos/logo2.png'); ?>" width="100" heigth="100" style="position:absolute;margin-top:0%;margin-left:10%">
	<div id="page-wrapper">
		<center>
			<p>Republic of the Philippines<br>
			Province of Cebu</br>
			MUNICIPALITY OF COMPOSTELA</br>
			<b style="font-size:14px;">BUSINESS PERMIT AND LICENSING OFFICE</b><br>
			<b style="font-size:16px;">OFFICE OF THE MAYOR</b><br>
			<i>Email Address: <u>municipalityofcompostela@yahoo.com.ph</u><br>
			Tel.No.:(032) 425-8698 / Telefax No. (032) 425-8699
			</i>
			</p>

		</center>
	<hr style="border: 2px solid black;">

	<table class="table table-bordered" >
		<tr >
			<td width="50%"  style="font-size:12px;">
			<b>Taxpayers Name:</b>
			<?php echo $details->owner_name ?>
			</td>
			<td width="50%" style="font-size:12px;">
			<b>Business Name:</b> 
			<?php echo $details->business_name ?>
			</td>
		</tr>
		<tr >
			<td style="font-size:12px;">
			<b>Business Address:</b>
			<?php echo $details->business_address.", Compostela, Cebu" ?>
			</td>
			<td style="font-size:12px;">
			<b>Stall No. for Market Vendors: </b>
			<?php echo $details->stall_no ?>
			</td>
		</tr>
		<tr >
			<td style="font-size:12px;">
			<b>Nature of Business (to be retired):</b><br>
			<?php $i=0;
			foreach($nat as $nat3){
				$i++;
				if($i==1){
					echo str_replace('(Additional)','',$nat3->business_nature);
				} else{
					echo ", ".str_replace('(Additional)','',$nat3->business_nature);
				}
				?>
			<?php  }?>
			</td>
			<td style="font-size:12px;">
			<b>Type of Retirement:</b><br>
			<?php if($details->typeof_retire==1){echo "&nbsp;&nbsp;&nbsp;<u>✓</u> Permanent &nbsp;&nbsp;&nbsp;&nbsp; __ Partial" ;}
				  else{ echo "&nbsp;&nbsp;&nbsp;__ Permanent &nbsp;&nbsp;&nbsp;&nbsp; <u>✓</u> Partial";} ?>
			</td>
		</tr>
		<tr >
			<td style="font-size:12px;">
			<b>Business Permit No.</b>
			<?php echo $details->permit_no ?>
			</td>
			<td style="font-size:12px;">
			<b>No. of Employees</b>
			<?php echo $details->employees ?>
			</td>
		</tr>
	
	</table>
				<?php $bawlang = explode(",",$details->gross);
						$i = 0;
				?>
	<table class="table table-bordered" style="text-align:center">
		<tr >
		
			<td width="22%" rowspan="2" style="font-size:12px;"><br><b>Kind of Business</b></td>
			<td width="16%" rowspan="2" style="font-size:12px;"><br><b>Year Declared</b></td>
			<td width="22%" rowspan="2" style="font-size:12px;"><br><b>Gross Sales</b></td>
			<td width="40%" colspan="2" style="font-size:12px;"><b>Payment Mode</b></td>
		</tr>
		
		<tr>
			<td width="20%" style="font-size:11px;">Official Receipt No.</td>
			<td width="20%" style="font-size:11px;">Date Issured</td>
		</tr>
		
		<?php foreach($nat as $nat){?>
		<tr>
			<td style="font-size:12px;"><?php echo $nat->business_nature;?></td>
			<td style="font-size:12px;"><?php echo substr($nat->permit_number,0,4);?></td>
			<td style="font-size:12px;"><?php echo $bawlang[$i];?></td>
			<td style="font-size:12px;"><?php echo $nat->or_number;?></td>
			<td style="font-size:12px;"><?php echo $nat->payment_date;?></td>
		</tr>
		<?php $i++;}?>
		
	</table>

	<p style="text-align:justify;font-size:12px;" >
	Pursuant to the provision of the Compostela Revised Tax Revenue Code of 2015, as amended, I am applying for the retirement of the above line(s) of business effective <u><?php echo date('F d Y',strtotime($details->date_filed)) ?></u>. <br><br>
	The mere filing of this application does not automatically relieved the applicant of any tax liabilty. They shall submit the required book of accounts and other business records for verification.<br><br>
	I HEREBY CERTIFY, under the penalties of perjury, that the articles herein are true and correct to the best of my knowledge and belief. 
	</p><br>
	<p style="text-align:right;font-size:12px;">________________________________<br>Taxpayer Signature Over Printed Name</p>
	<br>
	<hr style="border: 0.5px solid black;">

	<br>
	<p >Verified per supporting papers hereto attached: 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	APPROVED FOR RETIREMENT:</p>	
	<br><br>
	<p style="text-align:left;">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<b style="font-size:16px;"><?php echo strtoupper($admin[2]->firstName." ".$admin[2]->middleName." ".$admin[2]->lastName);?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo strtoupper($admin[3]->firstName." ".$admin[3]->middleName." ".$admin[3]->lastName);?></b></p>
	<p style="margin-top:-4%;">_________________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
		_______________________</p>
	<p style="text-align:left;margin-top:-2%;" >

	<?php echo $admin[2]->designation?> 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;
		<?php echo $admin[3]->designation?> </p>
	</div>

</body>
</html>
