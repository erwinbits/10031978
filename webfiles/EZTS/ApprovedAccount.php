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


<?php
require("../../library.php");
use Functions\UserInfo;
	
	$msg = false;
	$users = new UserInfo;
    var_dump($_POST);
    
	if($_POST){
		$ZONE_CODE = $_POST['ZONE_CODE'];
		$cltcode = $_POST['cltcode'];

		$result = $users->activateUserStatus($status, $ZONE_CODE, $cltcode, $id);

		if($result != "FAILED"){
				$disp_success = "<center><h4>This Account had been successfully activated</h4></center><br>";
				
			}else{
				$disp_success = "Approval Failed!";
			}
		$msg= true;
	}
?>


<!--Page Wrapper-->
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
            	<?php
				if($msg==false){
				?>
            	<form data-toggle="validator" class="form-horizontal" role="form" action="" method="POST">
	                <div class="panel panel-default">
	                    <div class="panel-body">
	                       <div class="inner-panel">
								<div class="form-group">
									<center><br><br><br><h2>Are you sure you want to proceed in activating this account?<h2></center>
									
									<center>
										<input type="submit" class="btn btn-primary" value="Activate"> &nbsp; | &nbsp;
										<a href="UserList"><input type="button" class="btn btn-default" value="Back"></a>
										<input type="hidden" name="status" value="1">
									</center>																			
								</div>
							</div>
	                    </div>
	                </div>
	            </form>
	            <?php }else{
	            	echo $disp_success;
	            }	?>
            </div>
        </div><!--/.row-->  
</div><!--Page Wrapper-->