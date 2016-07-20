<?php
	require ('../../library.php');
	
	use Controller\LoginController;
	use Controller\SidebarController;
	use View\showPage;
	use View\MainView;
	use Model\AccessManagement\UserAccess;
	use Model\UserManagement\UserInfo;
	use Model\UserManagement\ProfileManagement;
	use Model\ItemManagement\Item;

	$auth = new LoginController;
	$sidebar = new SidebarController;
	$view = new showPage;
	$account = new UserAccess;
	$mainView = new MainView;
	$userinfo = new UserInfo;
	$profile = new ProfileManagement;
	$item = new Item;

	$auth->auth($account);
	
	$view->showScripts();
	$view->showHeader('Item Application');	
	
	$sidebar->showEztsSidebar();
	$name = $userinfo->getUserName();
	
	

	
	
?>	
<div id="page-wrapper">
	<div class="container-fluid">

		<?php
		if ($_POST) 
		{
			echo '<!-- JS -->
				<script type="text/javascript" src="js/importables.js"></script>
				<!-- JS -->

				<!-- AUTOPOPULATE -->
				<link href="css/jquery-ui.css" rel="stylesheet">
				<script src="js/jquery-ui.js"></script>
				<script src="js/hscodeautocom.js"></script>
				<!-- AUTOPOPULATE -->	

				<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="Submit_Item_Application" method="POST">
				<br>
				<br>
				<div class="panel panel-default">
					<!-- PANEL HEADING -->
					<div class="panel-heading">Add Item/s</div>

					<!-- PANEL BODY -->
					<div class="panel-body">
						<h3>Upload Bulk Item</h3>
						<hr>
						<p>Please complete the details of the items you would like to apply.</p>
						

						<!--<p> To add another item, press the "+". To delete an item, tick the check box and press "-".</p>-->
						<br>
					
						<!-- TABLE -->
						<div class="table-responsive ">
    					<table class="table table-striped">
							
							<thead align="center">
								<th><center>#</center></th>
								<th><center>Item Info</center></th>
								
					            <th><center>HSCODE Info</center></th>
					           
					            <th><center>Activity Info</center></th>
					            
					           	<th><center>LOA Info</center></th>
					            <th>Actions</th>
							
							</thead>
							
							<tbody id="p_scents">
							<tr>
								';



			$file = $_FILES['userfile']['tmp_name'];

			$csv = array_map('str_getcsv', file($file));
			    array_walk($csv, function(&$a) use ($csv) {
			      $a = array_combine($csv[0], $a);
			    });
			    array_shift($csv); # remove column header
			   	$i = 1;
			   	$userregisteredactivity = $profile->getRegisteredActivities();
			    foreach($csv as $data)
			    {

			    	$HSCODE = $data['HSCODE'];
			    	$TAR_Ext = $data['TAR_Ext'];
			    	
			    	$ItemName = $data['ItemName'];
			    	$ItemCode = $data['ItemCode'];
			    	
			    	
			    	$loaNumber = $data['loaNumber'];
			    	$loaValidity = $data['loaValidity'];
			    	
			    	
			    	

			  		echo '
						<td>'.$i++.'</td>
						<td>
							<input class="form-control input-required" type="text" name="itemName[]" placeholder="Item Name" value = "'.$ItemName.'" required><br>

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
								<input class="form-control input-required" type="text" name="itemCode[]" placeholder="Item Code" value = "'.$ItemCode.'"  required>

						</td>	
						
						<td>
							<input id="hscode" class="hscode form-control" type="text" placeholder="Type product name/code here" name="HSCODE[]" value = "'.$HSCODE.'"  required/><br>
						
							<input class="tar_ext form-control" type="text" name="TAR_Ext[]" value = "'.$TAR_Ext.'"  required readonly tabindex="-1"/ ><br>
						
							<input class="tar_desc form-control" type="text" name="TAR_DSC[]" required readonly tabindex="-1"/ >
						</td>
									
									
									
						<td>
							<select class="form-control input-required" type="text" name="regAct[]" placeholder="Reg. Activity" required>
							<option name="" value=""> -Registered Activity- </option><br>';
										
							foreach($userregisteredactivity as $data){
								 echo "<option value='" . $data['activity'] . "'>" . $data['activity']  . "</option>";
							}

							echo '</select>
										
										<br>
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
										<input class="form-control input-required" type="text" name="LOANo[]" placeholder="LOA Number" value = "'.$loaNumber.'"  required><br>
										<input class="form-control input-required" type="date" name="LOAValidity[]"  value = "'.$loaValidity.'" placeholder="LOA Validity" required><br>
									</td>
								
									<td><a class="remScnt btn btn-danger btn-xs"><span title="Delete" class="glyphicon glyphicon-remove"></span></a></td>
								</tr>';
							}
							
							echo '<br>
							</tbody>
						</table>	
						</div>				
					</div>
				</div>

	            <br>
	            <div class="text-right">
					<td><input type="submit" class="btn btn-primary" name="applyItem" value="Submit"></td>
				</div>
				
			</form>
		</div>
	</div>
</div>';
}else{

			 
			    		
		?>
		<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="" enctype="multipart/form-data" method="POST">
		<h1>Item Bulk Upload</h1>
		<hr>
		<p>Please ensure correct CSV file is uploaded. If you don't have one, please call INS Customer Support. </p>
		<br>

		<div>
			<input type="file" accept="application/csv" name="userfile" id="userfle">
		</div>
		<br>
		<div class="text-left">
					<td><input type="submit" class="btn btn-primary" name="applyItem" value="uploadCSV"></td>
				</div>
				
		</form>


	</div>
</div>
	
<?php
}
$view->showFooter();?>

