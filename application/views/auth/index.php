<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<title>Login Toko Mas Ikan Mas</title>
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="<?php echo base_url()?>assets/images/ikanmas-logo.png">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<?php
								echo form_open('auth/login');
								if (validation_errors() || $this->session->flashdata('error')) {
									?>
									<?php echo "<p class='text-danger' >" . validation_errors() . "</p>" ?>                                        
									<?php echo "<p class='text-danger' >" . $this->session->flashdata('error') . "</p>" ?>                                               

								<?php } ?>  													 
								<div class="form-group">
									<label for="email">Username</label>
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus oninvalid="setCustomValidity('Username tidak boleh kosong !')" oninput="setCustomValidity('')">
									<?php echo form_error('username', '<div class="text-red">', '</div>'); ?>
								</div>
								<div class="form-group">
									<label for="password">Password					
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye oninvalid="setCustomValidity('Password tidak boleh kosong !')" oninput="setCustomValidity('')">
									<?php echo form_error('password', '<div class="text-red">', '</div>'); ?>
								</div>
								<div class="form-group">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>								
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; Nexterweb.id 2018
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/my-login.js"></script>
</body>
</html>