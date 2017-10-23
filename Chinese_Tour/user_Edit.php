<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//----------------------------Wait for session---------------------------------------------//
session_start();


//-----------------------------Variable----------------------------------------------------//
include "db_config.php";
// include "db_configNB.php";
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
require 'vendor/autoload.php';
// $url = "http://localhost/Chinese_Tour/Chinese_Tour/home.php"
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "zgmfsrike@gmail.com";                 // SMTP username
    $mail->Password = 'amenoera7744';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@chtour.com', 'Chinese Tour');
    $mail->addAddress($email);
    // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $body = '<p><strong>The user email is changed , Click the link below to go to homepage</strong><br>
        Link : '.$url.'</p>';
    $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'Chinese Tour: Email address is changed';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
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
