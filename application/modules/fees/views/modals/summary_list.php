<div id="summary_list" class="modal modal-styled fade">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 class="modal-title">Summary List</h3>
		</div>
		<?php echo form_open('', array('class' => 'form form-horizontal summary_list')); ?>
		<div class="modal-body">

			<div class="container detailsss">
				<div class="row"><div class="message" style="display:none"></div></div>
				<div class="row">
					<div class="col-sm-4">
						<p>OWNER: <strong><span class="owner"></span></strong></p>
					</div> <!-- End of Column -->
					<div class="col-sm-4">
						<p class=" hidden">BUSINESS: <strong><span class="business" ></span></strong></p>
					</div> <!-- End of Column -->
					<div class="col-sm-4">
						<p class="pull-left">&nbsp;&nbsp;BUSINESS ADDRESS: <strong><span class="address"></span></strong></p>
					</div> <!-- End of Column -->
				</div>
		
				<hr />
				<div class="row">
				<p>Please put some info here!</p>
		
		<table class="table table-striped table-bordered table-hover annual" >
		<center>
			<th>Permit Number</th>
			<th>Gross</th>
			<th>Business Nature</th>
			<th>Payment Type</th>
			<th>Payment </th>
		</center>
	
			<tfoot>
			<td colspan=5><center><i>End of Line</i></center></td>
			</tfoot>
		</table>
				</div>
			</div>
		</div>

		<div class="hidden-fields">
			<input type="hidden" name="application_id" value="2" />
		</div>
		<div class="messages">
			<div class="alert alert-danger fade in" style="margin: 20px; display: none;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p></p>
			</div>
		</div>
		<div class="modal-footer">
			<div class="action-block">
				<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
				<div class="submit-btn inline-block">
					<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
					<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-outline btn-info')); ?>
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div> <!-- End of Modal Content -->
</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->
