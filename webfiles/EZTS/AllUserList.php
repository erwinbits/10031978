<?php 
include('../includes/layout.php'); 

	if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "0"){
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

use Functions\UserInfo;

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">List of Users</div>
                <div class="panel-body">
                    <form name="ItemList" acttion="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="company_name" data-sortable="true">COMPANY NAME</th>
                                    <th data-field="name" data-sortable="true">FIRST NAME</th>
                                    <th data-field="surname"  data-sortable="true">LAST NAME</th>
                                    <th data-field="email"  data-sortable="true">EMAIL</th>
                                    <th data-field="username"  data-sortable="true">USERNAME</th>
                                    <th data-field="pass"  data-sortable="true">PASSWORD</th>
                                    <th data-field="TIN" data-sortable="true">TIN</th>
                                    <th data-field="address" data-sortable="true">ADDRESS</th>
                                    <th data-field="country" data-sortable="true">COUNTRY</th>
                                    <th data-field="zip_code" data-sortable="true">ZIP CODE</th>
                                    <th data-field="telephone" data-sortable="true">TELEPHONE NO.</th>
                                    <th data-field="mobile" data-sortable="true">MOBILE NO.</th>
                                    <th data-field="companyemail" data-sortable="true">COMPANY EMAIL</th>
                                    <th data-field="ZONE_CODE" data-sortable="true">ZONE CODE</th>
                                    <th data-field="PEZACORNo" data-sortable="true">PEZA COR NO.</th>
                                    
                                    <th data-field="appDate"  data-sortable="true">CREATION DATE</th>
                                    <th data-field="status"  data-sortable="true">STATUS</th>
                                </tr>
                            </thead>
                            <?php
                                $userlist = new UserInfo;
                                $list = $userlist->getAllUserList(); 
                                
                                $stats = "";
                                $activatebtn = '';
                                foreach($list as $data){
                                    $id = $data['id'];
                                    $company_name = $data['company_name'];
                                    $TIN = $data['TIN'];
                                    $address = $data['address'];
                                    $country = $data['country'];
                                    $zip_code = $data['zip_code'];
                                    $telephone = $data['telephone'];
                                    $mobile = $data['mobile'];
                                    $companyemail = $data['companyemail'];
                                    $ZONE_CODE = $data['ZONE_CODE'];
                                    $PEZACORNo = $data['PEZACORNo'];
                                    $date_created = $data['date_created'];
                                    $name = $data['name'];
                                    $surname = $data['surname'];
                                    $status = $data['status'];
                                    
                                    $email = $userlist->getUserEmailbyID($id);
                                    $pass = $userlist->getUserPassbyID($id);
                                    $username = $userlist->getUserNamebyID($id);

                                    if($status == 1){
                                        $stats = "<font color='red'>INACTIVE ACCOUNT</font>";
                                    }elseif($status == 2){
                                        $stats = "<font color='green'>ACTIVE</font>";
                                    }elseif($status == 0){
                                        $stats = "<font color='blue'>REGISTERED</font>";
                                    }

                                echo "<tr>
                                        <td>$company_name</td>
                                        <td>$name</td>
                                        <td>$surname</td>
                                        <td>$email</td>
                                        <td>$username</td>
                                        <td>$pass</td>
                                        <td>$TIN</td>
                                        <td>$address</td>
                                        <td>$country</td>
                                        <td>$zip_code</td>
                                        <td>$telephone</td>
                                        <td>$mobile</td>
                                        <td>$companyemail</td>
                                        <td>$ZONE_CODE</td>
                                        <td>$PEZACORNo</td>
                                        <td>$date_created</td>
                                        <td>$stats</td>
                                     </tr>"; 
                                     
                                }
                            ?>     
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>