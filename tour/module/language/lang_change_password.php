<?php
$table_name = "page_change_password";
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $content = $row[$lang];
    switch($row['name']){
      case 'title':
      $string_change_password_title = $content;
      break;
      case 'change_password':
      $string_change_password_change_password = $content;
      break;
      case 'password':
      $string_change_password_password = $content;
      break;
      case 'password_placeholder':
      $string_change_password_password_placeholder = $content;
      break;
      case 'new_password':
      $string_change_password_new_password = $content;
      break;
      case 'new_password_placeholder':
      $string_change_password_new_password_placeholder = $content;
      break;
      case 'confirm_password':
      $string_change_password_confirm_password = $content;
      break;
      case 'confirm_password_placeholder':
      $string_change_password_confirm_password_placholder = $content;
      break;
      case 'save':
      $string_change_password_save = $content;
      break;
      case 'cancel':
      $string_change_password_cancle = $content;
      break;
    }
  }
} else {
  //    echo "0 results";
  header('message.php?msg=unknow_request');
}
?>
