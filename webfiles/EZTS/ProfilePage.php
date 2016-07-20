<?php 

include('../includes/ClientLayout.php'); 

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

	// use Functions\UserInfo;
	use Functions\Nominate;
	use Functions\UserAccount;
	use View\ProfileView;
	use Model\UserManagement\ProfileManagement;
	use Model\UserManagement\UserInfo;

	$account=new UserAccount;
	$showPage = new ProfileView;
	$userprofile = new ProfileManagement;
	$userinfo = new UserInfo;

	$name = $userinfo->getUserName();
	$appno = $userinfo->getMyUserAppNo();

	$profile = $userprofile->getUserProfile($appno);
foreach($profile as $data){

	$name = $data['name'];
	$middleName = $data['middleName'];
	$surname = $data['surname'];
	$mobile = $data['mobile'];
	$idno = $data['idNo'];
	$id = $data['id'];

}

$accessprofile = $userprofile->getAccessProfile($id);
foreach($accessprofile as $accessdetails){
	$username = $accessdetails['username'];
	$useremail = $accessdetails['email'];
}

$coprofile = $userprofile->getCompanyProfile($appno);
foreach($coprofile as $codetails){

	$companyname = $codetails['companyName'];
	$address = $codetails['address'];
	$province = $codetails['province'];
	$country = $codetails['country'];
	$zip_code = $codetails['zipCode'];
	$companyemail = $codetails['companyEmail'];
	$telephone = $codetails['telephone'];
	$PEZACORNo = $codetails['pezaCorNo'];
	$dateOfReg = $codetails['dateOfReg'];
	$tin = $codetails['tin'];
	$utype = $codetails['userType'];
	$status = $codetails['profileStatus'];
	$zone = $codetails['zoneCode'];
}



?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
	<div class="container-fluid">
		<br>
		<form data-toggle="validator" enctype="multipart/form-data" class="form-horizontal" id="" role="form" action="" method="POST">
	<br>
		<?php
			$showPage->showUserProfile($name, $middleName, $surname, $useremail, $mobile, $idno, $appno);
			
			$showPage->showCompanyProfile($companyname, $tin, $address, $province, $country, $zip_code, $companyemail, $telephone, $country, $PEZACORNo, $dateOfReg, $utype, $zone);
			$userinfo->disablefields('userprofile');

		?>
			<script type="text/javascript"></script>
	</form>
	</div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

