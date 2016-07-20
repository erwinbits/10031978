<?php 
use Functions\UserInfo;
use Functions\UserAccount;
use Functions\FileUpload;
use Functions\subscribeFunction;


include('../includes/ClientLayout.php');

$subscribe = new subscribeFunction;
$info = json_decode($MCrypt->decrypt($account));
$fileupload = new FileUpload;
$createUserprofile = new UserAccount;
$userdata = new UserInfo;
$AccStatus = $account->getStatus();
$checkEZTSservice = $userdata->checkEZTSsubscription();

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


$eztsstatus = $userdata->checkEZTSsubscription();
$cprsstatus = $userdata->checkCPRSsubscription();
$eipstatus = $userdata->checkEIPsubscription();
$msg = false;

    if(isset($_POST['CPRSService'])){            	
		
    	

		$result = $userdata->addService('CPRS');

    	 if($cprsstatus == "2"){
    	 	$stats = "Success";
            $responseMessage = "Your online application for CPRS Service was sent. Please patiently wait while review and approve your application";
            $subscribe->cprsReSubscribe($_FILES["isa"], $_FILES["additional"]);
            $msg = true;
    	 }
 		 else if($result != "Adding data failed" ){
        	$stats = "Success";
            $responseMessage = "Your online application for CPRS Service was sent. Please patiently wait while review and approve your application";
            $subscribe->cprsSubscribe($_POST["role"], $_POST["agency"], $_FILES["isa"], $_FILES["additional"]);
            $msg = true;
        }else{
        	$stats = "Failed";
            $responseMessage = "Something went wrong;"; 
            $msg = true;
        }

    }elseif(isset($_POST['eIPService'])){   

    	$result = $userdata->addService('eIP');

		if($result != "Adding data failed"){
        	$stats = "Success";
            $responseMessage = "Your online application for eIP Service was sent. Please patiently wait while review and approve your application";
            $msg = true;

        }else{
        	$stats = "Failed";
            $responseMessage = "Something went wrong;"; 
            $msg = true;
        }


    }elseif(isset($_POST['AEDSService'])){    

    	$result = $userdata->addService('AEDS');

    	if($result = "Existing"){
    		 $responseMessage = "You already Subscribe";

    	}elseif($result != "Adding data failed"){
        	$stats = "Success";
            $responseMessage = "Your online application for AEDS Service was sent. Please patiently wait while review and approve your application";
            $msg = true;
        }
   		else{
        	$stats = "Failed";
            $responseMessage = "Something went wrong;"; 
            $msg = true;
        }

    }elseif(isset($_POST['EZTSService'])){

     	$result = $userdata->addService('EZTS');

		if($result != "Adding data failed"){
        	$stats = "Success";
            $responseMessage = "Your online application for EZTS Service was sent. Please patiently wait while review and approve your application";
            $msg = true;
        }else{
        	$stats = "Failed";
            $responseMessage = "Something went wrong;"; 
            $msg = true;
        }

     }    

?>



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
        <!-- Javascript -->
        <script src="js/jquery.js"></script>
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="../assets/js/fileinput/fileinput.js"></script>
		<script src="js/sb-admin-2.js" rel="stylesheet"></script>
		<script src="js/metisMenu.min.js"></script>
		<!-- Javascript -->
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
		  if($AccStatus == '2'){

		?>
		<div id="page-wrapper"> 
			<form enctype="multipart/form-data" data-toggle="validator" class="form-horizontal" id="create-form" role="form" action="" method="POST">
				<div class="container-fluid">
					<div class="panel-body">
						<h3>Add Services</h3>
						<hr>
						<br>
  						<div class="row">
							<div class="col-md-2"><img src="/img/cprs.png"></div>
  							<div class="col-md-8"><p>The Client Profile Registration System (CPRS) is a module of the Bureau of Customs Electronic-to-Mobile System [e2m] which builds up its database of stakeholders transacting with Customs. It determines the access rights of an e2m user in the BOC system.</p>
							<p>InterCommerce implements a self-service CPRS application which enables the BOC stakeholder to encode, validate and submit profiles to Customs directly and receive responses directly as well.  It also enables submission of an application for renewal of an expiring registration.</p>
							</div>
							<div class="col-md-2">
								<?php if($cprsstatus == '3')
								{ 
									echo '<button type="button" class="btn btn-success" readonly><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Subscribed</button>'; 
								}elseif($cprsstatus == '1'){  
									echo '<button type="button" class="btn btn-warning" readonly><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> For Approval</button>';
								}elseif($cprsstatus == "2"){
									echo '<button type="button" class="btn btn-warning" readonly data-toggle="modal" data-target="#termsCPRS"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>For Ammend</button>';
								}
								else{ echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#termsCPRS">
						  Subscribe
						</button>';
								}
								?>
								</div>
						
						</div>

						<hr>

						<div class="row">
							<div class="col-md-2"><img src="/img/edl.png"></div>
  							<div class="col-md-8"><p>Import Entry declarations may be prepared and lodged electronically by accredited Customs Brokers via the WebCWS. Submission is done online to the BOC E2M. Lodged entries will be subject to the selectivity system and online viewing and printing of the Temporary Assessment Notice (TAN), Single Administrative Document (SAD), Online Release Instruction (OLRS) and Statement of Settlement of Duties and Taxes (SSDT) are enabled.</p>
							</div>
						<div class="col-md-2">
								<?php if($eztsstatus == '1')
								{ 
									echo '<button type="button" class="btn btn-success" readonly><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Subscribed</button>'; 
								}elseif($eztsstatus == '0'){  
									echo '<button type="button" class="btn btn-warning" readonly><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> For Approval</button>';
								}elseif($eztsstatus == '2'){
									echo '<button type="button" class="btn btn-warning" readonly><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>For Ammend</button>';
								}
								else{ 
									echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#termsCPRS"> Subscribe</button>';
								}
								?>
								</div>

						
						</div>

						<hr>
						
						<div class="row">
							<div class="col-md-2"><img src="/img/iep.png"></div>
  							<div class="col-md-8"><p>Exporters, Customs Brokers and Freight Forwarders may now prepare and lodge electronically the E2M-AEDS SAD (Automated Export Declaration System) via this portal.</p>
							</div>
							<div class="col-md-2">
								<?php if($eipstatus == '1')
								{ 
									echo '<button type="button" class="btn btn-success" readonly><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Subscribed</button>'; 
								}elseif($eipstatus == '0'){  
									echo '<button type="button" class="btn btn-warning" readonly><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> For Approval</button>';
								}elseif($eipstatus == '2'){
									echo '<button type="button" class="btn btn-warning" readonly><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>For Ammend</button>';
								}
								else{ 
									echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#termsCPRS"> Subscribe</button>';
								}
								?>
								</div>

						
					
						
						</div>

						<hr>

						<div class="row">
							<div class="col-md-2"><img src="/img/ezts.jpg"></div>
  							<div class="col-md-8"><p> Online sysetm for Transfer of Goods between PEZA-Registered Enterprises which aimed towards further facilitating the conduct of business by PEZA-registered enterprises, through a simpler and more efficient system for documenting and processing the clearance, release and transfer of goods between PREEs.</p>
							</div>
							<div class="col-md-2">
								<?php if($checkEZTSservice == '1')
								{ 
									echo '<button type="button" class="btn btn-success" readonly><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Subscribed</button>'; 
								}elseif($checkEZTSservice == '0'){  
									echo '<button type="button" class="btn btn-warning" readonly>For Approval</button>';
								}else{ echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#termsEZTS">
						  Subscribe
						</button>';
								} ?>
							</div>

						
						</div>

						<?php
						include ('../includes/termsEIP.php');
						include ('../includes/termsEZTS.php');
						include ('../includes/termsAEDS.php');
						include ('../includes/termsCPRS.php');

						?>
						
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

		

</html>
<?php include('../includes/footer.php'); ?>



