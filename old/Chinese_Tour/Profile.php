<?php
include 'module/session.php';
requireLogin();
include 'php_profile_func.php';
?>



<!------------------------------------------------------------- HTML  ------------------------------------------------------------>
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
        <h3 class="entry-title"><span><br>Account Information</span> </h3>
        <hr>
        <div class="col-sm-9">
          <ul style="list-style-type:none">
            <li>
              <label class="control-label"><b>Username&nbsp;:</b>&nbsp;<?php echo $username_db ?></label>
            </li>
            <li>
              <label class="control-label"><b>Firstname&nbsp;:</b>&nbsp;<?php echo $firstname_db ?></label>
            </li>
            <li>
              <label class="control-label"><b>Middlename&nbsp;:</b>&nbsp;<?php echo $middlename_db ?></label>
            </li>
            <li>
                <label class="control-label"><b>Surname&nbsp;:</b>&nbsp;<?php echo $lastname_db ?></label>
            </li>
            <li>
              <label class="control-label"><b>Contact No.&nbsp;:</b>&nbsp;<?php echo "+".$countrycode.$phone_db ?></label>
            </li>
            <li>
              <label class="control-label"><b>Date Of Birth&nbsp;:</b>&nbsp;<?php echo $date_of_birth ?></label>
            </li>
            <li>
              <br>
              <input name="Submit" type="submit" value="Edit" onclick="window.location.href='EditInfo.php'" class="btn btn-danger">
              <input name="changePassword" type="submit" value="Change Password" onclick="window.location.href='ChangePassword.php'" class="btn btn-danger">
              <input name="changeEmail" type="submit" value="Change Email" onclick="window.location.href='changeEmail.php'" class="btn btn-danger">
              <input name="search" type="submit" value="Search" onclick="window.location.href='php_search_tour.php'" class="btn btn-danger">
              <input name="createNews" type="submit" value="Create News" onclick="window.location.href='CreateNews.php'" class="btn btn-danger">
              <!-- <input name="listNews" type="submit" value="List News" onclick="window.location.href='ListNews.php'" class="btn btn-danger"> -->
            </li>
          </ul>
        </div>
  </div>
</div>
</div>
  <!-- /.container -->
    <?php
    include 'component/footer.php';
    ?>

<!--end side menu body-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

</body>
</html>
