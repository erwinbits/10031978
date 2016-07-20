<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

	use Functions\eZTD;

	$message = false;

	if($_POST){
		$itemCode = $_POST['itemCode'];
		$quantity = $_POST['quantity'];
		$UOM = $_POST['UOM'];
		$sourceOfGoods = $_POST['sourceOfGoods'];
		$unitPrice = $_POST['unitPrice'];
		$totalValue = $_POST['totalValue'];
		$eLOAno = $_POST['eLOAno'];
		$LOAValidity = $_POST['LOAValidity'];
		$description = $_POST['description'];
		
		$eZTD = new eZTD;
		$result = $eZTD->addeLOA($description, $itemCode, $quantity, $UOM, $sourceOfGoods, $unitPrice, $totalValue, $eLOAno, $LOAValidity);

		if($result){
			echo "<center><br><br><br><h1>Thank you for using e-ZTS!<h1></center><br>
			<center><h4>Your Item/s has been successfully added!.</h4></center><br>";			
			$msg = true;

			}else{
				echo "Error adding items!";
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

            <h2>e-LOA Form</h2>
            <hr>
			<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="" method="POST">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>ELSE INFORMATION</strong></div>
                    <div class="panel-body">
                        <table style="margin:0 auto;">


                            <div class="form-group">
                                <label class="control-label col-sm-3" >LOA Number </label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="e-LOA Number is Auto-Generated" readonly >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Application Number </label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="Application Number is Auto-Generated" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >LOA Validity </label>
                                <div class="col-sm-8">
                                    <input class='form-control' type='text' name='LOAValidity' id='calendar' placeholder='After 1 year' value=''>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-3" >Logistics Enterprise</label>
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
                                <label class="control-label col-sm-3" >Zone Location</label>
                                <div class="col-sm-8">
                                    <select class="form-control input-required" type="text" name="ELSEzone" placeholder="Choose Here">
                                        <option name="" value=""> -Choose Here- </option>
                                        <option name="ELSEzone" value="zone 1"> Zone 1 </option>
                                        <option name="ELSEzone" value="zone 2"> Zone 2 </option>
                                        <option name="ELSEzone" value="zone 3"> Zone 3 </option>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label col-sm-3" >Source of Goods </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="SourceOfGoods" placeholder="Select">
                                        <option value=""> Select </option>
                                        <option name="SourceOfGoods" value="direct">Direct Import</option>
                                        <option name="SourceOfGoods" value="indirect">Indirect Import</option>
                                        <option name="SourceOfGoods" value="indirect">Domestic Enterprise</option>
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
                                <label class="control-label col-sm-3" >Name of Consignee</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="Name of Consignee"  name="ConsigneeName" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Zone Location</label>
                                <div class="col-sm-8">
                                    <select class="form-control input-required" type="text" name="ConsigneeZone" placeholder="Choose Here">
                                        <option name="" value=""> -Choose Here- </option>
                                        <option name="ConsigneeZone" value="zone 1"> Zone 1 </option>
                                        <option name="ConsigneeZone" value="zone 2"> Zpne 2 </option>
                                        <option name="ConsigneeZone" value="zone 3"> Zone 3 </option>
                                    </select>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>SURETY BOND DETAILS</strong></div>
                    <div class="panel-body">
                        <table style="margin:0 auto;">

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Surety Bond Company</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="Surety Bond Company"  name="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Surety Bond Value</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="Surety Bond Value"  name="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Surety Bond Reference Number</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="Surety Bond Reference Number"  name="" >
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
                                <td><input class="form-control input-required" type="text" name="itemCode[]" placeholder="Item Code"></td>
                                <td>&nbsp;</td>
                                <td style="width:165px;">
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
                                <td><input class="form-control input-required" type="text" name="HSCODE[]" placeholder="HS Code"></td>
                                <td>&nbsp;</td>
                                <td ><input class="form-control input-required" type="text" name="quantity[]" placeholder="Quantity"></td>
                                <td>&nbsp;</td>
                                <td><input class="form-control input-required" type="text" name="UOM[]" placeholder="Unit of Measure"></td>
                                <td>&nbsp;</td>
                                <td><input class="form-control input-required" type="text" name="unitPrice[]" placeholder="Unit Price"></td>
                                <td>&nbsp;</td>
                                <td><input class="form-control input-required" type="text" name="totalValue[]" placeholder="Tot.Value"></td>
                                <td>&nbsp;</td>
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



	<!--Page Content-->
<!-- 	<div id="page-wrapper">
		<div class="container-fluid">
			<form class="form-horizontal" id="eLOAForm" name="eLOAForm" action="" method="POST">
				<br>
				<br>
				<div class="panel panel-default"> -->
	
					<!-- PANEL HEADING -->
					<!-- <div class="panel-heading text-center">
						<strong>eLOA Form</strong>
					</div> -->

					<!-- PANEL BODY -->
					<!-- <div class="panel-body"> -->
					<!-- TABLE -->
						<!-- <table style="margin:0 auto;">
						<tr>
							<td align="right">Application Number *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
							<td><input class="form-control input-required" type="text" name="Appno" ></td>
						</tr>
							<td>&nbsp;</td>
						<tr>
							<td align="right">Item Description *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
							<td><input class="form-control input-required" type="text" name="itemDesc" ></td>
						</tr>
							<td>&nbsp;</td>
						<tr>
							<td align="right">Item Code *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
							<td><input class="form-control input-required" type="text" name="itemCode"></td>
						</tr>
							<td>&nbsp;</td>
						<tr>
							<td align="right">Quantity *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
							<td><input class="form-control input-required" type="text" name="quantity" value=""></td>
						</tr>
							<td>&nbsp;</td>
						<tr>
							<td align="right">Unit of Measurement &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
							<td><input class="form-control" type="text" name="UOM" value=""></td>
						</tr>
							<td>&nbsp;</td>
						<tr>
							<td align="right">Source of Goods *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
							<td><input class="form-control input-required input-number" type="text" name="sourceOfGoods" value=""></td>
						</tr>
							<td>&nbsp;</td>
						<tr>
							<td align="right">Unit Price *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
							<td><input class="form-control input-required input-contact-number" type="text" name="unitPrice" value=""></td>
						</tr>
							<td>&nbsp;</td>
						<tr>
							<td align="right">Total Value &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
							<td><input class="form-control input-contact-number" type="text" name="totalValue" value=""></td>
						</tr>
						</table>
					</div> -->

					<!-- PANEL FOOTER -->
				<!-- 	<div class="panel-footer">
						<div class="text-right">
							<input type="submit" class="btn btn-primary" name="submit" value="Submit">
							<input type="hidden" name="status" value="0">
						</div>
					</div>
				</div>
			</form>
		</div> -->
<!-- General -->
	<!-- </div> -->

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<script type="text/javascript" src="js/importables.js"></script>
<script type="text/javascript" src="js/datepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>