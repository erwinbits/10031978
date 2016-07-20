	<?php

		include('../includes/layout.php');
		$info = json_decode($MCrypt->decrypt($account));
		
		$AccStatus = $account->getStatus();
		
		if($info->account == "0" AND $AccStatus == "2"){
			include('../includes/AdminSidebar.php');
		}elseif($info->account == "5" AND $AccStatus == "2"){
			include('../includes/CashierSidebar.php');
		}elseif($info->account == "1" AND $AccStatus == "2"){
			include('../includes/sidebar.php');
		}elseif($info->account == "6" AND $AccStatus == "2"){
			include('../includes/elseSidebar.php');
		}elseif($info->account == "7" AND $AccStatus == "0"){
			include('../includes/newsidebar.php');
		}else{
			include('../includes/newsidebar.php');
		}
	?>
	<body>
		<div id="page-wrapper">
			<div class="container-fluid"></div>
			
			<?php
				
				if($info->account == "0" AND $AccStatus == "2"){
					include("UserList.php");
				}elseif($info->account == "5" AND $AccStatus == "2"){
					include("CashierDashboard.php");
				}elseif($info->account == "1" AND $AccStatus == "2"){
					include("Dashboard.php");
				}elseif($info->account == "7" AND $AccStatus == "0"){
					include("NewDashboard.php");
				}elseif($info->account == "6" AND $AccStatus == "2"){
					include("ELSEdashboard.php");
				}else{
					include("NewDashboard.php");
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
