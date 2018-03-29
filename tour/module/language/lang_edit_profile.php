<?php
$table_name = "page_edit_profile";
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $content = $row[$lang];
    switch($row['name']){
      case 'title':
      $string_edit_profile_title = $content;
      break;
      case 'account_info':
      $string_edit_profile_account_info = $content;
      break;
      case 'register':
      $string_edit_profile_register = $content;
      break;
      case 'username':
      $string_edit_profile_username = $content;
      break;
      case 'password':
      $string_edit_profile_password = $content;
      break;
      case 'confirm_password':
      $string_edit_profile_confirm_password = $content;
      break;
      case 'personal_info':
      $string_edit_profile_personal_info = $content;
      break;
      case 'first_name':
      $string_edit_profile_first_name = $content;
      break;
      case 'middle_name':
      $string_edit_profile_middle_name = $content;
      break;
      case 'last_name':
      $string_edit_profile_last_name = $content;
      break;
      case 'birth':
      $string_edit_profile_birth = $content;
      break;
      case 'occupation':
      $string_edit_profile_occupation = $content;
      break;
      case 'salary':
      $string_edit_profile_salary = $content;
      break;
      case 'mail':
      $string_edit_profile_mail = $content;
      break;
      case 'country_code':
      $string_edit_profile_country_code = $content;
      break;
      case 'tel':
      $string_edit_profile_tel = $content;
      break;
      case 'address':
      $string_edit_profile_address = $content;
      break;
      case 'city':
      $string_edit_profile_city = $content;
      break;
      case 'province':
      $string_edit_profile_province = $content;
      break;
      case 'zipcode':
      $string_edit_profile_zipcode = $content;
      break;
      case 'cancel':
      $string_edit_profile_cancel = $content;
      break;
      case 'save':
      $string_edit_profile_save = $content;
      break;
      case 'please_select':
      $string_edit_profile_please_select = $content;
      break;
      case 'profile':
      $string_edit_profile_profile = $content;
      break;
    }
  }
} else {
  //    echo "0 results";
  header('message.php?msg=unknow_request');
}
?>
