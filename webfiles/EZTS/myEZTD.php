<?php 
$msg = false;
include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;
use Functions\Dashboard;

$items = new eZTD;
$Dashboard = new Dashboard;

if(isset($_GET['forApproval'])){

$list = $items->myEZTDListForApproval();

}elseif(isset($_GET['Rejected'])){

$list = $items->myEZTDListRejected();

}elseif(isset($_GET['Approved'])){

$list = $items->myEZTDList();

}elseif(isset($_GET['EZTDsforReceiving'])){

$list = $Dashboard->getEZTDsforReceivingCE();


}else{

$list = $items->getMyEZTDs();
}

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br>

            <?php

            if(isset($_GET['forApproval'])){

                echo '<ul class="nav nav-tabs">
                <li role="presentation" ><a href="myEZTD">My eZTDs</a></li>
                <li role="presentation" ><a href="myEZTD?Approved">Approved/Used eZTDs</a></li>
                <li role="presentation" class="active"><a href="myEZTD?forApproval">eZTDs For Approval</a></li>
                <li role="presentation"><a href="myEZTD?Rejected">Rejected eZTDs</a></li>
                </ul>';

            }elseif(isset($_GET['Rejected'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="myEZTD">My eZTDs</a></li>
              <li role="presentation" ><a href="myEZTD">Approved/Used eZTDs</a></li>
              <li role="presentation"><a href="myEZTD?forApproval">eZTDs For Approval</a></li>
              <li role="presentation" class="active"><a href="myEZTD?Rejected">Rejected eZTDs</a></li>
            </ul>';

        }elseif(isset($_GET['Approved'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="myEZTD">My eZTDs</a></li>
              <li role="presentation" class="active" ><a href="myEZTD?Approved">Approved/Used eZTDs</a></li>
              <li role="presentation"><a href="myEZTD?forApproval">eZTDs For Approval</a></li>
              <li role="presentation"><a href="myEZTD?Rejected">Rejected eZTDs</a></li>
            </ul>';

        }else{

                echo '<ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="myEZTD">My eZTDs</a></li>
                <li role="presentation" ><a href="myEZTD?Approved">Approved/Used eZTDs</a></li>
                <li role="presentation"><a href="myEZTD?forApproval">eZTDs For Approval</a></li>
                <li role="presentation" ><a href="myEZTD?Rejected">Rejected eZTDs</a></li>
                </ul>';
        }

            ?>
			
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>ZONE TRANSFER DOCUMENTS</strong></div>
                <div class="panel-body">
                    <form role="form" action="receiveEZTD" method="POST" enctype="multipart/form-data">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-export="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                        <thead>
                            <tr>
								<th data-field="appno" data-sortable="true">Application Number</th>
                                <th data-field="ZTDno" data-sortable="true">e-ZTD Number</th>
                                <th data-field="LOAno" data-sortable="true">e-LOA Number</th>
                                <th data-field="clientName" data-sortable="true">ELSE Name</th>
                                <th data-field="ELSEZone"  data-sortable="true">ELSE Zone</th>
                                <th data-field="CommInvoice" data-sortable="true">Invoice No.</th>
                                <th data-field="DeliveryReceipt"  data-sortable="true">D. R. Number</th>
                                <th data-field="appDate"  data-sortable="true">Application Date</th>
                                <th data-field="approvalDate"  data-sortable="true">Approval Date</th>
                                <th data-field="TransferDate"  data-sortable="true">Transfer Date</th>
                                <th data-field="tagged"  data-sortable="true">Tag</th>
                                <th>Action</th>
                        </thead>

                        <?php
                           
                                $btn = "";
								
                                foreach($list as $data){
                                	$id = $data['id'];
                                    $ZTDno = $data['ZTDno'];
                                    $LOAno = $data['LOAno'];
                                    $appno = $data['appno'];
                                	$CommInvoice = $data['CommInvoice'];
                                    $SuretyBondNo = $data['SuretyBondNo'];
                                	$PackingList = $data['PackingList'];
                                    $ORNo = $data['SB_ORNo'];
                                    $DeliveryReceipt = $data['DeliveryReceipt'];
                                    //$Gatepass = $data['Gatepass'];
                                    $appDate = $data['appDate'];
                                    $approvalDate = $data['approvalDate'];
                                    $tagged = $data['tagged'];
                                    $status = $data['status'];
                                    $TransferDate = $data['TransferDate'];
                                    $clientName = $data['clientName'];
                                    $ELSEZone = $data['ELSEZone'];
                                    $cltcode = $data['cltcode'];
                                    $zonetype = $data['zonetype'];

                                    $ELSEName = $items->getELSENameusingEZTDNo($ZTDno);

                                    //Approval Date
                                    if($approvalDate == "0000-00-00 00:00:00"){
                                        $approval = "";
                                    }else{
                                        $approval = "$approvalDate";
                                    }
                                    //30 minutes window time warning
                                    /*if(strtotime($approvalDate) > strtotime('+30 minutes') && $status !='2' && $tagged == '0'){
                                        $approval = "<font color='red'>$approvalDate &nbsp;<div class='glyphicon glyphicon-exclamation-sign' title='Please patiently wait. Zone Manager is still checking your items'></div></font>";
                                    }else{
                                        $approval = "$approvalDate";
                                    }*/

                                
                                    $now = date("Y-m-d H:i:s", strtotime($approvalDate . "+30 minutes"));
                                    // if($mins > date("Y-m-d H:i:s")){
                                    //     $minsleft ="30 minutes reached.";
                                    // }else{
                                    //     $minsleft = $mins;
                                    // }


                                    if($zonetype == '1'){
                                        //Tagged
                                        if($status == 0 && $tagged == 0){
                                            $stat = "<font color='orange'>FOR APPROVAL</font>";
                                            $action = "<a class=\"btn btn-warning btn-xs\" href=\"ZTDlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\"><i class=\"fa fa-list-alt\"></i></a>";
                                        }elseif($status == 2 && $tagged == 0){
                                            $stat = "<font color='red'>REJECTED</font>";
                                            $action = "<font color='red'>REJECTED</font>";
                                        }elseif($status == 1 && $tagged == 0 && $TransferDate >= date('Y-m-d')){
                                            $stat = "<font color='green'>APPROVED</font>";
                                            $action = "<a class=\"btn btn-success btn-xs\" href=\"received?appno=".$appno." \">Receive</a>";
                                        }elseif($status == 1 && $tagged == 0 && $TransferDate < date('Y-m-d')){
                                            $stat = "<font color='green'>APPROVED</font>";
                                            $action = "<a class=\"btn btn-success btn-xs\" href=\"received?appno=".$appno." \"disabled>Receive</a>";
                                        }elseif($status == 1 && $tagged == 1){
                                            $stat = "RELEASED";
                                            $action = "<a class=\"btn btn-success btn-xs\" href=\"received?ZTDno=".$ZTDno."\">Receive</a>";
                                            $action = "RELEASED";
                                        }elseif($status == 1 && $tagged == 2){
                                            $stat = "DELIVERED";
                                            $action = "<button class=\"btn btn-primary btn-xs\" type=\"submit\" name=\"submit\" value='".$ZTDno."'>RECEIVE</button>";
                                        }elseif($status == 1 && $tagged == 3){
                                            $stat = "RECEIVED";
                                            $action = "<font color='red'>CLOSED</font>";
                                        }elseif($status == 1 && $tagged == 4){
                                            $stat = "EXPIRED";
                                            $action = "<font color='red'>EXPIRED</font>";
                                        }else{
                                            $stat = "";
                                            $action = "";
                                        }
                                    }else{
                                        //Tagged
                                        if($status == 0 && $tagged == 0){
                                            $stat = "<font color='orange'>FOR APPROVAL</font>";
                                            $action = "<a class=\"btn btn-warning btn-xs\" href=\"ZTDlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\"><i class=\"fa fa-list-alt\"></i></a>";
                                        }elseif($status == 2 && $tagged == 0){
                                            $stat = "<font color='red'>REJECTED</font>";
    										$action = "<font color='red'>REJECTED</font>";
                                        }elseif($status == 1 && $tagged == 0){
                                            $stat = "<font color='green'>APPROVED</font>";
    										$action = "<font color='green'>FOR RELEASING</font>";
                                        }elseif($status == 1 && $tagged == 1){
                                            $stat = "RELEASED";
                                            //$action = "<a class=\"btn btn-success btn-xs\" href=\"received?ZTDno=".$ZTDno."\">Receive</a>";
    										$action = "RELEASED";
                                        }elseif($status == 1 && $tagged == 2){
                                            $stat = "DELIVERED";
                                            $action = "<button class=\"btn btn-primary btn-xs\" type=\"submit\" name=\"submit\" value='".$ZTDno."'>RECEIVE</button>";
                                        }elseif($status == 1 && $tagged == 3){
    										$stat = "RECEIVED";
                                            $action = "<font color='red'>CLOSED</font>";
                                        }elseif($status == 1 && $tagged == 4){
                                            $stat = "EXPIRED";
                                            $action = "<font color='red'>EXPIRED</font>";
                                        }else{
                                            $stat = "";
                                            $action = "";
                                        }
                                    }

                                    $tablerow = "<tr>
													<td> <a href=\"ZTDlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a></td>
                                                    <td> <a href=\"ELSEprinteztd?ZTDNo=".$ZTDno." &&ELSEname=".$ELSEName." &&appno=".$appno." &&cltcode=".$cltcode."\">$ZTDno </td>
                                                    
                                                    <td> $LOAno </td>
                                                    <td>$clientName</td>
                                                    <td>$ELSEZone </td>
                                                    <td> $CommInvoice </td>
                                                    <td> $DeliveryReceipt </td>
                                                    <td> $appDate </td>
                                                    <td> $approval </td>
                                                    <td> $TransferDate </td>
                                                    <td> $stat </td>
                                                    <td> $action </td>
                                                </tr>";

                                        echo $tablerow;
                                
                                }
                        ?>      
                    </table>
                    
                </div>
            </div>
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