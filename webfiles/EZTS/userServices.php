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
use Functions\subscribeFunction;
use Functions\UserAccount;
$subscribe = new subscribeFunction;
$userInfo = new UserInfo;
$account = new UserAccount;

if(isset($_POST["Reject"]))
{
    $remarks = $_POST["remarks"];
    $id = $_POST["id"];
    $subscribe->toAmend($id, $remarks);

}
if(isset($_POST["Activate"]))
{
    
    $id = $_POST["id"];
    $subscribe->toAccept($id);

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
            <?php if(!isset($_POST["id"]) || isset($_POST["Reject"])){ ?>
                <div class="panel-heading">List of Users</div>
                <div class="panel-body">
                    <form  action="userServices" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="company_name" data-sortable="true">COMPANY NAME</th>
                                    <th data-field="name" data-sortable="true">FIRST NAME</th>
                                    <th data-field="surname"  data-sortable="true">LAST NAME</th>
                                    <th data-field="TIN" data-sortable="true">TIN</th>
                                    <th data-field="address" data-sortable="true">ADDRESS</th>
                                    <th data-field="country" data-sortable="true">COUNTRY</th>
                                    <th data-field="zip_code" data-sortable="true">ZIP CODE</th>
                                    <th data-field="appDate"  data-sortable="true">APPLICATION DATE</th>
                                    <th data-field="status"  data-sortable="true">STATUS</th>
                                </tr>
                            </thead>

                            <?php
                                                            
                                
                                $list = $subscribe->cprsGetlist();

                                if($list!="Error"){
                                    foreach ($list as $key => $value) {
                                        echo "<tr>";
                                        echo "<td>".$value["company_name"]."</td>";
                                        echo "<td>".$value["name"]."</td>";
                                        echo "<td>".$value["surname"]."</td>";
                                        echo "<td>".$value["TIN"]."</td>";
                                        echo "<td>".$value["address"]."</td>";
                                        echo "<td>".$value["country"]."</td>";
                                        echo "<td>".$value["zip_code"]."</td>";
                                        echo "<td>".$value["dateApplied"]."</td>";
                                        echo "<td><button name='id' value='".$value["id"]."' type='submit' class='btn btn-primary btn-sm'>Activate</button></td>";
                                        echo "</tr>";
                                    }
                                }

                                
                                
                            ?>     
                        </table>
                    </form>
                </div>
                <?php }
                else{ 
                    $id = $_POST["id"];
                    $info = $subscribe -> cprsGetInfo($id);
                   // $cprsInfo = $subscribe -> cprsGet
                    
                    foreach ($info[0] as $key => $data) {
                        $name = $data["name"];
                        $middle_name = $data["middle_name"];
                        $surname = $data["surname"];
                        $email = $account->getEmailbyID($id);
                        $mobile = $data['mobile'];
                        $IDNo = $data['IDNo'];
                        $telephone = $data['telephone'];

                        $company_name= $data['company_name'];
                        $companyemail = $data['companyemail'];
                        $address= $data['address'];
                        $province = $data['province'];
                        $country = $data['country'];
                        $zip_code = $data['zip_code'];
                        $PEZACORNo = $data['PEZACORNo'];;
                        $IDNo = $data['IDNo'];
                        $dateOfReg = $data['DateOfReg'];

                        

                    }

                    foreach ($info[1] as $key => $data) {
                        $dateApplied = $data["dateApplied"];
                        $cltCode = $data["cltcode"];
                        $role = $data["role"];
                        $agency = $data["agency"];
                        $birdocs = $account->getBIRdocs($id);
                        $isa = $data["isa"];
                        $additionalDocument = $data["additionalDocument"];


                    }


                    ?>
                    <div class="panel-heading">CPRS Activation</div>
                    <form  action="userServices" method="POST">
                    <input type="text" name="id" value="<?php echo $id; ?>" hidden>
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
                                            <?php echo $email; ?> 
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
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><strong>CPRS INFORMATION</strong></div>
                            <div class="panel-body " >
                                <table width="100%">
                                    <td>
                                        <label align="right" class="col-sm-3" for="Mobile">Role:&nbsp; </label>
                                        <?php echo $role; ?> 
                                    </td>
                                </table>
                                <table width="100%">
                                    <td>
                                        <label align="right" class="col-sm-3" for="Mobile">Agency:&nbsp; </label>
                                        <?php echo $agency; ?> 
                                    </td>
                                </table>
                                <table width="100%">
                                    <td>
                                        <label align="right" class="col-sm-3" for="Mobile">Date Applied:&nbsp; </label>
                                        <?php echo $dateApplied; ?> 
                                    </td>
                                </table>
                                <table width="100%" cellspacing = "10px" style="margin:0 auto;">
                                <tr>
                                    <td>
                                        <label align="right" class="col-sm-3" for="surName">BIR Document:&nbsp; </label>
                                        <?php echo "<a href=/download?download_file='".$birdocs."'>Download Here</a>"; ?> 
                                    </td>
                                </tr>
                                </table>
                                <table width="100%" cellspacing = "10px" style="margin:0 auto;">
                                <tr>
                                    <td>
                                        <label align="right" class="col-sm-3" for="surName">ISA Document:&nbsp; </label>
                                        <?php echo "<a href=/download?id='".$id."'&filename=isa>Download Here</a>"; ?> 
                                    </td>
                                </tr>
                                </table>
                                <?php 

                                if($additionalDocument!=""){ ?>
                                 <table width="100%" cellspacing = "10px" style="margin:0 auto;">
                                <tr>
                                    <td>
                                        <label align="right" class="col-sm-3" for="surName">Additional Document:&nbsp; </label>
                                        <?php echo "<a href=/download?id='".$id."'&filename=additionalDocument>Download Here</a>"; ?> 
                                    </td>
                                </tr>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group text-right">
                        <hr>
                        <button type="submit" name="Activate" class="btn btn-primary" onclick="return confirm('Are you sure you want to activate this account?');">Activate</button> &nbsp; | &nbsp;
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reject">Reject</button>
                    </div>

                    </form>
                  <?php  } ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <form method = "POST" action = "userServices">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Type Remarks</h4>
          </div>
          <div class="modal-body">
            <input type="text" name="id" value="<?php echo $id; ?>"hidden>
            <textarea rows="4" cols="50" name="remarks"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" name="Reject" class="btn btn-primary">Reject</button>
          </div>
          </form>
        </div>
      </div>
    </div>







<?php include('../includes/footer.php');?>
<?php include('../script.php');?>