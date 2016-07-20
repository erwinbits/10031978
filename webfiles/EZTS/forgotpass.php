<?php 
require("../../library.php");

use Functions\UserInfo;
use Functions\UserAccount;
use Functions\FileUpload;
$msg = false;
$createUserprofile = new UserAccount;

    if($_POST){   
        $result = $createUserprofile->forgotpass($_POST['email']);
         	
        if($result != "User creation failed! Please check the data and try again."){
        	$stats = "Password Retrieval";
            $responseMessage = "If you have an account with us, your credentials was sent to your email.";
            $msg = true;
        }else{
        	$stats = "Failed";
            $responseMessage = "Account does not exist."; 
            $msg = true;
        }
     //$errors= array();		
 }
	
?>
<div id="wrapper" style="background-color:#ededed;">
	<!--topheader logo -->
	<div id="topheader">
		<div class="topheadercontainer">
			<div class="row" style="margin:0px 0px; width:100%;">
				<div id="topheaderlogo">
					<img src="/img/header.png" border=0 height="auto" width="100%">
				</div>
			</div>
		</div>
	</div>
		
	<!-- Navbar -->
	<div class="navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					 <span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				 </button>
			</div>
		</div>
	</div>
	<div class="navbar-custom">
		<div class="collapse navbar-collapse navbar-ex1-collapse" id="myNavbar">
			<div class="nav navbar-nav">
				<li><a href="http://www1.intercommerce.com.ph">HOME</a></li>
				<li><a href="http://www1.intercommerce.com.ph/about-us/">ABOUT US</a></li>
					<li class="dropdown">
					  <a href="http://www1.intercommerce.com.ph/our-services/" class="dropdown-toggle" data-toggle="dropdown">SERVICES<b class="caret"></b></a>
					</li>
				<li><a href="http://www1.intercommerce.com.ph/contact/">CONTACT</a></li> 
				<li><a href="http://www1.intercommerce.com.ph/category/news/">PRESS ROOM</a></li> 
				<li><a href="http://www1.intercommerce.com.ph/careers/">CAREERS</a></li> 
				<li><a href="http://www1.intercommerce.com.ph/downloads-2/">DOWNLOADS</a></li> 
				<li><a href="http://www1.intercommerce.com.ph/registration-portal/">REGISTER</a></li>
			</div>
		</div>
	</div>
	<!-- end of navbar -->
</div>
<!-- end of header -->

<link href="css/AdminLTE.min.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forgot Password</title>
        <link rel="icon" href="/ico/favicon.ico">
        
        <!-- CSS plugins -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <link href="css/sb-admin-2.css" rel="stylesheet">
        <link href="css/AdminLTE.min.css" rel="stylesheet">
        <!-- CSS plugins -->
        
        <!-- CSS custom -->
        <link href="css/header.css" rel="stylesheet">
        <link href="css/customnavbar.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/create-form.css" rel="stylesheet">
        <!-- CSS custom -->
    </head>

	<body>
	<div class = "wrapper">
	    <?php if($msg == true){ ?>
	     
		    <div class="container-fluid">
				<br>
				<br>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
						<div class="panel panel-default">

							<div class="panel-heading">
								<h4><?php echo $stats; ?></h4>
							</div>
							
							<div class="panel-body">
								<?php echo $responseMessage; ?><br><br>
								<a href="home" class="btn btn-default btn-block"> <i class="fa fa-reply fa-fw"></i> Go Back</a>
							</div>

						</div>
					</div>
				</div>
			</div>

		<?php 
		}
		if($msg == false)
		{

		?>
		<div class = "wrapper">
	    <br>
	    <br>
	    <form class="form-inline" action="forgotpass" method="POST">
			<div class="container">
				<div class=".col-md-6 .col-md-offset-3">
					<div class="panel panel-default">
						 <div class="panel-heading"><h3><center>Forgot your password?<h3></center></div>
			 				<div class="panel-body">
								<br>
								<center><img src="/img/key.jpeg">
								<h4><p class="lead">Enter the email address you used to register</p></h4></center> 
								<center><h4><p class="lead">and we will send your password via email.</h4></center></p>
								<center>
									<div class="form-group">
	    								<p><center>Please enter your email address below:</center></p>
	    								<input type="email" name="email" class="form-control" id="" placeholder="example@email.com">
	  								</div>
	  								</div>
										<center><button type="submit" class="btn btn-primary">Send my password</button></center>
										<br>
									</div>
									<br>
								</center>			
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		</div>
		<?php 
		}
		?>
	</div>
	</body>
    


	

</html>
<?php include('../includes/footer.php');  ?>

<?php include('../script.php'); ?>


<script type="text/javascript" src="js/datepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>