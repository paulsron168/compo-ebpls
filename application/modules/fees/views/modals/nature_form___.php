<div id="edit-business-nature" class="modal modal-styled fade">
	<div class="modal-dialog width-900-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Update Application</h3>
			</div>
				<div class="modal-body">
					<div class="container">

					<!--This content has been modified by boloi-->
					<?php /* echo form_open('', array(
						'class' => 'form-horizontal',
						'id'	=> 'form-edit-gross',
						'role' => 'form'
					));  */?>
					<table id="nature-list" class="table table-striped table-bordered table-hover table-highlight">
						<thead>
							<tr>
								<th width="33%">Business Nature</th>
								<th width="40%" class="capital_header" style="display:none">Capital</th>
								<th width="50%" class ="gross_header"  style="display:none">Gross</th>
								<!-- <th width="10%" class ="weights" style="display:none">Weights & Measures</th> -->
								<th width="20%" class="action_header" style="display:none">Action</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
					<?php //echo form_close();?>
					<?php echo form_open('', array(
						'class' => 'form-horizontal',
						'id'	=> 'add-business-lines',
						'role' => 'form'
					)); ?>
						<div class="row new_app" style="display:none">
							<div class="col-sm-12">
								<!--h5>Add new Business Nature</h5-->
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<?php echo form_label('', 'buss_nature_id', array('class' => 'col-sm-4 control-label' )); ?>
									<div class="col-sm-8">
										<?php echo form_dropdown('buss_nature_id', $nature, '','class="form-control business-nature" id="buss_nature_id"'); ?>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
										<?php echo form_label('Capital Investment:', 'capital', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-4 input-group">
											<span class="input-group-addon">₱</span>
											<?php echo form_input(array(
												'name' => 'capital',
												'id' => 'capital',
												'placeholder' => '0.00',
												'class' => 'form-control add-capital'
											)); ?>
										</div>
										<a href="#" class="btn btn-outline btn-info add-nature">Add</a>
								</div>
							</div>
						</div>
						
						<div class="row enter_gross" style="display:none">
							<div class="col-sm-12">
								<!--h5>Add new Business Nature</h5-->
							</div>
							<!--div class="col-sm-5">
								<div class="form-group">
									<div class="col-sm-8">
										<?php //echo form_dropdown('buss_nature_id', $nature, '','class="form-control business-nature" id="buss_nature_id"'); ?>
									</div>
								</div>
							</div-->
							<div class ="col-sm-7 hidden-info">
								<!--div class="form-group"-->
									<!--div class="col-sm-6 input-group"-->
										<!--span class="input-group-addon">₱</span-->
										<?php /* echo form_input(array(
											'name' => 'gross',
											'id' => 'gross',
											'placeholder' => '0.00',
											'class' => 'form-control add-gross'
										));  */?>
										<!--input type ="hidden"  name ="year" id ="year"/-->
										<input type ="hidden"  name ="bus_line_id" id ="bus_line_id"/>
										<input type ="hidden"  name ="app_id" id ="app_id"/>
										<input type ="hidden"  name ="bl_buss_id" id ="bl_buss_id"/>
									<!--/div-->
									<!--a href="#" class="btn btn-info add-gross"><i class="fa fa-dot-circle-o"></i>Save</a-->
								<!--/div-->
							</div>
						</div>
						<div class="row buss_reqt" style="display:none">
							<h5>Business Requirements:</h5>
							<div class="requirement-list"></div>
						</div>
					</div>
				</div>

				<div class="messages">
					<div class="alert alert-danger fade in msg" style="margin: 20px; display:none">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p class="msgs"></p>
					</div>
				</div>
				<div class="modal-footer">
					<div class="action-block">
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
