<?php
include 'module/session.php';
requireLogin();

ob_start();
session_cache_expire(30);
error_reporting (E_ALL ^ E_NOTICE);
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "db_config.php";
//-----------------------------Variable----------------------------------------------------//

if(isset($_SESSION['login_id'])){
$id = $_SESSION['login_id'];
$sql_db = "SELECT * FROM `member` WHERE id=$id";
$result = mysqli_query($GLOBALS['conn'],$sql_db);
$data = mysqli_fetch_array($result);
$oldmail = $data['email'];

$email = $_POST['email'];
$confirm_email = $_POST['confirm_email'];
//-----------------------------Edit fucntion----------------------------------------------------//

if($_POST['save']){

  $query = "SELECT * FROM member WHERE email = '$email'";
  $result = mysqli_query($GLOBALS['conn'], $query);
  $count = mysqli_num_rows($result);
  if( $count == 0 ){

      if(strcmp($email,$confirm_email)==0 && $oldmail != $email){
       //-----------------------------Send change mail fucntion----------------------------------------------------//
         require 'vendor/autoload.php';

           $url = "http://localhost/Chinese_Tour/Chinese_Tour/active_change_mail.php?id=" . $id . "&u=" . md5($username)."&m=" .$email;

           $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
         try {
             //Server settings
             $mail->SMTPDebug = 0;                                 // Enable verbose debug output
             $mail->isSMTP();                                      // Set mailer to use SMTP
             $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
             $mail->SMTPAuth = true;                               // Enable SMTP authentication
             $mail->Username = "zgmfsrike@gmail.com";                 // SMTP username
             $mail->Password = 'amenoera7744';                           // SMTP password
             $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
             $mail->Port = 587;
                                     // TCP port to connect to

             //Recipients
             $mail_array = array($oldmail,$email);
             // $body_array = array("'<p><strong>You email address is changed</strong><br></p>'","'<p><strong>Please confirm your E-mail</strong><br>
             //     Link : '.$url.'</p>'");
               $mail->setFrom('info@chtour.com', 'Chinese Tour');
               $mail->isHTML(true);
               $mail->Subject = 'Chinese Tour: Email changed';
             for ($i = 0; $i< count($mail_array);$i++) {
                   if($i==0){
                     $mail->addAddress($mail_array[$i],$firstname);
                     $body = '<p><strong>You email address is changed</strong><br></p>';
                     $mail->Body    = $body;
                     $mail->AltBody = strip_tags($body);
                     $mail->send();
                     $mail->ClearAddresses();
                   }else{
                     $mail->addAddress($mail_array[$i],$firstname);
                     $body = '<p><strong>You email address is changed</strong><br></p>';
                     $mail->Body    = '<p><strong>Please confirm your E-mail</strong><br>
                         Link : '.$url.'</p>';
                     $mail->AltBody = strip_tags($body);
                     $mail->send();
                     $mail->ClearAddresses();
                   }


                   //
                   // $body = '<p><strong>Please confirm your E-mail</strong><br>
                   //     Link : '.$url.'</p>';
                   // $mail->isHTML(true);
                   //  $mail->Subject = 'Chinese Tour: Email confirmation';
                   // $mail->Body    = $body;
                   // $mail->AltBody = strip_tags($body);
                   // $mail->send();

               }





             // echo 'Message has been sent';
         } catch (Exception $e) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }
         header("location: messege.php?msg=email_change");
         ob_end_flush();


   }else if($email == $oldmail){
      echo '<script type="text/javascript">alert("Sorry, you already use this email.");</script>';
   }else {
     echo '<script type="text/javascript">alert("Sorry, your email is not match please try again.");</script>';
   }

 }else{
   echo '<script type="text/javascript">alert("E-mail is already used.");</script>';
 }



}
}



 ?>
