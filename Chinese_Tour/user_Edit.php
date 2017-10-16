<?php
//----------------------------Wait for session---------------------------------------------//
session_start();


//-----------------------------Variable----------------------------------------------------//
include "db_config.php";
include "module/hashing.php";
if(isset($_SESSION['login_id'])){
$id = $_SESSION['login_id'];

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$surname = $_POST['surname'];
$occupation =  $_POST['Occupation'];
$salary = $_POST['salary'];
$date = $_POST['dd'];
$month = $_POST['mm'];
$year = $_POST['yyyy'];
$time =  $year . "-" . $month . "-" . $date ;
$phone = $_POST['contactnum'];
$address = $_POST['address'];
$email = $_POST['emailid'];

//-----------------------------Edit fucntion----------------------------------------------------//
$sql= "UPDATE `member` SET `first_name`='$firstname', `middle_name`='$middlename',`last_name`='$surname',`address`='$address',
                            `phone`='$phone',`occupation`='$occupation',`salary`='$salary',`dob`='$time',`email`='$email' WHERE id = $id   ";


//-----------------------------Send change mail fucntion----------------------------------------------------//
// send e-mail to ...
$to=$email;

// Your subject
$subject="Your address email is changed";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.yourweb.com/confirmation.php?passkey=$confirm_code";

// send email
$sentmail = mail($to,$subject,$message);
}

// if not found
else {
echo "Not found your email in our database";
}

// if your email succesfully sent
if($sentmail){
echo "Your Confirmation link Has Been Sent To Your New Email Address.";
}
else {
echo "Cannot send Confirmation link to your e-mail address";
}




//-----------------------------Check edit fucntion----------------------------------------------------//
$query = mysqli_query($host,$sql);
if($query){
  echo "Record update successfully";
}

}else{
    $error = "Your Login Name or Password is invalid";
    header("location: login.html");
}


?>
