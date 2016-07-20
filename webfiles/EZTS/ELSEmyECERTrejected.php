<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

use Functions\eZTD;

$ecert = new eZTD;

if(isset($_POST['delete'])){

    if($ecert->deleteeCERT($_POST['delete'])){
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

            <!-- <h2>e-Certificate</h2>
            <hr> -->
            <br>
            <ul class="nav nav-tabs">
              <li role="presentation"><a href="ELSEmyECERT">Approved/Used Items</a></li>
              <li role="presentation" ><a href="ELSEmyECERTforApproval">For Approval Items</a></li>
              <li role="presentation" class="active"><a href="ELSEmyECERTrejected">Rejected Items</a></li>
            </ul>

            <div class="panel panel-default">
               <div class="panel-heading text-center"><strong>E-CERTIFICATE</strong></div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="appno" data-sortable="true">Application No.</th>
                               <!-- <th data-field="ecertno" data-sortable="true">e-Certificate No</th> -->
                                <th data-field="name" data-sortable="true">Client Enterprise</th>
                                <th data-field="ZONE_CODE" data-sortable="true">Client Zone</th>
                                <th data-field="appDate"  data-sortable="true">Application Date</th>
                                <!--<th data-field="approveDate"  data-sortable="true">Approval Date</th>-->
                                <th data-field="remarks" data-sortable="true">Remarks</th>
                                <th data-field="status" data-sortable="true">Tag</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <?php
                                $items = new eZTD;
                                $list = $items->ELSEmyECERTListRejected();
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
                                            $stat = "<a class=\"btn btn-info btn-xs\" href=\"eLOA?ecertno=".$ecertno."&&id=".$id."&&TIN=".$TIN."&&CEcltcode=".$CEcltcode."\">Create e-LOA</a>";
                                            $stats = "<font color='green'>APPROVED</font>";
                                        }elseif($status == 2){
                                            $stats = "<font color='#FF0000'>REJECTED</font>";
                                            $stat = "<button type='submit' name='delete' value=$appno onclick = 'deleteapp()' class=\"btn btn-danger btn-xs\" title=\"Delete\"><i class=\"fa fa-remove\"></i></button>";
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
                                            $name = $data['company_name'];
                                            $zone = $data['ZONE_CODE'];

                                        $tablerow = "<tr>
                                            <td> <a href=\"itemlist?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\">$appno</a> </td>
                                            <input type='hidden' name='procurement' value='$procurement'>
                                            <td> $name </td>
                                            <td> $zone </td>
                                            <td> $date </td>
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
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>