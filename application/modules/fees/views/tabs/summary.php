<div class="tab-pane fade in no-print" id="summary">
	<div class="portlet">
		<div class="portlet-header">
			<ul class="portlet-tools pull-left">
				<h3><i class="fa fa-table"></i> Summary List</h3>
			</ul>
		</div>
		<div class="portlet-content" id="payment_page">
			<table id="summary_list" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable" 				
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
			>
				<thead>
					<tr>
						<th class="text-center">Permit Number</th>						
						<th class="text-center">Business Owner</th>
						<th class="text-center">Business Name</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						
					foreach ($for_summary->result() as $r ) { ?>
						<tr>
						<?php $fa = $r->requirements.','.$r->na_requirements; $fas = explode(',',$fa); sort($fas); $reqss = implode(',',$fas);	?>
							<td><?php 
							
							echo $r->permit_number1?></td>							
							<?php if ($r->ownership_id == "1"){ ?>
								<td>									
									<?php echo wordwrap(ucfirst($r->firstname). ' '.ucfirst($r->middlename).' '.ucfirst($r->lastname),24,'<br>'); ?>
									
								</td>
								<?php } else {?>
								<td>								
									<?php echo wordwrap($r->permitee != "N/A" ? ucfirst($r->permitee) : ucfirst($r->firstname). ' '.ucfirst($r->middlename).' '.ucfirst($r->lastname),24,'<br>'); ; ?>
								</td>
								<?php } ?>
							<td><?php echo $r->business_name;?></td>

							<td>
							<a href="#" alt="Summary1" title="Summary1"  class="btn btn-primary btn-xs summary_list" data-businessid="<?php echo $r->old_buss_id; ?>"><i class="fa fa-file"></i> &nbsp;Summary</a>									

							</td>
								<?php }?>
						</tr>
		
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