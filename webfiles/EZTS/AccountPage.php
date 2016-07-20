<?php 

include('../includes/ClientLayout.php'); 

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
          <li role="presentation" class="active"><a href="AccountPage">VASP Account</a></li>
          <li role="presentation"><a href="PEZAaccountPage">PEZA Account</a></li>
          <li role="presentation"><a href="TransactionHistoryPage">Transaction History</a></li>
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
                        $list = $accountlist->viewAccountInfo($cltcode); 

                        foreach($list as $data){
                            $endingBal = $data['endingBal'];
                            $LastReload = $data['LastReload'];

                            echo 
                                "<tr>
                                <td align=\"center\">$endingBal</td>
                                <td align=\"center\">$LastReload</td>
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
                            <th data-field="amount"  data-sortable="true">Amount</th>
                            <th data-field="ORnum" data-sortable="true">OR Number</th>
                            <th data-field="refnum" data-sortable="true">Reference Number</th>
                            <th data-field="remarks" data-sortable="true">Remarks</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $translist = new AccountInfo;
                        $list = $translist->viewTransDetails($cltcode); 

                        foreach($list as $data){
                            $amount = $data['amount'];
                            $ORnum = $data['ORnum'];
                            $refnum = $data['refnum'];
                            $remarks = $data['remarks'];
                               echo "<tr>
                                        <td align=\"center\">$amount</td>
                                        <td align=\"center\">$ORnum</td>
                                        <td align=\"center\">$refnum</td>
                                        <td align=\"center\">$remarks</td>
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