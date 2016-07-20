<?php 

include('../includes/ClientLayout.php'); 
//include('../includes/sidebar.php');

use Functions\eZTD;

$info = new eZTD;

$msg = false;
if(isset($_POST['receive'])){
$count = count($_POST['ItemID']);
	for($i=0;$i<$count;$i++) 
	{
		$ZTDno = $_POST['ZTDno'][$i];
		$ItemID = $_POST['ItemID'][$i];
		$receivedQty = $_POST['receivedQty'][$i];
		$discrepancy = $_POST['discrepancy'][$i];
		$receivedRemarks = $_POST['receivedRemarks'][$i];
	
		$result = $info->receivedZTD($ZTDno, $ItemID, $receivedQty, $discrepancy, $receivedRemarks);
	}
	if($result != "receive"){
            echo "<center><h4>Unsuccessfully Recieved.</h4></center><br>
            <center><a href='myEZTD'><input type='button' class='btn btn-default' name='submit' value='Back to e-ZTD List'></a></center></br>";

            $msg = true;
        }else{
            echo "<center><h4>Successfully Received.</h4></center><br>
            <center><a href='myEZTD'><input type='button' class='btn btn-default' name='submit' value='Back to e-ZTD List'></a></center></br>";
            $msg = true;
        }
	
}
		
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- FORM -->
	<!--Page Content-->

<div id="page-wrapper">
<br><br>
	<div class="container-fluid">
		<div class="panel panel-default">
		<?php if($msg == false){ ?>
			<div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
			<div class="panel-body">
			<form role="form" action="" method="POST" enctype="multipart/form-data">
				<table id="dataTable" class="table table-striped table-hover text-center" style="margin:0 auto;">
				    <thead>
					<tr> 
						<th>HSCODE</th>
						<th>Item Name</th>
						<th>Quantity to transfer</th>
						<th>Quantity Received</th>
						<th>Discrepancy</th>
						<th>Received Remarks</th>
					</tr>
					</thead>
					   
					<?php

					$items = new eZTD;
					$ZTDno = $_POST['submit'];
					$fetch = $items->getZTDitems($ZTDno);
					foreach($fetch as $data){
						$appno = $data['appno'];
						$ItemID = $data['ItemID'];
						$HSCODE = $items->getHSCODEusingItemID($ItemID);
						$description = $data['description'];
						$qtyToBeTransferred = $data['qtyToBeTransferred'];
						
						echo "<tr id ='form'>
						   <td><input class='form-control' type='text' name='HSCODE[]' value='$HSCODE' tabindex='-1' readonly></td>
						   
						   <td><input class='form-control' type='text' name='description[]' value='$description' tabindex='-1' readonly></td>
						   
						   <td><input class='form-control' type='text' name='qtyToBeTransferred[]' value='$qtyToBeTransferred' tabindex='-1' readonly></td>
						   
						    <td><input class='form-control' type='text' name='receivedQty[]' value='' tabindex='-1'></td>
							
							<td><input class='form-control' type='text' name='discrepancy[]' value='' tabindex='-1'></td>
							
							<td><input class='form-control' type='text' name='receivedRemarks[]' value='' tabindex='-1'>
							
							<input type='hidden' name='ItemID[]' value='$ItemID'>
						</tr>";
											
					} ?>
				</table>
			
				<div class="form-group text-right">
					<hr>
					<button type="submit" name="receive" class="btn btn-primary">RECEIVED</button>
					<input type="hidden" name="ZTDno" value="<?php echo $ZTDno; ?>">
				</div>
			</form>
			</div>
			<?php } ?>
		</div>
	</div>
<!-- General -->
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>



<!-- JS -->
<!-- <script type="text/javascript" src="js/compareqty.js"></script> -->
<script type="text/javascript" src="js/importables.js"></script>
<!-- JS -->

<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
 
 <!--<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>-->
<script>
    $(function() {
        $( "#calendar" ).datepicker({ minDate: 0 });
    });
</script>