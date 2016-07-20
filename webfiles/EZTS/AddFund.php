<?php 

include('../includes/layout.php'); 
include('../includes/CashierSidebar.php');

?>
<!-- CSS -->
<!-- <link href="../assets/css/sb-admin-2.css" rel="stylesheet"> -->
<link href="css/AdminLTE.min.css" rel="stylesheet">

<?php 

	if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "5"){
        echo "You dont have access on this page";
        header("Location: /401");
    }
    use Functions\AccountInfo;
?>

<!--Page Content-->
<div id="page-wrapper">
	<div class="container-fluid">
		<br>
		<br>
		<form data-toggle="validator" class="form-horizontal" role="form" id="emanifest-form" action="AddFundConfirmation" method="POST">

		<div class="panel panel-default">

			<div class="panel-heading text-center">
				<h4>Profile</h4>
			</div>
			
			<div class="panel-body">
			
				<?php 
					$accountinfo = new AccountInfo;

					$compname= $_GET['compname'];
					$cltcode= $_GET['cltcode'];
					$id = $_GET['id'];

					// echo $compname;
					// echo $cltcode;
					// echo $id;
					$list = $accountinfo->getAddressAndZone($id);
						foreach ($list as $value) {
							$address = $value['address'];
							$province = $value['province'];
							$country = $value['country'];
							$TIN = $value['TIN'];
							$ZONE_CODE = $value['ZONE_CODE'];
						}

				?>

				<div class="inner-panel">
					<div class="form-group">
						<label class="control-label col-sm-4" >Company Name : </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="<?php echo $compname; ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" >Address : </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="<?php echo $address; ?>" disabled>
							<br>
							<input type="text" class="form-control" value="<?php echo $province; ?>" disabled>
							<br>
							<input type="text" class="form-control" value="<?php echo $country; ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" >Tax Identification Number :</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="<?php echo $TIN; ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" >Zone :</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="<?php echo $ZONE_CODE; ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" >Cltcode :</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="<?php echo $cltcode; ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" >OR Number : </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="ORnum" placeholder="OR Number" required> 
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" >Reference Number : </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="refnum" placeholder="Reference Number">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" >Amount in PESO: </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="5000" name="amount" placeholder="Amount" required>
						</div>
					</div>

					<!--<div class="form-group">
						<label class="control-label col-sm-4" >Remarks : </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="remarks" placeholder="Remarks" required>
						</div>
					</div>-->

					<div class="form-group text-right">
					<hr>
						<button type="submit" class="btn btn-primary">Add Fund</button>
						<input type="hidden" name="cltcode" value="<?php echo $cltcode?>">
						<input type="hidden" name="id" value="<?php echo $id?>">
						<input type="hidden" name="compname" value="<?php echo $compname?>">
					</div>
				</div>
				
			</div>
		</div>

		</form>
	</div>
</div>

<?php include('../includes/footer.php');?>