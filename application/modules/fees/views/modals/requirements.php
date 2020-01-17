<div id="requirements" class="modal modal-styled fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Requirements</h3>
			</div>
			<?php echo form_open('', array('class' => 'form form-horizontal requirements')); ?>
			<div class="modal-body">

				<div class="container detailss">
					<div class="row"><div class="message" style="display:none"></div></div>
					<div class="row">
						<div class="col-sm-4">
							<p>OWNER: <strong><span class="owner"></span></strong></p>
						</div> <!-- End of Column -->
						<div class="col-sm-4">
							<p>BUSINESS: <strong><span class="business"></span></strong></p>
						</div> <!-- End of Column -->
						<div class="col-sm-4">
							<p class="pull-left">&nbsp;&nbsp;BUSINESS ADDRESS: <strong><span class="address"></span></strong></p>
						</div> <!-- End of Column -->
					</div>
					<hr />
					<div class="row">
					<div id="checkboxlist">
						<div class="col-md-12 buss_info" style="display:none">
						
						</div>
							
						<div class="col-md-5 business-nature-gross">
							Please check the requirements that was already passed : <br><br>
							<table border="2" class="table" style="margin-left:50%;">
							<th>	
								<td>Confirm</td>
								<td>Not Applicable</td>
							
							</th>
							<tbody>
						
								<?php 
								$i = 0;
								foreach($reqs as $r){	
									$i++;	
										echo '<tr>'; 						
										echo '<td style="text-transform:uppercase">'.$i.'.&nbsp;&nbsp;'.$r->description.'</td>';
										echo '<td><input type="checkbox" class="chk" id="reqsss1" name="reqyes'.$r->requirement_id.'" value="'.$r->requirement_id.'">';
										echo '<td><input type="checkbox" class="chk" id="reqsss2" name="reqyess'.$r->requirement_id.'" value="'.$r->requirement_id.'">';
										echo '</tr>'; 									
									}
								?>
							
							</tbody>
							</table>
				 

							
							<input type="button" style="margin-left:504px;" class="btn btn-primary" value="Click First Before Saving" id="buttonParent1" onclick="getValueUsingParentTag()">

							<input type="hidden" id="buttonAdd" name="require" readonly>
							<input type="hidden" id="buttonNA" name="not_require" readonly>
							<input type="hidden" id="appid" name="appid" readonly>
							
						</div>
						</div>
						<div class="col-md-5 checkk" style="display:none; margin-left:5%; margin-top:5%;">
						<img src="<?php echo base_url('assets/img/check.gif'); ?>" width="50%" height="50%" style="float:right;">
						</div>
					</div>
					

				</div>
			</div>

			<div class="hidden-fields">
				<input type="hidden" name="application_id" value="2" />
			</div>
			<div class="messages">
				<div class="alert alert-danger fade in" style="margin: 20px; display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>teststset</p>
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

