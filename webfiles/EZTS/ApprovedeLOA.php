<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

    use Functions\eZTD;
?>

<!--Page Wrapper-->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <h2>e-LOA</h2>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">List of Approved e-LOA</div>
                <div class="panel-body table-responsive">
                    <form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="eZTD" method="POST">
                        <table class="table table-striped table-bordered table-hover text-center" style="padding:50px;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>General Description</th>
                                    <th>Item Code</th>
                                    <th>HS Code</th>
                                    <th>Quantity</th>
                                    <th>Unit of Measure</th>
                                    <th>Unit Price</th>
                                    <th>Total Value</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <?php
                            
                            $items = new eZTD;
                            $list = $items->ApprovedeLOA();
                                $rem = "";
                                $stat = "";
                            ?>
                                
                            <?php
                                foreach($list as $data){
                                    $id = $data['id'];
                                    $itemCode = $data['itemCode'];
                                    $description = $data['description'];
                                    $HSCODE = $data['HSCODE'];
                                    $quantity = $data['quantity'];
                                    $UOM = $data['UOM'];
                                    $unitPrice = $data['unitPrice'];
                                    $totalValue = $data['totalValue'];
                                    $Remarks = $data['Remarks'];
                                    $status = $data['status'];
                                    $eLOAno = $data['eLOAno'];
                                   
                                    //Remarks
                                    if($Remarks == ""){
                                        $rem ="No remarks";
                                    }else{
                                        $rem = "$Remarks";
                                    }

                                    //Account Status
                                    if($status == 0){
                                        $stat = "For Approval";
            
                                    }elseif($status == 0 and $Remarks = "$rem"){
                                        $stat = "Rejected";
                                    }else{
                                        $stat = "APPROVED";
                                        $checkbox = "<input type=\"checkbox\" name=\"chk[]\" value=\"$eLOAno|$description|$quantity|$UOM|$unitPrice|$totalValue\">";
                                    }

                                    $tablerow = "<tr>
                                        <td> $checkbox </td> 
                                        <td> $description</td>
                                        <td> $itemCode</td>
                                        <td> $HSCODE</td>
                                        <td> $quantity </td>
                                        <td> $UOM </td>
                                        <td> $unitPrice </td>
                                        <td> $totalValue </td>
                                        <td> $rem </td>
                                        <td> $stat </td>
                                    </tr>";
                                    echo $tablerow;
                                }
                            ?>   
                        </table>
                        <br>
                        <div class="row-fluid control-group">
                            <button type="submit" name="submit" class="btn btn-inverse inline" disabled>Create e-ZTD</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<!-- JS -->
<script src="js/checkbox.js"></script>