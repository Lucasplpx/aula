<!DOCTYPE html>
<!-- 
Template Name: Pangong - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: https://hencework.ticksy.com/
License: You must have a valid license purchased only from themeforest to legally use the template for your project.
-->
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Login</title>
		<meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- Toggles CSS -->
		<link href="<?php echo BASE_URL?>assets/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
		<link href="<?php echo BASE_URL?>assets/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
		
		<!-- Custom CSS -->
		<link href="<?php echo BASE_URL?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Preloader -->
		<div class="preloader-it">
			<div class="loader-pendulums"></div>
		</div>
		<!-- /Preloader -->
		
		<!-- HK Wrapper -->
		<div class="hk-wrapper">
			
			<!-- Main Content -->
			<div class="hk-pg-wrapper hk-auth-wrapper">
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
									<a class="auth-brand text-center d-block mb-20" href="<?php echo BASE_URL?>login">
										<img class="brand-img" src="<?php echo BASE_URL?>assets/dist/img/labtoxy.png" alt="sem img"/>
									</a>

									<?php if(!empty($error)):?>

									<div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
                                        <span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> <?php echo $error; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

									<?php endif;?>

									<form action="<?php echo BASE_URL?>login/index_action" method="POST">
										 
										<div class="form-group">
											<input class="form-control" placeholder="Email" type="email" name="email">
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" placeholder="Password" type="password" name="password">	
											</div>
										</div>
									
										<button class="btn btn-primary btn-block" type="submit">Login</button>
										<p class="font-14 text-center mt-15">Esqueci minha senha</p>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /HK Wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?php echo BASE_URL?>assets/vendors/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo BASE_URL?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
		<script src="<?php echo BASE_URL?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo BASE_URL?>assets/dist/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="<?php echo BASE_URL?>assets/dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- FeatherIcons JavaScript -->
		<script src="<?php echo BASE_URL?>assets/dist/js/feather.min.js"></script>
		
		<!-- Init JavaScript -->
		<script src="<?php echo BASE_URL?>assets/dist/js/init.js"></script>
	</body>
</html>