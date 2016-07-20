<?php 

use Functions\UserInfo;

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Wrapper-->
<!-- <div id="page-wrapper"> -->
    <div class="row">
        <div class="col-lg-12">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">List of Users</div>
                <div class="panel-body">
                    <form name="ItemList" acttion="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            
                            <thead>
                                <tr>
                                    <th data-field="name" data-sortable="true">FIRST NAME</th>
                                    <th data-field="middle_name" data-sortable="true">MIDDLE NAME</th>
                                    <th data-field="surname"  data-sortable="true">LAST NAME</th>
                                    <th data-field="company_name"  data-sortable="true">COMPANY NAME</th>
                                    <th data-field="status"  data-sortable="true">STATUS</th>
                                </tr>
                            </thead>

                            <?php
                                $userlist = new UserInfo;
                                $list = $userlist->getUserList(); 

                                $stats = "";
                                $activatebtn = '';
                                foreach($list as $data){
                                    $id = $data['id'];
                                    $compname = $data['company_name'];
                                    $fname = $data['name'];
                                    $lname = $data['surname'];
                                    $status = $data['status'];
                                    $middle = $data['middle_name'];
                                    
                                    if($status == 1){
                                        $stats = 'INACTIVE ACCOUNT';
                                    }elseif($status == 2){
                                        $stats = 'ACTIVE';
                                    }


                                echo "<tr>
                                        <td><a href=\"ActivateUserAccount?id=".$id."\">$fname</a></td>
                                        <td> $middle </td>
                                        <td>$lname</td>
                                        <td>$compname</td>
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

<?php include('../script.php');?>