<?php
	include('../includes/RegisterLayout.php'); 
?>
		
			
	<div id="page-wrapper" style="margin:0 auto; width:900px">
	<br>
	<h3><center>Create an Account</center></h3>
	<hr>
		<form data-toggle="validator" class="form-horizontal" id="create-form" role="form" action="processRegistration" method="POST">
			<div class="panel-body">

	  			<img src="/img/ins_services_logo.png" style="width:40%">

				<div class="inner-panel" style="width:60%; float:right; padding:0px">

					<br>
					<div class="form-group">

						<label class="control-label col-md-3" for="username">Username</label>
						<div class="col-md-9">
							<input type="username" pattern="[a-zA-Z0-9]+" class="form-control" name="username" placeholder="InsCustomerCare" required>
						</div>
						<div class="help-block with-errors"></div>
					</div>
					<br>

					<div class="form-group">

						<label class="control-label col-md-3" for="email">Email</label>
						<div class="col-md-9">
							<input type="email" pattern="[^ @]*@[^ @]*" class="form-control" name="email" placeholder="sample@mail.com" required>
						</div>
						<div class="help-block with-errors"></div>
					</div>
					<br>

					<div class="form-group">
						<label class="control-label col-md-3" for="FirstName">First Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="name" placeholder="Juan" required>
						</div>
						<div class="help-block with-errors"></div>
					</div>
					<br>
					<div class="form-group">
						<label class="control-label col-md-3" for="MiddleName">Middle Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="middlename" placeholder="Santos" required>
						</div>
						<div class="help-block with-errors"></div>
					</div>
					<br>
					<div class="form-group">
						<label class="control-label col-md-3" for="LastName">Last Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="lastname" placeholder="Dela Cruz" required>
						</div>
						<div class="help-block with-errors"></div>
					</div>
					<br>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>	
				</div>
			</div>	
		</form>
	</div><!--Page Wrapper-->
		
		<?php

			include('../includes/footer.php');

		?>

		
		<!-- JavaScript plugins -->
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<!-- JavaScript plugins -->


		<!-- JavaScript custom -->
		<!-- JavaScript custom -->

		

	</body>



</html>

