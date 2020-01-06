<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from 192.69.216.111/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 05 Oct 2013 16:13:16 GMT -->
<head>
		<meta charset="utf-8" />
		<title>Webbgroup Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="<?php echo base_url(); ?>assets1/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/dropzone.css" /> -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/colorpicker.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="<?php echo base_url(); ?>assets1/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets1/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							Webbgroup
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url(); ?>assets1/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $this->session->userdata('username'); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="<?php echo base_url(); ?>admin/logout">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>
