 <?php
include 'module/session.php';
include 'db_config.php';

$time = time();
$_SESSION['book_tour_expired'] = $time+(60*50);

if(isset($_POST['book'])){
  if(isset($_SESSION['login_id'])){

    if(isset($_POST['tour_round']) and isset($_POST['result_price'])){
      $tour_round_id = $_POST['tour_round'];
      $_SESSION['tour_round'] =$tour_round_id;
      $_SESSION['result_price'] = $_POST['result_price'];
      $_SESSION['departure_location'] = $_POST['departure'];
      $_SESSION['dropoff_location'] = $_POST['dropoff'];
      $_SESSION['seat'] = $_POST['amount_people'];
      $_SESSION['book_info'] = "exist";
      // echo "ผ่าน";
      // if(isset($_POST['tour_type'])){
      //   $_SESSION['tour_type'] = $_POST['tour_type'];
      // }

    }




    $amount_people = $_SESSION['seat'];
    $member_id = $_SESSION['login_id'];
    $time = time();
    $hash_text= $time.$member_id;
    $reference_code = hash("crc32", $hash_text);
    $session_ref = $_SESSION['ref_code'];


    $sql_delete_null = "DELETE FROM tour_round_member  WHERE reference_code = '$session_ref' AND last_name =''
    AND dob ='0000-00-00' AND country_code =0 AND phone =0 AND email='' AND address='' AND city=''
    AND province ='' AND zipcode = 0 AND passport_id =0 AND reservation_age =0 AND avoid_food ='' ";
    $result_delete = mysqli_query($conn,$sql_delete_null);
    $_SESSION['ref_code'] = $reference_code;
    // $tour = "tour_".$_COOKIE['lang'];

    //add reserve group to tour booking history
    //
    // $sql_reserve_tour_book = "INSERT INTO tour_booking_history(reference_code,member_id) values('$reference_code','$tour_round_id')";
    // $result_tour_book = mysqli_query($conn, $sql_reserve_tour_book);


    //add reserve member according to amount of member when booking
    for($i =1 ;$i<=$amount_people;$i++){
      $reserve_member = "reserve".$i;
      $sql_add_reserve ="INSERT INTO  tour_round_member(first_name,reference_code) values('$reserve_member','$reference_code')";
      $result_reserve = mysqli_query($conn,$sql_add_reserve);

    }
    $sql_add_book_session = "INSERT INTO `booking_session`(`time`, `reference_code`) VALUES (NOW(),'$reference_code')";
    $result_add_book_session = mysqli_query($conn, $sql_add_book_session);
    header("location: tripmember.php");
  }


}


 ?>
