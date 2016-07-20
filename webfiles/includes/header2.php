<?php 

	require("../../../library.php");
	use Functions\UserAccount;
	use Tools\MCrypt;
	$account = new UserAccount;
	$MCrypt = new MCrypt;

	if(!$account->userIsLoged()){
		header("Location: /login");
		exit;
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