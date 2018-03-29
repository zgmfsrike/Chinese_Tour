<?php
$table_name = "page_profile";
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $content = $row[$lang];
    switch($row['name']){
      case 'title':
      $string_profile_title = $content;
      break;
      case 'profile':
      $string_profile_profile = $content;
      break;
      case 'account_info':
      $string_profile_account_info = $content;
      break;
      case 'personal_info':
      $string_profile_personal_info = $content;
      break;
      case 'username':
      $string_profile_username = $content;
      break;
      case 'first_name':
      $string_profile_first_name = $content;
      break;
      case 'middle_name':
      $string_profile_middle_name = $content;
      break;
      case 'last_name':
      $string_profile_last_name = $content;
      break;
      case 'birth':
      $string_profile_birth = $content;
      break;
      case 'tel':
      $string_profile_tel = $content;
      break;
      case 'edit_profile':
      $string_profile_edit_profile = $content;
      break;
      case 'change_password':
      $string_profile_change_password = $content;
      break;
      case 'change_email':
      $string_profile_change_email = $content;
      break;
    }
  }
} else {
  //    echo "0 results";
  header('message.php?msg=unknow_request');
}
?>
