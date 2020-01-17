<?php
	$data['brgy'] = dropdown_options($brgys, 'brgy_id', 'brgy', 'Barangay');
	$data['amendment'] = dropdown_options($amendment, 'id', 'description', 'Amendment');
	$data['application'] = dropdown_options($application_type, 'application_id', 'types', 'Application Type');
	$data['classification'] = dropdown_options($classification_type, 'classification_id', 'types', 'Classification Type');
	$data['occupancy'] = dropdown_options($occupancy_type, 'occupancy_id', 'types', 'Occupancy Type');
	$data['ownership'] = dropdown_options($ownership_type, 'ownership_id', 'types', 'Ownership Type');
	$data['payment'] = dropdown_options($payment_type, 'payment_id', 'types', 'Payment Method');
	$data['permits'] = dropdown_options($permit_type, 'permit_id', 'types', 'Permit Type');
	$data['nature'] = dropdown_options($business_nature, 'buss_nature_id', 'business_nature', 'Business Nature');
	$data['app_type'] = dropdown_options($app_type, 'application_id', 'types', 'Application Type');
	$data['property'] = dropdown_options($property_type, 'property_id', 'types', 'Property Type');

?>

<!-- Modals -->
<?php $this->load->view('fees/modals/payment-form',$data);?>
<?php $this->load->view('fees/modals/error',$data);?>
<?php $this->load->view('fees/modals/payment_ok');?>
<?php $this->load->view('fees/modals/assess_form',$data);?>
<?php $this->load->view('fees/modals/re_assess_form', $data); ?>
<?php $this->load->view('fees/modals/nature_form', $data); ?>
<?php $this->load->view('fees/modals/new_business', $data); ?>
<?php $this->load->view('fees/modals/owner-form', $data); ?>
<?php $this->load->view('fees/modals/business-form', $data); ?>
<?php $this->load->view('fees/modals/print/mayor-permit'); ?>
<?php $this->load->view('fees/modals/renew', $data); ?>
<?php $this->load->view('fees/modals/requirements', $data); ?>
<?php $this->load->view('fees/modals/error', $data); ?>
<?php $this->load->view('fees/modals/retire', $data); ?>
<?php $this->load->view('fees/modals/summary_list', $data); ?>
<?php $this->load->view('fees/modals/retire-pay', $data); ?>
<?php $this->load->view('fees/modals/reassessment', $data); ?>
<?php $this->load->view('fees/modals/form_cancel', $data); ?>
<?php $this->load->view('fees/modals/pay_stall', $data); ?>

<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <br>
	        <div class="panel panel-success">
                <div class="panel-heading">
                  <h1>Licensing</h1>
                </div>
                <div class="panel-body">
                   <div id="content-container">
						<div class="row">
							<hr>
							<div class="col-md-12">
								<ul id="myTab1" class="nav nav-pills">
									<?php
									$info = $this->session->userdata; 
									if ($info['level_id'] == 1 ) { ?>
										<li class="active"><a href="#application" data-toggle="tab">Application</a></li>
										<li><a href="#upload_image" data-toggle="tab">Upload Image</a></li>
								<?php } if($info['level_id'] == 2 || $info['level_id'] == 3) { ?>
										<li><a href="#assessment" data-toggle="tab">Assessment/Approval</a></li>
									<?php } if($info['level_id'] == 4) {?>			
										<?php $this->load->view('fees/tabs/payment');?>
									<?php } if($info['level_id'] == 5) {?>
										<li><a href="#releasing" data-toggle="tab">Releasing</a></li>
									<?php } if ($info['level_id'] == 6){?>
										<li class="active"><a href="#application" data-toggle="tab">Application</a></li>
										<li><a href="#assessment" data-toggle="tab">Assessment/Approval</a></li>
										<li><a href="#cancelled" data-toggle="tab">Cancelled Business</a></li>
										<li><a href="#payment" data-toggle="tab">Payment</a></li>
										<li><a href="#releasing" data-toggle="tab">Releasing</a></li>
										<li><a href="#summary" data-toggle="tab">Summary</a></li>
										<!-- <li><a href="#uploads" data-toggle="tab">Forms</a></li>										 -->
										
					
										<!-- <li><a href="#upload_image" data-toggle="tab">Upload Image</a></li> -->
									<?php }?>
								</ul>

								<div class="tab-content">
									<?php if ($info['level_id'] == 1) {
										$this->load->view('fees/tabs/application');
										$this->load->view('fees/tabs/upload_image');
									?>
									<?php } if ($info['level_id'] == 2 || $info['level_id'] == 3){ $this->load->view('fees/tabs/assessment'); //echo 'hoi';  ?>
									<?php } if ($info['level_id'] == 4) { 

										?>
									<?php } if ($info['level_id'] == 5) { $this->load->view('fees/tabs/releasing'); ?>
								  <?php } if ($info['level_id'] == 6) {
										$this->load->view('fees/tabs/application');
										$this->load->view('fees/tabs/assessment');
										$this->load->view('fees/tabs/cancelled');
										$this->load->view('fees/tabs/payment');
										$this->load->view('fees/tabs/releasing');
										$this->load->view('fees/tabs/summary');
										// $this->load->view('fees/tabs/uploads');
										
										
									} ?>


								</div> <!-- End of Tab Content -->
							</div> <!-- End of col-md-12 -->
						</div> <!-- End of Row -->
					</div> <!-- End of Content Container -->
                </div>
                <div class="panel-footer">

                </div>
            </div>
	        <br><br>
	    </div>
	    <!-- /.row -->
	</div>
</div> <!-- End of Wrapper -->
