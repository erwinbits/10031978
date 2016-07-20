<?php 

include('../includes/PAL.php');

use Functions\eZTD;
use Functions\Announcement;
use Functions\Dashboard;

date_default_timezone_set('Asia/Manila');
$Dashboard = new Dashboard;
$eztd = new eZTD;
$announcement = new Announcement;

$items = $eztd->countApprovedItems();
$eztddocs = $eztd->countEZTDitems();

$PEZAAccountBalance = $account->getPEZAAccountBalance();
$VASPBalance = $account->getVASPAccountBalance();

$announcements = $announcement->listAnnouncements();
?>
<!-- CSS -->
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<div class="container-fluid">
		<div style="padding: 15px 20px;">
			<span style="font-size:40px">Welcome!</span>
	
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
          <h2><i class="fa fa-truck fa-fw"></i> </h2>
          <p>Add Services</p>
        </div>
        <div class="icon">
          <i class="fa fa-truck fa-fw"></i>
        </div>
        <a href="CreateUserProfile" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->


    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h2><i class="ion ion-document"></i></h2>
          <p>Profile</p>
        </div>
        <div class="icon">
          <i class="ion ion-document"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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


	<!-- announcement -->
	<div class='col-md-12'>
		<br>
		<br>
      <div><h4><center>PEZA Announcements</center></h4></div>

          <div class="panel-body">
            <table class = "table table-hover">
                <thead>
                  <tr>
                    <th><center>Date</center></th>
                    <th><center>Announcement</center></th>
                    <th><center>Posted by:</center></th>
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
                      <td><center>'.$time. '</center></td>
                      <td><center>'.$announcement. '</center></td>
                      <td><center>'.$PosterName. '</center></td>
                      </tr>';
                      }
                  ?>

                </tbody>
            </table>

          </div>
    </div>


<?php include('../script.php'); ?>

<script src="/../assets/js/dashboard.js"></script>