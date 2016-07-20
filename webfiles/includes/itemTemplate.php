<script id="template" type="text/template">
	<td>
		<small>Item Name</small>
		<input class="form-control input-required" type="text" name="itemName[]" placeholder="Item Name" required><br>
		<small>Item Description</small>
		<select class="form-control input-required" type="text" name="description[]" placeholder="Description" required>
			<option name="" value=""> -Description- </option>
			
			<option name="description[]" value="Raw Materials"> Raw materials </option>
			<option name="description[]" value="Equipment"> Equipment </option>
			<option name="description[]" value="Equipment part"> Equipment part</option>
			<option name="description[]" value="Chemical"> Chemical </option>
			<option name="description[]" value="Resin"> Resin </option>
			<option name="description[]" value="Software"> Software </option>
			<option name="description[]" value="System"> System </option>
			<option name="description[]" value="Consumables for Production"> Consumables for Production </option>
			<option name="description[]" value="Tools"> Tools </option> 
		</select>

		<br>
		<small>Item Code</small>
		<input class="form-control input-required" type="text" name="itemCode[]" placeholder="Item Code" required>

	</td>	
	
	<td>
		<small>HS Code</small>
		<input id="hscode" class="hscode form-control" type="text" placeholder="Type product name/code here" name="HSCODE[]" required/><br>
		<small>Tar Extension</small>
		<input class="tar_ext form-control" type="text" name="TAR_Ext[]" required readonly tabindex="-1"/ ><br>
		<small>Tar Description</small>
		<input class="tar_desc form-control" type="text" name="TAR_DSC[]" required readonly tabindex="-1"/ >
	</td>
	
	
	
	<td>
		<small>Registered Activity</small>
		<select class="form-control input-required" type="text" name="regAct[]" placeholder="Reg. Activity" required>
			<option name='' value=''> -Registered Activity- </option><br>
			<?php

			foreach($userregisteredactivity as $data){
				echo "<option value='" . $data['activity'] . "'>" . $data['activity']  . "</option>";
			}

			echo '</select>';	
			?>
			<br>
			<small>Frequency</small>
			<select class="form-control input-required" type="text" name="frequency[]" placeholder="Frequency" required>
				<option name="" value=""> -Frequency- </option>
				<option name="frequency[]" value="As needed"> As needed </option>
				<option name="frequency[]" value="One-time"> One-time </option>
				<option name="frequency[]" value="Daily"> Daily </option>
				<option name="frequency[]" value="Regularly"> Regularly </option>
				<option name="frequency[]" value="Monthly"> Monthly </option>
				<option name="frequency[]" value="Quarterly"> Quarterly </option>
				<option name="frequency[]" value="Yearly"> Yearly </option>
			</select>
		</td>
		<td>
			<small>LOA Number</small>
			<input class="form-control input-required" type="text" name="LOANo[]" placeholder="LOA Number" required><br>
			<small>LOA Validity</small>
			<input class="form-control input-required" type="date" name="LOAValidity[]" placeholder="LOA Validity" required><br>
		</td>
		<td>
		<small>Quantity</small>
			<input type='number' step='1' min='0' class='form-control input-required' name='quantity[]' value=''  placeholder='Quantity' required>

			<br>
			<small>UOM</small>
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
			<br>
			<small>Package Type</small>
			<input type='text' class='form-control input-required' name='packType[]' value=''  placeholder='Package Type'>
			<br>
			<small>FOB Value</small>
			<input type='text' class='form-control input-required' name='FOBvalue[]' value='' placeholder='FOB value' required>


		</td>
		<td><a class="remScnt btn btn-danger btn-xs"><span title="Delete" class="glyphicon glyphicon-remove"></span></a></td>
	</script>