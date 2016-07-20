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
	$table = 'supplier';
	$data = $dropdown->autocompleteSupplier($table, $term);

	foreach($data as $file){
		$result[] = array('value' => $file['TIN'], 'label' => $file['supplier'], 'add1' => $file['add1'], 'add2' => $file['add2'], 'add3' => $file['add3']);
	}
	echo json_encode($result);
	

?>