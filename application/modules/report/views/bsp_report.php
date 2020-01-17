<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading">
	    			<h1>BSP REPORT</h1>
	    		</div>
	    		<div class="panel-body">
	    			<div class="row">
	    				<div class="col-sm-2">
	    					<b>Yearly Reports: </b>
	    				</div>
	    					<form target="_blank" method="post"  action="<?php echo site_url('report/report/bsp_report_search'); ?>">
			    				<div class="col-sm-3">
				    					<select name="getyear" id="month" class="form-control">
				    						<option value="0">--Select--</option>
						    			<?php
												for ($m=2012; $m<=2025; $m++) {
												     $month2 = date('Y', mktime(0,0,0,$m,1, date('Y')));
												     $FullMonth = date('F', mktime(0,0,0,$m, 1, date('Y')));
								     				 echo '<option value='.$m.'>'.$m.'</option>';
							     				}
										?>
										</select>
			    				</div>
			    				<div class="col-sm-4">
										<img class="loader margin-lr-10" style="display: none" src="<?php //echo base_url('assets/img/ajax-loader.gif'); ?>">
										<?php echo form_submit(array('value' => 'Get Report', 'class' => 'btn btn-outline btn-info')); ?>
		    					</div>
    					</form>
	    			</div>
				<br>
				<br>
	    		</div>
	    		<div class="panel-footer">
	    		</div>
	    	</div>
	    </div>
	</div>
</div>