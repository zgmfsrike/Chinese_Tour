<?php
ob_start();
session_cache_expire(30);
error_reporting (E_ALL ^ E_NOTICE);
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "db_config.php";
//-----------------------------Variable----------------------------------------------------//

if(isset($_SESSION['login_id'])){
$id = $_SESSION['login_id'];
$sql_db = "SELECT * FROM `member` WHERE id=$id";
$result = mysqli_query($conn,$sql_db);
$data = mysqli_fetch_array($result);
$oldmail = $data['email'];

$email = $_POST['email'];
$confirm_email = $_POST['confirm_email'];
//-----------------------------Edit fucntion----------------------------------------------------//
if($_POST['save']){
  echo "save";
  if(strcmp($email,$confirm_email)==0){
    echo "mail";
    //-----------------------------Send change mail fucntion----------------------------------------------------//
      require 'vendor/autoload.php';
        $url = "http://localhost/Chinese_Tour/Chinese_Tour/active_change_mail.php";
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
          $mail_array = array($oldmail,$email);
          // $body_array = array("'<p><strong>You email address is changed</strong><br></p>'","'<p><strong>Please confirm your E-mail</strong><br>
          //     Link : '.$url.'</p>'");
          for ($i = 0; $i<= count($mail_array);$i++) {
                if($i==0){
                  $mail->setFrom('info@chtour.com', 'Chinese Tour');
                  $mail->addAddress($mail_array[$i],$firstname);
                  $body = '<p><strong>You email address is changed</strong><br></p>';
                  $mail->isHTML(true);
                  $mail->Subject = 'Chinese Tour: Email changed';
                  $mail->Body    = $body;
                  $mail->AltBody = strip_tags($body);
                  $mail->send();
                }else{
                  $mail->setFrom('info@chtour.com', 'Chinese Tour');
                  $mail->addAddress($mail_array[$i],$firstname);
                  $body = '<p><strong>You email address is changed</strong><br></p>';
                  $mail->isHTML(true);
                  $mail->Subject = 'Chinese Tour: Email changed';
                  $mail->Body    = '<p><strong>Please confirm your E-mail</strong><br>
                      Link : '.$url.'</p>';
                  $mail->AltBody = strip_tags($body);
                  $mail->send();
                }


                //
                // $body = '<p><strong>Please confirm your E-mail</strong><br>
                //     Link : '.$url.'</p>';
                // $mail->isHTML(true);
                //  $mail->Subject = 'Chinese Tour: Email confirmation';
                // $mail->Body    = $body;
                // $mail->AltBody = strip_tags($body);
                // $mail->send();

            }





          // echo 'Message has been sent';
      } catch (Exception $e) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      }
      // header("location: profile.php");
      // ob_end_flush();


}


}
}



 ?>

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
  <br><br>
  <!-- Page Content -->
  <div class="container">
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="list-group admin-menu">
          <hr>
          <a href="Profile.php" class="list-group-item list-group-item-danger active text-white"><i class="fa fa-user fa-fw"></i>Profile</a>
          <a href="Purchase.php" class="list-group-item list-group-item-danger text-white"><i class="fa fa-shopping-cart fa-fw"></i>Purchase</a>
          <a href="Record.php" class="list-group-item list-group-item-danger text-white"><i class="fa fa-clipboard fa-fw"></i>Record</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h3 class="entry-title"><span><br>Change Email</span> </h3>

        <hr>
        <form action="changeEmail.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-8">Email  <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input onkeyup="checkMail(); return false;" onfocusout="checkMail(); return false;" onchange="email_validate(this.value);" type="email" class="form-control" name="email" id="email" placeholder="Enter your new Email" required>
                  </div>
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-sm-8">Confirm Email <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input onkeyup="checkMail(); return false;" onfocusout="checkMail(); return false;" onchange="email_validate(this.value);" type="email" class="form-control" name="confirm_email" id="confirm_email" placeholder="confirm your Email"  required>
                    </div>
                    <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                </div>

          <div class="form-group">
            <div class="col-xs-offset-3 col-sm-9 float-none"><br>
              <input type="submit" class="btn btn-danger btn-md" value="save" name ="save">
              <input type="button" value="Cancel" onclick="window.location.href='Profile.php'" class="btn btn-warning">
            </div>
          </div>
        </form>
    </div>
    <!-- /.row -->

  </div>
</div>
  <!-- /.container -->

<!--end side menu body-->
<script src="js/validate.js"></script>


</body>
</html>
