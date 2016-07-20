<?php

	require("library.php");
	
	use Functions\UserAccount;
	
	$account = new UserAccount;
	
	if(!$account->userIsLoged()){
		header("Location: /login");
	}else{
		header("Location: /home");
	}
	
	exit;
	
?>