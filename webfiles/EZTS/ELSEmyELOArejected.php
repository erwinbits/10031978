<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

use Functions\eZTD;
use Functions\SuretyBond;

$items = new eZTD;
$suretybond = new SuretyBond;
$checkbond = $suretybond->checkIfTheresAnActiveSureybond2();

if(isset($_POST['delete'])){

    if($items->deleteeLOA($_POST['delete'])){
        $message = "Successfully Deleted";
		echo "<script type='text/javascript'>alert('$message');</script>";
    }

}

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <!-- <h2>e-LOA</h2>
            <hr> -->
                <?php
                if($checkbond != 1)
                {
                echo '
                
                    <div class = "row">
                         <div class="col-md-8">
                             <div class="alert alert-danger" role="alert">
                                 <strong>Oh no!</strong> You do not have an active Surety Bond. <a href = "/registersuretybond" class="alert-link">Get one</a> before applying for an EZTD.
                            </div>
                        </div>
                    </div>
               ';
                }   
                ?>

            <br>
            <ul class="nav nav-tabs">
              <li role="presentation"><a href="ELSEmyELOA">Approved/Used LOA</a></li>
              <li role="presentation"><a href="ELSEmyELOAforApproval">For Approval LOA</a></li>
              <li role="presentation" class="active"><a href="ELSEmyELOArejected">Rejected LOA</a></li>
            </ul>

            <div class="panel panel-default">
               <div class="panel-heading text-center"><strong>E-LETTER OF AUTHORITY</strong></div>
                <div class="panel-body">
                     <form class="form-horizontal" id="" name="" action="" method="POST">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="appno" data-sortable="true">Application Number</th>
                                    <th data-field="eLOAno" data-sortable="true">e-LOA Number</th>
                                    <th data-field="ecertno" data-sortable="true">e-Certificate Number</th>
                                    <th data-field="name" data-sortable="true">Client Enterprise</th>
                                    <th data-field="ZONE_CODE" data-sortable="true">Client Zone</th>
                                    <th data-field="appDate"  data-sortable="true">Application Date</th>
                                    <th data-field="approvedDate"  data-sortable="true">Approval Date</th>
                                    <th data-field="LOAValidity"  data-sortable="true">LOA Validity</th>
                                    <th data-field="remarks"  data-sortable="true">Remarks</th>
                                    <th data-field="tag"  data-sortable="true">Status</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        
                        <?php
                                $list = $items->ELSEmyELOAListRejected();
                                    $rem = "";
                                    $status = "";

                                    foreach($list as $data){
                                        $id = $data['id'];
                                        $appno = $data['appno'];
                                        $eLOAno = $data['eLOAno'];
                                        $appDate = $data['appDate'];
                                        $approvedDate = $data['approvedDate'];
                                        $remarks = $data['Remarks'];
                                        $status = $data['status'];
                                        $LOAValidity = $data['LOAValidity'];
                                        $ecertno = $data['ecertno'];
                                        $ELSEname = $data['ELSEname'];
                                        $cltcode = $data['cltcode'];
                                        $name = $data['ConsigneeName'];
                                        $zone = $data['ConsigneeZone'];
                                        
                                        $consumed = $items->getAllBalInventory($eLOAno);
                                            foreach($consumed as $value){
                                                $current = $value['currentBal'];
                                                $ending = $value['endingBal'];
                                            }
                                            
                                        //Remarks
                                        if($remarks == ""){
                                            $rem ="";
                                        }else{
                                            $rem = "$remarks";
                                        }
                                        
                                        
                                        //Account Status
                                        if($status == 0){
                                            $stat = "<font color='#FFA500'>FOR APPROVAL</font>";
                                            $btn = "<a class=\"btn btn-warning btn-xs\" href=\"LOAlist?appno=".$appno."\" rel=\"shadowbox\" >View Items</a>";
                                        }elseif($status == 2){
                                            $stat = "<font color='red'>REJECTED</font>";
                                            $btn = "<button type='submit' name='delete' value=$appno onclick = 'deleteapp()' class=\"btn btn-danger btn-xs\" title=\"Delete\"><i class=\"fa fa-remove\"></i></button>";
                                        }elseif($status == 1 AND $checkbond != 1){
                                            $stat = "<font color='green'>APPROVED</font>";
                                            $btn = "<a class=\"btn btn-info btn-xs\" href='/suretybondinfo'>Surety Bond</a>";
                                        }/*elseif($status == 1 AND $ending == 0 AND $current == 0){
                                            $stat = "<font color='green'>APPROVED</font>";
                                            $btn ="<font color='red'>ALL ITEMS ARE USED.</font>";
                                        }*/elseif($status == 1 AND $current == 0){
                                            $stat = "<font color='green'>APPROVED</font>";
                                            $btn ="<font color='orange'>ALL ITEMS ARE FOR APPROVAL.</font>";
                                        }else{
                                            $stat = "<font color='green'>APPROVED</font>";
                                            $btn = "<a class=\"btn btn-info btn-xs\" href=\"eZTD?eLOAno=".$eLOAno."&&appno=".$appno."&&cltcode=".$cltcode."\">Create e-ZTD</a>";
                                        }

                                        //Approval Date
                                        if($approvedDate == "0000-00-00 00:00:00"){
                                            $approval = "";
                                        }else{
                                            $approval = "$approvedDate";
                                        }

                                            $tablerow = "<tr>
                                                <td> <a href=\"LOAlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a> </td>
                                                <td> <a href=\"printeloa?eLOANo=".$eLOAno." &&ELSEname=".$ELSEname." &&appno=".$appno." &&ecertno=".$ecertno."\" >$eLOAno </td> 
                                                <td> $ecertno </td>   
                                                <td> $name </td>
                                                <td> $zone </td>
                                                <td> $appDate </td>
                                                <td> $approval </td>
                                                <td> $LOAValidity </td>
                                                <td> $rem </td>
                                                <td> $stat </td>
                                                <td> $btn </td>
                                            </tr>";

                                            echo $tablerow;
                                    }
                            ?>  
                        
                    </table>
                </form>
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