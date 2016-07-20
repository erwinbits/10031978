<?php
include('../../includes/layout2.php');


use Functions\eZTD;
use Functions\Item;
use Functions\eIP;

$eztd = new eZTD;
$items = new Item;
$eip = new eIP;

  if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }
 
    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "1"){
        echo "You dont have access on this page";
        header("Location: /401");
    }

        // if($info->account == "0"){
            // include('../../includes/AdminSidebar.php');
        // }elseif($info->account == "5"){
            // include('../../includes/CashierSidebar.php');
        // }elseif($info->account == "1"){
            // include('../../includes/sidebar.php');
        // }elseif($info->account == "6"){
            // include('../../includes/elseSidebar.php');
        // }elseif($info->account == "7"){
            // include('../../includes/newsidebar.php');
        // }else{
            // include('../../includes/BrokerSidebar.php');
        // }
	
	$userid = $_SESSION['userid'];

	$msg = false;
	if($_POST){
		$hscode = $_POST['HS_Code'];
		$tarext = $_POST['TAR_Ext'];
		$tardesc = $_POST['TAR_DSC'];
		
		$result = $eip->addHSCode($hscode, $tarext, $tardesc);
		echo "<script type='text/javascript'>alert('HSCode has been added.');window.location.href='/HSCList';</script>";
	}else{
		$status = "Failed";
		$responseMessage = "Add Failed!.";
	}

?>

<!--Page Wrapper-->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap-table.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h3>List of HSCODES</h3>
			<br>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><center><strong> HS Codes </strong></center></div>
                <div class="panel-body">
				<?php $id = $_SESSION['userid']; ?>
                    <form class="form-horizontal" id="HSCode" name="HS_Code" action="" method="POST">
						<div class="form-group">
							<div class="col-md-3">
								<input type="text" class="form-control" name="HS_Code" value="" placeholder="HSCode" required>
							</div>
							
							<div class="col-md-4">
								<input type="text" class="form-control" name="TAR_Ext" value="" placeholder="TAR Ext" required>
							</div>
							
							<div class="col-md-4">
								<input type="text" class="form-control" name="TAR_DSC" value="" placeholder="TAR Description" required>
							</div>
							
							<div class="col-md-1">
								<button type="submit" class="btn btn-primary btn-block">Add</button>
								<input type="hidden" value="<?php echo $id; ?>" name="id">
							</div>
							<div class="help-block with-errors"></div>
						</div>
					</form>
					<form class="form-horizontal" id="itemGroupName" name="itemGroupName" action="itemGroupList" method="POST">	
                        <!-- <table class="table data-url="tables/data1.json" table-striped table-bordered table-hover text-center" style="padding:50px;"> -->
                        <table data-toggle="table" data-maintain-selected="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-url="/approveditems" data-page-list="[10, 25, 50, 100, 500, 1000]" data-sort-name="submissionDate" data-sort-order="desc" data-click-to-select="true">
						<thead>
							<tr>
								<th data-field="HS_Code" data-sortable="true">HS Code</th>
								<th data-field="TAR_Ext" data-sortable="true">TAR Ext</th>
								<th data-field="TAR_DSC" data-sortable="true">TAR Desc</th>
								<th>Action</th>
							</tr>
						</thead>
						
                            <?php
								$count = 1;
								$list = $eip->listHSCodes();
                                foreach($list as $data2){
                                    $hscode = $data2['HS_Code'];
                                    $tarext = $data2['TAR_Ext'];
                                    $tardsc = $data2['TAR_DSC'];
									
									//$itemCount = $eztd->countItems($itemGroupName);
									
									$edtbtn = "<a class=\"btn btn-primary btn-xs\" href=\"editHSCode?HS_Code=".$hscode."\"  title=\"Edit HSCode\">EDIT</i></a>";
									
                                    $tablerow = "<tr>
                                        <td> $hscode </td>
                                        <td> $tarext </td>
                                        <td> $tardsc </td>
										<td> $edtbtn </td>
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

