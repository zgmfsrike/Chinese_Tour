<?php
include('module/session.php');
if(!isLoginAs(array('admin','member'))){
    header('Location: message.php?msg=please_login');
}
?>
<!DOCTYPE html>
  <html>
<?php
      include 'php_profile_func.php';
      $title = $username_db."'s Profile";
      include 'component/header.php';
?>
<body>
  <!-- body -->
    <div class="container">
      <div class="section"></div>
      <div class="row">
        <div class="col s12 l3">
          <div class="collection">
            <a href="profile.php" class="collection-item active amber">Profile</a>
            <a href="#" class="collection-item black-text">Purchase</a>
            <a href="#" class="collection-item black-text">Record</a>
          </div>
        </div>
        <div class="col s12 l9">
            <h4>Account Information</h4><hr/>
            <div class="container">
              <div class="row">
                <ul>
                  <li>
                    <b>Username&nbsp;:</b>&nbsp;<?php echo $username_db ?>
                  </li>
                  <li>
                    <b>Firstname&nbsp;:</b>&nbsp;<?php echo $firstname_db ?>
                  </li>
                  <li>
                    <b>Middlename&nbsp;:</b>&nbsp;<?php echo $middlename_db ?>
                  </li>
                  <li>
                    <b>Surname&nbsp;:</b>&nbsp;<?php echo $lastname_db ?>
                  </li>
                  <li>
                    <b>Contact No.&nbsp;:</b>&nbsp;<?php echo "+".$countrycode.$phone_db ?>
                  </li>
                  <li>
                    <b>Date Of Birth&nbsp;:</b>&nbsp;<?php echo $date_of_birth ?>
                  </li>
                </ul>
              </div>
            </div>
          <div class="row">
            <div class="col s3">
              <a href="edit_profile.php" class="btn waves-effect waves-light red">Edit Profile</a>
            <div class="section"></div></div>
            <div class="col s4">
              <a href="change_password.php" class="btn waves-effect waves-light red">Change Password</a>
            <div class="section"></div></div>
            <div class="col s4">
              <a href="change_email.php" class="btn waves-effect waves-light red">Change Email</a>
            </div>
          </div>
          </div>
        </div>
      </div>

  <!-- Footer -->
  <?php
  include 'component/footer.php';
  ?>
</body>
</html>
