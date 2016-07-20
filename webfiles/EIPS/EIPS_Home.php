<?php
	require ('../../library.php');
	
	use Controller\LoginController;
	use Controller\SidebarController;
	use View\dashboardView;
	use View\showPage;
	use Model\UserManagement\UserInfo;
	use Model\UserManagement\ProfileManagement;

	$auth = new LoginController;
	$sidebar = new SidebarController;
	$view = new showPage;
	$dash = new dashboardView;
	$userinfo = new UserInfo;
	$profile = new ProfileManagement;

	$auth->auth();
	$view->showScripts();
	$view->showHeader('EIPS home');	
	
	$sidebar->showEIPSSidebar();
	$name = $userinfo->getUserName();
	
?>
<body>
<div id="page-wrapper">
<?php
	$view->greet($name);
	$dash->showBoxPanelEIPS();
	$dash->showEIPSTaskboard();
	$dash->showAnnouncementSection();

?>
</div>
</body>
<?php $view->showFooter();?>
