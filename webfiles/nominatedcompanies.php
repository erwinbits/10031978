<?php
	require("../library.php");

	use Functions\AutoComplete;
	use Functions\DropDown;
	use Functions\UserAccount;

	$account = new UserAccount;
	$dropdown = new DropDown;
	//$account = new UserAccount;
	// $MCrypt = new MCrypt;
	
	
	// if(!$account->userIsLoged()){
	// 	header("Location: /login");
	// 	exit;
	
	// }

	$term = $_REQUEST['term'];
	$table = 'declarant';
	$data = $dropdown->autocompleteNominatedCompanies($table, $term);

	foreach($data as $file){

		$result[] = array('value' => $file['TIN'], 'label' => $file['companyName'], 'Zone' => $file['zone']);
	}
	echo json_encode($result);
	

?>