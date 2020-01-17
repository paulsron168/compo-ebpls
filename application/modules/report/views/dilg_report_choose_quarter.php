<style type="text/css">
	.forth{
		  color: #000;
		  font-weight: 600;
		  border: 1px solid #3a3a3a;
		 /* background-color: #444;*/
		  border-bottom-width: 2px;
	}
</style>
	<?php $data['quarters'] = dropdown_options($quarter, 'setting_id', 'field', 'Quarters');?>
	<div id="page-wrapper">
		<div class="row">
		    <div class="col-lg-12">
		    	<br>
		    	<div class="panel panel-success">
		    		<div class="panel-heading">
		    			<h1>DILG</h1>
		    		</div>
		    		<div class="panel-body">
		    			<div class="row">
		    				<div class="col-sm-4"> 
		    					<?php echo form_label('Year:', 'id', array('class' => 'col-sm-6  control-label')); ?>
				    			<?php
									echo '<select name="getyeardilg" id="month" class="form-control"> ';
											echo '<option value=0>Select Year</option>';	
											for ($m=2010; $m<=2025; $m++) {
										     $month2 = date('Y', mktime(0,0,0,$m,1, date('Y')));
										     $FullMonth = date('F', mktime(0,0,0,$m, 1, date('Y')));
						     				 echo '<option value='.$m.'>'.$m.'</option>';
						     				}
									echo '</select>';	
								?>
							</div>
							<div class="col-sm-4">
								<?php echo form_label('Quarters:', 'setting_id', array('class' => 'col-sm-4  control-label')); ?>
								<?php echo form_dropdown('setting_id', $data['quarters'], '', 'class="form-control"'); ?>
							</div>
							<div class="col-sm-4"><br>
								<a href="#" class="btn btn-outline btn-info get_report"><i class="fa fa-dot-circle-o"></i> Get Report</a>								
							</div>
						</div>
					</div>
		    	</div>
		    </div>
		</div>
	</div>