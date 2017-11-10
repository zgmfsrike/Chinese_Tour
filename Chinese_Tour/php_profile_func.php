<?php
//-----------------------------Variable----------------------------------------------------//
error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";

if(isset($_SESSION['login_id'])){
$id = $_SESSION['login_id'];
$sql_db =  "SELECT * FROM `member` WHERE id=$id" ;
$result2 = mysqli_query($conn,$sql_db);
$data = mysqli_fetch_array($result2);

$username_db = $data['username'];
$firstname_db = $data['first_name'];
$middlename_db = $data['middle_name'];
$lastname_db = $data['last_name'];
$phone_db = $data['phone'];
$email_db = $data['email'];
$salary_db = $data['salary'];
$occupation_db = $data['occupation'];
$date_of_birth = $data['dob'];

}

?>
