<!-- <div id="page-wrapper"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading"><h1><?php echo $report_title;?></h1></div>
	    		<div class="panel-body">
	    			<div class="portlet">

	    				<div class="portlet-content">
	    					<?php if(!empty($choosen_headers)){  ?>
	    					<table id="diy-report" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable"
								data-display-rows="10"
								data-info="true"
								data-search="true"
								data-length-change="true"
								data-paginate="true"
							>
							<thead>
								<tr>
									<?php foreach($choosen_headers as $value){	?>
										<th style="font-size:12px" rowspan="2" align="center"><?php echo $value;?></th>
			    					<?php } ?>
	    						</tr>
	    					</thead>
	    					<tbody>
	    						<?php
								$girls = 0;
								$boys = 0;
								$g = 0;
								$gtotal = 0;
								$capital = 0;
								  foreach ($result as $key =>$value) { ?>
	    							<tr>
	    								<?php
	    									foreach ($value as $key1 => $value1) {
													if($value1 == '1'){ echo "<td>".'Male'."</td>"; }
													elseif($value1 == '2') { echo "<td>".'Female'."</td>"; }
													elseif($key1 == 'gross'){
														if(empty($key)){
																	echo "<td>-</td>";
																}else{
														$gross = json_decode($value1,true);
															foreach($gross as $g){
																	$gtotal += $g['gross'];
																}
																	echo "<td>".$g['gross'] ."</td>";
															}
														// echo "<td>haha</td>";
														
													}
													else { echo "<td>".$value1."</td>"; }
													
													// print_r($result);
													
	    									}
	    								?>
	    							</tr>
	    					<?php
							if(!empty($value->gender)){

							// }
													$aaa = $value->gender == '2';
													$girls += $aaa;
													$bbb = $value->gender == '1';
													$boys += $bbb;
							}elseif(!empty($value->capital)){
							
							$capital += $value->capital;
							}
							 } ?>
	    					</tbody>
							
	    					</table>
							<?php 
							
							if(!empty($value->gender)){ 
								 //var_dump($result);
								 	 echo '<p>';
									 echo '<br>';
									 echo 'Total number of Female: '.$girls;
									 echo '<br>';
									 echo 'Total number of Male: '.$boys;  
									 echo '<br>';
									  }
							if($gtotal != '0'){
								 echo 'Total Gross: &#8369;'.number_format($gtotal,2);
								 echo '<br>';
							}
							
							if($capital != '0'){
								echo 'Total Capital: &#8369;'.number_format($capital,2);
								echo '<br>';
								echo '</p>';
							}
						
									 
							} ?>
	    				</div>
	    			</div>
	    			<input type="hidden" name="theheaders" id="theheaders">
	    		</div>
	    		<div class="panel-footer"><br>
	    		</div>
	    	</div>
	    </div>
	</div>
<!-- </div> -->
