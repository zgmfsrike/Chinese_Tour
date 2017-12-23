<?php
include 'module/session.php';
requireLogin();
if($_GET['news_id'] != ""){
  $news_id = $_GET['news_id'];

  $sql_pdf = "DELETE FROM `news_pdf` WHERE news_id = $news_id";
  $result_pdf = mysqli_query($GLOBALS['conn'],$sql_pdf);

  $sql_img = "DELETE FROM `news_image` WHERE news_id = $news_id";
  $result_img = mysqli_query($GLOBALS['conn'],$sql_img);

  $sql = "DELETE FROM `news` WHERE news_id = $news_id";
  $result = mysqli_query($GLOBALS['conn'],$sql);

  if($result){
      header("location: message.php?msg=del_news_succ");
  }

}


?>
