<?php
include('module/session.php');
isLogin();
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
                        header("location: message.php?msg=change_password_succ");
                    }else{
                        header("location: message.php?msg=change_password_fail");
                    }
                }else{
                    header("location: message.php?msg=change_password_fail_confirm_password");
                }
            }else{
                header("location: message.php?msg=incorrect_password");
            }
        }else{
            header("location: message.php?msg=change_password_fail");
        }
    }else{
        header("location: message.php?msg=change_password_fail");
    }
}
?>
<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
?>
<body>
  <div class="container">
    <div class="section"></div>
    <div class="row">
      <div class="col s12 l3">
        <div class="collection">
          <a href="Profile.php" class="collection-item active amber">Profile</a>
          <a href="Purchase.php" class="collection-item black-text">Purchase</a>
          <a href="Record.php" class="collection-item black-text">Record</a>
        </div>
      </div>
      <div class="col s12 l9">
          <h3>Change Password</h3>
          <form action="ChangePassword.php" method="post">
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
                <input type="submit" class="btn waves-effect waves-light green" value="save" name ="save">
                <input type="button" value="Cancel" onclick="window.location.href='Profile.php'" class="btn waves-effect waves-light red"></div>
            </div>
          </form>

      </div>
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
