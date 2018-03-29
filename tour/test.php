<?php
require 'module/db_config.php';

$table_name = "message_dummy";
$sql= "SELECT * FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {

  $row = mysqli_fetch_assoc($result);

  $message_head = sprintf($row['head'], $_GET['msg'],'');
  $message_body = sprintf($row['body'], $_GET['id'],'','');
  $message_btn_text = $row['btn_text'];
  $message_btn_link = $row['btn_link'];

  // echo $message_head;
  // echo $message_body;
  // echo $message_btn_text;
  // echo $message_btn_link;
}
 ?>
