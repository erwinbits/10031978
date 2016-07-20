<?php
	use Functions\eZTD;
	use Functions\UserAccount;
	$eztd = new eZTD;
	$account = new UserAccount;
	
	$id = $_SESSION['userid'];
	$zcode = $eztd->getZone($id);
?>

<br>
<h2>e-IP Form</h2>
<hr>	
<form class="form-horizontal" id="eIPForm" name="eIPForm" action="eIPController2" method="POST">
		<?php $appno = "APIP-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");?>
		<?php $IPno = $zcode . '-'. rand(000000, 999999) . "-" . date('y') . "I"; ?>
		<div class="panel panel-default">
			<div class="panel-heading text-center"><strong>e-IP INFORMATION</strong></div>
			<div class="panel-body">
				<table style="margin:0 auto;">

					<div class="form-group">
						<label class="control-label col-sm-3" >Application Number </label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="<?php echo $appno?>" name="appno" readonly tabindex="-1">
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="control-label col-sm-3">BOC Reference Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="BOC Reference Number"  name="BOCrefno" required >
						</div>
					</div> -->

					 <div class="form-group">
						<label class="control-label col-sm-3">Import Permit Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="<?php echo $IPno; ?>" placeholder="Import Permit Number"  name="IPno" readonly>
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="control-label col-sm-3">Fee Paid</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Fee Paid"  name="paidFee" required >
						</div>
					</div>

					 <div class="form-group">
						<label class="control-label col-sm-3">Payment Reference Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Payment Reference Number"  name="paymentRefno" required >
						</div>
					</div>

					 <div class="form-group">
						<label class="control-label col-sm-3">Date of Payment</label>
						<div class="col-sm-8">
							<input class="form-control" type="date" value="" name="paymentDate" required>
						</div>
					</div> -->

					<div class="form-group">
						<label class="control-label col-sm-3">Name of Importer</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Importer's Name"  name="importersName" required >
						</div>
					</div>
					
					 <div class="form-group">
						<label class="control-label col-sm-3">TIN</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Tax Identification Number"  name="TIN" required >
						</div>
					</div>
						
					<div class="form-group">
						<label class="control-label col-sm-3">Zone Location</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Importer's Zone Location"  name="zoneLocation" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">C.R. Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="C.R. Number"  name="crno" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Name of Broker</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Broker's Name"  name="brokerName" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Name of Shipper</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Shipper's Name"  name="shipperName" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Address of Shipper</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Shipper's Address"  name="shipperAddress" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Country of Origin</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Country of the Origin"  name="countryOrigin" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Date of Departure</label>
						<div class="col-sm-8">
							<input class="form-control" type="date" value="" name="departureDate" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Port of Discharge</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Port of Discharge"  name="portDischarge" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Date of Arrival</label>
						<div class="col-sm-8">
							<input class="form-control" type="date" value="" name="arrivalDate" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">P.O. Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="P.O. Number"  name="POno" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Invoice Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Invoice Number"  name="invoiceno" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Total Value</label>
						<div class="col-sm-8">
							<input class="form-control" type="number" value=""  name="totalValue" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Total Weight</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" placeholder="Total Weight"  name="totalWeight" required >
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
							<th>Description</th>
							<th>HSCODE</th>
							<th>Item Code</th>
							<th></th>
							<th>Quantity</th>
							<th>Unit of Measure</th>
							<th>Package Type</th>
							<th>Value</th>
							<th>LOA Number</th>
							<th>LOA Validity</th>
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

								<td width='150px'><input class='form-control input-required' type='text' name='description[]' value='$value[0]' readonly tabindex='-1'></td>
								
								<td width='150px'><input class='form-control input-required' type='text' name='hsCode[]' value='$value[1]' tabindex='-1'></td>
								
								<td><input class='form-control input-required' type='text' name='itemCode[]' value='$value[2]' readonly tabindex='-1'></td>
								
								<td><input type='hidden' name='itemID[]' value='$value[3]' readonly tabindex='-1'></td>
								
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
								
								<td><input type='text' class='form-control input-required' name='packType[]' value=''  placeholder='Package Type' required></td>
								
								<td><input type='text' class='form-control input-required' name='FOBvalue[]' value='' placeholder='FOB value' required></td>

								<td><input type='text' class='form-control input-required' name='LOANumber[]' value='' placeholder='LOA Number' required></td>

								<td><input type='date' class='form-control input-required' name='LOAValidity[]' value='' placeholder='LOA Validity' required></td>
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