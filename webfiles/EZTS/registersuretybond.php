
<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

use Functions\SuretyBond;
use Functions\FileTransfer;


    $message = false;

    $bond = new SuretyBond;
	$ftp = new FileTransfer;

	if(isset($_POST['upload'])){
	
		if(isset($_FILES['userfile'])){
		$errors= array();
		foreach($_FILES['userfile']['tmp_name'] as $key => $tmp_name ){
			$fileName = $_FILES['userfile']['name'][$key];
			$fileSize =$_FILES['userfile']['size'][$key];
			$tmpName =$_FILES['userfile']['tmp_name'][$key];
			$fileType=$_FILES['userfile']['type'][$key];
			$folder="../../../upload_docs/";

			// make file name in lower case
			$new_file_name = $fileName;

			$final_file=str_replace(' ','-',$new_file_name);
			$fileloc = $folder.$final_file;

			$fp      = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			$content = addslashes($content);
			fclose($fp);
			
			if($fileSize > 2097152){
				$errors[]='File size must be less than 2 MB';
			//}else{	
		
			// if(move_uploaded_file($tmpName,$folder.$final_file)){
				$appno = $_POST['appno'];
				$result = $bond->suretyBondUpload($fileName, $fileType, $fileSize, $fileloc, $content, $appno);
				//$transferto24 = $ftp->sftpupload($fileName);
			}else{
				$errors = "Cant Upload the File";
			}

			//}
		}
	

        $suretybond_company = strtoupper($_POST['suretybond_company']);
        $suretybond_ornum = strtoupper($_POST['suretybond_orno']);
        $suretybond_refno = strtoupper($_POST['suretybond_refno']);
        $suretybond_amount = $_POST['suretybond_amount'];
        $suretybond_validity = date("Y-m-d", strtotime($_POST['suretybond_validity']));
        $appno = $_POST['appno'];

        $result = $bond->registerSuretyBond($suretybond_company, $suretybond_ornum, $suretybond_refno, $suretybond_amount, $suretybond_validity, $appno);
         
        if($result != "Adding data failed"){
            $disp_success = "<center><br><br><h3>Thankyou for using eZTS.</h3></center>"; 
            $disp_success .= "<center><h3>Your suretybond details was successfully sent for review and approval.</h3></center>";
            $disp_success .= "<center><h3>You will receive an email notification once processed.</h3></center>";
            //$disp_success .= "<a href = '/home'>GO BACK</a>";
            $message = true;
        }else{
            $disp_success = "Failed to register surety bond."; 
        }
   		$message = true;
    }else{
		echo "Something went wrong";
	}
}
?>
<!-- Suretybond Registration -->
<!--Page Content-->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<div id="page-wrapper">
	<div class="container-fluid">
	<?php if($message == false){
		$appno = "SB-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y"); 
		?> 	
		<form data-toggle="validator" class="form-horizontal" id="create-form" role="form" action="" method="POST" enctype="multipart/form-data">
			
			<div class="panel-body">
				
				<div class="inner-panel">
					<br>
					<h4><strong>Surety Bond Info</strong></h4>
					<hr>

					<div class="form-group">
						<label style="color:#4E4E4E;" class="control-label col-md-3">Application Number</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="appno" value="<?php echo $appno;?>" readonly/>
							<div class="help-block with-errors"></div>
						</div>
					</div>


					<div class="form-group">
						<label style="color:#4E4E4E;" class="control-label col-md-3">Surety Bond Company Name</label>
						<div class="col-md-9">
							<input type="text" autofocus="true" class="form-control" name="suretybond_company" placeholder="Company Inc." required/>
							<div class="help-block with-errors"></div>
						</div>
						
					</div>

					<div class="form-group">
						<label style="color:#4E4E4E;" class="control-label col-md-3">Surety Bond Reference No.</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="suretybond_refno" placeholder="Surety Bond No." required/>
							<div class="help-block with-errors"></div>
						</div>
						
					</div>

					<div class="form-group">
						<label style="color:#4E4E4E;" class="control-label col-md-3">Surety Bond OR No.</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="suretybond_orno" placeholder="Surety OR No." required/>
							<div class="help-block with-errors"></div>
						</div>
						
					</div>

					<div class="form-group">
						<label style="color:#4E4E4E;" class="control-label col-md-3">Surety Bond Amount</label>
						<div class="col-md-9">
							<input type="number" min = '1' max='999999999' class="form-control" name="suretybond_amount" placeholder="Amount" required/>
							<div class="help-block with-errors"></div>
						</div>
						
					</div>

					<div class="form-group">
						<label style="color:#4E4E4E;" class="control-label col-md-3">Surety Bond Validity</label>
						<div class="col-md-9">
							<input class="form-control"  name="suretybond_validity" placeholder="YYYY-MM-DD" id="calendar" required/>
							<div class="help-block with-errors"></div>
						</div>
						
					</div>

					<div class="form-group">
						
						<div class="alert alert-info alert-dismissible" role="alert">
 					 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  							<strong>Hold on!</strong> Please follow this filenaming when uploading the Surety Bond PDF File. <strong>COMPANYNAME.SB.YEAR.PDF</strong>
						</div>
					
					</div>

					<div class="form-group">
						<label style="color:#4E4E4E;" class="control-label col-md-3">Upload Surety Bond Offical Policy (PDF Format Only - Max 2MB File)</label>
						<div class="col-md-9">
							<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
							<input name="userfile[]" type="file" accept="application/pdf" id="userfile" placeholder = "PDF File"required>

						</div>
					</div>

					<div class="form-group">
						<label style="color:#4E4E4E;" class="control-label col-md-3">Upload Surety Bond  Official Receipt (PDF Format Only - Max 2MB File)</label>
						<div class="col-md-9">
							<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
							<input name="userfile[]" type="file" accept="application/pdf"id="userfile" required> 
						</div>
					</div>

					<div class="form-group text-right">
						<hr>
						<button type="submit" name="upload" class="btn btn-primary">Submit</button>
					</div>	
						
				</div>
				
			</div>
			
		</form>
	<?php }else{
			echo $disp_success;
			}?>
	</div>
</div><!--Page Wrapper-->

<?php include('../includes/footer.php');?>
<?php include('../script.php'); ?>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
  
<script>
	$(function() {
		$( "#calendar" ).datepicker({ minDate: 0 });
	});
</script>