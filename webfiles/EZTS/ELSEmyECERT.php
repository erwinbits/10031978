<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

use Functions\eZTD;

$items = new eZTD;

if(isset($_POST['delete'])){

    if($items->deleteeCERT($_POST['delete'])){
        $message = "Successfully Deleted";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

if(isset($_GET['forApproval'])){

  $list = $items->ELSEmyECERTListForApproval(); 
  
}elseif(isset($_GET['Rejected'])){

  $list = $items->ELSEmyECERTListRejected();

}elseif(isset($_GET['Approved'])){

  $list = $items->ELSEmyECERTList();

}elseif(isset($_GET['forLOA'])){

  $list = $items->ELSEmyECERTListForLOA();

}else{

    $list = $items->getELSEmyEcerts();
    
    
}

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <!-- <h2>e-Certificate</h2>
            <hr> -->
            <br>
            <?php

            if(isset($_GET['forApproval'])){

                echo '<ul class="nav nav-tabs">
                <li role="presentation" ><a href="ELSEmyECERT">My eCERTS</a></li>
                <li role="presentation" ><a href="ELSEmyECERT?Approved">Approved/Used eCERTs</a></li>
                <li role="presentation" class="active"><a href="ELSEmyECERT?forApproval">eCERTs For Approval</a></li>
                <li role="presentation"><a href="ELSEmyECERT?Rejected">Rejected eCERTs</a></li>
                </ul>';

            }elseif(isset($_GET['Rejected'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="ELSEmyECERT">My eCERTS</a></li>
              <li role="presentation" ><a href="ELSEmyECERT?Approved">Approved/Used eCERTs</a></li>
              <li role="presentation"><a href="ELSEmyECERT?forApproval">eCERTs For Approval</a></li>
              <li role="presentation" class="active"><a href="ELSEmyECERT?Rejected">Rejected eCERTs</a></li>
            </ul>';

        }elseif(isset($_GET['Approved'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="ELSEmyECERT">My eCERTS</a></li>
              <li role="presentation" class="active"><a href="ELSEmyECERT?Approved">Approved/Used eCERTs</a></li>
              <li role="presentation"><a href="ELSEmyECERT?forApproval">eCERTs For Approval</a></li>
              <li role="presentation"><a href="ELSEmyECERT?Rejected">Rejected eCERTs</a></li>
            </ul>';

        }else{
                echo '<ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="ELSEmyECERT">My eCERTS</a></li>
                <li role="presentation" ><a href="ELSEmyECERT?Approved">Approved/Used eCERTs</a></li>
                <li role="presentation"><a href="ELSEmyECERT?forApproval">eCERTs For Approval</a></li>
                <li role="presentation" ><a href="ELSEmyECERT?Rejected">Rejected eCERTs</a></li>
                </ul>';
        }

            ?>

            <div class="panel panel-default">
               <div class="panel-heading text-center"><strong>E-CERTIFICATE</strong></div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-export="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="appno" data-sortable="true">Application No.</th>
                                <th data-field="ecertno" data-sortable="true">e-Certificate No</th>
                                <th data-field="name" data-sortable="true">Client Enterprise</th>
                                <th data-field="zoneCode" data-sortable="true">Client Zone</th>
                                <th data-field="appDate"  data-sortable="true">Application Date</th>
                                <th data-field="approveDate"  data-sortable="true">Approval Date</th>
                                <th data-field="rejectedDate"  data-sortable="true">Rejected Date</th>
                                <th data-field="remarks"  data-sortable="true">Remarks</th>
                                <th data-field="status"  data-sortable="true">Tag</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <?php
                                
                                    $rem = "";
                                    $status = "";
                                    //var_dump($list);
                                    foreach($list as $data){
                                        $id = $data['id'];
                                        $appno = $data['appno'];
                                        $ecertno = $data['ecertno'];
                                        $ELSEname = $data['ELSEname'];
                                        $procurement = $data['procurement'];
                                        $ZoneLoc = $data['ZoneLoc'];
                                        $date = $data['appDate'];
                                        $approvalDate = $data['approvalDate'];
                                        $status = $data['status'];
                                        $TIN = $data['TIN'];
                                        $remarks = $data['remarks'];
                                        $CEcltcode = $data['CEcltcode'];
                                        $rejectedDate = $data['rejectedDate'];

                                        if($rejectedDate = '0000-00-00 00:00:00 '){
                                            $rejectedDate = '';
                                        }else{
                                            $rejectedDate = $rejectedDate;
                                        }
                                        //Remarks
                                        if($remarks == ""){
                                            $rem ="";
                                        }else{
                                            $rem = "$remarks";
                                        }

                                        //Account Status
                                        if($status == 1){
                                            $stat = "<a class=\"btn btn-info btn-xs\" href=\"createELOA?ecertno=".$ecertno."&&id=".$id."&&TIN=".$TIN."&&CEcltcode=".$CEcltcode."\">Create e-LOA</a>";
                                            $stats = "<font color='green'>APPROVED</font>";
                                        }elseif($status == 2){
                                            $stat = "<font color='#FF0000'>REJECTED</font>";
                                            $stats = "<font color='#FF0000'>REJECTED</font>";
                                        }elseif($status == 4){
                                            $stat = "<bold><font color='red'>USED</font></bold>";
                                            $stats = "<font color='green'>APPROVED</font>";
                                        }elseif($status == 3){
                                            $stats = "<font color='green'>APPROVED</font>";
                                            $stat = "<font color='orange'>LOA IS FOR APPROVAL</font>";
                                        }elseif($status == 5){
                                            $stats = "<font color='green'>APPROVED eCERT</font>";
                                            $stat = "<font color='red'>LOA IS REJECTED</font>";
                                        }else{
                                            $stats = "FOR APPROVAL";
                                            $stat = "FOR APPROVAL";
                                        }
                                        
                                        //Approval Date
                                        if($approvalDate == "0000-00-00 00:00:00"){
                                            $approval = "";
                                        }else{
                                            $approval = "$approvalDate";
                                        }

                                        $list = $items->clienInfo($id);
                                        foreach($list as $data){
                                            $name = $data['companyName'];
                                            $zone = $data['zoneCode'];

                                        $tablerow = "<tr>
                                            <td> <a href=\"itemlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a> </td>
                                            <input type='hidden' name='procurement' value='$procurement'>
                                            <td> <a href=\"ELSEprintecert?ecertno=".$ecertno." && ELSEname=".$ELSEname." &&id=".$id."\" >$ecertno </td>
                                            <td> $name </td>
                                            <td> $zone </td>
                                            <td> $date </td>
                                            <td> $approval </td>
                                            <td> $rejectedDate </td>
                                            <td> $rem </td>
                                            <td> $stats </td>
                                            <td> $stat </td>
                                        </tr>";

                                        echo $tablerow;
                                        }
                                    }
                            ?>  
                        
                    </table>
                </div>
            </div>
            
            <!-- <div class="panel panel-default">
                <div class="panel-heading">List of Electronic Certificate</div>
                <div class="panel-body">
                    
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="appno" data-sortable="true">Application No.</th>
                                    <th data-field="ecertno" data-sortable="true">e-Certificate No</th>
									<th data-field="name" data-sortable="true">Client Enterprise</th>
									<th data-field="zoneCode" data-sortable="true">Client Zone</th>
                                    <th data-field="appDate"  data-sortable="true">Application Date</th>
                                    <th data-field="approveDate"  data-sortable="true">Approval Date</th>
                                    <th data-field="remarks"  data-sortable="true">Remarks</th>
                                    <th data-field="status"  data-sortable="true">Tag</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <?php
                                $items = new eZTD;
        						$list = $items->ELSEmyECERTList();
                                	$rem = "";
                                    $status = "";
                                    //var_dump($list);
                                    foreach($list as $data){
                                    	$id = $data['id'];
                                        $appno = $data['appno'];
                                    	$ecertno = $data['ecertno'];
                                    	$ELSEname = $data['ELSEname'];
                                    	$procurement = $data['procurement'];
                                        $ZoneLoc = $data['ZoneLoc'];
                                    	$date = $data['appDate'];
                                        $approvalDate = $data['approvalDate'];
                                    	$status = $data['status'];
                                        $TIN = $data['TIN'];
                                        $remarks = $data['remarks'];
                                        $CEcltcode = $data['CEcltcode'];

                                        //Remarks
                                        if($remarks == ""){
                                            $rem ="";
                                        }else{
                                            $rem = "$remarks";
                                        }

                                        //Account Status
                                        if($status == 1){
                                            $stat = "<a class=\"btn btn-info btn-xs\" href=\"eLOA?ecertno=".$ecertno."\">Create e-LOA</a>";
                                            $stats = "<font color='green'>APPROVED</font>";
                                        }elseif($status == 2){
                                            $stat = "<font color='#FF0000'>REJECTED</font>";
                                            $stats = "<font color='#FF0000'>REJECTED</font>";
                                        }elseif($status == 4){
                                            $stat = "<bold><font color='red'>USED</font></bold>";
											$stats = "<font color='green'>APPROVED</font>";
                                        }elseif($status == 3){
											$stats = "<font color='green'>APPROVED</font>";
											$stat = "<font color='orange'>LOA IS FOR APPROVAL</font>";
										}elseif($status == 5){
											$stats = "<font color='green'>APPROVED</font>";
											$stat = "<font color='red'>LOA IS REJECTED</font>";
										}else{
											$stats = "FOR APPROVAL";
											$stat = "FOR APPROVAL";
										}
                                        
                                        //Approval Date
                                        if($approvalDate == "0000-00-00 00:00:00"){
                                            $approval = "";
                                        }else{
                                            $approval = "$approvalDate";
                                        }

                                        $list = $items->clienInfo($id);
                                        foreach($list as $data){
                                            $name = $data['companyName'];
                                            $zone = $data['zoneCode'];

                                        $tablerow = "<tr>
                                            <td> <a href=\"itemlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a> </td>
                                            <input type='hidden' name='procurement' value='$procurement'>
                                            <!--<td> $ecertno </td>-->
											<td> <a href=\"ELSEprintecert?ecertno=".$ecertno." && ELSEname=".$ELSEname." &&id=".$id."\" >$ecertno </td>
											<td> $name </td>
											<td> $zone </td>
                                           <!-- <td> $ELSEname </td>
                                            <td> $ZoneLoc </td> -->
                                            <td> $date </td>
                                            <td> $approval </td>
                                            <td> $rem </td>
                                            <td> $stats </td>
                                            <td> $stat </td>
                                        </tr>";

                                        //echo $tablerow;
                                        }
                                    }
                            ?>      
                        </table>
                    
                </div>
            </div> -->

        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<script src="../assets/js/extensions/export/bootstrap-table-export.js"></script>
<script type="text/javascript" src="../assets/js/libs/FileSaver/FileSaver.min.js"></script>
<script type="text/javascript" src="../assets/js/libs/jsPDF/jspdf.min.js"></script>
<script type="text/javascript" src="../assets/js/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script type="text/javascript" src="../assets/js/tableExport.min.js"></script>
<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>