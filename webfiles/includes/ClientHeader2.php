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

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "7" && $info->account != "6" && $info->account != "1"){
        echo "You dont have access on this page";
        header("Location: /401");
    }

	$userName = $account->userName();
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
<div>
	<ul class="user-menu">
        <li class="dropdown pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $userName;?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="ProfilePage"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                <li><a href="AccountPage"><span class="glyphicon glyphicon-usd"></span> Account</a></li>
                <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </li>   
	</ul>
</div>	