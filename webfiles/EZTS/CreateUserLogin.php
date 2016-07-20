<?php include('../includes/layout.php');?>

<!--Page Content-->
<div id="page-wrapper" style="margin:0 auto; width:900px">
	<br>
	<h3>Create an Account</h3>
	<hr>
  	
	<form data-toggle="validator" class="form-horizontal" id="create-form" role="form" action="CreateUserLoginController" method="POST">
		<div class="panel-body">
			<div class="inner-panel" class='col-md-6'>
				<!-- <div class="form-group">
					<label class="control-label col-md-2" for="usertype">User Type</label>
					<div class="col-md-10">
						<select name="usertype" class="form-control" required>
							<option value = "">Select User Type</option>
							<option value = "1">INS Manager</option>
							<option value = "2">INS CS</option>
							<option value = "3">Main User</option>
							<option value = "4">Sub User</option>
							<option value = "5">Cashier</option>
							<option value = "6">Broker</option>
						</select>
					</div>
					<div class="help-block with-errors"></div>
				</div> -->
				<br>
				<div class="form-group">
					<label class="control-label col-md-6" for="username">Email Address</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="username" placeholder="sample@mail.com" required>
					</div>
					<div class="help-block with-errors"></div>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label col-md-6" for="Password">Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="pw" placeholder="Password123" required>
					</div>
					<div class="help-block with-errors"></div>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label col-md-6" for="FirstName">First Name</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="name" placeholder="Juan" required>
					</div>
					<div class="help-block with-errors"></div>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label col-md-6" for="MiddleName">Middle Name</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="middlename" placeholder="Santos" required>
					</div>
					<div class="help-block with-errors"></div>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label col-md-6" for="LastName">Last Name</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="lastname" placeholder="Dela Cruz" required>
					</div>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group text-right">
					<hr>
					<button type="submit" class="btn btn-primary">Register</button>
				</div>	
			</div>
		</div>	
	</form>
</div><!--Page Wrapper-->

<?php include('../includes/footer.php');?>
