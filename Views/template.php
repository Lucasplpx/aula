<!DOCTYPE html>
<!-- 
Template Name: Pangong - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: https://hencework.ticksy.com/
License: You must have a valid license purchased only from themeforest to legally use the template for your project.
-->
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Home | Lab</title>
	
	<meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- vector map CSS -->
	<link href="<?php echo BASE_URL;?>assets/vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />

	<!-- Toggles CSS -->
	<link href="<?php echo BASE_URL;?>assets/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo BASE_URL;?>assets/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

	<!-- Toastr CSS -->
	<link href="<?php echo BASE_URL;?>assets/vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="<?php echo BASE_URL;?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="loader-pendulums"></div>
	</div>
	<!-- /Preloader -->

	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

		<!-- Top Navbar -->
		<nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
			<a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i
					 data-feather="menu"></i></span></a>
			<a class="navbar-brand" href="dashboard1.html">
				<img class="brand-img d-inline-block" src="<?php echo BASE_URL;?>assets/dist/img/labtoxy125.png" alt="brand" />
			</a>
			<ul class="navbar-nav hk-navbar-content">
				<li class="nav-item">
					<a id="navbar_search_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i
							 data-feather="search"></i></span></a>
				</li>
				<li class="nav-item">
					<a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i
							 data-feather="settings"></i></span></a>
				</li>

				<li class="nav-item dropdown dropdown-authentication">
					<a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
					 aria-expanded="false">
						<div class="media">
							<div class="media-img-wrap">
								<div class="avatar">
									<img src="<?php echo BASE_URL;?>assets/dist/img/avatar12.jpg" alt="user" class="avatar-img rounded-circle">
								</div>
								<span class="badge badge-success badge-indicator"></span>
							</div>
							<div class="media-body">
								<span><?php echo $viewData['user']->getNome();?><i class="zmdi zmdi-chevron-down"></i></span>
							</div>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
						<a class="dropdown-item" href="profile.html"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
						<a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-card"></i><span>My balance</span></a>
						<a class="dropdown-item" href="inbox.html"><i class="dropdown-icon zmdi zmdi-email"></i><span>Inbox</span></a>
						<a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-settings"></i><span>Settings</span></a>
						<div class="dropdown-divider"></div>
						<div class="sub-dropdown-menu show-on-hover">
							<a href="#" class="dropdown-toggle dropdown-item no-caret"><i class="zmdi zmdi-check text-success"></i>Online</a>
							<div class="dropdown-menu open-left-side">
								<a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-check text-success"></i><span>Online</span></a>
								<a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-circle-o text-warning"></i><span>Busy</span></a>
								<a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-minus-circle-outline text-danger"></i><span>Offline</span></a>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo BASE_URL?>login/logout"><i class="dropdown-icon zmdi zmdi-power"></i><span>Sair</span></a>
					</div>
				</li>
			</ul>
		</nav>
		<form role="search" class="navbar-search">
			<div class="position-relative">
				<a href="javascript:void(0);" class="navbar-search-icon"><span class="feather-icon"><i data-feather="search"></i></span></a>
				<input type="text" name="example-input1-group2" class="form-control" placeholder="Type here to Search">
				<a id="navbar_search_close" class="navbar-search-close" href="#"><span class="feather-icon"><i data-feather="x"></i></span></a>
			</div>
		</form>
		<!-- /Top Navbar -->

		<!-- Vertical Nav -->
		<nav class="hk-nav hk-nav-dark">
			<a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
			<div class="nicescroll-bar">
				<div class="navbar-nav-wrap">

					<hr class="nav-separator">
					<div class="nav-header">
						<span>Lab Tox</span>
						<span>LT</span>
					</div>
					<ul class="navbar-nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL?>">
								<span class="feather-icon"><i data-feather="layout"></i></span>
								<span class="nav-link-text">Home</span>
							</a>
						</li>

						<?php if( $viewData['user']->temPermissao('ver_permissoes') ):?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL;?>permissao">
								<span class="feather-icon"><i data-feather="layout"></i></span>
								<span class="nav-link-text">Permissões</span>
							</a>
						</li>
						<?php endif;?>

						<?php if( $viewData['user']->temPermissao('categories_view') ):?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL;?>categories" >
								<span class="feather-icon"><i data-feather="type"></i></span>
								<span class="nav-link-text">Categorias</span>
							</a>
						</li>
						<?php endif;?>

						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0);">
								<span class="feather-icon"><i data-feather="anchor"></i></span>
								<span class="nav-link-text">Link</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0);">
								<span class="feather-icon"><i data-feather="server"></i></span>
								<span class="nav-link-text">Link</span>
							</a>
						</li>

				</div>
			</div>
		</nav>
		<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
		<!-- /Vertical Nav -->

		<!-- Setting Panel -->

		<!-- /Setting Panel -->

		<!-- Main Content -->
		<div class="hk-pg-wrapper">
			<!-- Container -->
			<div class="container mt-xl-50 mt-sm-30 mt-15">
					
            	<?php $this->loadViewInTemplate($viewName, $viewData);?>

				</div>
				<!-- /Container -->

				<!-- Footer -->
				<div class="hk-footer-wrap container">
					<footer class="footer">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<p>Projeto by<a href="#" class="text-dark" target="_blank"><?php echo $viewData['user']->getNome(); ?></a> © 2019</p>
							</div>
							<div class="col-md-6 col-sm-12">

								<a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i
										 class="fa fa-facebook"></i></span></a>
								<a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i
										 class="fa fa-twitter"></i></span></a>
								<a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i
										 class="fa fa-google-plus"></i></span></a>
							</div>
						</div>
					</footer>
				</div>
				<!-- /Footer -->
			</div>
			<!-- /Main Content -->

		</div>
		<!-- /HK Wrapper -->

	<!-- jQuery -->
	<script src="<?php echo BASE_URL;?>assets/vendors/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
	<script src="<?php echo BASE_URL;?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/dist/js/jquery.slimscroll.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="<?php echo BASE_URL;?>assets/dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- FeatherIcons JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/dist/js/feather.min.js"></script>

	<!-- Toggles JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/vendors/jquery-toggles/toggles.min.js"></script>
	<script src="<?php echo BASE_URL;?>assets/dist/js/toggle-data.js"></script>

	<!-- Counter Animation JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/vendors/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="<?php echo BASE_URL;?>assets/vendors/jquery.counterup/jquery.counterup.min.js"></script>

	<!-- EChartJS JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/vendors/echarts/dist/echarts-en.min.js"></script>

	<!-- Sparkline JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

	<!-- Vector Maps JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
	<script src="<?php echo BASE_URL;?>assets/vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo BASE_URL;?>assets/dist/js/vectormap-data.js"></script>

	<!-- Owl JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Toastr JS
	<script src="assets/vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	-->
		
	<!-- Init JavaScript -->
	<script src="<?php echo BASE_URL;?>assets/dist/js/init.js"></script>
	<script src="<?php echo BASE_URL;?>assets/dist/js/dashboard-data.js"></script>

</body>

</html>