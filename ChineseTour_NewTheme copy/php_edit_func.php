<?php
ob_start();
session_cache_expire(30);
error_reporting (E_ALL ^ E_NOTICE);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
//----------------------------Wait for session---------------------------------------------//
session_start();
//----------------------------Show value-----------------------------------------------//


if(isset($_SESSION['login_id'])){
  $id = $_SESSION['login_id'];
  //---------------------- DB Value----------------------
$sql_db =  "SELECT * FROM `member` WHERE id=$id" ;
$result2 = mysqli_query($conn,$sql_db);
$data = mysqli_fetch_array($result2);
$firstname_db = $data['first_name'];
$middlename_db = $data['middle_name'];
$lastname_db = $data['last_name'];
$phone_db = $data['phone'];
$email_db = $data['email'];
$salary_db = $data['salary'];
$occupation_db = $data['occupation'];
$date_of_birth = $data['dob'];
$address_db = $data['address'];
$city_db = $data['city'];
$province_db = $data['province'];
$zipcode_db = $data['zipcode'];

//----------------------------------POST Value------------------------

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$surname = $_POST['lastname'];
$occupation =  $_POST['occupation'];
$salary = $_POST['salary'];
$raw_dob = $_POST['dob'];
$phone = $_POST['phone'];

$cut_comma = explode(",",$raw_dob);
// echo $cut_comma[0]." : ".$cut_comma[1];
$cut_comma_str = $cut_comma[0].$cut_comma[1];
$cut_space = explode(" ",$cut_comma_str);
switch ($cut_space[1]) {
  case 'January':
    $cut_space[1] = 1;
    break;
  case 'February':
    $cut_space[1] = 2;
    break;
  case 'March':
    $cut_space[1] = 3;
    # code...
    break;
    case 'April':
      $cut_space[1] = 4;
      break;
    case 'May':
      $cut_space[1] = 5;
      break;
    case 'June':
      $cut_space[1] = 6;
      # code...
      break;
      case 'July':
        $cut_space[1] = 7;
        break;
      case 'August':
        $cut_space[1] = 8;
        break;
      case 'September':
        $cut_space[1] = 9;
        # code...
        break;
        case 'October':
          $cut_space[1] = 10;
          break;
        case 'November':
          $cut_space[1] = 11;
          break;
        case 'December':
          $cut_space[1] = 12;
          # code...
          break;
  default:
    # code...
    break;
}
$dob = $cut_space[2]."-".$cut_space[1]."-".$cut_space[0];



$address = $_POST['address'];
$city = $_POST['city'];
$province = $_POST['province'];
$zipcode = $_POST['zipcode'];
//-----------------------------Edit fucntion----------------------------------------------------//
if($_POST['save']){


    $sql= "UPDATE `member` SET `first_name`='$firstname',`middle_name`='$middlename',`last_name`='$surname',
                                `phone`='$phone',`occupation`='$occupation',`salary`='$salary',`dob`='$dob',`address`='$address',`city`='$city',`province`='$province',`zipcode`='$zipcode'

                                 WHERE id = $id ";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    if($result){
      header("location: message.php?msg=edit");
      ob_end_flush();
    }



}
}



?>
