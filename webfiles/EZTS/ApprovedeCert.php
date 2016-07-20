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

            <h2>e-Certificate</h2>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">List of Approved e-Certificate</div>
                <div class="panel-body table-responsive">
                    <form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="eCert" method="POST">
                        <table class="table table-striped table-bordered table-hover text-center" style="padding:50px;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>e-Certificate Number</th>
                                    <th>Ecozone Logistics Service Enterprise</th>
                                    <th>Supplier</th>
                                    <th>Procurement</th>
                                    <th>Zone Location</th>
                                </tr>
                            </thead>

                            <?php
                            
                            $items = new eZTD;
                            $list = $items->ApprovedeCert();

                                foreach($list as $data){
                                    $id = $data['id'];
                                    $ecertno = $data['ecertno'];
                                    $ELSEname = $data['ELSEname'];
                                    $supplier = $data['supplier'];
                                    $procurement = $data['procurement'];
                                    $ZoneLoc = $data['ZoneLoc'];
                                    $status = $data['status'];

                                    //Account Status
                                    if($status == 0){
                                        $stat = "For Approval";
            
                                    }elseif($status == 0 and $Remarks = "$rem"){
                                        $stat = "Rejected";
                                    }else{
                                        $stat = "APPROVED";
                                        $checkbox = "<input type=\"checkbox\" name=\"chk[]\" value=\"$ecertno\">";
                                    }

                                    $tablerow = "<tr>
                                        <td> $checkbox</td>
                                        <td> <a href=\"eCERTitems?ecertno=".$ecertno."\">$ecertno</td>
                                        <td> $ELSEname</td>
                                        <td> $supplier</td>
                                        <td> $procurement</td>
                                        <td> $ZoneLoc </td>>
                                    </tr>";
                                    echo $tablerow;
                                }
                            ?>   
                        </table>
                        <br>
                        <div class="row-fluid control-group">
                            <button type="submit" name="submit" class="btn btn-inverse inline" disabled>Create e-LOA</button> &nbsp; | &nbsp;
                            <button type="" name="submit" class="btn btn-warning" disabled>Print e-Certificate</button>
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