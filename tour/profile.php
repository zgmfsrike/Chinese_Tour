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
// error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";

if(isset($_SESSION['login_id'])){
  $id_parameter = "";

  if(isLoginAs(array('member'))){
    $id = $_SESSION['login_id'];
  }else{
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $id_parameter = "?id=" . $id;
    }else{
      header("location: message.php?msg=error");
    }
  }
  $sql_db =  "SELECT * FROM `member` WHERE id=$id" ;
  $result2 = mysqli_query($conn,$sql_db);
  $data = mysqli_fetch_array($result2);

  $username_db = $data['username'];
  $firstname_db = $data['first_name'];
  $middlename_db = $data['middle_name'];
  $lastname_db = $data['last_name'];
  $phone_db = $data['phone'];
  $email_db = $data['email'];
  $salary_db = $data['salary'];
  $occupation_db = $data['occupation'];
  $date_of_birth = $data['dob'];
  $countrycode = $data['country_code'];

  $link_booking_history = "booking_history.php";
  $link_profile = "profile.php";

}

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
          <a href="<?php echo $link_profile.$id_parameter;?>" class="collection-item active amber"><?php echo $string_profile_profile;?></a>
          <!-- <a href="#" class="collection-item black-text">Purchase</a> -->

          <a href="<?php echo $link_booking_history.$id_parameter;?>" class="collection-item black-text">Booking History</a>
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
        <?php
        if(isLoginAs(array('member'))){
          ?>
          <div class="row">
            <div class="col s3">
              <a href="edit_profile.php" class="btn red"><?php echo $string_profile_edit_profile;?></a>
              <div class="section"></div>
            </div>
            <div class="col s4">
              <a href="change_password.php" class="btn red"><?php echo $string_profile_change_password;?></a>
              <div class="section"></div>
            </div>
            <div class="col s4">
              <a href="change_email.php" class="btn red"><?php echo $string_profile_change_email;?></a>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php
  include 'component/footer.php';
  ?>
</body>
</html>
