

<div class="tab-pane fade in" id="assessment">
	<div class="portlet">
		<div class="portlet-header">
			<ul class="portlet-tools pull-left">
				<li><a class="btn btn-info btn-sm" href="#"><i class="fa fa-table"></i> All Assessed &amp; Approved</a></li>
				<!--li><a class="btn btn-info btn-sm" href="#"><i class="fa fa-table"></i> For Approval</a></li>
				<li><a class="btn btn-info btn-sm" href="#"><i class="fa fa-table"></i> Disapproved</a></li-->
			</ul>
		</div>
		<div class="portlet-content">
			<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable"
				data-display-rows="10" data-info="true" data-search="true"
				data-length-change="true" data-paginate="true" id="assess"
				aria-describedby="assess">
				<thead>
					<tr>
						<th>Permit Number</th>
						<th>Business Name</th>
						<th>Business Owner</th>
						<th>Last Application</th>
						<!--th>Transaction</th-->
						<th>Action</th>
					</tr>
				</thead>
				<tbody><?php //print_r($assess_taxpayers);?>
					<?php if(!empty($taxpayers1)){ ?>
					<?php foreach ($taxpayers1 as $tp){ ?>
					<tr>
						<td>
							<strong><?php echo $tp->permit_number;?></strong>
						</td>

						<td>
							<?php echo wordwrap($tp->business_name,24,'<br>');?>
						</td>
						<td>
							<?php //echo wordwrap($tp->permitee != "N/A" ? ucfirst($tp->permitee) : ucfirst($tp->firstname). ' '.ucfirst($tp->middlename).' '.ucfirst($tp->lastname),24,'<br>');
								echo ucfirst($tp->firstname). ' '.ucfirst($tp->middlename).' '.ucfirst($tp->lastname);
							 ; ?>

						</td>

						<td class="text-center">
							<?php echo date('F d, Y', strtotime($tp->application_date));;
									//date('F d, Y', strtotime($tp->date_applied));
							?>
						</td>
						<td>
				
							<a href="#" alt="Assess" title="Assess" class="btn btn-danger btn-xs assess" data-applicationid="<?php echo $tp->application_id; ?>" data-ownerid="<?php echo $tp->owner_id; ?>" data-businessid="<?php echo $tp->buss_id; ?>" data-appid="<?php echo $tp->app_id; ?>"  ><i class="fa fa-suitcase"></i></a>
							<?php if ($tp->modified == 0) {?>
								<a href="#" alt="Reassess" class="btn btn-primary btn-xs re-assess" disabled title="Reassess"><i class="fa fa-repeat"></i></a>
							<?php } else { ?>
							<a href="#" alt="Reassess" title="Reassess" class="btn btn-success btn-xs re-assess" data-applicationid="<?php echo $tp->application_id; ?>" data-ownerid="<?php echo $tp->owner_id; ?>" data-businessid="<?php echo $tp->buss_id; ?>"><i class="fa-repeat"></i></a>
				
						<?php } ?>
						
					
							</td>
						
					</tr>
					<?php }
					} ?>
				</tbody>
			</table>
			
		</div> <!-- End of Portlet Content -->
	</div> <!-- End of Portlet -->
</div> <!-- End of Assessment Tab -->
