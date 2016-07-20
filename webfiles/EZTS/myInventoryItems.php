<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;

$ELSEname = $_GET['ELSEname'];
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
	<div class="container-fluid">
		<br>
        <br>
		<div class="panel panel-default">

           <div class="panel-heading text-center"><strong><?php echo $ELSEname?></strong></div>
            <div class="panel-body">

                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="eLOAno"  data-sortable="true">e-LOA Number</th>
                            <th data-field="appDate" data-sortable="true">Application Date</th> 
                            <th data-field="LOAValidity" data-sortable="true">LOA Validity</th>
                        </tr>
                    </thead>
                    
                    <?php

                        $inventory = new eZTD;
                        $TIN = $_GET['TIN'];
                        $list = $inventory->myInventory2($TIN); 
                        // var_dump($list);

                        foreach($list as $data){
                            $eLOAno = $data['eLOAno'];
                            $id = $data['id'];
                            $LOAValidity = $data['LOAValidity'];
                            $appDate = $data['appDate'];
                        

                           echo "<tr>
                                    <td><a href=\"myInventoryItems2?eLOAno=".$eLOAno."&&id=".$id."\">$eLOAno</td>
                                    <td>$appDate</td>
                                    <td>$LOAValidity</td>
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