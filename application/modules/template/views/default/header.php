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
	    	echo '';
	    } ?>

	    <?php if(!empty($sub_title)) {
	    	echo ' - '.$sub_title;
	    } ?>
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
	<meta name="author" content="" />
	<link href="<?php echo base_url()?>favicon.ico" type="image/x-icon" rel="icon" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/rotate.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/metisMenu.css'); ?>" type="text/css" />	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jasny-bootstrap.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" type="text/css" />	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" type="text/css" />	
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

	<?php if(!empty($page) && $page == 'login') { ?>
		<!--link rel="stylesheet" href="<?php echo base_url('assets/css/Login.css'); ?>" type="text/css" /--><?php 
	} ?>
	<script type="text/javascript">
		var baseurl = '<?php echo site_url(); ?>';
	</script>
	
</head>

<body>

<div id="wrapper">
	<?php if(!empty($page) && $page != 'login') { ?>
		
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">            
                <p class="text-info" style="font-size:16px;margin-top:3%;"><em><font size="5px">&nbsp;Compostela </font>| Business Permit and Licensing System </em></p>
            </div>
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
					<i class="fa fa-table" ></i>
					<span id="dates"></span>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-user" ></i>
				<?php
					$check= $this->db
							->select('firstname, lastname')
							->from('users')
							->where('username', $username)
							->get();
					foreach($check->result() as $t){
						echo $t->firstname.' '. $t->lastname;
					}
				?>
					<span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">						
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
		<?php $this->load->view('template/default/sidebar'); ?>
		<script>
				var dates = new Date();
			
				var dd = dates.getDate();
				var mm = dates.getMonth()+1; //January is 0!
				var yyyy = dates.getFullYear();

					if(dd < 10)
						{
							dd = '0'+ dd;
						}
					if(mm < 10)
						{
							mm = '0' + mm;
						}
				var dates = mm+'-'+dd+'-'+yyyy;
		
				document.getElementById("dates").innerHTML = dates;
			</script>
	<?php } ?>