<?php


include('../includes/ClientLayout.php'); 
//include('../includes/sidebar.php');

use Functions\AEDS;
use Functions\eZTD;

$aeds = new AEDS;
$items = new eZTD;

    if(isset($_POST['expressForm'])){
        $appno = strtoupper($_POST['appno']);
		$clientName = $_POST['clientName'];
		$clientTIN = $_POST['clientTIN'];
		$consigneeTIN = $_POST['consigneeTIN'];
		$consigneeName = $_POST['consigneeName'];
		$BOCrefno = $_POST['BOCrefno'];
		$zoneLocation = $_POST['zoneLocation'];
		$EDno = $_POST['EDno'];
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
		
       var_dump($totalValue);
        $result = $aeds->addaedsexpress($appno, $clientName, $clientTIN, $consigneeTIN, $consigneeName, $BOCrefno, $zoneLocation, $EDno, $portOforigin, $purposeImport, $paymentProcedure, $manifestNo, $departureDate, $arrivalDate, $modeOfTransport, $countryOrigin, $deliveryRemarks, $additionalRemarks, $internalRef, $otherCost, $shipperName, $shipperAddress,$brokerName,  $brokerAddress, $brokersTIN, $totalValue);

        $status = "";
        $responseMessage = "";

    }else{
		
		$appno = strtoupper($_POST['appno']);
		// $clientName = $_POST['clientName'];
		// $clientTIN = $_POST['clientTIN'];
		// $consigneeTIN = $_POST['consigneeTIN'];
		// $consigneeName = $_POST['consigneeName'];
		$AirBill = $_POST['AirBill'];
		$countryOrigin = $_POST['countryOrigin'];
		$portOforigin = $_POST['portOforigin'];
		$departureDate = $_POST['departureDate'];
		$arrivalDate = $_POST['arrivalDate'];
		$modeOfTransport = $_POST['modeOfTransport'];
		$shipperName = $_POST['shipperName'];
		$shipperAdd1 = $_POST['shipperAdd'][0];
		$shipperAdd2 = $_POST['shipperAdd'][1];
		$shipperAdd3 = $_POST['shipperAdd'][2];
		$brokerName = $_POST['brokerName'];
		$brokerAdd1 = $_POST['brokerAdd'][0];
		$brokerAdd2 = $_POST['brokerAdd'][1];
		$brokerAdd3 = $_POST['brokerAdd'][2];
		$brokersTIN = $_POST['brokersTIN'];
		$portDischarge = $_POST['portDischarge'];
		$POno = $_POST['POno'];
		$invoiceno = $_POST['invoiceno'];
		$OfcClearance = $_POST['OfcClearance'];
		$purposeImport = $_POST['purposeImport'];
		$paymentProcedure = $_POST['paymentProcedure'];
		$manifestNo = $_POST['manifestNo'];
		$registryNo = $_POST['registryNo'];
		$carrier = $_POST['carrier'];
		$CountryOfExport = $_POST['CountryOfExport'];
		$entryNo $_POST['entryNo'];
		$transshipmentPort = $_POST['transshipmentPort'];
		$portOfDestination = $_POST['portOfDestination'];
		$locationOfGoods = $_POST['locationOfGoods'];
		$additionalRemarks = $_POST['additionalRemarks']; 
       
        //$result = $aeds->addaeds($appno, $clientName, $clientTIN, $consigneeTIN, $consigneeName, $BOCrefno, $zoneLocation, $EDno, $portOforigin, $purposeImport, $paymentProcedure, $manifestNo, $departureDate, $arrivalDate, $modeOfTransport, $countryOrigin, $deliveryRemarks, $additionalRemarks, $internalRef, $otherCost, $shipperName, $shipperAddress,$brokerName,  $brokerAddress, $brokersTIN, $OfcClearance, $tentativeRelease, $cargo, $registryNo, $carrier, $entryNo, $transshipmentPort, $locationOfGoods, $appType, $agency, $AirBill, $importTo, $paymentRefno, $CountryOfExport, $portOfDestination, $paymentDate, $crno, $portDischarge, $POno, $invoiceno, $totalValue, $totalWeight);
        $result = $aeds->addAEDSMain($appno , $AirWayBill, $OfcClearance, $purposeImport, $paymentProcedure, $manifestNo, $departureDate, $arrivalDate, $tentativeRelease, $shipperName, $shipperAdd1, $shipperAdd2, $shipperAdd3, $brokerName, $brokerAdd1, $brokerAdd2, $brokerAdd3, $carrierID, $registryNo, $localCarrier, $CountryOfExport, $entryNo, $transshipmentPort, $portOfDestination, $locationOfGoods, $additionalRemarks, $deliveryRemarks, $deliveryTerms, $paymentTerms, $bankName, $branchName, $refNo, $bankCharge, $warehouseCode, $warehouseName, $Delay, $prepaidAcct, $internalReference, $transactionValue, $transactionValueCurr, $extFreightCost, $extFreightCostCurr, $insuranceCost, $insuranceCostCurr, $otherCost, $otherCostCurr)
	}
		
    
	if($result != "Adding data failed"){ 
		$status = "SUCCESS!";
		$responseMessage = "<p><center>Your e-IP with Application number </center></p>";
		$responseMessage .= "<p><center><strong>$appno</strong></center></p>";
		$responseMessage .= "<p><center>was successfully submitted. You will receive an email notification once your application is processed.</center></p>";
	}else{
		$status = "Failed";
		$responseMessage = "Failed to submit eCert Application.";
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