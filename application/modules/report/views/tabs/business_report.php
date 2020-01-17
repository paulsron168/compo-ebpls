<div class="tab-pane fade in active" id="business_report">
	<div class="portlet">
		<div class="owner-message"></div>		

		<div class="portlet-content">

			<!-- <table class="table table-striped table-bordered table-hover table-highlight"> -->
			<table id="business-report" class="table table-striped table-bordered table-hover table-highlight" 
				data-provide="datatable" 
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
			>
			
		<?php
			 echo ' Yearly Reports: <select name="getmonth" id="month">';
					for ($m=2014; $m<=2025; $m++) {
				     $month2 = date('Y', mktime(0,0,0,$m,1, date('Y')));
				     $FullMonth = date('F', mktime(0,0,0,$m, 1, date('Y')));
     				 echo '<option value='.$m.'>'.$m.'</option>';
     				 //echo $month2;
     				}
			echo '</select>'; 
		?>
			
			
			</table>

		</div> <!-- End of Portlet Content -->
	</div> <!-- End of Portlet -->
</div> <!-- End of Application Tab -->		