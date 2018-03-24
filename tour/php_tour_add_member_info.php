<?php
include 'module/session.php';
ob_start();
include 'db_config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
  if(isset($_SESSION['login_id']) and isset($_SESSION['amount_people']) and isset($_SESSION['tour_round_id'])){
    $member_id = $_SESSION['login_id'];
    $amount_people = $_SESSION['amount_people'];
    $tour_round_id =   $_SESSION['tour_round_id'];
    for($i = 1 ; $i<=$amount_people;$i++){
      if(isset($_SESSION['tour']['p'.$i]['first_name'])  and isset($_SESSION['tour']['p'.$i]['middlename']) and isset($_SESSION['tour']['p'.$i]['last_name']) and
      isset($_SESSION['tour']['p'.$i]['dob']) and isset( $_SESSION['tour']['p'.$i]['passport']) and isset($_SESSION['tour']['p'.$i]['email']) and
      isset($_SESSION['tour']['p'.$i]['countrycode']) and isset($_SESSION['tour']['p'.$i]['reservation_age']) and isset($_SESSION['tour']['p'.$i]['address']) and
      isset($_SESSION['tour']['p'.$i]['city']) and isset($_SESSION['tour']['p'.$i]['province']) and isset($_SESSION['tour']['p'.$i]['phone']) and
      isset($_SESSION['tour']['p'.$i]['zipcode']) and isset($_SESSION['tour']['p'.$i]['avoidfood'])){

        $first_name =  $_SESSION['tour']['p'.$i]['first_name'];
        $middlename = $_SESSION['tour']['p'.$i]['middlename'];
        $last_name = $_SESSION['tour']['p'.$i]['last_name'];
        $dob = $_SESSION['tour']['p'.$i]['dob'];
        $passport = $_SESSION['tour']['p'.$i]['passport'];
        $email = $_SESSION['tour']['p'.$i]['email'];
        $countrycode =$_SESSION['tour']['p'.$i]['countrycode'];
        $phone = $_SESSION['tour']['p'.$i]['phone'];
        $reservation_age = $_SESSION['tour']['p'.$i]['reservation_age'];
        $address = $_SESSION['tour']['p'.$i]['address'];
        $city = $_SESSION['tour']['p'.$i]['city'];
        $province = $_SESSION['tour']['p'.$i]['province'];
        $zipcode = $_SESSION['tour']['p'.$i]['zipcode'];
        $avoidfood = $_SESSION['tour']['p'.$i]['avoidfood'] ;






        $sql = "INSERT INTO `tour_round_member`(`id`, `tour_round_id`, `first_name`, `middle_name`, `last_name`, `dob`,
          `country_code`, `phone`, `email`, `address`, `city`, `province`, `zipcode`, `passport_id`, `reservation_age`, `avoid_food`)
          VALUES ('$member_id','$tour_round_id','$first_name','$middlename','$last_name','$dob','$countrycode','$phone','$email','$address','$city',
            '$province','$zipcode','$passport','$reservation_age','$avoidfood')";
            $result = mysqli_query($conn,$sql);
            if($result){

              unset($_SESSION['tour']['p'.$i]['first_name']);
              unset($_SESSION['tour']['p'.$i]['middlename']);
              unset($_SESSION['tour']['p'.$i]['last_name']);
              unset($_SESSION['tour']['p'.$i]['dob']);
              unset($_SESSION['tour']['p'.$i]['passport']);
              unset($_SESSION['tour']['p'.$i]['email']);
              unset($_SESSION['tour']['p'.$i]['countrycode']);
              unset($_SESSION['tour']['p'.$i]['phone']);
              unset($_SESSION['tour']['p'.$i]['reservation_age']);
              unset($_SESSION['tour']['p'.$i]['address']);
              unset($_SESSION['tour']['p'.$i]['city']);
              unset($_SESSION['tour']['p'.$i]['province']);
              unset($_SESSION['tour']['p'.$i]['zipcode']);
              unset($_SESSION['tour']['p'.$i]['avoidfood']);


              $subject = "Book tour";
              $description = "Book tour information";

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
              header("location: message.php?msg=book_tour_succ");
              ob_end_flush();







            }







          }

        }
          unset($_SESSION['amount_people']);

      }


    }


    ?>
