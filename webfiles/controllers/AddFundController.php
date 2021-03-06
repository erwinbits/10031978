<?php

	require("../../library.php");
	use Functions\AccountInfo;


	if(isset($_POST['amount'], $_POST['ORnum'], $_POST['refnum'], $_POST['remarks'])){
		$amount = strtoupper($_POST['amount']);
		$ORnum = $_POST['ORnum'];
		$refnum = strtoupper($_POST['refnum']);
		//$remarks = utf8_encode($_POST['remarks']);
		$cltcode = strtoupper($_POST['cltcode']);
		$id = $_POST['id'];

		$addfund = new AccountInfo; //instantiate
		
		if($addfund->ORnumExist($ORnum)){
			 $status = "WARNING!";
             $responseMessage = "Cannot process your request! OR Number already exist.";
		}else{
			$result = $addfund->addfunds($id, $amount, $ORnum, $refnum, $cltcode);
			
			$status = "";
			$responseMessage = "";
			
			if($result != "Adding data failed"){

				//$addfund->CashierSendsNotif($id,$cltcode);

				$status = "Success";
				$responseMessage = "Funds Successfully Added! Thank You!";
			}else{
				$status = "Failed";
				$responseMessage = "Failed to Add Funds.";
			}
			
		}
		
		
		
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Adding of Fund</title>
		<link rel="icon" href="/ico/favicon.ico">

		<!-- CSS plugins -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<!-- CSS plugins -->

		<!-- CSS custom -->
		<link href="/css/CreateUser.css" rel="stylesheet">
		<link href="css/header.css" rel="stylesheet">
        <link href="css/customnavbar.css" rel="stylesheet">
		<!-- CSS custom -->

	</head>

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
                                 <!-- 
            <ul class="dropdown-menu">
                                        <li><a href="http://www1.intercommerce.com.ph/our-services/board-of-investments/">Board of Investment</a></li>
                                        <li><a href="http://www1.intercommerce.com.ph/our-services/bureau-of-customs/">Bureau of Customs</a></li>
                                        <li><a href="http://www1.intercommerce.com.ph/our-services/clark-development-corporation/">Clark Development Council</a></li> 
                                        <li><a href="http://www1.intercommerce.com.ph/our-services/department-of-agriculture/">Department of Agriculture</a></li> 
                                        <li><a href="http://www1.intercommerce.com.ph/our-services/philippine-economic-zone-authority/">Philippine Economic Zone Authority</a></li> 
                                        <li><a href="http://www1.intercommerce.com.ph/our-services/subic-bay-metropolitan-authority/">Subic Bay Metropolitan Authority</a></li> 
                                        <li><a href="http://www1.intercommerce.com.ph/our-services/other-services/">Other Services</a></li> 
                                  </ul>-->
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


	<body>

		<div class="container">
			<br>
			<br>
			
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" id="">
					<div class="panel panel-default" id="">

						<div class="panel-heading" id="">
							<h4><?php echo $status; ?></h4>
						</div>
						
						<div class="panel-body" id="">
							<?php echo $responseMessage; ?><br><br>
							<a href="home" class="btn btn-default btn-block"><i class="fa fa-reply fa-fw"></i> Back</a>
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
