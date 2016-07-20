<?php
//download.php
// $fname = $_GET['filename'];
					
// $filename=$fname;
// $file="c:\\myfile\\$filename";
// $len = filesize($file); // Calculate File Size
// ob_clean();
// header("Pragma: public");
// header("Expires: 0");
// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
// header("Cache-Control: public"); 
// header("Content-Description: File Transfer");
// header("Content-Type:application/pdf"); // Send type of file
// $header="Content-Disposition: attachment; filename=$filename;"; // Send File Name
// header($header );
// header("Content-Transfer-Encoding: binary");
// header("Content-Length: ".$len); // Send File Size
// @readfile($file);
// exit;

ignore_user_abort(true);
set_time_limit(0); // disable the time limit for this script


$path = "../tmp_name/"; // change the path to fit your websites document structure
$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_GET['download_file']); // simple file name validation
$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
$fullPath = $path.$dl_file;

if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    ob_clean();
    switch ($ext) {
        case "pdf":
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
        // add more headers for other content types here
        default;
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
        break;
    }
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose($fd);
exit;


?>