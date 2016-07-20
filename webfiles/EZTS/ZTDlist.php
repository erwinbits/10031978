<?php
require("../../library.php");
use Functions\eZTD;
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/AdminLTE.min.css" rel="stylesheet">
    <br>
    <br>

	<div class="panel panel-default">
        <div class="panel-heading text-center"><h4><strong>ITEM LIST</strong></h4></div>
        <div class="panel-body">
            <table class="table table-hover">
           
                <thead>
                    <tr>
                        <!-- <th>General Description</th> -->
                        <th>Item Name</th>
                        <th>Ending Quantity</th>
                        <th>Qty to be transferred</th>                        
                        <th>Unit of Measure</th>
                        <th>Unit Value</th>
                        
                    </tr>
                </thead>
               
                <?php

                	$data = new eZTD;
                	$appno = $_GET['appno'];
                	$view = $data->ListeZTDitems($appno);
                    //var_dump($view);
                	
                	foreach ($view as $value) {
                		//$itemCode = $value['itemCode'];
                		$description = $value['description'];
                		$qtyToBeTransferred = $value['qtyToBeTransferred'];
                		$quantity = $value['quantity'];
                        $UOM = $value['UOM'];
                        $unitValue = $value['unitValue'];

                   echo "<tr>
                            <td>$description </td>
                            <td>$quantity</td>
                            <td>$qtyToBeTransferred</td>                            
                            <td>$UOM</td>
                            <td>$unitValue</td>
                            
                        </tr>";

                    }
                   ?>
            </table>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>