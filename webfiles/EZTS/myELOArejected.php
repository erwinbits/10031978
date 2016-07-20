<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <!-- <h2>e-LOA</h2>
            <hr> -->
            <br>
            <ul class="nav nav-tabs">
              <li role="presentation"><a href="myELOA">Approved/Used LOA</a></li>
              <li role="presentation"><a href="myELOAforApproval">For Approval LOA</a></li>
              <li role="presentation" class="active"><a href="myELOArejected">Rejected LOA</a></li>
            </ul>

            <div class="panel panel-default">
               <div class="panel-heading text-center"><strong>E-LOA</strong></div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="appno" data-sortable="true">Application Number</th>
                                <th data-field="eLOAno" data-sortable="true">e-LOA Number</th>
                                <th data-field="ecertno" data-sortable="true">e-Certificate Number</th>
                                <th data-field="ELSEname" data-sortable="true">ELSE Name</th>
                                <th data-field="ELSEzone" data-sortable="true">ELSE Zone</th>
                                <th data-field="appDate"  data-sortable="true">Application Date</th>
                                <th data-field="approvedDate"  data-sortable="true">Approval Date</th>
                                <th data-field="LOAValidity"  data-sortable="true">LOA Validity</th>
                                <th data-field="remarks"  data-sortable="true">Remarks</th>
                                <th data-field="tag"  data-sortable="true">Tag</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <?php
                                $items = new eZTD;
                                $list = $items->myELOAListRejected();
                                    $rem = "";
                                    $status = "";

                                    foreach($list as $data){
                                        $id = $data['id'];
                                        $appno = $data['appno'];
                                        $eLOAno = $data['eLOAno'];
                                        //$TIN = $data['TIN'];
                                        $appDate = $data['appDate'];
                                        $approvedDate = $data['approvedDate'];
                                        $remarks = $data['Remarks'];
                                        $status = $data['status'];
                                        $LOAValidity = $data['LOAValidity'];
                                        $ELSEname = $data['ELSEname'];
                                        $ELSEzone = $data['ELSEzone'];
                                        $ecertno = $data['ecertno'];
                                        

                                        //Remarks
                                        if($remarks == ""){
                                            $rem ="";
                                        }else{
                                            $rem = "$remarks";
                                        }

                                        //Account Status
                                        if($status == 0){
                                            $stat = "<font color='#FFA500'>FOR APPROVAL</font>";
                                            $btn = "<a class=\"btn btn-warning btn-xs\" href=\"LOAlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\"><i class=\"fa fa-list-alt\"></i></a>";
                                        }elseif($status == 2){
                                            $stat = "<font color='red'>REJECTED</font>";
                                            $btn = "<a class=\"btn btn-danger btn-xs\" href=\"#myECERT?action=delete&appno=".$appno."\" title=\"Delete\"><i class=\"fa fa-remove\"></i></a>";
                                        }elseif($status == 1){
                                            $stat = "<font color='green'>APPROVED</font>";
                                            $btn = "<a class=\"btn btn-success btn-xs\" href=\"printeloa?eLOANo=".$eLOAno." && ELSEname=".$ELSEname." &&appno=".$appno." &&ecertno=".$ecertno."\" title=\"Print\"><i class=\"fa fa-print\"></i></a>";
                                        }

                                        //Approval Date
                                        if($approvedDate == "0000-00-00 00:00:00"){
                                            $approval = "";
                                        }else{
                                            $approval = "$approvedDate";
                                        }

                                            $tablerow = "<tr>
                                                <td> <a href=\"LOAlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a> </td>
                                                <td> <a href=\"printeloa?eLOANo=".$eLOAno." && ELSEname=".$ELSEname." &&appno=".$appno." &&ecertno=".$ecertno."\" >$eLOAno </td>
                                                <!--<td> $eLOAno </td>-->
                                                <td> $ecertno </td>
                                                
                                                <td> $ELSEname </td>
                                                <td> $ELSEzone </td>
                                                <td> $appDate </td>
                                                <td> $approval </td>
                                                <td> $LOAValidity </td>
                                                <td> $rem </td>
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