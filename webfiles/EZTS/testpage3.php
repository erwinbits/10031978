<?php
require("../../library.php");
use Functions\eZTD;
use Functions\UserAccount;
use Functions\SuretyBond;
use Tools\Connectivity\Database;
use Functions\eztdProcessor;


$eztdProcessor = new eztdProcessor;
$account = new UserAccount;

var_dump($eztdProcessor->checkEZTDforOPEN());

echo date('Y-m-d');


	

?>