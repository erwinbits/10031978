<?php 

include('../includes/layout.php'); 
include('../includes/PAL.php'); 
include('../includes/sidebar.php');

	require("../../library.php");
	use Functions\UserAccount;
	use Functions\Exportables;
	use Tools\MCrypt;

	$items = new Exportables;

	//$account = new UserAccount;
	//$MCrypt = new MCrypt;

	/*if(!$account->userIsLoged()){

		header("Location: /login");
		exit;
	} */

	if($_POST){
		$count = count($_POST['HSCode']);
		for($i=0;$i<$count;$i++){
			$HSCode = $_POST['HSCode'][$i];
			$itemCode = $_POST['itemCode'][$i];
			$itemDesc = $_POST['itemDesc'][$i];
			$LOAno = $_POST['LOAno'][$i];
			$LOAValidity = $_POST['LOAValidity'][$i];
			$Appno = $_POST['Appno'][$i];
			$TarExt = $_POST['TarExt'][$i];
		
		$items = new Exportables;
		
		$result = $items->addItem($HSCode, $itemCode, $itemDesc, $LOAno, $LOAValidity, $Appno, $TarExt);

		 if ($result){
   		 	echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
		 }else{
			echo "<script type='text/javascript'>alert('failed!')</script>";
		}
	}
}

?>

<!-- FORM -->
<br>
<br>
	<!--Page Content-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<form class="form-horizontal" id="ExportablesForm" name="ExportablesForm" action="Exportables.php" method="POST">
				<div class="panel panel-default">
	
					<!-- PANEL HEADING -->
					<div class="panel-heading text-center">
						<strong>Add Exportables</strong>
					</div>

					<!-- PANEL BODY -->
					<div class="panel-body">
						<!-- TABLE -->
						<table id="dataTable" class="form">
							<tr>
								<td><input class="form-control input-required" type="text" name="HSCode[]" placeholder="HS Code"></td>
								<td><input class="form-control input-required" type="text" name="itemCode[]" placeholder="Item Code"></td>
								<td><input class="form-control input-required" type="text" name="itemDesc[]" placeholder="Item Desc"></td>
								<td><input class="form-control" type="text" name="LOAno[]" placeholder="LOA No."></td>
								<td><input class="form-control input-required input-number" type="date" name="LOAValidity[]" placeholder=""></td>
								<td><input class="form-control input-required" type="text" name="Appno[]" placeholder="App No."></td>
								<td><input class="form-control input-required" type="text" name="TarExt[]" placeholder="Tar Ext"></td>
							</tr>
						</table>
					</div>

					<div class="text-right">
						<td><input type="button" class="btn btn-primary" value="Add" onClick="addRow('dataTable')"></td>
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">
					</div>

				</div>
			</form>
		</div>
<!-- General -->
	
<?php include('../includes/footer.php');?>
<?php include('../script.php');?>
<!-- JS -->
<script type="text/javascript" src="js/importables.js"></script>

