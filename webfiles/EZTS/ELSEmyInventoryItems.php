<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

use Functions\eZTD;

$company_name = $_GET['company_name'];
?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
	<div class="container-fluid">
		<br>
        <br>
		<div class="panel panel-default">

           <div class="panel-heading text-center"><strong><?php echo $company_name?></strong></div>
            <div class="panel-body">

                <table data-toggle="table" data-url="tables/data1.json" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="eLOAno"  data-sortable="true">e-LOA Number</th>
                            <th data-field="LOAVal"  data-sortable="true">e-LOA Value in USD</th>
                            <th data-field="appDate" data-sortable="true">Application Date</th>
                            <th data-field="LOAValidity" data-sortable="true">LOA Validity</th>
                        </tr>
                    </thead>
                    
                    <?php

                        $eZTD = new eZTD;

                        $list = $eZTD->getELOAnoListing();

                        foreach($list as $data){
                            $eLOAno = $data['eLOAno'];
                            $eLOAValue = number_format($data['LoaUSDVal'],2);
                            $LOAValidity = $data['LOAValidity'];
                            $appDate  = $data['appDate'];
                            

                           echo "<tr>
                                    <td> <a href=\"ELSEmyInventoryItems2?eLOAno=".$eLOAno."\">$eLOAno</td>
                                    <td>$ $eLOAValue</td>
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