



	
	
	<div class="navbar-default sidebar" role="navigation">
	 	<div class="sidebar-nav navbar-collapse">
			<ul class="nav in" id="side-menu">
				<li class="sidebar-search">
	                <div class="input-group custom-search-form">
	                 <img src="<?php echo base_url('assets/img/logos/logo2.png'); ?>" alt="Site Logo" width="90%" height="90%"; style="float: left; margin: 0px 30px 0px 30px;margin-left:15px;">
	                    <span class="input-group-btn">
	                </span>
	                </div>
	                <!-- /input-group -->
	            </li>

<?php $info = $this->session->userdata; 

if($info['level_id']==4){?>
							<li>
								<a href="<?php echo site_url('home/dashboard'); ?>"> Bulletin Board</a>							
							</li>
							
				<li><a href="<?php echo site_url('fees'); ?>"><i class="fa fa-file-text"></i> Business License</a></li>
				<li>
					<a href="#"><i class="fa fa-file fa-fw"></i> CTC<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						
						<li><a href="<?php echo site_url('ctc/ctc_individual_2'); ?>"><i class="fa fa-file-text-o"></i> CTC Individual </a></li>
						<li><a href="<?php echo site_url('ctc/ctc_corporate_2'); ?>"><i class="fa fa-file-text-o"></i> CTC Corporate </a></li>
					</ul>
				</li>
<?php }else{?>			

				<li>
								<a href="<?php echo site_url('home/dashboard'); ?>"> Bulletin Board</a>							
							</li>
							
				<li><a href="<?php echo site_url('fees'); ?>"><i class="fa fa-file-text"></i> Business License</a></li>
				<li><a href="<?php echo site_url('map/public_market'); ?>"><i class="fa fa-building"></i> Poblacion Public Market</a></li>
				<li>
					<a href="#"><i class="fa fa-file fa-fw"></i> CTC<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						
						<li><a href="<?php echo site_url('ctc/ctc_individual_2'); ?>"><i class="fa fa-file-text-o"></i> CTC Individual </a></li>
						<li><a href="<?php echo site_url('ctc/ctc_corporate_2'); ?>"><i class="fa fa-file-text-o"></i> CTC Corporate </a></li>
					</ul>
				</li>
		
				<li>
					<a href="#"><i class="fa fa-wrench fa-fw"></i>References<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="<?php echo site_url('reference/'); ?>"><i class="fa fa-table"></i> Permit Reference</a></li>
						<li><a href="<?php echo site_url('reference/general'); ?>"><i class="fa fa-table"></i> General Reference</a></li>
					</ul>
				</li>
				<li>
					 <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
					  <ul class="nav nav-second-level collapse">
					  	<!-- <li><a href="<?php echo site_url('report'); ?>"><i class="fa fa-file-text"></i> Business Reports</a></li> -->
					  	<li><a href="<?php echo site_url('report/bir_report'); ?>"><i class="fa fa-file-text"></i> BIR</a></li>
					  	<li><a href="<?php echo site_url('report/dti_reports'); ?>"><i class="fa fa-file-text"></i> DTI</a></li>
					  	<li><a href="<?php echo site_url('report/diy_v2'); ?>"><i class="fa fa-file-text"></i> DIY</a></li>
					  	<li class="hidden"><a href="<?php echo site_url('report/get_dilg_report'); ?>"><i class="fa fa-file-text"></i> DILG</a></li>
					  	<li><a href="<?php echo site_url('report/dilg_report_choose'); ?>"><i class="fa fa-file-text"></i> DILG</a></li>
					  	<li><a href="<?php echo site_url('report/blgf_report'); ?>"><i class="fa fa-file-text"></i> BLGF</a></li>
					  	<li><a href="<?php echo site_url('report/bsp_report');?>"><i class="fa fa-file-text"></i> BSP</a></li>
					  	<li><a href="<?php echo site_url('report/temp_permit_report');?>"><i class="fa fa-file-text"></i> Temp Permit</a></li>
					  	<li><a href="<?php echo site_url('report/delinquent_report');?>"><i class="fa fa-user-secret"></i> Delinquency Report</a></li>
					  	<li><a href="<?php echo site_url('report/closed_business');?>"><i class="fa fa-times-circle"></i> Closed Business</a></li>
					  </ul>
					  <li><a href="<?php echo site_url('report/billing'); ?>"><i class="fa fa-bell"></i> Notices</a></li>
				</li>
				<li>
					<a href="javascript:void(0);"><i class="fa fa-cogs"></i> Settings<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">
						<li><a href="<?php echo site_url('user/user'); ?>"><i class="fa fa-users"></i> Users</a></li>
						<li><a href="<?php echo site_url('user/admin'); ?>"><i class="fa fa-users"></i> Admin</a></li>
						<li><a href="<?php echo site_url('ctc/ctc_settings'); ?>"><i class="fa fa-money"></i> CTC </a></li>
						<li><a href="<?php echo site_url('user/permit_number'); ?>"><i class="fa fa-users"></i> Permit Number</a></li>
						<!-- <li class="disabled"><a title="Under Construction" href="<?php echo site_url('user/user'); ?>"><i class="fa fa-users"></i> Back-up</a></li>
						<li class="disabled"><a title="Under Construction" href="<?php echo site_url('user/user'); ?>"><i class="fa fa-users"></i> Restore</a></li>
						<li><a title="Under Construction" href="<?php echo site_url('user/activity_log'); ?>"><i class="fa fa-file-text"></i>Activity Log</a></li> -->
					</ul>
				</li>
				<?php } ?>	
			</ul>
			<!-- javascript:void(0);sidebar -->
		</div>
		 <!-- /.sidebar-collapse -->
	</div>
<!-- /.navbar-static-side -->
</nav>
	<!-- /#top-bar -->
