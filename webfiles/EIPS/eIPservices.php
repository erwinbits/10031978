<?php 
    include('../../includes/layout2.php');
   
   use Functions\eIP;

   if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "1" AND $info->account != "5"){
        echo "You dont have access on this page";
        header("Location: /401");
    }

        if($info->account == "0"){
            include('../includes/AdminSidebar.php');
        }elseif($info->account == "5"){
            include('../../includes/CashierSidebar.php');
        }elseif($info->account == "1"){
            include('../../includes/eipSidebar.php');
        }elseif($info->account == "6"){
            include('../includes/elseSidebar.php');
        }elseif($info->account == "7"){
            include('../includes/newsidebar.php');
        }else{
            include('../includes/BrokerSidebar.php');
        }
		
		if($_POST){
			$serviceName = $_POST['serviceName'];
		}

?>

<!-- CSS -->
<!-- <link href="../assets/css/sb-admin-2.css" rel="stylesheet"> -->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/shadowbox.css" rel="stylesheet">

<!--Page Wrapper-->	
<div id="page-wrapper">
	<div class="container-fluid col-md-12"><br><br>
		<div class="panel panel-default">
			<div class="panel-heading"><strong><center>List of Services</center></strong></div>
			<div class="panel-body">
			<form class="form-horizontal" id="itemGroupName" name="itemGroupName" action="eIPeditService" method="POST">
				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="DateCreated" data-sort-order="desc">
					<thead>
					<tr>
						<th data-field="serviceID"  data-sortable="true">Service ID</th>
						<th data-field="serviceName"  data-sortable="true">Name</th>
						<th data-field="serviceFee"  data-sortable="true">Amount</th>
						<th data-field="lastModified"  data-sortable="true">Last Modified</th>
						<th>Action</th>
					</tr>
					</thead>
                        
                        <?php
                            $eip = new eIP;	
                            $list = $eip->getServices();
                            foreach($list as $data){
                                $id = $data['id'];
                                $serviceID = $data['serviceID'];
                                $serviceName = $data['serviceName'];
                                $serviceFee = $data['serviceFee'];
                                $lastModified = $data['lastModified'];
                                   
								echo "<tr>
									<td>$serviceID</td>
									<td>$serviceName</td>
									<td>$serviceFee</td>
									<td>$lastModified</td>
									<td><center><a class=\"btn btn-primary btn-xs\" href=\"eIPeditService?id=".$id."\"><i class=\"fa fa-pencil\"></td>
								</tr>";	
                            }
                        ?>
				</table>
			</form>
			</div>
		</div>
	</div>
</div><!--/.row-->  

<?php include('../../includes/footer.php'); ?>
<?php include('../../script.php'); ?>

<script type="text/javascript" src="js/shadowbox.js"></script>