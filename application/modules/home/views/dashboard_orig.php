<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Dashboard - Canvas Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
	<meta name="author" content="" />
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,800italic,400,600,800" type="text/css">

	<link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css" />		
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" />	
	<link rel="stylesheet" href="../assets/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
		
	<link rel="stylesheet" href="../assets/js/plugins/icheck/skins/minimal/blue.css" type="text/css" />
	<link rel="stylesheet" href="../assets/js/plugins/select2/select2.css" type="text/css" />
	<link rel="stylesheet" href="../assets/js/plugins/fullcalendar/fullcalendar.css" type="text/css" />
	
	<link rel="stylesheet" href="../assets/css/App.css" type="text/css" />

	<link rel="stylesheet" href="../assets/css/custom.css" type="text/css" />	
</head>

<body>

<div id="wrapper">

	<header id="header">

		<h1 id="site-logo">
			<a href="../assets/index.html">
				<img src="../assets/img/logos/logo.png" alt="Site Logo" />
			</a>
		</h1>	

		<a href="javascript:;" data-toggle="collapse" data-target=".top-bar-collapse" id="top-bar-toggle" class="navbar-toggle collapsed">
			<i class="fa fa-cog"></i>
		</a>

		<a href="javascript:;" data-toggle="collapse" data-target=".sidebar-collapse" id="sidebar-toggle" class="navbar-toggle collapsed">
			<i class="fa fa-reorder"></i>
		</a>

	</header> <!-- header -->


	<nav id="top-bar" class="collapse top-bar-collapse">

		<ul class="nav navbar-nav pull-left">
			<li class="">
				<a href="../assets/index.html">
					<i class="fa fa-home"></i> 
					Home
				</a>
			</li>

			<li class="dropdown">
		    	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
		        	Dropdown <span class="caret"></span>
		    	</a>

		    	<ul class="dropdown-menu" role="menu">
			        <li><a href="javascript:;"><i class="fa fa-user"></i>&nbsp;&nbsp;Example #1</a></li>
			        <li><a href="javascript:;"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Example #2</a></li>
			        <li class="divider"></li>
			        <li><a href="javascript:;"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Example #3</a></li>
		    	</ul>
		    </li>
		    
		</ul>

		<ul class="nav navbar-nav pull-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
					<i class="fa fa-user"></i>
		        	<?php 
		        	
		        	?>
		        	<span class="caret"></span>
		    	</a>

		    	<ul class="dropdown-menu" role="menu">
			        <li>
			        	<a href="../assets/page-profile.html">
			        		<i class="fa fa-user"></i> 
			        		&nbsp;&nbsp;My Profile
			        	</a>
			        </li>
			        <li>
			        	<a href="../assets/page-calendar.html">
			        		<i class="fa fa-calendar"></i> 
			        		&nbsp;&nbsp;My Calendar
			        	</a>
			        </li>
			        <li>
			        	<a href="../assets/page-settings.html">
			        		<i class="fa fa-cogs"></i> 
			        		&nbsp;&nbsp;Settings
			        	</a>
			        </li>
			        <li class="divider"></li>
			        <li>
			        	<a href="../assets/page-login.html">
			        		<i class="fa fa-sign-out"></i> 
			        		&nbsp;&nbsp;Logout
			        	</a>
			        </li>
		    	</ul>
		    </li>
		</ul>

	</nav> <!-- /#top-bar -->


	<div id="sidebar-wrapper" class="collapse sidebar-collapse">
	
		<div id="search">
			<form>
				<input class="form-control input-sm" type="text" name="search" placeholder="Search..." />

				<button type="submit" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
			</form>		
		</div> <!-- #search -->
	
		<nav id="sidebar">		
			
			<ul id="main-nav" class="open-active">			

				<li class="active">				
					<a href="../assets/index.html">
						<i class="fa fa-dashboard"></i>
						Dashboard
					</a>				
				</li>
							
				<li class="dropdown">
					<a href="javascript:;">
						<i class="fa fa-file-text"></i>
						Example Pages
						<span class="caret"></span>
					</a>				
					
					<ul class="sub-nav">
						<li>
							<a href="../assets/page-profile.html">
								<i class="fa fa-user"></i> 
								Profile
							</a>
						</li>
						<li>
							<a href="../assets/page-invoice.html">
								<i class="fa fa-money"></i> 
								Invoice
							</a>
						</li>
						<li>
							<a href="../assets/page-pricing.html">
								<i class="fa fa-dollar"></i> 
								Pricing Plans
							</a>
						</li>
						<li>
							<a href="../assets/page-support.html">
								<i class="fa fa-question"></i> 
								Support Page
							</a>
						</li>
						<li>
							<a href="../assets/page-gallery.html">
								<i class="fa fa-picture-o"></i> 
								Gallery
							</a>
						</li>
						<li>
							<a href="../assets/page-settings.html">
								<i class="fa fa-cogs"></i> 
								Settings
							</a>
						</li>
						<li>
							<a href="../assets/page-calendar.html">
								<i class="fa fa-calendar"></i> 
								Calendar
							</a>
						</li>
					</ul>						
					
				</li>	
				
				<li class="dropdown">
					<a href="javascript:;">
						<i class="fa fa-tasks"></i>
						Form Elements
						<span class="caret"></span>
					</a>
					
					<ul class="sub-nav">
						<li>
							<a href="../assets/form-regular.html">
								<i class="fa fa-location-arrow"></i>
								Regular Elements
							</a>
						</li>
						<li>
							<a href="../assets/form-extended.html">
								<i class="fa fa-magic"></i>
								Extended Elements
							</a>
						</li>	
						<li>
							<a href="../assets/form-validation.html">
								<i class="fa fa-check"></i>
								Validation
							</a>
						</li>			
					</ul>	
									
				</li>
				
				<li class="dropdown">
					<a href="javascript:;">
						<i class="fa fa-desktop"></i>
						UI Features
						<span class="caret"></span>
					</a>	

					<ul class="sub-nav">
						<li>
							<a href="../assets/ui-buttons.html">
								<i class="fa fa-hand-o-up"></i>
								Buttons
							</a>
						</li>
						<li>
							<a href="../assets/ui-tabs.html">
								<i class="fa fa-reorder"></i>
								Tabs & Accordions
							</a>
						</li>

						<li>
							<a href="../assets/ui-popups.html">
								<i class="fa fa-asterisk"></i>
								Popups / Notifications
							</a>
						</li>	

						<li>
							<a href="../assets/ui-sliders.html">
								<i class="fa fa-tasks"></i>
								Sliders
							</a>
						</li>	
				
						<li class="">
							<a href="../assets/ui-typography.html">
								<i class="fa fa-font"></i>
								Typography
							</a>
						</li>	
				
						<li class="">
							<a href="../assets/ui-icons.html">
								<i class="fa fa-star-o"></i>
								Icons
							</a>
						</li>	
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="javascript:;">
						<i class="fa fa-table"></i>
						Tables
						<span class="caret"></span>
					</a>
					
					<ul class="sub-nav">
						<li>
							<a href="../assets/table-basic.html">
								<i class="fa fa-table"></i> 
								Basic Tables
							</a>
						</li>		
						<li>
							<a href="../assets/table-advanced.html">
								<i class="fa fa-table"></i> 
								Advanced Tables
							</a>
						</li>
						<li>
							<a href="../assets/table-responsive.html">
								<i class="fa fa-table"></i> 
								Responsive Tables
							</a>
						</li>	
					</ul>	
									
				</li>

				<li>
					<a href="../assets/ui-portlets.html">
						<i class="fa fa-list-alt"></i>
						Portlets
					</a>
				</li>
				
				<li class="dropdown">
					<a href="javascript:;">
						<i class="fa fa-bar-chart-o"></i>
						Charts & Graphs
						<span class="caret"></span>
					</a>
					
					<ul class="sub-nav">
						<li>
							<a href="../assets/chart-flot.html">
								<i class="fa fa-bar-chart-o"></i> 
								jQuery Flot
							</a>
						</li>
						<li>
							<a href="../assets/chart-morris.html">
								<i class="fa fa-bar-chart-o"></i> 
								Morris.js
							</a>
						</li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="javascript:;">
						<i class="fa fa-file-text-o"></i>
						Extra Pages
						<span class="caret"></span>
					</a>
					
					<ul class="sub-nav">
						<li>
							<a href="../assets/page-login.html">
								<i class="fa fa-unlock"></i> 
								Login Basic
							</a>
						</li>
						<li>
							<a href="../assets/page-login-social.html">
								<i class="fa fa-unlock"></i> 
								Login Social
							</a>
						</li>
						<li>
							<a href="../assets/page-404.html">
								<i class="fa fa-ban"></i> 
								404 Error
							</a>
						</li>
						<li>
							<a href="../assets/page-500.html">
								<i class="fa fa-ban"></i> 
								500 Error
							</a>
						</li>
						<li>
							<a href="../assets/page-blank.html">
								<i class="fa fa-file-text-o"></i> 
								Blank Page
							</a>
						</li>
					</ul>
				</li>

			</ul>
					
		</nav> <!-- #sidebar -->

	</div> <!-- /#sidebar-wrapper -->

	
	<div id="content">		
		
		<div id="content-header">
			<h1>Dashboard</h1>
		</div> <!-- #content-header -->	


		<div id="content-container">

			<div>
				<h4 class="heading-inline">Weekly Sales Stats
				&nbsp;&nbsp;<small>For the week of Jun 15 - Jun 22, 2011</small>
				&nbsp;&nbsp;</h4>

				<div class="btn-group ">
				  <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
					<i class="fa fa-clock-o"></i>  &nbsp;
				    Change Week <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu">
		            <li><a href="javascript:;">Action</a></li>
		            <li><a href="javascript:;">Another action</a></li>
		            <li><a href="javascript:;">Something else here</a></li>
		            <li class="divider"></li>
		            <li><a href="javascript:;">Separated link</a></li>
		          </ul>
				</div>
			</div>

			<br />


			<div class="row">

				<div class="col-md-3 col-sm-6">

					<a href="javascript:;" class="dashboard-stat primary">
						<div class="visual">
							<i class="fa fa-star"></i>
						</div> <!-- /.visual -->

						<div class="details">
							<span class="content">New Orders</span>
							<span class="value">1,236</span>
						</div> <!-- /.details -->

						<i class="fa fa-play-circle more"></i>

					</a> <!-- /.dashboard-stat -->

				</div> <!-- /.col-md-3 -->

				<div class="col-md-3 col-sm-6">

					<a href="javascript:;" class="dashboard-stat secondary">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div> <!-- /.visual -->

						<div class="details">
							<span class="content">Abandoned Carts</span>
							<span class="value">256</span>
						</div> <!-- /.details -->

						<i class="fa fa-play-circle more"></i>

					</a> <!-- /.dashboard-stat -->

				</div> <!-- /.col-md-3 -->

				<div class="col-md-3 col-sm-6">

					<a href="javascript:;" class="dashboard-stat tertiary">
						<div class="visual">
							<i class="fa fa-clock-o"></i>
						</div> <!-- /.visual -->

						<div class="details">
							<span class="content">Avg. Support Time</span>
							<span class="value">4:37</span>
						</div> <!-- /.details -->

						<i class="fa fa-play-circle more"></i>

					</a> <!-- /.dashboard-stat -->

				</div> <!-- /.col-md-3 -->

				<div class="col-md-3 col-sm-6">

					<a href="javascript:;" class="dashboard-stat">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div> <!-- /.visual -->

						<div class="details">
							<span class="content">Total Revenue</span>
							<span class="value">$173K</span>
						</div> <!-- /.details -->

						<i class="fa fa-play-circle more"></i>

					</a> <!-- /.dashboard-stat -->

				</div> <!-- /.col-md-9 -->



			</div> <!-- /.row -->




			<div class="row">

				<div class="col-md-9">

					<div class="portlet">

						<div class="portlet-header">

							<h3>
								<i class="fa fa-bar-chart-o"></i>
								Area Chart
							</h3>

						</div> <!-- /.portlet-header -->

						<div class="portlet-content">

							<div class="pull-left">
								<div class="btn-group" data-toggle="buttons">
								  <label class="btn btn-sm btn-default">
								    <input type="radio" name="options" id="option1"> Day
								  </label>
								  <label class="btn btn-sm btn-default">
								    <input type="radio" name="options" id="option2"> Week
								  </label>
								  <label class="btn btn-sm btn-default active">
								    <input type="radio" name="options" id="option3"> Month
								  </label>
								</div>

								&nbsp;

								  <div class="btn-group">
								    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
								      Custom Date
								      <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu">
								      <li><a href="javascript:;">Dropdown link</a></li>
								      <li><a href="javascript:;">Dropdown link</a></li>
								    </ul>
								  </div>
								
							</div>

							<div class="pull-right">
								<div class="btn-group">
								  <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
								    <i class="fa fa-cog"></i> &nbsp;&nbsp;<span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu pull-right" role="menu">
								    <li><a href="javascript:;">Action</a></li>
								    <li><a href="javascript:;">Another action</a></li>
								    <li><a href="javascript:;">Something else here</a></li>
								    <li class="divider"></li>
								    <li><a href="javascript:;">Separated link</a></li>
								  </ul>
								</div>
							</div>

							<div class="clear"></div>
							<hr />


							<div id="area-chart" class="chart-holder" style="height: 250px"></div> <!-- /#bar-chart -->

						</div> <!-- /.portlet-content -->

					</div> <!-- /.portlet -->




					<div class="row">

					<div class="col-md-6">

						<div class="portlet">

							<div class="portlet-header">

								<h3>
									<i class="fa fa-money"></i>
									Recent Orders
								</h3>

								<ul class="portlet-tools pull-right">
									<li>
										<button class="btn btn-sm btn-default">
											Add Order
										</button>
									</li>
								</ul>

							</div> <!-- /.portlet-header -->

							<div class="portlet-content">

								<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Purchased On</th>
											<th>Items</th>
											<th>Amount</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>09/21/2013</td>
											<td>3</td>
											<td>$108.35</td>
											<td><a href="javascript:;" class="btn btn-xs btn-tertiary">View &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a></td>
										</tr>
										<tr>
											<td>09/21/2013</td>
											<td>1</td>
											<td>$30.89</td>
											<td><a href="javascript:;" class="btn btn-xs btn-tertiary">View &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a></td>
										</tr>
										<tr>
											<td>09/20/2013</td>
											<td>2</td>
											<td>$52.06</td>
											<td><a href="javascript:;" class="btn btn-xs btn-tertiary">View &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a></td>
										</tr>
										<tr>
											<td>09/19/2013</td>
											<td>4</td>
											<td>$73.54</td>
											<td><a href="javascript:;" class="btn btn-xs btn-tertiary">View &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a></td>
										</tr>
										<tr>
											<td>09/19/2013</td>
											<td>4</td>
											<td>$73.54</td>
											<td><a href="javascript:;" class="btn btn-xs btn-tertiary">View &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a></td>
										</tr>
										<tr>
											<td>09/19/2013</td>
											<td>4</td>
											<td>$73.54</td>
											<td><a href="javascript:;" class="btn btn-xs btn-tertiary">View &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div> <!-- /.table-responsive -->

								<hr />

								<a href="javascript:;" class="btn btn-sm btn-secondary">View All Orders</a>
								

							</div> <!-- /.portlet-content -->

						</div> <!-- /.portlet -->


					</div> <!-- /.col-md-4 -->



					<div class="col-md-6">

						<div class="portlet">

							<div class="portlet-header">

								<h3>
									<i class="fa fa-group"></i>
									Recent Signups
								</h3>

								<ul class="portlet-tools pull-right">
									<li>
										<button class="btn btn-sm btn-default">
											Add User
										</button>
									</li>
								</ul>

							</div> <!-- /.portlet-header -->

							<div class="portlet-content">


								<div class="table-responsive">

								<table id="user-signups" class="table table-striped table-checkable"> 
									<thead> 
										<tr> 
											<th class="checkbox-column"> 
												<input type="checkbox" id="check-all" class="icheck-input" />
											</th> 
											<th class="hidden-xs">First Name
											</th> 
											<th>Last Name</th> 
											<th>Status
											</th> 

											<th class="align-center">Approve
											</th> 

										</tr> 
									</thead> 

									<tbody> 
										<tr class=""> 
											<td class="checkbox-column"> 
												<input type="checkbox" name="actiony" value="joey" class="icheck-input"> 
											</td> 

											<td class="hidden-xs">Joey</td> 
											<td>Greyson</td> 
											<td><span class="label label-success">Approved</span></td> 
											<td class="align-center">
												<a href="javascript:void(0);" class="btn btn-xs btn-primary" data-original-title="Approve">
													<i class="fa fa-check"></i>
												</a> 
											</td> 
										</tr> 

										<tr class=""> 
											<td class="checkbox-column"> 
												<input type="checkbox" name="actiony" value="wolf" class="icheck-input">
											</td> 
											<td class="hidden-xs">Wolf</td> 
											<td>Bud</td> <td><span class="label label-default">Pending</span>
											</td>  
											<td class="align-center">
												<a href="javascript:void(0);" class="btn btn-xs btn-primary" data-original-title="Approve">
													<i class="fa fa-check"></i>
												</a> 
											</td> 
										</tr> 


										<tr class=""> 
											<td class="checkbox-column"> 
												<input type="checkbox" name="actiony" value="sam" class="icheck-input"> 
											</td> 

											<td class="hidden-xs">Sam</td> 
											<td>Mitchell</td> 
											<td><span class="label label-success">Approved</span></td>  
											<td class="align-center">
												<a href="javascript:void(0);" class="btn btn-xs btn-primary" data-original-title="Approve">
													<i class="fa fa-check"></i>
												</a> 
											</td> 
										</tr> 
										<tr class=""> 
											<td class="checkbox-column"> 
												<input type="checkbox" value="carlos" name="actiony" class="icheck-input"> 
											</td> 
											<td class="hidden-xs">Carlos</td> 
											<td>Lopez</td> 
											<td><span class="label label-success">Approved</span></td> 
											<td class="align-center">
												<a href="javascript:void(0);" class="btn btn-xs btn-primary" data-original-title="Approve">
													<i class="fa fa-check"></i>
												</a> 
											</td>  
										</tr>  




										<tr class=""> 
											<td class="checkbox-column"> 
												<input type="checkbox" name="actiony" value="rob" class="icheck-input"> 
											</td> 
											<td class="hidden-xs">Rob</td> 
											<td>Johnson</td> 
											<td><span class="label label-default">Pending</span></td> 
											<td class="align-center">
												<a href="javascript:void(0);" class="btn btn-xs btn-primary" data-original-title="Approve">
													<i class="fa fa-check"></i>
												</a> 
											</td> 
										</tr> 
										<tr class=""> 
											<td class="checkbox-column"> 
												<input type="checkbox" value="mike" name="actiony" class="icheck-input"> 
											</td> 
											<td class="hidden-xs">Mike</td> 
											<td>Jones</td> 
											<td><span class="label label-default">Pending</span></td>  
											<td class="align-center">
												<a href="javascript:void(0);" class="btn btn-xs btn-primary" data-original-title="Approve">
													<i class="fa fa-check"></i>
												</a> 
											</td> 
										</tr>										

									</tbody> 
								</table>
										

								</div> <!-- /.table-responsive -->

								<hr />

								Apply to Selected: &nbsp;&nbsp;
								<select id="apply-selected" name="table-select" class="ui-select2" style="width: 125px">
									<option value="">Select Action</option>
									<option value="approve">Approve</option>
									<option value="edit">Edit</option>
									<option value="delete">Delete</option>
									
								</select>
								
							</div> <!-- /.portlet-content -->

						</div> <!-- /.portlet -->

					</div> <!-- /.col-md-4 -->


				</div> <!-- /.row -->






				<div class="portlet">

					<div class="portlet-header">

						<h3>
							<i class="fa fa-calendar"></i>
							Full Calendar
						</h3>

					</div> <!-- /.portlet-header -->

					<div class="portlet-content">


							<div id="full-calendar"></div>


					</div> <!-- /.portlet-content -->

				</div> <!-- /.portlet -->



				</div> <!-- /.col-md-9 -->




				<div class="col-md-3">

					<div class="portlet">

						<div class="portlet-header">

							<h3>
								<i class="fa fa-bar-chart-o"></i>
								Donut Chart
							</h3>

						</div> <!-- /.portlet-header -->

						<div class="portlet-content">

							<div id="donut-chart" class="chart-holder" style="height: 250px"></div>
							

						</div> <!-- /.portlet-content -->

					</div> <!-- /.portlet -->



					<div class="portlet">

						<div class="portlet-header">

							<h3>
								<i class="fa fa-compass"></i>
								Traffic Overview
							</h3>

						</div> <!-- /.portlet-header -->

						<div class="portlet-content">


							<div class="progress-stat">
							
								<div class="stat-header">
									
									<div class="stat-label">
										% New Visits
									</div> <!-- /.stat-label -->
									
									<div class="stat-value">
										77.7%
									</div> <!-- /.stat-value -->
									
								</div> <!-- /stat-header -->
								
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
								    <span class="sr-only">77.74% Visit Rate</span>
								  </div>
								</div> <!-- /.progress -->
								
							</div> <!-- /.progress-stat -->

							<div class="progress-stat">
							
								<div class="stat-header">
									
									<div class="stat-label">
										% Mobile Visitors
									</div> <!-- /.stat-label -->
									
									<div class="stat-value">
										33.2%
									</div> <!-- /.stat-value -->
									
								</div> <!-- /stat-header -->
								
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-tertiary" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
								    <span class="sr-only">33% Mobile Visitors</span>
								  </div>
								</div> <!-- /.progress -->
								
							</div> <!-- /.progress-stat -->

							<div class="progress-stat">
							
								<div class="stat-header">
									
									<div class="stat-label">
										Bounce Rate
									</div> <!-- /.stat-label -->
									
									<div class="stat-value">
										42.7%
									</div> <!-- /.stat-value -->
									
								</div> <!-- /stat-header -->
								
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-secondary" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100" style="width: 42%">
								    <span class="sr-only">42.7% Bounce Rate</span>
								  </div>
								</div> <!-- /.progress -->
								
							</div> <!-- /.progress-stat -->

							<br />						

						</div> <!-- /.portlet-content -->

					</div> <!-- /.portlet -->




					<div class="portlet">

						<div class="portlet-header">

							<h3>
								<i class="fa fa-bar-chart-o"></i>
								Sparkline
							</h3>

						</div> <!-- /.portlet-header -->

						<div class="portlet-content">

							<div class="row row-marginless">

								<div class="spark-stat col-md-6 col-sm-6 col-xs-6">

									<div id="total-visits">32, 38, 46, 49, 53, 48, 47, 56</div>
									<span class="value">1,564</span>
									<h5>Total Visits</h5>

								</div> <!-- /.col -->

								<div class="spark-stat col-md-6 col-sm-6 col-xs-6">

									<div id="new-visits">32, 38, 46, 49, 53, 48, 47, 56</div>
									<span class="value">872</span>
									<h5>New Visits</h5>

								</div> <!-- /.col -->

							</div> <!-- /.row -->


							<div class="row row-marginless">

								<div class="spark-stat col-md-6 col-sm-6 col-xs-6">

									<div id="unique-visits">32, 38, 46, 49, 53, 48, 47, 56</div>
									<span class="value">845</span>
									<h5>Unique Visits</h5>

								</div> <!-- /.col -->

								<div class="spark-stat col-md-6 col-sm-6 col-xs-6">

									<div id="revenue-visits" data-bar-color="#c00">32, 38, 46, 49, 53, 48, 47, 56</div>
									<span class="value">$13,492</span>
									<h5>Revenue Visits</h5>

								</div> <!-- /.col -->

							</div> <!-- /.row -->

						</div> <!-- /.portlet-content -->

					</div> <!-- /.portlet -->

				</div> <!-- /.col -->

			</div> <!-- /.row -->

		</div> <!-- /#content-container -->
		

	</div> <!-- #content -->	
	
</div> <!-- #wrapper -->

<footer id="footer">
	<ul class="nav pull-right">
		<li>
			Copyright &copy; 2013, Jumpstart Themes.
		</li>
	</ul>
</footer>

<script src="../assets/js/libs/jquery-1.9.1.min.js"></script>
<script src="../assets/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../assets/js/libs/bootstrap.min.js"></script>

<script src="../assets/js/plugins/icheck/jquery.icheck.min.js"></script>
<script src="../assets/js/plugins/select2/select2.js"></script>
<script src="../assets/js/plugins/tableCheckable/jquery.tableCheckable.js"></script>

<!-- <script src="../assets/js/App.js"></script> -->

<!-- <script src="../assets/js/libs/raphael-2.1.2.min.js"></script> -->
<!-- <script src="../assets/js/plugins/morris/morris.min.js"></script> -->

<!-- <script src="../assets/js/demos/charts/morris/area.js"></script> -->
<!-- <script src="../assets/js/demos/charts/morris/donut.js"></script> -->

<!-- <script src="../assets/js/plugins/sparkline/jquery.sparkline.min.js"></script> -->

<script src="../assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="../assets/js/demos/calendar.js"></script>

<script src="../assets/js/demos/dashboard.js"></script>

</body>
</html>