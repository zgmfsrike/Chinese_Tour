<?php
include('module/session.php');
requireLogin();
include "module/hashing.php";
include "db_config.php";

error_reporting (E_ALL ^ E_NOTICE);

if(isset($_POST['save'])){

    if(isset($_SESSION['login_id'])){
	   $id = $_SESSION['login_id'];
	   $password = $_POST['password'];
    
        $query = "SELECT * FROM member WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
    
        if($count == 1){
            $objResult = mysqli_fetch_array($result);
            if(verifyPassword($password,$objResult["password"])){
                $npassword = $_POST["npassword"];
                $cpassword = $_POST['cpassword'];
                if($npassword == $cpassword){
                    $npassword = hashPassword($npassword);
                    $query= "UPDATE `member` SET `password`= '$npassword' WHERE id = $id ";
                    $result = mysqli_query( $GLOBALS['conn'] , $query);
                    if($result){
                        header("location: messege.php?msg=change_password_succ");
                    }else{
                        header("location: messege.php?msg=change_password_fail");
                    }
                }else{
                    header("location: messege.php?msg=change_password_fail_confirm_password");
                }
            }else{
                header("location: messege.php?msg=incorrect_password");
            }
        }else{
            header("location: messege.php?msg=change_password_fail");
        }
    }else{
        header("location: messege.php?msg=change_password_fail");
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
  <?php
    include 'component/header.php';
    ?>
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
    <?php
    include 'component/footer.php';
    ?>

<!--end side menu body-->
<script src="js/validate2.js"></script>
</body>
</html>
