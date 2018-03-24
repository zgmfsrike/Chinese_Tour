<?php
include 'module/session.php';

if(isset($_POST['submit'])){
  //check amount of people in group
  if(isset($_GET['amount_people']) and isset($_GET['tour_round'])){
    $_SESSION['amount_people'] = $_GET['amount_people'];
    $amount_people = $_SESSION['amount_people'];
    $_SESSION['tour_round_id'] = $_GET['tour_round'];
    // echo "Tour round : ".$_SESSION['tour_round_id'];
    for($i = 1 ; $i<=$amount_people;$i++){
      if(isset($_POST['firstname'.$i]) and isset($_POST['middlename'.$i]) and isset($_POST['phone'.$i])
      and isset($_POST['lastname'.$i]) and isset($_POST['dob'.$i]) and isset( $_POST['passport'.$i]) and
      isset($_POST['email'.$i]) and isset($_POST['countrycode'.$i]) and isset($_POST['reservation_age'.$i]) and
      isset($_POST['address'.$i]) and isset($_POST['city'.$i]) and isset($_POST['province'.$i]) and
      isset($_POST['zipcode'.$i]) and isset($_POST['avoidfood'.$i])){

        $_SESSION['tour']['p'.$i]['first_name'] = $_POST['firstname'.$i];
        $_SESSION['tour']['p'.$i]['middlename'] = $_POST['middlename'.$i];
        $_SESSION['tour']['p'.$i]['last_name'] = $_POST['lastname'.$i];
        $_SESSION['tour']['p'.$i]['dob'] = date('Y-m-d',strtotime($_POST['dob'.$i]));
        $_SESSION['tour']['p'.$i]['passport'] = $_POST['passport'.$i];
        $_SESSION['tour']['p'.$i]['email'] = $_POST['email'.$i];
        $_SESSION['tour']['p'.$i]['countrycode'] = $_POST['countrycode'.$i];
        $_SESSION['tour']['p'.$i]['phone'] = $_POST['phone'.$i];
        $_SESSION['tour']['p'.$i]['reservation_age'] = $_POST['reservation_age'.$i];
        $_SESSION['tour']['p'.$i]['address'] = $_POST['address'.$i];
        $_SESSION['tour']['p'.$i]['city'] = $_POST['city'.$i];
        $_SESSION['tour']['p'.$i]['province'] = $_POST['province'.$i];
        $_SESSION['tour']['p'.$i]['zipcode'] = $_POST['zipcode'.$i];
        $_SESSION['tour']['p'.$i]['avoidfood'] = $_POST['avoidfood'.$i];

      }


    }

    header("location: tourconfirm.php");



  }


}


?>
