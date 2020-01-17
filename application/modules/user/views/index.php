<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading">
	    			<h1>Users</h1>
	    		</div>
	    		<div class="panel-body">
	    			<div class="row">
	    				<div class="col-md-12">
						<div class="portlet">
							<div class="portlet-header">
							<h3><i class="fa fa-list-alt"></i>User List</h3>
							<ul class="portlet-tools pull-right">
							<li><a title="Add Users" data-toggle="modal" href="#users" class="btn btn-sm btn-warning" id="signup-btn"
							><i class="fa fa-user"></i></a></li>
								</ul>
							</div>
							<div class="portlet-content">
								<table id="users_table_list" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable">
									<thead>
										<tr>
											<th>#</th>
											<th>Username</th>
											<th>Email</th>
											<th>Level</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											if($get->num_rows()>0) : $i=1;
											
												foreach($get->result() as $u):
												
										?>	
										<?php 

												if($u->level_id ==10)
												{
												}
												else{
										?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $u->username; ?></td>
												<td><?php echo 'user@somenail.com'; ?></td>
												
													
														<td><?php echo $u->type; ?></td>
													
													<td><span class="label label-<?php echo ($u->online_status == 'Online') ? 'success' : 'primary'; ?>"><?php echo ucfirst($u->online_status); ?></span></td>
													<?php if($username == 'superadministrator') { ?>
													<td>
														<a href="#" class="btn btn-info btn-xs logout_user_btn" data-userid ="<?php  echo $u->user_id;?>"><i class="fa fa-power-off"></i> Logoff</a>
														<a href="#" class="btn btn-warning btn-xs edit_user_btn" data-userid="<?php  echo $u->user_id;?>"><i class="fa fa-edit"></i> Edit</a>
														<a href="#" class="btn btn-danger btn-xs delete_user_btn" data-userid ="<?php  echo $u->user_id;?>" ><i class="fa fa-times"></i> Delete</a>
													</td>
													<?php }  else{ ?>
													<td>
														<a href="#" class="btn btn-info btn-xs edit_user_btn" data-userid="<?php  echo $u->user_id;?>"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger btn-xs delete_user_btn" data-userid ="<?php  echo $u->user_id;?>" ><i class="fa fa-trash"></i></a>
														
													</td>
													<?php } ?>
													<?php } ?>
												</tr>

											<?php $i++;
											endforeach; endif;?>
									</tbody>
								</table>
							</div>
						</div>
						</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>
<?php $this->load->view('user/modal/edit_users'); ?>
<?php $this->load->view('user/modal/add_users'); ?>