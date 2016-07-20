<?php

use Functions\UserInfo;

$userinfo = new UserInfo;

$newuserscount = count($userinfo->getAllNewUserList());

?>
<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
		   
			<!-- <li>
				<a href="home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
			</li> -->

			
			<li>
				<a href="home"><i class="fa fa-check-square-o fa-fw"></i> User/Service Activation</a>
			</li>
				
			<li>
				<a href="AllUserList"><i class="fa fa-check-square-o fa-fw"></i> User List  <span class="badge"><?php echo $newuserscount; ?></span></a>
			</li>

			<li>
				<a href="userServices"><i class="fa fa-check-square-o fa-fw"></i> User Service List</a>
			</li>
			
			<li>
				<a href="logout"><i class="glyphicon glyphicon-log-out fa-fw"></i> Logout</a>
			</li>
				
		</ul>
	</div> 
</div> 