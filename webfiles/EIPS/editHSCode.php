<?php 

include('../../includes/layout2.php');
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

    if($info->account != "1"){
        echo "You dont have access on this page";
        header("Location: /401");
    }
    use Functions\eIP;
?>

<!--Page Content-->
<div id="page-wrapper">
	<div class="container-fluid">
		<br>
		<br>
		<form data-toggle="validator" class="form-horizontal" role="form" id="emanifest-form" action="editFeeConfirmation" method="POST">

		<div class="panel panel-default">

			<div class="panel-heading text-center">
				<h4>Profile</h4>
			</div>
			
			<div class="panel-body">
			
				<?php 
					$eip = new eIP;

					$hscode = $_GET['HS_Code'];
					
					$list = $eip->editHSCodes($hscode);
						foreach ($list as $data) {
							$hscode = $data['HS_Code'];
							$tarext = $data['TAR_Ext'];
							$tardesc = $data['TAR_DSC'];
						}

				?>

				<div class="inner-panel">
					<div class="form-group">
						<label class="control-label col-sm-4" >HS Code : </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="<?php echo $hscode; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" >TAR Ext :</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="<?php echo $tarext; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" >TAR Desc :</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="<?php echo $tardesc; ?>">
						</div>
					</div>


					<div class="form-group text-right">
					<hr>
						<button type="submit" class="btn btn-primary">UPDATE</button>
						<input type="hidden" name="HS_Code" value="<?php echo $hscode?>">
					</div>
				</div>
				
			</div>
		</div>

		</form>
	</div>
</div>

<?php include('../../includes/footer.php'); ?>
<?php include('../../script.php'); ?>