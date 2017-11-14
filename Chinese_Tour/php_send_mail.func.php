<?php
session_start();
ob_start();
error_reporting (E_ALL ^ E_NOTICE);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "db_config.php";
//-----------------------------Variable----------------------------------------------------//

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  $subject = $_POST['subject'];
  $description = $_POST['description'];

//-----------------------------Edit fucntion----------------------------------------------------//

if($_POST['send'] && $subject !== "" && $description !==""){


       //-----------------------------Send change mail fucntion----------------------------------------------------//
         require 'vendor/autoload.php';

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
             // $body_array = array("'<p><strong>You email address is changed</strong><br></p>'","'<p><strong>Please confirm your E-mail</strong><br>
             //     Link : '.$url.'</p>'");
               $mail->setFrom('info@chtour.com', 'Chinese Tour');
               $mail->isHTML(true);
               $mail->Subject = $subject;
               $mail->addAddress($email);
               $body = $description;
               $mail->Body    = $body;
               $mail->AltBody = strip_tags($body);
               $mail->send();
               $mail->ClearAddresses();







             // echo 'Message has been sent';
         } catch (Exception $e) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }
         header("location: messege.php?msg=email_send_succ");
         ob_end_flush();








}
}



 ?>
