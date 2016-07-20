<?php

	require ('../../library.php');
	
	use Controller\LoginController;
	use Controller\SidebarController;
	use View\showPage;
	use View\MainView;
	use Model\AccessManagement\UserAccess;
	use Model\UserManagement\UserInfo;

	$auth = new LoginController;
	$sidebar = new SidebarController;
	$view = new showPage;
	$account = new UserAccess;
	$mainView = new MainView;
	$userinfo = new UserInfo;

	$auth->auth($account);
	//var_dump($_SESSION['userid']);
	$view->showScripts();
	$view->showHeader('EZTS Home');	
	
	$sidebar->showEztsSidebar();
	$name = $userinfo->getUserName();
	
?>

	<div id="page-wrapper">
		
		<?php
			$view->greet($name);
			$mainView->DashboardBoxes();
			
		?>
	</div>

<?php $view->showFooter();?>
</html>
