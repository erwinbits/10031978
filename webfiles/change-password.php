<?php

	require("../library.php");
	use Functions\UserAccount;
	use Tools\MCrypt;
	$account = new UserAccount;
	$MCrypt = new MCrypt;
	
	if(!$account->userIsLoged()){
		header("Location: /login");
		exit;
	}
	
	if(!isset($_POST['username'],$_POST['password'],$_POST['new_password'])){
		echo '<script language="javascript">alert("Incomplete data!")</script>';
		header("Location: /home");
		exit;
	}
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$newPassword = $_POST['new_password'];
	
	$changingPassword = $account->changePassword($username, $password, $newPassword);
	
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

	</head>
	<body>
	
		<div class="container">
		
			<?php
				echo "<script language=\"javascript\">alert(\"$changingPassword\")</script>";
			?>
			
			<div class="row" id="">
				<div class="col-xs-12" id="">
					<a href="/home" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
				</div>
			</div>
			
		</div>
		
		<!-- JavaScript plugins -->
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<!-- JavaScript plugins -->
		
	</body>
</html>