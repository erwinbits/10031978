<?php

	require ('../library.php');
	
	use Controller\LoginController;
	use Controller\SidebarController;
	use View\showPage;
	use View\MainView;
	use Model\AccessManagement\UserAccess;
	use Model\UserManagement\UserInfo;
	use Model\UserManagement\ProfileManagement;
	use Model\ItemManagement\Item;

	$auth = new LoginController;
	$sidebar = new SidebarController;
	$view = new showPage;
	$account = new UserAccess;
	$mainView = new MainView;
	$userinfo = new UserInfo;
	$profile = new ProfileManagement;
	$item = new Item;

	$auth->auth($account);
	
	$view->showScripts();
	$view->showHeader('EZTS Home');	
	
	$sidebar->showEztsSidebar();
	$name = $userinfo->getUserName();
	$userregisteredactivity = $profile->getRegisteredActivities();
	
	
?>		

<div id="page-wrapper">
		<?php
			if(isset($_POST['submit'])){

				$count = count($_POST['HSCODE']);
				for($i=0;$i<$count;$i++){

				$HSCODE = utf8_encode($_POST['HSCODE'];
				$TAR_Ext = utf8_encode($_POST['TAR_Ext']);
				$description = utf8_encode($_POST['TAR_DSC']);
				$itemName = utf8_encode($_POST['itemName']);
				$itemCode = utf8_encode($_POST['itemCode']);
				$frequency = utf8_encode($_POST['frequency']);
				$registeredActivity = utf8_encode($_POST['regAct']);
				$loaNumber = utf8_encode($_POST['LOANo']);
				$loaValidity = utf8_encode($_POST['LOAValidity']);


				$message = $item->addItem($HSCODE, $TAR_Ext, $description, $itemName, $itemCode, $frequency, $registeredActivity, $loaNumber, $loaValidity)

				}

				$view->showSuccess($message);
			}
		?>
</div>

<?php $view->showFooter();?>

