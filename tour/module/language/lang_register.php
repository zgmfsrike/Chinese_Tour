<?php
$table_name = "page_register";
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $content = $row[$lang];
    switch($row['name']){
      case 'title':
      $string_register_title = $content;
      break;
      case 'account_info':
      $string_register_account_info = $content;
      break;
      case 'register':
      $string_register_register = $content;
      break;
      case 'username':
      $string_register_username = $content;
      break;
      case 'password':
      $string_register_password = $content;
      break;
      case 'confirm_password':
      $string_register_confirm_password = $content;
      break;
      case 'personal_info':
      $string_register_personal_info = $content;
      break;
      case 'first_name':
      $string_register_first_name = $content;
      break;
      case 'middle_name':
      $string_register_middle_name = $content;
      break;
      case 'last_name':
      $string_register_last_name = $content;
      break;
      case 'birth':
      $string_register_birth = $content;
      break;
      case 'occupation':
      $string_register_occupation = $content;
      break;
      case 'salary':
      $string_register_salary = $content;
      break;
      case 'mail':
      $string_register_mail = $content;
      break;
      case 'country_code':
      $string_register_country_code = $content;
      break;
      case 'tel':
      $string_register_tel = $content;
      break;
      case 'address':
      $string_register_address = $content;
      break;
      case 'city':
      $string_register_city = $content;
      break;
      case 'province':
      $string_register_province = $content;
      break;
      case 'zipcode':
      $string_register_zipcode = $content;
      break;
      case 'cancel':
      $string_register_cancel = $content;
      break;
      case 'signup':
      $string_register_signup = $content;
      break;
      case 'please_select':
      $string_register_please_select = $content;
      break;
    }
  }
} else {
  //    echo "0 results";
  header('message.php?msg=unknow_request');
}
?>
