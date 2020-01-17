<div class="tab-pane fade in" id="surcharge">
	<div class="portlet">
		<div class="portlet-header">
			<h3><i class="fa fa-table"></i> <span>Interest/Surcharges</span></h3>
			<ul class="portlet-tools pull-right surcharge">
				<li><a   href="#surcharge" id="add-surchage" class="btn btn-sm btn-warning add_surcharge" title="Add Interest/Surcharge"><i class="fa fa-plus-circle"></i></a></li>
			</ul>
		</div>
		<div class="portlet-content">
			<!--div id="surcharge_content"-->
				<table id="surcharge-list" class="table table-striped table-bordered table-hover thistable" 
					data-display-rows="10"
					data-info="true"
					data-search="true"
					data-length-change="true"
					data-paginate="true"
				>
					<thead>
						<tr>
							<th>Date of Renewal</th>
							<th>Surcharge</th>
							<th>Interest</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>	
							<?php if($surcharge->num_rows() > 0) {
							foreach ($surcharge->result() as $item) { ?>
								<tr>
									<td><?php echo $item->date_renew; ?></td>
									<td><?php echo $item->surcharge; ?></td>
									<td><?php echo $item->interest; ?></td>
								
										<td>
										<a href="#" class="btn btn-danger btn-xs edit_surcharge" data-surchargeid="<?php echo $item->surcharge_id; ?>">
										<i class="fa fa-pencil"></i></a>
									 <!--a href="#" class="btn btn-danger btn-xs remove_surcharge" data-surchargeid="<?php echo $item->surcharge_id; ?>"><i class="fa fa-times"></i> Delete</a--> 
									</td>
								</tr>
							<?php }
						} ?>
						
					</tbody>
				</table>
			<!--/div-->
		</div>
	</div>
</div>
