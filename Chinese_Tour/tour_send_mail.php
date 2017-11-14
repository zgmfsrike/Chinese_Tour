<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";

include('module/session.php');
requireLogin();


if(isset($_SESSION['login_id'])){

//-----------------------------Search fucntion----------------------------------------------------//
if($_GET['member_id'] != ""){
    $member_id = $_GET['member_id'];
    $sql= "SELECT  m.email FROM member m WHERE m.id = $member_id ";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    $show = mysqli_fetch_array($result);
    $email = $show['email'];
    $_SESSION['email'] = $email;

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
      <div class="col-md-7 mb-5">
        <h3 class="entry-title"><span><br>Send E-Mail</span> </h3>
        <hr>
        <p>Email : <?php echo $email; ?></p>
          <form action="php_send_mail.func.php" method="post">
            <div class="your-class">
              <label for="Subject">Subject : </label>
             <input name="subject" id="subject"  placeholder="Subject" required style="width: 200px;"/>
            </div>
            <div class="your-class">
              <br>
              <p>Description :</p>
              <textarea rows="4" cols="50" name = 'description' required></textarea>
            </div>
            <br>
            <input type="submit" value ="Send" name ="send" class="btn btn-danger"/>
            <input type="reset" value ="Reset" name ="reset" class="btn btn-danger"/>
          </form>




    </div>

</div>
    <?php
    include 'component/footer.php';
    ?>
  <!-- /.container -->

<!--end side menu body-->
<script src="js/validate.js"></script>


</body>
</html>
