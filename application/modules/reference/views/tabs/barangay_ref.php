<div class="tab-pane fade in active" id="barangay_ref">
	<div class="portlet">
		<div class="portlet-header">
			<h3><i class="fa fa-file-text"></i> Barangay List</h3>

			<ul class="portlet-tools pull-right">
				<li>
					<a href="#add-barangay" title="Add Barangay" class="btn btn-sm btn-warning add-new-barangay">
						<i class="fa fa-plus-circle"></i>
					</a>
				</li>				
			</ul>
		</div>
		<div class="portlet-content">
			<table class="table table-striped table-bordered table-hover table-highlight thistable" 				
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
				id="brgy" 
			>
				<thead>
					<tr>
						<th>Barangay Name</th>
						<!-- <th>Code</th> -->
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if($barangay->num_rows() > 0) {
						foreach ($barangay->result() as $b) { ?>
							<tr>
								<td><?php echo ucfirst($b->brgy); ?></td>
								<!--td><?php echo $b->code; ?></td-->
								<td>
									<a href="#" class="btn btn-info btn-xs edit-barangay" data-bid="<?php echo $b->brgy_id;?>" title="Edit Barangay"><i class="fa fa-pencil"></i></a>
									<!--a href="#" class="btn btn-danger btn-xs remove_brgy" data-bid="<?php echo $b->brgy_id;?>"><i class="fa fa-times"></i> Remove</a-->
								</td>
							</tr>
						<?php }
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>