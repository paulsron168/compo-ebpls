<div class="tab-pane fade in no-print" id="uploads">
	<div class="portlet">
		<div class="portlet-header">
			<ul class="portlet-tools pull-left">
				<h3><i class="fa fa-table"></i> Upload Forms</h3>
				<!-- <li><a class="btn btn-info btn-sm" href="#"><i class="fa fa-table"></i></a></li>
				<li><a class="btn btn-info btn-sm" href="#"><i class="fa fa-table"></i></a></li>
				<li><a class="btn btn-info btn-sm" href="#"><i class="fa fa-table"></i></a></li> -->
			</ul>
		</div>
		<div class="portlet-content" id="payment_page">
		<table id="business-application" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable"
		data-display-rows="10"
		data-info="true"
		data-search="true"
		data-length-change="true"
		data-paginate="true"
	>

		<thead>
			<tr>
				<th>Permit Number</th>
				<th>Business Name</th>
				<th>Business Owner</th>
				<!-- <th>Last Application</th> -->
				<th>Application Type</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody><?php //print_r($taxpayers);?>
			<?php if (!empty($taxpayers)) {
				foreach ($taxpayers as $t) { ?>
					<tr>
						<td><strong><?php echo $t->permit_number; ?></strong></td>
						<td>
							<a class="btn btn-xs edit-business" href="#" data-bussid="<?php echo $t->buss_id; ?>" data-appid="<?php echo $t->app_id; ?>">
								<?php echo wordwrap(trim($t->business_name),24,'<br>'); ?>
							</a>
						</td>

						<?php if ($t->ownership_id=="3"){  ?>
						<td>
							<a class="btn btn-xs edit-owner" href="#" data-ownerid="<?php echo $t->owner_id; ?>" data-businessid="<?php echo $t->buss_id; ?>">
								<?php echo wordwrap(ucfirst($t->firstname). ' '.ucfirst($t->middlename).' '.ucfirst($t->lastname),24,'<br>'); ?>
							</a>
						</td>
						<?php } else {?>
						<td>
							<a class="btn btn-xs edit-owner" href="#" data-ownerid="<?php echo $t->owner_id; ?>" data-businessid="<?php echo $t->buss_id; ?>">
								<?php echo wordwrap($t->permitee != "N/A" ? ucfirst($t->permitee) : ucfirst($t->firstname). ' '.ucfirst($t->middlename).' '.ucfirst($t->lastname),24,'<br>'); ; ?>
							</a>
						</td>
						<?php } ?>
						<!-- <td><?php //echo date('F d, Y', strtotime($t->application_date));?></td> -->
						<td><?php echo ucfirst($t->application_type).' Application'; ?></td>
						<td>
						
							<a href="#" alt="Renew" title="Renew"  class="btn btn-primary btn-xs renew" data-appid="<?php echo $t->app_id; ?>" data-ownerid="<?php echo $t->owner_id; ?>" data-businessid="<?php echo $t->buss_id; ?>"><i class="fa fa-unlock"></i></a>
							<a href="#" alt="Retire" title="Retire" class="btn btn-success btn-xs retire"><i class="fa fa-send-o"></i></a>
							<!--a href="#" alt="Retire" title="Retire" class="btn btn-success btn-xs"><i class="fa fa-send-o"></i></a>
							<a href="#" alt="Delete" title="Delete" class="btn btn-danger btn-xs delete_bus"><i class="fa fa-times-circle"></i></a-->
						</td>
					</tr>

			<?php } ?>
		<?php	} else { ?>
				<tr>
					<td colspan="6">No record found in the database. Please add one now.<br />
						<a data-toggle="modal" href="#new-application" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> New Business Application</a>
					</td>
				</tr>
			<?php } ?>

		</tbody>
	</table>
</div>		
	</div> <!-- End of Portlet Content -->
</div> <!-- End of Portlet -->


	
<!-- Start of Payment Info -->
	<div class="col-md-12" id="payment_info" style="display: none;">
		<div class="col-md-12" style="background: #CD5C5C; font-weight: bold;">
			<p class="text-center">Transaction Information</p>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<?php echo form_label('Trans Type:', 'trans_type', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="trans_type">			
					</div>		
			
				<?php echo form_label('Payment Type:', 'pay_type', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="pay_type">			
					</div>
			
				<?php echo form_label('Payment Status:', 'pay_status', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="pay_status">							
					</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?php echo form_label('Name:', 'owner', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="owner">			
					</div>					
				<?php echo form_label('Address:', 'address', array('class' => 'col-sm-2 control-label')); ?>
				<div id="address" class="col-sm-1">			
				</div>
				<br>				
				<br>
			</div>
		</div>		
				<?php echo form_label('Phone #:', 'telno', array('class' => 'col-sm-2 control-label')); ?>
				<div class="col-sm-1" id="telno"></div>
				<br>
				<?php echo form_label('Business Name:', 'buss_name', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-1" id="buss_name">			
					</div>	
				
				<?php echo form_label('Address:', 'address', array('class' => 'col-sm-2 control-label')); ?>
				<div class="col-sm-1" id="buss_add">			
				</div>					
	</div>		
<!-- End of Payment Info -->