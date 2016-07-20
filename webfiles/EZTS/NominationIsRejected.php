<?php 

include('../includes/layout.php'); 
include('../includes/BrokerSidebar.php');

	use Functions\Nominate;

	$msg = false;
	$cltcode = $_GET['cltcode'];

	$nominate = new Nominate;
	if($_POST){
		$approve = $nominate->NominationApproval($cltcode);
	
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
	<div id="page-wrapper">
		<div class="container-fluid">
			<br>
			<br>
			<br>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="inner-panel">
						<center><h3><br><br> You have successfully nominated this company.</h3></center>
						<center><h3><br><br> Thank You!</h3></center>
						<br>
						<center><h4>You may check its status in My List Menu.</h4></center><br>
						<center><a href='MyList'><input type='button' class='btn btn-default' name='submit' value='My List'></a></center>
					</div>
				</div>
			</div>
		</div><?php $msg = true; } ?>
	</div>

	
	<div id="page-wrapper">
		<div class="container-fluid">
		<?php if($msg == false){ ?>
			<br>
			<br>
			<br>
	  		<form data-toggle="validator" class="form-horizontal" role="form" action="" method="POST">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="inner-panel">
							<div class="form-group">
								<center><br><h2>Are you sure you want to proceed approving this nomination?</h2></center><br>							
								<center><input type="submit" class="btn btn-default" value="YES! I want to approve.">
								<input type="hidden" name="status" value="1"></center>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php } ?>

<?php include('../script.php');?>