<?php 
use Functions\UserInfo;
use Functions\UserAccount;
use Functions\FileUpload;

include('../includes/ClientLayout.php');

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

    if(isset($_POST['applyRegAct']))
    {            	
		

		$count = count($_POST['regAct']);
		for($i=0;$i<$count;$i++){

			$regAct = $_POST['regAct'][$i];
			$regActDate = $_POST['regActDate'][$i];

			$result = $createUserprofile->addRegisteredActivityWithDate($regAct, $regActDate);

		}
		
		if($result != "Adding data failed"){
        	$stats = "Success";
            $responseMessage = "Your application to add Registered Activities for your company was sent. Please patiently wait while the Zone Manager review and approve your application";
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
						<h3>Add Company Registered Activities</h3>
						<hr>
						<p>To add your company registered actvities, please accurately fill up the form below. To ensure clarity and speedy approval, please use SPECIFIC TERM/S found in your supporting document/s.</p>
				
			
							<div class="table-responsive">
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
			            	<br>
			            	<div class="text-right">
			            	<hr>
							<td>
								<input type="submit" class="btn btn-primary" name="applyRegAct" value="Submit">
							</td>
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
</div>
<?php include('../includes/footer.php'); ?>
<!-- JS -->
<script type="text/javascript" src="js/importables.js"></script>
<!-- JS -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sb-admin-2.js" rel="stylesheet"></script>
<script src="js/metisMenu.min.js"></script>


