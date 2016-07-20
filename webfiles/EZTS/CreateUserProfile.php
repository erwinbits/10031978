<?php 
use Functions\UserInfo;
use Functions\UserAccount;
use Functions\FileUpload;

include('../includes/ClientLayout.php');

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

$userdata = new UserInfo;
$eztsstatus = $userdata->checkEZTSsubscription();
$eipstatus = $userdata->checkEIPsubscription();
	$msg = false;

    $fileupload = new FileUpload;
    $createUserprofile = new UserAccount;

    if($_POST){   

    	$company_name = strtoupper($_POST['company_name']);
		$IDNo = $_POST['IDNo'];
		$TIN = utf8_encode($_POST['TIN']);
		$address = strtoupper($_POST['address']);
		$province = strtoupper($_POST['province']);
		$country = strtoupper($_POST['country']);
		$zip_code = utf8_encode($_POST['zip_code']);
		$telephone = utf8_encode($_POST['telephone']);
		$mobile = utf8_encode($_POST['mobile']);
		$companyemail = utf8_encode($_POST['companyemail']);
		$utype = strtoupper($_POST['usertype']);
		$servicename = strtoupper($_POST['servicename']);
		$stats = utf8_encode($_POST['status']);
		$PEZACORNo = strtoupper($_POST['PEZACORNo']);
		$DateofReg = $_POST['DateOfReg'];
		$RegAct = $_POST['regAct'];
		$appno = $_POST['appno'];
		
        $result = $createUserprofile->addUserProfile($company_name, $IDNo, $TIN, $address, $province, $country, $zip_code, $telephone, $mobile, $companyemail, $utype, $servicename, $stats, $PEZACORNo, $DateofReg, $appno);
         
        $count = count($_POST['regAct']);
		for($x=0;$x<$count;$x++)
		{
			$RegAct = $_POST['regAct'][$x];
			$RegDate = $_POST['regActDate'][$x];

			$createUserprofile->addRegisteredActivityWithDate($RegAct, $RegDate);
		}
         	
					
			

        if($result != "Adding data failed"){
        	$stats = "Success";
            $responseMessage = "Online registration sent! You are trying to subscribe to the INS Web Portal. Please patiently wait while review and approve your Application";
            $msg = true;
        }else{
        	$stats = "Failed";
            $responseMessage = "Account already exist."; 
            $msg = true;
        }

     //$errors= array();
			
			//foreach($_FILES['userfile']['tmp_name'] as $key => $tmp_name ){
				$fileName = $_FILES['userfile']['name'];//[$key];
				$fileSize =$_FILES['userfile']['size'];//[$key];
				$tmpName =$_FILES['userfile']['tmp_name'];//[$key];
				$fileType=$_FILES['userfile']['type'];//[$key];
				$folder="../../../bir_docs/";

				// make file name in lower case
 				$new_file_name = strtolower($fileName);

				 
				$final_file=str_replace(' ','-',$new_file_name);
				$fileloc = $folder.$final_file;

				$fp      = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);
		        
		        if($fileSize > 2097152){
					$errors[]='File size must be less than 2 MB';
		        }else{	
		    
		    		if(move_uploaded_file($tmpName,$folder.$final_file)){
	 					$appno = $_POST['appno'];
	 					$result = $fileupload->BIRUpload($final_file, $fileType, $fileSize, $fileloc, $content, $appno);
	 				}else{
	 					$errors = "Cant Upload the File";
	 				}

	 		  	}
 }

?>


<link href="css/AdminLTE.min.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create User</title>
        <link rel="icon" href="/ico/favicon.ico">
        
        <!-- CSS plugins -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <link href="css/sb-admin-2.css" rel="stylesheet">
        <link href="css/AdminLTE.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <!-- CSS plugins -->
        
        <!-- CSS custom -->
        <link href="css/header.css" rel="stylesheet">
        <link href="css/customnavbar.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/create-form.css" rel="stylesheet">
        <!-- CSS custom -->
    </head>

    
<?php if($msg == true){ ?>
    <div id="page-wrapper">      
	    <div class="container-fluid">
			<br>
			<br>
			
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
					<div class="panel panel-default">

						<div class="panel-heading">
							<h4><?php echo $stats; ?></h4>
						</div>
						
						<div class="panel-body">
							<?php echo $responseMessage; ?><br><br>
							<a href="home" class="btn btn-default btn-block"> <i class="fa fa-reply fa-fw"></i> Go to Dashboard</a>
						</div>

					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
	
		<!--Page Content-->
		<?php 
		if($msg == false){
		  if($AccStatus == '0'){

		?>
		<div id="page-wrapper"> 
			<div class="container-fluid">
				<form enctype="multipart/form-data" data-toggle="validator" class="form-horizontal" id="create-form" role="form" action="" method="POST">
					<div class="panel-body">
					<h3>Service Subscription</h3>
					<hr>
					<br>
					Complete your subscription by filling up the Company Details and adding PEZA eZTS to your access.:
					<br>
					<div class="inner-panel">
						<br>
						<h4><strong>Company Profile</strong></h4>
						<hr>
						
						<?php $appno = "INSAP-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y"); ?>

						<input type="hidden" name="appno" value="<?php echo $appno;?>"/>
							
						<div class="form-group">
							<label style="color:#393838;" class="control-label col-md-3">Tax Identification Number</label>
							<div class="col-md-7">
								<input type="text" autofocus="true" pattern="[0-9]{12}" class="form-control" placeholder="999999999000" value="" name="TIN" maxlength="12" required/>
								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<div class="form-group">
							<label style="color:#4E4E4E;" class="control-label col-md-3">Company Name</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="company_name" value="" name="TIN" placeholder="Company Inc." required/>
								as written in BIR Form 2303
								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<div class="form-group">
							<label style="color:#4E4E4E;" class="control-label col-md-3">Employee ID No.</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="IDNo" value = "" placeholder="ABCD12345" required/>
								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<div class="form-group">
							<label style="color:#393838;" class="control-label col-md-3">PEZA Certificate of Registration</label>
							<div class="col-md-7">
								<input type="text" class="form-control" placeholder="COR No." value = ""  name="PEZACORNo" maxlength="20" required/>
								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<div class="form-group">
							<label style="color:#393838;" class="control-label col-md-3">Date of Registration</label>
							<div class="col-md-7">
								<input type="date" class="form-control" placeholder="Date" id="calendar" value = ""  name="DateOfReg" required/>
								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<div class="form-group">
							<label style="color:#4E4E4E;" class="control-label col-md-3">Company Address</label>
							<div class="col-md-7">
								<input type="text"  class="form-control" placeholder="Address" value = ""  name="address"  maxlength="100" required/><br>
								<input type="text"  class="form-control" placeholder="Province" value = ""  name="province"  maxlength="100" required/><br>
								<input type="text"  class="form-control" placeholder="Country" value = ""  name="country"  maxlength="100" required/><br>
								<input type="text"  class="form-control" pattern="[0-9]{4,5}" class="form-control" value = ""  placeholder="Zipe Code" name="zip_code"  maxlength="4" required/>
								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<h4><strong>Contact Details</strong></h4>
						<hr>

						<div class="form-group">
							<label style="color:#4E4E4E;" class="control-label col-md-3">Telephone Number</label>
							<div class="col-md-7">
								<input type="text" pattern="[0-9]{7,12}" class="form-control" value = ""  placeholder="Country Code + Area Code + Telephone Number. e.g '6321234567'" name="telephone" maxlength="12" required/>
								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<div class="form-group">
							<label style="color:#4E4E4E;" class="control-label col-md-3">Mobile Number</label>
							<div class="col-md-7">
								<input pattern="[0-9]{11,12}" type="text"  class="form-control" value = ""  placeholder="Country Code + Area Code + Mobile Number. e.g'639991234567'" name="mobile" maxlength="12" required/>
								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<div class="form-group">
							<label style="color:#4E4E4E;" class="control-label col-md-3">Company Email Address</label>
							<div class="col-md-7">
								<input type="text" class="form-control" placeholder="Shipping Department Email Address" value = ""  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$" maxlength="50" name="companyemail" required/>
								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<br>
						<h4><strong>Supporting Documents</strong></h4>
						<hr>

						<!--<div class="form-group">
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><p style="color:#000000;">Hold on!</strong> Avoid using special characters when you upload a PDF file.</p>
							</div>
						</div>-->

						<div class="form-group">
							<label style="color:#4E4E4E;" class="control-label col-md-3">Upload BIR</label>
							<div class="col-md-7">
								<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
								<input name="userfile" type="file" id="userfile" accept="application/pdf" required>
								Upload PDF file only.  Use a SINGLE-WORD FILENAME with NO SPECIAL CHARACTERS.
							</div>
						</div>

						<div class="form-group">
							<label style="color:#4E4E4E;" class="control-label col-md-3">User Type</label>
							<div class="col-md-7">
								<input required type="radio"  name="usertype" value="CE">
								<?php 
								$fetch = $userdata->getUserData();
								    foreach($fetch as $data){
										$usertype = $data['usertype'];
										$status = $data['status'];
									}

									if($usertype == 'CE')
									{ echo 'Checked'; }else{ echo '';}
								?>

								Client Enterprise &nbsp;
								<input required type="radio"  name="usertype" value="ELSE" <?php if($usertype == 'ELSE'){ echo 'Checked'; }else{ echo '';} ?>> ELSE

								<div class="help-block with-errors"></div>
							</div>
							
						</div>

						<br>
						<h4><strong>Registered Activities</strong></h4>
						<hr>

						

						<!--<div class="form-group">
						
								<div class="alert alert-warning alert-dismissible" role="alert">
 					 				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  									<strong>Heads up!</strong> Please use SPECIFC TERM/s as per your registered activity document.
								</div>
							
						<div>-->

						<div class="table-responsive">
						List down registered activities based on your PEZA Registration Agreement.
								<table id="dataTable" class="form" width="100%">
								<tr>
									<td width ="2%"><input type="checkbox" name="chk[]"/></td>
									<td width ="1%">&nbsp;</td>
									<td width="76%"><input class="form-control input-required" type="text" name="regAct[]" placeholder="Registered Activity" required></td>
									<td width ="1%">&nbsp;</td>
									<td width="20%"><input class="form-control input-required " id="" type="date" name="regActDate[]" placeholder="Date" required></td>
								</tr>
								</table>
							</div>
							<br>
							<div class="text-right">
								<button type="button" class="btn btn-danger btn-number" title="Remove" data-type="minus" onClick="deleteRow('dataTable')">
			                	<span class="glyphicon glyphicon-minus-sign"></span>
			              		</button>

								<button type="button" class="btn btn-success btn-number" title="Add Importables Row" data-type="plus" onClick="addRow('dataTable')">
			                	<span class="glyphicon glyphicon-plus-sign"></span>
			              		</button>
			            	</div>
			         	</div>
						<!-------------------------------------------------------------------------------------------------------------------------------------->
							
						<br>
						<h4><strong>Subscription</strong></h4>
						<hr>

						<div style="margin:25px;">

							<!-- <div class="form-group">
								<label style="color:#4E4E4E;" class="control-label">BOARD OF INVESTMENTS</label>
								<div class="col-md-12">
									<input type="hidden" name="eCAI" value="0">
									<input type="checkbox" value="eCAI" name="servicename">Electronic Certificate of Authority to Import (eCAI)
									<input type="hidden" name="value" value="0">
								</div>
								<div class="help-block with-errors"></div>
							</div>

							<div class="form-group">
								<label style="color:#4E4E4E;" class="control-label">BUREAU OF CUSTOMS (E2M)</label>
								<div>
									<div class="col-md-4">
										<input type="hidden" name="CPRS" value="0">
										<input type="checkbox" value="CPRS" name="servicename">Client Profile Registration System (CPRS)
										<input type="hidden" name="value" value="0">
										
									</div>
									<div class="col-md-3">
										<input type="hidden" name="ED" value="0">
										<input  type="checkbox" value="ED" name="servicename">Export Declartion (ED)
										<input type="hidden" name="value" value="0">
										
									</div>
									<div class="col-md-5">
										<input type="hidden" name="OLRS" value="0">
										<input  type="checkbox" value="OLRS" name="servicename">Online Cargo Release System (OLRS)
										<input type="hidden" name="value" value="0">
										
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<div>
									<div class="col-md-4">
										<input type="hidden" name="EMS" value="0">
										<input  type="checkbox" value="EMS" name="servicename">Electronic Manifest System (EMS)
										<input type="hidden" name="value" value="0">
										
									</div>
									<div class="col-md-3">
										<input type="hidden" name="IED" value="0">
										<input  type="checkbox" value="IED" name="servicename">Import Entry Declaration (IED)
										<input type="hidden" name="value" value="0">
										
									</div>
									<div class="col-md-5">
										<input type="hidden" name="OV" value="0">
										<input  type="checkbox" value="OV" name="servicename">Online Visibility (OV)
										<input type="hidden" name="value" value="0">
										
									</div>
									<div class="help-block with-errors"></div>
								</div>
							</div> -->

							<!-- <div class="form-group">
								<label style="color:#4E4E4E;" class="control-label">CLARK DEVELOPMENT CORPORATION</label>
								<div>
									<div class="col-md-4">
										<input type="hidden" name="eTAPS1" value="0">
										<input  type="checkbox" value="1" name="eTAPS1">Electronic Transit Admission Permit System (eTAPS)
										
									</div>
									<div class="col-md-7">
										<input type="hidden" name="eEDS" value="0">
										<input  type="checkbox" value="1" name="eEDS">Electronic Export Declaration System (eEDS)
										
									</div>
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="form-group">
								<label style="color:#4E4E4E;" class="control-label">DEPARTMENT OF AGRICULTURE</label>
								<div>
									<div class="col-md-4">
										<strong>Bureau of Animal Industry</strong>
									</div>
									<div class="col-md-4">
										<strong>Bureau of Plant Industry</strong> 
									</div>
									<div class="col-md-4">
										<strong>Bureau of Fishers and Aquatic Resources</strong> 
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<div>
									<div class="col-md-4">
										<input type="hidden" name="MAV" value="0">
										<input  type="checkbox" value="1" name="MAV">Minimum Access Volume Program (MAV)
										
									</div>
									<div class="col-md-4">
										<input type="hidden" name="BPIeSPS" value="0">	
										<input  type="checkbox" value="1" name="BPIeSPS">Electronic Sanitary Phytosanitary Clearance (eSPS)	
																
									</div>
									<div class="col-md-4">
										<input type="hidden" name="BFAReSPS" value="0">
										<input  type="checkbox" value="1" name="BFAReSPS">Electronic Sanitary Phytosanitary Clearance (eSPS)
																		
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<div>
									<div class="col-md-4">
										<input type="hidden" name="BAIeSPS" value="0">
										<input  type="checkbox" value="1" name="BAIeSPS">Electronic Sanitary Phytosanitary Clearance (eSPS)
										
									</div>
									<div class="col-md-4">
										<input type="hidden" name="BPIeRFI" value="0">
										<input  type="checkbox" value="1" name="BPIeRFI">Electronic Request for Quarantine Inspection (eRFI)
										
									</div>
									<div class="col-md-4">
										<input type="hidden" name="BFAReRFI" value="0">
										<input  type="checkbox" value="1" name="BFAReRFI">Electronic Request for Quarantine Inspection (eRFI)
										
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-4">
									<input type="hidden" name="BAIeRFI" value="0">
									<input  type="checkbox" value="1" name="BAIeRFI">Electronic Request for Quarantine Inspection (eRFI)
									
								</div>
							</div> -->

							<div class="form-group">
								<label style="color:#4E4E4E;" class="control-label">PHILIPPINE ECONOMIC ZONE AUTHORITY</label>
							<div>
									<!-- <div class="col-md-4">
										<input type="hidden" name="eIPS" value="0">
										<input  type="checkbox" value="1" name="eIPS">Electronic Import Permit System (eIPS)
										
										<div class="help-block with-errors"></div>
									</div>
									<div class="col-md-4">
										<input type="hidden" name="EAEDS" value="0">
										<input  type="checkbox" value="1" name="EAEDS">Expanded Automated Export Documentation System (E-AEDS)
										
										<div class="help-block with-errors"></div>
									</div> -->
									<!-- <div class="col-md-4">
										<input  type="checkbox" name="servicename" value="eLOA"> Electronic Letter of Authority (eLOA)
										<input type="hidden" name="status" value="0">
										<div class="help-block with-errors"></div>
									</div> -->

									<div class="col-md-4">
										<input  type="checkbox" name="servicename" value="EZTS" <?php if($eztsstatus == '1'){ echo 'Checked'; }else{ echo '';} ?>> Electronic Zone Transfer System (eZTS)
										<input type="hidden" name="status" value="0" >
										<div class="help-block with-errors"></div>
									</div>
									<!-- <div class="col-md-4">
										<input  type="checkbox" name="servicename" value="EIP" <?php if($eipstatus == '1'){ echo 'Checked'; }else{ echo '';} ?>> Electronic Import Permit (eIP)
										<input type="hidden" name="status" value="0" >
										<div class="help-block with-errors"></div>
									</div> -->
								</div>
							</div>

							<!-- <div class="form-group">
								<label style="color:#4E4E4E;" class="control-label">SUBIC BAY METROPOLITAN AUTHORITY</label>
								<div class="col-md-12">
									<input type="hidden" name="eTAPS2" value="0">
									<input  type="checkbox" value="1" name="eTAPS2">Electronic Transit Admission Permit System (eTAPS)
									
								</div>
								<div class="help-block with-errors"></div>
							</div>

							<div class="form-group">
								<label style="color:#4E4E4E;" class="control-label">OTHERS</label>
								<div>
									<div class="col-md-3">
										<input type="hidden" name="JAFR" value="0">
										<input  type="checkbox" value="1" name="JAFR">Japan Advance Filing Rules in Maritime Cargo Information (JAFR)
										
									</div>
									<div class="col-md-3">
										<input type="hidden" name="eZTS" value="0">
										<input  type="checkbox" value="1" name="eZTS">Cargo Logistics Inc. System (CALOGI)
										
									</div>
									<div class="col-md-3">
										<input type="hidden" name="eDW" value="0">
										<input  type="checkbox" value="1" name="eDW">Electronic Data Warehouse (eDW)
										
									</div>
									<div class="col-md-3">
										<input type="hidden" name="PAE" value="0">
										<input  type="checkbox" value="1" name="PAE">Pan Asia Exchange (PAE)
										
									</div>
								</div>
								<div class="help-block with-errors"></div>
							</div>
						</div> -->
					</div>
						<div class="form-group text-right">
							<hr>
							<button type="submit" name="upload" class="btn btn-primary" <?php if($eztsstatus == 1 AND $eipstatus == 1){ echo 'disabled'; }else{ echo '';} ?> >Submit</button>
						</div>	
							
					</div>
				</div>
				</div>
			</form>
		</div>
		<?php 
			}else{
				echo '	<div id="page-wrapper">
							<br>
							<br>
							<br>
							<h3><center>Please wait while we process your application.</center></h3>
							<h3><center>Thank you.</center></h3>
						</div>

				';
			}
		}
		?>

	</div>

</html>
<?php include('../includes/footer.php'); ?>
<script type="text/javascript" src="js/importables.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sb-admin-2.js" rel="stylesheet"></script>
<script src="js/metisMenu.min.js"></script>


