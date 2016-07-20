<?php
	use Functions\eIP;
	use Functions\eZTD;
	use Functions\UserAccount;
	
	$eip = new eIP;
	$eztd = new eZTD;
	$account = new UserAccount;
	
	$id = $_SESSION['userid'];
	$zcode = $eztd->getZone($id);



?>
<!-- JS -->

<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sb-admin-2.js" rel="stylesheet"></script>
<script src="js/metisMenu.min.js"></script>

<!-- AUTOPOPULATE -->
<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/jquery-ui.js"></script>
<script src="js/hscodeautocom.js"></script>


<script type="text/javascript">
	$(document).ready(function () {
		
toggleFields();
$('[name=expressForm]').change(function () {
	
toggleFields();

});

});
function toggleFields() {
	
	if ($('[name=expressForm]').is(':checked'))
	{	
		console.log("yes");
		$("#appno").show();
		$("#clientName").show();
		$("#clientTIN").show();
		$("#consigneeTIN").show();
		$("#consigneeName").show();
		$("#BOCrefno").show();
		$("#zoneLocation").show();
		$("#IPno").show();
		$("#portOforigin").show();
		$("#purposeImport").show();
		$("#paymentProcedure").show();
		$("#manifestNo").show();
		$("#departureDate").show();
		$("#arrivalDate").show();
		$("#modeOfTransport").show();
		$("#countryOrigin").show();
		$("#deliveryRemarks").show();
		$("#additionalRemarks").show();
		$("#internalRef").show();
		$("#otherCost").show();
		$("#shipperName").show();
		$("#shipperAddress").show();
		$("#brokerName").show();
		$("#brokerAddress").show();
		$("#brokersTIN").show();
		$("#totalValue").show();
		
		$("#BOCrefno").hide();
		$("#OfcClearance").hide();
		$("#tentativeRelease").hide();
		$("#cargo").hide();
		$("#registryNo").hide();
		$("#carrier").hide();
		$("#entryNo").hide();
		$("#transshipmentPort").hide();
		$("#locationOfGoods").hide();
		$("#appType").hide();
		$("#agency").hide();
		$("#AirBill").hide();
		$("#importTo").hide();
		$("#countryOfOrigin").hide();
		$("#paymentRefno").hide();
		$("#CountryOfExport").hide();
		$("#portOfDestination").hide();
		$("#portOfDestination").hide();
		$("#paymentDate").hide();
		$("#crno").hide();
		$("#portDischarge").hide();
		$("#POno").hide();
		$("#invoiceno").hide();
		$("#totalWeight").hide();
	}
	else
	{	
		$("#appno").show();
		$("#clientName").show();
		$("#clientTIN").show();
		$("#consigneeTIN").show();
		$("#consigneeName").show();
		$("#BOCrefno").show();
		$("#zoneLocation").show();
		$("#IPno").show();
		$("#portOforigin").show();
		$("#purposeImport").show();
		$("#paymentProcedure").show();
		$("#manifestNo").show();
		$("#departureDate").show();
		$("#arrivalDate").show();
		$("#modeOfTransport").show();
		$("#countryOrigin").show();
		$("#deliveryRemarks").show();
		$("#additionalRemarks").show();
		$("#internalRef").show();
		$("#otherCost").show();
		$("#shipperName").show();
		$("#shipperAddress").show();
		$("#brokerName").show();
		$("#brokerAddress").show();
		$("#brokersTIN").show();

		$("#OfcClearance").show();
		$("#tentativeRelease").show();
		$("#cargo").show();
		$("#registryNo").show();
		$("#carrier").show();
		$("#entryNo").show();
		$("#transshipmentPort").show();
		$("#locationOfGoods").show();
		$("#appType").show();
		$("#agency").show();
		$("#AirBill").show();
		$("#importTo").show();
		$("#countryOrigin").show();
		$("#paymentRefno").show();
		$("#CountryOfExport").show();
		$("#portOfDestination").show();
		$("#paymentDate").show();
		$("#crno").show();
		$("#portDischarge").show();
		$("#POno").show();
		$("#invoiceno").show();
		$("#totalValue").show();
		$("#totalWeight").show();
	}
}

</script>

<br>
<h2>e-IP Form</h2>
<hr>	
<form class="form-horizontal" id="eIPForm" name="eIPForm" action="eIPController" method="POST">
		<?php $appno = "APIP-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");?>
		<?php $IPno = $zcode . '-'. rand(000000, 999999) . "-" . date('y') . "I"; ?>
		<H1>e-Import Permit Application Form</H1>
		<hr>
		<div class="panel panel-default">
			<div class="panel-heading text-center"><strong>PERSONAL INFORMATION</strong></div>
			<div class="panel-body">

				<table style="margin:0 auto;">
				
					<div id="expressForm" class="form-group">
						<label class="control-label col-sm-3">eIP Express Form</label>
						<div class="col-sm-8">
							<input type="checkbox" value="checked" name="expressForm">
						</div>
					</div>
					<br><br>
				
					<div id="appno" class="form-group">
						<label class="control-label col-sm-3" >Application Number </label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="<?php echo $appno?>" name="appno" readonly tabindex="-1">
						</div>
					</div>
				
					<div id="clientName" class="form-group">
						<label class="control-label col-sm-3">Client Name</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="clientName" placeholder="Client Name" value="">
						</div>
					</div>
					
					<div id="clientTIN" class="form-group">
						<label class="control-label col-sm-3">Client TIN</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" maxlength="12" placeholder="TIN" name="clientTIN" value="" >
						</div>
					</div>
					
					<div id="appType" class="form-group">
						<label class="control-label col-sm-3">Application Type</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="appType" placeholder="Application Type">
						</div>
					</div>
					
					<div id="agency" class="form-group">
						<label class="control-label col-sm-3">Agency</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="agency" placeholder="Agency">
						</div>
					</div>
					<br>
					
					<!--PEZA Import PErmit-->
					<div id="consigneeTIN" class="form-group">
						<label class="control-label col-sm-3">Consignee TIN</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" maxlength="12" name="consigneeTIN" placeholder="Consignee TIN">
						</div>
					</div>
					
					<div id="consigneeName" class="form-group">
						<label class="control-label col-sm-3">Consignee Name</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="consigneeName" placeholder="Consignee Name">
						</div>
					</div>
					<br>
					
					<div id="consigneeName" class="form-group">
						<label class="control-label col-sm-3">BOC Reference No.</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="BOCrefno" placeholder="BOC Reference Number">
						</div>
					</div>
					<br>

					<div id="AirBill" class="form-group">
						<label class="control-label col-sm-3">AirBill/BOL</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="AirBill"  name="AirBill" placeholder="Air Bill">
						</div>
					</div>
					<br>
					
					<div id="zoneLocation" class="form-group">
						<label class="control-label col-sm-3">Zone Location</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Importer's Zone Location"  name="zoneLocation" placeholder="Zone Location" required >
						</div>
					</div>
					
					<div id="IPno" class="form-group">
						<label class="control-label col-sm-3">IP Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="<?php echo $IPno; ?>" placeholder="Import Permit Number"  name="IPno" readonly>
						</div>
					</div>
					
					<div id="importTo" class="form-group">
						<label class="control-label col-sm-3">Import Permit to</label>
						<div class="col-sm-8">
							<input class="form-control" type="text"  name="importTo" readonly >
						</div>
					</div>
					<br> 
					
					<div id="countryOrigin" class="form-group">
						<label class="control-label col-sm-3">Country of Origin</label>
						<div class="col-sm-8">
							<select class="form-control" name="countryOrigin" placeholder="Country of Origin">
								<option name=""></option>
							</select>
						</div>
					</div>
					
					<div id="portOforigin" class="form-group">
						<label class="control-label col-sm-3">Port Entry</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="portOforigin" placeholder="Port of Origin" required >
						</div>
					</div>
					
					<div id="paymentRefno" class="form-group">
						<label class="control-label col-sm-3">Payment Reference Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Payment Reference Number"  name="paymentRefno">
						</div>
					</div>

					<div id="paymentDate" class="form-group">
						<label class="control-label col-sm-3">Date of Payment</label>
						<div class="col-sm-8">
							<input class="form-control" type="date" value="" name="paymentDate">
						</div>
					</div>

					<div id="departureDate" class="form-group">
						<label class="control-label col-sm-3">Date of Departure</label>
						<div class="col-sm-8">
							<input class="form-control" type="date" value="" name="departureDate" required >
						</div>
					</div>
					
					<div id="arrivalDate" class="form-group">
						<label class="control-label col-sm-3">Date of Arrival</label>
						<div class="col-sm-8">
							<input class="form-control" type="date" value="" name="arrivalDate" required >
						</div>
					</div>
					<br>
					
					<div id="modeOfTransport" class="form-group">
						<label class="control-label col-sm-3">Mode of Transport</label>
						<div class="col-sm-8">
							<select class="form-control" name="modeOfTransport" placeholder="Mode of Transport">
								<option name="SEA">SEA</option>
								<option name="AIR">AIR</option>
							</select>
						</div>
					</div>
					
					<div class="panel-heading text-center"><strong>Shipper/Supplier Information</strong></div>
					
					<div id="shipperName" class=" form-group">
						<label class="control-label col-sm-3">Name of Shipper</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Shipper's Name"  name="shipperName" required>
						</div>
					</div>
					
					<div id="shipperAddress" class="form-group">
						<label class="control-label col-sm-3">Address of Shipper</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Shipper's Address"  name="shipperAddress" required>
						</div>
					</div>
					
					<div class="panel-heading text-center"><strong>Broker Att. - in Fact Information</strong></div>
					
					<div id="brokerName" class="form-group">
						<label class="control-label col-sm-3">Name of Broker</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Broker's Name"  name="brokerName" required >
						</div>
					</div>
					
					<div id="brokerAddress" class="form-group">
						<label class="control-label col-sm-3">Broker Address</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Broker's Address"  name="brokerAddress" required>
						</div>
					</div>
					
					<div id="brokersTIN" class="form-group">
						<label class="control-label col-sm-3">Broker's TIN</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Broker Tax Identification Number" maxlength="12" name="brokersTIN" required >
						</div>
					</div>
					<br>
					
					<div id="crno" class="form-group">
						<label class="control-label col-sm-3">C.R. Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="C.R. Number"  name="crno">
						</div>
					</div>
					
					<div id="portDischarge" class="form-group">
						<label class="control-label col-sm-3">Port of Discharge</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Port of Discharge"  name="portDischarge">
						</div>
					</div>
					
					<div id="POno" class="form-group">
						<label class="control-label col-sm-3">P.O. Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="P.O. Number"  name="POno">
						</div>
					</div>
					
					<div id="invoiceno" class="form-group">
						<label class="control-label col-sm-3">Invoice Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Invoice Number"  name="invoiceno">
						</div>
					</div>
					
					<div id="totalValue" class="form-group">
						<label class="control-label col-sm-3">Total Value</label>
						<div class="col-sm-8">
							<input class="form-control" type="number" value=""  placeholder="Total Value" name="totalValue">
						</div>
					</div>
					
					<div id="totalWeight" class="form-group">
						<label class="control-label col-sm-3">Total Weight</label>
						<div class="col-sm-7">
							<input class="form-control" type="number" value="" placeholder="Total Weight"  name="totalWeight">
						</div>
						<strong>KG</strong>
					</div>
					<br><br>
					
					<div id="OfcClearance" class="form-group">
						<label class="control-label col-sm-3">Office Of Clearance</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Office Of Clearance" name="OfcClearance" value="">
						</div>
					</div>
					
					<div id="purposeImport" class="form-group">
						<label class="control-label col-sm-3">Purpose of Importation</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Purpose of Importation" name="purposeImport">
						</div>
					</div>
					
					<div id="paymentProcedure" class="form-group">
						<label class="control-label col-sm-3">Payment Procedure</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Payment Procedure" name="paymentProcedure">
						</div>
					</div>
					
					<div id="manifestNo" class="form-group">
						<label class="control-label col-sm-3">Manifest Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Manifest Number" name="manifestNo">
						</div>
					</div>
					
					<div id="tentativeRelease" class="form-group">
						<label class="control-label col-sm-3">Tentative Release</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Tentative Release" name="tentativeRelease">
						</div>
					</div>
					
					<div id="cargo" class="form-group">
						<label class="control-label col-sm-3">Vessel/Aircraft ID</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Cargo" name="cargo">
						</div>
					</div>
					
					<div id="registryNo" class="form-group">
						<label class="control-label col-sm-3">Registry No</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Registry Number" name="registryNo">
						</div>
					</div>
					
					<div id="carrier" class="form-group">
						<label class="control-label col-sm-3">Local Carrier</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Local Carrier" name="carrier">
						</div>
					</div>
					
					<div id="CountryOfExport" class="form-group">
						<label class="control-label col-sm-3">Country Of Export</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Country of Export" name="CountryOfExport">
						</div>
					</div>
					
					<div id="entryNo" class="form-group">
						<label class="control-label col-sm-3">Entry No</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Entry Number" name="entryNo">
						</div>
					</div>
					
					<div id="transshipmentPort" class="form-group">
						<label class="control-label col-sm-3">Transshipment Port</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Trans Shipment Port" name="transshipmentPort">
						</div>
					</div>
					
					<div id="portOfDestination" class="form-group">
						<label class="control-label col-sm-3">Port Of Destination</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Port of Destination" name="portOfDestination">
						</div>
					</div>
					
					<div id="locationOfGoods" class="form-group">
						<label class="control-label col-sm-3">Location Of Goods</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Location of Goods" name="locationOfGoods">
						</div>
					</div>
					
					<div id="additionalRemarks" class="form-group">
						<label class="control-label col-sm-3">Additional Remarks</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Additional Remarks" name="additionalRemarks">
						</div>
					</div>
					
					<div id="deliveryRemarks" class="form-group">
						<label class="control-label col-sm-3">Delivery Remarks</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Delivery Remarks" name="deliveryRemarks">
						</div>
					</div>
					
					<div id="internalRef" class="form-group">
						<label class="control-label col-sm-3">Internal Reference</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Internal Reference" name="internalRef">
						</div>
					</div>
					
					<div id="otherCost" class="form-group">
						<label class="control-label col-sm-3">Other Cost</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Other Cost" name="otherCost">
						</div>
					</div>
				</table>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
			<div class="panel-body">
				<table id="dataTable" class="table table-striped table-hover text-center" style="margin:0 auto;">
					<thead>
						<tr>
							<th></th>
							<th>LOAno</th>
							<th>LOAValidity</th>
							<th>Description</th>
							<th>HSCODE</th>
							<th>Item Code</th>
							<th></th>
							<th>Quantity</th>
							<th>Unit of Measure</th>
							<th>Package Type</th>
							<th>Value</th>
							<th>Item Category</th>
						</tr>
					</thead>
				   
					<?php

					if(isset($_POST['chk']))
					{
					   $data = $_POST['chk'];
					   $value = explode("|",$data[0]);
					   foreach($data as $data2)
					   {
							$value = explode("|",$data2);

						   echo "<tr>
								<td><input type='checkbox' name='chk[]' tabindex='-1'></td>
								
								<td width='120px'><input class='form-control input-required' type='text' name='LOAno[]' value='' required></td>
								
								<td width='90px'><input class='form-control input-required' type='date' name='LOAValidity[]' value='' required></td>

								<td width='130px'><input class='form-control input-required' type='text' name='description[]' value='$value[0]' readonly></td>
								
								<td width='100px'><input class='form-control input-required' type='text' name='hsCode[]' value='$value[1]'></td>
								
								<td><input class='form-control input-required' type='text' name='itemCode[]' value='$value[2]' readonly></td>
								
								<td><input type='hidden' name='itemID[]' value='$value[3]' readonly></td>
								
								<td><input type='number' step='1' min='0' class='form-control input-required' name='quantity[]' value=''  placeholder='Quantity' required></td>
								
								<td>
									<select class='form-control input-required' type='text' name='UOM[]' placeholder='Please select' required>
									<option name='' value=''> -UOM- </option>
									<option name='UOM[]' value='ampoule'> ampoule </option>
									<option name='UOM[]' value='angstroms'> angstroms </option>
									<option name='UOM[]' value='assembly'> assembly </option>
									<option name='UOM[]' value='barns'> barns </option>
									<option name='UOM[]' value='barrels'> barrels </option>
									<option name='UOM[]' value='base box'> base box </option>
									<option name='UOM[]' value='bushels'> bushels </option>
									<option name='UOM[]' value='carats'> carats </option>
									<option name='UOM[]' value='centilitres'> centilitres </option>
									<option name='UOM[]' value='centimetres'> centimetres </option>
									<option name='UOM[]' value='chains'> chains </option>
									<option name='UOM[]' value='circular inches'> circular inches </option>
									<option name='UOM[]' value='circular mils'> circular mils </option>
									<option name='UOM[]' value='cubic feet'> cubic feet </option>
									<option name='UOM[]' value='cubic inches'> cubic inches </option>
									<option name='UOM[]' value='cubic metres'> cubic metres </option>
									<option name='UOM[]' value='cubic yards'> cubic yards </option>
									<option name='UOM[]' value='decilitres'> decilitres </option>
									<option name='UOM[]' value='dozen'> dozen </option>
									<option name='UOM[]' value='feet'> feet </option>
									<option name='UOM[]' value='fluid ounces'> fluid ounces </option>
									<option name='UOM[]' value='furlongs'> furlongs </option>
									<option name='UOM[]' value='gallons'> gallons </option>
									<option name='UOM[]' value='gills'> gills </option>
									<option name='UOM[]' value='grains'> grains </option>
									<option name='UOM[]' value='gram'> gram </option>
									<option name='UOM[]' value='inches'> inches </option>
									<option name='UOM[]' value='kilograms'> kilograms </option>
									<option name='UOM[]' value='kit'> kit </option>
									<option name='UOM[]' value='litres'> litres </option>
									<option name='UOM[]' value='metres'> metres </option>
									<option name='UOM[]' value='miles'> miles </option>
									<option name='UOM[]' value='milligrams'> milligrams </option>
									<option name='UOM[]' value='millilitres'> millilitres </option>
									<option name='UOM[]' value='millimetres'> millimetres </option>
									<option name='UOM[]' value='nanometres'> nanometres </option>
									<option name='UOM[]' value='newtons'> newtons </option>
									<option name='UOM[]' value='ounces'> ounces </option>
									<option name='UOM[]' value='pad'> pad </option>
									<option name='UOM[]' value='panel'> panel </option>
									<option name='UOM[]' value='peck'> peck </option>
									<option name='UOM[]' value='pieces'> pieces </option>
									<option name='UOM[]' value='pints'> pints </option>
									<option name='UOM[]' value='pounds'> pounds </option>
									<option name='UOM[]' value='quart'> quart </option>
									<option name='UOM[]' value='slugs'> slugs </option>
									<option name='UOM[]' value='square cm'> square cm </option>
									<option name='UOM[]' value='square feet'> square feet </option>
									<option name='UOM[]' value='square inches'> square inches </option>
									<option name='UOM[]' value='square metres'> square metres </option>
									<option name='UOM[]' value='square mm'> square mm </option>
									<option name='UOM[]' value='square yards'> square yards </option>
									<option name='UOM[]' value='stones'> stones </option>
									<option name='UOM[]' value='strand'> strand </option>
									<option name='UOM[]' value='strip'> strip </option>
									<option name='UOM[]' value='tonnes'> tonnes </option>
									<option name='UOM[]' value='tons'> tons </option>
									<option name='UOM[]' value='troy ounces'> troy ounces </option>
									<option name='UOM[]' value='units'> units </option>
									<option name='UOM[]' value='vial'> vial </option>
									<option name='UOM[]' value='yards'> yards </option>
									</select>   
								</td>
								
								<td><input type='text' class='form-control input-required' name='packType[]' value=''  placeholder='Package Type'></td>
								
								<td><input type='text' class='form-control input-required' name='FOBvalue[]' value='' placeholder='FOB value' required></td>
								
								<td><input class='form-control input-required' type='text' name='itemCategory[]' value='$value[4]' readonly></td>

							</tr>";
						}
					}else
					{
						echo  "<div class='alert alert-danger' role='alert'><strong>Oh No!</strong> Please go back and <a href='/eIP'>SELECT ITEMS</a> before applying for an e-Cert</div>";
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
		  
			<button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Please review the details of your submission. If all is well, please click OK.')" <?php if(!isset($_POST['chk'])){echo 'disabled';}?>>Submit</button>
			<input type="hidden" name="appno" value="<?php echo $appno;?>">
		</div>
	</form>
</div>
<!-- General -->
	</div>