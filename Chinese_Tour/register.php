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

    $check = check_available($username,$email);
    if($check){
        // prepare SQL statement
        $sql = "INSERT INTO member (username, password, first_name, middle_name, last_name, address, phone, email, date_of_birth, occupation, salary) VALUES ('$username', '$password', '$firstName', '$middleName', '$lastName', '$address', '$phone', '$email', '$dob', '$occupation', '$salary')";

        // execute
        $result = mysqli_query( $GLOBALS['conn'] , $sql );
        if ($result){
            $last_id = $GLOBALS['conn']->insert_id;
        
            // confirmation url
            $url = "http://localhost/tourjean/active_account.php?id=" . $last_id . "&u=" . md5($username);
        
            // ***** Sent confirmation email   
            $ToEmail = $email;
            $EmailSubject = 'Email confirmation';
            $MESSAGE_BODY = "Dear, ".$username."<br>";
            $MESSAGE_BODY .= "Click here to confirm your email:<br>";
            $MESSAGE_BODY .= $url;
            
            echo $MESSAGE_BODY;
            mail($ToEmail, $EmailSubject, $MESSAGE_BODY);
        
            // please confirmation by email
        
        }else{
            echo "error: " . mysqli_error( $GLOBALS['conn'] );
        }
    }
}

function check_available($username,$email){
    
    $msg = "";
    
    $query = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $count = mysqli_num_rows($result);
    echo $count;
    if( $count >= 1 ){
        $msg .= "Username is already used.";
    }
    
    $query = "SELECT * FROM member WHERE email = '$email'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $count = mysqli_num_rows($result);
    if( $count >= 1 ){
        $msg .= "E-mail is already used.";
    }
    
    if($msg != ""){
        echo "<script type='text/javascript'>alert('$msg');</script>";
        return false;
    }
    
    return true;
}

?>
