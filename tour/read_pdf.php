<?php
if(!isset($_GET['file_name'])){
  header("location: message.php?msg=unknow_request");
}
$file_path = "pdf/";
$file = $_GET['file_name'];
$file_name = $file_path.$file;
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="'.$filename.'"');
header('Content-Tranfer-Encoding:binary');
@readfile($file_name);



?>
