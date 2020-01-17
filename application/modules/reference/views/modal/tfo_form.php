<div id="add_tfo" class="modal modal-styled fade in">
	<div class="modal-dialog width-700-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">TFO Chargess</h3>
			</div>

			<?php echo form_open('', array(
				'class' => 'form-horizontal',
				'id' => 'add-tfo-form'
			)); ?>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<?php //echo form_hidden('buss_nature_id', '');
							  echo form_hidden('req_tfo_id', '');
						?>
							<input type="hidden" name="buss_nature_id" id="ambot">
						<input type="hidden" name="application_id" id="ambot2">
						<div class="col-sm-5">
							<div class="form-group">
								<?php echo form_label('TFO:', 'tfo_id', array('class' => 'col-sm-4 control-label text-right')); ?>
								<div class="col-sm-8 padding-left-0">
									<?php
										if($tfo->num_rows() > 0) { $i = 0;
											$result[$i] = 'Select Required TFO';
											foreach ($tfo->result() as $item) {
												$result[$item->tfo_id] = ucfirst($item->tfo).' - ('.ucfirst($item->types).')';
											}
										} else {
											$result = array('0' => 'No List');
										}
									?>
									<?php echo form_dropdown('tfo_id', $result,'','class="form-control tfoid"'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo form_label('Transaction:', 'application_id', array('class' => 'col-sm-4 control-label text-right')); ?>
								<div class="col-sm-8 padding-left-0">
									<?php echo form_dropdown('application_id',
										dropdown_options($application, 'application_id', 'types', 'Application Type'),
										'',
										'class="form-control"'
									); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo form_label('Behavior:', 'type', array('class' => 'col-sm-4 control-label text-right')); ?>
								<div class="col-sm-8 padding-left-0">
									<?php echo form_dropdown('type',
										array(
											'' => 'Select Behavior Type',
											'1' => 'Constant Value',
											'2' => 'Formula Type',
											'3' => 'Amount Range'
										),
										2,
										'class="form-control tfo-behavior"'
									); ?>
								</div>
							</div>

							<div class="tfo-options">
								<div class="form-group tfo-value">
									<?php echo form_label('Value:', 'value', array('class' => 'col-sm-4 control-label')); ?>
									<div class="input-group col-sm-8 padding-left-0 behavior-1">
										<span class="input-group-addon">&#8369;</span>
										<?php echo form_input(array(
											'name' => 'value',
											'id' => 'value',
											'placeholder' => 0.00,
											'class' => 'col-sm-4 form-control'
										)); ?>
									</div>
								</div>
								<div class="form-group type" style="display:none">
									<?php echo form_label('Type: ', 'type', array('class' => 'col-sm-4 control-label')); ?>
									<div class="col-sm-8 padding-left-0 pull-right">
										<input type="radio" name="chosentype" id="chosentype" value="1" /> Range
										<input type="radio" name="chosentype" id="chosentype" value="2"/> Formula
										<input type="radio" name="chosentype" id="chosentype" value="4"/> Meter
										<input type="radio" name="chosentype" id="chosentype" value="5"/> Kg
										<input type="radio" name="chosentype" id="chosentype" value="6"/> Liter
										<input type="radio" name="chosentype" id="chosentype" value="7"/> Tons

									</div>
								</div>
								<div class="range-form" style="display: none;">
									<h4 class="heading margin-bottom-0">Manage Amount Range</h4>

									<div class="row ranges text-center margin-top-5">
										<!-- Range will be stored here -->
									</div>

									<div class="row margin-top-10">
										<div class="form-group">
											<label class="col-sm-4 control-label">Minimum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="min" class="form-control min" placeholder="0.00" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Maximum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="max" class="form-control max" placeholder="0.00" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Equivalent: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="val" class="form-control val" placeholder="0.00" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label"></label>
											<div class="input-group col-sm-8 padding-left-0">
												<a href="#" class="btn btn-info add-range"><i class="fa fa-plus-circle"></i> Add Range</a>
											</div>
										</div>
									</div>
								</div>

								<div class="formula-form" style="display: none;">
									<h4>Formula Manager</h4>
									<div class="form-group">
										<?php echo form_label('Variables: ', 'variables', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8 padding-left-0">
											<div class="variables">
												<div class="block-level">
													<label class="col-sm-3 control-label">$C</label>
													<label class="col-sm-1 control-label"> = </label>
													<label class="col-sm-8 text-left control-label"> Capital Investment </label>
													<input type="hidden" name="variable[]" value="" />
												</div>
												<div class="variable-items"></div>

												<div class="selections block-level" style="display: none">
													<label class="col-sm-3 control-label">$<span class="variable-item"></span></label>
													<label class="col-sm-1 control-label"> = </label>
													<label class="col-sm-8 text-left control-label">
														<select id="tfo-select">
															<?php if($tfo->num_rows() > 0) {
																foreach ($tfo->result() as $item) { ?>
																	<option value="<?php echo ucfirst($item->amount); ?>"><?php echo ucfirst($item->tfo); ?></option>
																<?php }
															} ?>
														</select>
														<span class="btn btn-xs btn-info save-variable margin-top-3-n">Save</span>
													</label>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label"></label>
										<div class="col-sm-8 padding-left-0">
											<a href="#" class="btn btn-info btn-xs add-variable"><i class="fa fa-plus-circle"></i> Add Variable</a>
										</div>
									</div>

									<div class="form-group">
										<?php echo form_label('Formula: ', 'formula', array('class' => 'col-sm-4 control-label')); ?>
										<div class="col-sm-8 padding-left-0 pull-right">
											<input type="text" name="formula" placeholder="$C*0.02" class="form-control" />
											<p class="help-block">
												<small class="text-muted short-input">
													<span class="text-danger">Important! Put the '$' symbol before each variable.</span><br>
													SYSTEM WILL DETECT IF IT'S CAPITAL OR GROSS NEVER MIND THE VARIABLE NAME<br>
													Use <b>+</b> and <b>-</b> for addition and subtraction respectively.<br>
													Use <b>*</b> for multiplication.<br>
													Use <b>/</b> for division.<br>
													You may also use parenthesis to group terms.
												</small>
											</p>
										</div>
									</div>
								</div>
								<div class="range-formula-form" style="display: none;">
									<h4 class="heading margin-bottom-0">Formula For Beyond Range Manager</h4>

									<div class="row ranges-formula text-center margin-top-5">
										<!-- Range will be stored here -->
									</div>

									<div class="row margin-top-10">
										<div class="form-group">
											<?php echo form_label('Maximum: ', 'max', array('class' => 'col-sm-4 control-label')); ?>
											<div class="col-sm-8 padding-left-0 pull-right">
												<input type="text" class="form-control maximum" placeholder="0.00" value="0" />
											</div>
										</div>
										<div class="form-group">
											<?php echo form_label('Minimum: ', 'min', array('class' => 'col-sm-4 control-label')); ?>
											<div class="col-sm-8 padding-left-0 pull-right">
												<input type="text" class="form-control minimum" placeholder="0.00" value="0" />
											</div>
										</div>
										<div class="form-group">
											<?php echo form_label('Base: ', 'base', array('class' => 'col-sm-4 control-label')); ?>
											<div class="col-sm-8 padding-left-0 pull-right">
												<!--input type="text" name="base" placeholder="Put 0 if none" class="form-control" /-->
												<input type="text" class="form-control base" placeholder="0.00" value="0"/>
											</div>
											<div class="col-sm-8 padding-left-0 pull-right">
												<input type="hidden" class="form-control type" placeholder="0.00" value="formula"/>
											</div>
										</div>

										<!-- <div class="form-group">
											<?php echo form_label('Excess: ', 'excess', array('class' => 'col-sm-4 control-label')); ?>
											<div class="col-sm-8 padding-left-0 pull-right">
												input type="text" name="excess" placeholder="Put 0 if none" class="form-control" /
												<input type="text" class="form-control excess" placeholder="0.00" />
											</div>
										</div>	 -->

										<div class="form-group">
											<?php echo form_label('$E1: ', 'excess1', array('class' => 'col-sm-4 control-label')); ?>
											<div class="col-sm-8 padding-left-0 pull-right">
												<!--input type="text" name="excess" placeholder="Put 0 if none" class="form-control" /-->
												<input type="text" class="form-control excess1" placeholder="0.00" value="0" />
											</div>
										</div>

										<div class="form-group">
											<?php echo form_label('$E2: ', 'excess2', array('class' => 'col-sm-4 control-label')); ?>
											<div class="col-sm-8 padding-left-0 pull-right">
												<!--input type="text" name="excess" placeholder="Put 0 if none" class="form-control" /-->
												<input type="text" class="form-control excess2" placeholder="0.00" value="0" />
											</div>
										</div>

										<div class="form-group">
											<?php echo form_label('($V)Value Added every $E2: ', 'valueadded', array('class' => 'col-sm-4 control-label')); ?>
											<div class="col-sm-8 padding-left-0 pull-right">
												<!--input type="text" name="excess" placeholder="Put 0 if none" class="form-control" /-->
												<input type="text" class="form-control valueadded" placeholder="0.00" value="0" />
											</div>
										</div>

										<div class="form-group">

											<?php echo form_label('Formula: ', 'formula', array('class' => 'col-sm-4 control-label')); ?>
											<div class="col-sm-8 padding-left-0 pull-right">
												<!--input type="text" name="formula2" placeholder="$C*0.02" class="form-control" /-->
												<input type="text" class="form-control formulab" placeholder="$C*0.02" />
												<p class="help-block">
													<small class="text-muted short-input">
														<span class="text-danger">Important! Sample Formula for TFO's with excess.</span><br>
														((($C-$E1)/$E2)* $V)<br>
														Where $C - is the capital or the gross<br>
																Ex. For every 5000($E2) in excess of 50000($E1)<br>
															  $V - is the value added for every $E2
													</small>
												</p>
												<p class="help-block">
													<small class="text-muted short-input">
														<span class="text-danger">Important! Put the '$' symbol before each variable.</span><br>
														SYSTEM WILL DETECT IF IT'S CAPITAL OR GROSS NEVER MIND THE VARIABLE NAME<br>
														Use <b>+</b> and <b>-</b> for addition and subtraction respectively.<br>
														Use <b>*</b> for multiplication.<br>
														Use <b>/</b> for division.<br>
														You may also use parenthesis to group terms.
													</small>
												</p>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label"></label>
										<div class="input-group col-sm-8 padding-left-0">
											<a href="#" class="btn btn-info add-formula"><i class="fa fa-plus-circle"></i> Add Formula</a>
										</div>
									</div>
								</div>
								<div class="range-meter-form" style="display: none;">
									<h4 class="heading margin-bottom-0">Manage Amount Range for Meter/s</h4>

									<div class="meter text-center margin-top-5">
										<!-- Range will be stored here -->
									</div>

									<div class="row margin-top-10">
										<div class="form-group">
											<label class="col-sm-4 control-label">Meter Minimum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="metmin" class="form-control metmin" placeholder="0" value="0"/>
											</div>
											<div class="col-sm-8 padding-left-0 pull-right">
												<input type="hidden" class="form-control type" id="type" placeholder="0.00" value="meter"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Meter  Maximum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="metmax" class="form-control metmax" placeholder="0" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Equivalent: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="metval" class="form-control metval" placeholder="0.00" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label"></label>
											<div class="input-group col-sm-8 padding-left-0">
												<a href="#" class="btn btn-info add-meter"><i class="fa fa-plus-circle"></i> Add Range</a>
											</div>
										</div>
									</div>
								</div>
								<div class="range-kg-form" style="display: none;">
									<h4 class="heading margin-bottom-0">Manage Amount Range for Kg/s</h4>

									<div class="kg text-center margin-top-5">
										<!-- Range will be stored here -->
									</div>

									<div class="row margin-top-10">
										<div class="form-group">
											<label class="col-sm-4 control-label">Kg Minimum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="kgmin" class="form-control kgmin" placeholder="0" value="0"/>
											</div>
											<div class="col-sm-8 padding-left-0 pull-right">
												<input type="hidden" class="form-control kgtype" id="hectype" placeholder="0.00" value="kg"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Kg  Maximum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="kgmax" class="form-control kgmax" placeholder="0" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Equivalent: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="kgval" class="form-control kgval" placeholder="0.00" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label"></label>
											<div class="input-group col-sm-8 padding-left-0">
												<a href="#" class="btn btn-info add-kg"><i class="fa fa-plus-circle"></i> Add Range</a>
											</div>
										</div>
									</div>
								</div>
								<div class="range-lit-form" style="display: none;">
									<h4 class="heading margin-bottom-0">Manage Amount Range for Liter/s</h4>

									<div class="lit text-center margin-top-5">
										<!-- Range will be stored here -->
									</div>

									<div class="row margin-top-10">
										<div class="form-group">
											<label class="col-sm-4 control-label">Liter Minimum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="litmin" class="form-control litmin" placeholder="0" value="0"/>
											</div>
											<div class="col-sm-8 padding-left-0 pull-right">
												<input type="hidden" class="form-control littype" id="littype" placeholder="0.00" value="liter"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Liter  Maximum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="litmax" class="form-control litmax" placeholder="0" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Equivalent: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="litval" class="form-control litval" placeholder="0.00" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label"></label>
											<div class="input-group col-sm-8 padding-left-0">
												<a href="#" class="btn btn-info add-lit"><i class="fa fa-plus-circle"></i> Add Range</a>
											</div>
										</div>
									</div>
								</div>

								<div class="range-ton-form" style="display: none;">
									<h4 class="heading margin-bottom-0">Manage Amount Range for Ton/s</h4>

									<div class="ton text-center margin-top-5">
										<!-- Range will be stored here -->
									</div>

									<div class="row margin-top-10">
										<div class="form-group">
											<label class="col-sm-4 control-label">Ton Minimum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="tonmin" class="form-control tonmin" placeholder="0" value="0"/>
											</div>
											<div class="col-sm-8 padding-left-0 pull-right">
												<input type="hidden" class="form-control tontype" id="tontype" placeholder="0.00" value="ton"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Ton  Maximum: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="tonmax" class="form-control tonmax" placeholder="0" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Equivalent: </label>
											<div class="input-group col-sm-8 padding-left-0">
												<span class="input-group-addon">&#8369;</span>
												<input type="text" id="tonval" class="form-control tonval" placeholder="0.00" value="0" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label"></label>
											<div class="input-group col-sm-8 padding-left-0">
												<a href="#" class="btn btn-info add-ton"><i class="fa fa-plus-circle"></i> Add Range</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="messages">
				<div class="alert alert-danger fade in msg" style="margin: 20px; display:none">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p></p>
				</div>
			</div>
			<div class="modal-footer">
				<div class="action-block">
					<?php echo form_reset(array('value' => 'Reset', 'class' => 'btn btn-default')); ?>
					<div class="submit-btn inline-block">
						<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
						<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-outline btn-info')); ?>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
