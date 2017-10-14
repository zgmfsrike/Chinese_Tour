<?php
include "db_config.php";
include "module/hashing.php";

    // check connection
    if(! $conn ) {
      die('Could not connect: ' . mysql_error());
    }

    /*
        1. save register infomation to temp db with : hash, expire date
        2. send email con firmation with parameter : hash
        3. recieve hash, check on temp db
        4. add member to member database
    */

// If submit button clicked from form
//if(isset($_POST['submit'])){
   register();
//}

// If hash is defined in url
//if(isset($_GET['h']) && strlen($_GET['h']) == 32){
//    registerConfirmation();
//}

// ** If user is already login, redirect to welcome.html
// if(isset($_POST[])){
//     header('welcome.html');
// }

function register(){
    
    echo $servername;
    echo "0";

    // ***** (0) get global params
    $username = $_POST["username"];
    $password = hashPassword($_POST["password"]);
    $firstName = $_POST["firstname"];
    $middleName = $_POST["middlename"];
    $lastName = $_POST["lastname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $occupation = $_POST["occupation"];
    $salary = $_POST["salary"];
    $email = $_POST["email"];
    $dob = date('Y-m-d',strtotime($_POST["yyyy"] . "-" . $_POST["mm"] . "-" . $_POST["dd"]));
    
    echo "1";

    $sql = "INSERT INTO member (username, password, first_name, middle_name, last_name, address, phone, occupation, salary, email, dob) VALUES ('$username', '$password', '$firstName', '$middleName', '$lastName', '$address', '$phone', $occupation, $salary, '$email', '$dob')";
    echo $sql;

    
    
    // execute
//    $result = mysqli_query( $conn , $sql );
    $result = $conn->query($sql);
    if ($result){
        echo "pass";
    }else{
        echo "error: " . mysqli_error($conn);
    }

    // ***** Build url + query
    $url = "http://localhost/tourjean/reg_confirmation.php?u=" . md5($username);

    // ***** Sent confirmation email
    // mail($emailid, "Register Confirmation", $url);

}

function registerConfirmation(){

    $hash = $_GET['h'];
    $sql = "SELECT * FROM tempMember WHERE hash = '$hash'";
    $result = mysqli_query( $conn, $sql );

    if(! $result ) {
        // no data
    }

   if($count == 1){
       $sql = "INSERT INTO member (username, password, firstName, middleName, lastName, address, phone, emailid, dob) VALUES ($username[0], $password[0], $firstName[0], $middleName[0], $lastName[0], $address[0], $phone[0], $emailid[0], $dob[0])";

       $result = mysqli_query( $conn , $sql );

       // alert success

    }else{
        // This link has no longer valid
        header("location: index.php");
    }

}

?>
