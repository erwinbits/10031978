<?php


include('../includes/ClientLayout.php'); 
//include('../includes/sidebar.php');

use Functions\eIP;
use Functions\eZTD;

$eip = new eIP;
$items = new eZTD;

foreach ($_POST as $key => $value) {

	if($key == "save" || $key == "submit"){

	}
	else
	{
		if(!is_array($value)){
			if(empty($value)){

				$_POST[$key] = "";
			}				
		}		
		
	}

}
//var_dump($_POST);


    if(isset($_POST['expressForm'])){
        $appno = strtoupper($_POST['appno']);
		$clientName = $_POST['clientName'];
		$clientTIN = $_POST['clientTIN'];
		$consigneeTIN = $_POST['consigneeTIN'];
		$consigneeName = $_POST['consigneeName'];
		$BOCrefno = $_POST['BOCrefno'];
		$zoneLocation = $_POST['zoneLocation'];
		
		$portOforigin = $_POST['portOforigin'];
		$purposeImport = $_POST['purposeImport'];
		$paymentProcedure = $_POST['paymentProcedure'];
		$manifestNo = $_POST['manifestNo'];
		$departureDate = $_POST['departureDate'];
		$arrivalDate = $_POST['arrivalDate'];
		$modeOfTransport = $_POST['modeOfTransport'];
		$countryOrigin = $_POST['countryOrigin'];
		$deliveryRemarks = $_POST['deliveryRemarks'];
		$additionalRemarks = $_POST['additionalRemarks'];
		$internalRef = $_POST['internalRef'];
		$otherCost = $_POST['otherCost'];
		$shipperName = $_POST['shipperName'];
		$shipperAddress = $_POST['shipperAddress'];
		$brokerName = $_POST['brokerName'];
		$brokerAddress = $_POST['brokerAddress'];
		$brokersTIN = $_POST['brokersTIN'];
		$totalValue = $_POST['totalValue'];
		
       
      $result = $eip->addeIPexpress($appno, $clientName, $clientTIN, $consigneeTIN, $consigneeName, $BOCrefno, $zoneLocation, $portOforigin, $purposeImport, $paymentProcedure, $manifestNo, $departureDate, $arrivalDate, $modeOfTransport, $countryOrigin, $deliveryRemarks, $additionalRemarks, $internalRef, $otherCost, $shipperName, $shipperAddress,$brokerName,  $brokerAddress, $brokersTIN, $totalValue);

        $status = "";
        $responseMessage = "";

    }else{
		
		$appno = strtoupper($_POST['appno']);
		$clientName = $_POST['clientName'];
		$clientTIN = $_POST['clientTIN'];
		$consigneeTIN = $_POST['consigneeTIN'];
		$consigneeName = $_POST['consigneeName'];
		$BOCrefno = $_POST['BOCrefno'];
		$zoneLocation = $_POST['zoneLocation'];
		
		$portOforigin = $_POST['portOforigin'];
		$purposeImport = $_POST['purposeImport'];
		$paymentProcedure = $_POST['paymentProcedure'];
		$manifestNo = $_POST['manifestNo'];
		$departureDate = $_POST['departureDate'];
		$arrivalDate = $_POST['arrivalDate'];
		$modeOfTransport = $_POST['modeOfTransport'];
		$countryOrigin = $_POST['countryOrigin'];
		$deliveryRemarks = $_POST['deliveryRemarks'];
		$additionalRemarks = $_POST['additionalRemarks'];
		$internalRef = $_POST['internalRef'];
		$otherCost = $_POST['otherCost'];
		$shipperName = $_POST['shipperName'];
		$shipperAddress = $_POST['shipperAddress'];
		$brokerName = $_POST['brokerName'];
		$brokerAddress = $_POST['brokerAddress'];
		$brokersTIN = $_POST['brokersTIN'];
		
		$OfcClearance = $_POST['OfcClearance'];
		$tentativeRelease = $_POST['tentativeRelease'];
		$cargo = $_POST['cargo'];
		$registryNo = $_POST['registryNo'];
		$carrier = $_POST['carrier'];
		$entryNo = $_POST['entryNo'];
		$transshipmentPort = $_POST['transshipmentPort'];
		$locationOfGoods = $_POST['locationOfGoods'];
		$appType = $_POST['appType'];
		$agency = $_POST['agency'];
		$AirBill = $_POST['AirBill'];
		$importTo = $_POST['importTo'];
        $paymentRefno = $_POST['paymentRefno'];
		$CountryOfExport = $_POST['CountryOfExport'];
		$portOfDestination = $_POST['portOfDestination'];
		$paymentDate = $_POST['paymentDate'];
		$crno = $_POST['crno'];
		$portDischarge = $_POST['portDischarge'];
		$POno = $_POST['POno'];
		$invoiceno = $_POST['invoiceno'];
		$totalValue = $_POST['totalValue'];
		$totalWeight = $_POST['totalWeight'];
       
       $result = $eip->addeIP($appno, $clientName, $clientTIN, $consigneeTIN, $consigneeName, $BOCrefno, $zoneLocation, $portOforigin, $purposeImport, $paymentProcedure, $manifestNo, $departureDate, $arrivalDate, $modeOfTransport, $countryOrigin, $deliveryRemarks, $additionalRemarks, $internalRef, $otherCost, $shipperName, $shipperAddress,$brokerName,  $brokerAddress, $brokersTIN, $OfcClearance, $tentativeRelease, $cargo, $registryNo, $carrier, $entryNo, $transshipmentPort, $locationOfGoods, $appType, $agency, $AirBill, $importTo, $paymentRefno, $CountryOfExport, $portOfDestination, $paymentDate, $crno, $portDischarge, $POno, $invoiceno, $totalValue, $totalWeight);
	}

    
	if($result == "Application Failed"){ 
		$status = "Failed";
		$responseMessage = "Failed to submit eIP Application.";
		
	}else if($result == "error balance"){
		$status = "FAILED!";
		$responseMessage = "<p><center>Not enough balance</center></p>";
		

	}else if($result == "Application was auto-approved by the system"){
		$status = "Application Approved!";
		$responseMessage = "<p><center>Your e-IP with Application number </center></p>";
		$responseMessage .= "<p><center><strong>$appno</strong></center></p>";
		$responseMessage = "<p><center>Your application was auto-approved by the system.</center></p>";
		
	}
	else
	{
		
		$status = "SUCCESS!";
		$responseMessage = "<p><center>Your e-IP with Application number </center></p>";
		$responseMessage .= "<p><center><strong>$appno</strong></center></p>";
		$responseMessage .= "<p><center>was successfully submitted. You will receive an email notification once your application is processed.</center></p>";
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