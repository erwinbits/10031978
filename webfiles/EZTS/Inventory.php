 <?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

    use Functions\AccountInfo;
    
    $userid = $_SESSION['userid'];
    $cltcode = $account->getCompanyCode($userid);
?>

<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <br>
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="AccountPage">Account Transactions</a></li>
          <li role="presentation"><a href="PEZAtransactions">PEZA Transactions</a></li>
          <li role="presentation" class="active"><a href="Inventory">Inventory</a></li>
        </ul>
        
        <div class="panel panel-default">
           <div class="panel-heading text-center"><strong>INVENTORY DETAILS</strong></div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="ItemID" data-sortable="true">Item ID</th>
                            <th data-field="quantity"  data-sortable="true">Stocked Items</th>
                            <th data-field="endingBalance" data-sortable="true">Remaining Items</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $translist = new AccountInfo;
                        $list = $translist->InventoryDetails($cltcode); 
                        foreach($list as $data){
                            $quantity = $data['beginningBal'];
                            $endingBalance = $data['endingBal'];
                            $ItemID = $data['ItemID'];

                           echo "<tr>
                                    <td align=\"center\">$ItemID</td>
                                    <td align=\"center\">$quantity</td>
                                    <td align=\"center\">$endingBalance</td>
                                </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>


        <div class="panel panel-default">
           <div class="panel-heading text-center"><strong>PEZA TRANSACTION DETAILS</strong></div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="transactionID" data-sortable="true">Transaction ID</th>
                            <th data-field="itemID" data-sortable="true">Item ID</th>
                            <th data-field="quantity"  data-sortable="true">Stocked Items</th>
                            <th data-field="endingBalance" data-sortable="true">Remaining Items</th>
                            <th data-field="qtytobetransferred" data-sortable="true">qtytobetransferred Items</th>
                            <th data-field="approveDate" data-sortable="true">Approval Date</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $translist = new AccountInfo;
                        $list = $translist->PEZAviewTransDetails($cltcode); 
                        foreach($list as $data){
                            $transactionID = $data['transactionID'];
                            $ItemID = $data['itemID'];
                            $quantity = $data['quantity'];
                            $endingBalance = $data['endingBalance'];
                            $approveDate = $data['approveDate'];
                            $qtytobetransferred = $data['qtytobetransferred'];

                           echo "<tr>
                                    <td align=\"center\">$transactionID</td>
                                    <td align=\"center\">$ItemID</td>
                                    <td align=\"center\">$quantity</td>
                                    <td align=\"center\">$endingBalance</td>
                                    <td align=\"center\">$qtytobetransferred</td>
                                    <td align=\"center\">$approveDate</td>
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