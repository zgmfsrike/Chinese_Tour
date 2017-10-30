<?php
include "db_config.php";

if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    switch ($msg) {
            // add messege case : messege(HEADER,MESSEGE,LINK,BUTTON_VALUE);
            // use '' in LINK or BUTTON_VALUE to use DEFAULT as back button
            
            // LOGIN
        case 'login_invalid': messege('Login fail','Username or Password are invalid.','','Back to Login page');
            break;
            
        case 'not_active': messege('Login fail','Please active your account from your e-mail.','','Back to Login page');
            break;
            
            // REGISTER
            
            // ACTIVE ACCOUNT
        case 'active_succ': messege('Thank you!','account has been actived','index.php','Go to home page');
            break;
            
        case 'active_fail': messege('Fail to acctive!','Please try again later.','index.php','Go to home page');
            break;
            
        case 'active_already': messege('Sorry!','Your account had already actived.','index.php','Go to home page');
            break;
        
        case 'active_error': messege('Error!','Request does not match, please check link again.','index.php','Go to home page');
            break;
            // default
        default: messege('Request not found!','','','');
            
    }
}else{
    messege('Request not found.','','index.php','Go to Homepage');
}

function getLink($link){
    return 'window.location.href="'.$link.'"';
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
<!----- PHP : 4 parameters ----->
    <?php
          function messege($header,$messege,$link,$btn){
              ?>
<div class="container">
  <form class="form-horizontal" data-toggle="validator">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6"><br><br><br><br>
          <h1>
              <?php
              echo $header;
              ?>
          </h1>
          <div>
            <?php
                echo $messege;  
            ?>
          </div>
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <input type="button" onclick=<?php echo (!$link == "") ? "window.location.href='$link'" : "history.go(-1)"; ?> class="btn btn-warning btn-sm" value="<?php echo(!$btn == '') ? $btn : 'Back' ?>">
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
