<?php


include('../includes/ClientLayout.php'); 
//include('../includes/sidebar.php');

use Functions\eIP;
use Functions\eZTD;

$eip = new eIP;
$items = new eZTD;
   
    if($_POST){
        $appno = strtoupper($_POST['appno']);
        $BOCrefno = strtoupper($_POST['BOCrefno']);
        $IPno = $_POST['IPno'];
        $paidFee = $_POST['paidFee'];
        $paymentRefno = $_POST['paymentRefno'];
        $paymentDate = $_POST['paymentDate'];
		$importersName = $_POST['importersName'];
		$TIN = $_POST['TIN'];
		$zoneLocation = $_POST['zoneLocation'];
		$crno = $_POST['crno'];
		$brokerName = $_POST['brokerName'];
		$shipperName = $_POST['shipperName'];
		$shipperAddress = $_POST['shipperAddress'];
		$countryOrigin = $_POST['countryOrigin'];
		$departureDate = $_POST['departureDate'];
		$portDischarge = $_POST['portDischarge'];
		$arrivalDate = $_POST['arrivalDate'];
		$POno = $_POST['POno'];
		$invoiceno = $_POST['invoiceno'];
		$totalValue = $_POST['totalValue'];
		$totalWeight = $_POST['totalWeight'];
        $LOANumber = $_POST['LOANumber'];
        $LOAValidity = $_POST['LOAValidity'];
        $processingfee = 0;
        $VASPfee = 0;

        if($items->checkIfTheresEnoughFunds2($VASPfee)){
             $status = "WARNING!";
             $responseMessage = "Cannot process your request! Your VASP account is out of Funds.";
        }elseif($items->checkIfTheresEnoughFunds($processingfee)){
             $status = "WARNING!";
             $responseMessage = "Cannot process your request! Your PEZA account is out of Funds.";
        }else{
       
        $result = $eip->addeIP($appno, $BOCrefno, $IPno, $paidFee, $paymentRefno, $paymentDate, $importersName, $TIN, $zoneLocation, $crno, $brokerName, $shipperName, $shipperAddress, $countryOrigin, $departureDate, $portDischarge, $arrivalDate, $POno, $invoiceno, $totalValue, $totalWeight);

        $status = "";
        $responseMessage = "";

       
        if($result == "Failed"){
            
            $status = "Failed to process your application.";
            $responseMessage = "Oops! Something went wrong!";
            
        }else{
            
            if($eip->checkEIPifAutoapprove($appno)){
                $status = "<center>We are processing your request.</center>";
                $responseMessage = "<center>Your Application is successfully submitted.</center>";
                $responseMessage .= "<center>You will receive an email notification once your application is processed.</center>";
                $msg = true;
            }else{
                $status = "<center>SUCCESS!</center>";
                $responseMessage = "<center>Your Application is successfully APPROVED.</center>";
                $msg = true;
           }
        }
    }
    }
?>
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
                        <a href="eIPs" class="btn btn-default btn-block"><i class="fa fa-reply fa-fw"></i> Back</a>
                    </div>

                </div>
            </div>
        </div>
        
    </div>

<?php include('../script.php');?>