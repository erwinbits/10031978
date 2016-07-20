<?php

//error_reporting(E_NOTICE^E_ALL);

include('../includes/ClientLayout.php'); 
//include('../includes/sidebar.php');

use Functions\eZTD;
use Functions\eZTS;
use Functions\SuretyBond;

    $eztd = new eZTD;
    $data = new eZTS;
	$bond = new SuretyBond;

    if(isset($_POST)){
        //var_dump($_POST['totalValue']);
        //echo array_sum($_POST['totalValue']);
        
        $TransferDate = date('Y-m-d', strtotime($_POST['TransferDate']));
        $LOAno = strtoupper($_POST['LOAno']);
        $clientName = strtoupper($_POST['clientName']);
        $clientZone = strtoupper($_POST['clientZone']);
        $consignee = strtoupper($_POST['consignee']);
        $ELSEZone = strtoupper($_POST['ELSEZone']);
        $CommInvoice = strtoupper($_POST['CommInvoice']);
        $PackingList = strtoupper($_POST['PackingList']);
        $DeliveryReceipt = strtoupper($_POST['DeliveryReceipt']);
        $Gatepass = strtoupper($_POST['Gatepass']);
        $purpose = strtoupper($_POST['purpose']);
        $CEcltcode = $_POST['CEcltcode'];
        $appno = $_POST['appno'];
		$userPEZACor = $_POST['userPEZACor'];
		$SBamount = $_POST['SBamount'];
		$SuretyBondNo = $_POST['SuretyBondNo'];
		$SBcompany = $_POST['SBcompany'];
		$SB_ORnum = $_POST['SB_ORnum'];
		$ORnum = $_POST['ORnum'];
		$zonetype = $_POST['zonetype'];

        $count = count($_POST['ItemID']);
            for($i=0;$i<$count;$i++)
            {
                $qtyToBeTransferred = $_POST['qtyToBeTransferred'][$i];
                $unitValue = $_POST['unitValue'][$i];
                $totValue[] = $qtyToBeTransferred * $unitValue;
            }

            $sumTotValue =  array_sum($totValue);
            $VASPfee = 0;

	
            if($sumTotValue >= 10000)
            {
                $processingFee = 360;
            }else{
                $processingFee = 180;
            }
		
				if($eztd->checkIfTheresEnoughFunds2($VASPfee)){
					
					 $status = "WARNING!";
					 $responseMessage = "Cannot process your request! Your VASP account is out of Funds.";
					 
				}elseif($eztd->checkIfTheresEnoughFunds($processingFee)){
					
					 $status = "WARNING!";
					 $responseMessage = "Cannot process your request! Your PEZA account is out of Funds.";
					 
				}elseif($eztd->checkifLOAisValid($LOAno)){

					$status = "WARNING!";
					$responseMessage = "Cannot process your request! Your LOA is expired.";

                }elseif($eztd->checkifLOAisNotConsumed($LOAno, $sumTotValue)){

                    $status = "WARNING!";
                    $responseMessage = "Cannot process your request! The value of your EZTD application exceeds the available value of your eLOA.";

                }elseif($eztd->checkiffirstEZTD($LOAno)){

                     //=== INSERTS DATA WITH STATUS=0 ===//
                    $result = $eztd->ZTD2($appno, $TransferDate, $LOAno, $clientName, $clientZone, $consignee, $purpose, $ELSEZone, $CommInvoice, $PackingList, $DeliveryReceipt, $Gatepass, $CEcltcode, $userPEZACor, $SBamount, $SBcompany, $SB_ORnum, $SuretyBondNo, $zonetype, $ORnum);

                         if($result != "Adding data failed"){ 
                            $status = "SUCCESS!";
                            $responseMessage = "<p><center>Your e-ZTD with Application number </center></p>";
                            $responseMessage .= "<p><center><strong>$appno</strong></center></p>";
                            $responseMessage .= "<p><center>was successfully submitted. You will receive an email notification once your application is processed.</center></p>";
                        }else{
                            $status = "Failed";
                            $responseMessage = "Failed to submit e-ZTD Application.";
                        }

                }else{
                
                if($eztd->checkiftheresOPENeztd($LOAno))
                {  
                       //=== INSERTS DATA WITH STATUS=0 ===//
                    $result = $eztd->ZTD2($appno, $TransferDate, $LOAno, $clientName, $clientZone, $consignee, $purpose, $ELSEZone, $CommInvoice, $PackingList, $DeliveryReceipt, $Gatepass, $CEcltcode, $userPEZACor, $SBamount, $SBcompany, $SB_ORnum, $SuretyBondNo, $zonetype);

                         if($result != "Adding data failed"){ 
                            $status = "SUCCESS!";
                            $responseMessage = "<p><center>Your e-ZTD with Application number </center></p>";
                            $responseMessage .= "<p><center><strong>$appno</strong></center></p>";
                            $responseMessage .= "<p><center>was successfully submitted. You will receive an email notification once your application is processed.</center></p>";
                        }else{
                            $status = "Failed";
                            $responseMessage = "Failed to submit e-ZTD Application.";
                        }
                             
                }else{

                        //=== INSERTS DATA WITH STATUS=1 ===//
                    $result = $eztd->ZTD($appno, $TransferDate, $LOAno, $clientName, $clientZone, $consignee,$purpose, $ELSEZone, $CommInvoice, $PackingList, $DeliveryReceipt, $Gatepass, $CEcltcode, $userPEZACor, $SBamount, $SBcompany, $SB_ORnum, $SuretyBondNo, $ORnum, $zonetype);

                        if($result != "Adding data failed"){ 
                            $status = "SUCCESS!";
                            $responseMessage = "<p><center>Your e-ZTD with Application number </center></p>";
                            $responseMessage .= "<p><center><strong>$appno</strong></center></p>";
                            $responseMessage .= "<p><center>was Approved.</center></p>";
                        }else{
                            $status = "Failed";
                            $responseMessage = "Failed to submit e-ZTD Application.";
                        }
                }

            }   
                    // //=== INSERTS DATA WITH STATUS=0 ===//
                    // $result = $eztd->ZTD2($appno, $TransferDate, $LOAno, $clientName, $clientZone, $consignee, $purpose, $ELSEZone, $CommInvoice, $PackingList, $DeliveryReceipt, $Gatepass, $CEcltcode, $userPEZACor, $SBamount, $SBcompany, $SB_ORnum, $SuretyBondNo, $ORnum, $zonetype);

                    //      if($result != "Adding data failed"){ 
                    //         $status = "SUCCESS!";
                    //         $responseMessage = "<p><center>Your e-ZTD with Application number </center></p>";
                    //         $responseMessage .= "<p><center><strong>$appno</strong></center></p>";
                    //         $responseMessage .= "<p><center>was successfully submitted. You will receive an email notification once your application is processed.</center></p>";
                    //     }else{
                    //         $status = "Failed";
                    //         $responseMessage = "Failed to submit e-ZTD Application.";
                    //     }
                    // }
                // }else{
                    
                //     //=== INSERTS DATA WITH STATUS=1 ===//
                //     $result = $eztd->ZTD($appno, $TransferDate, $LOAno, $clientName, $clientZone, $consignee,$purpose, $ELSEZone, $CommInvoice, $PackingList, $DeliveryReceipt, $Gatepass, $CEcltcode, $userPEZACor, $SBamount, $SBcompany, $SB_ORnum, $SuretyBondNo, $ORnum, $zonetype);

                //         if($result != "Adding data failed"){ 
                //             $status = "SUCCESS!";
                //             $responseMessage = "<p><center>Your e-ZTD with Application number </center></p>";
                //             $responseMessage .= "<p><center><strong>$appno</strong></center></p>";
                //             $responseMessage .= "<p><center>was Approved.</center></p>";
                //         }else{
                //             $status = "Failed";
                //             $responseMessage = "Failed to submit e-ZTD Application.";
                //         }
                // }
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
                        <a href="ELSEmyEZTD" class="btn btn-default btn-block"><i class="fa fa-reply fa-fw"></i> Back</a>
                    </div>

                </div>
            </div>
        </div>
        
    </div>

<?php include('../script.php');?>