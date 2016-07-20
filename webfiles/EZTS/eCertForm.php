<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

	use Functions\eZTD;

    $message = false;

    $items = new eZTD;

	if($_POST){
        $ELSEname = $_POST['ELSEname'];
        $TIN = $_POST['TIN'];
        $ELSEsourceThru = $_POST['ELSEsourceThru'];
        $supplier = $_POST['supplier'];
        $add1 = $_POST['add1'];
        $add2 = $_POST['add2'];
        $add3 = $_POST['add3'];
        $source = $_POST['source'];
        $ShipmentSourceMode = $_POST['ShipmentSourceMode'];

        $count = count($_POST['itemCode']);
        for($i=0;$i<$count;$i++){

        $ZoneLoc = $_POST['ZoneLoc'];
        $genDesc = $_POST['genDesc'][$i];
        $itemCode = $_POST['itemCode'][$i];
        $description = $_POST['description'][$i];
        $HSCODE = $_POST['HSCODE'][$i];
        $quantity = $_POST['quantity'][$i];
        $UOM = $_POST['UOM'][$i];
        
            $result = $items->addeCertManual($ELSEname, $TIN, $ELSEsourceThru, $supplier, $add1, $add2, $add3, $source, $ShipmentSourceMode, $ZoneLoc, $genDesc, $itemCode, $description, $HSCODE, $quantity, $UOM);
        }//end of for loop

          if($_POST){     
            if($result != "Adding data failed"){
                $disp_success = "<center><br><br><br><br><h3>Your e-Certificate Application was successfully submitted.<h3></center>
                <center><h5>You will receive an email notification once your application was processed.</h5></center>";
                $message = true;
            }else{
                $disp_success = "Failed to submit e-Certificate Application.";
                $message = true;
            }
        }
    }
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!-- FORM -->
	<!--Page Content-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<?php
				if($message==false){
			?>
            <h2>e-Certificate Form</h2>
            <hr>
			<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="" method="POST">
                
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>ELSE INFORMATION</strong></div>
                    <div class="panel-body">
                        <table style="margin:0 auto;">

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Ecozone Logistics Service Enterprise</label>
                                <div class="col-sm-8">
                                    <select class="form-control input-required" type="text" name="ELSEname" placeholder="Choose Here">
                                        <option name="" value=""> -Choose Here- </option>
                                        <option name="ELSEname" value="ACESTAR INTEGRATED LOGISTICS INC."> ACESTAR INTEGRATED LOGISTICS INC. </option>
                                        <option name="ELSEname" value="ACK PHILIPPINES INC."> ACK PHILIPPINES INC. </option>
                                        <option name="ELSEname" value="ADVANCED MOLDING COMPANY. INC. (LOGISTICS)"> ADVANCED MOLDING COMPANY. INC. (LOGISTICS) </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Tax Identity Number </label>
                                <div class="col-sm-8">
                                    <input class="form-control" pattern="[0-9]{12}" maxlength="12" type="text" value="" placeholder="TIN"  name="TIN" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Zone Location</label>
                                <div class="col-sm-8">
                                    <select class="form-control input-required" type="text" name="ZoneLoc" placeholder="Choose Here">
                                        <option name="" value=""> -Choose Here- </option>
                                        <option name="ZoneLoc" value="zone 1"> Zone 1 </option>
                                        <option name="ZoneLoc" value="zone 2"> Zone 2 </option>
                                        <option name="ZoneLoc" value="zone 3"> Zone 3 </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Procurement </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="ELSEsourceThru" placeholder="Select">
                                        <option value=""> Select </option>
                                        <option name="ELSEsourceThru" value="Direct Import">Direct Import</option>
                                        <option name="ELSEsourceThru" value="Indirect Import">Indirect Import</option>
                                        <option name="ELSEsourceThru" value="Domestic Enterprise">Domestic Enterprise</option>
                                    </select>
                                </div>
                            </div>

                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>SHIPMENT INFORMATION</strong></div>
                    <div class="panel-body">
                        <table style="margin:0 auto;">

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Supplier</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="Supplier"  name="supplier" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Address</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="Address 1"  name="add1" ><br>
                                    <input class="form-control" type="text" value="" placeholder="Address 2"  name="add2" ><br>
                                    <input class="form-control" type="text" value="" placeholder="Address 3"  name="add3" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">Source</label>
                                <div class="col-sm-8">
                                    <input required type="radio"  name="source" value="1"> PEZA &nbsp;
                                    <input required type="radio"  name="source" value="0"> Non-PEZA
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Sourcing Mode </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="ShipmentSourceMode" placeholder="Select">
                                        <option value=""> Select </option>
                                        <option name="ShipmentSourceMode" value="Direct Import">Direct Import</option>
                                        <option name="ShipmentSourceMode" value="Indirect Import">Indirect Import</option>
                                        <option name="ShipmentSourceMode" value="Domestic Enterprise">Domestic Enterprise</option>
                                    </select>
                                </div>
                            </div> 
                   
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <!-- PANEL HEADING -->
                    <div class="panel-heading text-center">
                        <strong>Add Item/s</strong>
                    </div>

                    <!-- PANEL BODY -->
                    <div class="panel-body">
                    <!-- TABLE -->
                        <table id="dataTable" class="form">
                            <tr>
                                <td><input type="checkbox" name="chk[]"/></td>
                                <td>&nbsp;</td>
                                <td><input class="form-control input-required" type="text" name="genDesc[]" placeholder="General Description"></td>
                                <td>&nbsp;</td>
                                <td><input class="form-control input-required" type="text" name="itemCode[]" placeholder="Item Code"></td>
                                <td>&nbsp;</td>
                                <td style="width:170px;">
                                    <select class="form-control input-required" type="text" name="description[]" placeholder="Description">
                                        <option name="" value=""> -Description- </option>
                                        <option name="description[]" value="Equipment"> Equipment </option>
                                        <option name="description[]" value="Raw Materials"> Raw materials </option>
                                        <option name="description[]" value="Packaging materials"> Packaging materials </option>
                                        <option name="description[]" value="For subcon"> For subcon </option>
                                        <option name="description[]" value="For repair"> For repair </option>
                                        <option name="description[]" value="For Failure analysis"> For Failure analysis </option>
                                        <option name="description[]" value="Return to Vendor"> Return to Vendor </option>
                                        <option name="description[]" value="Back to Origin"> Back to Origin </option>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td ><input class="form-control input-required" type="text" name="HSCODE[]" placeholder="HS Code"></td>
                                <td>&nbsp;</td>
                                <td ><input class="form-control input-required" type="number" name="quantity[]" placeholder="Quantity"></td>
                                <td>&nbsp;</td>
                                <td><input class="form-control input-required" type="text" name="UOM[]" placeholder="Unit Of Measure"></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="text-right">
                    <button type="button" class="btn btn-danger btn-number" title="Remove" data-type="minus" onClick="deleteRow('dataTable')">
                        <span class="glyphicon glyphicon-minus-sign"></span>
                    </button>

                    <button type="button" class="btn btn-success btn-number" data-type="plus" onClick="addRow('dataTable')">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                    </button>
                </div>
                <br>
                <div class="text-right">
                    <hr>
                    <td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td>
                </div>

            </form>


			<?php
			}else{
					echo $disp_success;
				}	
			?>
		</div>
		<br>
<!-- General -->
	</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<script type="text/javascript" src="js/importables.js"></script>