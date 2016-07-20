<?php

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;
use Functions\UserAccount;
use Functions\DropDown;

$userid = $_SESSION['userid'];
$eZTD = new eZTD;
$account = new UserAccount;
$dropdown = new DropDown;

$checkGroupNameExist = $eZTD->checkGroupName();
if($checkGroupNameExist){
	$alert = '';
}else{
	$alert = '<div class="alert alert-info" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<span class="sr-only">Notice:</span>
		<strong>Need to add an Group Name to your list?</strong> 
		<a href = "/addItemGroupName" class="alert-link"> &nbsp; Add Group Name &nbsp;</a>
	</div>';
}
?>

<link href="css/AdminLTE.min.css" rel="stylesheet">
<!-- FORM -->
	<!--Page Content-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<br>
            <h2>Add Items to Group</h2>
            <hr>
           
			<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="processAddItemGroup" method="POST">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
                    <div class="panel-body">
					<form class="form-horizontal" id="" name="viewItemGroup" action="processAddItemGroup" method="POST">
							<div class="form-group">
							<?php echo $alert; ?>
								<label class="control-label col-sm-3 scrollable-menu" for="itemGroupName">Item Group Name</label>
								<div class="col-sm-8">
									<?php
									echo "<select class='form-control' name='itemGroupName'>";
									echo "<option value='' disabled>--Select Group--</option>";
									$data = $dropdown->ItemGroupName($userid);
									foreach($data as $file){
										echo "<option value=$file[itemGroupName]>$file[itemGroupName]</option>";
									}
									 echo "</select>";
									 ?>
								</div>
							</div>		
                        <table id="dataTable" class="table table-striped table-hover text-center" style="margin:0 auto;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>General Description</th>
                                    <th>Specific Description</th>
                                    <th>HSCODE</th>
                                    <th>TAR Ext</th>
                                    <th>Item Code</th>
                                    <th></th>
                                </tr>
                            </thead>
                           
                            <?php
							
                            if(isset($_POST['chk']))
                            {
                               $data = $_POST['chk'];
                               
                               $value = explode("|",$data[0]);
                                   foreach($data as $data2)
                                   {
										$value = explode("|",$data2);

										echo "<tr>
                                                <td><input type='checkbox' name='chk[]' tabindex='-1'></td>

                                                <td width='170px'><input class='form-control input-required' type='text' name='genDesc[]' value='$value[0]' readonly tabindex='-1'></td>
                                                <td width='150px'><input class='form-control input-required' type='text' name='description[]' value='$value[1]' readonly tabindex='-1'></td>
                                                <td width='150px'><input class='form-control input-required' type='text' name='HSCODE[]' value='$value[2]' readonly tabindex='-1'></td>
                                                <td width='70px'><input class='form-control input-required' type='text' name='TAR_Ext[]' value='$value[3]' readonly tabindex='-1'></td>
                                                <td><input class='form-control input-required' type='text' name='itemCode[]' value='$value[4]' readonly tabindex='-1'></td>
                                                <td><input type='hidden' name='ItemID[]' value='$value[5]' readonly tabindex='-1'></td>
                                            </tr>";
                                    }
							}else{
								echo  "<div class='alert alert-danger' role='alert'><strong>Oh No!</strong> Please go back and <a href='/ApprovedItems'>SELECT ITEMS</a> before applying for an e-Cert</div>";
							}
					?>
                        </table>
                    </div>
                </div>

                <div class="form-group text-right">
                    <hr>
                    <button type="button" class="btn btn-danger btn-number" title="Remove" data-type="minus" onClick="deleteRow('dataTable')">
                        <span class="glyphicon glyphicon-minus-sign"></span>
                    </button>&nbsp; | &nbsp;
                    <!-- <button type="button" class="btn btn-success btn-number" title="Add Items" data-type="plus" onClick="aaddRow('dataTable')">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                    </button>&nbsp; | &nbsp; -->
                   <button type="submit" name="view" class="btn btn-primary" >SUBMIT</button>
				   <input type="hidden" value="<?php echo $UID; ?>" name="UID">
					&nbsp; | &nbsp;
					<input type="button" name="goback" value="CANCEL"class="btn btn-warning" onclick "window.location.href='/ApprovedItems'"></button>
                </div>
            </form>
		</div>
<!-- General -->
	</div>

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<!-- JS -->
<script type="text/javascript" src="js/importables.js"></script>
<!-- JS -->

<!-- AUTOPOPULATE -->
<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/jquery-ui.js"></script>

<script src="js/validation.js"></script>
<script src="js/supplierAuto.js"></script>
<!-- AUTOPOPULATE -->



<script type="text/javascript">

	function appointed_check(val) 
    {
		var status = (val != "Company")? true : false;
		for(i=0; i < chkBoxes.length; i++){
			chkBoxes[i].checked = false;
			chkBoxes[i].disabled = status;
		}

	}
	window.onload=function(){
		chkBoxes = document.getElementById('top_space').getElementsByTagName('input');
		appointed_check(0);
	}
</script>



