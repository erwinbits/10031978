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
use Controllers\PEZANominateController;
$pezaNominate = new PEZANominateController;
    


$pezaNominate-> myClientsPost();

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <br>
            <a href="PEZA_MyClients">Nominated</a> <a href="PEZA_MyClients?show=accepted ">Accepted</a> <a href="PEZA_MyClients?show=rejected ">Rejected</a>
            <div class="panel panel-default">
                <div class="panel-heading">List of Clients</div>
                <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="appDate" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="appno" data-sortable="true">Application Number</th>
                                    <th data-field="Company Name" data-sortable="true">Company Name</th>
                                    <!-- <th data-field="description"  data-sortable="true">Email Address</th> -->
                                    <th data-field="TIN"  data-sortable="true">Tax Identification Number</th>
                                    <th data-field="appDate"  data-sortable="true">Application Date</th>
                                    <th data-field="acceptedDate"  data-sortable="true">Accept Date</th>
                                    <th data-field="Status"  data-sortable="true">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <?php
                           
                            if(isset($_GET["show"]))
                                $show = $_GET["show"];
                            else
                                $show = "";
                            if($show=="accepted"){
                                $mydeclist = $pezaNominate->getNominationAccepted();
                            }else if($show == "rejected"){
                                $mydeclist = $pezaNominate->getNominationRejected();
                            }else{
                                $mydeclist = $pezaNominate->getNominationNotApproved();
                            }

                            
                                
                                foreach($mydeclist as $data){
                                    $id = $data['id'];
                                    $company_name = $data['companyName'];
                                    $TIN = $data['TIN'];
                                    // $email = $data['email'];
                                    $appDate = $data['appDate'];
                                    $status = $data['Status'];
                                    $acceptedDate = $data['acceptedDate'];
                                    $appno = $data['appno'];
                                    $appnoDisplay = $appno;


                                    $appnoDisplay = '<form id="myForm" action="PEZA_Nom_Profile" method="post">
                                    <input type="text" name="id" value="'.$id.'" hidden>
                                    <input type="submit"  name = "appno" value='.$appno.'>
                                    </form>';


                                    //Account Status
                                    if($status == 0)
                                    {

                                        $actbtn = "<form action='PEZA_MyClients' method='post'>";


                                        $acceptButton ="&nbsp
                                                    <input type='text' name='id' value='".$id."' hidden>
                                                     <input type='text' name='appno' value='".$appno."' hidden>
                                                       <button type=submit name='action' value='accept' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-check'  aria-hidden='true'  onclick=\"return confirm('Are you sure you want to Accept?')\"></span></button>
                                                       <select name='status'>
                                                        <option value = '1'>By Name</option>
                                                        <option value = '2'>By Payment</option>
                                                        <option value = '3'>BOTH Payment and Name</option>
                                                       </select>
                                                      

                                                     ";
                                      $rejectButton="
                                                    <button type=submit name='action' value='reject' class='btn btn-danger btn-xs' onclick=\"return confirm('Are you sure you want to reject?')\" title='reject'> <span class='glyphicon glyphicon-remove'></span> </button>
                                                   ";

















                                        

                                       $actbtn .= $acceptButton;
                                       $actbtn .= $rejectButton;
                                       $actbtn .= "</form>";


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
                                        <td> $appnoDisplay </td>
                                        <td> $company_name </td>
                                        <td> $TIN </td>
                                        <td> $appDate </td>
                                        <td> $accepted </td>
                                        <td> $status </td>
                                        <td> $actbtn </td>
                                    </tr>";

                                    echo $tablerow;
                                }
                            ?>      
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('../includes/footer.php');?>
<?php include('../script.php');?>