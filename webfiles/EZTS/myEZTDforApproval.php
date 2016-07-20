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

            <br>
            <ul class="nav nav-tabs">
              <li role="presentation" ><a href="myEZTD">Approved/Closed ZTD</a></li>
              <li role="presentation" class="active"><a href="myZTDforApproval">For Approval ZTD</a></li>
              <li role="presentation"><a href="myEZTDrejected">Rejected ZTD</a></li>
            </ul>
			
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>ZONE TRANSFER DOCUMENTS</strong></div>
                <div class="panel-body">
                    
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
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
                            $items = new eZTD;
    						$list = $items->myEZTDListForApproval();

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


                                    $ELSEName = $items->getELSENameusingEZTDNo($ZTDno);

                                    //Approval Date
                                    if($approvalDate == "0000-00-00 00:00:00"){
                                        $approval = "";
                                    }else{
                                        $approval = "$approvalDate";
                                    }
                                   
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
                                        $action = "<a class=\"btn btn-success btn-xs\" href=\"received?ZTDno=".$ZTDno."\">Receive</a>";
                                    }elseif($status == 1 && $tagged == 2){
                                        $stat = "DELIVERED";
                                        $action = "<a class=\"btn btn-success btn-xs\" href=\"received?ZTDno=".$ZTDno."\">Receive</a>";
                                    }elseif($status == 1 && $tagged == 3){
										$stat = "RECEIVED";
                                        $action = "<font color='red'>CLOSED</font>";
                                    }elseif($status == 1 && $tagged == 4){
                                        $stat = "EXPIRED";
                                        $action = "<font color='red'>EXPIRED</font>";
                                    }
           

                                    $tablerow = "<tr>
													<td> <a href=\"ZTDlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a></td>
                                                    <td> <a href=\"printeztd?ZTDNo=".$ZTDno." && ELSEname=".$ELSEName." &&appno=".$appno."\" >$ZTDno </td>
                                                    
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

<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>