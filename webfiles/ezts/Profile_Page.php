<?php
require ('../../library.php');

use View\showPage;
use Model\UserManagement\UserInfo;
use Model\AccessManagement\UserAccess;
use Model\UserManagement\ProfileManagement;
use View\ProfileView;
use Controller\LoginController;

$view = new ProfileView;
$showpage = new showPage();
$userinfo = new UserInfo;
$userprofile = new ProfileManagement;
$auth = new LoginController();

$auth->auth();

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
}

$showpage->showHeader('Profile Page');
$showpage->showNewSidebar();
?>
<!-- JS -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sb-admin-2.js" rel="stylesheet"></script>
<script src="js/metisMenu.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-table.js"></script>
<script src="../../assets/js/fileinput/fileinput.js"></script>
<link href="css/fileinput.css" rel="stylesheet">


<div id="page-wrapper">

	<form data-toggle="validator" enctype="multipart/form-data" class="form-horizontal" id="" role="form" action="Submit_Profile" method="POST">
	<br>
		<?php
			$view->showUserProfile($name, $middleName, $surname, $useremail, $mobile, $idno, $appno);
			$view->showCompanyProfile($companyname, $tin, $address, $province, $country, $zip_code, $companyemail, $telephone, $country, $PEZACORNo, $dateOfReg, $utype);
			$view->showAttachments($status);
		?>
	<br>
	<p><center>Please carefully review before submitting</center></p>
	<center><button type="submit" name="upload" class="btn btn-primary">SAVE</button></center>
	<br>
	<br>
	</form>


</div>


<?php

$showpage->showFooter();
?>



