<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

	use Functions\Importables;
	
	$message = false;

	if($_POST){
		$file = $_FILES['csv']['tmp_name'];
		$handle = fopen($file, "r");
		if(!($handle=fopen($file, "r"))){
			print "Error! can't read $file \n";
			exit(0);
		}
		
		$linecount = 0;
		ini_set('auto_detect_line_endings', true);
		while(($data=fgetcsv($handle, 1000, ",")) !== FALSE){
		$linecount++;

		if($linecount == 1){
			continue;  
		}

		if($_POST['upload']){
			$cltcode = addslashes($data[1]);
			$HSCODE = addslashes($data[5]);
			$itemCode = addslashes($data[6]);
			$itemName = addslashes($data[7]);
			$description = addslashes($data[8]);
			$regAct = addslashes($data[9]);
			$TAR_Ext = addslashes($data[11]);
			$frequency = addslashes($data[14]);
			$zone = addslashes($data[16]);

			$items = new Importables;
			$import = $items->addItem($HSCODE, $itemCode, $description, $itemName, $TAR_Ext, $regAct, $frequency, $zone, $cltcode);
		}

			if($import != "Importing data failed"){
				$disp_succImport = "<center><br><br><br><h1>Items Successfully Uploaded</h1></center><br>";
				$message = true;
			}else{
				$disp_succImport = "<center>There was a problem on the file you uploaded. 
				Please carefully check the file and its content. It should matched the official INS CSV file for BOL upload.</center>";
				$message = true;
			}
		}
		fclose($handle);
	}
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
	<div class="container-fluid">
		<?php
		if($message==false){
		?>
			<form data-toggle="validator" enctype="multipart/form-data"  class="form-horizontal"  action="" method="POST">
				<br>
				<br>
				<div class="panel panel-default">
					<div class="panel-body">
					<h3>Apply for an item to import (Bulk Upload)</h3>
					<hr>
					<p>To upload items in bulk for application, click the button below and choose the file you would like to upload.</p>
					<p>NOTE: Please ensure the correct file format (in .CSV file) and the correct csv structure. Uploading incompatible file will result to error. If you are unsure of the file, please call our customer service and ask for assistance.</p>
						<br>
						<div class="inner-panel">
							<div class="form-group">
								<div class="col-sm-8">
									<input type="file" name="csv" data-size="sm" required>
								</div>
							</div>
							<br>

				<!-- 			<div class="form-group text-right" style="padding: 15px">
								<hr>
								<input class="form-control" type="submit" name="upload" value="Upload">
							</div> -->
							<div class="text-right">
								<hr>
								<td><input type="submit" class="btn btn-default" name="upload" value="Upload"></td>
							</div>
						</div>
					</div>
				</div>
			</form>
		<?php
		}else{
		echo $disp_succImport;
		}
		?>
	</div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>