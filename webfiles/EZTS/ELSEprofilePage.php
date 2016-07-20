<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

	use Functions\UserInfo;
	use Functions\Nominate;

	$info = new UserInfo;
	$id = $_SESSION['userid'];
	// /$pass = $info->getUserPassbyID($id);
	$username = $info->getUserNamebyID($id);

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
	<div class="container-fluid">

		<br>
		<br>
		<form data-toggle="validator" class="form-horizontal" role="form" id="emanifest-form" action="change-password" method="POST">

		<div class="panel panel-default">

			<div class="panel-heading text-center">
				<h4>My Profile</h4>
			</div>
			
			<div class="panel-body">
				<?php
					$userdata = new UserInfo;
					$fetch = $userdata->getUserData();

					foreach($fetch as $data){
						$id = $data['id'];
						$name = $data['name'];
						$surname = $data['surname'];
						$company_name = $data['companyName'];
						$address= $data['address'];
						$country = $data['country'];
						$telephone = $data['telephone'];
						$mobile = $data['mobile'];
						$zone = $data['zoneCode'];
						$companyemail = $data['companyEmail'];
					}
				?>
				<div class="inner-panel">
					<div class="form-group">
						<label class="control-label col-sm-3" >First Name: </label>
						<div class="col-sm-8">
							<?php echo $name; ?> 
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" >Last Name: </label>
						<div class="col-sm-8">
							<?php echo $surname; ?> 
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" >Company Name: </label>
						<div class="col-sm-8">
							<?php echo $company_name; ?> 
						</div>
					</div>
				
					<div class="form-group">
						<label class="control-label col-sm-3" >Address: </label>
						<div class="col-sm-8">
							<?php echo $address; ?> 
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3" >Country: </label>
						<div class="col-sm-8">
							<?php echo $country; ?> 
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" >Telephone Number: </label>
						<div class="col-sm-8">
							<?php echo $telephone; ?>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" >Mobile Number: </label>
						<div class="col-sm-8">
							<?php echo $mobile; ?> 
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" >Zone: </label>
						<div class="col-sm-8">
							<?php echo $zone; ?>
						</div>
					</div>
	
					<div class="form-group">
						<label class="control-label col-sm-3" >Company Email: </label>
						<div class="col-sm-8">
							<?php echo $companyemail; ?>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>

		<div class="panel panel-default">

			<div class="panel-heading text-center">
				<h4>Account Details</h4>
			</div>
			<br>
			<div class="form-group">
				<label class="control-label col-md-3" for="username">Username</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="oldpass" value="<?php echo $username; ?>" readonly>
					</div>
					<div class="help-block with-errors"></div>
			</div>
			<!-- <div class="form-group">
				<label class="control-label col-md-3" for="oldpass">Old Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="oldpass" value="<?php echo $pass; ?>" readonly>
					</div>
					<div class="help-block with-errors"></div>
			</div> -->
			<div class="form-group">
				<label class="control-label col-md-3" for="newpass">New Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="oldpass">
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-primary">Change Password</button>
					</div>
					<div class="help-block with-errors"></div>
			</div>
			

		</div>

		<div class="panel panel-default">

			<div class="panel-heading text-center">
				<h4>My Company Registered Activities</h4>
			</div>

			<div class="panel-body">
				<?php
					$userdata = new UserInfo;
					$fetch = $userdata->getRegisteredActivities();

					foreach($fetch as $data){
						$activity = $data['activity'];

						echo '<div class="form-group">
						<label class="control-label col-sm-3" >Regitered Activity: </label>
						<div class="col-sm-8">';
							echo "" .$activity . ""; 
						echo '</div>
					</div>';

						
						
					}

					
				?>
				
				
			</div>
		</div>
	</div>

</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>