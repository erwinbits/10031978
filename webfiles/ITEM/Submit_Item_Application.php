<?php

	require ('../../library.php');
	
	use Controller\LoginController;
	use Controller\SidebarController;
	use View\showPage;
	use View\MainView;
	use Model\UserManagement\UserInfo;
	use Model\UserManagement\ProfileManagement;
	use Model\ItemManagement\Item;

	$auth = new LoginController;
	$sidebar = new SidebarController;
	$view = new showPage;
	$mainView = new MainView;
	$userinfo = new UserInfo;
	$profile = new ProfileManagement;
	$item = new Item;

	$auth->auth();
	
	$view->showScripts();
	$view->showHeader('Item Application');	
	
	$sidebar->showEztsSidebar();
	$name = $userinfo->getUserName();
	$userregisteredactivity = $profile->getRegisteredActivities();
	
	
?>		
<div id="page-wrapper">
	<div class="container-fluid">
		<?php

			
			if(isset($_POST['applyItem'])){

			
			//	var_dump($_POST);
			$count = count($_POST['HSCODE']);
			for($i=0;$i<$count;$i++){
				
				$HSCODE = strtoupper($_POST['HSCODE'][$i]);
				$itemCode = strtoupper($_POST['itemCode'][$i]);
				$description = strtoupper($_POST['description'][$i]);
				$itemName = strtoupper($_POST['itemName'][$i]);
				$TAR_Ext = strtoupper($_POST['TAR_Ext'][$i]);
				$registeredActivity = strtoupper($_POST['regAct'][$i]);
				$frequency = strtoupper($_POST['frequency'][$i]);
				
				if(isset($_POST['LOANo'][$i])){
					$loaNumber = strtoupper($_POST['LOANo'][$i]);
				}else{
					$loaNumber = "";
				}
				
				if(isset($_POST['LOAValidity'][$i])){
					$loaValidity = strtoupper($_POST['LOAValidity'][$i]);
				}else{
					$loaValidity = "00/00/0000";
				}
				
			
				$message = $item->addItem($HSCODE, $TAR_Ext, $description, $itemName, $itemCode, $registeredActivity, $frequency, $loaNumber, $loaValidity);
			}

				$view->showSuccess($message);

			}else{

				echo "<script>window.location.href = '/home'; </script>";
			
		}
		?>

	</div>
</div>

<?php $view->showFooter();?>

