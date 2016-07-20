<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

	use Functions\Importables;
    use Functions\eZTD;

?>

<!--Page Wrapper-->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">List of Approved Items</div>
                <div class="panel-body table-responsive">
                    <form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="" method="POST">
                        <table class="table table-striped table-bordered table-hover text-center" style="padding:50px;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Item Name</th>
                                    <th>HS Code</th>
                                    <th>Item Category</th>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>LOA No.</th>
                                    <th>LOA Validity</th>
                                    <th>Registered Activity</th>
                                    <!--<th data-field="regDate"  data-sortable="true">Registered Date</th>
                                    <th data-field="Appno"  data-sortable="true">App No.</th> -->
                                    <th>TAR EXT</th>
                                    <th>Frequency</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <?php
                            //$id = (isset($_GET['id']));
                            $items = new Importables;
    						$list = $items->ApprovedItems();
                        
                            	$iCat = "";
                            	$rem = "";
                                $status = "";
                            ?>
                            	
                            <?php
                                foreach($list as $data){
                                	$id = $data['id'];
                                    $itemName = $data['itemName'];
                                	$HSCODE = $data['HSCODE'];
                                    $itemCategory = $data['itemCategory'];
                                	$itemCode = $data['itemCode'];
                                	$description = $data['description'];
                                	$LOAno = $data['LOAno'];
                                	$LOAValidity = $data['LOAValidity'];
                                    $regAct = $data['regAct'];
                                    //$regDate = $data['regDate'];
                                	//$Appno = $data['Appno'];
                                	$TAR_Ext = $data['TAR_Ext'];
                                    $frequency = $data['frequency'];
                                	$Remarks = $data['Remarks'];
                                	$AccStatus = $data['AccStatus'];

                                    //Item Category
                                    if($itemCategory == 0){
    									$iCat = "None";
    								}elseif($itemCategory == 1){
                                        $iCat = "Regulated";
                                    }else{
                                        $iCat = "Unregulated";
                                    }

                                    //Remarks
    	                            if($Remarks == ""){
    	                                $rem ="No remarks";
    	                            }else{
    	                                $rem = "$Remarks";
    	                            }

                                    //Account Status
                                    if($AccStatus == 0){
                                        $status = "For Approval";
            
                                    }elseif($AccStatus == 0 and $Remarks = "$rem"){
                                        $status = "Rejected";
                                    }else{
                                        $status = "APPROVED";
                                        $checkbox = "<input type=\"checkbox\" name=\"chk[]\" value=".$HSCODE.">";
                                    }

                                    $tablerow = "<tr>
                                        <td> $checkbox </td>
                                        <td><input class=\"form-control\" type=\"text\" name=\"itemName[]\" value=".$itemName." readonly></td>
                                        <td> $HSCODE </td>
                                        <td> $iCat </td> 
                                        <td><input class=\"form-control\" type=\"text\" name=\"itemCode[]\" value=".$itemCode." readonly></td>
                                        <td><input class=\"form-control\" type=\"text\" name=\"itemCode[]\" value=".$description." readonly></td>
                                        <td> $LOAno </td>
                                        <td> $LOAValidity </td>
                                        <td> $regAct </td> 
                                        <td> $TAR_Ext </td>
                                        <td> $frequency </td>
                                        <td> $rem </td>
                                        <td> $status </td>

                                    </tr>";

                                    echo $tablerow;
                                }

                            ?>   
                        </table>
                        <br>
                        <div class="row-fluid control-group">
                            <button type="submit" name="submit" class="btn btn-inverse inline" disabled>Create e-Cert</button>
                    </form>
                            <?php
                                $get = new eZTD;
                                    if(isset($_POST['submit'])){
                                        $chk = array();
                                        if(!empty($_POST['chk'])){
                                            foreach((array) $_POST['chk'] as $id){
                                                if($submit = $get->getHSCODE($HSCODE)){
                                                var_dump($_POST);
                                                }
                                            }
                                        }
                                    }
                            ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<!-- JS -->
<script src="js/checkbox.js"></script>