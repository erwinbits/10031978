<?php

	namespace Functions;
	use Tools\Connectivity\Database;


	class AccountInfo{


		private $connection;

		public function __construct(){
			$this->connection = new Database;
		}

		/* ---- AccountList ---- */
		public function getAccountList(){
			return $this->connection->select(
				"user_info.uniqueID, 
				 user_info.companyname, 
				 user_info.firstname, 
				 user_info.lastname, 
				 account_info.uniqueID,
				 account_info.cltcode", 
				"user_info, account_info", //tablename
				"user_info.uniqueID=account_info.uniqueID"); //where clause
		}
		
		/* ---- Get User Account ---- */
		public function getAccountData($uniqueID){
			return $this->connection->select("*",
			"account_info",
			"uniqueID = '$uniqueID'");
		}

		public function addFunds(){
			$this->getAccountList();
				if(isset($_POST)){
					$this->connection->insert("account_info", "uniqueID, amount, ORnum, refnum", "'$uid', '$amount', '$ORnum', '$refnum', '$remarks'");
				}
		}

	}
?>