<?php 

include('../includes/ClientLayout.php'); 
$info = json_decode($MCrypt->decrypt($account));

        if($info->account == "0"){
            include('../includes/AdminSidebar.php');
        }elseif($info->account == "5"){
            include('../includes/CashierSidebar.php');
        }elseif($info->account == "1"){
            include('../includes/sidebar.php');
        }elseif($info->account == "6"){
            include('../includes/elseSidebar.php');
        }elseif($info->account == "7"){
            include('../includes/newsidebar.php');
        }else{
            include('../includes/BrokerSidebar.php');
        }

use Functions\DropDown;
use Controllers\PEZANominateController;
$pezaNominate = new PEZANominateController;
    $message = false;

    if($_POST)
    {

        
        $pezaNominate ->nominate();

    }     
?>

<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<div id="page-wrapper">
	<div class="container-fluid">
	 <?php  

     $pezaNominate ->nominateDisplay()

     ;?>
	</div>
<!-- General -->
</div>

<?php include('../includes/footer.php');?>


<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sb-admin-2.js" rel="stylesheet"></script>
<script src="js/metisMenu.min.js"></script>

<!-- AUTOPOPULATE -->
<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/jquery-ui.js"></script>
<script src="js/autocomplete.js"></script>
<!-- AUTOPOPULATE -->


