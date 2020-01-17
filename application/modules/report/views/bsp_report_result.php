<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<style type="text/css">
	.forth{
		  color: #000;
		  font-weight: 600;
		  border: 1px solid #3a3a3a;
		 /* background-color: #444;*/
		  border-bottom-width: 2px;
	}
	input{
       font-size: 10px;
       border:1px solid #FFFFFF;
       padding-left: 10px;
       width: 220px;
       height: 20px;
    }
    b{
    	font-size: 8px;
    }
    p{
    	text-align: center;
    	font-size: 8px;
    }
    .flont {
		font-family: "Arial";
		font-size: 11px;	
		 border-bottom: 1px solid #888;
		 max-height: 13px;
	}
	.flot {
		font-family: "Arial";
		font-size: 11px;
		height: 13px;
		font-weight: bold;
		max-height: 13px;
	}
</style>
<div class="page-wrapper">
	<div class="row">
		<div class="col-lg-12" >
			<p>BSP - Regitered Pawnshops (PS), Foreign Exchange Dealers (FXDs)/Money Changers (MCs) and Remittance Agents (RAs)</p>
		 	<p> Operating in: _________________</p>
		 	<p> Updated as of: ________________</p>
	 	</div>
 	</div>
</div>
<table style="font-size:9px" id="bsp" class="table table-striped table-bordered table-hover" data-provide="datatable" data-display-rows="10" data-info="false" data-search="false" data-length-change="false" data-paginate="false">
	<thead>
		<tr>
			<th rowspan="2">#</th>
			<th rowspan="2">BSP Registration #</th>
			<th rowspan="2">Entity Name</th>
			<th rowspan="2">Owned & Operated By</th>
			<th rowspan="2">Business Address</th>
			<th rowspan="2">Contact #</th>
			<th rowspan="2">Owner Name/Manager/President</th>
			<th rowspan="2">TIN</th>
			<th rowspan="2">Business Type</th>
			<th rowspan="2">Type of Office</th>
			<th colspan="2">Business Permit</th>
			<th rowspan="2">Remarks</th>
			<tr>
				<td>Date of Issuance</td>
				<td>Number</td>
			</tr>
		</tr>
	</thead>
	<tbody>
		<?php 
			$i=1;
			foreach ($result as $r) {
				$tot_employee  = 0;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td></td>
			<td><?php echo $r->business_name;?></td>
			<td><?php echo $r->firstname .' ' .$r->middlename . ' '. $r->lastname;?></td>
			<td><?php echo $r->street_address?></td>
			<td><?php echo $r->contact_number?></td>
			<td><?php echo $r->permitee?></td>
			<td></td>
			<td><?php echo $r->business_nature;?></td>
			<td></td>
			<td><?php echo date('m-d-Y',strtotime($r->date_applied))?></td>
			<td><?php echo $r->permit_number?></td>
			<td></td>
		</tr>
		<?php $i++;} ?>
	</tbody>
</table>
<table>
	<tr><p> **************Nothing Follows*****************</p><br/></tr>
	<tr>
		<td class="flot">Prepared by:</td>
		<td width="220"></td>
		<td width="20"></td>
		<td class="flot">Certified by:</td>
	</tr>
	<tr>
		<td width="20"></td>
		<td><br/><br/><input style="text-decoration:underline" type="text" value="(Signature over Printed Name)"         ></td>
		<td width="20"></td>
		<td width="100"></td>
		<td><br/><br/><input style="text-decoration:underline" type="text" value="(Signature over Printed Name)"></td>
	</tr>
	<tr>
		<td width="10"></td>
		<td align="center"><input type="text" value="(Designation)"></td>
		<td width="220"></td>
		<td width="20"></td>
		<td><input type="text" value="(Designation)"></td>
	</tr>
	<tr>
		<td width="20"></td>
		<td class="flot" style="font-size:9px">Date:____________</td>
		<td width="220"></td>
		<td width="20"></td>
		<td class="flot" style="font-size:9px">Date:______________</td>
	</tr>
</table>
<div>

	<br/>
	<b>
	1. Indicate Tax Identification Number of owner (if single or sole proprietor) / entity (if partnership or cororation)
	<br/>
	2. Indicate type of license as PS-for Pawnshop; FXD/MC -for Foreign Exchange Dealer/ Money Changer; RA -for Remittance Agent
	<br/>
	3. Indicate type of unit as HO - for Head Office, BR - for Branch
	<br/>
	4.Indicate whether New, Renewed or Cancelled
	</b>
</div>