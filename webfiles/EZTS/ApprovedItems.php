<?php
include('../includes/ClientLayout.php');
include('../includes/sidebar.php');
use Functions\Item;
use Functions\eZTD;
use Models\UserManagement\ProfileManagement;

$regActcheck = new ProfileManagement;

    if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));
    if($info->account != "1"){
        echo "You dont have access on this page";
        header("Location: /401");
    }

$items = new Item;
if(isset($_GET['forApproval'])){
  $list = $items->itemForApproval();
}elseif(isset($_GET['Rejected'])){
  $list = $items->rejectedItems();
}else{
  $list = $items->ApprovedItems();
}

$iCat = "";
$rem = "";
$status = "";
$checkbox = "";

?>

<!--Page Wrapper-->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h3>List of approved items</h3>
            <hr>
				<p><strong>To apply for an e-Certificate, select items from your approved list and click "Create e-Cert".</strong></p>
			<br>
            <?php
            if(!$regActcheck->checkRegisteredActivity()){
                echo '<div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Notice:</span>
                      <strong>OH NO! </strong> Please apply for  <a href = "/Apply_Item" class="alert-link">Registered Activity</a> before applying for an item

                    </div>
                </div>';
             }
            ?>
			<div class="col-md-6">
				<div class="alert alert-success" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Notice:</span>
				  <strong>Add more items?</strong>
				  <a href = '/Apply_Item' class="alert-link"> Add Items </a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="alert alert-info" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Notice:</span>
				  <strong>Add items in BULK?</strong>
				  <a href = '/Upload_Item' class="alert-link"> BULK UPLOAD </a>
				</div>
			</div>
        </div>
        <div class="col-md-12">
        <?php
            if(isset($_GET['forApproval'])){
                echo '<ul class="nav nav-tabs">
					<li role="presentation" ><a href="ApprovedItems">My Items</a></li>
					<li role="presentation" class="active"><a href="ApprovedItems?forApproval">Items For Approval</a></li>
					<li role="presentation"><a href="ApprovedItems?Rejected">Rejected Items</a></li>
                </ul>';
				$chkbx = "";
            }elseif(isset($_GET['Rejected'])){
				echo '<ul class="nav nav-tabs">
					<li role="presentation" ><a href="ApprovedItems">My Items</a></li>
					<li role="presentation"><a href="ApprovedItems?forApproval">Items For Approval</a></li>
					<li role="presentation" class="active"><a href="ApprovedItems?Rejected">Rejected Items</a></li>
				</ul>';
				$chkbx = "";
			}else{
				echo '<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="ApprovedItems">My Items</a></li>
					<li role="presentation"><a href="ApprovedItems?forApproval">Items For Approval</a></li>
					<li role="presentation" ><a href="ApprovedItems?Rejected">Rejected Items</a></li>
				</ul>';
				$chkbx = '<input type="checkbox" onclick="checkAll(this)">';
			}
		?>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><center><strong> Importables </strong></center></div>
                <div class="panel-body">
                    <form class="form-horizontal" id="items" name="ImportablesForm" action="itemsprocess" method="POST">
                        <!-- <table class="table data-url="tables/data1.json" table-striped table-bordered table-hover text-center" style="padding:50px;"> -->
                        <table data-toggle="table" data-maintain-selected="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-url="/approveditems" data-page-list="[10, 25, 50, 100, 500, 1000]" data-sort-name="submissionDate" data-sort-order="desc" data-click-to-select="true">
						<thead>
							<tr>
								<th><?php echo $chkbx; ?></th>
								<th data-field="itemName" data-sortable="true">Item Name</th>
								<th data-field="description" data-sortable="true">Description</th>
								<th data-field="HSCODE" data-sortable="true">HS Code</th>
								<th data-field="TAR_Ext" data-sortable="true">TAR Ext</th>
								<th data-field="itemCode" data-sortable="true">Item Code</th>
								<th data-field="regAct"  data-sortable="true">Registered Activity</th>
								<th data-field="frequency"  data-sortable="true">Frequency</th>
								<th data-field="submissionDate"  data-sortable="true">Submission Date</th>
								<th data-field="Remarks"  data-sortable="true">Remarks</th>
								<th data-field="AccStatus"  data-sortable="true">Tag</th>
							</tr>
						</thead>

                            <?php
                                foreach($list as $data){
                                    $itemName = $data['itemName'];
                                    $HSCODE = $data['HSCODE'];
                                    $itemCategory = $data['itemCategory'];
                                    $itemCode = $data['itemCode'];
                                    $description = $data['description'];
                                    $regAct = $data['registeredActivity'];
                                    $TAR_Ext = $data['TAR_Ext'];
                                    $frequency = $data['frequency'];
                                    $Remarks = $data['remarks'];
                                    $AccStatus = $data['status'];
                                    $ItemID = $data['ItemID'];
                                    $submissionDate = $data['submissionDate'];

                                    //Item Category
                                    if($itemCategory == 1){
                                        $iCat = "REGULATED";
                                    }elseif($itemCategory == 2){
                                        $iCat = "UNREGULATED";
                                    }else{
                                        $iCat = "NONE";
                                    }

                                    //Remarks
                                    if($Remarks == ""){
                                        $rem ="No remarks";
                                    }else{
                                        $rem = "$Remarks";
                                    }

                                    //Account Status
                                    if($AccStatus == 0 AND 1){
                                        $status = "";
                                    }else{
                                        $checkbox = "<input type=\"checkbox\" name=\"chk[]\" value=\"$description|$itemName|$HSCODE|$TAR_Ext|$itemCode|$ItemID\" class=\"itemselect\">";
                                    }

                                    $tablerow = "<tr>
                                        <td> $checkbox </td>
                                        <td> $itemName </td>
                                        <td> $description</td>
                                        <td> $HSCODE </td>
                                        <td> $TAR_Ext </td>
                                        <td> $itemCode</td>
                                        <td> $regAct </td>
                                        <td> $frequency </td>
                                        <td> $submissionDate </td>
                                        <td> $rem </td>
                                        <td> $iCat </td>
                                    </tr>";
                                    echo $tablerow;
                                }
                            ?>
                        </table>
                        <?php
                        if(isset($_GET['forApproval'])){
							echo "<br>";
                        }elseif(isset($_GET['Rejected'])){
							echo "<br>";
						}else{
                            echo '<div class="row-fluid control-group">
                                    <button type="submit" name="eCert" class="btn btn-inverse inline">Create e-Cert</button>
                                    <button type="submit" name="addPL" class="btn btn-inverse inline">Add to Item Group</button>
                            </div>';
                        }
                        //removed
                        ?>
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
<script src="js/checkall.js"></script>
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

