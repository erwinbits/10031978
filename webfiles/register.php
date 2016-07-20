<?php

	require("../library.php");
	use Functions\UserAccount;
	use Tools\MCrypt;


	$account = new UserAccount;
	$MCrypt = new MCrypt;

	if(!$account->userIsLoged()){
		header("Location: /login");
		exit;
	}


?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Create User Form</title>
		<link rel="icon" href="/ico/favicon.ico">
		

		<!-- CSS plugins -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/sb-admin-2.css" rel="stylesheet">
		<!-- CSS plugins -->


		<!-- CSS custom -->
		<link href="/css/header.css" rel="stylesheet"/>
		<link href="/css/customnavbar.css" rel="stylesheet"/>
		<link href="/css/footer.css" rel="stylesheet"/>

		<!-- CSS custom -->
	</head>

	
	<body>


		<?php

			//include('../layout.php'); 
			//include('sidemenubar.php')

		?>

		

			<!--Page Content-->

			<div id="page-wrapper">

			

				<div class="container-fluid">

				

					<form class="form-horizontal" id="create-user-form" name="emanifestForm" action="manifestProcess" method="POST">

					

						<div class="panel panel-default">

						

							<!-- PANEL HEADING -->

							<div class="panel-heading text-center">

								<strong>CREATE USER</strong>

							</div>

							<!-- PANEL HEADING -->

							

							<!-- PANEL BODY -->

							<div class="panel-body">

							

								<!-- TABLE -->

								<table style="margin:0 auto;">

									<tr>

										<td align="right">ID *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required" type="text" name="id"></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Email Address *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required" type="text" name="email"></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Account *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td>

											<select name="account" class="form-control">

												<option value = "">Select Account</option>

												<option value = "admin">Admin</option>

												<option value = "client">Client</option>

												<option value = "viewr">Viewer</option>

											</select>

										</td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Company Name *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required" type="text" name="company_name" ></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Home Address *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required" type="text" name="address"></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Province *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required" type="text" name="province" value=""></td>

									</tr>	

									<td>&nbsp;</td>

									<tr>

										<td align="right">Country *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required" type="text" name="country" value=""></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Zip Code *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required input-number" type="text" name="zip_code" value=""></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Telephone Number *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required input-contact-number" type="text" name="telephone" value=""></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Mobile Number &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-contact-number" type="text" name="mobile" value=""></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">First Name *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required" type="text" name="name" value=""></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Surname *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required" type="text" name="surname" value=""></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Middle Name *&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control input-required" type="text" name="middle_name" value=""></td>

									</tr>

									<td>&nbsp;</td>

									<tr>

										<td align="right">Birth Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>

										<td><input class="form-control" type="date" name="birth_date" value=""></td>

									</tr>

								</table>

								<!-- TABLE -->

								

							</div>

							<!-- PANEL BODY -->

							

							<!-- PANEL FOOTER -->

							<div class="panel-footer">

							

								<div class="text-right">

									<button type="button" class="btn btn-danger disabled" id="reset-button">Reset</button>

									<input type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit-button" disabled>

								</div>

							

							</div>

							<!-- PANEL FOOTER -->

							

						</div>

									

					</form>

					

				</div>

				

				<!-- General -->

				

			</div>

		

		<?php

			include('footer.php');

		?>

		

		<!-- JavaScript plugins -->

		<script src="/js/jquery.js"></script>

		<script src="/js/bootstrap.min.js"></script>

		<!-- JavaScript plugins -->

		

		<!-- JavaScript custom -->

		<script src="/js/createUserForm.js"></script>

		<!-- JavaScript custom -->

		

	</body>



</html>

