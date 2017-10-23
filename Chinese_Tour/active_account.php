<?php
include "db_config.php";

if(isset($_GET['id']) and isset($_GET['u'])){
    $id = $_GET['id'];
    $u = $_GET['u'];

    $sql = "SELECT * FROM member WHERE id = '$id'";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    if(!$result){
        header("location: index.php");
    }
    $count = mysqli_num_rows($result);

   if($count == 1){
       
       $objResult = mysqli_fetch_array($result);
       $username = $username[0];
       $username = md5($objResult['username']);
       
       if($u == $username){
           
           $active = $objResult['active'];
           if($active == 0){
               $sql = "UPDATE member SET active = 1 WHERE id = $id";
               $result = mysqli_query( $GLOBALS['conn'] , $sql );
           
               if($result){
                   msg("Actived");
               }else{
                   msg("Error can not update");
               }   
           }else{
               msg("This account had already actived");
           }
       }else{
           msg("u != username");
       }
    }else{
//        header("location: index.php");
    }
}else{
//    header("location: index.php");
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
                <a class="dropdown-item" href="portfolio-1-col.html">Meeting</a>
                <a class="dropdown-item" href="portfolio-2-col.html">Incentive</a>
                <a class="dropdown-item" href="portfolio-3-col.html">Conferences</a>
                <a class="dropdown-item" href="portfolio-4-col.html">Events</a>
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
    <br><br><br><br>
  <!-- body-->
<div class="container">
    <div class="row">
        <div class="sr-only control-label">
            <?php
                function msg($msg){
                    echo $msg;
                }
            ?>
        </div>
    </div>
</div>

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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
</body>
</html>