<div class="tab-pane fade in active" id="tfo">
	<div class="portlet">
		<div class="portlet-header">
			<h3><i class="fa fa-cubes"></i> TFO List</h3>
			<ul class="portlet-tools pull-right">
				<li><a href="#new-tfo" class="btn btn-sm btn-warning add-new-tfo" title="Add TFO"><i class="fa fa-plus-circle"></i> </a></li>
			</ul>
		</div>

		<div class="portlet-content">
			<table id="tfo" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable" 
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
			>
			
				<thead>
					<tr>
						<th>Description</th>
						<th>Default Amount</th>
						<th>Behavior</th>
						<th>Indicator</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if($tfo->num_rows() > 0) {
						foreach ($tfo->result() as $item) { ?>
							<tr>
								<td><?php echo $item->tfo; ?></td>
								<td><span class="pull-left">&#8369;</span><span class="pull-right"><?php echo number_format($item->amount, 2, '.', ','); ?></span></td> 
								<td class="text-center"><?php echo ($item->all == 0) ? 'Optional' : 'Applied to All'; ?></td>
								<td><?php echo ucfirst($item->types); ?></td>
								<td><?php echo ucfirst($item->tfotype); ?></td>
								<td>
									<a title="Edit TFO" href="#" class="btn btn-danger btn-xs diane" data-tfoid="<?php echo $item->tfo_id; ?>">
									<i class="fa fa-pencil"></i></a>
									 <!--a href="#" class="btn btn-danger btn-xs remove_tfo"data-tfoid="<?php echo $item->tfo_id;?>"><i class="fa fa-times"></i> Delete</a--> 
								</td>
							</tr>
						<?php }
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>