<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

	use Functions\Importables;

   $items = new Importables;
   $list = $items->ForApproval();

    if(isset($_POST['delete'])){

        if($items->deleteItem($_POST['delete'])){

            echo '<script language="javascript">';
            echo 'alert("Successfully deleted");';
            echo 'window.location.href = "/ForApproval";';
            echo '</script>';
        }else{
             echo "<script type='text/javascript'>alert('Failed to delete');</script>";
        }

}

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">

                    <h3>For Approval / Rejected Items</h3>
                    <hr>
                    <p>Below is the list of the items that have not been approved.</p>
                    <br>
                         <form class="form-horizontal" id="" name="" action="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="itemName" data-sortable="true">Item Name</th>
                                    <th data-field="description"  data-sortable="true">Description</th>
                                    <th data-field="HSCODE" data-sortable="true">HS Code</th>
                                    <th data-field="TAR_Ext"  data-sortable="true">TAR Ext</th>
                                    <th data-field="itemCode" data-sortable="true">Item Code</th>
                                    <th data-field="regAct"  data-sortable="true">Registered Activity</th>
                                    <th data-field="frequency"  data-sortable="true">Frequency</th>
                                    <th data-field="AccStatus"  data-sortable="true">Status</th>
                                </tr>
                            </thead>

                            <?php
                            

                                foreach($list as $data){
                                    $itemName = $data['itemName'];
                                    $HSCODE = $data['HSCODE'];
                                    $itemCategory = $data['itemCategory'];
                                    $itemCode = $data['itemCode'];
                                    $description = $data['description'];
                                    $regAct = $data['regAct'];
                                    $TAR_Ext = $data['TAR_Ext'];
                                    $frequency = $data['frequency'];
                                    $Remarks = $data['Remarks'];
                                    $AccStatus = $data['AccStatus'];
                                    $itemID = $data['ItemID'];

                                     //Account Status
                                   if($AccStatus == 0){
                                        $status = "<font color='orange'>FOR APPROVAL</font>";
                                        $btn = "";
                                   }elseif($AccStatus == 2){
                                        $status = "<font color='red'>REJECTED</font>";
                                        $btn = "<button type='submit' name='delete' value='$itemID' class=\"btn btn-danger btn-xs\" title=\"Delete\"><i class=\"fa fa-remove\" onclick=\"return confirm('Are you sure you want to delete this item?')\" ></i></button>";   
                                    }else{
                                        $status = "";
                                        $btn = "";
                                    }

                                    $tablerow = "<tr>
                                        <td> $itemName </td>
                                        <td> $description</td>
                                        <td> $HSCODE </td>
                                        <td> $TAR_Ext </td>
                                        <td> $itemCode</td>
                                        <td> $regAct </td> 
                                        <td> $frequency </td>
                                        <td> $status $btn</td>
                                    </tr>";

                                    echo $tablerow;
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