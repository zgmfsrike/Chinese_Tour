<?php
include "db_config.php";
include "module/hashing.php";
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = ''.$_POST['password'].'';

    $query = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $objResult = mysqli_fetch_array($result);
        if ( verifyPassword($password,$objResult["password"]) ){
            $_SESSION['login_id'] = $objResult['id'];
            $_SESSION['member_type'] = "member";
            $active = $objResult['active'];
            if ($active == 1){
                // confirmed
                header("location: index.php");
            }else{
                // not confirmed
            }
        }
    }else{
//        $error = "Your Login Name or Password is invalid";
    }
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
      <a href="index.html" class="navbar-brand d-flex w-50 mr-auto">Brand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="collapsingNavbar3">
        <ul class="navbar-nav mx-auto w-100 justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Create your own tour&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link" href="index.html">About Us</a>
            </li>
        </ul>

          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="Register.html"><i class="fa fa-user-plus">&nbsp;&nbsp;</i>Sing up&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a class="nav-link" href="Login.html"><i class="fa fa-user">&nbsp;&nbsp;</i>Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
<div class="container">
  <form class="form-horizontal" data-toggle="validator" method="post" action="login.php">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6"><br><br><br><br>
        <h1>Please Login</h1>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">

        <div class="form-group has-feedback">
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
            <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="inputUsername" placeholder="Username" name="username" required>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="sr-only control-label" for="inputPassword">Password</label>
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
            <input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
          </div>

          <div class="col-md-12">
            <a class="pull-right small" href="/password/reset">Forgot Your Password?</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-danger btn-sm" name="login">Login</button>
        <button type="button" onclick="window.location.href='Register.html'" class="btn btn-warning btn-sm">Register</button>
      </div>
    </div>
      </form>
<!--end login body-->
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
