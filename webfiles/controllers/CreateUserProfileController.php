<?php

	require("../../library.php");
	use Functions\UserAccount;
	use Functions\FileUpload;
	/*$account = new UserAccount;
	
	if(!$account->userIsLoged()){
		header("Location: /login");
		exit;
	}*/

	$createUserprofile = new UserAccount;
	$fileupload = new FileUpload;

	if(isset($_POST)){

		if(isset($_FILES['userfile'])){

			foreach($_FILES['userfile']['tmp_name'] as $tmp_name ){
				$fileName = $_FILES['userfile']['name'];
				$fileSize =$_FILES['userfile']['size'];
				$tmpName =$_FILES['userfile']['tmp_name'];
				$fileType=$_FILES['userfile']['type'];
				$folder="../bir/";

				// make file name in lower case
 				$new_file_name = strtolower($fileName);
				 // make file name in lower case
				 
				$final_file=str_replace(' ','-',$new_file_name);
				$fileloc = $folder.$final_file;

				$fp      = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);
		        
		        if($fileSize > 2097152){
					$errors[]='File size must be less than 2 MB';
		        }else{	
		    
		    		if(move_uploaded_file($tmpName,$folder.$final_file)){
	 					$appno = $_POST['appno'];
	 					$result = $fileupload->BIRUpload($fileName, $fileType, $fileSize, $fileloc, $content, $appno);
	 				}else{
	 					echo "Cant Upload the File";
	 				}

	 		  	}

			}
		}
		$appno = $_POST['appno'];
		$company_name = strtoupper($_POST['company_name']);
		$IDNo = $_POST['IDNo'];
		$TIN = utf8_encode($_POST['TIN']);
		$address = strtoupper($_POST['address']);
		$province = strtoupper($_POST['province']);
		$country = strtoupper($_POST['country']);
		$zip_code = utf8_encode($_POST['zip_code']);
		$telephone = utf8_encode($_POST['telephone']);
		$mobile = utf8_encode($_POST['mobile']);
		$companyemail = utf8_encode($_POST['companyemail']);
		$usertype = strtoupper($_POST['usertype']);
		$servicename = strtoupper($_POST['servicename']);
		$status = utf8_encode($_POST['status']);
		$PEZACORNo = strtoupper($_POST['PEZACORNo']);
		$DateofReg = $_POST['DateOfReg'];
		$RegAct = $_POST['regAct'];
		
		$result = $createUserprofile->addUserProfile($company_name, $IDNo, $TIN, $address, $province, $country, $zip_code, $telephone, $mobile, $companyemail, $usertype, $servicename, $status, $PEZACORNo, $DateofReg, $appno);
		
		foreach($RegAct as $activities){
		
			$createUserprofile->addRegisteredActivity($activities);
				
		}

		$status = "";
		$responseMessage = "";
		
			if($result != "Adding data failed"){

				$status = "Success";
				$responseMessage = "Online registration sent! You are trying to subscribe to the INS Web Portal. Please patiently wait while review and approve your Application";

			}else{

				$status = "Failed";
				$responseMessage = "Account already exist.";
			}

	}
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
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
		<link href="css/customnavbar.css" rel="stylesheet">
		<link href="/css/header.css" rel="stylesheet">
		<!-- CSS custom -->

	</head>
	<body>
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
							<a href="home" class="btn btn-default btn-block"> <i class="fa fa-reply fa-fw"></i> Go to Dashboard</a>
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
