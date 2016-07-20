<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

use Functions\eZTD;
use Functions\Dashboard;
$items = new eZTD;
$Dashboard = new Dashboard;

if(isset($_GET['forApproval'])){

$list = $items->ELSEmyEZTDListforApproval();

}elseif(isset($_GET['Rejected'])){

$list = $items->ELSEmyEZTDListrejected();

}elseif(isset($_GET['Approved'])){

$list = $items->ELSEmyEZTDList();

}elseif(isset($_GET['EZTDsforReceiving'])){

$list = $Dashboard->getEZTDsforReceiving();

}else{

$list = $items->getELSEMyEZTD();
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
                <li role="presentation" ><a href="ELSEmyEZTD">My eZTDs</a></li>
                <li role="presentation" ><a href="ELSEmyEZTD?Approved">Approved/Used eZTDs</a></li>
                <li role="presentation" class="active"><a href="ELSEmyEZTD?forApproval">eZTDs For Approval</a></li>
                <li role="presentation"><a href="ELSEmyEZTD?Rejected">Rejected eZTDs</a></li>
                </ul>';

            }elseif(isset($_GET['Rejected'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="ELSEmyEZTD">My eZTDs</a></li>
              <li role="presentation" ><a href="ELSEmyEZTD">Approved/Used eZTDs</a></li>
              <li role="presentation"><a href="ELSEmyEZTD?forApproval">eZTDs For Approval</a></li>
              <li role="presentation" class="active"><a href="ELSEmyEZTD?Rejected">Rejected eZTDs</a></li>
            </ul>';

        }elseif(isset($_GET['Approved'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="ELSEmyEZTD">My eZTDs</a></li>
              <li role="presentation" class="active" ><a href="ELSEmyEZTD?Approved">Approved/Used eZTDs</a></li>
              <li role="presentation"><a href="ELSEmyEZTD?forApproval">eZTDs For Approval</a></li>
              <li role="presentation"><a href="ELSEmyEZTD?Rejected">Rejected eZTDs</a></li>
            </ul>';

        }else{

                echo '<ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="ELSEmyEZTD">My eZTDs</a></li>
                <li role="presentation" ><a href="ELSEmyEZTD?Approved">Approved/Used eZTDs</a></li>
                <li role="presentation"><a href="ELSEmyEZTD?forApproval">eZTDs For Approval</a></li>
                <li role="presentation" ><a href="ELSEmyEZTD?Rejected">Rejected eZTDs</a></li>
                </ul>';
        }
        ?>
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>ZONE TRANSFER DOCUMENTS</strong></div>
                <div class="panel-body">
                    
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                        <thead>
                            <tr>
								<th data-field="appno" data-sortable="true">Application Number</th>
                                <th data-field="ZTDno" data-sortable="true">e-ZTD Number</th>
                                <th data-field="LOAno" data-sortable="true">e-LOA Number</th>
                                <th data-field="name"  data-sortable="true">Client Enterprise</th>
                                <th data-field="ZONE_CODE"  data-sortable="true">Client Zone</th>
                                <th data-field="CommInvoice" data-sortable="true">Invoice No.</th>
                                <th data-field="DeliveryReceipt"  data-sortable="true">D. R. Number</th>
                                <th data-field="appDate"  data-sortable="true">Application Date</th>
                                <th data-field="approvalDate"  data-sortable="true">Approval Date</th>
                                <th data-field="TransferDate"  data-sortable="true">Transfer Date</th>
                                <th data-field="tagged"  data-sortable="true">Tagged</th>
                        </thead>

                        <?php
                            
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
									$name = $data['consignee'];
									$zone = $data['clientZone'];
									$cltcode = $data['cltcode'];

                                    $ELSEName = $items->getELSENameusingEZTDNo($ZTDno);
                                    
									
									//Account Status
                                    if($status == 0 && $tagged == 0){
                                        $stat = "<font color='orange'>FOR APPROVAL</font>";
                                    }elseif($status == 2 && $tagged == 0){
                                        $stat = "<font color='red'>REJECTED</font>";
                                    }elseif($status == 1 && $tagged == 0){
                                        $stat = "<font color='green'>APPROVED</font>";
                                    }elseif($status == 1 && $tagged == 1){
                                        $stat = "RELEASED";
                                    }elseif($status == 1 && $tagged == 2){
										$stat = "DELIVERED";
                                    }elseif($status == 1 && $tagged == 3){
                                        $stat = "<font color='red'>CLOSED</font>";
                                    }elseif($status == 1 && $tagged == 4){
                                        $stat = "<font color='red'>EXPIRED</font>";
                                    }elseif($status == 0 && $tagged == 4){
                                        $stat = "<font color='red'>EXPIRED</font>";
                                    }
                                    
									
									//Approval Date
                                    if($approvalDate == "0000-00-00 00:00:00"){
                                        $approval = "";
                                    }else{
                                        $approval = "$approvalDate";
                                    }
                                   
									//30 minutes window time warning
									// if($approvalDate = date("Y-m-d H:i:s", strtotime($approvalDate . "+30 minutes"))){
									// 	$approval = "<font color='red'>$approvalDate &nbsp;<div class='glyphicon glyphicon-exclamation-sign' title='Please patiently wait. Zone Manager is still checking your items'></div></font>";
									// }else{
									// 	$approval = "$approvalDate";
									// }
                                    
									
									//30 minutes window time warning
                                    /*if(strtotime($approvalDate) > strtotime('+30 minutes') AND $status = '1' AND $tagged = '0'){
                                        $approval = "<font color='red'>$approvalDate &nbsp;<div class='glyphicon glyphicon-exclamation-sign' title='Please patiently wait. Zone Manager is still checking your items'></div></font>";
                                    }else{
                                        $approval = "$approvalDate";
                                    }*/

                                    $tablerow = "<tr>
													<td> <a href=\"ZTDlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a></td>
													
                                                    <td> <a href=\"ELSEprinteztd?ZTDNo=".$ZTDno." &&ELSEname=".$ELSEName." &&appno=".$appno." &&cltcode=".$cltcode."\">$ZTDno </td>
                                                    
                                                    <td> $LOAno </td>
                                                    <td> $name </td> 
                                                    <td> $zone </td>
                                                    <td> $CommInvoice </td>
                                                    <td> $DeliveryReceipt </td>
                                                    <td> $appDate </td>
                                                    <td> $approval </td>
                                                    <td> $TransferDate </td>
                                                    <td> $stat </td>
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