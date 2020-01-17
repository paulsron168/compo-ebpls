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
				<p>
					<span class='' style="font-size:16px;text-align:center;">Republic of the Philippines</span><br>
					<span class='' style="font-size:16px;text-align:center;">Province of Cebu</span><br>
					<span class="" style="font-size:16px;text-align:center;">MUNICIPALITY OF COMPOSTELA</span><br>
					</p>
			<p style="text-align:center;font-size:12px;color:red!important;">Closed Business Permits for the Year <?php foreach ($result as $r) { echo substr($r->permit_number,0,4);}?></p>
		 
	 	</div>
 	</div>
</div>
<table style="font-size:9px" id="bsp" class="table table-striped table-bordered table-hover" data-provide="datatable" data-display-rows="10" data-info="false" data-search="false" data-length-change="false" data-paginate="false">
	<thead style="background-color:#98FF98!important;">
		<tr>
			<th rowspan="2" width="2%" style="text-align:center">#</th>
			<th rowspan="2" width="10%" style="text-align:center">Permit Number</th>
			<th rowspan="2" width="10%" style="text-align:center">Business Name</th>
			<th rowspan="2" width="15%" style="text-align:center">Owner's Name</th>
			<th rowspan="2" width="15%" style="text-align:center">Business Address</th>
			<th rowspan="2" width="15%" style="text-align:center">Nature Retired</th>
			<th rowspan="2" width="10%" style="text-align:center">Gross</th>
			<th rowspan="2" width="10%" style="text-align:center">Date Filed</th>
			<th rowspan="2" width="5%" style="text-align:center">No.of Employees</th>
			
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
			<td><?php echo $r->permit_number;?></td>
			<td><?php echo $r->business_name;?></td>
			<td><?php echo $r->owner_name;?></td>
			<td><?php echo $r->business_address.', Alegria, Cebu';?></td>
			<td><?php echo $r->nature_retired;?></td>
			<td><?php echo $r->gross;?></td>
			<td><?php echo date('M d, Y', strtotime($r->date_filed));?></td>
			<td style="text-align:center"><?php echo $r->employees;?></td>
			
		</tr>
		<?php $i++;} ?>
		
	</tbody>
</table>

<div>

</div>
