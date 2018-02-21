<?php
include 'module/session.php';
include "db_config.php";

if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    switch ($msg) {
            // add message case : message(HEADER,message,LINK,BUTTON_VALUE);
            // use '' in LINK or BUTTON_VALUE to use DEFAULT as back button

            // SESSION
        case 'session_expired': message('Session expired','Please login','login.php','Login');
            break;

        case 'please_login': message('You are not login','Please login first.','login.php','Login');
            break;
        case 'login_already': message('You are already login','','','');
            break;
            // LOGIN
        case 'login_invalid': message('Login fail','Username or Password are invalid.','','Back to Login page');
            break;

        case 'not_active': message('Login fail','Please active your account from your e-mail.','','Back to Login page');
            break;

            // EDIT INFORMATION
        case 'edit': message('Success!','You information has been update','Profile.php','Go to profile page');
            break;

            // REGISTER
        case 'reg_succ': message('Registration Success!','Please active your account from your e-mail.','index.php','Go to homepage');
            break;
            // --------------------------- fix ----------------------------
        case 'reg_fail_confirm_password': message('Register fail!','Confirm password does not match.','','');
            break;

        case 'reg_fail_username': message('Register fail!','This username is already used','','');
            break;

        case 'reg_fail_email': message('Register fail!','This email address is already used','','');
            break;
            //-------------------------- end fix --------------------------

            // ACTIVE ACCOUNT
        case 'active_succ': message('Thank you!','account has been actived','index.php','Go to home page');
            break;

        case 'active_fail': message('Fail to acctive!','Please try again later.','index.php','Go to home page');
            break;

        case 'active_already': message('Sorry!','Your account had already actived.','index.php','Go to home page');
            break;

        case 'active_error': message('Error!','Request does not match, please check link again.','index.php','Go to home page');
            break;

          //Change mail
          case 'email_change_succ': message('Success!','Your email has been changed.','Profile.php','Go to profile page');
              break;

          case 'email_change': message('Email confirmation is already send','Please confirm again in your email.','Profile.php','Go to profile page');
              break;

          case 'email_change_already': message('Sorry!','Your email had already changed.','Profile.php','Go to profile page');
              break;

          case 'email_fail': message('Fail to change email!','Please try again later.','Profile.php','Go to profile page');
              break;

          case 'email_error': message('Error!','Request does not match, please check link again.','Profile.php','Go to profile page');
              break;

          case 'email_old': message('Sorry!','You already use this email, please try again.','','');
              break;

          case 'email_not_match': message('Sorry!','Your email is not match, please try again','','');
              break;

          case 'email_already_use': message('Sorry!','Your email is already used , please try again','','');
              break;

            // Change Password
            case 'incorrect_password': message('Sorry!','Password is incorrect, please try again.','','');
                break;
            case 'change_password_succ': message('Success!','Your password has been changed.','profile.php','Go to profile page');
                break;
            case 'change_password_fail': message('Sorry!','Something went wrong, please try again.','','');
                break;
            case 'change_password_fail_confirm_password': message('Sorry!','Confirm password does not match.','','');
                break;

          case 'email_send_succ': message('Success!','E-mail has already send to member ','index.php','Go to home page');
              break;

          // Create News

          case 'create_news_succ': message('Success!','News has been created ','index.php','Go to home page');
              break;

          case 'del_news_succ': message('Success!','News has been deleted ','index.php','Go to home page');
              break;

          case 'edit_news_succ': message('Success!','News has been changed ','index.php','Go to home page');
              break;



            // default
        default: message('Request not found','','','');

    }
}else{
    message('Request not found.','','index.php','Go to Homepage');
}

?>

<!-- HTML -->
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
<?php
    include 'component/header.php';
?>
  <!--login body-->
<!----- PHP : 4 parameters ----->
    <?php
          function message($header,$message,$link,$btn){
              ?>
<div class="container">
  <form class="form-horizontal" data-toggle="validator">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6"><br><br><br><br>
          <h1>
              <?php
              echo $header;
              ?>
          </h1>
          <div>
            <?php
                echo $message;
            ?>
          </div>
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <input type="button" onclick=<?php echo (!$link == "") ? "window.location.href='$link'" : "history.go(-1)"; ?> class="btn btn-warning btn-sm" value="<?php echo(!$btn == '') ? $btn : 'Back' ?>">
      </div>
    </div>
  </form>
</div>
    <?php
          }
          ?>


    <!-- Footer -->
    <br><br><br><br>
<?php
    include 'component/footer.php';
?>

<script src="js/validate.js"></script>
</body>
</html>
