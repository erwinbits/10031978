<?php


include('../includes/ClientLayout.php'); 
//include('../includes/sidebar.php');

use Functions\eZTD;

    $items = new eZTD;

    //$ZTDno = $_GET['ZTDno'];
    
    $appno = $_GET['appno'];

    $result = $items->closedTagged($appno);

    $status = "";
    $responseMessage = "";
    
    if($result){
        $status = "SUCCESS!";
        $responseMessage = "Items Received.";
    }else{
        $status = "Failed";
        $responseMessage = "Failed!";
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
                        <a href="myEZTD" class="btn btn-default btn-block"><i class="fa fa-reply fa-fw"></i> Back</a>
                    </div>

                </div>
            </div>
        </div>
        
    </div>

<?php include('../script.php');?>

