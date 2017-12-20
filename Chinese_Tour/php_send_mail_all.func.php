<?php
session_start();
ob_start();
error_reporting (E_ALL ^ E_NOTICE);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "db_config.php";
//-----------------------------Variable----------------------------------------------------//

if($_GET['tour_round_id']){
  $tour_round_id = $_GET['tour_round_id'];
  $subject = $_POST['subject'];
  $description = $_POST['description'];

  $sql= "SELECT m.email
FROM member m INNER JOIN tour_round_member trm on m.id  = trm.id
WHERE trm.tour_round_id = $tour_round_id ";
  $result = mysqli_query( $GLOBALS['conn'] , $sql );
  // $show = mysqli_fetch_array($result);
  // $email = $show['email'];
  // $_SESSION['email'] = $email;

//-----------------------------Edit fucntion----------------------------------------------------//

if($_POST['send'] && $subject !== "" && $description !==""){


     require 'vendor/autoload.php';
      $mail = new PHPMailer(true);
      try {
          //Server settings
          $mail->SMTPDebug = 5;
          $mail->CharSet = "UTF-8";                               // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = "zgmfsrike@gmail.com";                 // SMTP username
          $mail->Password = 'amenoera7744';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;
          $mail->setFrom('info@chtour.com', 'Chinese Tour');
          $mail->isHTML(true);
          $mail->Subject = $subject;

                                  // TCP port to connect to

          //Recipients
          // $body_array = array("'<p><strong>You email address is changed</strong><br></p>'","'<p><strong>Please confirm your E-mail</strong><br>
          //     Link : '.$url.'</p>'");


            while($show = mysqli_fetch_array($result)) {                             // Passing `true` enables exceptions
               $email = $show['email'];
               // $mail_collect  .= "'$email'".",";
               // $mail_result = rtrim($mail_collect,", ");
               $mail->addAddress($email);
             }
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


       //-----------------------------Send change mail fucntion----------------------------------------------------//

         //
         header("location: message.php?msg=email_send_succ");
         ob_end_flush();








}
}



 ?>
