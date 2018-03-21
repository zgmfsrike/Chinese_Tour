<?php
include 'db_config.php';
if(isset($_SESSION['book_tour_expired'])){
  if($now>$_SESSION['book_tour_expired']){
    unset($_SESSION['book_tour_expired']);

    $member_id = $_SESSION['login_id'];
    $sql_delete_null = "DELETE FROM tour_round_member  WHERE id = $member_id AND last_name =''
    AND dob ='0000-00-00' AND country_code =0 AND phone =0 AND email='' AND address='' AND city=''
    AND province ='' AND zipcode = 0 AND passport_id =0 AND reservation_age =0 AND avoid_food =''";
    $result_delete = mysqli_query($conn,$sql_delete_null);
    if($result_delete){
      header('location: message.php?msg=session_book_expired');
    }else {
      header('location: login.php?');
    }
  }
}

?>
