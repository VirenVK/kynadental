<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no ">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login</title>
	<link rel="icon" href="<?php echo WEB_PATH;?>images/favicon.jpg?cjv=<?php echo CSSJS_VERSION;?>" type="image/ico">
	<link rel="stylesheet" href="https://use.typekit.net/xqi6txn.css">
	<link rel="stylesheet" href="https://use.typekit.net/xqi6txn.css">
	<link href="<?php echo WEB_PATH;?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?php echo WEB_PATH;?>css/sb-admin-2.css" rel="stylesheet">
	<link href="<?php echo WEB_PATH;?>css/style.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="login-block">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-6 col-lg-5 mx-auto">
				<div class="card card-signin border-0 shadow mt-5">
					<div class="card-body p-5">
						<div class="row">
							<div class="offset-2 col-8 mb-3">
								<center><img src="<?php echo WEB_IMG_PATH;?>image/login.png" class="mx-auto img-fluid"></center>
							</div>
						</div>
						<h5 class="card-title text-center mb-5 font-weight-light">Forgot Password</h5>
						<?php $this->load->view('theme/message_view');?>
						<?php echo form_open(WEB_URL.'login/forgotPwd');?>
						<div class="form-group mb-3">
							<input type="email" class="form-control form-control-user pt-2 pb-2" id="exampleInputEmail" name="username" aria-describedby="emailHelp" placeholder="Enter Email Address...">
						</div>
						<button type="submit" name="submit" value="submit" class="btn btn-primary btn-user btn-block font-weight-bold p-2">Login</button>
						<hr>
						<?php echo form_close(); ?>
						<div class="text-center">
							<a class="small btn btn-link btn-user btn-block font-weight-bold " href="<?php echo WEB_URL.'login';?>">Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo WEB_PATH;?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo WEB_PATH;?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo WEB_PATH;?>js/sb-admin-2.min.js"></script>
</body>
</html>
