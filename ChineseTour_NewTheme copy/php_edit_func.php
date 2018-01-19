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
$dob = date('Y-m-d',strtotime($_POST['dob']));
$phone = $_POST['phone'];


$address = $_POST['address'];
$city = $_POST['city'];
$province = $_POST['province'];
$zipcode = $_POST['zipcode'];
$country_code = $_POST['countrycode'];
//-----------------------------Edit fucntion----------------------------------------------------//
if($_POST['save']){

    $sql= "UPDATE `member` SET `first_name`='$firstname',`middle_name`='$middlename',`last_name`='$surname',
                                `phone`='$phone',`occupation`='$occupation',`salary`='$salary',`dob`='$dob',`address`='$address',`city`='$city',`province`='$province',`zipcode`='$zipcode',`country_code`='$country_code'

                                 WHERE id = $id ";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    if($result){
      header("location: message.php?msg=edit");
      ob_end_flush();
    }



}
}
