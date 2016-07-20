<?php
include('../includes/ClientLayout.php'); 

use Controller\SidebarController;
use Functions\Exportables;
use Functions\AEDS;
use Functions\eIP;
    

$sidebar = new SidebarController;
$aeds = new AEDS;
$sidebar->showAEDSSidebar();

    if(!$account->userIsLoged()){
        header("Location: /login");
        exit;
    }

    if(isset($_GET['forApproval'])){

    $list = $aeds->forApprovalAeds();  

    }elseif(isset($_GET['Rejected'])){

     $list = $aeds->rejectAeds();

    }elseif(isset($_GET['Approved'])){

     $list = $aeds->approvedAeds();

    }else{

      $list = $aeds->Allaeds();
    
    }
                    
?>

<!--Page Wrapper-->
<link href="css/AdminLTE.min.css" rel="stylesheet">


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
        <br>
        <h1>My Export Declarations</h1>
        <hr>
        <?php

        if(isset($_GET['forApproval'])){

            echo '<ul class="nav nav-tabs">
            <li role="presentation" ><a href="myAEDS">My AEDS</a></li>
            <li role="presentation" ><a href="myAEDS?Approved">Approved AEDS</a></li>
            <li role="presentation" class="active"><a href="myAEDS?forApproval">AEDS For Approval</a></li>
            <li role="presentation"><a href="myAEDS?Rejected">Rejected AEDS</a></li>
            </ul>';

        }elseif(isset($_GET['Rejected'])){

          echo '<ul class="nav nav-tabs">
          <li role="presentation" ><a href="myAEDS">My AEDS</a></li>
          <li role="presentation" ><a href="myAEDS?Approved">Approved AEDS</a></li>
          <li role="presentation"><a href="myAEDS?forApproval">AEDS For Approval</a></li>
          <li role="presentation" class="active"><a href="myAEDS?Rejected">Rejected AEDS</a></li>
        </ul>';

        }elseif(isset($_GET['Approved'])){

              echo '<ul class="nav nav-tabs">
              <li role="presentation" ><a href="myAEDS">My AEDS</a></li>
              <li role="presentation" class="active"><a href="myAEDS?Approved">Approved AEDS</a></li>
              <li role="presentation"><a href="myAEDS?forApproval">AEDS For Approval</a></li>
              <li role="presentation"><a href="myAEDS?Rejected">Rejected AEDS</a></li>
            </ul>';

        }else{
                echo '<ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="myAEDS">My AEDS</a></li>
                <li role="presentation" ><a href="myAEDS?Approved">Approved AEDS</a></li>
                <li role="presentation"><a href="myAEDS?forApproval">AEDS For Approval</a></li>
                <li role="presentation" ><a href="myAEDS?Rejected">Rejected AEDS</a></li>
                </ul>';
        }

            ?>
        <div class="panel panel-default">
            <div class="panel-heading"><center><strong> AEDS Items </strong></center></div>
            <div class="panel-body">
                <form class="form-horizontal" id="ImportablesForm" name="ImportablesForm" action="" method="POST">
                    <!-- <table class="table data-url="tables/data1.json" table-striped table-bordered table-hover text-center" style="padding:50px;"> -->
                    <table data-toggle="table" data-maintain-selected="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-url="/approveditems" data-page-list="[10, 25, 50, 100, 500, 1000]" data-sort-name="submissionDate" data-sort-order="desc" data-click-to-select="true">
                        <thead>
                            <tr>
                                <!-- <th data-field="checkbox" data-checkbox="true"></th> -->
                                <th data-field="appno" data-sortable="true">App no.</th>
                                <th data-field="BOCrefno" data-sortable="true">BOC Refno</th>
                                <th data-field="EDno" data-sortable="true">ED no</th>
                                <th data-field="clientName" data-sortable="true">Client Name</th>
                                <th data-field="clientTIN" data-sortable="true">Client TIN</th>
                                <th data-field="CRno"  data-sortable="true">CR No</th>
                                <th data-field="brokerName"  data-sortable="true">Broker Name</th>
                                <th data-field="Remarks"  data-sortable="true">Remarks</th>
                                <th data-field="status"  data-sortable="true">Tag</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                        
                       
                            $iCat = "";
                            $rem = "";
                            $status = "";
                           
                        ?>
                            
                        <?php
                            foreach($list as $data){
                                $appno = $data['appno'];
                                $BOCrefno = $data['BOCrefno'];
                                $EDno = $data['EDno'];
                                $clientName = $data['clientName'];
                                $clientTIN = $data['clientTIN'];
                                $CRno = $data['CRno'];
                                $brokerName = $data['brokerName'];
                                $remarks = $data['remarks'];
                                $status = $data['status'];

                                //Remarks
                                if($remarks == ""){
                                    $rem ="No remarks";
                                }else{
                                    $rem = "$remarks";
                                }
                                
                                //status
                                if($status == 1){
                                    $stat = "<font-color:green;>APPROVED</font>";
                                    $print = "<a class=\"btn btn-success btn-xs\" href=\"aedsprint?appno=".$appno." && IPno=".$EDno."\" title=\"Print\"><i class=\"fa fa-print\"></i></a>";
                                }else{
                                    $stat = "<font-color:red;>FOR APPROVAL</font>";
                                    $print = "<a class=\"btn btn-success btn-xs\" href=\"aedsprint?appno=".$appno." && IPno=".$EDno."\" title=\"Print\"><i class=\"fa fa-print\"></i></a>";
                                }

                                $tablerow = "<tr>
                                    <td> $appno </td>
                                    <td> $BOCrefno</td>
                                    <td> $EDno </td>
                                    <td> $clientName </td>
                                    <td> $clientTIN</td>
                                    <td> $CRno </td> 
                                    <td> $brokerName </td>
                                    <td> $rem </td>
                                    <td> $stat </td>
                                    <td> $print </td>
                                </tr>";
                                echo $tablerow;
                            }
                        ?>   
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php 
include('../includes/footer.php');
include('../script.php');
?>
 
<!-- JS -->
<script src="js/checkbox.js"></script>

<script>
var checkboxes = $("input[type='checkbox']"),
    submitButt = $("button[type='submit']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});
</script>

