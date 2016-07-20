<?php 

include('../includes/layout.php'); 
include('../includes/BrokerSidebar.php');

	use Functions\Nominate;

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<!--Page Wrapper-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">List of Nomination</div>
                <div class="panel-body">
                    <form name="ItemList" acttion="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="companyname" data-sortable="true">Company Name</th>
                                    <th data-field="email" data-sortable="true">Email Address</th>
                                    <th data-field="cltcode"  data-sortable="true">Company ID</th>
                                    <th data-field="declarant"  data-sortable="true">Declarant</th>
                                    <th data-field="payment"  data-sortable="true">Payment</th>
                                </tr>
                            </thead>

                            <?php
                            $nominate = new Nominate;
    						$list = $nominate->MyList();

                            	$dec = "";
                                $pay = "";

                                foreach($list as $data){
                                	$id = $data['id'];
                                	$companyname = $data['companyname'];
                                	$email = $data['email'];
                                	$cltcode = $data['cltcode'];
                                	$declarant = $data['declarant'];
                                	$payment = $data['payment'];

                                    //Declarant
    	                            if($declarant == "0"){
    	                                $dec = "<font color='red'>Not Nominated</font>";
    	                            }else{
    	                                $dec = "Nominated";
    	                            }

                                    //Payment
                                    if($payment == "0"){
                                        $pay = "<font color='red'>Not Nominated</font>";
                                    }else{
                                        $pay = "Nominated";
                                    }

                                    $tablerow = "<tr>
                                        <td> $companyname </td>
                                        <td> $email </td>
                                        <td> $cltcode </td>
                                        <td> $dec </td>
                                        <td> $pay </td>
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

<?php include('../includes/footer.php');?>
<?php include('../script.php');?>