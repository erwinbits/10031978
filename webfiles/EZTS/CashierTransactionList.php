<?php 
    include('../includes/layout.php');

    if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "5"){
        echo "You dont have access on this page";
        header("Location: /401");
    }

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
?>

<!-- CSS -->
<!-- <link href="../assets/css/sb-admin-2.css" rel="stylesheet"> -->
<link href="css/AdminLTE.min.css" rel="stylesheet">

<br>
<br>
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">List of Transactions</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="DateCreated" data-sort-order="desc">
                        <thead>
                            <tr>
                                <!--<th data-field="uniqueID" data-sortable="true">UNIQUE ID</th>-->
                                <th data-field="company_name"  data-sortable="true">COMPANY NAME</th>
                                <!-- <th data-field="TIN"  data-sortable="true">TIN</th> -->
                                <th data-field="amount"  data-sortable="true">AMOUNT</th>
                                <th data-field="ORnum"  data-sortable="true">OR Number</th>
                                <th data-field="refnum"  data-sortable="true">REFERENCE NUMBER</th>
                                <th data-field="DateCreated"  data-sortable="true">DATE CREATED</th>
                            </tr>
                        </thead>
                        
                        <?php
                            $accountlist = new AccountInfo;
                            $list = $accountlist->getCustomerList();
                            foreach($list as $data){
                                $id = $data['id'];
                                $compname = $data['company_name'];
                                //$TIN = $data['TIN'];
                                $cltcode = $data['cltcode'];
                                    
                                    $list2 = $accountlist->viewTransDetails($cltcode);
                                    foreach ($list2 as $value) {
                                        $amount = $value['amount'];
                                        $ORnum = $value['ORnum'];
                                        $refnum = $value['refnum'];
                                        $DateCreated = $value['DateCreated'];
                                    
                                echo "<tr>
                                       
                                        <td>$compname</td>
                                        <td>$amount</td>
                                        <td>$ORnum</td>
                                        <td>$refnum</td>
                                        <td>$DateCreated</td>
                                    </tr>";

                                    }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->  
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>