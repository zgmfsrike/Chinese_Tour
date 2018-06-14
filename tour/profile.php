<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin','member'))){
  header('Location: message.php?msg=please_login');
}

require 'module/language/init.php';
require 'module/language/lang_profile.php';
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
          <a href="profile.php" class="collection-item active amber"><?php echo $string_profile_profile;?></a>
          <!-- <a href="#" class="collection-item black-text">Purchase</a> -->
          <a href="booking_history.php" class="collection-item black-text">Booking History</a>
        </div>
      </div>
      <div class="col s12 l9">
        <h4><?php echo $string_profile_account_info;?></h4><hr/>
        <div class="container">
          <div class="row">
            <ul>
              <li>
                <b><?php echo $string_profile_username;?>&nbsp;:</b>&nbsp;<?php echo $username_db ?>
              </li>
              <li>
                <b><?php echo $string_profile_first_name;?>&nbsp;:</b>&nbsp;<?php echo $firstname_db ?>
              </li>
              <li>
                <b><?php echo $string_profile_middle_name;?>&nbsp;:</b>&nbsp;<?php echo $middlename_db ?>
              </li>
              <li>
                <b><?php echo $string_profile_last_name;?>&nbsp;:</b>&nbsp;<?php echo $lastname_db ?>
              </li>
              <li>
                <b><?php echo $string_profile_tel;?>&nbsp;:</b>&nbsp;<?php echo "+".$countrycode.$phone_db ?>
              </li>
              <li>
                <b><?php echo $string_profile_birth;?>&nbsp;:</b>&nbsp;<?php echo $date_of_birth ?>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col s3">
            <a href="edit_profile.php" class="btn waves-effect waves-light red"><?php echo $string_profile_edit_profile;?></a>
            <div class="section"></div>
          </div>
          <div class="col s4">
            <a href="change_password.php" class="btn waves-effect waves-light red"><?php echo $string_profile_change_password;?></a>
            <div class="section"></div>
          </div>
          <div class="col s4">
            <a href="change_email.php" class="btn waves-effect waves-light red"><?php echo $string_profile_change_email;?></a>
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
