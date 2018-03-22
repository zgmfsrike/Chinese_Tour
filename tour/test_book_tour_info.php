<?php




if(isset($_POST['submit'])){
  //check amount of people in group
  if(isset($_POST['amount_people'])){
    $amount_people = $_POST['amount_people'];

    for($i = 1 ; $i<=$amount_people;$i++){
      $_SESSION['tour']['p'.$i]['first_name'] = $_POST['firstname'.$i];
      $_SESSION['tour']['p'.$i]['middlename'] = $_POST['middlename'.$i];
      $_SESSION['tour']['p'.$i]['last_name'] = $_POST['lastname'.$i];
      $_SESSION['tour']['p'.$i]['dob'] = $_POST['dob'.$i];
      $_SESSION['tour']['p'.$i]['passport'] = $_POST['passport'.$i];
      $_SESSION['tour']['p'.$i]['email'] = $_POST['email'.$i];
      $_SESSION['tour']['p'.$i]['countrycode'] = $_POST['countrycode'.$i];
      $_SESSION['tour']['p'.$i]['reservation_age'] = $_POST['reservation_age'.$i];
      $_SESSION['tour']['p'.$i]['address'] = $_POST['address'.$i];
      $_SESSION['tour']['p'.$i]['city'] = $_POST['city'.$i];
      $_SESSION['tour']['p'.$i]['province'] = $_POST['province'.$i];
      $_SESSION['tour']['p'.$i]['zipcode'] = $_POST['zipcode'.$i];
      $_SESSION['tour']['p'.$i]['avoidfood'] = $_POST['avoidfood'.$i];


    }



  }


}


?>
