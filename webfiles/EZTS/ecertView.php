<?php
require("../library.php");

use Functions\eCERT;
use Functions\eZTD;
use Functions\UserAccount;

$ecert = new eCERT;
$eztd = new eZTD;
$account = new UserAccount;

$ecertno = $_GET['ecertno'];
//$ecertno = 'ELSE-LPT1-EC-716380-15-16A';
$ELSEname = $_GET['ELSEname'];
//$ELSEname = 'TEST ELSE'
$taggedBy = $_GET['taggedBy'];
$id = $_SESSION['userid'];
$appno = $_GET['appno'];
$DateofReg = $ecert->getPEZACORDateofReg($id);
$repname = $ecert->getAuthorisedRep($id);
$ecertinfo = $ecert->geteCERTinfo($appno);
$ecertitems = $ecert->geteCERTitems($appno);

$datenow = date('Y-m-d h:i:s', time());
$zonename = $ecert->getZoneName();

///Fieleds required//

$ELSEname
$appno
$ZoneCE
$DateNow
$itemArray

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clients List</title>
            <link rel="icon" href="/ico/favicon.ico">

        <!-- CSS plugins -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet">

      
        <!-- CSS custom -->
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/bootstrap-table.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pezacustomnavbar.css" rel="stylesheet">
        
    </head>
    <body>
    <link href="css/AdminLTE.min.css" rel="stylesheet">
        <div id="page-wrapper" style="margin:0 auto; width:1100px">
             <div class="row">
                 <div class="panel panel-default">
                   
                    
                    <div style="text-align:center"><h2>e-Certificate</h2><br /></div>
                    <br>
                    <br>
                    <table border = "0">
                        <tr>
                            <td> PEZA Enterprise &nbsp; : &nbsp; <strong><?php echo $ELSEname; ?> </strong></td>
                            <td> Application No &nbsp; : <strong><?php echo $appno; ?></strong></td>
                        </tr>
                        <br>

                        <tr>
                            <td> Zone Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; <strong><?php echo $ZoneCE; ?> </strong></td>
                            <td> Date Submitted &nbsp;&nbsp; : <strong><?php echo date('Y-m-d') ?></strong></td>
                        </tr>
                        <br>

                        <tr>
                            <td> </td>
                            <td> Date Approved &nbsp;&nbsp; : <strong>For Approval</strong></td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                    <p style="text-align:justify">';

                        <?php
                        $appointedBy = $ecert->geteCERTappointedBy($ecertno);
                        
                        if($appointedBy == "Company"){
                            
                            $elsePEZACOR = $ecert->getELSEpezaCOR($ELSEname);
                            $elseaddress = $ecert->getELSEadd($ELSEname);

                            
                            echo 'This is to certify that <strong>' . $ecertdata['ELSEname'] . '</strong> is our appointed <strong>Warehouse/Logistics Service Provider</strong> which will procure and store for subsequent sale/delivery to our facility, the goods described thru <strong>' . $ecertdata['procurement'] . '</strong>. <br>';
                            
                            echo'<br><strong>' . $ecertdata['ELSEname'] . '</strong> is a PEZA-registered Ecozone Logistics Service Enterprise (ELSE) or Ecozone Facilities enterprise engaged in warehousing/logistics operations under C.R. No.: <strong>' . $elsePEZACOR . '</strong> dated <strong>' .$DateofReg.'</strong> with facility located in <strong>' . $zonename .'</strong>.
                            <br><br><br><br>';
                        
                        }else{
                            
                            $elsePEZACOR = $ecert->getELSEpezaCOR($ELSEname);
                            $elseaddress = $ecert->getELSEadd($ELSEname);
                        
                           echo 'This is to certify that <strong>' . $ecertdata['ELSEname'] . '</strong> is the appointed <strong>Warehouse/Logistics Service Provider</strong> of our supplier namely <strong>' . $ecertdata['supplier'] . '</strong> with address at <strong>' . $ecertdata['add1'] .' '. $ecertdata['add2'] .'</strong>.It shall procure in behalf of our company and store the goods in its warehouse for subsequent delivery to our facility.<br>'; 

                            echo '<br><strong>' . $ecertdata['ELSEname'] . '</strong> is a PEZA-registered Ecozone Logistics Service Enterprise (ELSE) or Ecozone Facilities enterprise engaged in warehousing/logistics operations under C.R. No.: <strong>' . $elsePEZACOR . '</strong> dated <strong>' .$DateofReg.'</strong> with facility located in <strong>' . $zonename .'</strong>.
                            <br><br><br><br>';
                            
                        }
                    }

                    echo '<table border="1" cellpadding="5">
                        <tr>
                            <th bgcolor="#bebfbf" align="center"><strong>Generic Description</strong></th>               
                            <th bgcolor="#bebfbf" align="center"><strong>Item Code</strong></th>  
                            <th bgcolor="#bebfbf" align="center"><strong>Specific Description</strong></th> 
                            <th bgcolor="#bebfbf" align="center"><strong>Qty</strong></th>               
                            <th bgcolor="#bebfbf" align="center"><strong>UOM</strong></th>  
                            <th bgcolor="#bebfbf" align="center"><strong>Registered Project</strong></th>
                        </tr>';

                    $count = count($_POST['HSCODE']);
                        for($x=0;$x<$count;$x++){
                            $TAR_Ext = $_POST['TAR_Ext'][$x];
                            $HSCODE = $_POST['HSCODE'][$x];
                            $genDesc = $_POST['genDesc'][$x];
                            $itemCode = $_POST['itemCode'][$x];
                            $description = $_POST['description'][$x];
                            $quantity = $_POST['quantity'][$x];
                            $UOM = $_POST['UOM'][$x];
                            $ItemID = $_POST['ItemID'][$x];

                        echo '<tr>
                                    <td align="center">'.$items['genDesc'].'</td>
                                    <td align="center">'.$items['itemCode'].'</td>
                                    <td align="center">'.$items['description'].'</td>
                                    <td align="center">'.$items['quantity'].'</td>
                                    <td align="center">'.$items['UOM'].'</td>
                                    <td align="center"></td>
                                </tr>';
                    } 

                    echo '</table>

                    <br>
                    <br>
                    <br>
                    We further certify that the above goods with tax and duty exemption incentives shall be used exclusively in our PEZA-register activities. 
                    <br>
                    <table border = "0">
                        <tr>
                            <th align="left"><strong>'. $ELSEname . '</strong> </th>
                            <th align="left"><strong>ENDORSED :</strong></th>
                        </tr>
                        <br>
                        <br>

                        <tr>';
                            foreach($repname as $name){
                            echo '<td><strong>'.$name['name'].' '.$name['middle_name']. ' '.$name['surname'] . '</strong></td>
                                      <td align="left"><strong>'.$taggedBy.'</strong></td>
                        </tr>
                        <br>
                        
                        <tr>
                            <td>Authorised Representative</td>
                            <td align="left"><strong>'.$zonename.'</strong></td>
                        </tr>
                        <br>

                        <br>
                        <tr>
                            <td>ID No. &nbsp;: &nbsp;<strong>' . $name['IDNo'] . '</strong></td>
                        </tr>
                        <br>';

                    }
                    echo ' <tr>
                                <td>Date &nbsp;&nbsp;&nbsp; : &nbsp;<strong>' . $datenow .'</strong></td>
                        </tr>

                    </table>
                    ';

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>