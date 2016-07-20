<?php 

include('../includes/ELSElayout.php'); 
include('../includes/elseSidebar.php');

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
                <div class="panel-heading">List of Client Enterprise</div>
                <div class="panel-body">
                    <form name="ItemList" acttion="" method="POST">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="ELSEname" data-sortable="true">Client Enterprise</th>
                                    <th data-field="ConsigneeZone" data-sortable="true">Client Zone</th>
                                </tr>
                            </thead>

                            <?php
                            $nom = new Nominate;
                            $list = $nom->MyCEList();
							//var_dump($list);
                                foreach($list as $data){
									$id = $data['id'];
                                    $company_name =$data['companyName'];
                                    $zone = $data['zone']; 

                                    $tablerow = "<tr>
                                        <td><a href=\"ELSEmyInventoryItems?companyName=".$company_name."&&id=".$id."\"> $company_name </td>
                                        <td> $zone </td>

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