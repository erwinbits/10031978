<?php 
include('../includes/ClientLayout.php');
include('../includes/elseSidebar.php');

use Functions\SuretyBond;
use Functions\FileUpload;

if(isset($_POST['Activate']))
{
    $surety = new SuretyBond;

    if($surety->makeSBActive($_POST['Activate'])){
        echo '<script language="javascript">';
        echo 'alert("SuretyBond now Active")';
        echo '</script>';
    }else{
        echo '<script language="javascript">';
        echo 'alert("Failed to Activate the Suretybond")';
        echo '</script>';
    }
   
}

?>

<!--Page Content-->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">SUrety Bond</div>
                <div class="panel-body">
					
					<hr>
					<div class="alert alert-info" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Notice:</span>
                      <strong>Need to register surety bond?</strong> 
                      <a href = '/registersuretybond' class="alert-link"> &nbsp; Add Surety Bond &nbsp;</a> for PEZA approval.
                    </div>
					
                    <form name="ItemList" action="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="suretybond_company" data-sortable="true">Company Name</th>
                                    <th data-field="suretybond_refno" data-sortable="true"> Reference Number</th>
                                    <th data-field="suretybond_amount"  data-sortable="true">Amount</th>
                                    <th data-field="suretybond_validity"  data-sortable="true">Validity</th>
									<th data-field="appDate"  data-sortable="true">Application Date</th>
                                    <th data-field="status"  data-sortable="true">Status</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <?php
                            $surety = new SuretyBond;
    						$list = $surety->suretyBondList2();

                            	$dec = "";
                                $pay = "";

                                foreach($list as $data){
                                	$id = $data['id'];
                                	$suretybond_company = $data['suretybond_company'];
                                	$suretybond_refno = $data['suretybond_refno'];
                                	$suretybond_amount = number_format($data['suretybond_amount']);
                                	$suretybond_validity = $data['suretybond_validity'];
                                	$status = $data['status'];
									$appno = $data['appno'];
									$appDate = $data['appDate'];
                                    $Active = $data['Active'];
					
                                    //Payment
                                    if($status == 0){
                                        $stat = "<font color='orange'>FOR APPROVAL</font>";
                                    }elseif($status == 1){
                                        $stat = "<font color='green'>APPROVED</font>";
                                    }elseif($status == 2){
                                        $stat = "<font color='red'>REJECTED</font>";
                                    }else{
										$stat = "<font color='red'>EXPIRED</font>";
									}

                                    if($status == 1 AND $Active == 2)
                                    {
                                        $btn ="<span class='glyphicon glyphicon-ok' aria-hidden='true' style='color:green'>Active</span>";
                                        //$icon = "<span class='glyphicon glyphicon-ok' aria-hidden='true' style='color:green'>Active</span>";
                                    }elseif($status == 1 AND $Active == 1)
                                    {
                                        $btn = '<button type="submit" class="btn btn-success  btn-xs" name="Activate" value="'.$appno.'">Activate</button>';
                                        //$icon = '';
                                    }elseif($status == 1 AND $Active == 0)
                                    {
                                        $btn = '<button type="submit" class="btn btn-success  btn-xs" name="Activate" value="'.$appno.'">Activate</button>';
                                        //$icon = '';
                                    }else{
                                        $btn = '';
                                         //$icon = '';
                                    }
									

                                    $tablerow = "<tr>

                                        
										<td><a href=\"UploadedFiles?appno=".$appno."\" rel=\"shadowbox\" title=\"View Items\"> $suretybond_company</a></td>
                                        <td> $suretybond_refno </td>
                                        <td> Php $suretybond_amount </td>
                                        <td> $suretybond_validity </td>
										<td> $appDate </td>
                                        <td> $stat </td> 
                                        
                                        <td> $btn </td> 
                                    </tr>";

                                    echo $tablerow;
                                }
                            ?> 

                            <!-- <td><a class=\"btn btn-success btn-xs\" href=\"#?cltcode=".$cltcode."\" title=\"Approve this company\"><span class=\"glyphicon glyphicon-ok\"></span></a>
                                            <a class=\"btn btn-danger btn-xs\" href=\"#?cltcode=".$cltcode."\" title=\"Reject this company\"><span class=\"glyphicon glyphicon-remove\"></span></a></td> -->    
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