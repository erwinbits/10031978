<?php include('../includes/ClientLayout.php'); //include('../includes/sidebar.php');

	use Functions\eZTD;

	var_dump($_POST);
     $message = false;
	 /*$items = new eZTD;
	//$HSCODE = $_GET['HSCODE'];                               
	 $result = $items->getHSCODE($HSCODE);
	 foreach($result as $data){
     	//$id = $data['id'];
         $itemName = $data['itemName'];
     	$itemCode = $data['itemCode'];
     	$description = $data['description'];
     	$HSCODE = $data['HSCODE'];
    */

	// if($_POST){
	// 	$itemName = $_POST['itemName'];
 //    	$itemCode = $_POST['itemCode'];
 //    	$description = $_POST['description'];
 //    	$regItem = $_POST['regItem'];
 //    	$quantity = $_POST['quantity'];
	// 	$UOM = $_POST['UOM'];
		
	// 	$result = $items->addeCert($itemName, $itemCode, $description, $regItem, $quantity, $UOM);

	// 	$status = "";
	// 	$responseMessage = "";
		
	// 	if($result != "Adding data failed"){
	// 		$status = "Success";
	// 		$responseMessage = "User has been created! Password has been sent to new user's email.";
	// 		$message = true;
	// 	}else{
	// 		$status = "Failed";
	// 		$responseMessage = "Account already exist.  " . $result;
	// 	}
	// }
?>

<!-- FORM -->
	<!--Page Content-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<?php
				if($message==false)
				{
			?>
			<form class="form-horizontal" id="eCertForm" name="eCertForm" action="" method="POST">
				<br>
				<br>
				<div class="panel panel-default">
					
					<!-- PANEL HEADING -->
					<div class="panel-heading text-center">
						<strong>eCert Form</strong>
					</div>

					<!-- PANEL BODY -->
					<div class="panel-body">
					<!-- TABLE -->
						
						<table style="margin:0 auto;">
						<tr>
							<td><input class="form-control input-required" type="text" name="#" value="" placeholder="Name of ELSE"></td>
							<td><input class="form-control" type="text" name="#" value="" placeholder="Where items will be use?"></td>	
							<td><input class="form-control" type="text" name="#" value="" placeholder="Thru?"></td>direct import, indirect import, 
						</tr>
						</table>
					</div>
					
					<div class="panel-body">
					<!-- TABLE -->
						
						<table style="margin:0 auto;">
						<tr>
							<td><input class="form-control input-required" type="text" name="itemName" value="<?php echo $itemName;?>" readonly></td>
							<td><input class="form-control input-required" type="text" name="itemCode" value="<?php echo $itemCode;?>" readonly></td>
							<td><input class="form-control input-required" type="text" name="description" value="<?php echo $description;?>" readonly></td>
							<td><input class="form-control input-required" type="text" name="quantity" value="" placeholder="Quantity"></td>
							<td><input class="form-control" type="text" name="UOM" value="" placeholder="Unit of Measure"></td>	
						</tr>
						</table>
					</div>

					<!-- PANEL FOOTER -->
					<div class="panel-footer">
						<div class="text-right">
							<input type="submit" class="btn btn-primary" name="submit" value="Submit">
							<input type="hidden" name="status" value="0">
						</div>
					</div>
				</div>
			</form>
			<?php
			}else{
					echo $disp_success;
				}	
			?>
		</div>
<!-- General -->
	</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>