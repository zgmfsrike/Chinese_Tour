<?php
include('module/session.php');
if(!isLoginAs(array('admin','member'))){
    header('Location: message.php?msg=please_login');
}

$id = $_SESSION['login_id'];
//--------------------Link to another page -----------------------------------
$profile_page = "window.location.href='profile.php'";
$change_pass_func = "php_change_pass.php?id=".$id;
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
          <a href="profile.php" class="collection-item active amber">Profile</a>
          <a href="Purchase.php" class="collection-item black-text">Purchase</a>
          <a href="Record.php" class="collection-item black-text">Record</a>
        </div>
      </div>
      <div class="col s12 l9">
        <h3>Change Password</h3>
        <form action="<?php echo $change_pass_func; ?>" method="post" >
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
              <button type="submit" class="btn waves-effect waves-light green" value="save" name ="save">Save</button>
              <button type="button" value="Cancel" onclick="<?php echo $profile_page; ?>" class="btn waves-effect waves-light red">Cancel</button>
            </div>
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
