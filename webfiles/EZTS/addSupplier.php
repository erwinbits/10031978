<?php

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;
use Functions\UserAccount;


$userid = $_SESSION['userid'];
$eZTD = new eZTD;
$account = new UserAccount;

	$msg = false;
	if($_POST){
		$supplier = $_POST['supplier'];
		$TIN = $_POST['TIN'];
		$add1 = $_POST['add1'];
		$add2 = $_POST['add2'];
		$add3 = $_POST['add3'];
		$ZoneLoc = $_POST['ZoneLoc'];

		$result = $eZTD->addSupplier($supplier, $add1, $add2, $add3, $TIN, $ZoneLoc);
		echo "<script type='text/javascript'>alert('Your Supplier has been added.');window.location.href='/addSupplier';</script>";
	}
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
	<div id="page-wrapper">
		<div class="container-fluid">
		<br>
		<h3><center>Add Supplier</center></h3>
		<hr>
			<form data-toggle="validator" class="form-horizontal" id="create-form" role="form" action="" method="POST">
				<div class="panel-body">
					<div class="inner-panel">
						<div class="form-group">
							<label class="control-label col-md-3" for="supplier">Company Name</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="supplier" value="" placeholder="Company Name" required>
							</div>
							<div class="help-block with-errors"></div>
						</div>
						
						<br>
						<div class="form-group">
							<label class="control-label col-md-3" for="TIN">TIN Number</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="TIN" value="" placeholder="Supplier TIN" required>
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<br>

						<div class="form-group">
							<label class="control-label col-md-3" for="add1">Address 1</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="add1" placeholder="Number/Bldg/Unit">
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<br>
						
						<div class="form-group">
							<label class="control-label col-md-3" for="add2">Address 2</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="add2" placeholder="Street">
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<br>
						
						<div class="form-group">
							<label class="control-label col-md-3" for="add3">Address 3</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="add3" placeholder="City">
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<br>
						
						<div class="form-group">
							<label class="control-label col-md-3" for="ZoneLoc">Zone Location</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="ZoneLoc" placeholder="Zone Location">
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<br><br><br>
				
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Add Supplier</button>
						</div>	
					</div>
				</div>		
			</form>
		<!--</div><!--Page Wrapper-->
		</div>
	</div>
<?php include('../includes/footer.php');?>
		<!-- JavaScript plugins -->
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<!-- JavaScript plugins -->


		<!-- JavaScript custom -->
		<!-- JavaScript custom -->	

	</body>

</html>

