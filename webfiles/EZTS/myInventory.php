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
                <div class="panel-heading">List of Nomination</div>
                <div class="panel-body">
                    <form name="ItemList" acttion="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="ELSEname" data-sortable="true">Company Name</th>
                                    <th data-field="ELSEzone"  data-sortable="true">Zone</th>
                                    <th data-field="TIN"  data-sortable="true">Tax Identification Number</th>
                                </tr>
                            </thead>

                            <?php
                            $nominate = new Nominate;
                            $list = $nominate->MyElseList();

                                foreach($list as $data){
                                    $id = $data['id'];
                                    $ELSEname = addslashes($data['companyName']);
                                    $ELSEzone = $data['zone'];
                                    $TIN = $data['TIN'];


                                    $tablerow = "<tr>
                                        <td> <a href=\"myInventoryItems?TIN=".$TIN."&&ELSEname=".$ELSEname."\">$ELSEname </td>
                                        <td> $ELSEzone </td>
                                        <td> $TIN </td>
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