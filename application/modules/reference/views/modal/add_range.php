<div id="new-range" class="modal modal-styled fade">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Range Form</h3>
			</div>

			<?php echo form_open('', array('class' => 'form-horizontal add-ranges-form', 'role' => 'form')); ?>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">								
								<div class="form-group">
									<?php echo form_label('Classification:', 'class', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8">
										<?php  echo form_dropdown('classification', $classification, '', 'class="form-control"'); ?>
									</div>
								</div>
								
								<div class="range-options2">
										<!--div class="form-group description"> 
											<?php //echo form_label('Description:', 'description', array('class' => 'col-sm-4 control-label')); ?>
												<div class="input-group col-sm-8">														
													<?php 
														//echo form_dropdown('business_nature',$business_nature2,'','class="form-control"');
													?>
												</div>
										</div-->
									 
									<div class="form-group">														
										<div class="range-form2">
										<h4 class="heading margin-bottom-0">Manage Amount Range</h4>
										
										<div class="row ranges2 text-center margin-top-5">
											<!-- Range will be stored here -->
										</div>
											<div class="row margin-top-10">
												<div class="form-group description"> 
													<label class="col-sm-4 control-label">Sub-Description: </label>
														<div class="input-group col-sm-8 padding-left-0">
															<span class="input-group-addon">S</span>
															<input type="text" class="form-control sub-desc" name="sub-desc" placeholder="Sub-Description" />
														</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label">Minimum: </label>
													<div class="input-group col-sm-8 padding-left-0">
														<span class="input-group-addon">&#8369;</span>
														<input type="text" class="form-control minimums"  placeholder="0.00" />
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label">Maximum: </label>
													<div class="input-group col-sm-8 padding-left-0">
														<span class="input-group-addon">&#8369;</span>
														<input type="text" class="form-control maximums" placeholder="0.00" />
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label">Equivalent: </label>
													<div class="input-group col-sm-8 padding-left-0">
														<span class="input-group-addon">&#8369;</span>
														<input type="text" class="form-control value"  placeholder="0.00" />
														<input type="hidden" class="form-control id" name="id" value="1" />
													 	<input type="hidden" class="form-control rid" name="rid"  /> 
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label"></label>
													<div class="input-group col-sm-8 padding-left-0">
														<a href="#" class="btn btn-info add-range2"><i class="fa fa-plus-circle"></i> Add Range</a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-8 no-reqt">
											<p class="msg"></p>
										</div>
									</div>		
								</div>
							</div>
						</div> <!-- End of Container -->
					</div> <!-- End of Modal Body -->
				
				<div class="messages">
					<div class="alert alert-danger fade in" style="margin: 20px; display: none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p></p>
					</div>
				</div>			
		</div> <!-- End of Modal Content -->
		<div class="modal-footer">
					<div class="action-block">
						<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
						<div class="submit-btn inline-block">
							<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
							<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-primary')); ?>
						</div>
					</div>
				</div>				
			<?php echo form_close(); ?>
		</div> <!-- End of Modal Dialog -->
	</div> <!-- End of New Application -->
</div>