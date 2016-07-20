<?php

	require("../../library.php");
	use Functions\UserAccount;

	/*$account = new UserAccount;
	
	if(!$account->userIsLoged()){
		header("Location: /login");
		exit;
	}*/

	//if(isset($_POST['usertype'], $_POST['username'], $_POST['pw'])){
		if($_POST){
		//$usertype = utf8_encode($_POST['usertype']);
		$email = utf8_encode($_POST['email']);
        $username = utf8_encode($_POST['username']);
		//$pw = utf8_encode($_POST['pw']);
		$name = strtoupper($_POST['name']);
		$middle_name = strtoupper($_POST['middlename']);
		$surname = strtoupper($_POST['lastname']);

		$createUserlogin = new UserAccount; //instantiate
		
		//$result = $createUserlogin->addUserLogin($username, $usertype, $pw); //use the function to add user.

		$result = $createUserlogin->addAccount2($username, $email, $name, $surname, $middle_name);
		$status = "";
		$responseMessage = "";
		
		if($result != "Adding data failed"){
			$status = "We successfully created your account";
			$responseMessage = "Your account credentials was sent to your email. Please check and try to login in our system.";
		}else{
			$status = "User Account Exist.";
			$responseMessage = "<p>We encountered an Error while creating your account.</p>";
            $responseMessage .= "<p>The account you are trying to sign up for is existing in our system. If you find this a mistake, please call <a href = 'http://www1.intercommerce.com.php/contact'>INS Customer Serrvice</a>.</p>";
            $responseMessage .= $result;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php $title; ?></title>
        <link rel="icon" href="/ico/favicon.ico">
        
        <!-- CSS plugins -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <!-- <link href="css/sb-admin-2.css" rel="stylesheet"> -->
        <!-- CSS plugins -->
        
        <!-- CSS custom -->
        <link href="css/header.css" rel="stylesheet">
        <link href="css/customnavbar.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/create-form.css" rel="stylesheet">
        <!-- CSS custom -->
    </head>
    
    <body>

        <?php
        // include('../header.php');
        // include('../menubarAdmin.php');
        ?>  

    </body>

		<br>
		<br>
		<div class="container">
		
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" id="">
					<div class="panel panel-default" id="">

						<div class="panel-heading" id="">
							<h4><?php echo $status; ?></h4>
						</div>
						
						<div class="panel-body" id="">
							<?php echo $responseMessage; ?><br><br>
							<a href="/home" class="btn btn-default btn-block"> <!--<i class="fa fa-reply fa-fw"></i>--> Go Back</a>
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


</html>