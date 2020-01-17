<div class="tab-pane fade in active" id="application">
	<div class="portlet">
		<div class="portlet-header">
			<ul class="portlet-tools pull-left">
				<li><a class="btn btn-info btn-sm" href="#"><i class="fa fa-table"></i> Businesssssss Applications</a></li>
				<li><a class="btn btn-info btn-sm" href="#"><i class="fa fa-table"></i> Blacklisted Business</a></li>
			</ul>

			<ul class="portlet-tools pull-right">
				<li><a data-toggle="modal" href="#new-application" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> New Business Application</a></li>
			</ul>
		</div>

		<div class="portlet-content">
			<table class="table table-striped table-bordered table-hover table-highlight">
				<thead>
					<tr>
						<th>Permit Number</th>
						<th>Business Name</th>
						<th>Business Owner</th>
						<th>Last Application</th>
						<th>Application Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($taxpayers)){ ?>
					<?php foreach ($taxpayers as $t){?>
					<tr>						
						<!--td><!--?php echo $t->permit_number.'Inputted sa daw for db build up';?></td-->
						<td><?php echo 'Inputted sa daw for db build up';?></td>
						<td><?php echo $t->business_name; ?></td>
						<td><?php echo ucfirst($t->firstname). ' '.ucfirst($t->middlename).' '.ucfirst($t->lastname); ?></td>
						<td><?php echo 'Inputted sa daw for db build up';?></td>
						<td><?php echo ucfirst($t->types); ?></td>
						<td>
							<a data-toggle="modal" href="#new-buss-line" owner_id ="<?php echo $t->owner_id;?>" business_id= "<?php echo $t->buss_id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
							<a href="#" class="btn btn-success btn-xs"><i class="fa fa-file"></i> Renew</a>
							<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Retire</a>
							<a href="#" class="btn btn-info btn-xs"><i class="fa fa-history"></i> History</a>
						</td>
					</tr>
					<?php } 
					} ?>
				</tbody> 
			</table>
		</div> <!-- End of Portlet Content -->
	</div> <!-- End of Portlet -->
</div> <!-- End of Application Tab -->