<?php
	require("../library.php");

	use Functions\AutoComplete;
	use Functions\DropDown;

	$dropdown = new DropDown;
	//$account = new UserAccount;
	// $MCrypt = new MCrypt;
	
	// if(!$account->userIsLoged()){
	// 	header("Location: /login");
	// 	exit;
	
	// }

	$term = $_REQUEST['term'];
	$table = 'itemgroupName';
	$data = $dropdown->autocompleteItemGroupName($table, $term);

	foreach($data as $file){
		$result[] = array('label' => $file['itemGroupName']);
	}
	echo json_encode($result);
	

?>