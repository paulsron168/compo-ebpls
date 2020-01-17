<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading"><h1>DIY REPORT</h1></div>
	    		<div class="panel-body">
    				<?php /*echo form_open('', array(
    					'target' => "_blank",
						'class' => 'form-horizontal',
						'id' => 'diyreport',
						'role' => 'form',
						'action' =>site_url('report/get_diy_report')
					)); */?>
					<form target="_blank" method="post"  action="<?php echo site_url('report/get_diy_report'); ?>">
				
	    			<div class="portlet">
	    				<div class="portlet-header"><h4>Please choose the column that you want for your DIY(Do It Yourself) Report. </h4></div>
	    				<div class="portlet-content">
	    					<?php
	    						foreach($headers as $key => $v){?>
	    						<div class="col-lg-3">
		    						<div class="form-group"> 
		    							<label class="checkbox-inline">
		    								<input type="checkbox" name="headers[]" id="headers[]" value="<?php echo $key;?>"><?php echo $v;?>
		    							</label>
		    						</div>
	    						</div>
	    					<?php } ?>
	    					<div class="col-lg-12">
			    				<div class="form-group has-success">
			    					<div class="col-lg-4">
				                        <label class="control-label" for="inputSuccess">Type title of your Report</label>
			    					</div>
			    					<div class="col-lg-4">
			    						<input type="text" class="form-control" name = "report_title" id="report_title">
			    					</div>
			    					<div class="col-lg-4">
			    						<div class="action-block">
											<div class="submit-btn inline-block">
												<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
												<?php echo form_submit(array('value' => 'Get Report', 'class' => 'btn btn-outline btn-info')); ?>
											</div>
										</div>
			    					</div>
		                   		</div>
			    			</div>
	    				</div>
	    			</div>
	    			<input type="hidden" name="theheaders" id="theheaders">
	    			<input type="hidden" name="inputs" id="inputs">	    		
	    	</form>
		    		
	    		</div>
	    		<div class="panel-footer"><br>
	    		</div>
	    	</div>
	    </div>
	</div>	
</div>
