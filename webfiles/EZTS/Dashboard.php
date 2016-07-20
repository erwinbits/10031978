<?php 

include('../includes/PAL.php');

use Functions\eZTD;
use Functions\Announcement;
use Functions\Nominate;
use Functions\Dashboard;

$Dashboard = new Dashboard;
$Nominate = new Nominate;
$eztd = new eZTD;
$announcement = new Announcement;

$ecertforApproval = $Dashboard->eCertsForApproval();
$eCertsForELOA = $Dashboard->eCertsForELOA();
$openELOA = $Dashboard->openELOA();
$items = $eztd->countApprovedItems();
$countForApprovalitems = $eztd->countForApprovalitems();
$eCert = $eztd->countApprovedeCert();
$eztddocs = $Dashboard->countEZTDsforReceivingCE();

$PEZAAccountBalance = $account->getPEZAAccountBalance();
$VASPBalance = $account->getVASPAccountBalance();

$announcements = $announcement->listAnnouncements();
$Nominations = $Nominate->nominationforAcceptanceCE();

date_default_timezone_set('Asia/Manila');

$userName = $account->userName();

?>
<!-- CSS -->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<div class="container-fluid">
		<div style="padding: 15px 20px;">
			<span style="font-size:30px">Welcome <?php echo $userName;?></span>
	
			<div style="float:right; padding-top:17px; padding-right:8px;">
				<p>	<span style="color: #428bca; font-size:16px;"><strong>Today is  </strong>(<?php echo date("l"); ?>) <?php echo date("F j, Y"); ?></span> </p>
			</div>
		</div>
	</div>

	<div class="inner-panel">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h2><?php echo $items?></h2>
          <p>Approved Items</p>
        </div>
        <div class="icon">
          <i class="ion ion-checkmark"></i>
        </div>
        <a href="ApprovedItems" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->


    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h2><?php echo $eztddocs?></h2>
          <p>My Permits</p>
        </div>
        <div class="icon">
          <i class="ion ion-document"></i>
        </div>
        <a href="myEZTD" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->

     <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h2><?php echo "Php " . $VASPBalance?></h2>
          <p>VASP Account Balance</p>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <a href="AccountPage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h2><?php echo "Php " . $PEZAAccountBalance?></h2>
          <p>PEZA Account Balance</p>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <a href="AccountPage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
	</div>	

	<div class='col-md-6'>
			<div><h4><center>Tasks</center></h4></div>
				<div class='list-group'>
		  
		  			<a href='/ForApproval' class='list-group-item'><span class='badge'><?php echo $countForApprovalitems; ?> </span>Importables for Approval</a>
            <a href='/myECERT?forApproval' class='list-group-item'><span class='badge'><?php echo $ecertforApproval ?> </span>eCerts for Approval</a>
            <a href='/myECERT' class='list-group-item'><span class='badge'><?php echo $eCertsForELOA; ?> </span>eCerts for LOA Application</a>
            <a href='/myELOA' class='list-group-item'><span class='badge'><?php echo $openELOA; ?> </span>Open eLOAs</a>
				  	<a href='/myEZTD?EZTDsforReceiving' class='list-group-item'><span class='badge'><?php echo $eztddocs; ?></span>ZTDs for Receiving </a>
				  	 <a href='/myDeclarant' class='list-group-item'><span class='badge'><?php echo $Nominations; ?> </span>Nominations for Acceptance</a>
            <br>
			 </div>
		</div>

    <div class='col-md-6'>
      <div><h4><center>PEZA Announcements</center></h4></div>

          <div class="panel-body">
            <table class = "table table-hover">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Announcement</th>
                    <th>Posted by:</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    foreach($announcements as $news){
                      $id = $news['id'];
                      $announcement = $news['announcement'];
                      $time = $news['timestamp'];
                      $PostedBy = $news['PostedBy'];
                      $PosterName = $Dashboard->getPosterName($PostedBy);

                      echo '
                      <tr>
                        <td>'.$time. '</td>
                        <td>'.$announcement. '</td>
                        <td>'.$PosterName. '</td>
                      </tr>
                      ';
                      }
                  ?>

                </tbody>
            </table>
          </div>
        </div>
       </div>

<?php include('../script.php'); ?>

<script src="/../assets/js/dashboard.js"></script>