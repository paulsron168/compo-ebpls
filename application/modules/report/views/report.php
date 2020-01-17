<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading">
	    			<h1>BIR REPORTS</h1>
	    		</div>
	    		<div class="panel-body">
	    			<?php
						echo ' Yearly Reports: <select name="getyear" id="month">';
						echo '<option value=0>--Select--</option>';	
							for ($m=2015; $m<=2025; $m++) {
						     $month2 = date('Y', mktime(0,0,0,$m,1, date('Y')));
						     $FullMonth = date('F', mktime(0,0,0,$m, 1, date('Y')));
		     				 echo '<option value='.$m.'>'.$m.'</option>';
		     				 //echo $month2;
		     				}
						echo '</select>'; 
				?>
				<br>
				<br>
					<div id="printthis">
						<table id="business_report" class="table table-striped table-bordered table-hover table-highlight" 
							data-provide="datatable" 
							data-display-rows="10"
							data-info="false"
							data-search="false"
							data-length-change="false"
							data-paginate="false"
						>
						
							<thead>
								<tr>
									<th>No</th>
									<th>Business Name</th>
									<th>Taxpayer</th>
									<th>Business Address</th>
									<th>Nature of Business</th>
									<th>Capital/Gross</th>
									<th>Status of Business</th>
									<th>Date of Registration</th>
									
									
								</tr>
							</thead>
							<tbody>
							</tbody> 
						</table>
					</div>
	    		</div>
	    		<div class="panel-footer">
	    		</div>
	    	</div>
	    </div>
	</div>
</div>