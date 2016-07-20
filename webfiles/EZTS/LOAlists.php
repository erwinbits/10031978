<?php
require("../../library.php");
use Functions\eZTD;
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
    <br>
    <br>
    <br>
	<div class="panel panel-default">
        <div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
        <div class="panel-body">
            <table class="table table-striped table-hover text-center" style="margin:0 auto;">
           
                <thead>
                    <tr>
                        <th>General Description</th>
                        <th>Specific Description</th>
                        <th>HSCODE</th>
                        <th>Item Code</th>
                        <th>Quantity</th>
                        
                    </tr>
                </thead>
               
                <?php

                	$data = new eZTD;
                	$appno = $_GET['appno'];
                	$view = $data->ListeLOAitemsForApproval($appno);
                	
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