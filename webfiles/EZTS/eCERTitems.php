<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!-- FORM -->
	<!--Page Content-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<br>
            <h2>e-Certificate Form Data</h2>
            <hr>
			<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="eCertController" method="POST">
                
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
                                <label class="control-label col-sm-3" >Tax Identification Number </label>
                                <div class="col-sm-8">
                                    <input class="form-control" pattern="[0-9]{12}" maxlength="12" type="text" value="" placeholder="Tax Identification Number"  name="TIN" >
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
                                <label class="control-label col-sm-3" >Procurement </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="procurement" placeholder="Select">
                                        <option value=""> Select </option>
                                        <option name="procurement" value="Direct Import">Direct Import</option>
                                        <option name="procurement" value="Indirect Import">Indirect Import</option>
                                        <option name="procurement" value="Domestic Enterprise">Domestic Enterprise</option>
                                    </select>
                                </div>
                            </div>
                   
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover text-center" style="margin:0 auto;">
                       
                            <thead>
                                <tr>
                                    <th>Specific Description</th>
                                    <th>General Description</th>
                                    <th>HSCODE</th>
                                    <th>TAR Ext</th>
                                    <th>Item Code</th>
                                    <th>Quantity</th>
                                    <th>Unit of Measure</th>
                                </tr>
                            </thead>
                           
                            <?php

                               // $data = $_GET['ecertno'];
                               // $value = explode("|",$data[0]);
                               //     foreach($data as $data2){
                               //     $value = explode("|",$data2);

                            	$data = new eZTD;
                            	$view = $data->eCERTitems();

                            	foreach ($view as $value) {
                            		$genDesc = $value['genDesc'];
                            		$itemCode = $value['itemCode'];
                            		$description = $value['description'];
                            		$HSCODE = $value['HSCODE'];
                            		$quantity = $value['quantity'];
                            		$UOM = $value['UOM'];
                            	


                               echo "<tr>
                                        <td width='170px'><input class='form-control input-required' type='text' name='genDesc[]' value='$genDesc' readonly></td>
                                        <td width='150px'><input class='form-control input-required' type='text' name='description[]' value='$description' readonly></td>
                                        <td width='150px'><input class='form-control input-required' type='text' name='HSCODE[]' value='$HSCODE' readonly></td>
                                        <td><input class='form-control input-required' type='text' name='itemCode[]' value='$itemCode' readonly></td>
                                        <td><input class='form-control input-required' type='text' name='quantity[]' value='$quantity' placeholder='Quantity'></td>
                                        <td><input class='form-control' type='text' name='UOM[]' value='$UOM' placeholder='Unit of Measure'></td> 
                                    </tr>";

                                }
                               ?>
                        </table>
                    </div>
                </div>

                <div class="form-group text-right">
                    <hr>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
			
		</div>
<!-- General -->
	</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>


<!-- JavaScript -->
<script src="/js/jquery-ui.js"></script>
<script src="/js/autocomplete.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">



