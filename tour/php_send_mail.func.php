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
  // $description = nl2br($_POST['description']);
  $description =wordwrap($_POST['description'], 20, "<br />", true);

//-----------------------------Edit fucntion----------------------------------------------------//

if($_POST['send'] && $subject !== "" && $description !==""){


       //-----------------------------Send change mail fucntion----------------------------------------------------//
         require 'vendor/autoload.php';

           $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
         try {
           $mail->SMTPOptions = array(
                   'ssl' => array(
                       'verify_peer' => false,
                       'verify_peer_name' => false,
                       'allow_self_signed' => true
                   )
               );
             //Server settings
             $mail->SMTPDebug = 0;                                 // Enable verbose debug output
             $mail->isSMTP();                                      // Set mailer to use SMTP
             $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
             $mail->SMTPAuth = true;
                            // Enable SMTP authentication
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

               $mail->AddEmbeddedImage('component/header.png', 'header');
               $mail->AddEmbeddedImage('component/footer.png', 'footer');
               $body = "<center><p><img src='cid:header' /></p></center>";
               $body .="<center>".$description."</center>";
               $body .="<center><p><img src='cid:footer' /></p></center>";
               $mail->Body    = $body;
               $mail->AltBody = strip_tags($body);
               $mail->send();
               $mail->ClearAddresses();







             // echo 'Message has been sent';
         } catch (Exception $e) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }
         header("location: message.php?msg=email_send_succ");
         ob_end_flush();








}
}



 ?>
