<?php
	require ('../../library.php');
	
	use Controllers\LoginController;
	use Controllers\SidebarController;
	use Views\dashboardView;
	use Views\showPage;
	use Models\UserManagement\UserInfo;
	use Models\UserManagement\ProfileManagement;

	$auth = new LoginController;
	$sidebar = new SidebarController;
	$view = new showPage;
	$dash = new DashboardView;
	$userinfo = new UserInfo;
	$profile = new ProfileManagement;

	$auth->auth();
	$view->showScripts();
	$view->showHeader('AEDS home');	
	
	$sidebar->showAEDSSidebar();
	$name = $userinfo->getUserName();
	
?>
<body>
<div id="page-wrapper">
<?php
	$view->greet($name);
	$dash->showBoxPanelAEDS();
	$dash->showAEDSTaskboard();
	$dash->showAnnouncementSection();

?>
</div>
</body>
<?php $view->showFooter();?>
