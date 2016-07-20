<?php include('../includes/ELSEpal.php');

use Functions\eZTD;
use Functions\Announcement;
use Functions\Nominate;
use Functions\Dashboard;
use Functions\UserAccount;

$Dashboard = new Dashboard;
$Nominate = new Nominate;
$eztd = new eZTD;
$announcement = new Announcement;
$account = new UserAccount;

$eloaforelse = $Dashboard->approvedEcertELSE();
$items = $eztd->countApprovedItems();
$announcements = $announcement->listAnnouncements();

$eLOA = $eztd->countForApprovaleLOA();
$countForApprovalitems = $eztd->countForApprovalitems();
$eCert = $eztd->countApprovedeCert();
$eztddocs = $Dashboard->countEZTDsforReceiving();

$PEZAAccountBalance = $account->getPEZAAccountBalance();
$VASPBalance = $account->getVASPAccountBalance();
$Nominations = $Nominate->nominationforAcceptance();
$openELOA = $Dashboard->openELOAELSE();

$userName = $account->userName();




?>
<!-- CSS -->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<html>
	<div class="container-fluid">
		<div style="padding: 15px 20px;">
			<span style="font-size:40px">Welcome <?php echo $userName;?>!</span>
	
			<div style="float:right; padding-top:17px; padding-right:8px;">
				<p>	<span style="color: #428bca; font-size:16px;"><strong>Today is  </strong>(<?php date_default_timezone_set('Asia/Manila'); echo date("l"); ?>) <?php echo date("F j, Y"); ?></span> </p>
			</div>
		</div>
	</div>

	<div class="inner-panel">
	<!--		
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
       <!-- <div class="small-box bg-green">
          <div class="inner">
            <h2><?php echo $eCert?></h2>
            <p>Approved eCerts</p>
          </div>
          <div class="icon">
            <i class="ion ion-checkmark"></i>
          </div>
          <a href="ELSEmyECERT" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->


    <!--  <div class="col-lg-3 col-xs-6">
        <!-- small box -->
      <!--  <div class="small-box bg-yellow">
          <div class="inner">
            <h2><?php echo $eztddocs?></h2>
            <p>My EZTD's</p>
          </div>
          <div class="icon">
            <i class="ion ion-document"></i>
          </div>
          <a href="ELSEmyEZTD" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h2><?php echo "Php " .$VASPBalance; ?></h2>
            <p>VASP Account Balance</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
          <a href="AccountPage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->


      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h2><?php echo "Php " .$PEZAAccountBalance; ?></h2>
            <p>PEZA Account Balance</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
          <a href="ELSEPEZAaccountPage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->



	</div>
	
	<div class='col-md-6'>
			<div><h4><center>Tasks</center></h4></div>
        <div class='list-group'>
          <a href='/ELSEmyECERT?forLOA' class='list-group-item'><span class='badge'><?php echo $eloaforelse; ?> </span>e-Certs for LOA Application</a>
          <a href='/ELSEmyELOA' class='list-group-item'><span class='badge'><?php echo $openELOA; ?> </span>Open ELOAs</a>
          <a href='/ELSEmyEZTD?EZTDsforReceiving' class='list-group-item'><span class='badge'><?php echo $eztddocs; ?></span>eZTDs for receiving by Client</a>
          <a href='/myClients' class='list-group-item'><span class='badge'><?php echo $Nominations; ?> </span>Nominations for Acceptance</a>
          
          
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

                      echo '<tr>
                      <td>'.$time. '</td>
                      <td>'.$announcement. '</td>
                      <td>'. $PosterName . '</td>
                      </tr>';
                      }
                  ?>

                </tbody>
            </table>

          </div>
    </div>

</html>
	
<?php include('../script.php'); ?>

<script src="/../assets/js/dashboard.js"></script>

