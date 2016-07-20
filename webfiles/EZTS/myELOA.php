<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;
$items = new eZTD;

if(isset($_GET['forApproval'])){

$list = $items->myELOAListForApproval();

}elseif(isset($_GET['Rejected'])){

$list = $items->myELOAListRejected();

}elseif(isset($_GET['Approved'])){

$list = $items->myELOAList();

}else{

$list = $items->getMyELOAs();

}

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12">

            <!-- <h2>e-LOA</h2>
            <hr> -->
            <?php

            if(isset($_GET['forApproval'])){

                echo '<ul class="nav nav-tabs">
                <li role="presentation" ><a href="myELOA">My eLOAs</a></li>
                <li role="presentation" ><a href="myELOA?Approved">Approved/Used eLOAs</a></li>
                <li role="presentation" class="active"><a href="myELOA?forApproval">eLOAs For Approval</a></li>
                <li role="presentation"><a href="myELOA?Rejected">Rejected eLOAs</a></li>
                </ul>';

            }elseif(isset($_GET['Rejected'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="myELOA">My eLOAs</a></li>
              <li role="presentation" ><a href="myELOA">Approved/Used eLOAs</a></li>
              <li role="presentation"><a href="myELOA?forApproval">eLOAs For Approval</a></li>
              <li role="presentation" class="active"><a href="myELOA?Rejected">Rejected eLOAs</a></li>
            </ul>';

        }elseif(isset($_GET['Approved'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="myELOA">My eLOAs</a></li>
              <li role="presentation" class="active" ><a href="myELOA?Approved">Approved/Used eLOAs</a></li>
              <li role="presentation"><a href="myELOA?forApproval">eLOAs For Approval</a></li>
              <li role="presentation"><a href="myELOA?Rejected">Rejected eLOAs</a></li>
            </ul>';

        }else{

                echo '<ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="myELOA">My eLOAs</a></li>
                <li role="presentation" ><a href="myELOA?Approved">Approved/Used eLOAs</a></li>
                <li role="presentation"><a href="myELOA?forApproval">eLOAs For Approval</a></li>
                <li role="presentation" ><a href="myELOA?Rejected">Rejected eLOAs</a></li>
                </ul>';
        }

            ?>

            <div class="panel panel-default">
               <div class="panel-heading text-center"><strong>E-LETTER OF AUTHORITY</strong></div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-show-export="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
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
                                        }elseif($status == 3){
                                            $stat = "<font color='green'>EXPIRED</font>";
                                            $btn = "";
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




           <!--  <div class="panel panel-default">
                <div class="panel-heading">List of Letters of Authority</div>
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
                                    <th data-field="status"  data-sortable="true">Status</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <?php
                                $items = new eZTD;
        						$list = $items->myELOAList();
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

                                         // $list = $items->clienInfo($id);
                                         //    foreach($list as $data){
                                         //        $name = $data['company_name'];
                                         //        $zone = $data['ZONE_CODE'];

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

                                           // echo $tablerow;
                                        //}
                                    }
                            ?>      
                        </table>
                    
                </div>
            </div> -->

        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<script src="../assets/js/extensions/export/bootstrap-table-export.js"></script>
<script type="text/javascript" src="../assets/js/libs/FileSaver/FileSaver.min.js"></script>
<script type="text/javascript" src="../assets/js/libs/jsPDF/jspdf.min.js"></script>
<script type="text/javascript" src="../assets/js/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script type="text/javascript" src="../assets/js/tableExport.min.js"></script>
<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>