<?php
include('../includes/ClientLayout.php'); 

use Controller\SidebarController;
use Functions\Item;
use Functions\eZTD;
use Functions\eIP;
use Model\UserManagement\ProfileManagement;
use Model\UserManagement\UserInfo;
use View\EIPviews;

$userinfo = new UserInfo;
$profile = new ProfileManagement;
$eip = new eIP;
$eztd = new eZTD;
$show = new EIPviews;
$id = $_SESSION['userid'];

$zcode = $eztd->getZone($id);
$userregisteredactivity = $profile->getRegisteredActivities();
$sidebar = new SidebarController;
$sidebar->showEIPSSidebar();


if(!$account->userIsLoged()){
	header("Location: /login");
	exit;
}

$info = json_decode($MCrypt->decrypt($account));
if($info->account != "1"){
	echo "You dont have access on this page";
	header("Location: /401");
}

if(isset($_POST['chk'])){
	
	$itemCount = count($_POST['chk']);
	$appno = "APEIP" . substr(time(),4) . rand(1000, 9999) . date("Y");
	$itemID = $_POST["chk"];

}


$today = date('Y-m-d');

?>
<body>
	
	<link href="css/AdminLTE.min.css" rel="stylesheet">
	<div id="page-wrapper">

	<!-- JS -->

	<script src="js/jquery.js"></script>
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/sb-admin-2.js" rel="stylesheet"></script>
	<script src="js/metisMenu.min.js"></script>

	<!-- AUTOPOPULATE -->
	<link href="css/jquery-ui.css" rel="stylesheet">
	<script src="js/jquery-ui.js"></script>
	<script src="js/hscodeautocom.js"></script>
	<script src="js/eipform.js"></script>


		<br>
		<h2>e-IMPORT PERMIT APPLICATION FORM</h2>
		<hr>
		<h4>To apply for e-IP, please fill up accurately and completely.</h4>
		<br>
		<form class="form-horizontal" id="eIPForm" name="eIPForm" action="Apply_EIPS_Page_2" method="POST">
			
			<div class="panel panel-default">
				<div class="panel-heading text-center"><strong>GENERAL INFORMATION</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">

						<div id="itemNo" class="form-group">
							<label class="control-label col-sm-3">Application No.</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder=""  value="<?php echo $appno; ?>" name="appno" readonly>
							</div>
						</div>
						<br>	

						<div id="itemNo" class="form-group">
							<label class="control-label col-sm-3">No. of Items</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder=""  value="<?php echo $itemCount; ?>" name="noOfItems" readonly>
							</div>
						</div>
						<br>

						<div id="airwayBill" class="form-group">
							<label class="control-label col-sm-3">AirWay Bill / BOL</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="AWBNO-12345"  value="" name="airwayBill" required>
							</div>
						</div>
						<br>

						<div id="consigneeName" class="form-group">
							<label class="control-label col-sm-3">Consignee Name</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="AWBNO-12345"  value="" name="consigneeName" required>
							</div>
						</div>
						<br>

						<div id="paymentType" class="form-group">
							<label class="control-label col-sm-3">Payment Type</label>
							<div class="col-sm-8">
								<select class="form-control" name="paymentType" required>
									<option value="ByUser">I will pay</option>
									<option value="ByConsignee">Consignee will pay</option>
								</select>
							</div>
						</div>
						<br>

						<div id="arrivalDate" class="form-group">
							<label class="control-label col-sm-3">Arrival Date</label>
							<div class="col-sm-8">
								<input class="form-control" type="date" value="" name="consigneeName" required>
							</div>
						</div>


						<br>

					</table>			
				</div>
			</div>
	</form>
	<!-- General -->
</body>

<!--scroll result-->
<style>
	.ui-autocomplete {
		max-height: 100px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
		width: 400px;
	}
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
   * html .ui-autocomplete {
   	height: 200px;

   }
</style>
	<?php 
	include('../includes/footer.php');
	include('../includes/itemTemplate.php');
	
	?>