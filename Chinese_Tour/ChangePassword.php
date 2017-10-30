<?php
error_reporting (E_ALL ^ E_NOTICE);
include "module/hashing.php";
// require_once 'module/init.php';
include "db_config.php";
// if(not_logged_in() === TRUE) {
// 	header('location: login.php');
// }
session_cache_expire(30);
session_start();
if(isset($_SESSION['login_id'])){
	$id = $_SESSION['login_id'];
	$password = $_POST['password'];
	$npassword = hashPassword(''.$_POST["npassword"].'');
	$cpassword = $_POST['cpassword'];
	$sql= "SELECT* from `member` WHERE id = $id ";
	$result = mysqli_query( $GLOBALS['conn'] , $sql );
  $data = mysqli_fetch_array($result);
  $pass_db = $data['password'];

	if($_POST['save']){
	    $sql_db= "UPDATE `member` SET `password`= '$npassword' WHERE id = $id ";
			$result2 = mysqli_query( $GLOBALS['conn'] , $sql_db);
			echo $result2;

	      header("location: profile.php");
	      ob_end_flush();
	}




}else {
	header("location: login.php");
}
//
// function getUserDataByUserID($id){
// $sql_db = "SELECT * FROM `member` WHERE id=$id";
// $result = mysqli_query($conn,$sql_db);
// $data = mysqli_fetch_array($result);
// }
//
// function users_exists_by_id($id, $username) {
// 	global $connect;
// 	$sql_db = "SELECT * FROM `member` WHERE username = '$username'AND id !=$id";
// 	$query = $connect->query($sql_db);
// 	$result = mysqli_query($conn,$sql_db);
// 	$data = mysqli_fetch_array($result);
// 	if($query->num_rows >= 1) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// 	$connect->close();
// }
//
// function userdata($username){
// 	global $connect;
//
// 	$sql_db = "SELECT * FROM `member` WHERE username = '$username'";
// 	$query = $connect->query($sql_db);
// 	$result = mysqli_query($conn,$sql_db);
// 	$data = mysqli_fetch_array($result);
// 	if($query->num_rows >= 1) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// 	$connect->close();
// }
//
// function makePassword($password) {
// 	return hash('sha256', $password);
// }
//
// function passwordMatch($id,$password){
// 	global $connect;
//
// $userdata=getUserDataByUserId($id);
// $makePassword = makePassword($password);
// if($makePassword == $userdata['password']) {
// 	return true;
// } else {
// 	return false;
// }
//
// // close connection
// $connect->close();
// }
//
// function changePassword($id, $password) {
// 	global $connect;
// 	$makePassword = makePassword($password);
// 	$sql_db = "SELECT * FROM `member` WHERE username = '$username'";
// 	$query = $connect->query($sql_db);
// 	$result = mysqli_query($conn,$sql_db);
// 	$data = mysqli_fetch_array($result);
// 	if($query === TRUE) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// }






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
      <a href="index.html" class="navbar-brand d-flex w-50 mr-auto">Brand</a>
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
                <a class="dropdown-item" href="portfolio-1-col.html">Meeting</a>
                <a class="dropdown-item" href="portfolio-2-col.html">Incentive</a>
                <a class="dropdown-item" href="portfolio-3-col.html">Conferences</a>
                <a class="dropdown-item" href="portfolio-4-col.html">Events</a>
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
        <h3 class="entry-title"><span><br>Change Password </span> </h3>
        <hr>
        <form class="" action="ChangePassword.php" method="post">
          <div class="form-group">
            <label class="control-label col-sm-8">Password <span class="text-danger">*</span></label>
            <div class="col-sm-5">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" minlength="4" maxlength="16" class="form-control" id="inputPassword" placeholder="Password" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-8">New Password <span class="text-danger">*</span></label>
            <div class="col-sm-5">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input required name="npassword" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="nPassword" placeholder="Please enter new password" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-8">Confirm Password <span class="text-danger">*</span></label>
            <div class="col-sm-5">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input onkeyup="checknewPass(); return false;" type="password" class="form-control inputpass" name="cpassword" minlength="4" maxlength="16" id="cpassword" placeholder="Confirm your new password" required>
                <span id="confirmMessage" class="confirmMessage"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-offset-3 col-sm-9 float-none"><br>
              <input type="submit" class="btn btn-danger btn-md" value="Save" name="save">
              <input type="submit" value="Cancel" onclick="window.location.href='Profile.html'" class="btn btn-warning">
            </div>
          </div>
        </form>
    </div>
    <!-- /.row -->

  </div>
</div>
  <!-- /.container -->

<!--end side menu body-->
<script src="js/validate2.js"></script>
</body>
</html>
