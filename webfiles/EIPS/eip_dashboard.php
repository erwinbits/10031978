<?php
include('../../includes/ClientLayout2.php'); 
include('../../includes/eipSidebar.php');

  if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "1" && $info->account !=6){
        echo "You dont have access on this page";
        header("Location: /401");
    }
  
    use Functions\Importables;
    use Functions\eZTD;
     
?>
<!--Page Wrapper-->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="row">
        <div>
            <div class="col-md-12">
                <h3>List of approved items</h3>
                    <hr>
                    <p><strong>To apply for an e-IP, select items from your approved list and click "Create e-IP".</strong></p>
                <br>
            </div>
                <div class="col-md-4">
                    <div class="alert alert-success" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Notice:</span>
                      <strong>Add more items?</strong> 
                      <a href = '/importables' class="alert-link"> Add Items </a> 
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="alert alert-info" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Notice:</span>
                      <strong>Add items in BULK?</strong> 
                      <a href = '/ImportablesUpload' class="alert-link"> BULK UPLOAD </a> 
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="alert alert-warning" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Notice:</span>
                      <strong>Other items?</strong> 
                      <a href = '/ForApproval' class="alert-link"> For Approval/Rejected </a> 
                    </div>
                </div>
            </div>
        </div>
    
        <div class="panel panel-default">
            <div class="panel-heading"><center><strong> Importables </strong></center></div>
            <div class="panel-body">
                <form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="eIPprocess" method="POST">
                    <!-- <table class="table data-url="tables/data1.json" table-striped table-bordered table-hover text-center" style="padding:50px;"> -->
                    <table data-toggle="table" data-maintain-selected="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-url="/approveditems" data-page-list="[10, 25, 50, 100, 500, 1000]" data-sort-name="submissionDate" data-sort-order="desc" data-click-to-select="true">
                        <thead>
                            <tr>
                                <th> </th>
                                <!-- <th data-field="checkbox" data-checkbox="true"></th> -->
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
                        
                        $items = new Importables;
                        $list = $items->ApprovedItems();
                    
                            $iCat = "";
                            $rem = "";
                            $status = "";
                           
                        ?>
                            
                        <?php
                            foreach($list as $data){
                                $itemName = $data['itemName'];
                                $HSCODE = $data['HSCODE'];
                                $itemCategory = $data['itemCategory'];
                                $itemCode = $data['itemCode'];
                                $description = $data['description'];
                                $regAct = $data['regAct'];
                                $TAR_Ext = $data['TAR_Ext'];
                                $frequency = $data['frequency'];
                                $Remarks = $data['Remarks'];
                                $AccStatus = $data['AccStatus'];
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
                                    $checkbox = "<input type=\"checkbox\" name=\"chk[]\" value=\"$description|$HSCODE|$itemCode|$ItemID|$iCat\">";
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
                    <div class="row-fluid control-group">
                       <button type="submit" name="eIP" class="btn btn-inverse inline" value="eIP">Create e-IP</button> &nbsp; &nbsp; | &nbsp; &nbsp;
                        <button type="submit" name="LOA" class="btn btn-inverse inline" value="eLOA">Create e-LOA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
include('../../includes/footer.php');
include('../../script.php');
?>