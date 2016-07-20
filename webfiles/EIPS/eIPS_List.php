<?php 

include('../includes/ClientLayout.php'); 


    use Functions\eIP;
    use Functions\Nominate;
    $eIP = new eIP;
    $nominate = new Nominate;

    


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
<?php include('script.php');?>
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
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                                <tr>
									<th data-field="appno" data-sortable="true"> Application No. </th>
                                    <th data-field="IPno" data-sortable="true"> IP No. </th>
									<th data-field="importersName"  data-sortable="true"> Importer's Name </th>
                                    <th data-field="zoneLocation"  data-sortable="true"> Zone Location </th>
                                    <th data-field="modeOfTransport"  data-sortable="true"> Mode of Transport </th>
                                    <th data-field="countryOrigin"  data-sortable="true"> Country Origin </th>
                                    <th data-field="departureDate"  data-sortable="true"> Departure Date </th>
                                    <th data-field="portDischarge"  data-sortable="true"> Port Of Discharge </th>
                                    <th data-field="arrivalDate"  data-sortable="true"> Arrival Date </th>
                                    <th data-field="LOANumber"  data-sortable="true"> LOA Number </th>
                                    <th data-field="status"  data-sortable="true"> Status </th>
                                    <th> VIEW </th>
                                </tr>
                            </thead>

                            <?php
							$id = $_SESSION['userid'];
    						$list = $eIP->getEIPinfoByUserId($id);

                                foreach($list as $data){
    	                            echo "<tr>";
                                    echo "<td>".$data["appno"]."</td>";
                                    echo "<td>".$data["IPno"]."</td>";
                                    echo "<td>".$data["importersName"]."</td>";
                                    echo "<td>".$data["zoneLocation"]."</td>";
                                    echo "<td>".$data["modeOfTransport"]."</td>";
                                    echo "<td>".$data["countryOrigin"]."</td>";
                                    echo "<td>".$data["departureDate"]."</td>";
                                    echo "<td>".$data["portDischarge"]."</td>";
                                    echo "<td>".$data["arrivalDate"]."</td>";
                                    echo "<td>".$data["LOANumber"]."</td>";
                                    echo "<td>".$data["status"]."</td>";
                                    echo "<td><button>View</button></td>";
                                    echo "</tr>";

                                }
                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var checkboxes = $("input[type='checkbox']"),
    submitButt = $("button[type='submit']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});
</script>

<script type="text/javascript">
function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  }
}
</script>
<?php include('../includes/footer.php');?>
