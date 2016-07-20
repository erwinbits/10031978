<?php
include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;
use Functions\Item;

$eztd = new eZTD;
$items = new Item;

	if(!$account->userIsLoged()){
		header("Location: /login");
		exit;
	}

	$info = json_decode($MCrypt->decrypt($account));
	if($info->account != "1"){
		echo "You dont have access on this page";
		header("Location: /401");
	}

	if(isset($_GET['action']) && $_GET['action'] == 'delete')
	{
		$itemCode = $_GET['itemCode'];
		$itemGroupName = $_GET['itemGroupName'];
		
		if($eztd->deleteItemtoGroup($itemGroupName, $itemCode)){
			echo '<script language="javascript">';
			echo 'window.location.href = "/itemGroupNameList";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
			echo 'alert("We encountered an error deleting your Item from Group.")';
			echo '</script>';
		}
	}else{
		$iCat = "";
		$rem = "";
		$status = "";
		$checkbox = "";
		$itemGroupName = $_POST['itemGroupName'];
	}


?>

<!--Page Wrapper-->

<link href="css/AdminLTE.min.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h3>List of Item</h3>
			<br>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><center><strong>Item Group Names</strong></center></div>
                <div class="panel-body">
                    <form class="form-horizontal" id="itemGroupName" name="itemGroupName" action="itemsprocess" method="POST">
                        <!-- <table class="table data-url="tables/data1.json" table-striped table-bordered table-hover text-center" style="padding:50px;"> -->
                        <table data-toggle="table" data-maintain-selected="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-url="/approveditems" data-page-list="[10, 25, 50, 100, 500, 1000]" data-sort-name="submissionDate" data-sort-order="desc" data-click-to-select="true">
						<thead>
							<tr>
								<th><input type="checkbox" onclick="checkAll(this)"></th>
								<th data-field="UID" data-sortable="true">Unique ID</th>
								<th data-field="cltcode" data-sortable="true">Cltcode</th>
								<th data-field="ItemID" data-sortable="true">Item ID</th>
								<th data-field="itemGroupName" data-sortable="true">Group Name</th>
								<th data-field="HSCODE" data-sortable="true">HSCODE</th>
								<th data-field="itemCode" data-sortable="true">Item Code</th>
								<th data-field="description" data-sortable="true">Item Description</th>
								<th>Action</th>
							</tr>
						</thead>
						
                            <?php
								$list = $eztd->itemGroupList($itemGroupName); 
                                foreach($list as $data){
                                    $UID = $data['UID'];
                                    $cltcode = $data['cltcode'];
									$ItemID = $data['ItemID'];
                                    $itemGroupName = $data['itemGroupName'];
                                    $HSCODE = $data['HSCODE'];
                                    $itemCode = $data['itemCode'];
                                    $description = $data['description'];
									
									$item = $items->ApprovedItems();
									foreach($item as $data){
										$itemName = $data['itemName'];
										$itemCategory = $data['itemCategory'];
										$regAct = $data['regAct'];
										$TAR_Ext = $data['TAR_Ext'];
										$frequency = $data['frequency'];
										$Remarks = $data['Remarks'];
										$AccStatus = $data['AccStatus'];
										$submissionDate = $data['submissionDate'];
									}
									
										$tablerow = "<tr>
											<td><input type=\"checkbox\" name=\"chk[]\" value=\"$description|$itemName|$HSCODE|$TAR_Ext|$itemCode|$ItemID\" class=\"itemselect\"></td>
											<td> $UID </td>
											<td> $cltcode </td>
											<td> $ItemID </td>
											<td> $itemGroupName</td>
											<td> $HSCODE </td>
											<td> $itemCode </td>
											<td> $description </td>
											<td><a class=\"btn btn-danger btn-xs\" href=\"itemGroupList?action=delete&itemCode=".$itemCode."&&itemGroupName=".$itemGroupName."\" onclick=\"return confirm('Are you sure you want to delete your Group Name?');\"  title=\"Delete Record\"><i class=\"fa fa-trash\"></i></td>
										</tr>";
										echo $tablerow;
                                }
                            ?>   
                        </table>
						<div class="row-fluid control-group">
							<button type="submit" name="eCert" class="btn btn-inverse inline">Create e-Cert</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
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

<script type="text/javascript">
function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  }
}
</script>

<script type="text/javascript">

jQuery(function ($) {
	//form submit handler
	$('#items').submit(function (e) {
		//check atleat 1 checkbox is checked
		if (!$('.itemselect').is(':checked')) {

			alert("Please choose an item to apply");
			//prevent the default form submit if it is not checked
			e.preventDefault();
		}
	})
})

</script>

