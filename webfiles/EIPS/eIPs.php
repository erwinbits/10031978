<?php

include('../includes/ClientLayout.php'); 
use Controller\SidebarController;
use Functions\Importables;
use Functions\eIP;

$items = new eIP;
$list = $items->getMyApprovedEips();
					
$sidebar = new SidebarController;
$sidebar->showEIPSSidebar();

	if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "1" && $info->account !=6){
        echo "You dont have access on this page";
        header("Location: /401");
    }
	
if(isset($_GET['forApproval'])){
  $list = $items->getMyForApprovalEips(); 
}elseif(isset($_GET['Rejected'])){
  $list = $items->getMyRejectedlEips();
}else{
  $list = $items->getMyApprovedEips(); 
}
     
?>

<!--Page Wrapper-->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="row">
        <div>
            <div class="col-md-12">
				<h3>List of Import Permits</h3>
				<hr>
			</div>
				
            </div>
        </div>
    	<?php
            if(isset($_GET['forApproval'])){
                echo '<ul class="nav nav-tabs">
					<li role="presentation" ><a href="eIPs">Approved eIPS</a></li>
					<li role="presentation" class="active"><a href="eIPs?forApproval">Items For Approval</a></li>
					<li role="presentation"><a href="eIPs?Rejected">Rejected Items</a></li>
                </ul>';
				$chkbx = "";
            }elseif(isset($_GET['Rejected'])){
				echo '<ul class="nav nav-tabs">
					<li role="presentation" ><a href="eIPs">Approved eIPS</a></li>
					<li role="presentation"><a href="eIPs?forApproval">eIPS For Approval</a></li>
					<li role="presentation" class="active"><a href="eIPs?Rejected">Rejected eIPS</a></li>
				</ul>';
				$chkbx = "";
			}else{
				echo '<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="eIPs">Approved eIPS</a></li>
					<li role="presentation"><a href="eIPs?forApproval">eIPS For Approval</a></li>
					<li role="presentation" ><a href="eIPs?Rejected">Rejected eIPS</a></li>
				</ul>';
			}
		?>
		<div class="panel panel-default">
			<div class="panel-heading"><center><strong> My e-Import Permits </strong></center></div>
			<div class="panel-body">
				<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="" method="POST">
					
					<table data-toggle="table" data-maintain-selected="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-url="/approveditems" data-page-list="[10, 25, 50, 100, 500, 1000]" data-sort-name="appnoDate" data-sort-order="desc" data-click-to-select="true">
						<thead>
							<tr>
								
								<!-- <th data-field="checkbox" data-checkbox="true"></th> -->
								<th data-field="appno" data-sortable="true">Application Number</th>
								<th data-field="appnoDate" data-sortable="true">Application Date</th>
								<th data-field="zone" data-sortable="true">Zone Code</th>
								<th data-field="mot" data-sortable="true">Transport Mode</th>
								<th data-field="broker" data-sortable="true">Broker Name</th>
								<th data-field="shipper"  data-sortable="true">Shipper Name</th>
								<th data-field="origin"  data-sortable="true">Origin</th>
								<th data-field="discharge"  data-sortable="true">Discharge</th>
								<th data-field="dischargeDate"  data-sortable="true">Discharge Date</th>
								<th data-field="purpose"  data-sortable="true">Purpose of Import</th>
								<th data-field="status"  data-sortable="true">Status</th>
								<th data-field="remarks"  data-sortable="true">Remarks</th>
								<th data-field="view"  data-sortable="true">ACTION</th>
							</tr>
						</thead>

						<?php
						
						   
						?>
							
						<?php

							foreach($list as $data){
								$appno = $data['appno'];
								$appdate = $data['appDate'];
								$zone = $data['zoneLocation'];
								$transportmode = $data['modeOfTransport'];
								$broker = $data['brokerName'];
								$shipper = $data['shipperName'];
								$origin = $data['countryOrigin'];
								$discharge = $data['portDischarge'];
								$dischargeDate = $data['arrivalDate'];
								$purpose = $data['purposeImport'];
								$status = $data['status'];
								$remarks = $data['remarks'];
							

								if($status == '1'){
									$stat = "<font style='color:green'>APPROVED</font>";
								}elseif($status == '2'){
									$stat = "<font style='color:red'>REJECTED</font>";
								}elseif($status == '0'){
									$stat = "<font style='color:blue'>FOR APPROVAL</font>";
								}

								echo "<tr>
									<td> $appno </td>
									<td> $appdate </td>
									<td> $zone</td>
									<td> $transportmode </td>
									<td> $broker </td>
									<td> $shipper</td>
									<td> $origin </td> 
									<td> $discharge </td>
									<td> $dischargeDate </td>
									<td> $purpose </td>
									<td> $stat </td>
									<td> $remarks </td>
									<td>
										<div style='width:100px;'>'
                                            <div style='float: left; width: 30px'>
												<form name='ItemList' action='' method='POST'>
		                                            <button name='appno' title='View' type='submit' value='".$appno."'class='btn btn-default' aria-label='Left Align'>
		                                            	<span class='glyphicon glyphicon-zoom-in' aria-hidden='true'></span>
		                                            </button>
		                                        </form>
		                                    </div>";
                                    if($status == '1'){        
                                        echo "
                                        	<div style='float: right; width: 50px'>
		                                        <form name='ItemList' action='' method='POST'>
		                                            <button name='appno' title='Print' type='submit' value='".$appno."'class='btn btn-default' aria-label='Left Align'>
		                                            	<span class='glyphicon glyphicon-print' aria-hidden='true'></span>
		                                            </button>
		                                        </form>
		                                    </div>";
		                            }        
		                            echo "
		                            	</div>
									</td>
								</tr>";
								
							}
						?>   
					</table>

				</form>
			</div>
		</div>
	</div>
</div>
<?php 
include('../includes/footer.php');
include('../script.php');
?>
 
<!-- JS -->
<script src="js/checkbox.js"></script>

<script>
var checkboxes = $("input[type='checkbox']"),
    submitButt = $("button[type='submit']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});
</script>

