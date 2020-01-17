<?php echo form_open('', array(
	'class' => 'form-horizontal admin',
	'id' => 'form-admin',
	'role' => 'form'
)); ?>
<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading">
	    			<h1>BPLIS SETTINGS</h1>
	    		</div>
	    		<div class="panel-body">
	    			<?php foreach($admin as $a){?>
	    			<div class="col-lg-6">
						<div class="panel panel-success">
							<div class="panel-body">
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading">
												<h4 class="panel-title">
					                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $a->id?>"><?php echo $a->designation;?></a>
					                            </h4>
											<div id="<?php echo $a->id;?>" class="panel-collapse collapse">
												<div class="panel-body">
													<?php echo form_label('Firstname:', 'firstname', array('class' => 'col-sm-4 control-label')); ?>
													<?php echo form_hidden('id[]',$a->id);?>
													<?php echo form_input(array(
															'name' => 'firstname[]',
															'id' => 'firstname',
															'value' => $a->firstName,
															'placeholder' => 'First Name',
															'class' => 'form-control'
													)); ?>
													<?php echo form_label('Middlename:', 'middlename', array('class' => 'col-sm-4 control-label')); ?>
													<?php echo form_input(array(
															'name' => 'middlename[]',
															'id' => 'middlename',
															'value' =>  $a->middleName,
															'placeholder' => 'Middle Name',
															'class' => 'form-control'
													)); ?>
													<?php echo form_label('Lastname:', 'lastname', array('class' => 'col-sm-4 control-label')); ?>
													<?php echo form_input(array(
															'name' => 'lastname[]',
															'id' => 'lastname',
															'value' => $a->lastName,
															'placeholder' => 'Last Name',
															'class' => 'form-control'
													)); ?>
													<?php echo form_label('Designatin:', 'designation', array('class' => 'col-sm-4 control-label')); ?>
													<?php echo form_input(array(
															'name' => 'designation[]',
															'id' => 'designation',
															'value' => $a->designation,
															'placeholder' => 'Designatin',
															'class' => 'form-control'
													)); ?>
													<div class="panel-footer">
										    			<div class="action-block">
															<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
															<div class="submit-btn inline-block">
																<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
																<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-outline btn-info')); ?>
															</div>
														</div>
										    		</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
	    			<?php }?>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>
<?php echo form_close(); ?>
<?php $this->load->view('fees/modals/error'); ?>
