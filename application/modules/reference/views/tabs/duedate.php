<div class="tab-pane fade in" id="duedate">
	<div class="portlet">
		<div class="portlet-header">
			<h3><i class="fa fa-file-text"></i> Due Dates</h3>

			<ul class="portlet-tools pull-right">
				<li>
					<a id="add-duedate" title="Add Due Date" class="btn btn-sm btn-warning add-new-duedate">
						<i class="fa fa-plus-circle"></i>
					</a>
				</li>				
			</ul>
		</div>
		<div class="portlet-content">
		<div id="duedate_content">
			<table id="list-duedate" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable" 				
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
				id="duedatetable" 
			>
				<thead>
					<th>Due For</th>
					<th>Due Date</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php if ($duedates->num_rows() > 0) {
						foreach ($duedates->result() as $d) { ?>
					<tr>
						<td><?php echo ucfirst($d->field); ?>
						</td>
						
						<td><?php echo $d->value; ?>
						</td>
						
						<td>
						<a href="#" class="btn btn-info btn-xs edit-duedate" title = "Edit Due Date" id="girlie" data-ddid="<?php echo $d->setting_id; ?>">
						<i class="fa fa-pencil"></i></a>
						<a href="#" class="btn btn-danger btn-xs remove_duedate "data-ddid="<?php echo $d->setting_id;?>" title="Delete Due Date"><i class="fa fa-trash"></i></a>
						</td>

					</tr>
					<?php }
				} ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>