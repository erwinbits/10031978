 <?php 

include('../includes/ELSElayout.php'); 

$info = json_decode($MCrypt->decrypt($account));

        if($info->account == "0"){
            include('../includes/AdminSidebar.php');
        }elseif($info->account == "5"){
            include('../includes/CashierSidebar.php');
        }elseif($info->account == "1"){
            include('../includes/sidebar.php');
        }elseif($info->account == "6"){
            include('../includes/elseSidebar.php');
        }elseif($info->account == "7"){
            include('../includes/newsidebar.php');
        }else{
            include('../includes/BrokerSidebar.php');
        }

    use Functions\AccountInfo;
    $translist = new AccountInfo;
    $userid = $_SESSION['userid'];
    $cltcode = $account->getCompanyCode($userid);
    $ELSEname = $translist->getELSEnameUsingCltcode($cltcode);
   
?>

<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <br>
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="AccountPage">Account Transactions</a></li>
          <li role="presentation"><a href="PEZAaccountPage">PEZA Transactions</a></li>
          <li role="presentation" class="active"><a href="TransactionHistoryPage">Transaction History</a></li>
        </ul>
        
        <div class="panel panel-default">
           <div class="panel-heading text-center"><strong>VASP MONETARY TRANSACTIONS </strong></div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="approvedDate" data-sort-order="desc">
                    <h4><center>Letter Of Authority Transactions</center></h4>
                    <thead>
                        <tr>
                            <th data-field="appno" data-sortable="true">Application Number</th>
                            <th data-field="transtype2"  data-sortable="true">Transaction Type</th>
                            <th data-field="approvedDate"  data-sortable="true">Approval Date</th>
                            <th data-field="processingFee" data-sortable="true">Processing Fee</th>
                            <th>Acknowledgement Receipt</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $list = $translist->getTransactionDetailsELOAce($cltcode); 
                        foreach($list as $data){
                            $appno = $data['refnum'];
                            $approvedDate = $data['transactionDate'];
                            $processingFee = number_format($data['fee'],2);
                            $transtype2 = $data['transaction_type'];

                            

                           echo "<tr>
                                    <td>$appno</td>
                                    <td>$transtype2</td>
                                    <td>$approvedDate</td>
                                    <td>PHP$processingFee</td>
                                    <td><a href='/printxactionarvasp?refnum=".$appno."&&ELSEname=".$ELSEname."'>Download Receipt</a></td>
                                    
                                </tr>";

                        }
                    ?>
                </table>


                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="approvalDate" data-sort-order="desc">

                    <!------------------------ ZTD VASP MONETARY TRANSACTION -------------------->
                    <h4><center>EZTD Transactions</center></h4>
                    <thead>
                        <tr>
                            <th data-field="appno" data-sortable="true">Application Number</th>
                            <th data-field="transtype" data-sortable="true">Transaction Type</th>
                            <th data-field="approvalDate"  data-sortable="true">Approval Date</th>
                            <th data-field="processingFee" data-sortable="true">Processing Fee</th>
                            <th>Acknowledgement Receipt</th>
                        </tr>
                    </thead>
                    
                    <?php   
                        $list2 = $translist->PEZAtransactions($cltcode); 
                        foreach($list2 as $val){
                            $eLOAno = $val['LOAno'];
                            $appno = $val['appno'];
                            $approvalDate = $val['approvalDate'];
                            $processingFee = number_format($val['INSprocessingFee'],2);

                            

                           echo "<tr>
                                    <td>$appno</td>
                                    <td>EZTD Permit Processing Fee - VASP</td>
                                    <td>$approvalDate</td>
                                    <td>PHP$processingFee</td>
                                    <td><a href='/printxactionarvaspeztd?refnum=".$appno."&&ELSEname=".$ELSEname."'>Download Receipt</a></td>
                                </tr>";

                        }
                    ?>
                </table>
            </div>
        </div>

        <br>
        <br>
        <div class="panel panel-default">
           <div class="panel-heading text-center"><strong>PEZA MONETARY TRANSACTIONS</strong></div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="approvedDate" data-sort-order="desc">
                    <h4><center>Letter Of Authority Transactions</center></h4>
                    <thead>
                        <tr>
                            <th data-field="eLOAno" data-sortable="true">Application Number</th>
                            <th data-field="transtype"  data-sortable="true">Transaction Type</th>
                            <th data-field="approvedDate"  data-sortable="true">Approval Date</th>
                            <th data-field="processingFee" data-sortable="true">Processing Fee</th>
                            <th>Acknowledgement Receipt</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $list = $translist->getTransactionDetailsELOA($cltcode); 
                        foreach($list as $data){
                            $appno = $data['refnum'];
                            $approvedDate = $data['transactionDate'];
                            $processingFee = number_format($data['fee'],2);
                            $transtype2 = $data['transaction_type'];

                            

                           echo "<tr>
                                    <td>$appno</td>
                                    <td>$transtype2</td>
                                    <td>$approvedDate</td>
                                    <td>PHP$processingFee</td>
                                    <td><a href='/printxactionsar?refnum=".$appno."&&ELSEname=".$ELSEname."'>Download Receipt</a></td>
                                    
                                </tr>";

                        }
                    ?>
                </table>


                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="approvalDate" data-sort-order="desc">
                     <h4><center>EZTD Transactions</center></h4>
                    <thead>
                        <tr>
                            <th data-field="refnum" data-sortable="true">Application Number</th>
                            <th data-field="Ttype" data-sortable="true">Transaction Type</th>
                            <th data-field="approvalDate"  data-sortable="true">Approval Date</th>
                            <th data-field="processingFee" data-sortable="true">Processing Fee</th>
                            <th data-field="acknowledgement" data-sortable="true">Acknowledgement Receipt</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $list = $translist->getTransactionDetailsEZTD($cltcode);
                        foreach($list as $data){
                            $appno = $data['refnum'];
                            $approvalDate = $data['transactionDate'];
                            $processingFee = number_format($data['fee'],2);
                            $transtype = $data['transaction_type'];

                           echo "<tr>
                                    <td>$appno</td>
                                    <td>$transtype</td>
                                    <td>$approvalDate</td>
                                    <td>PHP$processingFee</td>
                                    <td><a href='/printxactionsareztd?refnum=".$appno."&&ELSEname=".$ELSEname."'>Download Receipt</a></td>
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