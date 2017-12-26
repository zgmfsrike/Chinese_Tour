<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="css/materialize.min.css"/>
  <link rel="stylesheet" href="css/materialize.css"/>
  <link rel="stylesheet" href="css/main.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Chinese Tour</title>

  <nav class="nav-extended">
    <div class="nav-wrapper red darken-2">
        <a href="Index.php" class="brand-logo center hide-on-med-and-down"><img src="images/logo400x300.png" width=20% height=20% alt="logo"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <a href="Index.php" class="show-on-medium-and-down hide-on-large-only">Chiangmai HongThai</a>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#">WeChat</a></li>
          <li><a href="#">081-025-0351</a></li>
          <li><a class="grey-text text-lighten-3" href="mailto:chiangmaihongthai@hotmail.com">chiangmaihongthai@hotmail.com</a></li>
        </ul>

        <ul class="side-nav" id="mobile-demo">
          <li><a>Chiangmai HongThai</a></li>
          <li><div class="divider"></div></li>
          <li><a href="Index.php">Home</a></li>
          <li><a href="meeting.php">Meeting Tour</a></li>
          <li><a href="incentive.php">Incentive Tour</a></li>
          <li><a href="convension.php">Convension Tour</a></li>
          <li><a href="foxhibition.php">Foxhibition Tour</a></li>
          <li><a href="business.php">Business Tour</a></li>
          <li><a href="AboutUs.html">About Us</a></li>
          <li><div class="divider"></div></li>
          <li><a href="Register.php">Register</a></li>
          <li><a href="Login.php">Log in</a></li>
        </ul>
    </div>

    <div class="nav-content red darken-3 hide-on-med-and-down">
      <ul class="tabs tabs-fixed-width tabs-transparent container">
        <li class="tab"><a target="_self" href="Index.php">Home</a></li>
        <li class="tab"><a target="_self" href="meeting.php">Meeting Tour</a></li>
        <li class="tab"><a target="_self" href="incentive.php">Incentive Tour</a></li>
        <li class="tab"><a target="_self" href="convension.php">Convension Tour</a></li>
        <li class="tab"><a target="_self" href="foxhibition.php">Foxhibition Tour</a></li>
        <li class="tab"><a target="_self" href="business.php">Business Tour</a></li>
        <li class="tab"><a target="_self" href="aboutUs.php">About Us</a></li>
        <li style="border-left: 1px solid #fff; border-radius: 0; height:50%; margin-top:1%;" class="tab"></li>

        <!--PHP : Check Login-->
        <?php
          $firstname = $userType = '';
            if(isset($_SESSION['login_id'])){
              $firstname = $_SESSION['login_firstname'];
              $userType = $_SESSION['user_type'];
              login();

            }else{
              notLogin();
          }
        ?>

        <!--PHP : if Not Login-->
        <?php
            function notLogin(){
        ?>
        <li class="right tab"><a target="_self" href="Register.php">Register</a></li>
        <li class="right tab"><a target="_self" href="Login.php">Log in</a></li>

        <?php
        }
        ?>

        <!--PHP : if Login-->
        <?php
            function login(){
        ?>
        <li class="right tab"><a target="_self" href="logout.php">Logout</a></li>
        <li class="right tab"><a target="_self" href="Profile.php">
          <?php
          if ($_SESSION['user_type'] == 'member') {
            echo '';
          }elseif ($_SESSION['user_type'] == 'admin') {
            echo 'Admin ';
          }
          echo $GLOBALS['firstname'];
          ?>
        </a></li>
        <?php
        }
        ?>

      </ul>
    </div>
  </nav>
</head>
