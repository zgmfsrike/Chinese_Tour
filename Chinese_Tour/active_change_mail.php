<?php
include "db_config.php";

if(isset($_GET['id']) and isset($_GET['u'])){
    $id = $_GET['id'];
    $u = $_GET['u'];

    $sql = "SELECT * FROM member WHERE id = '$id'";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    if(!$result){
        msg("<h1>Sorry!</h1><h3>Something went wrong, please try again later.</h3>");
    }
    $count = mysqli_num_rows($result);

   if($count == 1){

       $objResult = mysqli_fetch_array($result);
       $username = $username[0];
       $username = md5($objResult['username']);

       if($u == $username){

               $sql= "UPDATE `member` SET `email`='$email' WHERE id = $id   ";
               $result = mysqli_query( $GLOBALS['conn'] , $sql );

               if($result){
                   msg("<h1>Thank you!</h1><h3>Your email has been changed</h3>");
               }else{
                  msg("<h1>Sorry!</h1><h3>Your email had already changed</h3>");
               }

?>

<!-- HTML -->
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
      <a href="index.php" class="navbar-brand d-flex w-50 mr-auto">Brand</a>
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
                <a class="dropdown-item" href="portfolio-1-col.php">Meeting</a>
                <a class="dropdown-item" href="portfolio-2-col.php">Incentive</a>
                <a class="dropdown-item" href="portfolio-3-col.php">Conferences</a>
                <a class="dropdown-item" href="portfolio-4-col.php">Events</a>
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
  <!--login body-->
    <?php
          function msg($msg){
              ?>
<div class="container">
  <form class="form-horizontal" data-toggle="validator">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6"><br><br><br><br>
        <?php
              echo $msg;
              ?>
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <input type="button" onclick="window.location.href='index.php'" class="btn btn-warning btn-sm" value="Go back to Home page">
      </div>
    </div>
  </form>
</div>
    <?php
          }
          ?>

    <!-- Footer -->
    <br><br><br><br>
    <footer class="py-5 ">
      <div class="container ">
        <div class="row">
            <div class="col-md-2 company">
                <h3>Logo</h3>
            </div>
            <div class="col-md-3 dc">
                <h3>Help</h3>
                <ul>
                    <li><a href=""></a>Freemans Ridge Estate</li>
                    <li><a href=""></a>Homeworld Camden South</li>
                    <li><a href=""></a>Brooks Beach Estate Horsley</li>
                </ul>
            </div>
            <div class="col-md-2 customer">
                <h3>Services</h3>
                <p>Unit 36/65 Marigold St,Revesby
                NSW 2212 <br>
                P | (02) 9773 8773
                <br>
                F | (02) 977 8125
                <br>
                E | info@trevell.com.au</p>
            </div>
            <div class="col-md-3 lp">
                <h3>Community</h3>
                <ul>
                    <li><a href=""></a>House & Land Packages</li>
                    <li><a href=""></a>Display Home for Sale</li>
                </ul>
            </div>
            <div class="col-md-2 nl">
                <h3>Call Center</h3>
                +66 XXX XXXX
            </div>
        </div>
    </div>
  </footer>

<script src="js/validate.js"></script>
</body>
</html>
