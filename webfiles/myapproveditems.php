<?php
	require("../library.php");

	use Functions\AutoComplete;
	use Functions\Importables;

	use Functions\UserAccount;
	
	$account = new UserAccount;
	
	
	
	if(!$account->userIsLoged()){
		header("Location: /login");
		exit;
	
	}

	$items = new Importables;
    $list = $items->ApprovedItems();

	foreach($list as $data){

		//$result[] = array('value' => $file['HS_Code'], 'label' => $file['TAR_DSC'], 'TAR_Ext' => $file['TAR_Ext']);
		$result[] = array(
			'itemName' => $data['itemName'],
            'HSCODE' => $data['HSCODE'],
            'itemCategory' => $data['itemCategory'],
            'itemCode' => $data['itemCode'],
            'description' => $data['description'],
            'regAct' => $data['regAct'],
            'TAR_Ext' => $data['TAR_Ext'],
            'frequency' => $data['frequency'],
            'Remarks' => $data['Remarks'],
            'AccStatus' => $data['AccStatus'],
            'ItemID' => $data['ItemID'],
            'submissionDate' => $data['submissionDate']
            );
	}
	echo json_encode($result);
	

?>