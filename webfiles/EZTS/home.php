	<?php
		include('../includes/layout.php');
		use Functions\UserInfo;
		$userinfo = new UserInfo;

		$servicename = 'EZTS';
		$info = json_decode($MCrypt->decrypt($account));
		$AccStatus = $userinfo->checkSubscription($servicename);
		//$AccStatus = $account->getStatus();

		if($info->userType == "ADM" AND $AccStatus == "3"){
			include('../includes/AdminSidebar.php');
		}elseif($info->userType == "CSH" AND $AccStatus == "3"){
			include('../includes/CashierSidebar.php');
		}elseif($info->userType == "IM" AND $AccStatus == "3"){
			include('../includes/sidebar.php');
		}elseif($info->userType == "ELSE" AND $AccStatus == "3"){
			include('../includes/elseSidebar.php');
		}elseif($info->userType == "NEW" AND $AccStatus == "0"){
			include('../includes/newsidebar.php');
		}else{
			include('../includes/sidebar.php');
		}
	?>
	<body>
		<div id="page-wrapper">
			<div class="container-fluid"></div>

			<?php

				if($info->userType == "ADM" AND $AccStatus == "3"){
					include("UserList.php");
				}elseif($info->userType == "CSH" AND $AccStatus == "3"){
					include("CashierDashboard.php");
				}elseif($info->userType == "IM" AND $AccStatus == "3"){
					include("Dashboard.php");
				}elseif($info->userType == "NEW" AND $AccStatus == "3"){
					include("NewDashboard.php");
				}elseif($info->userType == "ELSE" AND $AccStatus == "3"){
					include("ELSEdashboard.php");
				}else{
					include("Dashboard.php");
				}
			?>
			</div>
		</div>
	</body>
	<br>
	<br>
	<br>
	<br>
	<?php include('../includes/footer.php');?>
</html>
