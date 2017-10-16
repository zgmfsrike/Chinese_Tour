<?php
include "db_config.php";
include "module/hashing.php";

// check connection
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}
// If submit button clicked from form
if(isset($_POST['submit'])){
   register();
}
// ** If user is already login, redirect to welcome.html
// if(isset()){
//     header('welcome.html');
// }

// register method
function register(){
    // ***** (0) get global params
    $username = $_POST["username"];
    $password = hashPassword(''.$_POST["password"].'');
    $firstName = $_POST["firstname"];
    $middleName = $_POST["middlename"];
    $lastName = $_POST["lastname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $dob = date('Y-m-d',strtotime($_POST["yyyy"] . "-" . $_POST["mm"] . "-" . $_POST["dd"]));
    $salary = $_POST["salary"];
    $occupation = $_POST["occupation"];

    // prepare spq statement
    $sql = "INSERT INTO member (username, password, first_name, middle_name, last_name, address, phone, email, date_of_birth, occupation, salary) VALUES ('$username', '$password', '$firstName', '$middleName', '$lastName', '$address', '$phone', $occupation, $salary, '$email', '$dob')";
    
    echo $sql;

    // execute
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    if ($result){
        echo "pass";
        
        $last_id = $GLOBALS['conn']->insert_id;
        
        // confirmation url
        $url = "http://localhost/tourjean/active_account.php?id=" . $last_id . "&u=" . md5($username);
        
        // ***** Sent confirmation email
        // mail($emailid, "Register Confirmation", $url);
        
        // please confirmation by email
        
    }else{
        echo "error: " . mysqli_error( $GLOBALS['conn'] );
    }

}

?>
