<?php

	require("../library.php");
	use Functions\UserAccount;

	$account = new UserAccount;
	
	if(!$account->userIsLoged()){
		header("Location: /login");
		exit;
	}

	if(isset($_POST['email'], $_POST['usertype'], $_POST['password'])){
		//$id = utf8_encode($_POST['id']);
		$email = utf8_encode($_POST['email']);
		$usertype = utf8_encode($_POST['usertype']);
		$password = utf8_encode($_POST['password']);
		
		//$birth_date = date("Y-m-d h:i:s", strtotime(utf8_encode($_POST['birth_date'])));
		
		$createUser = new UserAccount;
		
		$result = $createUser->addAccount2($email, $usertype, $password);

		$status = "";
		$responseMessage = "";
		
		if($result != "Adding data failed"){
			$status = "Success";
			$responseMessage = "User has been created! Password has been sent to new user's email.";
			//echo "<script language=\"javascript\">alert(\"$msg\")</script>";
			//echo $msg;
		}else{
			$status = "Failed";
			$responseMessage = "Account already exist.  " . $result;
			//echo "<script language=\"javascript\">alert(\"$msg\")</script>";
			//echo $responseMessage;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Account Creation</title>
		<link rel="icon" href="/ico/favicon.ico">

		<!-- CSS plugins -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<!-- CSS plugins -->

		<!-- CSS custom -->
		<link href="/css/CreateUser.css" rel="stylesheet">
		<!-- CSS custom -->

	</head>
	<body>

		<div class="container">
		
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" id="">
					<div class="panel panel-default" id="">

						<div class="panel-heading" id="">
							<h4><?php echo $status; ?></h4>
						</div>
						
						<div class="panel-body" id="">
							<?php echo $responseMessage; ?><br><br>
							<a href="/home" class="btn btn-default btn-block"> <i class="fa fa-reply fa-fw"></i> Back</a>
						</div>

					</div>
				</div>
			</div>
			
		</div>

		<!-- JavaScript plugins -->
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<!-- JavaScript plugins -->

		<!-- JavaScript custom -->
		
		<!-- JavaScript custom -->

	</body>
</html>
