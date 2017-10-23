<?php

require_once 'module/hashing.php';
require_once 'module/init.php';

// if(not_logged_in() === TRUE) {
// 	header('location: login.php');
// }
if($_POST) {
	$password = $_POST['password'];
	$npassword = $_POST["npassword"];
	$cpassword = $_POST['cpassword'];


  if($password && $npassword && $cpassword) {
    if(passwordMatch($_SESSION['id'], $password) === TRUE) {

      if($npassword != $cpassword) {
        echo "New password does not match conform password <br />";
      } else {
        if(changePassword($_SESSION['id'], $npassword) === TRUE) {
					echo "Successfully updated";
        } else {
          echo "Error while updating the information <br />";
        }
      }

    } else {
      echo "Current Password is incorrect <br />";
    }
  }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Bootstrap 4 Login Form</title>

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
      <a href="index.html" class="navbar-brand d-flex w-50 mr-auto">Brand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="collapsingNavbar3">
        <ul class="navbar-nav mx-auto w-100 justify-content-center">
          <li class="nav-item">
              <a class="nav-link" href="index.php"><h5>Create your own tour&nbsp;&nbsp;&nbsp;</h5></a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php"><h5>Pick a Tour&nbsp;&nbsp;&nbsp;</h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php"><h5>About Us</h5></a>
            </li>
        </ul>

          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="Register.php"><i class="fa fa-user-plus">&nbsp;&nbsp;</i>Sing up&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a class="nav-link" href="Login.php"><i class="fa fa-user">&nbsp;&nbsp;</i>Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item">
              <span class="nav-link text-white" id="nav-service" href="Register.php"><i class="fa fa-comments">&nbsp;&nbsp;</i>Chat Service</span>
              <span class="nav-link text-white" id="nav-service" href="Login.php"><i class="fa fa-phone">&nbsp;&nbsp;</i>+66-xxx-xxxx</span>
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
          <a href="Profile.html" class="list-group-item list-group-item-danger "><i class="fa fa-user fa-fw"></i>Profile</a>
          <a href="Purchase.html" class="list-group-item list-group-item-danger active"><i class="fa fa-shopping-cart fa-fw"></i>Purchase</a>
          <a href="Record.html" class="list-group-item list-group-item-danger"><i class="fa fa-clipboard fa-fw"></i>Record</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h3 class="entry-title"><span><br>Purchase</span> </h3>
        <hr>
        <div class="form-group">
          <div class="col-xs-offset-3 col-xs-10">
            <input name="Submit" type="submit" value="Edit" onclick="window.location.href='EditInfo.html'" class="btn btn-danger">
          </div>
        </div>
        <h3 class="entry-title"><span><br>Change Password</span> </h3>
        <hr>
        <div class="form-group">
          <label class="control-label col-sm-3">Password <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" name="password" id="password" placeholder="Choose password (5-15 chars)" value="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">New Password <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" name="npassword" id="npassword" placeholder="Your new password" value="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Confirm Password <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password" value="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-offset-3 col-xs-10">
            <input name="Submit" type="submit" value="Submit" class="btn btn-danger">
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<!--end side menu body-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
</body>
</html>
