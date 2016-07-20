<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;

$itemID = $_GET['ItemID'];
$itemName = $_GET['itemName'];
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <br>
        <div class="panel panel-default">

           <div class="panel-heading text-center"><strong><?php echo $itemName?> -- <?php echo $itemID?></strong></div>
            <div class="panel-body">

                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="transactionID"  data-sortable="true">Transaction ID</th>
                            <th data-field="appDate"  data-sortable="true">Application Date</th>
                            <th data-field="quantity"  data-sortable="true">Quantity</th>
                            <th data-field="qtytobetransferred"  data-sortable="true">Quantity to be transferred</th>
                            
                            
                        </tr>
                    </thead>
                    
                    <?php

                        $inventory = new eZTD;
                        $itemID = $_GET['ItemID'];
                        $eLOAno = $_GET['eLOAno'];
                        $list = $inventory->CEeZTDtransactions($itemID, $eLOAno); 
                        // var_dump($list);

                        foreach($list as $data){
                            $transactionID = $data['transactionID'];
                            $itemID = $data['itemID'];
                            $quantity = $data['quantity'];
                            $qtytobetransferred = $data['qtytobetransferred'];
                            $currentBalance = $data['currentBalance'];
                            $appDate = $data['appDate'];
                            $status = $data['status'];


                            if($status == '4'){
                                $stat = "<font color='red'>  - Returned due to Permit Expiry </font>";
                            }elseif($status == '2'){
                                $stat = "<font color='red'>  - Returned due to Permit Rejection </font>";
                            }else{
                                $stat = '';
                            }

                           echo "<tr>
                                    <td> $transactionID </td>
                                    <td> $appDate </td>
                                    <td> $quantity </td>
                                    <td> $qtytobetransferred $stat</td>
                                   
                                </tr>";
                         }
                    ?>
                </table>
            </div>
        </div>

    </div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>