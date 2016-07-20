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

    use Functions\eZTD;
	use Functions\Nominate;
	$eZTD = new eZTD;
	$nominate = new Nominate;
	
	if(isset($_GET['action']) && $_GET['action'] == 'delete')
	{
		$appno = $_GET['appno'];
		
		if($nominate->deleteSupplier($appno)){
			echo '<script language="javascript">';
			echo 'window.location.href = "/mySupplier";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
			echo 'alert("We encountered an error deleting your Supplier.")';
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
                <div class="panel-heading">List of Supplier</div>
                <div class="panel-body">
					<hr>
					
                    <form name="ItemList" acttion="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                                <tr>
									<th data-field="appno" data-sortable="true"> Appno </th>
                                    <th data-field="supplier" data-sortable="true"> Supplier Name </th>
									<th data-field="TIN"  data-sortable="true"> Tax Identification Number </th>
                                    <th> Address </th>
                                    <th data-field="ZoneLoc"  data-sortable="true"> Zone Location </th>
                                </tr>
                            </thead>

                            <?php
							$id = $_SESSION['userid'];
    						$list = $eZTD->getSupplier($id);

                                foreach($list as $data){
									$appno = $data['appno'];
                                    $supplier = $data['supplier'];
                                    $TIN = $data['TIN'];
                                    $add1 = $data['add1'];
                                    $add2 = $data['add2'];
									$add3 = $data['add3'];
                                    $ZoneLoc = $data['ZoneLoc'];

                                    echo "<tr>
                                        <td> $supplier </td>
                                        <td> $TIN </td>
                                        <td> $add1, $add2, $add3 </td>
                                        <td> $ZoneLoc </td>
										<td><a class=\"btn btn-danger btn-xs\" href=\"mySupplier?action=delete&appno=".$appno."\" onclick=\"return confirm('Are you sure you want to delete your Supplier?');\"  title=\"Delete Record\"><i class=\"fa fa-trash\"></i></td>
                                       
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