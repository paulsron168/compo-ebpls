<div class="tab-pane fade in" id="business-nature">
	<div class="portlet">
		<div class="nature-message"></div>
		<div class="portlet-header">
			<h3><i class="fa fa-leaf"></i> <span>Business Nature List</span></h3>
			<ul class="portlet-tools pull-right business-nature">
				<li id="add-new-nature">
					<a data-toggle="modal" href="#new-nature" class="btn btn-sm btn-warning add" title="Add Business Nature">
						<i class="fa fa-plus-circle"></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="portlet-content">
			<div id="business_nature_content">
				<table id="business-nature-list" class="table table-striped table-bordered table-hover thistable"
					data-display-rows="10"
					data-info="true"
					data-search="true"
					data-length-change="true"
					data-paginate="true"
				>
					<thead>
						<tr>

							<th>Description</th>
							<th>PSIC</th>
							<th>TFO</th>
							<th>Requirements</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if($business_nature->num_rows() > 0) {
							foreach($business_nature->result() as $nature) { ?>
							<?php if ($nature->buss_nature_id !='0') { ?>
								<tr>
									<?php if ($nature->application_id == '1'){?>
										<td>
											<?php  echo wordwrap(trim($nature->business_nature),15 ,'<br>').'-New';?>
										</td>
									<?php }else {?>
										<td>
											<?php  echo wordwrap(trim($nature->business_nature),15 ,'<br>').'-Renew';?>
										</td>
									<?php }?>
									<!-- <td>
										<?php  //echo wordwrap(trim($nature->business_nature),50 ,'<br>');?>
									</td> -->

									<td class="text-center">
										<?php echo $nature->psic; ?>
									</td>

									<?php if($nature->application_id==1){?>
									<td>
										<a href="#" data-natureid="<?php echo $nature->buss_nature_id; ?>" data-appid = "<?php echo $nature->application_id;?>" class="btn btn-outline btn-success btn-xs required-tfos"><i class="fa fa-wrench"></i> View tfos</a>
										<a title="Copy tfo from New to Renew of this nature" href="#" data-natureid="<?php echo $nature->buss_nature_id; ?>" data-appid = "<?php echo $nature->application_id;?>" class="btn btn-outline btn-success btn-xs copy-tfo"><i class="fa fa-copy"></i> Copy tfo</a>
									</td>
									<?php }else {?>
									<td>
										<a href="#" data-natureid="<?php echo $nature->buss_nature_id; ?>" data-appid = "<?php echo $nature->application_id;?>" class="btn btn-outline btn-success btn-xs required-tfos"><i class="fa fa-wrench"></i> View tfos</a>
									</td>
									<?php }?>
									<td>
										<a href="#" data-natureid="<?php echo $nature->buss_nature_id; ?>" data-appid="<?php echo $nature->application_id?>" class="btn btn-outline  btn-success btn-xs requirements"><i class="fa fa-wrench"></i> View Requirements</a>
									</td>
									<td>
										<a href="#" style="align:center" title ="Edit Business Nature" data-natureid="<?php echo $nature->buss_nature_id; ?>" data-applid="<?php echo $nature->application_id; ?>" class="btn btn-danger btn-xs edit_bn"><i class="fa fa-pencil"></i></a>
										<!--a href="#" title ="Delete Business Nature" data-natureid="<?php echo $nature->buss_nature_id; ?>" class="btn btn-danger btn-xs remove_bussn"><i class="fa fa-times"></i> Delete</a-->
									</td>

								</tr>

							<?php } else { // do nothing
									} ?>
							<?php }
						}?>

					</tbody>
				</table>
			</div>
			<div id='requirement_list_content'>
				<table id="requirements-list" style="display: none" class="table table-striped table-bordered table-hover table-highlight">
					<thead>
						<tr>
							<th>#</th>
							<th colspan="2">Requirements</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div id="tfo_content">
				<table id="required-tfo-list" style="display: none" class="table table-striped table-bordered table-hover table-highlight">
					<thead>
						<tr>	
							<th>No.</th>
							<th>TFO</th>
							<!-- <th style="width: 95px;" class="text-center">Application Type</th> -->
							<th style="width: 115px;">Behavior</th>
							<!-- <th>Indicator</th> -->
							<th style="width: 340px;">Value</th>
							<th style="width: 129px;">Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
