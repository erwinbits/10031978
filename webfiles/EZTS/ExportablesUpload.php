<?php include('../includes/layout.php'); include('../includes/PAL.php'); include('../includes/sidebar.php');

	require("../../library.php");
	use Tools\MCrypt;
	use Functions\Exportables;
	
	$items = new Exportables;

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
			//while(!feof($handle)) 
					$linecount++;
					//$line = fgets($handle, 4096);
					
					if($linecount == 1){
						continue;  
					}
					
					//$data = explode(",", $line);
					
				if($_POST['upload'])
				{
					$HSCode = addslashes($data[3]);
					$itemCode = addslashes($data[4]);
					$itemDesc = addslashes($data[5]);
					$LOAno = addslashes($data[6]);
					$LOAValidity = addslashes($data[7]);
					$Appno=  addslashes($data[8]);
					$TarExt = addslashes($data[9]);
					
					$export = $items->addCSV($HSCode, $itemCode, $itemDesc, $LOAno, $LOAValidity, $Appno, $TarExt);
				}
				
					if($export != "Importing data failed")
					{
						$disp_succImport = "<center><br><br><br><h1>Successfully Imported Application Number:</h1></center><br>
														<center><h3> " . $export . " </h3></center><br>";
						$message = true;
					}else
					{
						$disp_succImport = "There was a problem on the file you uploaded. 
						Please carefully check the file and its content. It should matched the official INS CSV file for BOL upload.";
						$message = true;
					}
			}
			fclose($handle);
	}
		
?>
<!--Page Content-->
		<br>
		<br>
		<div id="page-wrapper">
		
			<div class="container-fluid">
				<?php
				if($message==false)
				{
				?>
				<br>
				<h2>Upload Page</h2>
				<br>
				
				<form data-toggle="validator" enctype="multipart/form-data"  class="form-horizontal"  action="" method="POST">
					<div class="panel panel-default">
								
						<div class="panel-body">

							<h4><strong>Please choose desired document to upload and attach the file.</strong></h4>
							<hr>
							<br>
							<div class="inner-panel">
									
									<div class="form-group">
										<div class="col-sm-3">
										</div>
										<div class="col-sm-8">
											<input type="file" name="csv" data-size="sm" required>
										</div>
									</div>
									<br>
									
									<div class="form-group text-right" style="padding: 15px">
										<hr>
										
										<input class="btn btn-primary" type="submit" name="upload" value="Upload">
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