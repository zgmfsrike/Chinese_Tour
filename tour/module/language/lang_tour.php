<?php
$table_name = "page_change_email";
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $content = $row[$lang];
    switch($row['name']){
      case 'title':
      $string_change_email_title = $content;
      break;
      case 'change_email':
      $string_change_email_change_email = $content;
      break;
      case 'email':
      $string_change_email_email = $content;
      break;
      case 'email_placeholder':
      $string_change_email_email_placeholder = $content;
      break;
      case 'confirm_email':
      $string_change_email_confirm_email = $content;
      break;
      case 'confirm_email_placeholder':
      $string_change_email_confirm_email_placeholder = $content;
      break;
      case 'email_match':
      $string_change_email_email_match = $content;
      break;
      case 'email_not_match':
      $string_change_email_email_not_match = $content;
      break;
      case 'save':
      $string_change_email_save = $content;
      break;
      case 'cancel':
      $string_change_email_cancel = $content;
      break;
    }
  }
} else {
  //    echo "0 results";
  header('message.php?msg=unknow_request');
}
?>
