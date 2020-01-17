<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
				<div class="panel-heading">
					<h1> TFO Charges</h1>
				</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<ul id="myTab1" class="nav nav-pills">
									<li class="active"><a class="selected" href="#tfo" data-toggle="tab">TFO</a></li>
									<li><a class="selected" href="#business-nature" data-toggle="tab"> Business Nature</a></li>
									<li><a class="selected" href="#surcharge" data-toggle="tab"> Interest|Surcharges</a></li>
									<li><a class="selected" href="#requirements" data-toggle="tab"> Requirements</a></li>									
									<!-- <li><a href="#mayors_permit" data-toggle="tab">Mayors Permit</a></li>
									<li><a class="selected" href="#signage" data-toggle="tab">Signage</a></li>
									<li><a href="#garbage_fee" data-toggle="tab">Garbage Fee</a></li> -->
									<!--li><a href="#" data-toggle="tab"> Ownership Type</a></li>
									<li><a href="#" data-toggle="tab"> Occupancy Type</a></li-->
								</ul>
								<div class="tab-content">
									<?php $this->load->view('tabs/tfo'); ?>
									<?php $this->load->view('tabs/requirements'); ?>
									<?php $this->load->view('tabs/business_nature'); ?>
									<?php $this->load->view('tabs/surcharge'); ?>
									<?php $this->load->view('tabs/range'); ?>
									<?php $this->load->view('tabs/range_garbage_fee'); ?>
									<?php //$this->load->view('tabs/signage');?>
									
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">					
					</div>
			</div>
	    </div>
	</div>
</div>

<!-- Modal -->
<?php 
	$data['business_nature2'] = dropdown_options($business_nature2, 'buss_nature_id', 'business_nature', 'Business Nature');
	$data['permit'] = dropdown_options($permit_type, 'permit_id', 'types', 'Permit Type'); 
	$data['tfotype'] = dropdown_options($tfotype, 'type_id', 'tfotype', 'TFO Type');	
	$data['paymenttype'] = dropdown_options($paymenttype,'payment_id', 'types', 'Payment types');	
	$data['classification'] = dropdown_options($classification, 'classification_id', 'types', 'Classification');
?>

<?php $this->load->view('reference/modal/add_requirements', $data) ?>
<?php $this->load->view('reference/modal/add_nature', $data) ?>
<?php $this->load->view('reference/modal/edit_nature', $data) ?>
<?php $this->load->view('reference/modal/edit_surcharge', $data) ?>
<?php $this->load->view('reference/modal/tfo_form', $data) ?>
<?php $this->load->view('reference/modal/required_tfo_form', $data) ?>
<?php $this->load->view('reference/modal/new_requirements', $data) ?>
<?php $this->load->view('reference/modal/add_surcharge') ?>
<?php $this->load->view('reference/modal/edit_tfo', $data) ?>
<?php $this->load->view('reference/modal/add_tfo', $data) ?>
<?php $this->load->view('reference/modal/edit_requirement', $data) ?>
<?php $this->load->view('reference/modal/edit-buss-tfo',$data); ?>
<?php $this->load->view('reference/modal/add_range',$data) ?>
<?php $this->load->view('reference/modal/add_garbage_fee',$data) ?>
<?php $this->load->view('reference/modal/add_signage',$data) ?>
<?php //$this->load->view('reference/modal/popup') ?>