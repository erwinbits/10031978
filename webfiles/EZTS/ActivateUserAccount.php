<?php 

include('../includes/layout.php'); 
	
	if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    $info = json_decode($MCrypt->decrypt($account));

    if($info->account != "0"){
        echo "You dont have access on this page";
        header("Location: /401");
    }

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

use Functions\UserInfo;
use Functions\Email\SendSMTP;
use Functions\UserAccount;

	$account = new UserAccount;
	
	$id = $_GET['id'];
	
    $msg = false;
    $users = new UserInfo;
    $userlist = $users->getUserList2($id);
    $myemail = $account->getEmailbyID($id);
        foreach($userlist as $data){
            $id = $data['id'];
            $company_name= $data['company_name'];
            $TIN = $data['TIN'];
            $address= $data['address'];
            $province = $data['province'];
            $country = $data['country'];
            $zip_code = $data['zip_code'];
            $telephone = $data['telephone'];
            $mobile = $data['mobile'];
            $companyemail = $data['companyemail'];
            $usertype = $data['usertype'];
            $name = $data['name'];
            $surname = $data['surname'];
            $middle_name = $data['middle_name'];
            $PEZACORNo = $data['PEZACORNo'];;
            $IDNo = $data['IDNo'];
            $dateOfReg = $data['DateOfReg'];

            $birdocs = $account->getBIRdocs($id);
        }

        if(isset($_POST['Activate'])){
           
            $ZONE_CODE = $_POST['ZONE_CODE'];
            $cltcode = $_POST['cltcode'];
            $account = $_POST['account'];

            $result = $users->activateUserStatus($ZONE_CODE, $cltcode, $id, $account);
			$cms = $users->checkCltcode1($id, $cltcode);
			$peza = $users->checkCltcode2($id, $cltcode);

            if($account == 6){
                $ELSE = $users->addELSE($company_name, $address, $province, $country, $companyemail, $TIN, $ZONE_CODE, $PEZACORNo);
            }                   
            if($result != "FAILED"){
                    $account = new UserAccount;
                    $email = $account->getEmailbyID($id);    
                    $account->NotifyAccountActive($email);
                    
                    $status = "SUCCESS!";
                    $responseMessage = "This Account has been successfully activated.";
                    
                }else{
                    $disp_success = "Approval Failed!";
                }
            $msg= true;

        }elseif(isset($_POST['Reject'])){
           
            $ZONE_CODE = $_POST['ZONE_CODE'];
            $cltcode = $_POST['cltcode'];
            $account = $_POST['account'];

            $result = $users->activateUserStatus($ZONE_CODE, $cltcode, $id, $account);
            $cms = $users->checkCltcode1($id, $cltcode);
            $peza = $users->checkCltcode2($id, $cltcode);

            if($account == 6){
                $ELSE = $users->addELSE($company_name, $address, $province, $country, $companyemail, $TIN, $ZONE_CODE, $PEZACORNo);
            }                   
            if($result != "FAILED"){
                    $account = new UserAccount;
                    $email = $account->getEmailbyID($id);
                    
                    $account->NotifyAccountActive($email);
                    
                    $status = "SUCCESS!";
                    $responseMessage = "This Account has been successfully activated.";
                    
                }else{
                    $disp_success = "Approval Failed!";
                }
            $msg= true;
            
        }

?>
      <?php if($msg == true){?>  
<div id="page-wrapper">      
    <div class="container-fluid">
        <br>
        <br>
        
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" id="">
                <div class="panel panel-default" id="">

                    <div class="panel-heading" id="">
                        <h4><?php echo $status; ?></h4>
                    </div>
                    
                    <div class="panel-body" id="">
                        <?php echo $responseMessage; ?><br><br>
                        <a href="home" class="btn btn-default btn-block"> <i class="fa fa-reply fa-fw"></i> Go to Dashboard</a>
                    </div>

                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div> 

<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Content-->
<div id="page-wrapper">
    <div class="container-fluid">
        <?php if($msg == false){?>
        <br>
        <br>
        <form data-toggle="validator" class="form-horizontal" role="form" id="" action="#" method="POST">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>PERSONAL INFORMATION</strong></div>
                <div class="panel-body">
                     <table width="100%" cellspacing = "10px" style="margin:0 auto;">
                        <tr>
                        <td>
                            <label align="right" class="col-sm-3" for="Name">Name: &nbsp;</label>
                            <?php echo $name; ?> 
                        </td>
                    </table>
                    <table width="100%">
                        <td>
                            <label align="right" class="col-sm-3"  for="MiddleName">Middle Name:&nbsp; </label>
                            <?php echo $middle_name; ?> 
                        </td>
                    </table>
                     <table width="100%">
                        <td>
                            <label align="right" class="col-sm-3"  for="surName">Last Name:&nbsp; </label>
                            <?php echo $surname; ?> 
                        </td>
                    </tr>
                    </table>
                    <table width="100%">
                    <tr>
                        <td>
                            <label align="right" class="col-sm-3" for="Email">Email:&nbsp; </label>
                            <?php echo $myemail; ?> 
                        </td>
                    </table>
                    <table width="100%">
                        <td>
                            <label align="right" class="col-sm-3"  for="Mobile">Mobile No.:&nbsp; </label>
                            <?php echo $mobile; ?> 
                        </td>
                    </table>
                    <table width="100%">
                        <td>
                            <label align="right" class="col-sm-3"  for="IDNo">ID No.:&nbsp; </label>
                            <?php echo $IDNo; ?> 
                        </td>

                        
                    </tr>
                    </table>
                </div>
            </div>
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>COMPANY INFORMATION</strong></div>
                    <div class="panel-body " >
                        <table width="100%" cellspacing = "10px" style="margin:0 auto;">
                            <tr>
                                <td>
                                    <label align="right" class="col-sm-3" for="CompanyName">Company Name: &nbsp;</label>
                                    <?php echo $company_name; ?> 
                                </td>
                            </table>
                            <table width="100%">
                                <td>
                                    <label align="right" class="col-sm-3" for="CompanyAdd">Company Address:&nbsp; </label>
                                    <?php echo $address . ' ' . $province . ' ' . $country . ' ' . $zip_code; ?> 
                                </td>
                            </table>
                            
                            <table width="100%">
                                <td>
                                    <label  align="right" class="col-sm-3" for="surName">Company Email:&nbsp; </label>
                                    <?php echo $companyemail; ?> 
                                </td>
                            </tr>
                        </table>

                        <table width="100%">
                            <tr>
                            <td>
                                <label align="right" class="col-sm-3" for="PEZACORno">Telephone No.:&nbsp; </label>
                                <?php echo $telephone; ?> 
                            </td>
                        </table>

                        <table width="100%">
                        <td>
                            <label align="right" class="col-sm-3" for="PEZACORno">PEZA COR No.:&nbsp; </label>
                            <?php echo $PEZACORNo; ?> 
                        </td>
                        </table?>
                        <table width="100%">
                        <td>
                            <label align="right" class="col-sm-3" for="Mobile">Registration Date:&nbsp; </label>
                            <?php echo $dateOfReg; ?> 
                        </td>
                    </table>
                        <td>
                                <label align="right" class="col-sm-3" for="surName">BIR Document:&nbsp; </label>
                                <?php echo "<a href=/download?download_file='".$birdocs."'>Download Here</a>"; ?> 
                            </td>
                    </tr>
                    </table>

                </div>
            </div>
            
            <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>REGISTERED ACTIVITIES</strong></div>
                    <div class="panel-body " >
                        <table class="table">

                           <tr>
                                <th>#</th>
                                <th>Registered Activity</th>
                                <th>Regisration Date</th>
                                
                           </tr>
                           <?php 
                           $i = 1;
                           $registeredActivities = $account->getRegActivity($id);
                           foreach($registeredActivities as $data)
                           {

                                $regAct = $data['activity'];
                                $regActDate = $data['registrationDate'];
                            echo '
                            <tr>
                                <td>'.$i++.'</td>
                                <td>'.$regAct.'</td>
                                <td>'.$regActDate.'</td>
                            </tr>
                            ';
                           }
                           ?>
                        </table>
                        <hr>
                        <br>       
                        <p>Please review carefully. Registered activity should match the supporting documents. </p>
                    </div>
            </div>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><strong>USER INFORMATION</strong></div>
                        <div class="panel-body">
                            <table style="margin:0 auto;">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="account">Client Type</label>
                                    <div class="col-sm-8">
                                        <select name="account" class="form-control" required>
                                            <option value = "">Select Client Type</option>
                                            <option value = "1">PEZA Enterprise-Main User</option>
                                           <!--  <option value = "2">Sub User</option> -->
                                            <option value = "4">INS Manager</option>
                                            <option value = "5">Cashier</option>
                                            <option value = "6">ELSE</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" >Zone</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" id="zone" name="ZONE_CODE" placeholder="Type Zone code here" value="" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                <label class="control-label col-sm-3" >Ecozone Address </label>
									<div class="col-sm-8">
										<input class="form-control" id="ecozone" type="text" value="" placeholder="ECOZONE ADDRESS"  name="ECOZONE" readonly tabindex="-1">
									</div>
								</div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" >Company Code</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="cltcode" placeholder="Company Code" value="" >
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </table>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><strong>SERVICES</strong></div>
                            <div class="panel-body">
                                <table>
                                    <div class="form-group">
                                    <label class="control-label col-md-3">e-Zone Transfer System</label>
                                        <div class="col-md-2">
                                            <select type="text" class="form-control" name="status">
                                                <?php

                                                    $query = $users->getServiceStatus($id);
                                                        foreach ($query as $value) {
                                                            $status = $value['status'];
                                                        }
                                                    //$selected_radio = '';

                                                    // if($status == '1'){
                                                    //     $selected1 = 'checked';
                                                    //     $selected2 = '';
                                                    // }else{
                                                    //     $selected1 = '';
                                                    //     $selected2 = 'checked';
                                                    // }

                                                    if($status == '1'){
                                                        $selected1="selected='selected'"; 
                                                        $selected2="";
                                                       // $selected3="";
                                                    }elseif($status == '0'){ 
                                                        $selected1="";
                                                        $selected2="selected='selected'";
                                                        //$selected3="";
                                                    }
                                                                        
                                                ?>
                                                <!-- <input required type="radio"  name="status" value="1" checked="<?php echo $selected1;?>" > Active &nbsp;
                                                <input required type="radio"  name="status" value="0" checked="<?php echo $selected2;?>" > Inactive -->
                                                <!-- <option value="">SELECT STATUS</option> -->
                                                <option value="1" <?php echo $selected1;?> >ACTIVE</option>
                                                <option value="0" <?php echo $selected2;?> >INACTIVE</option>
                                            </select>
                                        </div>
                                    </div>
                                </table>
                            </div>
                        </div>

                    <div class="form-group text-right">
                        <hr>
                        <button type="submit" name="Activate" class="btn btn-primary" onclick="return confirm('Are you sure you want to activate this account?');">Activate</button> &nbsp; | &nbsp;
                        <button type="submit" name="Reject" class="btn btn-danger" onclick="return confirm('Are you sure you want to reject this account?');">Reject</button> 
                    </div>

                </div>
            </div>
        </form>
        <?php }?>
    </div>
</div>


<?php include('../includes/footer.php');?>
<?php include('../script.php');?>

<!-- AUTOPOPULATE -->
<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/jquery-ui.js"></script>
<script src="js/autosuggestZones.js"></script>
<script src="js/validation.js"></script>
<!-- AUTOPOPULATE -->