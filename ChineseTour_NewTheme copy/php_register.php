<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ob_start();
include "db_config.php";
include "module/hashing.php";

// check connection
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}
// If submit button clicked from form
if(isset($_POST['submit'])){
      // header('index.php');
   register();
}
// ** If user is already login, redirect to welcome.php
// if(isset()){
//     header('welcome.php');
// }

// register method
function register(){

    // recieve data from form
    $username   = $_POST["username"];
    $password   = $_POST["password"];
    $cPassword  = $_POST["cpassword"];
    $firstName  = $_POST["firstname"];
    $middleName = $_POST["middlename"];
    $lastName   = $_POST["lastname"];
    $dob = date('Y-m-d',strtotime($_POST['dob']));
    $occupation = $_POST["occupation"];
    $salary     = $_POST["salary"];
    $email      = $_POST["email"];
    $phone      = $_POST["phone"];
    $address    = $_POST["address"];
    $city       = $_POST["city"];
    $province   = $_POST["province"];
    $zipcode    = $_POST["zipcode"];

    $countrycode = $_POST["countrycode"];

    // confirm password
    if($password == $cPassword){
        $password = hashPassword($password);
    }else{
        header("location: message.php?msg=reg_fail_confirm_password");
        return false;
    }
    // check username and password in used
    if(check_available($username,$email)){
        $hash = md5(rand(1000,5000));
        // prepare SQL statement
        $sql = "INSERT INTO member (username, password, first_name, middle_name, last_name, dob,country_code,phone, email, address, city, province, zipcode, occupation, salary, hash)
        VALUES ('$username', '$password', '$firstName', '$middleName', '$lastName', '$dob', '$countrycode','$phone', '$email', '$address', '$city', '$province', '$zipcode', '$occupation', '$salary', '$hash')";
        // execute
        $result = mysqli_query( $GLOBALS['conn'] , $sql );
        if ($result){
            $last_id = $GLOBALS['conn']->insert_id;

            // confirmation url
            $url = "http://localhost/Chinese_Tour/ChineseTour_NewTheme%20copy/active_account.php?id=" . $last_id . "&h=" . $hash;
            // please confirmation by email
            // Load composer's autoloader
            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = "zgmfsrike@gmail.com";                 // SMTP username
                $mail->Password = 'amenoera7744';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('info@chtour.com', 'Chinese Tour');
                $mail->addAddress($email);
                // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $body = '<p><strong>Please confirm your E-mail</strong><br>
                    Link : '.$url.'</p>';
                $mail->isHTML(true);                                  // Set email format to HTML
                 $mail->Subject = 'Chinese Tour: Email confirmation';
                $mail->Body    = $body;
                $mail->AltBody = strip_tags($body);

                $mail->send();
                header("location: message.php?msg=reg_succ");
                ob_end_flush();
                // echo 'Message has been sent';
            } catch (Exception $e) {
//                echo 'Message could not be sent.';
//                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }else{
//            echo "error: " . mysqli_error( $GLOBALS['conn'] );
//            header("login.php");
        }

    }
}

function check_available($username,$email){

    $msg = "";

    $query = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $count = mysqli_num_rows($result);
    if( $count >= 1 ){
//        $msg .= "Username is already used.";
        header("location: message.php?msg=reg_fail_username");
        return false;
    }

    $query = "SELECT * FROM member WHERE email = '$email'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $count = mysqli_num_rows($result);
    if( $count >= 1 ){
//        $msg .= "E-mail is already used.";
        header("location: message.php?msg=reg_fail_email");
        return false;
    }

    return true;
}

?>
