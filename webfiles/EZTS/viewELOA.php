<?php
//require("../../library.php");
include('../includes/layout.php');
use Functions\eZTD;
$eZTD = new eZTD;
$info = json_decode($MCrypt->decrypt($account));
        
$AccStatus = $account->getStatus();

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


if(isset($_POST['view']))
{

    $ecertno = $_POST['ecertno'];
    $TIN = $_POST['TIN'];
    $CEcltcode = $_POST['CEcltcode'];
    $appno = $_POST['appno'];
    $userPEZACor = $_POST['userPEZACor'];
    $clientid = $_POST['clientid'];
    $appointedBy = $eZTD->geteCERTappointedBy($ecertno);
    //var_dump($_POST);
    $ELSEname = strtoupper($_POST['ELSEname']);
    $ELSEzone = strtoupper($_POST['ELSEzone']);
    $ConsigneeName = strtoupper($_POST['ConsigneeName']);
    $ConsigneeZone = strtoupper($_POST['ConsigneeZone']);
    $transaction_type = strtoupper($_POST['transaction_type']);
    //$procurement = strtoupper($_POST['procurement']);
    //$ecertno = $ConsigneeZone . '-EC-' . rand(000000, 999999) ."-" . date('y') . "-" . '16A';

    $proc = $eZTD->getProcurementItems($ecertno);

    foreach($proc as $data){
        $directImport = $data['directImport'];
        $indirectImport = $data['indirectImport'];
        $domesticEnterprise = $data['domesticEnterprise'];
        $peza = $data['peza'];
        $nonpeza = $data['nonpeza'];
    }

    ## --- PROCUREMENT --- ##
    if($directImport == '1'){
        $check = 'checked = "checked"';
    }else{
        $check = ' ';
    }

    if($indirectImport == '1'){
        $check2 = 'checked =  "checked"';
    }else{
        $check2 = ' ';
    }

    if($domesticEnterprise == '1'){
        $checkd = 'checked =  "checked"';
    }else{
        $checkd = ' ';
    }

    ## --- SOURCE --- ##
    if($peza == '1'){
        $checkp = 'checked = "checked"';
    }else{
        $checkp = ' ';
    }

    if($nonpeza == '1'){
        $checkn = 'checked = "checked"';
    }else{
        $checkn = ' ';
    }

}

?>

    	 <link href="css/AdminLTE.min.css" rel="stylesheet">
			<div id="page-wrapper">
                <br>
                <br>
				<div class="row">
			        <div class='container-fluid'>
			        	<div class="panel panel-default">
			            	<div class="panel-heading text-center">
                                <strong>e-LOA APPLICATION</strong>
                            </div>
		                	<div class="panel-body"> 
                                <div>
                                    <center><h4>Electronic Letter of Authority</h4></center>
                                    <center><?php echo $transaction_type; ?></center>
                                </div>
                                <br>
                                <br>
                                <table width="100%">
                                    <tr>
                                        <td>Application No. &nbsp;:</td> 
                                        <td><strong><?php echo $appno;?></strong></td> 
                                        <td>Application Date: &nbsp;:</td>
                                        <td><strong><?php echo date('Y-m-d H:m:s')?></strong> </td>
                                    </tr>
                                     <br>
                                    <tr>
                                        <td>Approved Date &nbsp;: </td>
                                        <td><strong>N / A</strong></td> 
                                        <td>PEZA Processing Fee &nbsp;: </td>
                                        <td><strong><?php echo 'Php 1,200.00';?></strong></td>
                                     </tr>
                                     <tr>
                                        <td>Validity Date &nbsp;: </td>
                                        <td><strong>N / A</strong></td> 
                                        <td>Payment Ref. No. &nbsp;: </td>
                                        <td><strong><?php echo 'N / A';?></strong></td>
                                     </tr>
                                     <tr>
                                        <td>eCertificate No. &nbsp; </td>
                                        <td><strong><?php echo $ecertno;?></strong></td> 
                                        <td>Payment Date &nbsp;: </td>
                                        <td><strong>N / A</strong></td>
                                     </tr>
                                </table>
                                <hr>

                                <table width="100%">
                                    <tr>
                                        <td>OPRE &nbsp;: </td>
                                        <td><strong><?php echo $ELSEname;;?></strong></td> 
                                        <td>PEZA COR No. &nbsp;: </td>
                                        <td><strong><?php echo $account->getPEZACorNobyCo($ELSEname);?></strong></td>
                                     </tr>
                                      <br>
                                     <tr>
                                        <td>Zone Location &nbsp; </td>
                                        <td><strong><?php echo $ELSEzone;?></strong></td> 
                                        <td></td>
                                        <td></td>
                                     </tr>
                                     <tr>
                                        <td>RPRE &nbsp;: </td>
                                        <td><strong><?php echo $ConsigneeName;?></strong></td> 
                                        <td>PEZA COR No. &nbsp;: </td>
                                        <td><strong><?php echo $userPEZACor;?></strong></td>
                                     </tr>
                                     <tr>
                                        <td>Zone Location &nbsp; </td>
                                        <td><strong><?php echo $ConsigneeZone;?></strong></td> 
                                        <td></td>
                                        <td></td>
                                     </tr>
                                </table>
                                <hr>
                                <table border="1" cellpadding="5" align="center" width="100%">
                                    <tr>
                                        <th bgcolor="#bebfbf" align="center"><strong><center>HSCODE</center></strong></th>               
                                        <th bgcolor="#bebfbf" align="center"><strong><center>Item Code</center></strong></th>  
                                        <th bgcolor="#bebfbf" align="center"><strong><center>Item Description</center></strong></th> 
                                        <th bgcolor="#bebfbf" align="center"><strong><center>Quantity</center></strong></th>               
                                        <th bgcolor="#bebfbf" align="center"><strong><center>UOM</center></strong></th>  
                                        <th bgcolor="#bebfbf" align="center"><strong><center>Unit Price(US$)</center></strong></th>
                                        <th bgcolor="#bebfbf" align="center"><strong><center>Value(US$)</center></strong></th>
                                    </tr>
                                    <?php
                                    $count = count($_POST['HSCODE']);

                                    for($i=0;$i<$count;$i++){

                                        $HSCODE = $_POST['HSCODE'][$i];
                                        $itemCode = $_POST['itemCode'][$i];
                                        $description = $_POST['description'][$i];
                                        $quantity = $_POST['quantity'][$i];
                                        $UOM = $_POST['UOM'][$i];
                                        $unitPrice = $_POST['unitPrice'][$i];
                                        //$totalValue = $_POST['totalValue'][$i];
                                        $totalValue = $quantity * $unitPrice;
                                        $ItemID = $_POST['ItemID'][$i];
                                        echo '<tr>
                                            <td><center>'.$HSCODE.'</center></td>
                                            <td><center>'.$itemCode.'</center></td>
                                            <td><center>'.$description.'</center></td>
                                            <td><center>'.$quantity.'</center></td>
                                            <td><center>'.$UOM.'</center></td>
                                            <td><center>'.number_format($unitPrice, 2).'</center></td>
                                            <td><center>'.number_format($totalValue, 2).'</center></td>
                                        </tr>';

                                         
                                    }
                                    $LOAValue = $totalValue;
                            
                                    ?>
                                </table>
                                <br>
                                <table border="0" cellpadding="5" align="center" width="100%">
                                    <td width="70%"><center></center></td>
                                    <td width="20%"><center><strong>Total Value:</strong></center></td>
                                    <td width="10%">US$ <?php echo number_format($LOAValue,2); ?></td>
                                </table>
                                <?php

                                if($appointedBy == 'Company'){
                                echo '<hr>
                                <div class="form-group">
                                    <strong>SOURCE OF GOODS:</strong>
                                </div>
                                <table border="0" cellpadding="5" align="center" width="100%">
                                    <tr>
                                        <td>
                                            <center><input type="checkbox" name="Direct Import" '.$check.' readonly disabled><label>&nbsp; Direct Import </label></center>
                                        </td>
                                        <td>
                                            <center><input type="checkbox" name="Indirect Import" '.$check2.' readonly disabled><label>&nbsp; Indirect Import </label> </center>
                                        </td>
                                        <td><center><input type="checkbox" name="Domestic Enterprise" '.$checkd.' readonly disabled><label>&nbsp; Sourced from Domestic Enterprise </label> </center></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <center><input type="checkbox" name="PEZA" '.$checkp.' readonly disabled><label>&nbsp; PEZA &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label> </center>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><center>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <input type="checkbox" name="Non-PEZA" '.$checkn.' readonly disabled><label>Other Export-oriented Enterprise </label> </center></td>
                                        <td></td>
                                    </tr>
                                </table>';
                                }
                                ?>
                                <hr>
                                <?php
                                echo '<center>
                                    <p>Your request to engage in warehousing/logistics services ('.$transaction_type.') is __________` subject to the standard terms and conditions set forth under PEZA MO No.__________dated_________.
                                    </p>
                                </center>
                                <br>
                                <center>
                                    <p>Any violation of the terms and conditions of this authority, pursuant to PEZA MC No.______ dated _______ shall be caused for the imposition upon <strong>'.$ELSEname.'</strong> of applicable penalties under PEZA rules, including but not limited to revocation of this authority.
                                    </p>
                                </center>';
                                ?>
                                <br>
                                <br>
                            </div>
                        </div>
                        <h4><center>
                                    Please carefully review before submitting the application.
                        </center></h4>
                            <form class="form-horizontal" id="" name="viewELOA" action="eLOAController" method="POST">
                                <center>
                                    <button type="submit" name="view" class="btn btn-primary" onclick="return confirm('Please review the details of your submission. If all is well, please click OK.')">SUBMIT</button>
                                    <input type="button" name="goback" value="CANCEL"class="btn btn-warning" onclick="window.location.href='/ELSEmyECERT'"></button>
                                    <input type="hidden" name="ecertno" value="<?php echo $ecertno;?>">
                                    <input type="hidden" name="TIN" value="<?php echo $TIN;?>">
                                    <input type="hidden" name="CEcltcode" value="<?php echo $CEcltcode;?>">
                                    <input type="hidden" name="appno" value="<?php echo $appno;?>">
                                    <input type="hidden" name="userPEZACor" value="<?php echo $userPEZACor;?>">
                                    <input type="hidden" name="clientid" value="<?php echo $clientid;?>">
                                    <input type="hidden" name="ELSEname" value="<?php echo $ELSEname;?>">
                                    <input type="hidden" name="ELSEzone" value="<?php echo $ELSEzone;?>">
                                    <input type="hidden" name="ConsigneeName" value="<?php echo $ConsigneeName;?>">
                                    <input type="hidden" name="ConsigneeZone" value="<?php echo $ConsigneeZone;?>">
                                    <input type="hidden" name="transaction_type" value="<?php echo $transaction_type;?>">
                                    <input type="hidden" name="procurement" value="<?php echo $procurement;?>">
                                     <input type="hidden" name="LOAValue" value="<?php echo $LOAValue;?>">
                                     <?php
                                    $count = count($_POST['HSCODE']);
                                    for($i=0;$i<$count;$i++){

                                    $HSCODE = $_POST['HSCODE'][$i];
                                    $itemCode = $_POST['itemCode'][$i];
                                    $description = $_POST['description'][$i];
                                    $quantity = $_POST['quantity'][$i];
                                    $UOM = $_POST['UOM'][$i];
                                    $unitPrice = $_POST['unitPrice'][$i];
                                    //$totalValue = $_POST['totalValue'][$i];
                                    // $totalValue = $quantity * $unitPrice;
                                    $ItemID = $_POST['ItemID'][$i];

                                    echo'
                                    <input type="hidden" name="HSCODE[]" value="'.$HSCODE.'">
                                    <input type="hidden" name="itemCode[]" value="'.$itemCode.'">
                                    <input type="hidden" name="description[]" value="'.$description.'">
                                    <input type="hidden" name="quantity[]" value="'.$quantity.'">
                                    <input type="hidden" name="UOM[]" value="'.$UOM.'">
                                    <input type="hidden" name="unitPrice[]" value="'.$unitPrice.'">
                                    <input type="hidden" name="ItemID[]" value="'.$ItemID.'">
                                   
                                    ';
                                    }
                                    ?>
                                </center>

                            </form>
                            <br>
                            <br>
                    </div>
                </div>
            </div>
    </body>
<?php include('../includes/footer.php');?>
</html>
			                    