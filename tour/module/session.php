<?php
session_start();
$now = time();
include 'db_config.php';
if(isset($_SESSION['expire'])){
  if ($now > $_SESSION['expire']) {
    session_destroy();
    header('location: message.php?msg=session_expired');
  }else{
    $_SESSION['expire'] = $now + (60*30);
  }
}

//
if(isset($_SESSION['book_tour_expired'])){
  if($now>$_SESSION['book_tour_expired']){
    unset($_SESSION['book_tour_expired']);

    $member_id = $_SESSION['login_id'];
    $reference_code = $_SESSION['ref_code'];
    // $amount_people = $_SESSION['seat'];
    // $tour_round_id = $_SESSION['tour_round'];


    //
    // $sql_count = "SELECT * FROM tour_round_member  WHERE  last_name =''
    // AND dob ='0000-00-00' AND country_code =0 AND phone =0 AND email='' AND address='' AND city=''
    // AND province ='' AND zipcode = 0 AND passport_id =0 AND reservation_age =0 AND avoid_food =''
    // AND reference_code = '$reference_code'";
    // $result_count = mysqli_query($conn,$sql_count);
    // if($result_count){
      // $tour = "tour_".$_COOKIE['lang'];
      //
      // $count = mysqli_num_rows($result_count);
      // $sql = "SELECT  t.tour_id,t.max_customer, t.available_seat
      // FROM $tour t INNER JOIN tour_round tr on t.tour_id = tr.tour_id
      // WHERE tr.tour_round_id = '$tour_round_id'";
      // $result = mysqli_query($conn,$sql);
      // // if($result){
      //   $data = mysqli_fetch_array($result);
      //   $available_seat = $data['available_seat'];
      //   $tour_id = $data['tour_id'];
      //   $current_seat = $available_seat+$count;
        //
        // $sql_update="UPDATE $tour SET `available_seat`='$current_seat' WHERE tour_id = '$tour_id'";
        // $result_update = mysqli_query($conn,$sql_update);
        // if($result_update){
          $sql_delete_null = "DELETE FROM tour_round_member  WHERE  last_name =''
          -- AND dob ='0000-00-00' AND country_code =0 AND phone =0 AND email='' AND address='' AND city=''
          -- AND province ='' AND zipcode = 0 AND passport_id =0 AND reservation_age =0 AND avoid_food =''
          AND reference_code = '$reference_code'";
          $result_delete = mysqli_query($conn,$sql_delete_null);
          if($result_delete){
            $sql_delete_book_session = "DELETE FROM `booking_session` WHERE reference_code ='$reference_code'";
            $result_del_session = mysqli_query($conn, $sql_delete_book_session);
            header('location: message.php?msg=session_book_expired');
          }else {
            header('location: login.php');
          }

        // }

      // }

    // }







  }
}



include 'module/authentication.php';
?>
