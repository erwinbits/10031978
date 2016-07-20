<?php
	require ('../../library.php');
	use Functions\FileUpload;
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/AdminLTE.min.css" rel="stylesheet">

		<br>
		<br>
        <div class="panel-heading text-center"><h3><strong>UPLOADED FILES</strong></h3></div>
        <div class="panel-body">

            <table class="table table-hover">
           
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>File Type</th>
                        <th>File Size</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <?php
					$appno = $_GET['appno'];

                	$UploadFile = new FileUpload;
					$file = $UploadFile->getFile($appno);
						foreach($file as $filename){
							//$newfile = explode('/', $filename['filename']);
							// <div class = glyphicon glyphicon-exclamation-sign><a href = /tmp_name/'.$newfile[2] . '</a></div>
					?>
						<tr>
							<td><?php echo $filename['filename'] ?></td>
							<td><?php echo $filename['type'] ?></td>
							<td><?php echo $filename['size'] ?></td>
							<!--<td><a href="/webfiles/tmp_name/<?php echo $filename['filename'] ?>" target="_blank">Download File</a></td>-->
							<td><a href="downloadUploadedFiles?download_file=<?php echo $filename['filename']?>">Download File</a></td>
						</tr>
                   <?php }
                   ?>
            </table>
        </div>

<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>