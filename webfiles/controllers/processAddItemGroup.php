<?php

include('../includes/ClientLayout.php'); 

use Functions\eZTD;
    $items = new eZTD;
   
    if($_POST){

        $itemGroupName = strtoupper($_POST['itemGroupName']);
		$UID = $items->getUID($itemGroupName);
		$count = count($_POST['HSCODE']);
		for($x=0;$x<$count;$x++)
		{
			
			$ItemID = $_POST['ItemID'][$x];
			$HSCODE = $_POST['HSCODE'][$x];
			$itemCode = $_POST['itemCode'][$x];
			$description = $_POST['description'][$x];
			$TAR_Ext = $_POST['TAR_Ext'][$x];
			//$RegActivity = $_POST['RegActivity'][$x];
			//$frequency = $_POST['frequency'][$x];
			
			$result = $items->addItemGroup($itemGroupName, $UID, $ItemID, $HSCODE, $itemCode, $description, $TAR_Ext);
		}
		
        $status = "";
        $responseMessage = "";

       
        if($result != "Adding data failed"){ 
            $status = "SUCCESS!";
            $responseMessage = "<p><center>SUCCESS!! </center></p>";
            $responseMessage .= "<p><center><strong>Items was added to the Item Group</strong></center></p>";
        }else{
            $status = "Failed";
            $responseMessage = "Item Already in this Item Group!.";
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
                        <a href="itemGroupNameList" class="btn btn-default btn-block"><i class="fa fa-reply fa-fw"></i> Back</a>
                    </div>

                </div>
            </div>
        </div>
        
    </div>

<?php include('../script.php');?>

