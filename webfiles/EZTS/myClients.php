<?php 

include('../includes/ELSElayout.php'); 
    use Functions\Nominate;
    use Functions\UserInfo;
    use Functions\Email\SendSMTP;
    
    $user = new UserInfo;
    $servicename = 'EZTS';
	$info = json_decode($MCrypt->decrypt($account));
    $AccStatus = $user->checkSubscription($servicename);

       if($info->userType == "ADM" AND $AccStatus == "3"){
            include('../includes/AdminSidebar.php');
        }elseif($info->userType == "CSH" AND $AccStatus == "3"){
            include('../includes/CashierSidebar.php');
        }elseif($info->userType == "IM" AND $AccStatus == "3"){
            include('../includes/sidebar.php');
        }elseif($info->userType == "ELSE" AND $AccStatus == "3"){
            include('../includes/elseSidebar.php');
        }elseif($info->userType == "NEW" AND $AccStatus == "0"){
            include('../includes/newsidebar.php');
        }else{
            include('../includes/sidebar.php');
        }


	
	if(isset($_GET['action']) && $_GET['action'] == 'delete')
	{
		$id = $_GET['id'];
		$appno = $_GET['appno'];
		
		if($user->deleteCE($id, $appno)){
			echo '<script language="javascript">';
			echo 'window.location.href = "/myClients";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
			echo 'alert("We encountered an error deleting the CE.")';
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
                <div class="panel-heading">List of Clients</div>
                <div class="panel-body">
                    <form name="ItemList" acttion="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="HSCODE" data-sortable="true">Company Name</th>
                                    <!-- <th data-field="description"  data-sortable="true">Email Address</th> -->
                                    <th data-field="TIN"  data-sortable="true">Tax Identification Number</th>
                                    <th data-field="appDate"  data-sortable="true">Application Date</th>
                                    <th data-field="acceptedDate"  data-sortable="true">Accept Date</th>
                                    <th data-field="Status"  data-sortable="true">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <?php
                            $Declarants = new Nominate;

                            $mydeclist = $Declarants->MyCEList();
                                
                                foreach($mydeclist as $data){
                                    $id = $data['id'];
                                    $company_name = $data['companyName'];
                                    $TIN = $data['tin'];
                                    // $email = $data['email'];
                                    $appDate = $data['appDate'];
                                    $status = $data['Status'];
                                    $acceptedDate = $data['acceptedDate'];
                                    $appno = $data['appno'];
                                
                                    //Account Status
                                    if($status == 0)
                                    {
                                        $stats = "<a class=\"btn btn-primary btn-xs\" href=\"NominationIsApproved?&id=".$id."&&appno=".$appno."\" title=\"Accept\"><i class=\"fa fa-check\"></i></a> <a class=\"btn btn-danger btn-xs\" href=\"RejectNomination?appno=".$appno."\" title=\"Reject\"><i class=\"fa fa-times\"></i></a>";
                                        $actbtn = "";
                                    }elseif($status == 2){
                                        $stats = "<font color='red'>REJECTED</font>";
										$actbtn = "<a class=\"btn btn-danger btn-xs\" href=\"myClients?action=delete&id=".$id."&&appno=".$appno."\" onclick=\"return confirm('Are you sure you want to remove this nominated company?');\"  title=\"Delete Record\"><i class=\"fa fa-trash\"></i></a>";
                                    }else{
                                        $stats = "<font color='green'>ACCEPTED</font>";
										$actbtn = "<a class=\"btn btn-danger btn-xs\" href=\"myClients?action=delete&id=".$id."&&appno=".$appno."\" onclick=\"return confirm('Are you sure you want to remove this nominated company??');\"  title=\"Delete Record\"><i class=\"fa fa-trash\"></i></a>";
                                    }

                                    //Approval Date
                                    if($acceptedDate == "0000-00-00 00:00:00"){
                                        $accepted = "";
                                    }else{
                                        $accepted = $acceptedDate;
                                    }

                                    $tablerow = "<tr>
                                        <td> $company_name </td>
                                        <td> $TIN </td>
                                        <td> $appDate </td>
                                        <td> $accepted </td>
                                        <td> $stats </td>
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