<?php
require '../../library.php';
use Controllers\ViewController;
use Controllers\LoginController;
use Controllers\SidebarController;
use Views\showPage;

$view = new ViewController;
$auth = new LoginController;
$sidebar = new SidebarController;
$auth->auth();
$show = new showPage;


?>

    <?php
    echo $show->showHeader('TEST');
    echo $show->showScripts();

    ?>
<body>
    <div class="page-wrapper">
        <div class = "container-fluid">
        <?php echo $sidebar->showEztsSidebar(); ?>
        test
        </div>
    </div>
</body>
