

<div id="page-wrapper">
	<div class="row">
    <h2>CTC CORPORATE</h2> <br>
    
    <div class="tab-pane fade in active" id="ctcnibai">
	<div class="portlet">
		<div class="portlet-header">
			<h3><i class="fa fa-file-text"></i>CTC LIST</h3>

			<ul class="portlet-tools pull-right">
				<li>
					<a href="#new-ctc" title="Add CTC" class="btn btn-sm btn-warning add-corporate">
						<i class="fa fa-plus-circle"></i>&nbsp;Add CTC Here
					</a>
				</li>				
			</ul>
		</div>
		<div class="portlet-content">
			<table class="table table-striped table-bordered table-hover thistable" 				
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
                id="brgy"
			>
				<thead>
					<tr>
                        <th>CTC NO.</th>
                        <th>COMPANYNAME</th>
                        <th>Date Issued</th>
						<th>Total</th>
						<th>Interest</th>
						<th>Overall Total</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
                        <?php foreach ($viewctccorpo as $load) { ?>
							<tr>
                                <td><?php echo $load->id; ?></td>
                                <td><?php echo $load->companyname ?></td>
								<td><?php echo date('F d, Y', strtotime($load->date_issued)); ?></td>
								<td><?php echo $load->total; ?></td>
								<td><?php echo $load->interest; ?></td>
								<td><?php echo $load->overalltotal; ?></td>
								<td>
                                <a class="btn btn-primary btn-xs view_docu_corpo" data-businessid="<?php echo $load->id; ?>"  href="<?php echo base_url('ctc/view_ctc_corp/'.$load->id);?>"  target="_blank"><i class="fa fa-print"></i>&nbsp; Print Cedula</a>
								</td>
                            </tr>
                        <?php } ?>
						
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('ctc/modal/ctc_newcorporate'); ?>
