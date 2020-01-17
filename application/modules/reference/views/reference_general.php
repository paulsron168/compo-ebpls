<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading">
	    			<h1>General References</h1>
	    		</div>
	    		<div class="panel-body">
	    			<div class="row">
						<div class="col-md-12">
							<ul id="myTab1" class="nav nav-pills">
								<li class="active"><a href="#barangay_ref" data-toggle="tab"> Barangays</a></li>
								<li><a href="#duedate" data-toggle="tab"> Due Date Settings</a></li>
								<!-- <li><a href="#announcements" data-toggle="tab"> Announcements</a></li> -->
							</ul>

							<div class="tab-content">
								<?php $this->load->view('tabs/barangay_ref'); ?>
								<?php $this->load->view('tabs/signatory_templates'); ?>
								<?php $this->load->view('tabs/signatories'); ?>
								<!-- <?php //$this->load->view('tabs/Announcements'); ?> -->
								<?php $this->load->view('tabs/permit_number_format'); ?>
								<?php $this->load->view('tabs/duedate'); ?>
							</div>
						</div>
					</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>



<!-- Modals -->
<?php $this->load->view('reference/modal/barangay'); ?>
<?php $this->load->view('reference/modal/edit_barangay'); ?>
<?php $this->load->view('reference/modal/add_duedate'); ?>
<?php $this->load->view('reference/modal/edit_duedate'); ?>
<?php $this->load->view('reference/modal/add_announcement'); ?>
<?php $this->load->view('reference/modal/edit_announcement'); ?>
