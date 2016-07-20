<?php

	require ('../../library.php');

	use Controllers\LoginController;
	use Controllers\SidebarController;
	use Views\showPage;
	use Views\MainView;
	use Models\UserManagement\UserInfo;
	use Models\UserManagement\ProfileManagement;

	$auth = new LoginController;
	$sidebar = new SidebarController;
	$view = new showPage;

	$mainView = new MainView;
	$userinfo = new UserInfo;
	$profile = new ProfileManagement;

	$auth->auth();

	$view->showScripts();
	$view->showHeader('EZTS Apply Item');

	$sidebar->showEztsSidebar();
	$name = $userinfo->getUserName();
	$userregisteredactivity = $profile->getApprvoedRegisteredActivities();


?>
<!-- JS -->
<script type="text/javascript" src="js/importables.js"></script>
<!-- JS -->

<!-- AUTOPOPULATE -->
<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/jquery-ui.js"></script>
<script src="js/hscodeautocom.js"></script>
<!-- AUTOPOPULATE -->


		<div id="page-wrapper">
		<div class="container-fluid">
			<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="Submit_Item_Application" method="POST">
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
						<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please take note that the HSCODES are AUTOSUGGESTED by the system. <strong>Only choose from the list suggested.</strong></div>

						<!--<p> To add another item, press the "+". To delete an item, tick the check box and press "-".</p>-->
						<br>
						<?php
						if(count($userregisteredactivity) <= 0){
							echo '<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> No approved registered activity listed. <strong>Please make sure you have an  <a href = "http://staging.intercommerce.com.ph:84/Registered_Activities_List">active registered activity</a> before proceeding.</strong></div>';
						}
						?>
						<!-- TABLE -->
						<div class="table-responsive">
    					<table class="table">

							<thead>
								<th>#</th>
								<th>Item Info</th>

					            <th>HSCODE Info</th>

					            <th>Activity Info</th>

					           	<th>LOA Info</th>
					            <th>Actions</th>

							</thead>

							<tbody id="p_scents">
								<tr>
									<td>1</td>

									<td>
										<small>Item Name</small>
										<input class="form-control input-required" type="text" name="itemName[]" placeholder="Item Name" required><br>
										<small>Generic Description</small>
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
										<small>Description</small>
										<input class="tar_desc form-control" type="text" name="TAR_DSC[]" required readonly tabindex="-1"/ >
									</td>



									<td>
										<small>Registered Activity Name</small>
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
										<input class="form-control input-required" value=" " type="text" name="LOANo[]" placeholder="LOA Number" ><br>
										<small>LOA Validity</small>
										<input class="form-control input-required" value=" " type="date" name="LOAValidity[]" placeholder="LOA Validity" ><br>
									</td>

									<td align="center"><button class="addScnt btn btn-success btn-xs" type="button"><i class="fa fa-plus"></i></button></td>
								</tr>
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
</div>

<?php $view->showFooter();?>


<!--scroll result-->
<style>
  .ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
      width: 400px;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 200px;

  }
</style>

<script id="template" type="text/template">
	<td>
		<small>Item Name</small>
		<input class="form-control input-required" type="text" name="itemName[]" placeholder="Item Name" required><br>
		<small>Generic Description</small>
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
		<small>TAR Ext</small>
		<input class="tar_ext form-control" type="text" name="TAR_Ext[]" required readonly tabindex="-1"/ ><br>
		<small>Description</small>
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
		<input class="form-control input-required" value="" type="text" name="LOANo[]" placeholder="LOA Number" ><br>
		<small>LOA Validity</small>
		<input class="form-control input-required" value="" type="date" name="LOAValidity[]" placeholder="LOA Validity" ><br>
	</td>

	<td><a class="remScnt btn btn-danger btn-xs"><span title="Delete" class="glyphicon glyphicon-remove"></span></a></td>
</script>

