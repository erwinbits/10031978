<?php 
include('../includes/layout.php'); 
use Functions\Nominate;

$nominate = new Nominate;
$msg = false;
$appno = $_GET['appno'];
$id = $_GET['id'];
$processtype = $_GET['processtype'];
var_dump($_GET);
$info = json_decode($MCrypt->decrypt($account));

if($info->account == "0"){
    include('../includes/AdminSidebar.php');
}elseif($info->account == "5"){
    include('../includes/CashierSidebar.php');
}elseif($info->account == "1"){
    include('../includes/sidebar.php');
}elseif($info->account == "6"){
    include('../includes/elseSidebar.php');
}elseif($info->account == "7"){
    include('../includes/newsidebar.php');
}else{
    include('../includes/BrokerSidebar.php');
}
	

if(isset($_POST['Approve']))
{
	$approve = $nominate->NominationApproval($appno, $id);
}elseif(isset($_POST['Reject'])){
	$approve = $nominate->RejectNomination($appno);

	
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
						<center><h3><br><br> Nomination accepted!</h3></center>
						<br>
						<!-- <center><h4>You may check its status in My List Menu.</h4></center><br>
						<center><a href='myClients'><input type='button' class='btn btn-default' name='submit' value='My List'></a></center> -->
					</div>
				</div>
			</div>
		</div><?php $msg = true; } ?>
	</div>

	
	<div id="page-wrapper">
		<div class="container-fluid">
		<?php 

			if($msg == false AND $processtype = "Approve"){ 

		?>
			<br>
			<br>
			<br>
	  		<form data-toggle="validator" class="form-horizontal" role="form" action="" method="POST">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="inner-panel">
							<div class="form-group">
								<center><br><h2>Are you sure you want to ACCEPT this nomination?</h2></center><br>							
								<center>
									<input type="submit" class="btn btn-default" name="Approve" value="ACCEPT">
									<input type="button" class="btn btn-default" onclick="window.history.back();" value="GO BACK">
									<input type="hidden" name="id" value="<?php echo $id;?>">
								</center>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php 

			}elseif($msg == false AND $processtype = "Reject"){ 

		?>
			<br>
			<br>
			<br>
	  		<form data-toggle="validator" class="form-horizontal" role="form" action="" method="POST">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="inner-panel">
							<div class="form-group">
								<center><br><h2>Are you sure you want to REJECT this nomination?</h2></center><br>							
								<center>
									<input type="submit" class="btn btn-default" name="Reject" value="REJECT">
									<input type="button" class="btn btn-default" onclick="window.history.back();" value="GO BACK">
									<input type="hidden" name="id" value="<?php echo $id;?>">
								</center>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<?php 

			} 

		?>

<?php include('../script.php');?>