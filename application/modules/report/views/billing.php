<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12"><br>
			<div class="panel panel-success">
		<div class="panel-heading"><h1>NOTICES</h1></div>
		<div class="panel-body">
			<div class="portlet">
	 	<div class="portlet-header">

			<ul class="portlet-tools pull-right business-nature">
				<li id="add-new-nature">
					<a data-toggle="modal" href="#new-nature" class="btn btn-sm btn-warning add" title="Add Business Nature">
						<i class="fa fa-plus-circle"></i>
					</a>
				</li>
			</ul>
		</div>
	  	<div class="portlet-content">
	  		<table id="billing-report" class="table table-striped table-bordered table-hover thistable"
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
			>

			<thead>
				<tr>
					<th>Business Name</th>
					<th>Business Owner</th>
					<th>Application Type</th>
					<th>Notices</th>

				</tr>
			</thead>
				<tbody>
					<?php  if (!empty($billings) ) {
								foreach($billings as $t){
					?>
						 	<tr>
							<?php if ($t['notice'] =='N' || $t['demand'] =='N' || $t['cease']=='N') { ?>
								<td><?php echo $t['buss_name']; ?></td>
								<td><?php echo $t['name']; ?></td>
								<td><?php
									if($t['application_id'] == 1 ){
										echo 'New';
									} else { echo 'Renew';}

									 ?>
								</td>
								<td>
									<?php
										if ($t['notice']=='N'){
									?>
									<a  target="_blank"
										href="<?php echo base_url('report/notices/'.$t['app_id']);?>"
										class="btn btn-info btn-xs btn-block print-notice"
										data-billingid = <?php echo $t['app_id'];?>>
										<i class="fa fa-list"></i>&nbsp;&nbsp;
										Notice Of Billing
									</a>
									<?php } ?>
									<?php
										if ($t['demand']=='N'){
									?>
									<a  target="_blank"
										href="<?php echo base_url('report/letter/'.$t['app_id']);?>"
										class="btn btn-info btn-xs btn-block print-letter"
										data-billingid = <?php echo $t['app_id'];?>>
										<i class="fa fa-list"></i>&nbsp;&nbsp;
										Demand Letter
									</a>
									<?php } ?>
									<?php
										if ($t['cease']=='N'){
									?>
									<a  target="_blank"
										href="<?php echo base_url('report/cease_desist/'.$t['app_id']);?>"
										class="btn btn-info btn-xs btn-block print-letter"
										data-billingid = <?php echo $t['app_id'];?>>
										<i class="fa fa-list"></i>&nbsp;&nbsp;
										Cease And Desist Order
									</a>
									<?php } ?>
								</td>
						 	</tr>
							<?php } ?>
						 <?php }
					}
					 else { ?>
							<tr>
								<td colspan="4"> <?php //print_r($barangay);?>
									<div class="col-sm-6">
										<div class="form-group">
											<?php //echo form_label('Barangay:', 'brgy_id', array('class' => 'col-sm-4 control-label')); ?>
											<div class="col-sm-8">
												No report found in the database.
												<?php //echo form_dropdown('brgy_id', $barangay, '', 'class="form-control"'); ?>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<!-- <tr>
								<td>No report found in the database.</td>
							</tr> -->
					<?php } ?>
				</tbody>
			</table>
	  	</div>
	</div>
		</div>
	</div>
		</div>
	</div>
</div>
