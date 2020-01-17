<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>

    	<?php 

    	if(!empty($page_title)) {
	    	echo $page_title;
	    } else {
	    	echo 'eBPLS System';
	    } ?>

	    <?php if(!empty($sub_title)) {
	    	echo ' - '.$sub_title;
	    } ?>
	</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
	<meta name="author" content="" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/rotate.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />	
	<link rel="stylesheet" href="<?php echo base_url('assets/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css'); ?>" type="text/css" />		
	<link rel="stylesheet" href="<?php echo base_url('assets/css/print.css'); ?>" media="print" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/js/plugins/icheck/skins/minimal/blue.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/js/plugins/select2/select2.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/js/plugins/fullcalendar/fullcalendar.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/js/plugins/datepicker/datepicker.css'); ?>" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font.global.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/App.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>" type="text/css" />
	<?php if(!empty($page) && $page == 'login') { ?><link rel="stylesheet" href="<?php echo base_url('assets/css/Login.css'); ?>" type="text/css" /><?php } ?>
	<script type="text/javascript">
		var baseurl = '<?php echo site_url(); ?>';
	</script>

</head>

<body>

<div id="wrapper">
	<?php if(!empty($page) && $page != 'login') { ?>
		<header id="header" class="no-print">

			<h1 id="site-logo">
				<a href="./index.html">
					<img src="<?php echo base_url('assets/img/logos/logo.png'); ?>" alt="Site Logo" />
				</a>
			</h1>

			<a href="javascript:;" data-toggle="collapse" data-target=".top-bar-collapse" id="top-bar-toggle" class="navbar-toggle collapsed">
				<i class="fa fa-cog"></i>
			</a>

			<a href="javascript:;" data-toggle="collapse" data-target=".sidebar-collapse" id="sidebar-toggle" class="navbar-toggle collapsed">
				<i class="fa fa-reorder"></i>
			</a>

		</header>
		<!-- header -->

		<nav id="top-bar" class="collapse top-bar-collapse">

			<!-- <ul class="nav navbar-nav pull-left">
				<li class="">
					<a href="./index.html">
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
				
			</ul> -->

			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
						<i class="fa fa-user" ></i>
				<?php
					echo $username.''.$lastname;
				?>
					<span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="./page-profile.html">
								<i class="fa fa-user"></i> 
								&nbsp;&nbsp;My Profile
							</a>
						</li>
						<li>
							<a href="./page-calendar.html">
								<i class="fa fa-calendar"></i> 
								&nbsp;&nbsp;My Calendar
							</a>
						</li>
						<li>
							<a href="./page-settings.html">
								<i class="fa fa-cogs"></i> 
								&nbsp;&nbsp;Settings
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?php 
								if($this->uri->segment(2) )
								{
									echo '../user/logout';
								}
								elseif($this->uri->segment(1))
								{
									echo './user/logout';
							}?>">
								<i class="fa fa-sign-out"></i> 
								&nbsp;&nbsp;Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>

		</nav> <!-- /#top-bar -->

		<?php $this->load->view('template/default/sidebar'); ?>

	<?php } ?>