<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
      // include 'module/session.php';
      // requireLogin();
      // include 'php_profile_func.php';
?>
<body>
  <!-- body -->
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
            <h4>Account Information</h4><hr/>
          <div class="container">
            <ul style="list-style-type:none">
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
              <li>
                <input name="search" type="submit" value="Search" onclick="window.location.href='php_search_tour.php'" class="btn btn-danger">
                <input name="createNews" type="submit" value="Create News" onclick="window.location.href='AdminCreateNews.php'" class="btn btn-danger">
                <!-- <input name="listNews" type="submit" value="List News" onclick="window.location.href='ListNews.php'" class="btn btn-danger"> -->
              </li>
            </ul>
          </div>
          <div class="section"></div>
          <div class="row center">
            <a href="EditInfo.php" class="btn waves-effect waves-light red">Edit Profile</a>
            <a href="ChangePassword.php" class="btn waves-effect waves-light red">Change Password</a>
            <a href="changeEmail.php" class="btn waves-effect waves-light red">Change Email</a>
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
