
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<br>
		<div class="panel panel-success">
			<div class="panel-heading">
				<h1>DIY (Do it Yourself) REPORT</h1>
			</div>
			<div class="panel-body">
			<form target="_blank" method="post"  action="<?php echo site_url('report/report/diy_v2_search'); ?>">
				
							<div class="row">
								<div class="col-sm-2">
									<b>Yearly Reports: </b>
								</div>
								<div class="col-sm-3">
										<select name="getyear" id="month" class="form-control">
											<option value="0">--Select--</option>
										<?php
												for ($m=2012; $m<=2025; $m++) {
													$month2 = date('Y', mktime(0,0,0,$m,1, date('Y')));
													$FullMonth = date('F', mktime(0,0,0,$m, 1, date('Y')));
													echo '<option value='.$m.'>'.$m.'</option>';
												}
										?>
										</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<br>
								</div>
								<div class="col-sm-3">
									<br>	
								</div>
							</div>				
							<div class="row">
								<div class="col-sm-2">
									<b>Sort by Barangay: </b>
								</div>
								<div class="col-sm-3">
										<select name="getbrgy" id="getbrgy" class="form-control">
											<option value="0">All Barangay</option>
										<?php foreach($brgy as $br){?>
										<option value=<?php echo $br->brgy_id;?>><?php echo $br->brgy;?></option>
										 <?php }?>
										</select>

										
								</div>
							</div>	
							<div class="row">
								<div class="col-sm-2">
									<br>
								</div>
								<div class="col-sm-3">
									<br>	
								</div>
							</div>			

							<div class="row">
								<div class="col-sm-2">
									<b> Sort by Business Nature: </b>
								</div>
								<div class="col-sm-3">
								<input name="natlistname" id="natlistname" type="text"  class="form-control" >
								<input name="natlist" id="natlist" type="hidden"  class="form-control" >
										<select name="getnat" id="getnat" class="form-control" multiple>
										
											<?php foreach($nature as $bn){?>
												<option value=<?php echo $bn->buss_nature_id;?>><?php echo $bn->business_nature;?></option>
											<?php }?>
										</select>

										<input type="button" value="NOTE: Ctrl+Click Multiple Values and click here" id="select-values" class="btn btn-success">   
								</div>
								
							</div>	
							<br>
							
							<div class="row">
								<div class="col-sm-2">
									<b> Sort by Quarter: </b>
								</div>
								<div class="col-sm-3">
										<select name="getquarter" id="getnat" class="form-control">
											<option value="0">All Year Round</option>
											<option value="1">1st Quarter</option>
											<option value="2">2nd Quarter</option>
											<option value="3">3rd Quarter</option>
											<option value="4">4th Quarter</option>
										</select>

										
								</div>
							</div>	
							<br><div class="row">
								<div class="col-sm-2">
									<b>Order By: </b>
								</div>
								<div class="col-sm-3">
										<select name="order" id="order" class="form-control">
											<option value="1">Permit Number</option>
											<option value="2">Gross</option>
											<option value="3">Last Name</option>
										</select>

										
								</div>
							</div>	
							<br>
							<div class="row">
								<div class="col-sm-2">
									<b> NEW / RENEW: </b>
								</div>
								<div class="col-sm-3">
										<select name="getnew" id="getnew" class="form-control">
											<option value="0">All Permits</option>
											<option value="1">New</option>
											<option value="2">Renew</option>
										
										</select>

										
								</div>
							</div>	
							<br>
							<i> Please check the following headers : </i>
							<br><br>
							
							<div class="row">
								<div class="col-sm-2">
									<input type="checkbox" name="permit_no" value=1 ><b> Permit Number </b>
								</div>
								<div class="col-sm-2">
									<input type="checkbox" name="owner_name" value=1><b> Owner Name </b>	
								</div>
								<div class="col-sm-2">
									<input type="checkbox" name="brgy" value=1><b> Barangay </b>	
								</div>
							</div>
							<br>	
							<div class="row">
								<div class="col-sm-2">
									<input type="checkbox" name="business_name" value=1><b> Business Name </b>
								</div>
								<div class="col-sm-2">
									<input type="checkbox" name="buss_nature" value=1><b> Business Nature </b>	
								</div>
								<div class="col-sm-2">
									<input type="checkbox" name="gross" value=1><b> Gross </b>	
								</div>
							</div>	
							<br>	
							<div class="row">
								<div class="col-sm-2">
									<input type="checkbox" name="employees" value=1><b> No. of Employees </b>
								</div>
								<div class="col-sm-2">
									<input type="checkbox" name="contact_num" value=1><b> Contact No.</b>	
								</div>
								<div class="col-sm-2">
									<input type="checkbox" name="plate_no" value=1><b> Business Plate No. </b>	
								</div>
							</div>	
							<br>
							<div class="row">
								<div class="col-sm-2">
									<input type="checkbox" name="or_number" value=1><b> OR number </b>
								</div>
								<div class="col-sm-2">
									<input type="checkbox" name="owner_type" value=1><b> Ownership Type </b>
									
								</div>
								<div class="col-sm-2">
									
								</div>
							</div>	
							<br>
							<div class="row">
							
								<div class="col-sm-5">
								<label class="control-label" for="inputSuccess">Type title of your Report</label>
								 <input type="text" name="title" class="form-control">
								</div>
								
							</div>	
							<br>
							<div class="col-sm-4">
							</div>
							<div class="col-sm-6">
									<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
									<?php echo form_submit(array('value' => 'Get Report', 'class' => 'btn btn-outline btn-info')); ?>
							</div>
					
					</form>
			
			<br>
			<br>
			</div>
			<div class="panel-footer">
			</div>
		</div>
	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>


$("#select-values").click(function (e) {

	var option_all = $("#getnat option:selected").map(function () {
        return $(this).text();
    }).get().join(',');

	$('#natlistname').val(option_all);
	
	var option_all_val = $("#getnat option:selected").map(function () {
        return $(this).val();
    }).get().join(',');

	$('#natlist').val(option_all_val);
	
	
	
	});
</script>
</div>
