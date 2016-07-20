<?php 

include('../includes/layout.php'); 
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

?>
<!-- CSS -->
<!-- <link href="../assets/css/sb-admin-2.css" rel="stylesheet"> -->
<link href="css/AdminLTE.min.css" rel="stylesheet">

<?php 
    use Functions\AccountInfo;

    $accountinfo = new AccountInfo;

	$amount = strtoupper($_POST['amount']);
	$ORnum = strtoupper($_POST['ORnum']);
	$refnum = strtoupper($_POST['refnum']);
	//$remarks = utf8_encode($_POST['remarks']);
	$cltcode = strtoupper($_POST['cltcode']);
	$id = $_POST['id'];
	$compname = $_POST['compname'];
	
	// var_dump($_POST);

?>

<link href="css/AdminLTE.min.css" rel="stylesheet">

	<div id="page-wrapper">
		<div class="container-fluid">

			<br>
			<br>
			<br>
	  		<form data-toggle="validator" class="form-horizontal" role="form" action="AddFundController" method="POST">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="inner-panel">
							<div class="form-group">
								<center><br><h2>Are you sure you want to add <strong><?php echo "Php" . number_format($amount);?></strong> to <strong><?php echo $compname;?></strong>?							
								<center>
								<br>
								<input type="submit" class="btn btn-default" value="YES! I want to add funds."> &nbsp; | &nbsp;
								<input type="hidden" name="cltcode" value="<?php echo $cltcode?>">
								<input type="hidden" name="id" value="<?php echo $id?>">
								<input type="hidden" name="amount" value="<?php echo $amount?>">
								<input type="hidden" name="ORnum" value="<?php echo $ORnum?>">
								<input type="hidden" name="refnum" value="<?php echo $refnum?>">
								<input type="hidden" name="remarks" value="<?php echo $remarks?>">	
								<a class="btn btn-default" href="AccountList"><i class="fa fa-register">NO!</i></a>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>


<?php include('../script.php');?>