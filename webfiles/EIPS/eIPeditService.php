<?php
include('../../includes/layout2.php');
include('../../includes/CashierSidebar.php');

use Functions\eIP;
$eip = new eIP;
	
	$id = $_GET['id'];
	$services = $eip->editServices($id);
	foreach($services as $data){
		$serviceFee = $data['serviceFee'];
		$serviceName = $data['serviceName'];
	}
		
	if($_POST){
		$id = $_POST['id'];
		$serviceFee = $_POST['serviceFee'];
		$serviceName = $_POST['serviceName'];
		
		$result = $eip->updateService($id, $serviceName, $serviceFee);
		echo "<script type='text/javascript'>alert('Cashier Account has been Updated!.');window.location.href='/eIPservices';</script>";
	}
		
?>
		
	<link href="css/AdminLTE.min.css" rel="stylesheet">		
		<div id="page-wrapper">
			<div class="container-fluid col-md-12"><br><br>
				<div class="panel panel-default">
					<div class="panel-heading"><strong><center>Edit Service</center></strong></div>
						<div class="panel-body">
						<form data-toggle="validator" class="form-horizontal" id="create-form" role="form" action="" method="POST">
							
							<br>
							<div class="form-group">
								<label class="control-label col-md-4" for="serviceName">Service Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="serviceName" value="<?php echo $serviceName; ?>">
								</div>
								<div class="help-block with-errors"></div>
							</div>
							<br>
							<div class="form-group">
								<label class="control-label col-md-4" for="serviceID">Service Fee</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="serviceFee" value="<?php echo $serviceFee; ?>">
								</div>
								<div class="help-block with-errors"></div>
							</div>
							<br>
							<div class="col-md-10">
								<button type="submit" name="update" class="btn btn-primary pull-right">UPDATE</button>
								<input type="hidden" name="id" value="<?php echo $id; ?>">
							</div>		
						</form>
					</div>
				</div>
			</div>
		</div><!--Page Wrapper-->
		<?php include('../../includes/footer.php'); ?>
		<?php include('../../script.php'); ?>
		
		<!-- JavaScript plugins -->
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<!-- JavaScript plugins -->

		<!-- JavaScript custom -->
		<!-- JavaScript custom -->

		

	</body>



</html>

