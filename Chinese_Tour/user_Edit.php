<?php
//----------------------------Wait for session---------------------------------------------//



//-----------------------------Variable----------------------------------------------------//
$host = mysqli_connect('localhost', 'root', '7744536','testlogin');
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$surname = $_POST['surname'];
$occupation =  $_POST['Occupation'];
$salary = $_POST['salary'];
$date = $_POST['dd'];
$month = $_POST['mm'];
$year = $_POST['yyyy'];
$time =  $year . "-" . $month . "-" . $date ;
$phone = $_POST['contactnum'];
$address = $_POST['address'];
$email = $_POST['emailid'];

//-----------------------------Edit fucntion----------------------------------------------------//
$sql= "UPDATE `member` SET `first_name`='$firstname', `middle_name`='$middlename',`last_name`='$surname',`address`='$address',
                            `phone`='$phone',`occupation`='$occupation',`salary`='$salary',`dob`='$time',`email`='$email' WHERE id = 3 ";


//-----------------------------Send change mail fucntion----------------------------------------------------//




//-----------------------------Check edit fucntion----------------------------------------------------//
$query = mysqli_query($host,$sql);
if($query){
  echo "Record update successfully";
}



?>
