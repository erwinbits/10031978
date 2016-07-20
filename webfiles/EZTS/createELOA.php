
<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

use Functions\eZTD;
// use Functions\UserAccount;

$info = new eZTD;
// $account = new UserAccount;

$ecertno = $_GET['ecertno'];
$id = $_GET['id'];

//var_dump($_GET);

// if($info->checkifeCertisValid($ecertno)){
//     if($info->checkifIDisValid($id)){
//         if($info->checkifTINisValid($_GET['TIN'])){
//             if($info->checkifCltcodeisValid($_GET['CEcltcode'])){

            $fetch = $info->ListeCERTinfo($ecertno);
                foreach ($fetch as $data) {
                    $ELSEname = $data['ELSEname'];
                    $ZoneLoc = $data['ZoneLoc'];
                    $procurement = $data['procurement'];
                    $CEcltcode = $data['CEcltcode'];
                    $ecertno = $data['ecertno'];
                    $userPEZACor = $data['userPEZACor'];
                    $clientid = $data['id'];
                    $appointedby = $data['appointedBy'];
                }

                $fetch2 = $info->ListClientInfo($id);
                    foreach ($fetch2 as $data) {
                        $company_name = $data['companyName'];
                        $Consigneezone = $data['zoneCode'];
                    }
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!-- FORM -->
    <!--Page Content-->
    <div id="page-wrapper">
        <div class="container-fluid">
            <br>
            <h2>e-LOA Form</h2>
            <hr>
            <form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="viewELOA" method="POST">
                <?php $appno = "APLOA-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>LOA INFORMATION</strong></div>
                    <div class="panel-body">
                        <table style="margin:0 auto;">

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Application Number </label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo $appno?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >LOA Number </label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="e-LOA Number is Auto-Generated" readonly >
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label col-sm-3" >Transaction Type </label>
                                <div class="col-sm-8">
                                    <select class="form-control input-required" autofocus="true" type="text" name="transaction_type" placeholder="Frequency" required>
                                        <option name="" value=""> -Transaction Type- </option>
                                        <option value="Indirect Export"> Indirect Export </option>
                                         <option value="Storage and Retrieval"> Storage and Retrieval</option>
                                          
                                       
                                    </select>
                                </div>
                            </div>

                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>CLIENT INFORMATION</strong></div>
                    <div class="panel-body">
                        <table style="margin:0 auto;">

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Consignee</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo $company_name?>"  name="ConsigneeName" readonly tabindex="-1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Zone Location</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo $Consigneezone?>"  name="ConsigneeZone" readonly tabindex="-1">
                                </div>
                            </div>
                            
                            <input type="hidden" name="procurement" value="<?php echo $procurement?>">
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
                    <div class="panel-body">
                        <table id="table" class="table table-striped table-hover text-center" style="margin:0 auto;">
                       
                            <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>HSCODE</th>
                                    <th>Quantity</th>
                                    <th>Unit of Measure</th>
                                    <th></th>
                                    <th>Unit Price (USD)</th>
                                   <th></th>
                                </tr>
                            </thead>
                           
                            <?php

                                $ecertno = $_GET['ecertno'];

                                $items = new eZTD;

                                $fetch = $items->eCERTitems($ecertno);

                                    $i = 0;
                                    foreach ($fetch as $data) {
                                        $itemCode = $data['itemCode'];
                                        $description = $data['description'];
                                        $HSCODE = $data['HSCODE'];
                                        $quantity = $data['quantity'];
                                        $UOM = $data['UOM'];
                                        $ItemID = $data['ItemID'];
                                        
                                        $i++;
                                    
                               echo 
                                    
                                    "<tr>
                                       <td><input class='form-control' type='text' name='itemCode[]' value='$itemCode' readonly tabindex='-1'></td>
                                       <td><input class='form-control' type='text' name='description[]' value='$description' readonly tabindex='-1'></td>
                                       <td><input class='form-control' type='text' name='HSCODE[]' value='$HSCODE' readonly tabindex='-1'></td>
                                       <td><input class='form-control' type='text' id='qty".$i."' name='quantity[]' value='$quantity' readonly tabindex='-1'></td>
                                       <td><input class='form-control' type='text' name='UOM[]' value='$UOM' readonly tabindex='-1'></td>
                                       <td><input type='hidden' name='ItemID[]' value='$ItemID' readonly tabindex='-1'></td>
                                       <td><input class='form-control' type='number' step='any' id='unitprice".$i."' name='unitPrice[]' value='' placeholder='USD' required></td>
                                        <td><input class='form-control' type='hidden' id='totalvalue".$i."' name='totalValue[]' value='' placeholder='Total Value' tabindex='-1' readonly></td>
                                      
                                   </tr>";

                                }
                               ?>
                        </table>
                    </div>
                </div>

                <div class="form-group text-right">
                    <hr>
                    <?php $TIN = $_GET['TIN'];?>

                    <button type="submit" name="view" value="view" class="btn btn-primary" onclick="return confirm('You will be charged for P1,200 non-refundable processing fee. Are you sure you want to proceed with this application? ')">View</button>
                    <input type="hidden" name="TIN" value="<?php echo $TIN?>">
                    <input type="hidden" name="ELSEname" value="<?php echo $ELSEname?>">
                    <input type="hidden" name="ELSEzone" value="<?php echo $ZoneLoc?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="hidden" name="CEcltcode" value="<?php echo $CEcltcode?>">
                    <input type="hidden" name="ecertno" value="<?php echo $ecertno?>">
                    <input type="hidden" name="appno" value="<?php echo $appno;?>">
                    <input type="hidden" name="userPEZACor" value="<?php echo $userPEZACor;?>">
                    <input type="hidden" name="clientid" value="<?php echo $clientid;?>">
                </div>

            </form>
        
        </div>
<!-- General -->
    </div>

<?php 
// }else{
//     echo '<div id="page-wrapper">
//             <div class="container-fluid">
//             <h3><center>Not Allowed 1</center></h3>
//         </div>
//     </div>';
// }

// }else{
//     echo '<div id="page-wrapper">
//             <div class="container-fluid">
//             <h3><center>Not Allowed 2</center></h3>
//         </div>
//     </div>';
// }

// }else{
//     echo '<div id="page-wrapper">
//             <div class="container-fluid">
//             <h3><center>Not Allowed 3</center></h3>
//         </div>
//     </div>';
// }

// }else{
//     echo '<div id="page-wrapper">
//             <div class="container-fluid">
//             <h3><center>Not Allowed 4</center></h3>
//         </div>
//     </div>';
// }
include('../includes/footer.php');?>
<!-- <script src="https://code.jquery.com/jquery-2.1.4.js"></script> -->
<!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
<?php include('../script.php');?>

<script type="text/javascript" src="js/items-auto-compute.js"></script>