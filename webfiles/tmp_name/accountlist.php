<?php include('../layout.php'); include('../includes/PAL.php'); include('../includes/CashierSidebar.php');?>
<!-- CSS -->
<link href="../assets/css/sb-admin-2.css" rel="stylesheet">

<?php 
    require("../../library.php");
    use Functions\AccountInfo;
?>

<br>
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">List of Users</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="uniqueID" data-sortable="true">UNIQUE ID</th>
                                <th data-field="companyname"  data-sortable="true">COMPANY NAME</th>
                                <th data-field="firstname" data-sortable="true">FIRST NAME</th>
                                <th data-field="lastname"  data-sortable="true">LAST NAME</th>
                                <th data-field="cltcode"  data-sortable="true">CLTCODE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        
                        <?php
                            $accountlist = new AccountInfo;
                            $list = $accountlist->getAccountList(); 
                            foreach($list as $data){
                                $id = $data['uniqueID'];
                                $compname = $data['companyname'];
                                $fname = $data['firstname'];
                                $lname = $data['lastname'];
                                $cltcode = $data['cltcode'];
                                echo "<tr>
                                        <td align=\"center\">$id</td>
                                        <td align=\"center\">$compname</td>
                                        <td align=\"center\">$fname</td>
                                        <td align=\"center\">$lname</td>
                                        <td align=\"center\">$cltcode</td>
                                        <td> <a class=\"btn btn-default btn-xs\" href=\"AddFund?id=".$id."\" title=\"Add Fund\"><i class=\"fa fa-register\">Add Fund</i></a> </td>
                                     </tr>"; 
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->  
</div><!--Page Wrapper-->

<?php include('../includes/footer.php');?>