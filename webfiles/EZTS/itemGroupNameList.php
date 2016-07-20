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
	
	$userid = $_SESSION['userid'];

	$msg = false;
	if($_POST){
		$id = $_POST['id'];
		$UID = $_POST['UID'];
		$cltcode = $_POST['cltcode'];
		$itemGroupName = $_POST['itemGroupName'];
		
		$result = $eZTD->additemGroupName($id, $UID, $cltcode, $itemGroupName);
		echo "<script type='text/javascript'>alert('Item Group has been added.');window.location.href='/addItemGroupName';</script>";
	}else{
		$status = "Failed";
		$responseMessage = "Group already exist!.";
	}

	if(isset($_GET['action']) && $_GET['action'] == 'delete')
	{
		$UID = $_GET['UID'];
		
		if($eztd->deleteGroupName($UID)){
			echo '<script language="javascript">';
			echo 'window.location.href = "/itemGroupNameList";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
			echo 'alert("We encountered an error deleting your Item Group Name.")';
			echo '</script>';
		}
		
	}

$iCat = "";
$rem = "";
$status = "";
$checkbox = "";
  
?>

<!--Page Wrapper-->
<link href="css/shadowbox.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h3>List of Item Group Names</h3>
			<br>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><center><strong> Item Group Names </strong></center></div>
                <div class="panel-body">
				<?php 
					$id = $_SESSION['userid']; 
					$UID = "UID-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");
					$cltcode = $account->getCompanyCode($id); 
				?>
                    <form class="form-horizontal" id="itemGroupName" name="itemGroupName" action="addItemGroupName" method="POST">
						<div class="form-group">
							<label class="control-label col-md-3" for="itemGroupName">Item Group Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="itemGroupName" value="" placeholder="Item Group Name" required>
							</div>
							<div class="col-md-1">
								<button type="submit" class="btn btn-primary btn-block">Add</button>
								<input type="hidden" value="<?php echo $cltcode; ?>" name="cltcode">
								<input type="hidden" value="<?php echo $id; ?>" name="id">
								<input type="hidden" value="<?php echo $UID; ?>" name="UID">
							</div>
							<div class="help-block with-errors"></div>
						</div>
					</form>
					<form class="form-horizontal" id="itemGroupName" name="itemGroupName" action="itemGroupList" method="POST">	
                        <!-- <table class="table data-url="tables/data1.json" table-striped table-bordered table-hover text-center" style="padding:50px;"> -->
                        <table data-toggle="table" data-maintain-selected="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-url="/approveditems" data-page-list="[10, 25, 50, 100, 500, 1000]" data-sort-name="submissionDate" data-sort-order="desc" data-click-to-select="true">
						<thead>
							<tr>
								<th> No. </th>
								<th data-field="itemGroupName" data-sortable="true">Group Name</th>
								<th data-field="addDate" data-sortable="true">Date Added</th>
								<th>Action</th>
							</tr>
						</thead>
						
                            <?php
								$count = 1;
								$list = $eztd->itemGroupNameList();
                                foreach($list as $data2){
                                    $UID = $data2['UID'];
                                    $cltcode = $data2['cltcode'];
                                    $itemGroupName = $data2['itemGroupName'];
                                    $addDate = $data2['addDate'];
									$itemCount = $count++;
									
									//$itemCount = $eztd->countItems($itemGroupName);
									
									$viewbtn = "<button class=\"btn btn-primary btn-xs\" type=\"submit\"   value=".$itemGroupName." name='itemGroupName'>VIEW</button>";
									
									$delbtn = "<a class=\"btn btn-danger btn-xs\" href=\"itemGroupNameList?action=delete&UID=".$UID."\" onclick=\"return confirm('Are you sure you want to delete your Group Name?');\"  title=\"Delete Record\"><i class=\"fa fa-trash\"></i></a>";
									
                                    $tablerow = "<tr>
                                        <td> $itemCount </td>
                                        <td> $itemGroupName </td>
                                        <td> $addDate </td>
										<td> $viewbtn &nbsp; | &nbsp; $delbtn </td>
                                    </tr>";
                                    echo $tablerow;
                                }
                            ?>   
                        </table>
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

