<?php
require("../../library.php");
use Functions\eZTD;


$appno = $_POST['appno'];
?>

<div class="panel panel-default">
	<div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
	<div class="panel-body">
		<table id="dataTable" class="table table-striped table-hover text-center" style="margin:0 auto;">
	   
			<thead>
				<tr>  
					<th></th>
					<th></th>
					<th>HSCODE</th>
					<th>Item Code</th>
					<th>Description</th>
					<th>Orig. Quantity</th>
					<th>Remaining Items</th>
					<th>Quantity to transfer</th>
					<th>Unit of Measure</th>
					<th>Unit Price</th>
					<th></th>
				   
				</tr>
			</thead>
			
			<?php
				
				$appno = $_GET['appno'];

				$items = new eZTD;

				$fetch = $items->ListeLOAitems($appno);
					foreach($fetch as $data){
						$eLOAno = $data['eLOAno'];
						$HSCODE = $data['HSCODE'];
						$itemCode = $data['itemCode'];
						$description = $data['description'];
						$quantity = $data['quantity'];
						$UOM = $data['UOM'];
						$unitValue = $data['unitPrice'];
						$ItemID = $data['ItemID'];
						$totalValue = $data['totalValue'];
						$current = $data['currentBal'];

					echo "<tr>
							<td>$eLOAno</td>
							<td>$HSCODE </td>
							<td>$itemCode</td>
							<td>$description</td>
							<td>$quantity</td>
							<td>$current</td>
							<td>$</td>
							<td>$UOM</td>
							<td>$unitPrice</td>
							
						</tr>";

				}
			?>
			
		</table>
	</div>
</div>