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
		
       
        $result = $aeds->addaedsexpress($appno, $clientName, $clientTIN, $consigneeTIN, $consigneeName, $BOCrefno, $zoneLocation, $EDno, $portOforigin, $purposeImport, $paymentProcedure, $manifestNo, $departureDate, $arrivalDate, $modeOfTransport, $countryOrigin, $deliveryRemarks, $additionalRemarks, $internalRef, $otherCost, $shipperName, $shipperAddress,$brokerName,  $brokerAddress, $brokersTIN, $totalValue);

        $status = "";
        $responseMessage = "";

    }else{
		
		$appno = strtoupper($_POST['appno']);
		// $clientName = $_POST['clientName'];
		// $clientTIN = $_POST['clientTIN'];
		// $consigneeTIN = $_POST['consigneeTIN'];
		// $consigneeName = $_POST['consigneeName'];

		// $AirWayBill = $_POST['AirBill'];
		// $countryOrigin = $_POST['countryOrigin'];
		// $portOforigin = $_POST['portOforigin'];
		// $departureDate = $_POST['departureDate'];
		// $arrivalDate = $_POST['arrivalDate'];
		// $modeOfTransport = $_POST['modeOfTransport'];
		// $shipperName = $_POST['shipperName'];
		
		// $brokersTIN = $_POST['brokersTIN'];
		// $portDischarge = $_POST['portDischarge'];
		// $POno = $_POST['POno'];
		// $invoiceno = $_POST['invoiceno'];
		// $OfcClearance = $_POST['OfcClearance'];
		// $purposeImport = $_POST['purposeImport'];
		// $paymentProcedure = $_POST['paymentProcedure'];
		// $manifestNo = $_POST['manifestNo'];
		// $registryNo = $_POST['registryNo'];
		// $carrier = $_POST['carrier'];
		// $CountryOfExport = $_POST['CountryOfExport'];
		// $entryNo = $_POST['entryNo'];
		// $transshipmentPort = $_POST['transshipmentPort'];
		// $portOfDestination = $_POST['portOfDestination'];
		// $locationOfGoods = $_POST['locationOfGoods'];
		// $additionalRemarks = $_POST['additionalRemarks']; 



		// $BOCrefno = $_POST['BOCrefno'];
		// $zoneLocation = $_POST['zoneLocation'];
		// $EDno = $_POST['EDno'];
		// $modeOfTransport = $_POST['modeOfTransport'];
		// $countryOrigin = $_POST['countryOrigin'];
		// $deliveryRemarks = $_POST['deliveryRemarks'];
		// $additionalRemarks = $_POST['additionalRemarks'];
		// $internalRef = $_POST['internalRef'];
		// $otherCost = $_POST['otherCost'];
		// $shipperName = $_POST['shipperName'];
		// $brokerName = $_POST['brokerName'];
		// $brokersTIN = $_POST['brokersTIN'];
		// $OfcClearance = $_POST['OfcClearance'];
		// $tentativeRelease = $_POST['tentativeRelease'];
		// $cargo = $_POST['cargo'];
		// $registryNo = $_POST['registryNo'];
		// $carrier = $_POST['carrier'];
		// $entryNo = $_POST['entryNo'];
		// $transshipmentPort = $_POST['transshipmentPort'];
		// $locationOfGoods = $_POST['locationOfGoods'];
		// $appType = $_POST['appType'];
		// $agency = $_POST['agency'];
		// $AirBill = $_POST['AirBill'];
		// $importTo = $_POST['importTo'];
		// $paymentRefno = $_POST['paymentRefno'];
		// $CountryOfExport = $_POST['CountryOfExport'];
		// $portOfDestination = $_POST['portOfDestination'];
		// $paymentDate = $_POST['paymentDate'];
		// $crno = $_POST['crno'];
		// $portDischarge = $_POST['portDischarge'];
		// $POno = $_POST['POno'];
		// $invoiceno = $_POST['invoiceno'];
		// $totalValue = $_POST['totalValue'];
		// $totalWeight = $_POST['totalWeight'];$countryOrigin = $_POST['countryOrigin'];
		// $internalRef = $_POST['internalRef'];
		// $otherCost = $_POST['otherCost'];
		// $brokerName = $_POST['brokerName'];
		// $brokersTIN = $_POST['brokersTIN'];
		// $cargo = $_POST['cargo'];
		// $appType = $_POST['appType'];
		// $agency = $_POST['agency'];
		// $importTo = $_POST['importTo'];
		// $paymentRefno = $_POST['paymentRefno'];
		// $paymentDate = $_POST['paymentDate'];
		// $crno = $_POST['crno'];
		// $portDischarge = $_POST['portDischarge'];
		// $POno = $_POST['POno'];
		// $invoiceno = $_POST['invoiceno'];
		// $totalWeight = $_POST['totalWeight'];

       	$AirWayBill = $_POST['AirBill'];
       	$portOforigin = $_POST['portOforigin'];
       	$OfcClearance = $_POST['OfcClearance'];
       	$purposeImport = $_POST['purposeImport'];
       	$paymentProcedure = $_POST['paymentProcedure'];
       	$manifestNo = $_POST['manifestNo'];
       	$departureDate = $_POST['departureDate'];
       	$arrivalDate = $_POST['arrivalDate'];
       	$tentativeRelease = $_POST['tentativeRelease'];
       	$shipperName = $_POST['shipperName'];
		$shipperAdd1 = $_POST['shipperAdd1'];
		$shipperAdd2 = $_POST['shipperAdd2'];
		$shipperAdd3 = $_POST['shipperAdd3'];
		$brokerName = $_POST['brokerName'];
		$brokerAdd1 = $_POST['brokerAdd1'];
		$brokerAdd2 = $_POST['brokerAdd2'];
		$brokerAdd3 = $_POST['brokerAdd3'];
		$carrierID = $_POST['carrier'];
		$registryNo = $_POST['registryNo'];
		//$localCarrier = $_POST["localCarrier"];
		$localCarrier = "";
		$CountryOfExport = $_POST['CountryOfExport'];
		$entryNo = $_POST['entryNo'];
		$transshipmentPort = $_POST['transshipmentPort'];
		$portOfDestination = $_POST['portOfDestination'];
		$locationOfGoods = $_POST['locationOfGoods'];
		$additionalRemarks = $_POST['additionalRemarks'];
		$deliveryRemarks = $_POST['deliveryRemarks'];
		// $deliveryTerms = $_POST["deliveryTerms"];
		$deliveryTerms ="";
		//$paymentTerms = $_POST["paymentTerms"];
		$paymentTerms ="";
		$bankName = $_POST["bankName"];
		$branchName = $_POST["branchName"];
		$refNo = $_POST["refNo"];
		//$bankCharge = $_POST["bankCharge"];
		$bankCharge  = 88.20;
		//$warehouseCode = $_POST["warehouseCode"];
		$warehouseCode = "";
		//$warehouseName = $_POST["warehouseName"];
		$warehouseName = "";
		$delay = $_POST["Delay"];
		$prepaidAcct = $_POST["prepaidAcct"];
		//$internalReference = $_POST["internalReference"];
		$internalReference = "";
		$transactionValue = $_POST["transactionValue"];
		$transactionValueCurr = $_POST["transactionValueCurr"];
		$extFreightCost = $_POST["extFreightCost"];
		$extFreightCostCurr = $_POST["extFreightCostCurr"];
		//$insuranceCost = $_POST["insuranceCost"];
		$insuranceCost = 69.69;
		//$insuranceCostCurr = $_POST["insuranceCostCurr"];
		$insuranceCostCurr = "";
		//$otherCostCurr = $_POST["otherCostCurr"];
		$otherCost = "";
		$otherCostCurr = "";

		$items = array();
		$count = count($_POST["itemName"]);
		
		for($x=0;$x<$count;$x++){

			$item = array($_POST["itemName"][$x], $_POST["itemCode"][$x], $_POST["HSCODE"][$x], $_POST["noOfPackages"][$x], $_POST["UOM"][$x], $_POST["supplementaryValueOne"][$x], $_POST["countryOrigin"][$x], $_POST["preference"][$x], $_POST["itemGrossWeight"][$x], $_POST["itemInvoiceValue"][$x], $_POST["itemInvoiceValueCurrency"][$x]);
			array_push($items, $item);

		}
	
		var_dump($items);

			echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
        //$result = $aeds->addaeds($appno, $clientName, $clientTIN, $consigneeTIN, $consigneeName, $BOCrefno, $zoneLocation, $EDno, $portOforigin, $purposeImport, $paymentProcedure, $manifestNo, $departureDate, $arrivalDate, $modeOfTransport, $countryOrigin, $deliveryRemarks, $additionalRemarks, $internalRef, $otherCost, $shipperName, $shipperAddress,$brokerName,  $brokerAddress, $brokersTIN, $OfcClearance, $tentativeRelease, $cargo, $registryNo, $carrier, $entryNo, $transshipmentPort, $locationOfGoods, $appType, $agency, $AirBill, $importTo, $paymentRefno, $CountryOfExport, $portOfDestination, $paymentDate, $crno, $portDischarge, $POno, $invoiceno, $totalValue, $totalWeight);

        $result = $aeds->addAEDSMain($appno, $AirWayBill, $portOforigin, $OfcClearance, $purposeImport, $paymentProcedure, $manifestNo, $departureDate, $arrivalDate, $tentativeRelease, $shipperName, $shipperAdd1, $shipperAdd2, $shipperAdd3, $brokerName, $brokerAdd1, $brokerAdd2, $brokerAdd3, $carrierID, $registryNo, $localCarrier, $CountryOfExport, $entryNo, $transshipmentPort, $portOfDestination, $locationOfGoods, $additionalRemarks, $deliveryRemarks, $deliveryTerms, $paymentTerms, $bankName, $branchName, $refNo, $bankCharge, $warehouseCode, $warehouseName, $delay, $prepaidAcct, $internalReference, $transactionValue, $transactionValueCurr, $extFreightCost, $extFreightCostCurr, $insuranceCost, $insuranceCostCurr, $otherCost, $otherCostCurr, $items);
	}
		
    
	if($result != "Adding data failed"){ 
		$status = "SUCCESS!";
		$responseMessage = "<p><center>Your AEDS with Application number </center></p>";
		$responseMessage .= "<p><center><strong>$appno</strong></center></p>";
		$responseMessage .= "<p><center>was successfully submitted. You will receive an email notification once your application is processed.</center></p>";
	}else{
		$status = "Failed";
		$responseMessage = "Failed to submit eAD Application.";
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
                        <a href="exportables" class="btn btn-default btn-block"><i class="fa fa-reply fa-fw"></i> Back</a>
                    </div>

                </div>
            </div>
        </div>
        
    </div>

<?php include('../script.php');?>