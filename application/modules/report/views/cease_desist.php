 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
	<style type="text/css">

	body {
    	font-size: 62.5%;
	}
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
		margin-top: 20px;
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
		font-family: 'Calibri' ;
		font-size:19px;
		margin-top: 100px;
	}
	.mun{
		font-family:'Monotype Corsiva';
		font-weight: lighter;
		letter-spacing: 1px;
		font-size:17px;
	}
	.off{
		font-family:'Book Antiqua';
		text-align:center;
		letter-spacing: 1px;
		font-size:17px;


		}

	#lgo{
		/*background-image: url(<?php //echo base_url('assets/img/logos/logo2.png'); ?>);*/
		/*width:45%;
		height:45%;*/
		position:absolute;
		top:15px;
		margin-left:-15px;
	}
	.re{
		color: #000000;
		text-shadow: 0.5px 0 #000000;
		letter-spacing: 1px;
		font-size:11px;
		margin-top:25px;
		font-weight: 900;
	}
	.indent{
		word-spacing: 1px;
		font-size:11px;
		margin-left:20px;
	}
	.names{
		word-spacing: 1px;
		font-size:11px;
		margin-left:40px;
		margin-top:10px	;
	}
	.owner{
		word-spacing: 1px;
		font-size:11px;
		margin-left:170px;
		margin-top:20px	;
	}
	.line{
		letter-spacing: 2px;
	}
	#title{
		margin-top: 10px;
		color: #000000;
		text-shadow: 0.5px 0 #000000;
		letter-spacing: 2px;
		font-size: 13px;
		text-align: center;
		font-weight: bold;
	}
	#para{
			font-family: 'Book Antiqua';
			margin-top: 20px;
			text-indent: 41px;
			word-spacing: 5px;
			font-size: 14px;
			line-height: 24px;

	}
	#mayor{
		font-family:'Book Antiqua';
		color: #000000;
		text-shadow: 0.5px 0 #000000;
		letter-spacing: 2px;
		float:right;
		margin-top:10px;
		font-size: 13px;
		font-weight: 900;
	}
	#title-mayor{
		font-family:'Book Antiqua';
		float: right;
		margin-top: 24px;
		font-size: 12px;
		margin-right: -140px;
	}

	#copy-furnished{
		font-family:'Book Antiqua';
		font-size: 12px;
		margin-top: 70px;

	}
	.first-para{
		word-spacing: 12px;
	}
	.second-para{
		word-spacing: 11.5px;
	}
	.third-para{
		word-spacing: 15.3px;
	}
	.fourth-para{
		word-spacing: 16px;
	}
	.fifth-para{
		word-spacing: 18.2px;
	}
	.sixth-para{
		word-spacing: 11.7px;
	}
	.seventh-para{
		word-spacing: 11.2px;
	}
	.eight-para{
		word-spacing: 11.4px;
	}
	.nineth-para{
		word-spacing:21.2px;
	}
	.tenth-para{
		word-spacing:18px;
	}
	.eleventh-para{
		word-spacing:11.6px;
	}
	.twelveth-para{
		word-spacing:10.6px;
	}
	.thirthn-para{
		word-spacing:13.9px;
	}
	.fourthn-para{
		word-spacing:9.9px;
	}
	</style>
</head>
<body>

	<table align="center"  id="tabl" width="650">
		<tr>

			<td>
			<div id="lgo"><img src="<?php echo base_url('assets/img/logos/logo2.png'); ?>" width="45%" height="45%" ></div>
				<h5><span class='rep'>Republic of the Philippines</span><br>
				<span class='pro'>PROVINCE OF CEBU</span><br>
				<span class='mun'>Municipality of Compostela</span></h5>
				<span class='off'><h4><b>OFFICE OF THE MUNICIPAL MAYOR</b></h4></span>
				<div class='re'> Re: <span class='indent'> NON PAYMENT OF BUSINESS PERMIT </span>
				<br><br><br><br>
				<span class='names'><?php  echo $details[0]->business_name.'<br>';?></span>
				<span class='names'><?php  echo $details[0]->firstname.' '. $details[0]->middlename.'.	 '. $details[0]->lastname;?></span><br><br>
				<span class='owner'>Owner,</span><br><br><br>
				<!-- <span class='line'>x-------------------------------------/</span> -->
				</div>
				<div id='title'> CEASE AND DESIST ORDER</div>
				<div id ='para'>
				<span class="first-para">The Municipality of Compostela as a Local Government Unit shall  exercise its </span><br>
				<span class="second-para">power to create its own sources of revenue and to levy taxes, fees and charges</span><br>
				<span class="third-para">subject  to the provision herein, consistent with the basic policy of the local</span><br>
				<span class="fourth-para">autonomy. Such taxes, fees and charges shall accrue exclusively to the local</span> <br>
				government units ( Section 127 of the Local Government Code ).</p>
				</div>
				<div id ='para'>
				<span class="fifth-para"> Consistent  with the said provision,  a Tax  Ordinance No. 31-5-2012 was</span>
				<span class="sixth-para"> established giving authority to the undersigned, Municipal, Mayor to supervices and </span>
				<span class="seventh-para"> control all establishment and places subject to the payment of th permit fees and</span>
				<span class="eight-para"> suspend or revoke the same for any violation of the conditions upon which said</span>
				 permit has been issued.
				</div>
				<div id ='para'>
				<span class="nineth-para"> Any person doing business within the territorial jurisdiction of the </span><br>
				 <span class="tenth-para">Municipality of Compostela shall first secure a business permit/Mayor's Permit</span><br>
				<span class="eleventh-para"> which shall be issued only after payment of the corresponding taxes and fees as</span><br>
				<span class="second-para"> required by this Revised Revenue code of 2013 and other municipal ordinances.
				</div>
				<div id ='para'>
				<span class="twelveth-para"> Any person violating the provisions of the ordinance shall be punished by a </span><br>
				 fine and imprisonment.
				</div>
				<div id ='para'>
				<span class="third-para"> Records show that the establishment  mentioned  above  is unlawfully doing </span><br>
				 <span class="twelveth-para">business within the premises of <?php echo $details[0]->brgy;?> despite sufficient notice and information </span><br>
				 by the Licensing Division Office of the Municipality of Compostela.
				</div>
				<div id ='para'>
					<span class="fourth-para">NOW, THEREFORE, premises considered,party herein is hereby ordered to</span><br>
					<span class="fourthn-para"><b>CEASE AND DESIST</b> from further doing business anywhere in the premises of the</span><br>
					<?php echo $details[0]->brgy;?> and in other places within the Municipality of Compostela until they
					could secure the necessary business permit/Mayor's Permit.
				</div>
				<div id ='para'>
					<span class="thirthn-para">The Municipal Treasurer or her authorized representative is hereby ordered</span><br>
					<span class="twelveth-para">to enforce the same and to take appropriate legal action to anyone who fails to </span><br> obey.
				</div>
				<div id ='para'>
					The Chief of Police or his authorized representative is requested to
					coordinate with the Municipal Treasurer in the enforcement of this order.
				</div>
				<div id ='para'>
				Compostela,&nbsp; Cebu ,&nbsp; <?php echo date('F d, Y'); ?>
				</div>
				<div id="mayor"> <?php echo strtoupper($settings[0]->firstName. ' ' .$settings[0]->middleName. '.' .$settings[0]->lastName);?></div>
				<div id="title-mayor"><?php echo $settings[0]->designation?></div>
				<div id="copy-furnished">
				Copy furnished to:<br><br><br>

				 <?php echo $settings[1]->firstName. ' '.$settings[1]->middleName.'.'. $settings[1]->lastName?><br>
				<?php echo $settings[1]->designation?>
				<br>
				<br>
				________________________________<br>
				Chief of Police
				</div>

			</td>
		</tr>
	</table>
</body>
</html>
