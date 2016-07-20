<?php
//require("../../library.php");
include('../includes/layout.php');
$info = json_decode($MCrypt->decrypt($account));
        
$AccStatus = $account->getStatus();

if($info->account == "0" AND $AccStatus == "2"){
            include('../includes/AdminSidebar.php');
        }elseif($info->account == "5" AND $AccStatus == "2"){
            include('../includes/CashierSidebar.php');
        }elseif($info->account == "1" AND $AccStatus == "2"){
            include('../includes/sidebar.php');
        }elseif($info->account == "6" AND $AccStatus == "2"){
            include('../includes/elseSidebar.php');
        }elseif($info->account == "7" AND $AccStatus == "0"){
            include('../includes/newsidebar.php');
        }else{
            include('../includes/newsidebar.php');
        }
 
use Functions\eCERT;
use Functions\eZTD;
use Functions\UserAccount;
use Functions\Item;

$itemfunction = new Item;
$ecert = new eCERT;
$eztd = new eZTD;
$account = new UserAccount;
$id = $_SESSION['userid'];
//var_dump($_POST);
//From Functions

$companyname = $account->getCompanyName($id);


// ## --- ECERTINFO --- ##
$ELSEname = strtoupper($_POST['ELSEname']);
$TIN = strtoupper($_POST['TIN']);
$supplier = strtoupper($_POST['supplier']);
$add1 = strtoupper($_POST['add1']);
$add2 = strtoupper($_POST['add2']);
$add3 = strtoupper($_POST['add3']);
$ZoneLoc = strtoupper($_POST['ZoneLoc']);
$appointedBy = $_POST['appointedBy'];
$CEzone = $_POST['CEzone'];
$appno = $_POST['appno'];

// ## --- PROCUREMENT --- ##
if(isset($_POST['directImport'])){
    $directImport = $_POST['directImport'];
    
}else{
    $directImport = '0';
    
}

if(isset($_POST['indirectImport'])){
    $indirectImport = $_POST['indirectImport'];
    
}else{
    $indirectImport = '0';
    
}

if(isset($_POST['domesticEnterprise'])){
    $domesticEnterprise = $_POST['domesticEnterprise'];
    
}else{
    $domesticEnterprise = '0';
    
}

if(isset($_POST['peza'])){
    $peza = $_POST['peza'];
    
}else{
    $peza = '0';
    
}

if(isset($_POST['nonpeza'])){
    $nonpeza = $_POST['nonpeza'];
    
}else{
    $nonpeza = '0';
    
}

?>

    <link href="css/AdminLTE.min.css" rel="stylesheet">
        <div id="page-wrapper">
            <br>
            <br>  
            <div class="row">
                <div class='container-fluid'>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><strong>e-CERT APPLICATION</strong></div>
                            <div class="panel-body">        
                                    <table width="100%">
                                        <tr>
                                            <td>PEZA ENTERPRISE  &nbsp;:</td> 
                                            <td><strong><?php echo $companyname;?></strong></td> 
                                            <td>Appliction Number &nbsp;:</td>
                                            <td><strong>FOR APPROVAL</strong> </td>
                                        </tr>
                                         <br>
                                        <tr>
                                            <td>Zone Location &nbsp; </td>
                                            <td><strong><?php echo $CEzone;?></strong></td> 
                                            <td>Date Submitted &nbsp;: </td>
                                            <td><strong><?php echo date('Y-m-d G:i:s');?></strong></td>
                                         </tr>
                                    </table>
                                    <br>
                                    <br>
                                   <?php
                                            if($appointedBy == 'Company')
                                            {
                                            $checkcompany = 'checked';
                                            $checkcompany2 = '';
                                            $checksupplier =' ';

                                            }elseif($appointedBy == 'Company2')
                                            {
                                            $checkcompany = '';
                                            $checkcompany2 = 'checked';
                                            $checksupplier ='';
                                            }else
                                            {                       
                                            $checkcompany = ' ';
                                            $checkcompany2 = '';
                                            $checksupplier ='checked';
                                            }



                                            ## --- PROCUREMENT --- ##
                                            if($directImport == '1'){
                                            $check = 'checked = "checked"';
                                            }else{
                                            $check = ' ';
                                            }

                                            if($indirectImport == '1'){
                                            $check2 = 'checked =  "checked"';
                                            }else{
                                            $check2 = ' ';
                                            }

                                            if($domesticEnterprise == '1'){
                                            $checkd = 'checked =  "checked"';
                                            }else{
                                            $checkd = ' ';
                                            }

                                            ## --- SOURCE --- ##
                                            if($peza == '1'){
                                            $checkp = 'checked = "checked"';
                                            }else{
                                            $checkp = ' ';
                                            }

                                            if($nonpeza == '1'){
                                            $checkn = 'checked = "checked"';
                                            }else{
                                            $checkn = ' ';
                                            }



                                        ## --- ECERT DOCUMENT --- ##

                                        echo '<p>This is to certify that <strong>' . $ELSEname . ' is:</p>
                                        <br>
                                        <p></strong>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="appointedBy" value="" '.$checkcompany.' disabled/>our appointed <strong>Warehouse/Logistics Service Provider</strong> which will procure and store for subsequent sale/delivery to our facility, the goods described below either thru:</p>
                                        <table width="100%">
                                        <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="directImport" value="" '.$check.'" disabled/><label for="direct">Direct Import</label>
                                        </td>
                                        <td><input type="checkbox" name="indirectImport" value="1" '.$check2.'" disabled/><label for="indirect">Indirect Import</label>
                                        </td>

                                        <td><input type="checkbox" name="domesticEnterprise" value="1" '.$checkd.'" disabled/><label for="indirect">Sourced from Domestic Enterprise</label>
                                        </td>
                                        <td> &nbsp;</td>
                                        </tr>
                                        <tr>
                                        <td></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="peza" value="" '.$checkp.'" disabled/><label for="peza">PEZA</label></td>
                                        </tr>
                                        <tr>
                                        <td></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="nonpeza" value="" '.$checkn.'" disabled/><label for="nonPEZA">Other Export-oriented Enterprise</label></td>
                                        </tr>
                                        </table>
                                        <br>
                                        ';

                                        echo '<p>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="appointedBy" value="" '.$checksupplier.' disabled/>the appointed <strong>Warehouse/Logistics Service Provider</strong> of our supplier namely <strong>' . $supplier . '</strong> with address at <strong>'. $add1 .' '. $add2 .'</strong>. It shall procure in behalf of our company and store the goods in its warehouse for subsequent delivery to our facility.</p><br>';

                                        echo '<p></strong>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="company" value="" '.$checkcompany2.' disabled/>our appointed <strong>Service Provider</strong> for the storage and subsequent retrieval of goods described below:</p>';

                                        echo '<br><strong>' . $ELSEname. '</strong> is a PEZA-registered Ecozone Logistics Service Enterprise (ELSE) or Ecozone Facilities enterprise engaged in warehousing/logistics operations under C.R. No.: <strong>' . $account->getPEZACorNobyCo($ELSEname) . '</strong> dated <strong>' .$account->getPEZACorRegDate($ELSEname).'</strong> with facility located in <strong>' .  $account->getECOZone($ZoneLoc) .'</strong>.
                                        <br><br><br><br>';


                                    ?>

                                        <table border="1" cellpadding="5" align="center" width="100%">
                                            <tr>
                                                <th bgcolor="#bebfbf" align="center"><strong><center>Generic Description</center></strong></th>               
                                                <th bgcolor="#bebfbf" align="center"><strong><center>Item Code</center></strong></th>  
                                                <th bgcolor="#bebfbf" align="center"><strong><center>Specific Description</center></strong></th> 
                                                <th bgcolor="#bebfbf" align="center"><strong><center>Qty</center></strong></th>               
                                                <th bgcolor="#bebfbf" align="center"><strong><center>UOM</center></strong></th>  
                                                <th bgcolor="#bebfbf" align="center"><strong><center>Registered Project</center></strong></th>
                                            </tr>

                                            <!--- ECERT ITEMS -->

                                            <?php
                                                $count = count($_POST['HSCODE']);
                                                for($x=0;$x<$count;$x++)
                                                {
                                                    $TAR_Ext = $_POST['TAR_Ext'][$x];
                                                    $HSCODE = $_POST['HSCODE'][$x];
                                                    $genDesc = $_POST['genDesc'][$x];
                                                    $itemCode = $_POST['itemCode'][$x];
                                                    $description = $_POST['description'][$x];
                                                    $quantity = $_POST['quantity'][$x];
                                                    $UOM = $_POST['UOM'][$x];
                                                    $ItemID = $_POST['ItemID'][$x];
                                                    $regAct = $itemfunction->getItemRegAct($ItemID);
                                                    echo '<tr>
                                                    <td align="center">'.$genDesc.'</td>
                                                    <td align="center">'.$itemCode.'</td>
                                                    <td align="center">'.$description.'</td>
                                                    <td align="center">'.$quantity.'</td>
                                                    <td align="center">'.$UOM.'</td>
                                                    <td align="center">'.$regAct.'</td>
                                                    </tr>';
                                                } 

                                                echo '</table>

                                                <br>
                                                <br>
                                                We further certify that the above goods with tax and duty exemption incentives shall be used exclusively in our PEZA-register activities. 
                                                <br>
                                                <br>
                                                <br>
                                                <table border = "0" width="800px">
                                                <tr>
                                                <td align="left" width="70%"><strong>'. $companyname . '</strong> </td>
                                                <td align="left" width="30%">ENDORSED :</td>
                                                </tr>

                                                </table>
                                                <table border = "0" width="800px">
                                                <tr>';

                                                echo '<td  align="left" width="70%"><strong>'.$account->username() . '</strong></td>
                                                <td align="left" width="30%"><strong>ZONE MANAGER</strong></td>
                                                </tr>
                                                <br>

                                                <tr>
                                                <td align="left" width="70%">Authorised Representative</td>
                                                <td align="left" width="30%"><strong>ZONE</strong></td>
                                                </tr>
                                                <br>

                                                <br>
                                                <tr>
                                                <td>ID No. &nbsp;: &nbsp;<strong>' . $account->getUsersIDno($id) . '</strong></td>
                                                </tr>
                                                <br>';



                                                echo ' <tr>
                                                <td>Date &nbsp;&nbsp;&nbsp; : &nbsp;<strong>' . date('Y-m-d H:m:s') .'</strong></td>
                                                </tr>

                                                </table>


                                                ';

                                            ?>
                                </div>
                            </div>
                            <div>
                            <br>
                                <h4><center>
                                    Please carefully review before submitting the application.
                                </center></h4>
                            <form class="form-horizontal" id="" name="viewEcert" action="processEcert" method="POST">
                                <center>
                                    <button type="submit" name="view" class="btn btn-primary" onclick="return confirm('Please review the details of your submission. If all is well, please click OK.')">SUBMIT</button>
                                    <input type="button" name="goback" value="CANCEL"class="btn btn-warning" onclick="window.location.href='/ApprovedItems'"></button>
                                    <input type="hidden" name="CEzone" value="<?php echo $CEzone;?>">
                                    <input type="hidden" name="appno" value="<?php echo $appno;?>">
                                    <input type="hidden" name="ELSEname" value="<?php echo $ELSEname;?>">
                                    <input type="hidden" name="TIN" value="<?php echo $TIN;?>">
                                    <input type="hidden" name="supplier" value="<?php echo $supplier;?>">
                                    <input type="hidden" name="add1" value="<?php echo $add1;?>">
                                    <input type="hidden" name="add2" value="<?php echo $add2;?>">
                                    <input type="hidden" name="add3" value="<?php echo $add3;?>">
                                    <input type="hidden" name="ZoneLoc" value="<?php echo $ZoneLoc;?>">
                                    <input type="hidden" name="appointedBy" value="<?php echo $appointedBy;?>">
                                    <input type="hidden" name="directImport" value="<?php echo $directImport;?>">
                                    <input type="hidden" name="indirectImport" value="<?php echo $indirectImport;?>">
                                    <input type="hidden" name="domesticEnterprise" value="<?php echo $domesticEnterprise;?>">
                                    <input type="hidden" name="peza" value="<?php echo $peza;?>">
                                    <input type="hidden" name="nonpeza" value="<?php echo $nonpeza;?>">
                                    <input type="hidden" name="procurement" value="<?php echo '0';?>">

                                    <?php 
                                     $count = count($_POST['HSCODE']);
                                    for($x=0;$x<$count;$x++)
                                    {
                                        $TAR_Ext = $_POST['TAR_Ext'][$x];
                                        $HSCODE = $_POST['HSCODE'][$x];
                                        $genDesc = $_POST['genDesc'][$x];
                                        $itemCode = $_POST['itemCode'][$x];
                                        $description = $_POST['description'][$x];
                                        $quantity = $_POST['quantity'][$x];
                                        $UOM = $_POST['UOM'][$x];
                                        $ItemID = $_POST['ItemID'][$x];
                                        //$regAct = $itemfunction->getItemRegAct($ItemID);

                                    echo'<input type="hidden" name="HSCODE[]" value="'.$HSCODE.'">
                                    <input type="hidden" name="TAR_Ext[]" value="'.$TAR_Ext.'">
                                    <input type="hidden" name="genDesc[]" value="'.$genDesc.'">
                                    <input type="hidden" name="itemCode[]" value="'.$itemCode.'">
                                    <input type="hidden" name="description[]" value="'.$description.'">
                                    <input type="hidden" name="quantity[]" value="'.$quantity.'">
                                    <input type="hidden" name="UOM[]" value="'.$UOM.'">
                                    <input type="hidden" name="ItemID[]" value="'.$ItemID.'">';
                                }
                                ?>

                                </center>
                            <form>
                            <br>
                            <br>
                        </div>
                    </div> <!--end of Panel Default -->
                </div>
            </div>
        </div>

</body>
<?php include('../includes/footer.php');?>
</html>

