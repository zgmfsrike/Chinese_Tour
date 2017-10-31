<?php
include 'module/session.php';
noLogin();

include "db_config.php";
include "module/hashing.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = ''.$_POST['password'].'';

    $query = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $objResult = mysqli_fetch_array($result);
        if ( verifyPassword($password,$objResult["password"]) ){
            $active = $objResult['active'];
            if ($active == 1){
                $_SESSION['login_id'] = $objResult['id'];
                $_SESSION['login_firstname'] = $objResult['first_name'];
                $_SESSION['user_type'] = "member";
                $_SESSION['start'] = time(); // Taking now logged in time.
                // Ending a session in 30 minutes from the starting time.
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                header("location: index.php");
            }else{
                // not confirmed
                header("location: messege.php?msg=not_active");
            }
        }else{
            echo '<script type="text/javascript">alert("Username or Password are incorrect.");</script>';

        }
    }else{
//        $error = "Your Login Name or Password is invalid";
        echo '<script type="text/javascript">alert("Username or Password are incorrect.");</script>';
    }
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
<div class="container">
  <form class="form-horizontal" data-toggle="validator" method="post" action="login.php">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6"><br><br><br><br>
        <h1>Please Login</h1>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">

        <div class="form-group has-feedback">
          <label class="sr-only control-label req">Username</label>
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
            <input onkeyup = "ValidateUsername(this)" id="username" type="text" class="form-control" name="username" id="username" placeholder="Enter your Username here" minlength="3" maxlength="16" required>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="sr-only control-label req" for="password">Password</label>
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
            <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="inputPassword" placeholder="Please enter your password" />
          </div>

          <div class="col-md-12">
            <a class="pull-right small" href="/password/reset">Forgot Your Password?</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <input type="submit" class="btn btn-danger btn-sm" name="login" value="Login">
        <input type="button" onclick="window.location.href='Register.php'" class="btn btn-warning btn-sm" value="Register">
      </div>
    </div>
<!--end login body-->
  </form>
</div>

    <!-- Footer -->
    <br><br><br><br>
<?php
    include 'component/footer.php';
?>

<script src="js/validate.js"></script>
<script src="js/validate2.js"></script>
</body>
</html>
