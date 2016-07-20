<?php


include('../includes/ClientLayout.php'); 
//include('../includes/sidebar.php');

use Functions\eZTD;

    $eloa = new eZTD;
    //$ecertno = $_GET['ecertno'];
    //$updateECERTstatus = $items->eCertStatusIsUsed($ecertno);

    if($_POST){
        //var_dump($_POST);
        $LOAValue = $_POST['LOAValue'];
        $ELSEname = strtoupper($_POST['ELSEname']);
        $ELSEzone = strtoupper($_POST['ELSEzone']);
        $ConsigneeName = strtoupper($_POST['ConsigneeName']);
        $ConsigneeZone = strtoupper($_POST['ConsigneeZone']);
        $transaction_type = strtoupper($_POST['transaction_type']);
        $TIN = $_POST['TIN'];
        $procurement = strtoupper($_POST['procurement']);
        $CEcltcode = $_POST['CEcltcode'];
        $ecertno = $_POST['ecertno'];
		//$ecertno = $ConsigneeZone . '-EC-' . rand(000000, 999999) ."-" . date('y') . "-" . '16A';
        $appno = $_POST['appno'];
		$userPEZACor = $_POST['userPEZACor'];
		$clientid = $_POST['clientid'];
		$processingfee = 1200;
        $VASPfee = 0;
		if($eloa->checkIfTheresEnoughFunds2($VASPfee)){
			 $status = "WARNING!";
             $responseMessage = "Cannot process your request! Your VASP account is out of Funds.";
		}elseif($eloa->checkIfTheresEnoughFunds($processingfee)){
			 $status = "WARNING!";
             $responseMessage = "Cannot process your request! Your PEZA account is out of Funds.";
		}else{
			
			$result = $eloa->addeLOA($LOAValue, $ELSEname, $ELSEzone, $ConsigneeName, $ConsigneeZone, $transaction_type, $TIN, $procurement, $CEcltcode, $ecertno, $appno, $userPEZACor, $clientid);

			$status = "";
			$responseMessage = "";
			
			if($result != "Adding data failed"){ 
				$status = "SUCCESS!";
				$responseMessage = "<p><center>Your e-LOA with Application number </center></p>";
				$responseMessage .= "<p><center><strong>$appno</strong></center></p>";
				$responseMessage .= "<p><center>was successfully submitted. You will receive an email notification once your application is processed.</center></p>";
				$responseMessage .= "<p><center>P1,200 and P0.00 have been deducted </center></p>";
				$responseMessage .= "<p><center>from your PEZA and VASP accounts respectively.</center></p>";
			}else{
				$status = "Failed";
				$responseMessage = "Failed to submit e-LOA Application.";
			}
			
		}
		 
    }
?>
<!-- <pre>
    <?php print_r($_POST);?>
</pre> -->
<link href="css/AdminLTE.min.css" rel="stylesheet">
    <br>
    <br>
    <div class="container">
    
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" id="">
                <div class="panel panel-default" id="">

                    <div class="panel-heading" id="">
                        <h4><?php echo $status; ?></h4>
                    </div>
                    
                    <div class="panel-body" id="">
                        <?php echo $responseMessage; ?><br><br>
                        <a href="ELSEmyELOA" class="btn btn-default btn-block"><i class="fa fa-reply fa-fw"></i> Back</a>
                    </div>

                </div>
            </div>
        </div>
        
    </div>

<?php include('../script.php');?>

