<?php

	require("../../library.php");
	use Functions\UserAccount;
	$account = new UserAccount;
	
	
	if($account->userIsLoged()){
		header("Location: /home");
		exit;
	}
	else{
		echo '<script>window.location.href = "http://staging.intercommerce.com.ph:84/";</script>';
		//header("Location: /login");

	// if(isset($_POST['email'],$_POST['password'])){
	// 	$username = utf8_encode($_POST['email']);
	// 	$password = utf8_encode($_POST['password']);
	// 	if($account->login($username,$password)){
	// 		header('Location: /home');
	// 	}else{
	// 		echo '<script language="javascript">alert("Incorrect username or password!")</script>';
	// 	}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="icon" href="/ico/favicon.ico">
		
		<!-- CSS plugins -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<!-- CSS plugins -->
		
		<!-- CSS custom -->
		<link href="/css/login.css" rel="stylesheet">
		<!-- CSS custom -->

	</head>
	<body>
		<div class="container" style="margin-top: 40px;">
			<div class="row" id="">
				<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" id="">
					<div class="panel panel-default" id="">
						
						<div class="panel-body" id="">
							<form role="form" action="login" method="POST">
								<fieldset>
									<div class="row" id="">
										<div class="text-center">
											<img class="profile-img" src="/img/header.png" alt="">
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12 col-md-10 col-md-offset-1 ">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="glyphicon glyphicon-user"></i>
													</span> 
													<input class="form-control" placeholder="Username / Email" name="email" type="text" autofocus pattern="[a-zA-Z0-9@.-_]+">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="glyphicon glyphicon-lock"></i>
													</span>
													<input class="form-control" data-placement="top" data-trigger="manual" data-title="Caps lock is on!" name="password" placeholder="Password" type="password" data-original-title="" title="">
												</div>
											</div>
											<div class="form-group">
												<input type="submit" class="btn btn-md btn-default btn-block" value="Login">
											</div>
										</div>
									</div>
								</fieldset>
							</form>
							<center><a href="/forgotpass">Forgot Password?<a></center>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		<!-- JavaScript plugins -->
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/login.js"></script>
		<!-- JavaScript plugins -->
	</body>
</html>
