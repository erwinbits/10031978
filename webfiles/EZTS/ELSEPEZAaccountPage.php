 <?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

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
          <li role="presentation"><a href="ELSEaccountPage">VASP Account</a></li>
          <li role="presentation" class="active"><a href="ELSEPEZAaccountPage">PEZA Account</a></li>
          <li role="presentation"><a href="ELSEtransactionHistoryPage">Transaction History</a></li>
        </ul>


        <div class="panel panel-default">

           <div class="panel-heading text-center"><strong>STATUS SUMMARY OF ACCOUNT</strong></div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="endingBal"  data-sortable="true">Account Balance</th>
                            <th data-field="LastReload" data-sortable="true">Last Reload</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $accountlist = new AccountInfo;
                        $list = $accountlist->viewPezaAccountInfo($cltcode); 

                        foreach($list as $data){
                            $endingBal = number_format($data['runningBal'],2);
                            $LastReload = $data['lastReload'];

                            echo 
                                "<tr>
                                <td>PHP$endingBal</td>
                                <td>$LastReload</td>
                                </tr>";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
        <br>

        <div class="panel panel-default">

           <div class="panel-heading text-center"><strong>LOADING TRANSACTION HISTORY</strong></div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="refNo" data-sortable="true">Reference Number</th>
                            <th data-field="amount"  data-sortable="true">Amount</th>
                            <th data-field="orNo" data-sortable="true">OR Number</th>
                            <th data-field="remarks" data-sortable="true">Remarks</th>
                            <th data-field="receipt" data-sortable="true">Acknowledgement Receipt</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $translist = new AccountInfo;
                        $list = $translist->viewPezaTransDetails($cltcode); 

                        foreach($list as $data){
                            $amount = number_format($data['amount'],2);
                            $orNo = $data['orNo'];
                            $refNo = $data['refNo'];
                            $remarks = $data['remarks'];
                            $cltcode = $data['cltcode'];
                               echo "<tr>
                                        <td>$refNo</td>
                                        <td>PHP$amount</td>
                                        <td>$orNo</td>
                                        <td>remarks</td>
                                        <td><a href ='/printar?ORNo=".$orNo."&&cltcode=".$cltcode."'>Download Receipt</a></td>
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