<?php
header("content-type: text/html; charset=UTF-8"); 
$conn = mysqli_connect('localhost','root','','jcit_ebpls_compostela');
$sql = "SELECT * FROM jcit_cancelled_business as a
left join jcit_owners as b on a.owner_id = b.owner_id
left join jcit_businessess as c on a.businessid = c.buss_id
left join jcit_business_nature as d on a.buss_nature_id = d.buss_nature_id AND c.application_id = d.application_id
ORDER BY a.id DESC
";
$result = mysqli_query($conn, $sql);
$checkresult = mysqli_num_rows($result);
if($checkresult > 0){
?>

<div class="tab-pane fade in" id="cancelled">
	<div class="portlet">
		<div class="portlet-header">
			<ul class="portlet-tools pull-left">
				<h3><i class="fa fa-table"></i>Cancelled Business</h3>
			</ul>
		</div>
		<div class="portlet-content">
			<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable"
            	data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
                id="cancelled">
				<thead>
					<tr>
						<th class="text-center">ID No.</th>
						<th class="text-center">Permit Number</th>
						<th class="text-center">Business Owner</th>
						<th class="text-center">Business Name</th>
						<th class="text-center">Business Nature</th>
						<th class="text-center">Capital / Gross</th>
						<th class="text-center">Action</th>
					</tr>
                    
				</thead>
				<tbody>
				<?php while ($load = mysqli_fetch_assoc($result)){ ?>
							<tr>
                                <td><?php echo $load['id']; ?></td>
								<td><?php echo $load['permit_number']; ?></td>
								<td><?php echo $load['lastname'].', '.$load['firstname'].'&nbsp;'.$load['middlename'] ?></td>
								<td><?php echo $load['business_name']; ?></td>
								<td><?php echo $load['business_nature']; ?></td>
								<td><?php echo $load['capital']; ?></td>
								<td style = 'text-align: center;'>

								<?php if ($load['status'] == 'Unpaid'){ ?>

                                <a class="btn btn-success btn-xs reviewcancel" 
								data-cancelledid="<?php echo $load['id']; ?>"
								data-nature = "<?php echo $load['business_nature']; ?>"
								data-owner = "<?php echo $load['lastname'].', '.$load['firstname'].'&nbsp;'.$load['middlename']; ?>"
								data-contact = "<?php echo $load['contact_number']; ?>"
								 href="#">
								<i class="fa fa-clipboard"></i>&nbsp;Pay</a>

								<?php }else{ ?>

								<a class="btn btn-primary btn-xs btn-block print-treasury"
								data-cancelledid="<?php echo $load['id']; ?>"
								data-nature = "<?php echo $load['business_nature']; ?>"
								data-owner = "<?php echo $load['lastname'].', '.$load['firstname'].'&nbsp;'.$load['middlename']; ?>"
								data-contact = "<?php echo $load['contact_number']; ?>"
								 href="<?php echo base_url('fees/print_cert/'.$load['id']); ?>" target="_blank">
								<i class="fa fa-print"></i>&nbsp;Treasury Copy</a>

								<a class="btn btn-primary btn-xs btn-block print-bplo"
								data-cancelledid="<?php echo $load['id']; ?>"
								data-nature = "<?php echo $load['business_nature']; ?>"
								data-owner = "<?php echo $load['lastname'].', '.$load['firstname'].'&nbsp;'.$load['middlename']; ?>"
								data-contact = "<?php echo $load['contact_number']; ?>"
								href="<?php echo base_url('fees/print_cert2/'.$load['id']); ?>" target="_blank">
								<i class="fa fa-print"></i>&nbsp;BPLO Copy</a>

								<?php } ?>
								</td>
                            </tr>
						<?php } ?>
				</tbody>
			</table>			
		</div>		
		</div> <!-- End of Portlet Content -->
	</div> <!-- End of Portlet -->

<?php }?>
