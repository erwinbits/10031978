<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

	use Functions\Importables;
	use Functions\DropDown;
	use Functions\UserAccount;

	$items = new Importables;

	$id = $_SESSION['userid'];

	$account = new UserAccount;
	$zone = $account->getCEzone($id);
	$userregisteredactivity = $account->getRegActivity($id);
	$cltcode = $account->getCompanyCode($id);
	
	if($_POST){
		$count = count($_POST['HSCODE']);
		for($i=0;$i<$count;$i++){
			
			$HSCODE = strtoupper($_POST['HSCODE'][$i]);
			$itemCode = strtoupper($_POST['itemCode'][$i]);
			$description = strtoupper($_POST['description'][$i]);
			$itemName = strtoupper($_POST['itemName'][$i]);
			$TAR_Ext = strtoupper($_POST['TAR_Ext'][$i]);
			$regAct = strtoupper($_POST['regAct'][$i]);
			$frequency = strtoupper($_POST['frequency'][$i]);
		
			$result = $items->addItem($HSCODE, $itemCode, $description, $itemName, $TAR_Ext, $regAct, $frequency, $zone, $cltcode);
		}
		//var_dump($_POST);
		if ($result){
			echo "<script type='text/javascript'>alert('Items Successfully Uploaded')</script>";
		}else{
			echo "<script type='text/javascript'>alert('failed!')</script>";
		}
	}
?>

<!-- CSS -->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- CSS -->

	<div id="page-wrapper">
		<div class="container-fluid">
			<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="" method="POST">
				<br>
				<br>
				<div class="panel panel-default">
					<!-- PANEL HEADING -->
					<div class="panel-heading">Add Item/s</div>

					<!-- PANEL BODY -->
					<div class="panel-body">
						<h3>Apply for an item to import</h3>
						<hr>
						<p>Please enter the details of the item you would like to apply for below.</p>
						<p>**Please take note that the HSCODES are autosuggested by the system. Please choose only from the list suggested and ensure all fields are complete before submitting.</p>

						<!--<p> To add another item, press the "+". To delete an item, tick the check box and press "-".</p>-->
						<br>
						<br>
					
						<!-- TABLE -->
    					<table>
							
							<thead>
								<th>#</th>
								<th>Item Name</th>
								<th>Description</th>
					            <th>HSCODE</th>
					            <th>Tar Ext</th>
					            <th>Tar Desc</th>
					            <th>Item Code</th>
					            <th>Reg. Activity</th>
					            <th>Frequency</th>
					           
					            <th>Actions</th>
							
							</thead>
							
							<tbody id="p_scents">
								<tr>
									<td>1</td>
									
									<td><input class="form-control input-required" type="text" name="itemName[]" placeholder="Item Name" required></td>
									
									<td>
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
									</td>	
									
									<td><input class="tar_desc form-control" type="text" placeholder="Type product name/code here" name="HSCODE[]" required/></td>
									
									<td><input class="tar_ext form-control" type="text" name="TAR_Ext[]" required readonly tabindex="-1"/ ></td>
									
									<td><input class="tar_desc form-control" type="text" name="TAR_DSC[]" required readonly tabindex="-1"/ ></td>
									
									<td><input class="form-control input-required" type="text" name="itemCode[]" placeholder="Item Code" required></td>
									
									<td><select class="form-control input-required" type="text" name="regAct[]" placeholder="Reg. Activity" required>
										<option name='' value=''> -Reg. Activity- </option>
										<?php
											foreach($userregisteredactivity as $data){
												 echo "<option value='" . $data['activity'] . "'>" . $data['activity']  . "</option>";
											}

											echo '</select>';	
										?>
									</td>
									
									<td>
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
								
									<td><button class="addScnt btn btn-success btn-xs" type="button"><i class="fa fa-plus"></i></button></td>
								</tr>
							</tbody>
						
						</table>					
						
					</div>
				</div>

	            <br>
	            <div class="text-right">
					<td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td>
					<input type="hidden" name="ZONE_CODE" value="<?php echo $zone;?>">
					<input type="hidden" name="cltcode" value="<?php echo $cltcode;?>">
				</div>
				
			</form>
		</div>
	</div>

<!-- JS -->
<script type="text/javascript" src="js/importables.js"></script>
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

<!-- AUTOPOPULATE -->

<!--scroll result-->
<style>
  .ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 100px;
  }
</style>

<script id="template" type="text/template">
	
	<td><input class="form-control input-required" type="text" name="itemName[]" placeholder="Item Name" required></td>
	
	<td>
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
	</td>	
									
	<td>
        <input class="tar_desc form-control" type="text" placeholder="Type product name/code here" name="HSCODE[]" required/>
    </td>
	
    <td>
        <input class="tar_ext form-control" type="text" name="TAR_Ext[]" readonly tabindex="-1"/ required>
    </td>
	
	<td>
        <input class="tar_desc form-control" type="text" name="TAR_DSC[]" readonly tabindex="-1"/ required>
    </td>
	
	<td><input class="form-control input-required" type="text" name="itemCode[]" placeholder="Item Code" required></td>
									
	<td><select class="form-control input-required" type="text" name="regAct[]" placeholder="Reg. Activity" required>
		<option name='' value=''> -Reg. Activity- </option>
		<?php
			foreach($userregisteredactivity as $data){
				 echo "<option value='" . $data['activity'] . "'>" . $data['activity']  . "</option>";
			}

			echo '</select>';	
		?>
	</td>
	
	<td>
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
	
    <td><a class="remScnt btn btn-danger btn-xs"><span title="Delete" class="glyphicon glyphicon-remove"></span></a></td>
	
</script>

<script type="text/javascript">
$('#hs').autocomplete({
	source: function( request, response ) {
  		$.ajax({
  			url : '/hscodes',
  			dataType: "json",
			data: {
			   name_startsWith: request.term,
			   type: 'hscode',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[0],
						value: code[0],
						data : item
					}
				}));
			}
  		});
  	},
  	autoFocus: true,	      	
  	minLength: 0,
  	select: function( event, ui ) {
		var names = ui.item.data.split("|");						
		$('#country_no_1').val(names[1]);
		$('#phone_code_1').val(names[2]);
		$('#country_code_1').val(names[3]);
	}		      	
});
</script>