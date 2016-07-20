<?php 

include('../includes/ClientLayout.php'); 
include('../includes/sidebar.php');

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
                <div class="panel-heading">List of For Approval Items</div>
                <div class="panel-body">
                    <form name="ItemList" acttion="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="HSCODE" data-sortable="true">Company Name</th>
                                    <th data-field="itemCode" data-sortable="true">TIN</th>
                                    <th data-field="description"  data-sortable="true">Declarant</th>
                                    <th data-field="itemCategory"  data-sortable="true">Payment</th>
                                    <th data-field="AccStatus"  data-sortable="true">Status</th>
                                </tr>
                            </thead>

                            <?php
                            $Declarants = new Nominate;


                            
                            $mydeclist = $Declarants->MyDeclarants($_SESSION['userid']);

                            
                                foreach($mydeclist as $data){
                                    $id = $data['id'];
                                    $companyName = $data['companyName'];
                                    $TIN = $data['TIN'];
                                    $declarant = $data['declarant'];
                                    $payment = $data['payment'];
                                    $status = $data['status'];

                                
                                    //Account Status
                                    if($status == 0){
                                        $status = "For Approval";
            
                                    }elseif($status == 0){
                                        $status = "Rejected";
                                    }else{
                                        $status = "APPROVED";
                                    }

                                    $tablerow = "<tr>
                                        <td> $companyName </td>
                                        <td> $TIN </td>
                                        <td> $declarant </td>
                                        <td> $payment </td> 
                                        <td> $status </td>
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