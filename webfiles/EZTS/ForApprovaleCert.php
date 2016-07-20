<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

	use Functions\eZTD;

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <h2>e-Certificate</h2>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">List of For Approval Items</div>
                <div class="panel-body">
                    
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="HSCODE" data-sortable="true">General Description</th>
                                    <th data-field="itemCode" data-sortable="true">Item Code</th>
                                    <th data-field="description"  data-sortable="true">Description</th>
                                    <th data-field="quantity"  data-sortable="true">Quantity</th>
                                    <th data-field="UOM"  data-sortable="true">Unit of Measure</th>
                                    <th data-field="Remarks"  data-sortable="true">Remarks</th>
                                    <th data-field="status"  data-sortable="true">Status</th>
                                </tr>
                            </thead>

                            <?php
                                $items = new eZTD;
        						$list = $items->ForApprovaleCert();
                                	$rem = "";
                                    $status = "";

                                    foreach($list as $data){
                                    	$id = $data['id'];
                                    	$genDesc = $data['genDesc'];
                                    	$itemCode = $data['itemCode'];
                                    	$description = $data['description'];
                                    	$quantity = $data['quantity'];
                                        $UOM = $data['UOM'];
                                    	$Remarks = $data['Remarks'];
                                    	$status = $data['status'];

                                        //Remarks
        	                            if($Remarks == ""){
        	                                $rem ="No remarks";
        	                            }else{
        	                                $rem = "$Remarks";
        	                            }

                                        //Account Status
                                        if($status == 0){
                                            $stat = "For Approval";
                
                                        }elseif($AccStatus == 0 and $Remarks = "$rem"){
                                            $stat = "Rejected";
                                        }else{
                                            $stat = "APPROVED";
                                        }

                                        $tablerow = "<tr>
                                            <td> $genDesc </td>
                                            <td> $itemCode </td>
                                            <td> $description </td>
                                            <td> $quantity </td> 
                                            <td> $UOM </td>
                                            <td> $rem </td>
                                            <td> $stat </td>
                                        </tr>";

                                        echo $tablerow;
                                    }
                            ?>      
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>