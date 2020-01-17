<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
<style type="text/css">
	body{
		zoom:100%;
	}
	#hidden{
		display:none;
	}
	input{
       font-size: 12px;
       border:1px solid #FFFFFF;
       padding: 2px;
       width: 40px;
       height: 20px;
    }
    b{
    	font-size: 16px;
    }
    p{
    	text-align: center;
    	font-size: 12px;
    }
    th{
    	text-align: center;
    	font-size: 11px;
    }
    td{
    	text-align: center;
    	font-size: 11px;
    }

	#allpage{
		display:visible;
	}
	.modal-dialog{
		width:100%;
	}
	@page { 
		size: landscape;
		
    }
    
	@media print{
		@page { 
		size: landscape;	
    }

		body {
			-webkit-print-color-adjust: exact !important;
		  }
		#tax{
			background-color: #00FF7F !important;
		}
		#othertax{
			background-color: #1E90FF !important;
		}
		#regfee{
			background-color: #FFFF00 !important;
		}
		#serv{
			background-color: #87CEEB !important;
		}
		#econ{
			background-color: #F4A460 !important;
		}
		#texty{
			color: #FF0000 !important;
		}
		div.page1{
			display:block;
		}
		div.page2{
			display:visible;
		}
		#allpage{
			display:none;
		}
		#printbtn{
			display:none;
		}
		#Modal1{
			display:none;
		}
		#Modal2{
			display:none;
		}
		#myModal1{
			width:100%;
		
		}
		#myModal2{
			width:100%;
		
		}
		#hidden{
		display:none;
	}
	
	}
</style>
<br>

<div id="allpage">
<div class="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<p><b>BUREAU OF LOCAL GOVERNMENT FINANCE</b></p>
		<p><b>LGU : COMPOSTELA</b></p>
		<p><b>Record of General Collection</b></p>
		<p>Period Covered:<?php echo $detail['quarter'] . ' to '.$detail['quarter1'];?></p>
	</div>
</div>
</div>

<table style="font-size:8px" id="bsp" class="table table-striped table-bordered table-hover" data-provide="datatable" data-display-rows="10" data-info="false" data-search="false" data-length-change="false" data-paginate="false">
<thead>
	<tr>
		<th rowspan="3">Date<br><br><br><br><br><br></th>
		<th rowspan="3"></th>
		<th rowspan="3">OR #<br><br><br><br><br></th>
		<th rowspan="3">Taxpayer's</br>Name<br><br><br><br><br></th>
		<th colspan="5" bgcolor="#00FF7F" id="tax">TAX ON BUSINESS</th>
		<th colspan="5" bgcolor="#1E90FF " id="othertax">OTHER TAXES</th>
		<th colspan="12" bgcolor="#FFFF00 " id="regfee">REGULATORY FEES (Permits and Licences)</th>
		
		<th colspan="7" bgcolor="#87CEEB" id="serv"><font id="texty" color="#FF0000">SERVICE/USER CHARGES (Service Income)</font></th>
		<th colspan="7" bgcolor="#F4A460" id="econ"><font id="texty" color="#FF0000">ECONOMIC ENTERPRISE</font></th>
		
		<th colspan="1"></th>
		<!-- TAX ON BUSINESS -->
		<tr rowspan="1">
			<td rowspan="2"><br>Retailers/<br>Municipal<br>License</td>
			<td rowspan="2"><br>Tax on<br>Amusement<br>Places</td>
			<td rowspan="2"><br>Other<br>Business<br>Tax</td>
			<td rowspan="2"><br>Manufacturers</td>
			<td rowspan="2"><br>Fines and<br>Penalties-<br>Business<br>Taxes</td>
		<!-- OTHER TAXES -->
			<td rowspan="2"><br>Community<br>Tax<br>Corporation</td>
			<td rowspan="2"><br>Community<br>Tax<br>Individual</td>
			<td rowspan="2"><br>Professional</br>Tax</td>
			<td rowspan="2"><br>Miscellaneous<br>Fee/<br>Other Taxes</td>
			<td rowspan="2"><br>Occupational<br>Fees</td>
		<!-- REGULATORY FEES -->	
			<td rowspan="2"><br>Fees on<br>Weights and<br>Measures</td>
			<td rowspan="2"><br>Mayor<br>Business<br>Permit<br>Fees</td>
			<td rowspan="2"><br>Building<br>Permit<br>Fees</td>
			<td rowspan="2"><br>Plumbing</td>
			<td rowspan="2"><br>Zonal/<br>Location<br>Permit<br>Fees</td>
			<td rowspan="2"><br>Motorbike<br>Tricycle/<br>Trisikad<br>Operators<br>Permit<br>Fees</td>
			<td rowspan="2"><br>Other<br>Permits<br>and Licenses</td>
			<th colspan="2">Civil Registration Fees
			<td rowspan="2"><br>Cattle/<br>Animal<br>Registration<br>Fees<br>Livestock</td>
			<td rowspan="2"><br>Electrical<br>Fees</td>
			<td rowspan="2"><br>Inspection<br>Fees</td>
		<!-- SERVICE/USER CHARGES -->	
			<td rowspan="2"><br>Legal Fees<br>(R.A. 9048, <br>R.A 10172)</td>
			<td rowspan="2"><br>Police<br>Clearance<br>Fees</td>
			<td rowspan="2"><br>Medico<br>Legal</td>
			<td rowspan="2"><br>Medical/<br>Health<br>Certificate</td>
			<td rowspan="2"><br>Other<br>Clearance<br>and Certification</td>
			<td rowspan="2"><br>Garbage<br>Fees</td>
			<td rowspan="2"><br>Violation<br>of Mun.<br>Ordinance<br>Fines and<br>Penalties<br>Service<br>Income</td>
		<!-- ECONOMIC ENTERPRISE -->	
			<td rowspan="2"><br>Cemetery</td>
			<th colspan="3">Income from Market Operations
			<th colspan="2">Income from Slaughter House
			<td rowspan="2"><br>Income from<br>Lease and Rental of<br>Facilities</td>
			<td rowspan="2"><br>Doc.<br>Stamps</td>
			<!-- REGULATORY FEES CONTINUATION-->	
			<tr>	
				<td>Marriage<br>Fees</td>
				<td>Burial<br>Permit<br>Fees</td></td>
			</th>
			<td>Stall<br>Rentals</td>
			<td>Cash<br>Tickets</td>
			<td>Coral<br>Fees</td>
			</th>
			<td>Post<br>Mortem</td>
			<td>Anti<br>Mortem</td>			
			</tr>
			</th>

	</tr>
	
		
</thead>

<tbody>

	<tr>
	<?php 
	foreach($detailed as $d): ?>
	<!-- <?php echo $d->tfos;?> -->
		<td><p><?php echo date('F d, Y',strtotime($d->assessment_date));?></p></td>
		<td bgcolor="pink">-</td>
		<td><p><?php echo $d->or_number;?></p></td>
		<td><p><?php echo $d->firstname." ".$d->lastname;?></p></td>

		<td><p label="retailers_tax"> </p></td>
		<td><p label="amusement_tax"> </p></td>
		<td><p label="other_buss_tax"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 22){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Business Tax"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="manufacture_tax"></p></td>
		<td><p label="fines_n_pen_tax"></p></td>
		<td><p label="community_tax_corp"></p></td>
		<td><p label="community_tax_individual"> </p></td>
		<td><p label="professional_tax"></p></td>
		<td><p label="miscellaneous_fee"></p></td>
		<td><p label="occupational_fee"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 10){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Occupational Permit"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="fee_on_weights_measures"></p></td>
		<td><p label="mayor_business_permit"><?php $t = json_decode($d->tfos,true); $p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 15||$a['tfo'] == 16||$a['tfo'] == 17||$a['tfo'] == 18||$a['tfo'] == 19){$p+=$a['amount'];}}} if($ad!=null){ foreach($ad as $as){if($as['tfo']=="Mayor's Permit Fee (Sari Sari)"||$as['tfo']=="Mayor's Permit Fee (Cigarette)"||$as['tfo']=="Mayor's Permit Fee (Liquor)"||$as['tfo']=="Mayor's Permit Fee (Wine)"||$as['tfo']=="Mayor's Permit Fee (Grain)"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="building_permit"></p></td>
		<td><p label="plumbing_fee"> </p></td>
		<td><p label="zonal_permit_fee"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 3){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Zoning Clearance"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="motorbike_operator_fee">
		<td><p label="other_permit"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 23){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Permit Fee-Others"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="marriage_fee"> </p></td>
		<td><p label="burial_permit_fee"> </p></td>
		<td><p label="animal_registration_fee"> </p></td>
		<td><p label="electrical_fee"></p></td>
		<td><p label="inspection_fee"> <?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 7){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Annual Inspection Fee"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="legal_fees_ra9048"></p></td>
		<td><p label="police_clearance_fee"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 20){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="police certification"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="medico_legal"></p></td>
		<td><p label="med_health_clearance"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 21){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="health"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="other_clearance"> <?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 13){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Certification Fee"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="garbage_fee"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 2){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="garbage fee"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="violation_ordinance_fee"> </p></td>
		<td><p label="cemetery_fee"> </p></td>
		<td><p label="stall_rentals"> </p></td>
		<td><p label="cash_tickets"> </p></td>
		<td><p label="coral_fees"> </p></td>
		<td><p label="post_mortem"> </p></td>
		<td><p label="anti_mortem"></p></td>
		<td><p label="income_from_lease"></p></td>
		<td><p label="document_stamps">  <?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 14){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Documentary Stamp"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
	
</tr>
<?php endforeach; ?>
</tbody>
<tfoot>
</table>

</div>


<center>
<!-- Trigger the modal with a button MODAL page 1 -->
<button type="button" class="btn btn-primary " id="printbtn" data-toggle="modal" data-target="#myModal1">Print Page 1</button>
<!-- Trigger the modal with a button MODAL page 2-->- -
<button type="button" class="btn btn-primary " id="printbtn" data-toggle="modal" data-target="#myModal2">Print Page 2</button>
<p id="printbtn"><br><h5 id="printbtn">Note: Change first before printing <br><i>Scale:</i> 68 / <i>Page Size:</i> Legal / <i>Margin-Left-Custom:</i> 1 inch</h5></p>
</center>


<!-- MODAL FOR PRINTING PURPOSES ONLY PAGE 1 -->
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog pull-left">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="Modal1">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BLGF Report page 1</h4>
        </div>
        <div class="modal-body">

<!-- FOR PRINTING PURPOSES ONLY PAGE 1 -->
<div class="page1">
<div class="page-wrapper">
<div class="row">
	<div class="col-lg-12">
	<p><b>BUREAU OF LOCAL GOVERNMENT FINANCE</b></p>
	<p><b>LGU : COMPOSTELA</b></p>
	<p><b>Record of General Collection</b></p>
	<p>Period Covered:<?php echo $detail['quarter'] . ' to '.$detail['quarter1'];?></p>
	</div>


<table style="font-size:8px" id="bsp" class="table table-striped table-bordered table-hover pull-left" data-provide="datatable" data-display-rows="10" data-info="false" data-search="false" data-length-change="false" data-paginate="false">
<thead>
	<tr>

		<th rowspan="3">Date<br><br><br><br><br><br></th>
		<th rowspan="3"></th>
		<th rowspan="3">OR #<br><br><br><br><br></th>
		<th rowspan="3">Taxpayer's</br>Name<br><br><br><br><br></th>
		<th colspan="5" bgcolor="#00FF7F" id="tax">TAX ON BUSINESS</th>
		<th colspan="5" bgcolor="#1E90FF " id="othertax">OTHER TAXES</th>
		<th colspan="7" bgcolor="#FFFF00 " id="regfee">REGULATORY FEES (Permits and Licences)</th>
		<!-- TAX ON BUSINESS -->
		<tr rowspan="1">
			<td rowspan="2"><br>Retailers/<br>Municipal<br>License</td>
			<td rowspan="2"><br>Tax on<br>Amusement<br>Places</td>
			<td rowspan="2"><br>Other</br>Business<br>Tax</td>
			<td rowspan="2"><br>Manufacturers</td>
			<td rowspan="2"><br>Fines and<br>Penalties-<br>Business<br>Taxes</td>
		<!-- OTHER TAXES -->
			<td rowspan="2"><br>Community<br>Tax<br>Corporation</td>
			<td rowspan="2"><br>Community<br>Tax<br>Individual</td>
			<td rowspan="2"><br>Professional</br>Tax</td>
			<td rowspan="2"><br>Miscellaneous<br>Fee/<br>Other Taxes</td>
			<td rowspan="2"><br>Occupational<br>Fees</td>
		<!-- REGULATORY FEES -->	
			<td rowspan="2"><br>Fees on<br>Weights and<br>Measures</td>
			<td rowspan="2"><br>Mayor<br>Business<br>Permit<br>Fees</td>
			<td rowspan="2"><br>Building<br>Permit<br>Fees</td>
			<td rowspan="2"><br>Plumbing</td>
			<td rowspan="2"><br>Zonal/<br>Location<br>Permit<br>Fees</td>
			<td rowspan="2"><br>Motorbike<br>Tricycle/<br>Trisikad<br>Operators<br>Permit<br>Fees</td>
			<td rowspan="2"><br>Other<br>Permits<br>and Licenses</td>
			
	</tr>

		
</thead>
<tbody>

	<tr>
	<?php foreach($detailed as $d):?>
	
	
	<td><p><?php echo date('F d, Y',strtotime($d->assessment_date));?></p></td>
	<td bgcolor="pink">-</td>
	<td><p><?php echo $d->or_number;?></p></td>
	<td><p><?php echo $d->firstname." ".$d->lastname;?></p></td>


	<td><p label="retailers_tax"> </p></td>
	<td><p label="amusement_tax"> </p></td>
	<td><p label="other_buss_tax"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 22){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Business Tax"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
	<td><p label="manufacture_tax"></p></td>
	<td><p label="fines_n_pen_tax"></p></td>
	<td><p label="community_tax_corp"></p></td>
	<td><p label="community_tax_individual"> </p></td>
	<td><p label="professional_tax"></p></td>
	<td><p label="miscellaneous_fee"></p></td>
	<td><p label="occupational_fee"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 10){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Occupational Permit"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
	<td><p label="fee_on_weights_measures"></p></td>
	<td><p label="mayor_business_permit"><?php $t = json_decode($d->tfos,true); $p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 15||$a['tfo'] == 16||$a['tfo'] == 17||$a['tfo'] == 18||$a['tfo'] == 19){$p+=$a['amount'];}}} if($ad!=null){ foreach($ad as $as){if($as['tfo']=="Mayor's Permit Fee (Sari Sari)"||$as['tfo']=="Mayor's Permit Fee (Cigarette)"||$as['tfo']=="Mayor's Permit Fee (Liquor)"||$as['tfo']=="Mayor's Permit Fee (Wine)"||$as['tfo']=="Mayor's Permit Fee (Grain)"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
	<td><p label="building_permit"></p></td>
	<td><p label="plumbing_fee"> </p></td>
	<td><p label="zonal_permit_fee"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 3){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Zoning Clearance"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
	<td><p label="motorbike_operator_fee">
	<td><p label="other_permit"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 23){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Permit Fee-Others"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>


	</tr>
<?php endforeach;?>
</tbody>
<tfoot>
</table>
</div>
        </div>
        <div class="modal-footer" id="Modal1">
		<button  class="btn btn-success" id="printbtn" onclick="myFunction()">Print this page</button>
        <button type="button" id="printbtn" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
      
</div>
  </div>
  
</div>



<!-- MODAL FOR PRINTING PURPOSES ONLY PAGE 2 -->
<div class="container">
 
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog pull-left">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="Modal2">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BLGF Report page 2</h4>
        </div>
        <div class="modal-body">
          <!-- FOR PRINTING PURPOSES ONLY PAGE 2 -->
<div class="page2">
	<div class="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<p><b>BUREAU OF LOCAL GOVERNMENT FINANCE</b></p>
		<p><b>LGU : COMPOSTELA</b></p>
		<p><b>Record of General Collection</b></p>
		<p>Period Covered:<?php echo $detail['quarter'] . ' to '.$detail['quarter1'];?></p>
		</div>
	
<table style="font-size:8px" id="bsp" class="table table-striped table-bordered table-hover pull-right" data-provide="datatable" data-display-rows="10" data-info="false" data-search="false" data-length-change="false" data-paginate="false">
	<thead>
		<tr>
		<th colspan="5" bgcolor="#FFFF00 " id="regfee"></th>
		
			<th colspan="7" bgcolor="#87CEEB" id="serv"><font id="texty" color="#FF0000">SERVICE/USER CHARGES (Service Income)</font></th>
			<th colspan="7" bgcolor="#F4A460" id="econ"><font id="texty" color="#FF0000">ECONOMIC ENTERPRISE</font></th>
			
			<th colspan="1"></th>
		</tr>	
		    <th colspan="2">Civil Registration Fees
			<!-- REGULATORY FEES CONTINUATION-->	
			
				<td rowspan="2"><br>Cattle/<br>Animal<br>Registration<br>Fees<br>Livestock</td>
				<td rowspan="2"><br>Electrical<br>Fees</td>
				<td rowspan="2"><br>Inspection<br>Fees</td>
			<!-- SERVICE/USER CHARGES -->	
				<td rowspan="2"><br>Legal Fees<br>(R.A. 9048, <br>R.A 10172)</td>
				<td rowspan="2"><br>Police<br>Clearance<br>Fees</td>
				<td rowspan="2"><br>Medico<br>Legal</td>
				<td rowspan="2"><br>Medical/<br>Health<br>Certificate</td>
				<td rowspan="2"><br>Other<br>Clearance<br>and Certification</td>
				<td rowspan="2"><br>Garbage<br>Fees</td>
				<td rowspan="2"><br>Violation of Mun.<br>Ordinance<br>Fines and<br>Penalties Service<br>Income</td>
			<!-- ECONOMIC ENTERPRISE -->	
				<td rowspan="2"><br>Cemetery</td>
			    <th colspan="3">Income from Market Operations
				<th colspan="2">Income from Slaughter House
				<td rowspan="2"><br>Income from<br>Lease and<br>Rental of<br>Facilities<br>(Lot Rental)</td>
				<td rowspan="2"><br>Doc.<br>Stamps</td>
				<!-- REGULATORY FEES CONTINUATION-->
				<tr>	
				<td>Marriage<br>Fees</td>
				<td>Burial<br>Permit<br>Fees</td></td>
				<td>Stall<br>Rentals</td>
				<td>Cash<br>Tickets</td>
				<td>Coral<br>Fees</td>
				</th>
				<td>Post<br>Mortem</td>
				<td>Anti<br>Mortem</td>			
				</tr>
				</th>

		</tr>
	
	</thead>
	<tbody>

		<tr>
		<?php foreach($detailed as $d):?>
	

		<td id="hidden"><p><?php echo $d->assessment_date;?></p></td>
		<td id="hidden" bgcolor="pink">-</td>
		<td id="hidden"><p><?php echo $d->or_number;?></p></td>
		<td id="hidden"><p><?php echo $d->firstname." ".$d->lastname;?></p></td>
		
		<td><p label="marriage_fee"> </p></td>
		<td><p label="burial_permit_fee"> </p></td>
		<td><p label="animal_registration_fee"> </p></td>
		<td><p label="electrical_fee"></p></td>
		<td><p label="inspection_fee"> <?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 7){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Annual Inspection Fee"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="legal_fees_ra9048"></p></td>
		<td><p label="police_clearance_fee"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 20){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="police certification"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="medico_legal"></p></td>
		<td><p label="med_health_clearance"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 21){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="health"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="other_clearance"> <?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 13){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Certification Fee"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="garbage_fee"><?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 2){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="garbage fee"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
		<td><p label="violation_ordinance_fee"> </p></td>
		<td><p label="cemetery_fee"> </p></td>
		<td><p label="stall_rentals"> </p></td>
		<td><p label="cash_tickets"> </p></td>
		<td><p label="coral_fees"> </p></td>
		<td><p label="post_mortem"> </p></td>
		<td><p label="anti_mortem"></p></td>
		<td><p label="income_from_lease"></p></td>
		<td><p label="document_stamps">  <?php $t = json_decode($d->tfos,true);$p = 0; $ad = json_decode($d->addtltfo,true);if($t!=null){foreach($t as $a){if($a['tfo'] == 14){$p+=$a['amount'];}}} if($ad!=null){foreach($ad as $as){if($as['tfo']=="Documentary Stamp"){$p+=$as['addttfoamount'];}}if($p==0){echo "";}else{echo ' &#8369;'.number_format($p,2);}}else{echo "";}?></p></td>
	
		</tr>
			<?php endforeach; ?>
	</tbody>
	<tfoot>
</table>
</div>

        <div class="modal-footer" id="Modal2">
		  <button  class="btn btn-success" id="printbtn" onclick="myFunction()">Print this page</button>
          <button type="button" id="printbtn" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


<script>
function myFunction() {
    window.print();
}
</script>
