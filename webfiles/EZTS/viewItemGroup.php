<?php
//require("../../library.php");
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
 
use Functions\eCERT;
use Functions\eZTD;
use Functions\UserAccount;
use Functions\Item;
use Functions\DropDown;

$itemfunction = new Item;
$ecert = new eCERT;
$eztd = new eZTD;
$account = new UserAccount;
$id = $_SESSION['userid'];

?>

<link href="css/AdminLTE.min.css" rel="stylesheet">
    <div id="page-wrapper">
    <br><br>  
		<div class="row">
			<div class='container-fluid'>
				<div class="panel panel-default">
					<div class="panel-heading text-center"><strong>Item Group</strong></div>
						<div class="panel-body">
						<form class="form-horizontal" id="" name="viewItemGroup" action="processAddItemGroup" method="POST">
							<div class="form-group">
								<label class="control-label col-sm-3 scrollable-menu" for="itemGroupName">Item Group Name</label>
								<div class="col-sm-8">
									<input class="form-control" type="text" id="itemGroupName" value="" placeholder="Select Item Group Name"  name="itemGroupName" required >
								</div>
							</div>						
						<table border="1" cellpadding="5" align="center" width="100%">
							<tr>
								<th bgcolor="#bebfbf" align="center"><strong><center>Generic Description</center></strong></th>               
								<th bgcolor="#bebfbf" align="center"><strong><center>Item Code</center></strong></th>  
								<th bgcolor="#bebfbf" align="center"><strong><center>Specific Description</center></strong></th> 
								<!--<th bgcolor="#bebfbf" align="center"><strong><center>Qty</center></strong></th>               
								<th bgcolor="#bebfbf" align="center"><strong><center>UOM</center></strong></th>  -->
								<th bgcolor="#bebfbf" align="center"><strong><center>Registered Project</center></strong></th>
							</tr>

							<!--- ECERT ITEMS -->

							<?php
								
								$count = count($_POST['HSCODE']);
								for($x=0;$x<$count;$x++)
								{
									$TAR_Ext = $_POST['TAR_Ext'][$x];
									$HSCODE = $_POST['HSCODE'][$x];
									$genDesc = $_POST['genDesc'][$x];
									$itemCode = $_POST['itemCode'][$x];
									$description = $_POST['description'][$x];
									$ItemID = $_POST['ItemID'][$x];
									$regAct = $itemfunction->getItemRegAct($ItemID);
									
									echo '<tr>
									<td align="center">'.$genDesc.'</td>
									<td align="center">'.$itemCode.'</td>
									<td align="center">'.$description.'</td>
									<td align="center">'.$regAct.'</td>
									</tr>';
								} 

							echo '</table>';

						?>
							</div>
						</div>
						<div>
						<br>
							<h4><center>
								Please carefully review before submitting the application.
							</center></h4>
						
							<center>
								<button type="submit" name="view" class="btn btn-primary" onclick="return confirm('Please review the details of your submission. If all is well, please click OK.')">SUBMIT</button>
								<input type="button" name="goback" value="CANCEL"class="btn btn-warning" onclick="window.location.href='/ApprovedItems'"></button>
								
								
							<?php 
								$count = count($_POST['HSCODE']);
								for($x=0;$x<$count;$x++)
								{
									$TAR_Ext = $_POST['TAR_Ext'][$x];
									$HSCODE = $_POST['HSCODE'][$x];
									$genDesc = $_POST['genDesc'][$x];
									$itemCode = $_POST['itemCode'][$x];
									$description = $_POST['description'][$x];
									//$quantity = $_POST['quantity'][$x];
									//$UOM = $_POST['UOM'][$x];
									$ItemID = $_POST['ItemID'][$x];
									//$regAct = $itemfunction->getItemRegAct($ItemID);

									echo'<input type="hidden" name="HSCODE[]" value="'.$HSCODE.'">
									<input type="hidden" name="TAR_Ext[]" value="'.$TAR_Ext.'">
									<input type="hidden" name="genDesc[]" value="'.$genDesc.'">
									<input type="hidden" name="itemCode[]" value="'.$itemCode.'">
									<input type="hidden" name="description[]" value="'.$description.'">
									<input type="hidden" name="ItemID[]" value="'.$ItemID.'">';
								}
							?>

					</center>
					<form>
					<br><br>
				</div>
			</div> <!--end of Panel Default -->
		</div>
	</div>
</body>
<?php include('../includes/footer.php');?>
</html>

<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/itemGroupName.js"></script>

