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
		padding: 3%;
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
		font-size:15px;
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
		font-size:17px;
		margin-left:-1%;
*/
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
		.kin2{
		word-spacing: 7px;
	}
	.kin1{
		word-spacing: 5px;
	}
	#yours{
		float:right;
		margin-right:122px;
	}
	#yours1{
		float: right;
		margin-right: 36px;
		margin-top: 33px;
	}
	#lgo{
		position:absolute;
		/*top:15px;*/
		margin-left:-10px;
	}
	</style>
</head>
<body>

	<table align="center"  id="tabl" width="650">
		<tr>

			<td>
			<div id="lgo"><img src="<?php echo base_url('assets/img/logos/logo2.jpg'); ?>" width="45%" height="45%" ></div>
				<h5><span class='rep'>Republic of the Philippines</span><br>
				<span class='pro'>Province of Cebu</span><br>
				<span class='rep'>Municipality of Compostela</span><br></h5>

				<span class='off'><h4><b>FINAL DEMAND LETTER</b></h4></span>

				<h6><span class="no"><?php echo date('F d, Y');?></span> <br><br><br></h6>
				<span class="no2"><?php echo $details[0]->firstname.' '.$details[0]->middlename.' '.$details[0]->lastname; ?></span>
				<br>
				<span class="no3"><?php echo  $details[0]->business_name;?></span>
				<br>
				<span class="no3"><?php  echo ucfirst($details[0]->brgy).', Compostela';?></span>

				<!-- <span class='may'><h1>MAYOR'S PERMIT</h1> </span> -->

				<!-- <p id="on" style="text-align: center"><?php //echo date('Y', time()); ?></p> -->

				<p id="off"><div class="no4">Madam: <br><br>

				<div class='indent'><span class='kin2'>A review of our records showed that you have  neither paid the amount for your <br>Business Tax, nor replied
				to our Notice of Compliance given to you.</span></div>
				<br><div class='indent'><span class='kin'>Kindly take&nbsp; note that &nbsp;under&nbsp; the&nbsp;law "All Business&nbsp; inside&nbsp; the&nbsp; territorial</span><br>
				<span class='kin2'>jurisdiction of the Municipality  shall  pay their corresponding business tax imposed by the <br></span>
				<span class='kin2'>Municipality and no business shall be&nbsp; allowed&nbsp; without &nbsp;first &nbsp;securing the &nbsp;necessary</span><br>
				Mayor's Permit:".
				<br></div><br>
				<div class='indent'><span class='kin1'> Please&nbsp; give this matter &nbsp;your preferential &nbsp;attention because if we do not hear from <br></span>
				<span class='kin1'>you within <b> three (3) days</b> from receipt of this letter, we &nbsp;shall have to elevate your case to <br></span>
				<span class='kin1'>the Office of the Mayor with&nbsp; our recommendation for &nbsp;the institution of&nbsp; such legal action <br></span>
				as may lie against you.</div>
				<br>
				<br>
				<div id='yours'>
				Very truly yours,
				</div>
				<br>
				<br>
				<div id='yours1'>
				<B> <?php echo $settings[1]->firstName. ' '.$settings[1]->middleName.' '. $settings[1]->lastName?></B><br>
				&nbsp;&nbsp;
				&nbsp;&nbsp;
				&nbsp;<?php echo $settings[1]->designation?>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>
