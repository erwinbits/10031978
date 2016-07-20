<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');


?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <h2>User Approval</h2>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">User Lists</div>
                <div class="panel-body">
                    
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="ecertno" data-sortable="true">Application No.</th>
                                    <th data-field="appno" data-sortable="true">Client Name</th>
									<th data-field="name" data-sortable="true">Client Enterprise</th>
									<th data-field="ZONE_CODE" data-sortable="true">Client Enterprise Zone</th>
                                    <th data-field="ELSEname" data-sortable="true">Appplication Date</th>
                                    <!-- <th data-field="supplier"  data-sortable="true">Supplier</th> -->
                                    <th data-field="ZoneLoc"  data-sortable="true">Client Type</th>
                                    <!-- <th data-field="appDate"  data-sortable="true">Application Date</th>
                                    <th data-field="approveDate"  data-sortable="true">Approval Date</th> -->
                                    <!-- <th data-field="remarks"  data-sortable="true">Remarks</th> -->
                                    <th data-field="status"  data-sortable="true">Tagged</th>
                                </tr>
                            </thead>

                            <?php
           //                      $items = new eZTD;
        			// 			$list = $items->myECERTList();
           //                      	$rem = "";
           //                          $status = "";
           //                          //var_dump($list);
           //                          foreach($list as $data){
           //                          	$id = $data['id'];
           //                              $appno = $data['appno'];
           //                          	$ecertno = $data['ecertno'];
           //                          	$ELSEname = $data['ELSEname'];
           //                          	// $supplier = $data['supplier'];
           //                          	$procurement = $data['procurement'];
           //                              $ZoneLoc = $data['ZoneLoc'];
           //                          	$date = $data['appDate'];
           //                              $approvalDate = $data['approvalDate'];
           //                          	$status = $data['status'];
           //                              $TIN = $data['TIN'];

           //                              //Remarks
        	  //                           // if($remarks == ""){
        	  //                           //     $rem ="No remarks";
        	  //                           // }else{
        	  //                           //     $rem = "$remarks";
        	  //                           // }

           //                              //Account Status
           //                              if($status == 0){
           //                                  $stat = "<font color='#FFA500'>FOR APPROVAL</font>";
           //                                  //$stat = "<a href=\"itemlist?ecertno=".$ecertno."\" rel=\"shadowbox\" title=\"View eCERT Items\"><font color='#FFA500'>FOR APPROVAL </font></td>";
           //                              }elseif($status == 2){
           //                                  $stat = "<font color='#FF0000'>USED</font>";
           //                              }elseif($status == 0 and $Remarks = "$rem"){
           //                                  $stat = "Rejected";
           //                              }else{
           //                                  $stat = "<a class=\"btn btn-info btn-xs\" href=\"eLOA?ecertno=".$ecertno."&&id=".$id."&&TIN=".$TIN."\">Create e-LOA</a>";
           //                              }
                                        
           //                              //ecertno
           //                              // if($ecertno == ""){
           //                              //     $ecert = "<a href=\"itemlists?appno=".$appno."\" rel=\"shadowbox\" title=\"View eCERT Items\">0000-0000-00-000000-00-000</a>";
           //                              // }else{
           //                              //     $ecert = "<a href=\"itemlist?ecertno=".$ecertno."\" rel=\"shadowbox\" title=\"View eCERT Items\">$ecertno</a>
           //                              //     <input type='hidden' name='procurement' value='$procurement'>";

           //                              // }

           //                              $list = $items->myECERTclienInfo($id);
           //                              foreach($list as $data){
           //                                  $name = $data['name'];
           //                                  $zone = $data['ZONE_CODE'];

           //                              $tablerow = "<tr>
           //                                  <td> $ecertno </td>
           //                                  <td> <a href=\"itemlist?ecertno=".$ecertno."\" rel=\"shadowbox\" title=\"View eCERT Items\">$appno</a> </td>
           //                                  <input type='hidden' name='procurement' value='$procurement'>
											// <td> $name </td>
											// <td> $zone </td>
           //                                  <td> $ELSEname </td>
           //                                  <td> $ZoneLoc </td>
           //                                  <td> $date </td>
           //                                  <td> $approvalDate </td>
                                            
           //                                  <td> $stat </td>
           //                              </tr>";

           //                              echo $tablerow;
           //                              }
           //                          }
                            ?>      
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>
