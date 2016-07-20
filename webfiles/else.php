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
	$table = 'companies';
	$data = $dropdown->autocompleteElse($table, $term);

	foreach($data as $file){

		$result[] = array('value' => $file['TIN'], 'label' => $file['companyName'], 'Addr1' => $file['add1'], 'Addr2' => $file['add2'], 'Addr3' => $file['add3'], 'Zone' => $file['zone'], 'Email' => $file['email']);
	}
	echo json_encode($result);
	

?>