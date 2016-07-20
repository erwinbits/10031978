<?php
	require("../library.php");

	use Functions\AutoComplete;
	use Functions\DropDown;
	use Functions\UserAccount;

	$account = new UserAccount;
	$dropdown = new DropDown;

	$term = $_REQUEST['term'];
	$table = 'Zones';
	$data = $dropdown->zones($table, $term);

	foreach($data as $file){

		$result[] = array('value' => $file['ECOZONE'], 'label' => $file['ZONE_CODE']);
	}
	echo json_encode($result);
	

?>