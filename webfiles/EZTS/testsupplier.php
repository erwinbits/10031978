<?php 
include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

use Functions\eZTD;
use Functions\DropDown;
use Functions\UserAccount;

//$DropDown = new DropDown;
//$myelselist = $DropDown->getMyElse($userid);

$userid = $_SESSION['userid'];
$eZTD = new eZTD;
$account = new UserAccount;
$CEzone = $account->getCEzone($userid);



?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!-- FORM -->
	<!--Page Content-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<br>
            <h2>e-Certificate Form</h2>
            <hr>
            <?php
            if($eZTD->checkdeclarant()){
                echo '<div class="alert alert-danger" role="alert"><strong>Oh No!</strong> You have to nominate an ELSE first. To nominate <a href="/myDeclarant" class="alert-link">CLICK HERE</a>
                </div>';
            }
            ?>
			<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="viewEcert" method="POST">
                <?php $appno = "APCERT-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>e-CERT INFORMATION</strong></div>
                    <div class="panel-body">
                        <table style="margin:0 auto;">

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Application Number </label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo $appno?>" name="appno" readonly tabindex="-1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Ecozone Logistics Service Enterprise</label>
                                <div class="col-sm-8">
                                    <input class="form-control scrollable-menu" autofocus="true" type="text" id="nominated" value="" name="ELSEname" placeholder="Type ELSE name here" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-3" >Tax Identification Number </label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="tin" type="text" value="" placeholder="Tax Identification Number"  name="TIN" readonly tabindex="-1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Zone Location</label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="ZoneLoc" type="text" value="" placeholder="Zone Location"  name="ZoneLoc" readonly tabindex="-1">
                                </div>
                            </div>

							<div class="form-group">
                                <label class="control-label col-sm-3 scrollable-menu" for="supplierName">Supplier</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="supplier" value="" placeholder="Supplier"  name="supplier" required >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" >Address</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="add1" value="" placeholder="Address 1"  name="add1" required><br>
                                    <input class="form-control" type="text" id="add2" value="" placeholder="Address 2"  name="add2" ><br>
                                    <input class="form-control" type="text" id="add3" value="" placeholder="Address 3"  name="add3" >
                                </div>
                            </div>
							
							<div class="top_space form-group" id="top_space">
                                <label class="control-label col-sm-3" >ELSE Appointment</label>
                                <div class="col-sm-8">
                                    <p><select class="form-control" name="appointedBy"  class="drop_down" onchange="appointed_check(this.value);" required>
                                        <option value="0" selected="selected" disabled='disabled'> Select here</option>
                                        <option name="appointedBy" value="Company">Appointed by our Company for Procurement and Subsequent Delivery</option>
                                        <option name="appointedBy" value="Company2">Appointed by Our Company for Storage and Retrieval</option>
                                        <option name="appointedBy" value="Supplier">Appointed by Our Supplier for Procurement and Subsequent Delivery</option>
                                    </select></p>
									<br>
                                </div>
								
                                <label class="control-label col-sm-3" required>Procurement Mode</label>
                                <div class="col-sm-8">
									<!---- DIRECT IMPORT ---->
									<input type="hidden" name="directImport" value="0">
									<input type="checkbox"  name="directImport" value="1"> Direct Import <br><br>
									
									<!---- INDIRECT IMPORT ---->
									<input type="hidden" name="indirectImport" value="0">
                                    <input type="checkbox"  name="indirectImport" value="1"> Indirect Import <br>
										
										<input type="hidden" name="peza" value="0">
										&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox" name="peza" value="1"> PEZA
										
										<input type="hidden" name="nonpeza" value="0">
										&nbsp; &nbsp; &nbsp; <input type="checkbox"  name="nonpeza" value="1"> Non-PEZA <br><br>
									
									<!---- DOMESTIC ENTERPRISE ---->
									<input type="hidden" name="domesticEnterprise" value="0">
                                    <input type="checkbox"  name="domesticEnterprise" value="1"> From Domestic Enterprise
                                    
                                </div>
                            </div>
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>ITEM LIST</strong></div>
                    <div class="panel-body">
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
                                    <th>Quantity</th>
                                    <th>Unit of Measure</th>
                                </tr>
                            </thead>
                           
                            <?php
                            if(isset($_POST['chk']))
                            {
                               $data = $_POST['chk'];
                               // var_dump($_POST);
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
                                                <td><input type='number' step='0.01' min='0' class='form-control input-required' name='quantity[]' value=''  placeholder='Quantity' required></td>
                                                <td>
                                                    <select class='form-control input-required' type='text' name='UOM[]' placeholder='Please select' required>
                                                    <option name='' value=''> -UOM- </option>
                                                    <option name='UOM[]' value='ampoule'> ampoule </option>
                                                    <option name='UOM[]' value='angstroms'> angstroms </option>
                                                    <option name='UOM[]' value='assembly'> assembly </option>
                                                    <option name='UOM[]' value='barns'> barns </option>
                                                    <option name='UOM[]' value='barrels'> barrels </option>
                                                    <option name='UOM[]' value='base box'> base box </option>
                                                    <option name='UOM[]' value='bushels'> bushels </option>
                                                    <option name='UOM[]' value='carats'> carats </option>
                                                    <option name='UOM[]' value='centilitres'> centilitres </option>
                                                    <option name='UOM[]' value='centimetres'> centimetres </option>
                                                    <option name='UOM[]' value='chains'> chains </option>
                                                    <option name='UOM[]' value='circular inches'> circular inches </option>
                                                    <option name='UOM[]' value='circular mils'> circular mils </option>
                                                    <option name='UOM[]' value='cubic feet'> cubic feet </option>
                                                    <option name='UOM[]' value='cubic inches'> cubic inches </option>
                                                    <option name='UOM[]' value='cubic metres'> cubic metres </option>
                                                    <option name='UOM[]' value='cubic yards'> cubic yards </option>
                                                    <option name='UOM[]' value='decilitres'> decilitres </option>
                                                    <option name='UOM[]' value='dozen'> dozen </option>
                                                    <option name='UOM[]' value='feet'> feet </option>
                                                    <option name='UOM[]' value='fluid ounces'> fluid ounces </option>
                                                    <option name='UOM[]' value='furlongs'> furlongs </option>
                                                    <option name='UOM[]' value='gallons'> gallons </option>
                                                    <option name='UOM[]' value='gills'> gills </option>
                                                    <option name='UOM[]' value='grains'> grains </option>
                                                    <option name='UOM[]' value='gram'> gram </option>
                                                    <option name='UOM[]' value='inches'> inches </option>
                                                    <option name='UOM[]' value='kilograms'> kilograms </option>
                                                    <option name='UOM[]' value='kit'> kit </option>
                                                    <option name='UOM[]' value='litres'> litres </option>
                                                    <option name='UOM[]' value='metres'> metres </option>
                                                    <option name='UOM[]' value='miles'> miles </option>
                                                    <option name='UOM[]' value='milligrams'> milligrams </option>
                                                    <option name='UOM[]' value='millilitres'> millilitres </option>
                                                    <option name='UOM[]' value='millimetres'> millimetres </option>
                                                    <option name='UOM[]' value='nanometres'> nanometres </option>
                                                    <option name='UOM[]' value='newtons'> newtons </option>
                                                    <option name='UOM[]' value='ounces'> ounces </option>
                                                    <option name='UOM[]' value='pad'> pad </option>
                                                    <option name='UOM[]' value='panel'> panel </option>
                                                    <option name='UOM[]' value='peck'> peck </option>
                                                    <option name='UOM[]' value='pieces'> pieces </option>
                                                    <option name='UOM[]' value='pints'> pints </option>
                                                    <option name='UOM[]' value='pounds'> pounds </option>
                                                    <option name='UOM[]' value='quart'> quart </option>
                                                    <option name='UOM[]' value='slugs'> slugs </option>
                                                    <option name='UOM[]' value='square cm'> square cm </option>
                                                    <option name='UOM[]' value='square feet'> square feet </option>
                                                    <option name='UOM[]' value='square inches'> square inches </option>
                                                    <option name='UOM[]' value='square metres'> square metres </option>
                                                    <option name='UOM[]' value='square mm'> square mm </option>
                                                    <option name='UOM[]' value='square yards'> square yards </option>
                                                    <option name='UOM[]' value='stones'> stones </option>
                                                    <option name='UOM[]' value='strand'> strand </option>
                                                    <option name='UOM[]' value='strip'> strip </option>
                                                    <option name='UOM[]' value='tonnes'> tonnes </option>
                                                    <option name='UOM[]' value='tons'> tons </option>
                                                    <option name='UOM[]' value='troy ounces'> troy ounces </option>
                                                    <option name='UOM[]' value='units'> units </option>
                                                    <option name='UOM[]' value='vial'> vial </option>
                                                    <option name='UOM[]' value='yards'> yards </option>
                                            </select>   
                                                </td> 
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
                    <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Please review the details of your submission. If all is well, please click OK.')" <?php if(!isset($_POST['chk'])){echo 'disabled';}?>>View</button>
                    <!-- <button type="submit" name="save" class="btn btn-primary">Save</button> -->
                    <input type="hidden" name="CEzone" value="<?php echo $CEzone;?>">
                    <input type="hidden" name="appno" value="<?php echo $appno;?>">
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



