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
                        <th>General Description</th>
                        <th>HSCODE</th>
                        <th>Item Code</th>
                        <th>Quantity</th>
                        <th>Unit of Measure</th>
                        <th>Unit Price</th>
                        
                    </tr>
                </thead>
               
                <?php

                	$data = new eZTD;
                	$appno = $_GET['appno'];
                	$view = $data->viewLOAitems($appno);
                    //var_dump($view);
                	
                	foreach ($view as $value) {
                		$itemCode = $value['itemCode'];
                		$description = $value['description'];
                		$HSCODE = $value['HSCODE'];
                		$quantity = $value['quantity'];
                        $UOM = $value['UOM'];
                        $unitPrice = $value['unitPrice'];

                   echo "<tr>
                            <td>$description </td>
                            <td>$HSCODE</td>
                            <td>$itemCode</td>
                            <td>$quantity</td>
                            <td>$UOM</td>
                            <td>$unitPrice</td>
                            
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