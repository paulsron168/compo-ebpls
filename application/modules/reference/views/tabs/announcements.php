<div class="tab-pane fade in" id="announcements">
	<div class="portlet">
		<div class="portlet-header">
			<h3><i class="fa fa-file-text"></i> Announcement List</h3>

			<ul class="portlet-tools pull-right">
				<li><a  data-toggle="modal" href="#new-announcements" class="btn btn-sm btn-warning add_new_announcement" title="Add Announcement"><i class="fa fa-plus-circle"></i></a></li>
				
			</ul>
		</div>
		<div class="portlet-content">
		<div id='announcement_content'>
			<table id="announcement_list" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable"
			data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
				>
				<thead>
					<tr>
						<th>Title</th>
						<th>Content</th>
						<th>Date Posted</th>
						<th>Username</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>				
						<?php if($announcement->num_rows() > 0) {
						foreach ($announcement->result() as $announce) { ?>
							<tr>
								<td><?php echo $announce->title; ?></td>
								<td><?php echo $announce->announce_content; ?></td>
								<td><?php echo $announce->created_at; ?></td>
								<td><?php echo $announce->added_by; ?></td>
							
						<td>
							<a href="#" title="Edit Announcement" class="btn btn-info btn-xs edit_announcement" data-announceid="<?php echo $announce->announce_id; ?>">
									<i class="fa fa-pencil"></i></a>
							<a href="#" title="Delete Announcement" class="btn btn-danger btn-xs remove_announcement" data-announceid="<?php echo $announce->announce_id; ?>" >
							<i class="fa fa-trash"></i></a>
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