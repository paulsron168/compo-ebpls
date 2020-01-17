<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading">
	    			<h1>BIR REPORT</h1>
	    		</div>
	    		<div class="panel-body">
	    			<div class="row">
	    				<div id="printthis">
							<table id="business_report" class="table table-striped table-bordered table-hover thistable"
								data-display-rows="10"
								data-info="false"
								data-search="false"
								data-length-change="false"
								data-paginate="false"
							>
								<thead>
									<tr>
										<th>No</th>
										<th>Business Name</th>
										<th>Taxpayer</th>
										<th>Business Address</th>
										<th>Nature of Business</th>
										<th>Capital/Gross</th>
										<th>Status of Business</th>
										<th>Date of Registration</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; 
										foreach($result as $r){?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $r->business_name?></td>
												<td><?php echo $r->firstname .' ' .$r->middlename . ' '. $r->lastname;?></td>
												<td><?php echo $r->street_address?></td>
												<td><?php echo $r->business_nature;?></td>
												<td><?php echo $r->capital;?></td>
												<td><?php echo $r->app_type?></td>
												<!-- <td><?php echo date('m-d-Y',strtotime($r->date_applied))?></td> -->
												<td><?php echo $r->date_applied?></td>
											</tr>
									<?php $i++; }?>
								</tbody>
							</table>
						</div>
	    			</div>
				<br>
				<br>
	    		</div>
	    		<div class="panel-footer">
	    		</div>
	    	</div>
	    </div>
	</div>
</div>
