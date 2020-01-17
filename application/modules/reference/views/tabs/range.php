<div class="tab-pane fade in" id="mayors_permit">
	<div class="portlet">
		<div class="reference-message"></div>

		<div class="portlet-header">
			<h3><i class="fa fa-table"></i> Range List</h3>
			<ul class="portlet-tools pull-right">
				<li>
					<a id="add-range" class="btn btn-sm btn-primary">
						<i class="fa fa-plus-circle"></i> Add New Range for Mayor's Permit
					</a>
				</li>
			</ul>
		</div>
		<div class="portlet-content">
			<!-- <table class="table table-striped table-bordered table-hover table-highlight
					dataTable-helper dataTable datatable-columnfilter"
					data-provide="datatable"data-display-rows="10" data-info="true" 
					data-length-change="true" data-paginate="true" 
					aria-describedby="requirement-list"> -->
			<table id="range-list" class="table table-striped table-bordered table-hover table-highlight" 
				data-provide="datatable" 
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
			>
				<thead>
					<tr>
						<th>#</th>						
						<th>Classification</th>
						<th colspan="2">Value</th>
					</tr>
				</thead>
				<tbody role="alert" aria-live="polite" aria-relevant="all">
				<?php 
					$i=1;					
				?>
					<?php foreach ($mayors_permit as $r) {
							$vals = json_decode($r->value);
					?>					
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo ucfirst($r->types);?></td>
							<td>
								<table border="0" width="50%">
							<?php  foreach ($vals as $rv){ ?>
									<tr style="border-top:none; width:50%">										
										<td width="150px"><?php echo $rv->min. ' - ' .$rv->max. ' = ' .$rv->value;?></td>
										<td width="150px">
											<a href="#" data-req_id="<?php echo $rv->id; ?>" class="btn btn-warning btn-xs editsubrange"
												data-min = "<?php echo $rv->min?>"
												data-max="<?php echo $rv->max?>"
												data-equivalent="<?php echo $rv->value?>"
												data-classification="<?php echo $r->classification?>"
												data-label="<?php echo $rv->label?>"
												data-rid="<?php echo $r->rid?>" 
												><i class="fa fa-edit"></i> Edit</a>
											<!--a href="#" data-req_id="<?php //echo $rv->id; ?>" class="btn btn-danger btn-xs remove"><i class="fa fa-times"></i> Remove</a-->
										</td>									
							<?php 
								$last_class_id = $rv->id;
							} ?>
									</tr>
								</table>	
							</td>
						</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>