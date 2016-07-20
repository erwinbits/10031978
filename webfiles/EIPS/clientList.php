<?php 
   include('../../includes/layout2.php');

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
            include('../../includes/CashierSidebar.php');
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
	use Functions\eIP;

?>

<!-- CSS -->
<!-- <link href="../assets/css/sb-admin-2.css" rel="stylesheet"> -->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">

<br>
<br>
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">List of Customers</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="company_name" data-sort-order="">
                        <thead>
                            <tr>
                                <!--<th data-field="uniqueID" data-sortable="true">UNIQUE ID</th>-->
                                <th data-field="company_name"  data-sortable="true">COMPANY NAME</th>
                                <th data-field="usertype"  data-sortable="true">USER TYPE</th>
                                <th data-field="TIN"  data-sortable="true">TIN</th>
                                <th data-field="ZONE_CODE"  data-sortable="true">ZONE</th>
                                <th data-field="serviceFee"  data-sortable="true">FEE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        
                        <?php
                            $accountlist = new AccountInfo;
							$eip = new eIP;
                            $list = $accountlist->getCustomerList();
                          
                            foreach($list as $data){
                                $id = $data['id'];
                                $compname = $data['company_name'];
                                $TIN = $data['TIN'];
                                $ZONE_CODE = $data['ZONE_CODE'];
                                $cltcode = $data['cltcode'];
								$usertype = $data['usertype'];
								
								$fee = $eip->getclientFee($id);
                                    
								if($usertype == 'CE'){
									$user = "CLIENT ENTERPRISE";
								}else{
									$user = "ELSE";
								}
									
                                echo "<tr>
                                       
                                        <td>$compname</td>
                                        <td>$user</td>
                                        <td>$TIN</td>
                                        <td>$ZONE_CODE</td>
                                        <td>$fee</td>
                                        <td> <a class=\"btn btn-default btn-xs\" rel=\shadowbox\" href=\"editFee?cltcode=".$cltcode."&&compname=".$compname."&&id=".$id."\" title=\"Edit Fee\">Edit Fee</a></td>
                                     </tr>";

                                    
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->  
</div>

<?php include('../../includes/footer.php'); ?>
<?php include('../../script.php'); ?>

<script type="text/javascript" src="js/shadowbox.js"></script>