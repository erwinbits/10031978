<?php
	
	$LibraryPath = "/srv/www/htdocs/library";
	
	set_include_path(get_include_path() . PATH_SEPARATOR . $LibraryPath);
	
	require("Loader.php");
	
?>