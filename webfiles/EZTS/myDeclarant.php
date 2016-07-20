<?php 

include('../includes/ClientLayout.php'); 

$info = json_decode($MCrypt->decrypt($account));

        if($info->account == "0"){
            include('../includes/AdminSidebar.php');
        }elseif($info->account == "5"){
            include('../includes/CashierSidebar.php');
        }elseif($info->account == "1"){
            include('../includes/sidebar.php');
        }elseif($info->account == "6"){
            include('../includes/elseSidebar.php');
        }elseif($info->account == "7"){
            include('../includes/newsidebar.php');
        }else{
            include('../includes/BrokerSidebar.php');
        }


    use Functions\Nominate;
	$nominate = new Nominate;
	
	if(isset($_GET['action']) && $_GET['action'] == 'delete')
	{
		$id = $_GET['id'];
		$appno = $_GET['appno'];
		
		if($nominate->deleteDeclarant($id, $appno)){
			echo '<script language="javascript">';
			echo 'window.location.href = "/myDeclarant";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
			echo 'alert("We encountered an error deleting your Declarant.")';
			echo '</script>';
		}
		
	}

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">List of Nomination</div>
				
                <div class="panel-body">
					
					<hr>
					
                    <div class="alert alert-info" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Notice:</span>
                      <strong>Need to add an ELSE to your list?</strong> 
                      <a href = '/nominate' class="alert-link"> &nbsp; Nominate ELSE &nbsp;</a>
                    </div>
					
                    <form name="ItemList" acttion="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="ELSEname" data-sortable="true">Company Name</th><!-- 
                                    <th data-field="TIN"  data-sortable="true">Tax Identification Number</th>
                                    <th data-field="email"  data-sortable="true">Email Address</th> -->
                                    <th data-field="ELSEzone"  data-sortable="true">Zone</th>
                                    <th data-field="TIN"  data-sortable="true">Tax Identification Number</th>
                                    <th data-field="appDate"  data-sortable="true">Nominated Date</th>
                                    <th data-field="acceptedDate"  data-sortable="true">Accepted Date</th>
                                    <th data-field="taggedBy"  data-sortable="true">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <?php
                            $list = $nominate->MyElseList();

                                foreach($list as $data){
                                    $id = $data['id'];
                                    $ELSEname = addslashes($data['companyName']);
                                    $ELSEzone = $data['zone'];
                                    $TIN = $data['TIN'];
                                    $appDate = $data['appDate'];
                                    $acceptedDate = $data['acceptedDate'];
                                    $taggedBy = $data['taggedBy'];
                                    $Status = $data['Status'];
									$appno = $data['appno'];

                                    if($Status == 0){
                                        $statusnow = "For Acceptance";
										$actbtn = "<a class=\"btn btn-danger btn-xs\" href=\"myDeclarant?action=delete&id=".$id."&&appno=".$appno."\" onclick=\"return confirm('Are you sure you want to delete your Declarant?');\"  title=\"Delete Record\"><i class=\"fa fa-trash\"></i></a>";
                                    }elseif($Status == 2){
                                        $statusnow = "Rejected";
										$actbtn = "<a class=\"btn btn-danger btn-xs\" href=\"myDeclarant?action=delete&id=".$id."&&appno=".$appno."\" onclick=\"return confirm('Are you sure you want to delete your Declarant?');\"  title=\"Delete Record\"><i class=\"fa fa-trash\"></i></a>";
                                    }else{
                                        $statusnow = "<font color='green'>ACCEPTED</font>";
										$actbtn = "<a class=\"btn btn-danger btn-xs\" href=\"myDeclarant?action=delete&id=".$id."&&appno=".$appno."\" onclick=\"return confirm('Are you sure you want to delete your Declarant?');\"  title=\"Delete Record\"><i class=\"fa fa-trash\"></i></a>";
                                    }

                                    $tablerow = "<tr>
                                        <td> $ELSEname </td>
                                        <td> $ELSEzone </td>
                                        <td> $TIN </td>
                                        <td> $appDate </td>
                                        <td> $acceptedDate </td>
                                        <td> $statusnow </td>
                                        <td> $actbtn </td>
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