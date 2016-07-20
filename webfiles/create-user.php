
<?php

	require("../library.php");
	use Functions\UserAccount;
	use Tools\MCrypt;
	
	$account = new UserAccount;
	$MCrypt = new MCrypt;
	
	// if(!$account->userIsLoged()){
	// 	header("Location: /login");
	// 	exit;
	// }

	// $info = json_decode($MCrypt->decrypt($account));
	
	// if($info->account == "Client"){
	// 				echo "You dont have access on this page";
	// 				header("Location: /401");
	// 			}
	
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Create User Form</title>
		<link rel="icon" href="/ico/favicon.ico">
		
		<!-- CSS plugins -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/sb-admin-2.css" rel="stylesheet">
		<!-- CSS plugins -->
		
		<!-- CSS custom -->
		<link href="/css/header.css" rel="stylesheet">
		<link href="/css/customnavbar.css" rel="stylesheet">
		<link href="/css/footer.css" rel="stylesheet">
		<link href="/css/create-user.css" rel="stylesheet">
		<link href="/css/datepicker.css" rel="stylesheet">
		<!-- CSS custom -->
	</head>
	
	<body>
	
		<?php
			include("header.php");
			include('sidemenubar.php');
		?>
		
		<!--Page Content-->
		<div id="page-wrapper">
		
			<div class="container-fluid">
			
				<br>
				<h2>Create User Account</h2>
				<hr>
			  
				<form data-toggle="validator" class="form-horizontal" role="form" id="create-user-form" action="CreateUser" method="POST">

					<div class="panel panel-default">
						
						<div class="panel-body">

							<h4><strong>Company Profile</strong></h4>

							<div class="inner-panel">
								<!-- <div class="form-group">
									<label class="control-label" for="id">ID</label>
									<input type="text" class="form-control" name="id" placeholder="ABCDEF123456" required>
									<div class="help-block with-errors"></div>
								</div> -->

								<div class="form-group">
									<label for="email" class="control-label">Email</label>
									<input type="email" class="form-control" name="email" placeholder="example@email.com" data-error="Invalid email address" required>
									<div class="help-block with-errors"></div>
								</div>

								<div class="form-group">
									<label class="control-label" for="usertype">Account</label>
									<select name="account" class="form-control" required>
										<option value = "">Select Account</option>
										<option value = "2">Client</option>
										<option value = "3">Customer Service</option>
										<option value = "1">Admin</option>
										<option value = "4">Cashier</option>
									</select>
									<div class="help-block with-errors"></div>
								</div>

								
							</div>



						</div>

					</div>

				</form>
				
			</div><!--Container-->
			
		</div><!--Page Wrapper-->
		
		<?php
			include('footer.php');
		?>
		
		<!-- JavaScript plugins -->
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/validator.min.js"></script>
		<script src="/js/bootstrap-datepicker.js"></script>
		<!-- JavaScript plugins -->
		
		<!-- JavaScript custom -->
		<script src="/js/datepicker.js"></script>
		<!-- JavaScript custom -->
		
	</body>

</html>
