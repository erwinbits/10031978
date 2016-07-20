<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

use Functions\eZTD;

$eLOAno = $_GET['eLOAno'];
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
	<div class="container-fluid">
		<br>
        <br>
		<div class="panel panel-default">
           <div class="panel-heading text-center"><strong><?php echo $eLOAno?></strong></div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="ItemID"  data-sortable="true">Item ID</th>
                            <th data-field="ItemName"  data-sortable="true">Item Name</th>
                            <th data-field="beginningBal"  data-sortable="true">Quantity</th>
                            <th data-field="currentBal"  data-sortable="true">Remaining Items</th>
                        </tr>
                    </thead>
                    
                    <?php

                        $inventory = new eZTD;
                        $eLOAno = $_GET['eLOAno'];
                        $list = $inventory->myInventory3($eLOAno); 
                        //var_dump($list);

                        foreach($list as $data){
                            $eLOAno = $data['eLOAno'];
                            $ItemID = $data['ItemID'];
                            $Items = $data['beginningBal'];
                            $remItems = $data['currentBal'];

                            $ItemName = $inventory->getItemName($ItemID);
                        
                           echo "<tr>
                                    <td> <a href=\"ELSEitemTransaction?ItemID=".$ItemID." &&eLOAno=".$eLOAno." &&itemName=".$ItemName."\" > $ItemID </td>
                                    <td> $ItemName </td>
                                    <td> $Items </td>
                                    <td> $remItems </td>
                                </tr>";
                         }
                    ?>
                </table>
            </div>
		</div>

	</div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>