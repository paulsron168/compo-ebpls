<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
			<p style="text-align:center;font-size:12px;color:red!important;"><?php echo $word = preg_replace('/[0-9 ,]+/', '', $datass); ?>
		</p>
	 	</div>
 	</div>
</div>
<?php 
$tot_employee=0;$newapp=0;$renewapp=0;$n=0;	$y=0;
foreach($result as $r){
	$tot_employee += $r->abled_female_emp_estab+$r->abled_male_emp_estab+$r->pwd_male_emp_estab+$r->pwd_female_emp_estab+$r->pwd_male_emp_lgu+$r->pwd_female_emp_lgu+$r->abled_male_emp_lgu+$r->abled_female_emp_lgu;

	if($r->appid==2){
		$y++;
	}
	if($r->appid==1){
		$n++;
	} 
	
}?></td>

<?php echo '<strong>Total Employees: </strong>'.number_format($tot_employee,0);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo '<strong>Total New: </strong>'.number_format($n,0);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo '<strong>Total Renew: </strong>'.number_format($y,0);?>

<table style="font-size:9px" id="bsp" class="table table-striped table-bordered table-hover" data-provide="datatable" data-display-rows="10" data-info="false" data-search="false" data-length-change="false" data-paginate="false">
	<thead style="background-color:#98FF98!important;">
		<tr>	
		
			<th rowspan="2" width="2%" style="text-align:center">#</th>
			<?php if(stripos($datass, '1') !== false){ ?>
			<th rowspan="2" width="10%" style="text-align:center">Permit Number</th>
			<?php }?>
			<?php if(stripos($datass, '2') !== false){ ?>
			<th rowspan="2" width="10%" style="text-align:center">Owner's Number</th>
			<?php }?>
			<?php if(stripos($datass, '3') !== false){ ?>
			<th rowspan="2" width="10%" style="text-align:center">Barangay</th>
			<?php }?>
			<?php if(stripos($datass, '4') !== false){ ?>
			<th rowspan="2" width="15%" style="text-align:center">Business Nature</th>
			<?php }?>
			<?php if(stripos($datass, '5') !== false){ ?>
			<th rowspan="2" width="15%" style="text-align:center">Business Name</th>
			<?php }?>
			<?php if(stripos($datass, '6') !== false){ ?>
			<th rowspan="2" colspan="2" width="15%" style="text-align:center">Capital / Gross</th>
			<?php }?>
			<?php if(stripos($datass, '7') !== false){ ?>
			<th rowspan="2"  width="10%" style="text-align:center">No.of Employees</th>
			<?php }?>
			<?php if(stripos($datass, '8') !== false){ ?>
			<th rowspan="2" width="10%" style="text-align:center">Contact No.</th>
			<?php }?>
			<?php if(stripos($datass, '9') !== false){ ?>
			<th rowspan="2" width="5%" style="text-align:center">Business Plate</th>
			<?php }?>
			<?php if(stripos($datass, ',') !== false){ ?>
			<th rowspan="2" width="5%" style="text-align:center">OR Number</th>
			<?php }?>
			<?php if(stripos($datass, '.') !== false){ ?>
			<th rowspan="2" width="5%" style="text-align:center">Ownership Type</th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php 
			$i=1;$tot_employee  = 0;

			foreach ($result as $r) {
				
		?>
		<tr>
	
			<td><?php echo $i;?></td>
			<?php if(stripos($datass, '1') !== false){ ?>
			<td><?php echo $r->permit_number;?></td>
			<?php }?>
			<?php if(stripos($datass, '2') !== false){ ?>
			<td><?php if($r->permitee==NULL || $r->permitee=="N/A"){ echo $r->lastname.', '.$r->firstname ;} else{echo $r->permitee;}?></td>
			<?php }?>
			<?php if(stripos($datass, '3') !== false){ ?>
			<td><?php echo $r->brgy;?></td>
			<?php }?>
			<?php if(stripos($datass, '4') !== false){ ?>
			<td><?php echo str_replace('(Additional)','',$r->business_nature);?></td>
			<?php }?>
			<?php if(stripos($datass, '5') !== false){ ?>
			<td><?php echo $r->business_name;?></td>
			<?php }?>
			<?php if(stripos($datass, '6') !== false){ ?>
			<td ><?php if($r->appid==1){echo '&#8369;  '.number_format($r->capital,2);}?></td>
			<td ><?php if($r->appid==2){echo '&#8369;  '.number_format($r->capital,2);}?></td>
			<?php }?>
			<?php if(stripos($datass, '7') !== false){ ?>
			<td style="text-align:center">
			<?php echo $employees = $r->abled_female_emp_estab+$r->abled_male_emp_estab+$r->pwd_male_emp_estab+$r->pwd_female_emp_estab+$r->pwd_male_emp_lgu+$r->pwd_female_emp_lgu+$r->abled_male_emp_lgu+$r->abled_female_emp_lgu;?></td>
			<?php }?>
			<?php if(stripos($datass, '8') !== false){ ?>
			<td><?php echo $r->contact_number;?></td>
			<?php }?>
			<?php if(stripos($datass, '9') !== false){ ?>
			<td><?php echo $r->plate_no;?></td>
			<?php }?>
			<?php if(stripos($datass, ',') !== false){ ?>
			<td><?php echo $r->or_number;?></td>
			<?php }?>
			<?php if(stripos($datass, '.') !== false){ ?>
			<td><?php echo $r->ownership_type;?></td>
			<?php }?>
			
		</tr>
		<?php $i++;} 	?>
		
	</tbody>
</table>

<div>

</div>
