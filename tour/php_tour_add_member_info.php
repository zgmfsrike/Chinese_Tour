<?php
include 'module/session.php';
ob_start();
include 'db_config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
  if(isset($_SESSION['login_id']) and isset($_SESSION['seat']) and isset($_SESSION['tour_round']) and
  isset($_SESSION['tour_type']) and isset($_SESSION['ref_code'])){
    $tour_member_list="";
    $member_id = $_SESSION['login_id'];
    $amount_people = $_SESSION['seat'];
    $tour_round_id =  $_SESSION['tour_round'];
    $tour_type_id =  $_SESSION['tour_type'];

    $reference_code = $_SESSION['ref_code'];
    $trigger = false;
    $tour = "tour_".$_COOKIE['lang'];
    $sql ="SELECT *
    FROM tour_round tr INNER JOIN $tour t on tr.tour_id = t.tour_id
    INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
    INNER JOIN tour_type tt ON tt.tour_type_id = ttt.tour_type_id
    INNER JOIN tour_vehicle_type tvt on t.tour_id = tvt.tour_id
    INNER JOIN vehicle_type vt on tvt.vehicle_type_id = vt.vehicle_type_id
    INNER JOIN tour_accommodation ta on t.tour_id = ta.tour_id
    INNER JOIN accommodation a on ta.accommodation_id = a.accommodation_id
    WHERE tr.tour_round_id = $tour_round_id and ttt.tour_type_id = $tour_type_id";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($result);


    for($i = 1 ; $i<=$amount_people;$i++){

      $tour_member_list.=" <b>No.".$i."</b><br />
      <b>Name : </b>".$_SESSION['tour']['p'.$i]['first_name']."\t\t
      , <b>Email : </b>".$_SESSION['tour']['p'.$i]['email']."<br />";

      if(isset($_SESSION['tour']['p'.$i]['first_name'])  and isset($_SESSION['tour']['p'.$i]['middlename']) and isset($_SESSION['tour']['p'.$i]['last_name']) and
      isset($_SESSION['tour']['p'.$i]['dob']) and isset( $_SESSION['tour']['p'.$i]['passport']) and isset($_SESSION['tour']['p'.$i]['email']) and
      isset($_SESSION['tour']['p'.$i]['countrycode']) and isset($_SESSION['tour']['p'.$i]['reservation_age']) and isset($_SESSION['tour']['p'.$i]['address']) and
      isset($_SESSION['tour']['p'.$i]['city']) and isset($_SESSION['tour']['p'.$i]['province']) and isset($_SESSION['tour']['p'.$i]['phone']) and
      isset($_SESSION['tour']['p'.$i]['zipcode']) and isset($_SESSION['tour']['p'.$i]['avoidfood']) and isset($_SESSION['result_price']) and
      isset($_SESSION['departure_location']) and isset($_SESSION['dropoff_location'])){

        $reserve_member = "reserve".$i;
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
        $result_price = $_SESSION['result_price'];
        $departure_location = $_SESSION['departure_location'];
        $dropoff_location = $_SESSION['dropoff_location'];

        // Insert booking status
        $current_date = date("Y-m-d");
        $expiry_date = '';
        $sql = "INSERT INTO `tour_booking_history` (`reference_code`, `member_id`, `booking_date`, `expiry_date`) ";
        $sql .= "VALUES ('$reference_code', '$member_id', '$current_date', '$expiry_date');";
        $result = mysqli_query($conn,$sql);



        // $sql = "INSERT INTO `tour_round_member`(`id`, `tour_round_id`, `first_name`, `middle_name`, `last_name`, `dob`,
        //   `country_code`, `phone`, `email`, `address`, `city`, `province`, `zipcode`, `passport_id`, `reservation_age`, `avoid_food`)
        //   VALUES ('$member_id','$tour_round_id','$first_name','$middlename','$last_name','$dob','$countrycode','$phone','$email','$address','$city',
        //     '$province','$zipcode','$passport','$reservation_age','$avoidfood')";

        $sql="UPDATE `tour_round_member` SET `first_name`='$first_name',`middle_name`='$middlename',`last_name`='$last_name',`dob`='$dob',
        `country_code`='$countrycode',`phone`= '$phone',`email`=  '$email',`address`='$address',`city`='$city',`province`='$province',`zipcode`='$zipcode',
        `passport_id`='$passport',`reservation_age`='$reservation_age',`avoid_food`='$avoidfood',`add_on_price`='$result_price',`departure_location`='$departure_location',
        `dropoff_location` = '$dropoff_location'
        WHERE id = '$member_id' AND tour_round_id = '$tour_round_id' AND reference_code = '$reference_code' AND first_name = '$reserve_member'";
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

        }

      }

    }
    $sql_show_user = "SELECT email FROM member WHERE id = $member_id";
    $result_show_user = mysqli_query($conn, $sql_show_user);
    if($result_show_user){
      $show = mysqli_fetch_array($result_show_user);
      $member_email = $show['email'];
      $subject = "Tour information";
      $start_date = $show['start_date_time'];
      $tour_member_field = "Reference Code : ".$reference_code."
      <legend>Tour Group Member</legend>".$tour_member_list."
      ";
      $tour_info = "<br /><legend>Tour Information</legend>
      Tour Type :".$data['tour_type']."<br>
      Vehicle : ".$data['vehicle_type']."<br>
      Accommodation : ".$data['accommodation_level']."<br>
      Departure Location :".$departure_location." <br>
      Drop off Location : ".  $dropoff_location." <br>
      Start Date : ".$start_date."<br>
      End Date : ".$data['end_date_time']."<br>"
      ;

      $description = $tour_member_field.$tour_info;
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
        $mail->addAddress($member_email);
        $mail->AddEmbeddedImage('component/header.png', 'header');
        $mail->AddEmbeddedImage('component/footer.png', 'footer');
        $body = "<center><p><img src='cid:header' /></p></center>";
        $body .="<center>".$description."</center>";
        $body .="<center><p><img src='cid:footer' /></p></center>";
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);
        $mail->send();
        $mail->ClearAddresses();

        $trigger = true;

        // echo 'Message has been sent';
      } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      }
      // $expiry_date = date('Y-m-d',strtotime($start_date.' - 3 days'));
      // $sql_add_book_status = "INSERT INTO `book_status`(`reference_code`, `member_id`, `status`, `expiry_date`)
      // VALUES ('$reference_code',$member_id,0,'$expiry_date')";
      // $result_status = mysqli_query($conn, $sql_add_book_status);
      header("location: message.php?msg=book_tour_succ");
      ob_end_flush();
    }

    if($trigger){
      unset($_SESSION['tour_type']);
      unset($_SESSION['tour_round_id']);
      unset($_SESSION['amount_people']);
      unset($_SESSION['ref_code']);
      unset($_SESSION['result_price']);
      unset($_SESSION['departure_location']);
      unset($_SESSION['dropoff_location']);
    }
  }
}


?>
