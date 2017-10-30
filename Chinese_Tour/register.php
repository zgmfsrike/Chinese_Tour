<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();

 include "db_config.php";
include "module/hashing.php";

if(isset($_SESSION['login_id'])){
    header("location: index.php");
}
// check connection
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}
// If submit button clicked from form
if(isset($_POST['submit'])){
    header('index.php');
   register();
}
// ** If user is already login, redirect to welcome.php
// if(isset()){
//     header('welcome.php');
// }

// register method
function register(){

    $username = $_POST["username"];
    $password = hashPassword(''.$_POST["password"].'');
    $firstName = $_POST["firstname"];
    $middleName = $_POST["middlename"];
    $lastName = $_POST["lastname"];
    $address = $_POST["address"] . " " . $_POST["city"] . " " . $_POST["province"] . " " . $_POST["zipcode"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
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
            $url = "http://localhost/Chinese_Tour/Chinese_Tour/active_account.php?id=" . $last_id . "&u=" . md5($username);
            // please confirmation by email
            // Load composer's autoloader
            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
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
                // echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }else{
            echo "error: " . mysqli_error( $GLOBALS['conn'] );
            header("login.php");
        }
    }
}

function check_available($username,$email){

    $msg = "";

    $query = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $count = mysqli_num_rows($result);
    if( $count >= 1 ){
        $msg .= "Username is already used.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        return false;
    }

    $query = "SELECT * FROM member WHERE email = '$email'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $count = mysqli_num_rows($result);
    if( $count >= 1 ){
        $msg .= "E-mail is already used.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        return false;
    }

    return true;
}

?>

<!------------------------------ HTML ------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>

    <!-- Site Properties -->
    <title>Chiang Mai Hongthai Business and Consultant Enterprise</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">




</head>
<body>
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-light navbar-expand-md bg-danger justify-content-center">
      <a href="index.php" class="navbar-brand d-flex w-50 mr-auto">Brand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="collapsingNavbar3">
        <ul class="navbar-nav mx-auto w-100 justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Create your own tour&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pick a Tour
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.php">Meeting</a>
                <a class="dropdown-item" href="portfolio-2-col.php">Incentive</a>
                <a class="dropdown-item" href="portfolio-3-col.php">Conferences</a>
                <a class="dropdown-item" href="portfolio-4-col.php">Events</a>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">About Us</a>
            </li>
        </ul>

          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="Register.php"><i class="fa fa-user-plus">&nbsp;&nbsp;</i>Sing up&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a class="nav-link" href="Login.php"><i class="fa fa-user">&nbsp;&nbsp;</i>Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item">
              <span class="nav-link text-dark" id="nav-chatservice"><i class="fa fa-comments">&nbsp;&nbsp;</i>Chat Service</span>
              <span class="nav-link text-dark" id="nav-contactservice"><i class="fa fa-phone">&nbsp;&nbsp;</i>+66-xxx-xxxx</span>
            </li>
            <li>

            </li>
          </ul>
      </div>
  </nav>
  <!--Register body-->
  <div class="container">
<div class="row">
<div class="col-md-8">
    <h3 class="entry-title"><span><br><br>Account Information</span> </h3>
    <hr>
        <form class="form-horizontal" method="post" action="register.php" id="fileForm" role="form">
          <div class="form-group">
            <label class="control-label col-sm-8">Username <span class="text-danger req">*</span></label>
            <div class="col-md-8 col-sm-9">
              <div class="input-group">
                <span class="input-group-addon req"><i class="fa fa-user"></i></span>
                <input required type="text" minlength="3" maxlength="16" class="form-control" id="txt" placeholder="minimum 3 letters" name="username" onkeyup = "Validate(this)">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="control-label col-sm-8">Password <span class="text-danger req">*</span></label>
            <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon req"><i class="fa fa-lock"></i></span>
                <input onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="inputPassword" placeholder="Please enter your password" />
              </div>
            </div>
          </div>

      <div class="form-group">
        <label for="password" class="control-label col-sm-8">Confirm Password <span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-lock"></i></span>
            <input onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" type="password" class="form-control inputpass" name="cpassword" minlength="4" maxlength="16" id="cpassword" placeholder="Confirm your password" required>
          </div>
            <span id="confirmMessage" class="confirmMessage"></span>
        </div>
      </div>

      <h3 class="entry-title"><span><br>Personal Information</span> </h3>
      <hr>

      <div class="form-group">
        <label class="control-label col-sm-8">Name&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your Name here" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8 req">Middle&nbsp;Name</label>
        <div class="col-sm-8">
          <div class="input-group">
            <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter your Middle Name here">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Surname&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <input onkeyup="Validate(this)" type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your Surname here" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Date&nbsp;of&nbsp;Birth&nbsp;<span class="text-danger">*</span></label>
        <div class="form-inline col-md-8 col-sm-9">
        <input required id="dob" name="dob" class="form-control" type="date" value="2017-10-13"/>
      </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Occupation&nbsp;<span class="text-danger"> *</span></label>
        <div class="form-inline col-md-8 col-sm-9">
              <select name="occupation" class="form-control" required>
        <option value="">Please select</option>
        <option value="1">Business Owner</option>
        <option value="2">Employee</option>
        <option value="3">University Lecturer</option>
        <option value="4">Manager</option>
        <option value="5">Government officer</option>
        <option value="6">Doctor</option>
        <option value="7">Researcher</option>
        <option value="8">Store Owner</option>
        <option value="9">Other</option>
              </select>
      </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Salary&nbsp;<span class="text-danger"> *</span></label>
        <div class="form-inline col-md-8 col-sm-9">
              <select name="salary" class="form-control" required>
                <option value="">Please select</option>
                <option value="1">0&nbsp;-&nbsp;10,000&nbsp;THB/month</option>
                <option value="2">10,001&nbsp;-15,000&nbsp;THB/month</option>
                <option value="3">15,001&nbsp;-20,000&nbsp;THB/month</option>
                <option value="4">20,001&nbsp;-25,000&nbsp;THB/month</option>
                <option value="5">25,001&nbsp;-30,000&nbsp;THB/month</option>
                <option value="6">30,001&nbsp;-35,000&nbsp;THB/month</option>
                <option value="7">35,001&nbsp;-40,000&nbsp;THB/month</option>
                <option value="8">&gt;40,0001&nbsp;THB/month</option>
              </select>
      </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-8">Email&nbsp;<span class="text-danger req">*</span></label>
          <div class="col-sm-8">
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input onchange="email_validate(this.value);" type="email" class="form-control" name="email" id="email" placeholder="Enter your Email"  required>
            </div>
            </div>
        </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Contact No.&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone">&nbsp;&nbsp;66</i></span>
          <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="9" name="phone" id="phone" placeholder="Enter your contact no." required>
          </div>
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-8">Address <span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-home"></i></span>
            <input required name="address" type="text" class="form-control inputpass" minlength="4" maxlength="50"  id="address" placeholder="Address" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">City&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
              <span class="input-group-addon req"><i class="fa fa-home"></i></span>
            <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city" id="city" placeholder="City" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Province&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
              <span class="input-group-addon req"><i class="fa fa-home"></i></span>
            <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province" id="province" placeholder="Province" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Zip&nbsp;Code&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home"></i></span>
          <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="5" name="zipcode" id="zipcode" placeholder="Zip Code" required>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-10 float-none">
            <input name="submit" type="submit" class="btn btn-danger btn-md" value="Sign Up">
            <input type="submit" value="Cancel" onclick="window.location.href='Index.php'" class="btn btn-warning">
        </div>
      </div>
    </form>
    </div>
</div>
  </div>
<!--end Register body-->
    <script src="js/validate.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

</body>
</html>
