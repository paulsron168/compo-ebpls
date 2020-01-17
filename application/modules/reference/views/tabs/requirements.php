<div class="tab-pane fade in" id="requirements">
	<div class="portlet">
		<div class="reference-message"></div>

		<div class="portlet-header">
			<h3><i class="fa fa-table"></i> Requirement List</h3>
			<ul class="portlet-tools pull-right">
				<li>
					<a data-toggle="modal" href="#new-requirements" id="add-requirement" class="btn btn-sm btn-warning add-new-req" title=" Add Requirements">
						<i class="fa fa-plus-circle"></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="portlet-content">		
			<div id="requirement_content">
				<table id="requirement-list" class="table table-striped table-bordered table-hover thistable" 					
					data-display-rows="10"
					data-info="true"
					data-search="true"
					data-length-change="true"
					data-paginate="true"
				>
					<thead>
						<tr>
							<th>#</th>
							<th>Requirements</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody role="alert" aria-live="polite" aria-relevant="all">
						<?php if($requirements->num_rows() > 0) { $i = 1;
							foreach ($requirements->result() as $req) { ?>
								<tr>	

									<td><?php echo $i; ?></td>
									<td><?php echo ucfirst($req->description); ?></td>
									<td>
										<a title="Edit Requirement" href="#" data-req_id="<?php echo $req->id; ?>" class="btn btn-danger btn-xs editreq" name="button"><i class="fa fa-pencil"></i></a>
										 <!--a href="#" data-req_id="<?php echo $req->id; ?>" class="btn btn-danger btn-xs remove"><i class="fa fa-times"></i> Remove</a--> 
									</td>

								</tr>
							<?php $i++; }
						} ?>
					</tbody>
					
				</table>			
			</div>			
		</div>
	</div>
</div>


