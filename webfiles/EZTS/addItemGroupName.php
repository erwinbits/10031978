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
		$id = $_POST['id'];
		$UID = $_POST['UID'];
		$cltcode = $_POST['cltcode'];
		$itemGroupName = $_POST['itemGroupName'];
		
		$result = $eZTD->additemGroupName($id, $UID, $cltcode, $itemGroupName);
		echo "<script type='text/javascript'>alert('Item Group has been added.');window.location.href='/itemGroupNameList';</script>";
	}else{
		$status = "Failed";
		$responseMessage = "Group already e!.";
	}
?>
	<div id="page-wrapper">
		<div class="container-fluid">
		<br>
		<h3><center>Add Item Group</center></h3>
		<hr>
			<form data-toggle="validator" class="form-horizontal" id="create-form" role="form" action="" method="POST">
			<?php $id = $_SESSION['userid']; ?>
			<?php $UID = "UID-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");?>
			<?php $cltcode = $account->getCompanyCode($id); ?>
				<div class="panel-body">
					<div class="inner-panel">
						
						<div class="form-group">
							<label class="control-label col-md-3" for="id">Cltcode</label>
							<div class="col-md-8">
								<input class="form-control" type="text" value="<?php echo $cltcode; ?>" name="cltcode" readonly tabindex="-1">
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<br>
						
						<div class="form-group">
							<label class="control-label col-md-3" for="itemGroupName">Item Group Name</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="itemGroupName" value="" placeholder="Item Group Name" required>
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Add Item Group</button>
							<input type="hidden" value="<?php echo $cltcode; ?>" name="cltcode">
							<input type="hidden" value="<?php echo $id; ?>" name="id">
							<input type="hidden" value="<?php echo $UID; ?>" name="UID">
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

