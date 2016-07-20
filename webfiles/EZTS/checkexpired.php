<?php

use Functions\eZTD;

$eztd = new eZTD;

if($eztd->checkExpiredZTDs()){

	return "Checked";
}

?>