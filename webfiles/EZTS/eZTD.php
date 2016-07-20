<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

use Functions\eZTD;
use Functions\SuretyBond;

$info = new eZTD;
$surety = new SuretyBond;

$eLOAno = $_GET['eLOAno'];
	
	$fetch = $info->ListeLOAinfo($eLOAno);
		foreach ($fetch as $data) {
			$ELSEname = $data['ELSEname'];
			$consignee = $data['ConsigneeName'];
			$ELSEzone = $data['ELSEzone'];
			$ConsigneeZone = $data['ConsigneeZone'];
			$transaction_type = $data['transaction_type'];
			$CEcltcode = $data['CEcltcode'];
			$userPEZACor = $data['userPEZACor'];
		}
	$fetch2 = $surety->suretyBondList();
		foreach($fetch2 as $value){
			$suretybond_amount = $value['suretybond_amount'];
			$suretybond_ornum = $value['suretybond_ornum'];
            $suretybond_company = $value['suretybond_company'];
			//$SBno = $value['SBno'];
			
		}
	$cltcode = $_GET['cltcode'];
	//$ORnum = $info->getOrRefnum($cltcode);
	
	//echo $ELSEzone;
	//echo "<br>";
	//echo $ConsigneeZone;
    
	if($ELSEzone == $ConsigneeZone){

        $intra = 'checked="checked"';
        $inter = "";
    }else{

        $intra = "";
        $inter = 'checked="checked"';
    }
		
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- FORM -->
	<!--Page Content-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<br>
            <h2>e-ZTD Form</h2>
            <hr>
			<form id="eztdForm" class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="eZTDController" method="POST">
                <?php $appnumber = "APZTD-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>EZTD INFORMATION</strong></div>
                    <div class="panel-body">
                        
                        <div class="row">

                            <label class="control-label col-sm-2" >Application No: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="<?php echo $appnumber?>" readonly>
                            </div>

                            <label class="control-label col-sm-2" >LOA No.: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value="<?php echo $eLOAno?>"  name="LOAno" placeholder="E-LOA NUMBER" tabindex="-1" readonly>
                            </div>
                        </div>
                        
                        <hr>

                        <div class="row">
                            <label class="control-label col-sm-2" >ELSE Name: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="<?php echo $ELSEname?>"  name="clientName" tabindex="-1" readonly> 
                            </div>

                            <label class="control-label col-sm-2" >Client Enterprise: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value="<?php echo $consignee?>"  name="consignee" tabindex="-1" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <br>
                            <label class="control-label col-sm-2" >ELSE Zone: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="<?php echo $ELSEzone?>"  name="ELSEZone" tabindex="-1" readonly> 
                            </div>

                            <label class="control-label col-sm-2" >Client Zone: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value="<?php echo $ConsigneeZone?>"  name="clientZone" tabindex="-1" readonly> 
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row">
                            <label class="control-label col-sm-2" >Date of Transfer: </label>
                            <div class="col-sm-4">
                                <input class="form-control"  name="TransferDate" placeholder="YYYY-MM-DD" id="calendar" required/>
                                <div class="help-block with-errors"></div>
                            </div>

                            <label class="control-label col-sm-2" >Transaction Type: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value="<?php echo $transaction_type?>"  name="purpose" tabindex="-1" readonly><br> 
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <label class="control-label col-sm-2" >Commercial Invoice: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value=""  name="CommInvoice" placeholder="INVOICE NUMBER" required> 
                            </div>

                             <label class="control-label col-sm-2" >Delivery Receipt: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value=""  name="DeliveryReceipt" placeholder="RECEIPT NUMBER" required> 
                            </div>

                            
                        </div>

                        <div class="row">
                            <br>

                            <label class="control-label col-sm-2" >Packing List: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value=""  name="PackingList" placeholder="PACKING LIST NUMBER"> 
                            </div>

                           <label class="control-label col-sm-2" >Gatepass: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value=""  name="Gatepass" placeholder="GATEPASS NUMBER"> 
                            </div>

                        </div>
                        <?php
                        if($ELSEzone == $ConsigneeZone){
                            $suretybond_amount1 = 'Not Applicable';
                            $suretybond_ornum = 'Not Applicable';
                            $suretybond_company = 'Not Applicable';
                            $SBno = 'Not Applicable';
                        }else{
                            $suretybond_amount1 = $suretybond_amount;
                            $suretybond_ornum = $suretybond_ornum;
                            $suretybond_company = $suretybond_company;
                            $SBno = $SBno;

                        }
                        ?>
                        <div class="row">
                          <br>
                           <label class="control-label col-sm-2" >Bond Amount(PHP): </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="SBamount" value="<?php echo $suretybond_amount1;?>" readonly tabindex -1> 
                            </div>
                        </div>

                        <div class="row">
						<br>
							<label class="control-label col-sm-2">Zone Type:</label>
							<div class="col-sm-4">
								<input type="radio" name="zonetype" value="1" <?php echo $intra; ?> required > Intrazone &nbsp; &nbsp;
								<input type="radio" name="zonetype" value="2" <?php echo $inter; ?> > Interzone
							</div>
						</div>
                        
                    </div>
                </div>
                

                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
                    <div class="panel-body">
                        <P>**Fill up the form accurately and completely. Tick the checkbox and hit the "-" to exclude an item/s.</P>
                        <table id="dataTable" class="table table-striped table-hover text-center" style="margin:0 auto;">
                       
                            <thead>
                                <tr>  
                                    <th></th>
                                    <th></th>
                                    <th>HSCODE</th>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>Orig. Quantity</th>
                                    <th>Remaining Items</th>
                                    <th>Quantity to transfer</th>
                                    <th>Unit of Measure</th>
                                    <th>Unit Price</th>
                                    <th></th>
                                   
                                </tr>
                            </thead>
                           
                            <?php

                                $appno = $_GET['appno'];
								//var_dump($appno);
                                $items = new eZTD;

                                $fetch = $items->ListeLOAitems($appno);
                                    foreach($fetch as $data){
                                        $eLOAno = $data['eLOAno'];
                                        $HSCODE = $data['HSCODE'];
                                        $itemCode = $data['itemCode'];
                                        $description = $data['description'];
                                        $quantity = $data['quantity'];
                                        $UOM = $data['UOM'];
                                        $unitValue = $data['unitPrice'];
                                        $ItemID = $data['ItemID'];
                                        $totalValue = $data['totalValue'];

                                        $inventory = $items->getInventory($ItemID);
                                        foreach($inventory as $value){
                                            $current = $value['currentBal'];
                                        }
								echo "<tr id ='form'>
                                    <td><input type='checkbox' name='chk[]' tabindex='-1'></td>

                                   <td><input class='form-control' type='hidden' name='eLOAno[]' value='$eLOAno' tabindex='-1' readonly></td>
                                   <td><input class='form-control' type='text' name='HSCODE[]' value='$HSCODE' tabindex='-1' readonly></td>
                                   <td><input class='form-control' type='text' name='itemCode[]' value='$itemCode' tabindex='-1' readonly></td>
                                   <td><input class='form-control' type='text' name='description[]' value='$description' tabindex='-1' readonly></td>
                                   <td><input class='form-control' type='text' name='quantity[]' value='$quantity' tabindex='-1' readonly></td>
                                   <td><input class='form-control' type='text' id='ending' name='endingBal[]' value='$current' tabindex='-1' readonly></td>
                                   <td width='130px'><input class='form-control' type='number' step='any' id='transfer' name='qtyToBeTransferred[]' value='' placeholder='QTY' max='$current' min='1' required></td>
                                   <td><input class='form-control' type='text' name='UOM[]' value='$UOM' placeholder='Measure' tabindex='-1' readonly></td>
                                   <td><input class='form-control' type='number' step='any' name='unitValue[]' value='$unitValue' placeholder='Unit Price'  tabindex='-1' ></td>
                                   <td><input type='hidden' name='ItemID[]' value='$ItemID'></td>    
                                   <td><input type='hidden' name='totalValue[]' value='$totalValue'></td>                                  
                                   </tr>";
                               
                                        
                            }
                               ?>
                        </table>
                    </div>
                </div>
                
                <div class="form-group text-right">
                    <hr>
                    <button type="button" class="btn btn-danger btn-number" title="Remove" data-type="minus" onClick="deleteRow('dataTable')">
                        <span class="glyphicon glyphicon-minus-sign"></span>
                    </button>&nbsp; | &nbsp;
					
					 <!--<a class="btn btn-primary" href="eztdSummary?appno="<?php echo $appno; ?>" rel="" title="View Items">Submit</a>-->
					 
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                    <input type="hidden" name="CEcltcode" value="<?php echo $CEcltcode;?>">
                    <input type="hidden" name="appno" value="<?php echo $appnumber;?>">
                    <input type="hidden" name="userPEZACor" value="<?php echo $userPEZACor;?>">
                    <input type="hidden" name="SuretyBondNo" value="<?php echo $SBno;?>">
                    <input type="hidden" name="SBcompany" value="<?php echo $suretybond_company;?>">
                    <input type="hidden" name="SB_ORnum" value="<?php echo $suretybond_ornum;?>">
                    <!--<input type="hidden" name="ORnum" value="<?php echo $ORnum;?>">-->
                </div>

            </form>
			
		</div>
<!-- General -->
	</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>



<!-- JS -->
<!-- <script type="text/javascript" src="js/compareqty.js"></script> -->
<script type="text/javascript" src="js/importables.js"></script>
<!-- JS -->

<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
 
 <!--<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>-->
<script>
    $(function() {
        $( "#calendar" ).datepicker({ minDate: 0 });
    });
</script>