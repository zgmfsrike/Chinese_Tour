<?php
include 'db_config.php';
include 'module/session.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
ob_start();
$current_date = date('Y-m-d');
$flag = false;
// echo $time;

$sql_version = "SELECT MAX(version) version FROM feedback_question";
$result_version = mysqli_query($conn,$sql_version);
$data_v= mysqli_fetch_array($result_version);
$feedback_version = $data_v['version'];
$footer = "footer_en-cn.png";
// switch ($_COOKIE['lang']) {
//   case 'th':
//     $footer = "footer_th-en.png";
//     break;
//
//   default:
//
//     break;
// }




$sql ="SELECT tr.tour_round_id FROM tour_round tr where tr.end_date_time ='$current_date'";
$result_t= mysqli_query($conn, $sql);
if($result_t){

  $counter = 1;

  while ($data = mysqli_fetch_array($result_t)) {



    $tour_round_id = $data['tour_round_id'];
    echo "Tour round id :".$tour_round_id;


    $sql ="SELECT * FROM tour_round_member trm WHERE trm.tour_round_id='$tour_round_id'";
    $result= mysqli_query($conn, $sql);
    if($result){
      // sendmail
      while($show = mysqli_fetch_array($result)) {
        $ref_code = $show['reference_code'];
        $tour_round_member_id = $show['tour_round_member_id'];



        $subject = "FEEDBACK FORM";
        $description = "Send mail on date :".$current_date;

        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);
        try {
          $mail->SMTPOptions = array(
            'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
            )
          );

          //Server settings
          $mail->SMTPDebug = 0;
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


          // Passing `true` enables exceptions
          $email = $show['email'];
          // $feedback_id=md5(123);
          $time_sec = time();
          $feedback_id=$time_sec.$tour_round_member_id;
          $feedback_id =hash("crc32", $feedback_id);
          echo "<br />".$feedback_id."<br />";

          $expiry_date = date('Y-m-d',strtotime($current_date.' + 5 days'));
          echo $expiry_date;


          $sql_insert_feedback = "INSERT INTO feedback(`feedback_id`,`group_member_ref`,`tour_round_id`,`feedback_version`,`expiry_date`)
          VALUES('$feedback_id','$ref_code','$tour_round_id',$feedback_version,'$expiry_date')";
          $result_feedback = mysqli_query($conn, $sql_insert_feedback);

          $link = "http://localhost/Chinese_Tour/tour/feedback.php?feedback_id=".$feedback_id;

          // $mail_collect  .= "'$email'".",";
          // $mail_result = rtrim($mail_collect,", ");
          $mail->addAddress($email);
          $counter++;


          $mail->AddEmbeddedImage('component/header.png', 'header');
          $mail->AddEmbeddedImage('component/'.$footer, 'footer');
          $body = "<center><p><img src='cid:header' /></p></center>";
          $body .="<center>".$description."</center><br />";
          $body .="<center>From this link :".$link."</center><br />";
          $body .="<center><p><img src='cid:footer' /></p></center>";
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);
          $mail->send();
          $mail->ClearAllRecipients();
          $mail->ClearAttachments();
          $flag = true;









          // echo 'Message has been sent';
        } catch (Exception $e) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
      }

      //
      //            //-----------------------------Send change mail fucntion----------------------------------------------------//
      //
      //              //
      //
      //
      //
      //
      //   # code...
    }






  }
  if($flag){
    header("location: message.php?msg=feedback_send_succ");
  }else{
    header("location: message.php?msg=feedback_send_fail");
  }

  ob_end_flush();


}



?>
