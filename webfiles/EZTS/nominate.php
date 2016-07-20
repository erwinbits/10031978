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

use Functions\DropDown;
use Functions\Nominate;

    $message = false;

    if($_POST)
    {
        $companyname = addslashes($_POST['companyName']);
        $TIN = addslashes($_POST['TIN']);
        $email = addslashes($_POST['email']);
        $zone = addslashes($_POST['zone']);
        
        $nominate = new Nominate;
        
        if($nominate->accountExist($companyname)){
            $disp_success = "<center><br><br><br><h1>You already nominated this company.<h1></center><br>";
            $disp_success .= "<center><p>The company you had chosen and nominated is already in your list.</p></center>";
            $disp_success .= "<center><p>It might be you or someone in your company had already nominated the company. If you find this a mistake, please call our Customer Service Hotline for assistance.</p></center>";
            $message = true;
        }else{
        $result = $nominate->addAccount($companyname, $zone, $TIN, $email);

            if($_POST)
            {     
                if($result != "Adding data failed"){
                    $disp_success = "<center><br><br><br><h1>Thank you for nominating this Company.<h1></center><br>";
                    $disp_success .= "<center><p>Please wait while the nominated company accepts your nomination.</p></center>";
                    $disp_success .= "<center><p>The list of your nominations can be found in your sidebar. Once the nominated company accepted your nomination, you can start using their details in your application forms.</p></center>";

                    $message = true;
					
                }else{
                    $disp_success = "Nomination Failed! Please check the details";
                    $message = true;
                }
            }
        }  
    }     
?>

<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<div id="page-wrapper">
	<div class="container-fluid">
		<?php
			if($message==false)
			{
		?>
		<br>
        <h3>Logistics Service Provider Nomination</h3>
        <hr>
        <p>Search for your Ecozone Logistics Service Provider (ELSE) from the logistics companies enrolled with InterCommerce by typing a keyword from its name.</p>
        <p>Not in the list? Call <strong>+632 7521188</strong> to verify if the ELSE is enrolled with InterCommerce.</p>
        <br>
		<form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="" method="POST">
        
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>NOMINATION</strong></div>
                <div class="panel-body">
                    <table style="margin:0 auto;">


                         <div class="form-group">
                            <label class="control-label col-sm-3" >ELSE Name</label>
                            <div class="col-sm-8">
                                <input class="form-control scrollable-menu" type="text" id="else" value="" name="companyName" placeholder="Type ELSE Name here" required>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" >TIN</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="tin" type="text" placeholder="TIN" value="" name="TIN" readonly required>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>

                       

                        <div class="form-group">
                            <label class="control-label col-sm-3" >Zone</label>
                            <div class="col-sm-8">
                            
                                <input class="form-control" type="text" value="" placeholder="Zone" id="zone" name="zone" readonly required>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" >Address</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" value="" placeholder="Address 1"  id="add1" name="add1" readonly required><br>
                                <input class="form-control" type="text" value="" placeholder="Address 2"  id="add2" name="add2" readonly required><br>
                                <input class="form-control" type="text" value="" placeholder="Address 3"  id="add3" name="add3" readonly required><br>
                                <input class="form-control" type="text" value="" placeholder="Email Address"  id="email" name="email" readonly required>
                            </div>
                            <div class="help-block with-errors"></div>

                        </div>

                    </div>

                    
                        
                    </table>
                </div>
            </div>

            <!-- <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>NOMINATE THIS COMPANY FOR:</strong></div>
                <div class="panel-body">
                    <table style="margin:0 auto;">

                    <div class="form-group">
                        <label class="control-label col-md-3"></label>
                            <input type="hidden" name="declarant" value="0">
                            <input type="checkbox" value="1" name="payment"> PAYMENT

                        <div class="col-md-4">
                            <input type="hidden" name="payment" value="0">
                            <input type="checkbox" value="1" name="declarant"> DECLARANT
                        </div>
                        <div class="help-block with-errors"></div>
                    </div> -->
                        
                <!--     </table>
                </div>
            </div> -->

            <div class="text-right">
            <hr>
                <td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td>
            </div>
            <br>
        </form>

		<?php
		}else{
				echo $disp_success;
			}	
		?>
	</div>
<!-- General -->
</div>

<?php include('../includes/footer.php');?>


<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sb-admin-2.js" rel="stylesheet"></script>
<script src="js/metisMenu.min.js"></script>

<!-- AUTOPOPULATE -->
<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/jquery-ui.js"></script>
<script src="js/autocomplete.js"></script>
<!-- AUTOPOPULATE -->


