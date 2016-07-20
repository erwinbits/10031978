<?php
   include('../../includes/layout2.php');
   
   use Functions\eIP;

   if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "5"){
        echo "You dont have access on this page";
        header("Location: /401");
    }

        if($info->account == "0"){
            include('../includes/AdminSidebar.php');
        }elseif($info->account == "5"){
            include('../../includes/CashierSidebar.php');
        }elseif($info->account == "1"){
            include('../includes/sidebar.php');
        }elseif($info->account == "6"){
            include('../includes/elseSidebar.php');
        }elseif($info->account == "7"){
            include('../includes/newsidebar.php');
        }else{
            include('../includes/BrokerSidebar.php');
        }

	$eip = new eIP;	
	if($_POST){
		$serviceID = $_POST['serviceID'];
		$serviceName = $_POST['serviceName'];
		$serviceFee = $_POST['serviceFee'];
		
		$result = $eip->addService($serviceID, $serviceName, $serviceFee);
		echo "<script type='text/javascript'>alert('Service has been Added!.');window.location.href='/eIPaddService';</script>";
	}
	
	$id = $_SESSION['userid'];
	$transactionID = "TRANSID-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");
	$serviceID = "SERVID-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");
?>
		
	<link href="css/AdminLTE.min.css" rel="stylesheet">		
		<div id="page-wrapper">
			<div class="container-fluid col-md-12"><br><br>
				<div class="panel panel-default">
					<div class="panel-heading"><strong><center>Add Service</center></strong></div>
					<div class="panel-body">
						<hr>
						<form data-toggle="validator" class="form-horizontal" id="create-form" role="form" action="" method="POST">
							<div class="panel-body">
								<br>
								<div class="form-group">
									<label class="control-label col-md-3" for="id">ID</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="id" value="<?php echo $id; ?>" placeholder="Auto-Generated ID" readonly>
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<br>

								<div class="form-group">
									<label class="control-label col-md-3" for="serviceID">Service ID</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="serviceID" value="<?php echo $serviceID; ?>" readonly>
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<br>
								<div class="form-group">
									<label class="control-label col-md-3" for="serviceName">Service Name</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="serviceName" value="">
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<br>
								
								<div class="form-group">
									<label class="control-label col-md-3" for="serviceFee">Service Fee</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="serviceFee" value="">
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<br>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-primary">Add Service</button>
								</div>	
							</div>	
						</form>
					</div><!--Page Wrapper-->
				</div>
			</div>
		</div>
		
		<?php
		include('../../includes/footer.php');
		include('../../script.php');
		?>

		<!-- JavaScript plugins -->
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<!-- JavaScript plugins -->

		<!-- JavaScript custom -->
		<!-- JavaScript custom -->

	</body>
</html>

