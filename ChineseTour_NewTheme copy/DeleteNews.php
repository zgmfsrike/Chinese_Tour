<?php
include 'module/session.php';
isLogin();
include('db_config.php');
if($_GET['news_id'] != ""){
  $news_id = $_GET['news_id'];
  $img_path = "./images/";
  $pdf_path = "./pdf/";

  $sql_pdf = "DELETE FROM `news_pdf` WHERE news_id = $news_id";
  $result_pdf = mysqli_query($GLOBALS['conn'],$sql_pdf);

  $sql_img = "DELETE FROM `news_image` WHERE news_id = $news_id";
  $result_img = mysqli_query($GLOBALS['conn'],$sql_img);

  $sql = "DELETE FROM `news` WHERE news_id = $news_id";
  $result = mysqli_query($GLOBALS['conn'],$sql);
  for($i=1;$i<6;$i++){
    $img_name = 'img_'.$news_id.'_'.$i;
    $img_file = $img_path.$img_name.".jpg";
      unlink($img_file);
  }
  for($j=1;$j<6;$j++){
    $pdf_name = 'pdf_'.$news_id.'_'.$j;
    $pdf_file = $pdf_path.$pdf_name.".pdf";
      unlink($pdf_file);
  }

  if($result){
      header("location: message.php?msg=del_news_succ");
  }

}


?>
