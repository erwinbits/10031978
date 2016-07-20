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

if(isset($_GET['forApproval'])){

$list = $items->ELSEmyELOAListForApproval();

}elseif(isset($_GET['Rejected'])){

$list = $items->ELSEmyELOAListRejected();

}elseif(isset($_GET['Approved'])){

  $list = $items->ELSEmyELOAListApproved();

}else{

    $list = $items->getESLEmyELOA();
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
            <br>
                <?php
                if($checkbond != 1)
                {
                echo '
                
                    <div class = "row">
                         <div class="col-md-8">
                             <div class="alert alert-danger" role="alert">
                                 <strong>Oh no!</strong> You do not have an active GTSB. You can only apply for IntraZone Transfers. To apply, please <a href = "/registersuretybond" class="alert-link">click here</a>. 
                            </div>
                        </div>
                    </div>
               ';
                }   

            if(isset($_GET['forApproval'])){

                echo '<ul class="nav nav-tabs">
                <li role="presentation" ><a href="ELSEmyELOA">My eLOAs</a></li>
                <li role="presentation" ><a href="ELSEmyELOA?Approved">Approved/Used eLOAs</a></li>
                <li role="presentation" class="active"><a href="ELSEmyELOA?forApproval">eLOAs For Approval</a></li>
                <li role="presentation"><a href="ELSEmyELOA?Rejected">Rejected eLOAs</a></li>
                </ul>';

            }elseif(isset($_GET['Rejected'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="ELSEmyELOA">My eLOAs</a></li>
              <li role="presentation" ><a href="ELSEmyELOA">Approved/Used eLOAs</a></li>
              <li role="presentation"><a href="ELSEmyELOA?forApproval">eLOAs For Approval</a></li>
              <li role="presentation" class="active"><a href="ELSEmyELOA?Rejected">Rejected eLOAs</a></li>
            </ul>';

        }elseif(isset($_GET['Approved'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="ELSEmyELOA">My eLOAs</a></li>
              <li role="presentation" class="active" ><a href="ELSEmyELOA?Approved">Approved/Used eLOAs</a></li>
              <li role="presentation"><a href="ELSEmyELOA?forApproval">eLOAs For Approval</a></li>
              <li role="presentation"><a href="ELSEmyELOA?Rejected">Rejected eLOAs</a></li>
            </ul>';

        }else{

                echo '<ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="ELSEmyELOA">My eLOAs</a></li>
                <li role="presentation" ><a href="ELSEmyELOA?Approved">Approved/Used eLOAs</a></li>
                <li role="presentation"><a href="ELSEmyELOA?forApproval">eLOAs For Approval</a></li>
                <li role="presentation" ><a href="ELSEmyELOA?Rejected">Rejected eLOAs</a></li>
                </ul>';
        }

            ?>


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
                                    <th data-field="remarks"  data-sortable="false">Remarks</th>
                                    <th data-field="tag"  data-sortable="false">Status</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        
                        <?php
                        
                        $rem = "";
                        $status = "";

                        foreach($list as $data)
                        {
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
                            $ELSEzone = $data['ELSEzone'];
                             $fetch= $items->viewLOAitems($appno);
                            
                            // TAGGING 
                            if($status == '0')
                            {
                            $tag = "<font color='#FFA500'>FOR APPROVAL</font>";
                                        
                            }elseif($status == '1'){
                                $tag = "<font color='green'>APPROVED</font>";
                                
                            }elseif($status == '3'){
                                $tag = "<font color='red'>EXPIRED</font>";
                               
                            }elseif($status == '2'){
                                $tag = "<font color='red'>REJECTED</font>";
                                
                            }else{
                                $tag = "<font color='red'>EXPIRED</font>";
                               
                            }

                            //Approval Date
                            if($approvedDate == "0000-00-00 00:00:00"){
                                $approval = "Not Yet Approved";
                            }else{
                                $approval = "$approvedDate";
                            }
                            
                             //Remarks
                            if($remarks == ""){
                                $rem ='No Remarks';
                            }else{
                                $rem = "$remarks";
                            }
                                    

                            //BUTTONS/STATUS

                            if($status == '1')
                            { 
                                foreach($fetch as $val){

    							    $ItemID = $val['ItemID'];
                                    $consumed = $items->getAllBalInventory($eLOAno,$ItemID);
                                    
                                    foreach($consumed as $value){

                                        $current = $value['currentBal'];
                                        $ending = $value['endingBal'];	
                                    }
                                }

                                if($status == '1' AND $checkbond != '1' AND $ELSEzone != $zone AND $current != '0'){
                                    $btn = "<a class=\"btn btn-info btn-xs\" href='/suretybondinfo'>Surety Bond</a>";
                                }elseif($status == '1' AND $checkbond != '1' AND $ELSEzone == $zone AND $current != '0'){
                                    
                                    $btn = "<a class=\"btn btn-info btn-xs\" href=\"eZTD?eLOAno=".$eLOAno."&&appno=".$appno."&&cltcode=".$cltcode."\">Create e-ZTD</a>";
                                
                                }elseif($status == '1' AND $checkbond != '1' AND $ELSEzone == $zone AND $current == '0'){
                                    $btn = "<font color='red'>ELOA ITEMS WERE CONSUMED</font>";
                                // }elseif($status == '1' AND $current == '0' ){
                                //  $btn = "<font color='orange'>CONSUMED</font>";
                                }else{
                                    $btn = "<a class=\"btn btn-info btn-xs\" href=\"eZTD?eLOAno=".$eLOAno."&&appno=".$appno."&&cltcode=".$cltcode."\">Create e-ZTD</a>";

                                }
                                        
                            }elseif($status == '2'){
                                $btn = "<font color='red'>REJECTED</font>";
                            }else{
                                $btn = "<font color='blue'>FOR APPROVAL</font>";
                            }

                                        echo "<tr>
                                            <td> <a href=\"LOAlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a> </td>
                                            <td> <a href=\"printeloa?eLOANo=".$eLOAno." &&ELSEname=".$ELSEname." &&appno=".$appno." &&ecertno=".$ecertno."\" >$eLOAno </td> 
                                            <td> $ecertno </td>   
                                            <td> $name </td>
                                            <td> $zone </td>
                                            <td> $appDate </td>
                                            <td> $approval </td>
                                            <td> $LOAValidity </td>
                                            <td> $rem </td>
                                            <td> $tag </td>
                                            <td> $btn</td>
                                        </tr>";

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