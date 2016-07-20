<?php
include('../../includes/ClientLayout2.php'); 
include('../../includes/eipSidebar.php');

	if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "1" && $info->account !=6){
        echo "You dont have access on this page";
        header("Location: /401");
    }
	
    use Functions\Importables;
    use Functions\eZTD;
	use Functions\eIP;
     
?>

<!--Page Wrapper-->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="row"><br>
		<div class="panel panel-default">
			<div class="panel-heading"><center><strong> eIP Items </strong></center></div>
			<div class="panel-body">
				<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="" method="POST">
					<!-- <table class="table data-url="tables/data1.json" table-striped table-bordered table-hover text-center" style="padding:50px;"> -->
					<table data-toggle="table" data-maintain-selected="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-url="/approveditems" data-page-list="[10, 25, 50, 100, 500, 1000]" data-sort-name="submissionDate" data-sort-order="desc" data-click-to-select="true">
						<thead>
							<tr>
								<!-- <th data-field="checkbox" data-checkbox="true"></th> -->
								<th data-field="appno" data-sortable="true">App no.</th>
								<th data-field="BOCrefno" data-sortable="true">BOC Refno</th>
								<th data-field="IPno" data-sortable="true">IP no</th>
								<th data-field="clientName" data-sortable="true">Client Name</th>
								<th data-field="clientTIN" data-sortable="true">Client TIN</th>
								<th data-field="CRno"  data-sortable="true">CR No</th>
								<th data-field="brokerName"  data-sortable="true">Broker Name</th>
								<th data-field="Remarks"  data-sortable="true">Remarks</th>
								<th data-field="status"  data-sortable="true">Tag</th>
								<th>Action</th>
							</tr>
						</thead>

						<?php
						
						$eip = new eIP;
						$list = $eip->AlleIPs();
					
							$iCat = "";
							$rem = "";
							$status = "";
						   
						?>
							
						<?php
							foreach($list as $data){
								$appno = $data['appno'];
								$BOCrefno = $data['BOCrefno'];
								$IPno = $data['IPno'];
								$clientName = $data['clientName'];
								$clientTIN = $data['clientTIN'];
								$CRno = $data['CRno'];
								$brokerName = $data['brokerName'];
								$remarks = $data['remarks'];
								$status = $data['status'];

								//Remarks
								if($remarks == ""){
									$rem ="No remarks";
								}else{
									$rem = "$remarks";
								}
								
								//status
								if($status == 1){
									$stat = "<font-color:green;>APPROVED</font>";
									$print = "<a class=\"btn btn-success btn-xs\" href=\"eIPprint?appno=".$appno." && IPno=".$IPno."\" title=\"Print\"><i class=\"fa fa-print\"></i></a>";
								}else{
									$stat = "<font-color:red;>FOR APPROVAL</font>";
									$print = "<a class=\"btn btn-success btn-xs\" href=\"eIPprint?appno=".$appno." && IPno=".$IPno."\" title=\"Print\"><i class=\"fa fa-print\"></i></a>";
								}

								//Account Status
								// if($AccStatus == 0 AND 1){
									// $status = "";
									// $checkbox = "";
								// }else{
									// $checkbox = "<input type=\"checkbox\" name=\"chk[]\" value=\"$description|$HSCODE|$itemCode|$ItemID|$itemCategory\">";
								// }

								$tablerow = "<tr>
									<td> $appno </td>
									<td> $BOCrefno</td>
									<td> $IPno </td>
									<td> $clientName </td>
									<td> $clientTIN</td>
									<td> $CRno </td> 
									<td> $brokerName </td>
									<td> $rem </td>
									<td> $stat </td>
									<td> $print </td>
								</tr>";
								echo $tablerow;
							}
						?>   
					</table>
					<!--<div class="row-fluid control-group">
					   <button type="submit" name="eIP" class="btn btn-inverse inline" value="eIP">Create e-IP</button> &nbsp; &nbsp; | &nbsp; &nbsp;
						<button type="submit" name="LOA" class="btn btn-inverse inline" value="eLOA">Create e-LOA</button>
					</div>-->
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
include('../../includes/footer.php');
include('../../script.php');
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

