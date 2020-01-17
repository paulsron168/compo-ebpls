<?php
header("content-type: text/html; charset=UTF-8"); 
$conn = mysqli_connect('localhost','root','','jcit_ebpls_compostela');

if(isset($_GET['btnSearch'])){

	$search = $_GET['searchname'];
	if($search==null){
		header('location: fees');
	}else{
		$q4 = "SELECT b.buss_id,b.permit_number,a.app_id,b.owner_id,o.firstname,
		o.middlename,o.lastname, o.permitee,b.application_id,b.business_name,b.ownership_id,
		b.closed FROM jcit_applications a
		left join jcit_businessess b on a.buss_id = b.buss_id
		left join jcit_owners o on b.owner_id = o.owner_id
		where b.permit_number LIKE '".$search."%' 
		OR b.business_name LIKE '%".$search."%' 
		OR concat(o.firstname,' ',o.lastname) LIKE '%".$search."%' 
		OR o.permitee LIKE '%".$search."%'
		group by b.permit_number
		ORDER BY b.permit_number ASC";
	
	$conq4 = mysqli_query($conn,$q4);
	//$taxpayers2 = mysqli_fetch_assoc($conq4);

	$taxpayers2 = mysqli_num_rows($conq4);
	}

}



?>

<style>
.uploadchurvalo{
	width:20%;
}
.churvalo1{
	background-color:black;
}
</style>

<div class="tab-pane fade in active" id="application">
	<div class="portlet">
		<!-- <div class="owner-message"></div> -->
		<div class="portlet-header">
		<ul class="portlet-tools pull-left">
		<h3><i class="fa fa-user"></i>Application</h3>
		</ul>
		<form method="GET" action="">

			<ul class="portlet-tools pull-right">
				<li><a data-toggle="modal" href="#new-application" class="btn btn-primary" title="New Business Application"><i class="fa fa-plus-circle"></i> New Application</a></li>
				<li><input type="text" placeholder="Search here" class="form-control" name="searchname">
				<li>&nbsp;<button type="submit" name="btnSearch" class="btn bnt-outline btn-success"><i class="glyphicon glyphicon-search"></i></li>
</li>
			</ul>
		</div>

		<div class="portlet-content">

			<table id="business-application" class="table table-striped table-bordered table-hover  no-footer dtr-inline"
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
			>

				<thead>
					<tr>
						<th>Permit Number</th>
						<th>Business Name</th>
						<th>Business Owner</th>
						<!-- <th>Last Application</th> -->
						<th>Application Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					<?php  if (!empty($taxpayers) && empty($taxpayers2)) {
						foreach ($taxpayers as $t) { 
							
							
							?>
							<tr>
								<td><strong><?php echo $t->permit_number; ?></strong></td>
								<td>
									<a class="btn btn-xs edit-business" href="#" data-bussid="<?php echo $t->buss_id; ?>" data-appid="<?php echo $t->app_id; ?>">
										<?php echo wordwrap(trim($t->business_name),24,'<br>'); ?>
									</a>
								</td>

								<?php if ($t->ownership_id=="3"){  ?>
								<td>
									<a class="btn btn-xs edit-owner" href="#" data-ownerid="<?php echo $t->owner_id; ?>" data-businessid="<?php echo $t->buss_id; ?>">
										<?php echo wordwrap(ucfirst($t->firstname). ' '.ucfirst($t->middlename).' '.ucfirst($t->lastname),24,'<br>'); ?>
									</a>
								</td>
								<?php } else {?>
								<td>
									<a class="btn btn-xs edit-owner" href="#" data-ownerid="<?php echo $t->owner_id; ?>" data-businessid="<?php echo $t->buss_id; ?>">
										<?php echo wordwrap($t->permitee != "N/A" ? ucfirst($t->permitee) : ucfirst($t->firstname). ' '.ucfirst($t->middlename).' '.ucfirst($t->lastname),24,'<br>'); ; ?>
									</a>
								</td>
								<?php } ?>
								
								<td><?php if($t->application_id == 1){ echo 'New';}else if($t->application_id==2){echo 'Renew';}else{ echo 'Please check this';}echo ' Application'; ?></td>
								<td>
									
									<!--a  data-toggle="modal"  href="#renew" alt="Renew" title="Renew" class="btn btn-success btn-xs"><i class="fa fa-file"></i></a-->
									<?php //if($t->status == 'renewed') {?>

							<?php if($t->closed==1){?>
									<a href="#" title="edit" class="btn btn-danger btn-xs">CLOSED</a>	
									<!-- <a href="#" title="edit" class="btn btn-info btn-xs retire_pay" data-appid="<?php echo $t->app_id; ?>">PAY</a>	 -->
									<a alt="View" title="View"  class="btn btn-primary btn-xs view_app" data-businessid="<?php echo $t->buss_id; ?>"  href="<?php echo base_url('fees/view_application/'.$t->buss_id);?>"   target="_blank"><i class="fa fa-eye"></i> VIEW</a>									
				
							<?php } else if($t->closed==2){?>
									<a href="#" title="edit" class="btn btn-danger btn-xs">CLOSED</a>	
									<!-- <a href="#" title="edit" class="btn btn-info btn-xs retire_pay" data-appid="<?php echo $t->app_id; ?>">PAY</a>	 -->
									<a alt="View" title="View"  class="btn btn-primary btn-xs view_app" data-businessid="<?php echo $t->buss_id; ?>"  href="<?php echo base_url('fees/view_application/'.$t->buss_id);?>"   target="_blank"><i class="fa fa-eye"></i> VIEW</a>									
							<?php } else{?>
									<a href="#" title="edit" class="btn btn-info btn-xs edit-application" data-appid="<?php echo $t->app_id; ?>" data-ownerid="<?php echo $t->owner_id; ?>" data-businessid="<?php echo $t->buss_id; ?>"><i class="fa fa-pencil"></i></a>
									<a href="#" alt="Requirements" title="Requirements"  class="btn btn-danger btn-xs requirements" data-appid="<?php echo $t->app_id; ?>" data-ownerid="<?php echo $t->owner_id; ?>" data-businessid="<?php echo $t->buss_id; ?>"><i class="fa fa-file"></i></a>									
									<a href="#" alt="Renew" title="Renew"  class="btn btn-primary btn-xs renew" data-appid="<?php echo $t->app_id; ?>" data-ownerid="<?php echo $t->owner_id; ?>" data-businessid="<?php echo $t->buss_id; ?>"><i class="fa fa-unlock"></i></a>
									<a href="#" alt="Retire" title="Retire" class="btn btn-success btn-xs retire" data-appid="<?php echo $t->app_id; ?>"><i class="fa fa-send-o"></i></a>
									<a href="#uploadchurvalo" alt="churvalo" data-id="2" title="Upload Image"  class="btn btn-warning btn-xs churvalo" data-appid="<?php echo $t->app_id; ?>" data-ownerid="<?php echo $t->owner_id; ?>" data-businessid="<?php echo $t->buss_id; ?>" data-toggle="modal" id="<?php echo $t->buss_id; ?>" onClick="myFunc(this.id);"><i class="fa fa-camera"></i></a>
									<a class="btn btn-danger btn-xs view_docu" data-businessid="<?php echo $t->buss_id; ?>"  href="<?php echo base_url('fees/view_document/'.$t->buss_id);?>"  target="_blank"><i class="fa fa-eye"></i></a>
									<?php }?>
								
								</td>
							</tr>
												<div class="modal fade" id="uploadchurvalo" role="dialog">
														<div class="modal-dialog  uploadchurvalo">
															<div class="modal-content">
															<div class="modal-header churvalo1">
																<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																<h4 class="modal-title"><font color="white">Upload Documents Here</font></h4>
															</div>
															<div class="modal-body">
																<p></p>
																<?php echo form_open_multipart('', array(
																	'class' => 'form-horizontal overwrite',
																	'id' => '',
																	'role' => 'form'

																)); ?>

																	<input type="hidden" id="demo">
																
																	<input multiple type="file" name="file" id="file">

															</div>
															<div class="modal-footer">
															<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-info upload_image_owner')); ?>
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															<?php echo form_close(); ?>
															</div>
														</div>
													</div>


					<?php } }else if(!empty($taxpayers2)) {	

								while($row = mysqli_fetch_assoc($conq4)) { ?>
							<tr>
								<td><strong><?php echo $row['permit_number']; ?></strong></td>
								
								<td><a class="btn btn-xs edit-business" href="#" data-bussid="<?php echo $row['buss_id']; ?>" data-appid="<?php echo $row['app_id']; ?>">
								<?php echo str_replace('?','ñ',utf8_decode($row['business_name'])) ; ?></a></td>

								<?php if ($row['ownership_id']=="3"){  ?>
								<td>
									<a class="btn btn-xs edit-owner" href="#" data-ownerid="<?php echo $row['owner_id']; ?>" data-businessid="<?php echo $row['buss_id']; ?>">
										<?php echo wordwrap(ucfirst(str_replace('?','ñ',utf8_decode($row['firstname']))). ' '.ucfirst(str_replace('?','Ñ',utf8_decode($row['middlename']))).' '.ucfirst(str_replace('?','ñ',utf8_decode($row['lastname']))),24,'<br>'); ?>
									</a>
								</td>
								<?php } else {?>
								<td>
									<a class="btn btn-xs edit-owner" href="#" data-ownerid="<?php echo $row['owner_id']; ?>" data-businessid="<?php echo $row['buss_id']; ?>">
										<?php echo wordwrap($row['permitee'] != "N/A" ? ucfirst(str_replace('?','ñ',utf8_decode($row['permitee']))) : ucfirst(str_replace('?','ñ',utf8_decode($row['firstname']))). ' '.ucfirst(str_replace('?','Ñ',utf8_decode($row['middlename']))).' '.ucfirst(str_replace('?','ñ',utf8_decode($row['lastname']))),24,'<br>'); ; ?>
									</a>
								</td>
								<?php } ?>
								<td><?php if($row['application_id'] == 1){ echo 'New';}else if($row['application_id']==2){echo 'Renew';}else{ echo 'Please check this';}echo ' Application'; ?></td>
								<td>
								<?php if($row['closed']==1){?>
									<a href="#" title="edit" class="btn btn-danger btn-xs">CLOSED</a>	
									<!-- <a href="#" title="edit" class="btn btn-info btn-xs retire_pay" data-appid="<?php echo $row['app_id']; ?>">PAY</a>	 -->
									<a alt="View" title="View"  class="btn btn-primary btn-xs view_app" data-businessid="<?php echo $row['buss_id']; ?>"  href="<?php echo base_url('fees/view_application/'.$row['buss_id']);?>"   target="_blank"><i class="fa fa-eye"></i> VIEW</a>									
				
								<?php } else if($row['closed']==2){?>
										<a href="#" title="edit" class="btn btn-danger btn-xs">CLOSED</a>	
										<!-- <a href="#" title="edit" class="btn btn-info btn-xs retire_pay" data-appid="<?php echo $row['app_id']; ?>">PAY</a>	 -->
										<a alt="View" title="View"  class="btn btn-primary btn-xs view_app" data-businessid="<?php echo $row['buss_id']; ?>"  href="<?php echo base_url('fees/view_application/'.$row['buss_id']);?>"   target="_blank"><i class="fa fa-eye"></i> VIEW</a>									
								<?php } else{?>
										<a href="#" title="edit" class="btn btn-info btn-xs edit-application" data-appid="<?php echo $row['app_id']; ?>" data-ownerid="<?php echo $row['owner_id']; ?>" data-businessid="<?php echo$row['buss_id']; ?>"><i class="fa fa-pencil"></i></a>
										<a href="#" alt="Requirements" title="Requirements"  class="btn btn-danger btn-xs requirements" data-appid="<?php echo $row['app_id']; ?>" data-ownerid="<?php echo $row['owner_id']; ?>" data-businessid="<?php echo $row['buss_id']; ?>"><i class="fa fa-file"></i></a>									
										<a href="#" alt="Renew" title="Renew"  class="btn btn-primary btn-xs renew" data-appid="<?php echo $row['app_id']; ?>" data-ownerid="<?php echo $row['owner_id']; ?>" data-businessid="<?php echo $row['buss_id']; ?>"><i class="fa fa-unlock"></i></a>
										<a href="#" alt="Retire" title="Retire" class="btn btn-success btn-xs retire" data-appid="<?php echo $row['app_id']; ?>"><i class="fa fa-send-o"></i></a>
										<a href="#uploadchurvalo" alt="churvalo" data-id="2" title="Upload Image"  class="btn btn-warning btn-xs churvalo" data-appid="<?php echo $row['app_id']; ?>" data-ownerid="<?php echo $row['owner_id']; ?>" data-businessid="<?php echo $row['buss_id']; ?>" data-toggle="modal" id="<?php echo $row['buss_id']; ?>" onClick="myFunc(this.id);"><i class="fa fa-camera"></i></a>
										<a class="btn btn-danger btn-xs view_docu" data-businessid="<?php echo $row['buss_id']; ?>"  href="<?php echo base_url('fees/view_document/'.$row['buss_id']);?>"  target="_blank"><i class="fa fa-eye"></i></a>
										<?php }?>
									
								</td>
							</tr>
						<?php }	?>
								
<div class="modal fade" id="uploadchurvalo" role="dialog">
														<div class="modal-dialog  uploadchurvalo">
															<div class="modal-content">
															<div class="modal-header churvalo1">
																<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																<h4 class="modal-title"><font color="white">Upload Documents Here</font></h4>
															</div>
															<div class="modal-body">
																<p></p>
																<?php echo form_open_multipart('', array(
																	'class' => 'form-horizontal overwrite',
																	'id' => '',
																	'role' => 'form'

																)); ?>

																	<input type="hidden" id="demo">
																
																	<input multiple type="file" name="file" id="file">

															</div>
															<div class="modal-footer">
															<?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-info upload_image_owner')); ?>
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															<?php echo form_close(); ?>
															</div>
														</div>
													</div>
		<?php	} else { ?>
						<tr>
							<td colspan="6">No record found in the database. Please add one now.<br />
								<a data-toggle="modal" href="#new-application" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> New Business Application</a>
							</td>
						</tr>
					<?php } ?>

				</tbody>
			</table>
			<script src="http://code.jquery.com/jquery-latest.js"></script>
			
  
<script>

function myFunc(id){
    
	document.getElementById("demo").value=id;
    // alert(id);    
 
 }

function getValueUsingParentTag(){
	var chkArray1 = [];
	var chkArray2 = [];
	
	/* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
	$('[id="reqsss1"]:checked').each(function() {
		chkArray1.push($(this).val());
	});

	$('[id="reqsss2"]:checked').each(function() {
		chkArray2.push($(this).val());
	});
	
	/* we join the array separated by the comma */
	var selected1;
	var selected2;
	selected1 = chkArray1.join(',') ;
	selected2 = chkArray2.join(',') ;
	
	/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
	if(selected1.length > 0){
		$( "#buttonAdd" ).val(selected1);
		$( "#buttonNA" ).val(selected2);
		$(".checkk").show();
	}else{
		alert("Please at least check one of the checkbox");	
	}
}
</script>
		</div> <!-- End of Portlet Content -->
	</div> <!-- End of Portlet -->
	
</div> <!-- End of Application Tab -->
