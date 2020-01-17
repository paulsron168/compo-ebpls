 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
	<style type="text/css">
	h5 {
		text-align:center;
		/*margin-top: 20px;*/
	}

	tabl {
		position:absolute;
	}

	/*h4 {
		text-align:center;
		margin-left: -8px;
		letter-spacing: 4px;
		margin-top: -1px;

	}*/

	h6 {
		margin-left:-1%;
			margin-top: 40px;
	}

	h1 {
		text-align:center
	}

	#on {
		font-family: 'Calibri';
		font-size:17px;
		margin-top:-14px;
		font-style:italic;
	}

	#off {

		text-align: justify;
		font-size: 18px;
		margin-bottom: 2%;
		font-family: 'Calibri';
		letter-spacing: 2px;
		margin-top: 25px;
		line-height: 163%;
		/*padding:5%;
		text-align:justify;
		font-size:18px;
		margin-bottom:3%;
		font-family: 'Calibri' ;
		letter-spacing:2px;
		margin-top: -6px;
		line-height: 150%*/;
	}

	#old {
		margin-left: 30px;
		font-size: 15px;
		margin-top: -5%;
		line-height: 1.3em;
	}

	#new {
		padding: 5%;
		text-align: right;
		margin-right: 11%;
		font-size: 14px;
		margin-top: -11%;

	}

	.rep {
		/*font-family: 'Old English Text MT';*/
		font-family: 'Calibri' ;
		font-size:19px;
		/*letter-spacing:5px;*/
		/*font-weight: lighter;*/
		/*visibility: hidden;*/
	}
	i{
		/*font-family:'Monotype Corsiva';
		font-weight: lighter;*/
		font-size:15px;
		/*visibility: hidden;*/
	}
	.off{
		/*font-family: 'Calibri' ;*/
		text-align:center;
		font-size:18px;
		/*letter-spacing:2px;*/
		/*visibility: hidden;*/
		}

	.pro{
/*		font-family: 'Calibri';
		font-weight: lighter*/;
		font-size:20px;
		/*visibility: hidden;*/
	}
	.may{
		font-family: 'Times New Roman';
		letter-spacing:3px;
		font-size: 25px;
		/*visibility: hidden;*/
		}
	.no{
		/*font-family: 'Calibri' ;*/
		font-size:15px;
		/*visibility: hidden;*/

	}
	.no2{
		/*font-family: 'Calibri' ;*/
		font-weight: bolder;
		font-size:18px;
		margin-left:-1%;

	}
		.no3{
		/*font-family: 'Calibri' ;*/
		font-weight: bolder;
		font-size:15px;
		margin-left:-1%;

	}
	.no4{
		/*font-family: 'Calibri' ;*/
		font-weight: lighter;
		font-size:14px;
		margin-left:-1%;

	}
		.no5{
		/*font-family: 'Calibri' ;*/
		font-size:14px;
		margin-left:-1%;

	}
			.no6{
		/*font-family: 'Calibri' ;*/
		font-size:14px;
		margin-left:-1%;

	}
	#ace{
		margin-left: 58%;
		padding-top: 40px;
		font-size: 19px;
		/*visibility: hidden;*/
	}
	br.br{
		line-height:10px;
	}
	span.invi{
		/*visibility: hidden;*/
	}
	#morethan5{
		font-style:italic;
		font-size: 14px;
	}

	.indent{
		text-indent: 50px;
		font-size:15px;
		text-align:justify;


	}
	.kin{
		word-spacing: 8px;
	}
		.our{
		word-spacing: 3px;
	}
		.kin2{
		word-spacing: 7px;
	}
	.kin1{
		word-spacing: 5px;
	}
	#yours{
		float:left;
		margin-right:122px;
	}
	#yours1{
		float: left;
		margin-right: 36px;
		margin-top: 33px;
	}
	#lgo{
		position:absolute;
		top:15px;
		margin-left:-100px;
	}
	.mun{
		margin-left:22px;
	}
	#gets{
		margin-left:-5px;
		margin-top:10px;
	}
	#gets ul li  {
		float:left;
		list-style-type: none;
		padding-left:58px;
	}
	.getdata ul li {
		font-size:12px;

	}
	.getdata{
		margin-left:10px;
		font-weight: bold;
	}
	.total{
		float:right;
		margin-right:33px;

	}
	#gets{
		margin-left: -20px;
	}
	#gets td{
		padding-left:50px;
	}
	#gets2{
		margin-left:-29px;
	}
	#gets2 td{
	padding-left:60px	;

}
</style>
</head>
<body>

<?php
	if($error==0){
?>
	<table align="center"  id="tabl" width="650">
		<tr>

			<td>
			<div id="lgo"><img src="<?php echo base_url('assets/img/logos/logo2.jpg'); ?>" width="50%" height="50%" ></div>
				<h5><span class='rep'>Republic of the Philippines</span><br>
				<span class='pro'>Province of Cebu</span><br>
				<span class='rep'>Municipality of Compostela</span><br></h5>
				<span class='off'><h4><b>OFFICE OF THE MUNICIPAL TREASURER</b></h4></span>
				<span class='off'><h4><U><b>NOTICE OF COMPLIANCE</b></U></h4></span>

				<h6><span class="no"><?php echo date('F d, Y');?></span> <br><br><br></h6>
				<span class="no2"><?php echo $details[0]->firstname.' '.$details[0]->middlename.' '.$details[0]->lastname; ?></span>
				<br>
				<span class="no3"><?php echo  $details[0]->business_name;?></span>
				<br>
				<span class="no5"><?php  echo ucfirst($details[0]->brgy);?></span>
				<br>
				<span class="no6">Compostela, Cebu </span>

				<!-- <span class='may'><h1>MAYOR'S PERMIT</h1> </span> -->

				<!-- <p id="on" style="text-align: center"><?php //echo date('Y', time()); ?></p> -->

				<p id="off"><div class="no4">Dear Madam/Sir, </div>
				<p id="off"><div class="no4">Good Day, <br><br>

				<span class='our'>Our office&nbsp;  would like to remind of &nbsp; your schedule of payment/s for the municipal license due for the following quarter/s.</span>
				<br>
				<div id="gets">
					<table>
						<tr>
							<td><b><u>QUARTER</u></b></td>
							<td><b><u>DUE DATE</u></b></td>
							<td><b><u>AMOUNT DUE</u></b></td>
							<td><b><u>25% PENALTY</u></b></td>
							<td><b><u>TOTAL</u></b></td>
						</tr>
					</table>
				</div>
				<div id='gets2'>
					<table>
						<?php
						$cntr = 0 ;
						$total_tax_due = 0;
						$penalty = 0;
						$duedate = $breakdowns[0]['duedate'];
						//print_r($duedate);
						foreach ($duedate as $due){
							foreach($breakdowns as $data){ //print_r($data);
							//$total_tax_due = $data['amount'];
							?>
								<tr>
									<td>
										<?php
											echo $due->value.'/'.date('Y');
										?>
									</td>
									<td> <?php echo $due->field;?></td>
									<td>  &nbsp; &nbsp; &nbsp; &nbsp; &#8369;  <?php
														if ($payment_mode==3 && $cntr==0){
															echo $data['amount']['annually'];
														} else if ($payment_mode==3) {
															echo $data['amount']['quarter'];
														} else if ($payment_mode==2 && $cntr==0) {
															echo $data['amount']['annually'];
														} else if ($payment_mode==2) {
															echo $data['amount']['biannual'];
														} else if ($payment_mode==1 && $cntr==0) {
															echo $data['amount']['annually'];
														} /* else if ($payment_mode==1) {
															echo $data['amount']['annually'];
														} */
													?>
									</td>
									<td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo '&#8369'.$data['penalty']; $penalty = $data['penalty']; ?></td>
									<td> &nbsp; &nbsp; &nbsp;
                    <?php
														if ($payment_mode==3 && $cntr==0){
															echo '&#8369 '.$data['amount']['annually'];
															$total_tax_due += (float) $data['amount']['annually'];
														} else if ($payment_mode==3) {
															echo '&#8369 '.$data['amount']['quarter'];
															$total_tax_due += (float) $data['amount']['quarter'];
														} else if ($payment_mode==2 && $cntr==0) {
															echo '&#8369 '.$data['amount']['annually'];
															$total_tax_due += (float) $data['amount']['annually'];
														} else if ($payment_mode==2) {
															echo '&#8369 '.$data['amount']['biannual'];
															$total_tax_due += (float) $data['amount']['biannual'];
														} else if ($payment_mode==1 && $cntr==0) {
															echo '&#8369 '.$data['amount']['annually'];
															$total_tax_due += (float) $data['amount']['annually'];
														}
														?></td>
								</tr>
							<?php 	$cntr++;
							}
						}
							?>
					</table>
				</div>
				<span class="total"><B>TOTAL AMOUNT DUE:  <?php echo '&#8369 '.number_format(($total_tax_due + $penalty),2,'.','') ;?> </B></span>
				<br>
				<br>
				<span class='our'> Kindly settle the above payment due for the quarter/s in the Treasury office <i><b>on or before the due date</b></i> to
				avoid the inconvenience of  further penalties.
				<br>
				<br>
				Disregard this noitice if payment has already been made.
				<br>
				<br>
				<br>
				<div id='yours'>
				Respectfully Yours,
				</div>
				<br>
				<br>
				<div id='yours1'>
				<B> Behati Prinsloo Levine</B><br>
					<span class="mun">Municipal Treasurer</span>
				</div>



			</td>
		</tr>
	</table>
	<?php  } else {
	?>
	<table align="center"  id="tabl" width="650">
		<tr style="font-size:14px;color:"#000"><td><?php echo $msg;?></td></tr>
	</table>
	<?php } ?>
</body>
</html>
