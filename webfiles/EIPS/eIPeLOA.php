<?php 


use Functions\eZTD;

$eztd = new eZTD;
$id = $_SESSION['userid'];
	
	$result = $eztd->ListClientInfo($id);
    foreach ($result as $data){
        $ELSEname = $data['company_name'];
        $ZoneLoc = $data['ZONE_CODE'];
        //$procurement = $data['procurement'];
        $CEcltcode = $data['cltcode'];
        $ecertno = "ELSE-" . $ZoneLoc . '-EC-' . rand(000000, 999999) ."-" . date('y') . "-" . '16A';
		$PEZACORNo = $data['PEZACORNo'];
		$clientid = $data['id'];
		$TIN = $data['TIN'];
    }
?>
<br>
<h2>e-LOA Form</h2>
<hr>

	<?php $appno = "APLOA-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y"); ?>
	<div class="panel panel-default">
	<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="eLOAController" method="POST">
		<div class="panel-heading text-center"><strong>LOA INFORMATION</strong></div>
		<div class="panel-body">
			<table style="margin:0 auto;">

				<div class="form-group">
					<label class="control-label col-sm-3" >Application Number </label>
					<div class="col-sm-8">
						<input class="form-control" type="text" value="<?php echo $appno; ?>" readonly>
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
							<option name="transaction_type" value="Indirect Export"> Indirect Export </option>
							<option name="transaction_type" value="Storage and Retrieval"> Storage and Retrieval</option>
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
						<input class="form-control" type="text" value="<?php echo $id; ?>"  name="ConsigneeName" readonly tabindex="-1">
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-3" >Zone Location</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" value="<?php echo $ZoneLoc; ?>"  name="ConsigneeZone" readonly tabindex="-1">
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-3" >Procurement</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" value=""  name="procurement" tabindex="-1">
					</div>
				</div>
			</table>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
		<div class="panel-body">
			<table id="table" class="table table-striped table-hover text-center" style="margin:0 auto;">
				<thead>
					<tr>
						<th>Item ID</th>
						<th>Item Code</th>
						<th>Description</th>
						<th>HSCODE</th>
						<th>Quantity</th>
						<th>Unit of Measure</th>
						<th>Unit Price (USD)</th>
					   <th></th>
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
							<td><input class='form-control input-required' type='text' name='ItemID[]' value='$value[3]' readonly tabindex='-1'></td>
							
							<td><input class='form-control input-required' type='text' name='itemCode[]' value='$value[2]' readonly tabindex='-1'></td>
						   
							<td width='150px'><input class='form-control input-required' type='text' name='description[]' value='$value[0]' readonly tabindex='-1'></td>
						   
							<td width='150px'><input class='form-control input-required' type='text' name='HSCODE[]' value='$value[1]' readonly tabindex='-1'></td>
						   
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
							
							<td><input class='form-control' type='number' name='unitPrice[]' value='' placeholder='USD' required></td>
						   
							<td><input class='form-control' type='hidden' name='totalValue[]' value='' placeholder='Total Value' tabindex='-1' readonly></td>
						</tr>";
					}
				}
				?>
			</table>
		</div>
	</div>

	<div class="form-group text-right">
	<hr>
		<button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Please review the details of your submission. If all is well, please click OK.')" <?php if(!isset($_POST['chk'])){echo 'disabled';}?>>Submit</button>
		<input type="hidden" name="appno" value="<?php echo $appno;?>">
		<input type="hidden" name="TIN" value="<?php echo $TIN; ?>">
		<input type="hidden" name="ELSEname" value="<?php echo $ELSEname; ?>">
		<input type="hidden" name="ELSEzone" value="<?php echo $ZoneLoc; ?>">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="CEcltcode" value="<?php echo $CEcltcode; ?>">
		<input type="hidden" name="ecertno" value="<?php echo $ecertno?>">
		<input type="hidden" name="appno" value="<?php echo $appno; ?>">
		<input type="hidden" name="PEZACORNo" value="<?php echo $PEZACORNo; ?>">
		<input type="hidden" name="clientid" value="<?php echo $clientid; ?>">
	</div>
