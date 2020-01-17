<div class="tab-pane fade in" id="signatories">
	<div class="portlet">
		<div class="portlet-header">
			<h3><i class="fa fa-file-text"></i> Signatory List</h3>

			<ul class="portlet-tools pull-right">
				<li><a href="#new-signatories" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Add Signatory</a></li>
				
			</ul>
		</div>
		<div class="portlet-content">
			<table class="table table-striped table-bordered table-hover table-highlight">
				<thead>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Office</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($signatory->num_rows() > 0) {
						foreach ($signatory->result() as $s) { ?>
					<tr>
						<td><?php echo "name"; ?></td>
						<td><?php echo "admin"; ?></td> 
						<td><?php echo "geoplan"; ?></td>
						<td>
							<a href="" class="btn btn-warning btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
							<a href="" class="btn btn-danger btn-xs remove"><i class="fa fa-times"></i> Remove</a>
						</td>
					</tr>
					<?php }
				} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>