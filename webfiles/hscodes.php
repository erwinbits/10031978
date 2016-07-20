<?php
	require("../library.php");

	use Model\ItemManagement\Item;

	$getcode = new Item;

	$term = $_REQUEST['term'];
	
	$getcode->autocompleteHscode($term);

	
?>