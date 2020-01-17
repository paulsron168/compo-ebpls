<div id="content">
	<div id="content-header">
		<h1>Activity Log</h1>
	</div> <!-- #content-header -->
	
	<div id="content-container">
		<div class="row">
			<div class="col-md-12">
				<div class="portlet">
					<div class="portlet-header"><h3><i class="fa fa-list-alt"></i>Logs</h3></div>
					<div class="portlet-content">
						<table class="table table-stripped table-highlight table-bordered table-striped table-hover">
							<tbody>								
								<tr>
								<?php 
								session_start();
									$this->load->model('user/users_model','users');
									date_default_timezone_set("Asia/Taipei"); 
									 echo $this->users->create_log($this->session->userdata('username'),'activity_log',date("F-d-Y H:iA"));
									//require_once str_replace('\\', '/', dirname(dirname(dirname(dirname(dirname(__FILE__)))))).'/0/logs';	
									echo $this->users->display_log($this->session->userdata('username'),$this->session->userdata('path'));
								?>
									
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>