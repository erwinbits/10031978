<?php


include('../includes/ClientLayout.php'); 
//include('../includes/sidebar.php');

use Functions\eZTD;

    $items = new eZTD;
   
   
    if($_POST){
        $ELSEname = strtoupper($_POST['ELSEname']);
        $TIN = strtoupper($_POST['TIN']);
        $supplier = strtoupper($_POST['supplier']);
        $add1 = strtoupper($_POST['add1']);
        $add2 = strtoupper($_POST['add2']);
        $add3 = strtoupper($_POST['add3']);
        //$source = strtoupper($_POST['source']);
        //$procurement = strtoupper($_POST['procurement']);
        $ZoneLoc = strtoupper($_POST['ZoneLoc']);
        $appointedBy = $_POST['appointedBy'];
        $CEzone = $_POST['CEzone'];
        $appno = $_POST['appno'];
		
			## --- if null --- ##
			if(isset($_POST['directImport'])){
				$directImport = $_POST['directImport'];
				
			}else{
				$directImport = '0';
				
			}
			
			if(isset($_POST['indirectImport'])){
				$indirectImport = $_POST['indirectImport'];
				
			}else{
				$indirectImport = '0';
				
			}
			
			if(isset($_POST['domesticEnterprise'])){
				$domesticEnterprise = $_POST['domesticEnterprise'];
				
			}else{
				$domesticEnterprise = '0';
				
			}
			
			if(isset($_POST['peza'])){
				$peza = $_POST['peza'];
				
			}else{
				$peza = '0';
				
			}
			
			if(isset($_POST['nonpeza'])){
				$nonpeza = $_POST['nonpeza'];
				
			}else{
				$nonpeza = '0';
				
			}

        $result = $items-> addeCert($ELSEname, $TIN, $supplier, $add1, $add2, $add3, $directImport, $indirectImport, $domesticEnterprise, $peza, $nonpeza, $ZoneLoc, $CEzone, $appno, $appointedBy);

        $status = "";
        $responseMessage = "";

       
        if($result != "Adding data failed"){ 
            $status = "SUCCESS!";
            $responseMessage = "<p><center>Your e-Certificate with Application number </center></p>";
            $responseMessage .= "<p><center><strong>$appno</strong></center></p>";
            $responseMessage .= "<p><center>was successfully submitted. You will receive an email notification once your application is processed.</center></p>";
        }else{
            $status = "Failed";
            $responseMessage = "Failed to submit eCert Application.";
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
                        <a href="myECERT" class="btn btn-default btn-block"><i class="fa fa-reply fa-fw"></i> Back</a>
                    </div>

                </div>
            </div>
        </div>
        
    </div>

<?php include('../script.php');?>

