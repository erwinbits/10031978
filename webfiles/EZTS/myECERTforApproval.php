<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;
use Functions\UserAccount;

$items = new eZTD;

if(isset($_POST['delete'])){

    if($items->deleteeCERT($_POST['delete'])){
        $message = "Successfully Deleted";
		echo "<script type='text/javascript'>alert('$message');</script>";
    }

}
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            
            <!-- <h2>e-Certificate</h2>
            <hr> -->
            <br>
            <div class="alert alert-info" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Notice:</span>
                <strong>Heads up!</strong> 
                If you want to create an eCert click
                <a href='/ApprovedItems' class="alert-link">here</a>.
            </div>
            <br>

            <ul class="nav nav-tabs">
              <li role="presentation"><a href="myECERT">Approved/Used eCERTs</a></li>
              <li role="presentation" class="active"><a href="myECERTforApproval">eCERTS For Approval</a></li>
              <li role="presentation"><a href="myECERTrejected">Rejected eCERTs</a></li>
            </ul>

            <div class="panel panel-default">
               <div class="panel-heading text-center"><strong>E-CERTIFICATE</strong></div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="appno" data-sortable="true">Application No.</th>
                                <th data-field="ecertno" data-sortable="true">e-Certificate No</th>
                                <th data-field="ELSEname" data-sortable="true">ELSE Name</th>
                                <th data-field="ZoneLoc"  data-sortable="true">ELSE Zone</th>
                                <th data-field="appDate"  data-sortable="true">Application Date</th>
                                <th data-field="approveDate"  data-sortable="true">Approval Date</th>
                                <th data-field="remarks"  data-sortable="true">Remarks</th>
                                <th data-field="taggedBy"  data-sortable="true">Tagged By</th>
                                <th data-field="status"  data-sortable="true">Tag</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <?php
                                $items = new eZTD;

                                if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                                    $items->deleteeCERT($appno);
                                    $appno = $_GET['appno'];
                                }

                                $list = $items->myECERTListForApproval();
                               
                                    $rem = "";
                                    $status = "";
                                    $btn = "";

                                    foreach($list as $data){
                                        $id = $data['id'];
                                        $appno = $data['appno'];
                                        $ecertno = $data['ecertno'];
                                        $ELSEname = $data['ELSEname'];
                                        $procurement = $data['procurement'];
                                        $ZoneLoc = $data['ZoneLoc'];
                                        $date = $data['appDate'];
                                        $approvalDate = $data['approvalDate'];
                                        $status = $data['status'];
                                        $TIN = $data['TIN'];
                                        $remarks = $data['remarks'];
                                        $taggedBy = $data['taggedBy'];

                                        //Remarks
                                        if($remarks == ""){
                                            $rem ="";
                                        }else{
                                            $rem = "$remarks";
                                        }

                                        //Account Status
                                        if($status == 1){
                                            $stat = "<font color='green'>APPROVED</font>";
                                            $btn = "<a class=\"btn btn-success btn-xs\" href=\"printecert?ecertno=".$ecertno." && ELSEname=".$ELSEname."\" title=\"Print\"><i class=\"fa fa-print\"></i></a>";
                                        }elseif($status == 2){
                                            $stat = "<font color='#FF0000'>REJECTED</font>";
                                            $btn = "<button type='submit' name='delete' value=$appno onclick = 'deleteapp()' class=\"btn btn-danger btn-xs\" title=\"Delete\"><i class=\"fa fa-remove\"></i></button>";
                                        }elseif($status == 3){
                                            $stat = "<font color='green'>APPROVED</font>";
                                            $btn = "<font color='orange'>LOA IS FOR APPROVAL</font>";
                                        }elseif($status == 4){
                                            $stat = "<font color='#FF0000'><bold>USED</bold></font>";
                                            $btn = "<a class=\"btn btn-danger btn-xs\" href=\"printecert?ecertno=".$ecertno." && ELSEname=".$ELSEname."\" title=\"Print\"><i class=\"fa fa-print\"> ARCHIVED</i></a>";
                                        }elseif($status == 5){
                                            $stat = "<font color='green'><bold>APPROVED</bold></font>";
                                            $btn = "<font color='FF0000'>LOA IS REJECTED</font>";
                                        }else{
                                            $stat = "FOR APPROVAL";
                                            $btn = "FOR APPROVAL";
                                        }
                                        
                                

                                        //Approval Date
                                        if($approvalDate == "0000-00-00 00:00:00"){
                                            $approval = "";
                                        }else{
                                            $approval = "$approvalDate";
                                        }

                                    $tablerow = "<tr>
                                                    <td> <a href=\"itemlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a> </td>
                                                    <input type='hidden' name='procurement' value='$procurement'>
                                                   <td> <a href=\"printecert?ecertno=".$ecertno." && ELSEname=".$ELSEname." &&id=".$id."\" >$ecertno </td>
                                                   <!-- <td> $ecertno </td>-->
                                                    <td> $ELSEname </td>
                                                    <td> $ZoneLoc </td>
                                                    <td> $date </td>
                                                    <td> $approval </td>
                                                    <td> $rem </td>
                                                    <td> $taggedBy </td>
                                                    <td> $stat </td>
                                                    <td> $btn </td>
                                                </tr>";

                                                echo $tablerow;
                                    }
                            ?>  
                        
                    </table>
                </div>
            </div>
            <br>

        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>