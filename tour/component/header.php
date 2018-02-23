<?php
// ====== LINK ======
$index = 'index.php';
$about_us = 'about_us.php';

$meeting ='#';
$incentive ='#';
$convension ='#';
$foxhibition ='#';
$business ='#';

$wechat = '#';
$tel = '#';
$mail ='mailto:chiangmaihongthai@hotmail.com';

$manage = 'manage.php';
$profile = 'profile.php';
$register = 'register.php';

$login = 'login.php';
$logout = 'logout.php';

if(isset($title) and $title == ""){
    $title = 'Chiang Mai Hong Thai Tour';
}

?>
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

    <title><?php echo "".$title;?></title>
</head>

<nav class="nav-extended">
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo center hide-on-med-and-down"><img src="images/logo400x300.png" width=40% height=40% alt="logo"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <a href="index.php" class="show-on-medium-and-down hide-on-large-only">Chiangmai HongThai</a>
        <div class="hide-on-med-and-down"><div class="section"></div>
        <a class='dropdown-button btn right amber' href='#' data-activates='dropdown2'>Language</a>
        <ul id='dropdown2' class='dropdown-content'>
          <li><a href="#!">Chinese</a></li>
          <li><a href="#!">English</a></li>
          <li><a href="#!">Thai</a></li>
        </ul>
        </div>



    </div>
    <div class="nav-wrapper hide-on-med-and-down"></div>
        <ul class="side-nav" id="mobile-demo">
            <li class="red darken-4"><div class="section"></div></li>
            <li class="red darken-4"><img src="images/logo400x300.png" width=40% height=40% alt="logo">
            <div class="divider"></div></li>
            <li><a href="<?php echo $index;?>">Home</a></li>
            <li><a href="<?php echo $meeting;?>">Meeting Tour</a></li>
            <li><a href="<?php echo $incentive;?>">Incentive Tour</a></li>
            <li><a href="<?php echo $convension;?>">Convension Tour</a></li>
            <li><a href="<?php echo $foxhibition;?>">Exhibition Tour</a></li>
            <li><a href="<?php echo $business;?>">Business Tour</a></li>
            <li><a href="<?php echo $about_us;?>">About Us</a></li>
            <li><div class="divider"></div></li>
            <?php
            if(isLoginAs(array('admin','member'))){
                if(isLoginAs(array('admin'))){
            ?>
            <li><a href="<?php echo $manage;?>">Manage</a></li>
            <li><a href="<?php echo $logout;?>">Logout</a></li>
            <?php
                }
                if(isLoginAs(array('member'))){
            ?>
            <li><a href="<?php echo $profile;?>"><?php echo $_SESSION['login_firstname'];?></a></li>
            <li><a href="<?php echo $logout;?>">Logout</a></li>
            <?php

                }
            }else{
            ?>
            <li><a href="<?php echo $login;?>">Log in</a></li>
            <li><a href="<?php echo $register;?>">Register</a></li>
            <?php
            }
            ?>

            <li><div class="divider"></div></li>
            <li><a class='dropdown-button btn center red darken-4' href='#' data-activates='dropdown1'>Language</a>
            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="#!">Chinese</a></li>
              <li><a href="#!">English</a></li>
              <li><a href="#!">Thai</a></li>
            </ul></li>
        </ul>


    <div class="nav-content red darken-3 hide-on-med-and-down">
        <ul class="tabs tabs-fixed-width tabs-transparent container">
            <li class="tab"><a target="_self" href="<?php echo $index;?>">Home</a></li>
            <li class="tab"><a target="_self" href="<?php echo $meeting;?>">Meeting Tour</a></li>
            <li class="tab"><a target="_self" href="<?php echo $incentive;?>">Incentive Tour</a></li>
            <li class="tab"><a target="_self" href="<?php echo $convension;?>">Convension Tour</a></li>
            <li class="tab"><a target="_self" href="<?php echo $foxhibition;?>">Exhibition Tour</a></li>
            <li class="tab"><a target="_self" href="<?php echo $business;?>">Business Tour</a></li>
            <li class="tab"><a target="_self" href="<?php echo $about_us;?>">About Us</a></li>
            <li style="border-left: 1px solid #fff; border-radius: 0; height:50%; margin-top:1%;" class="tab"></li>

            <!--PHP : Check Login-->
            <?php
            if(isLoginAs(array('admin','member'))){
                if(isLoginAs(array('admin'))){
            ?>
            <li class="tab"><a target="_self" href="<?php echo $manage;?>">Manage</a></li>
            <li class="tab"><a target="_self" href="<?php echo $logout;?>">Logout</a></li>
            <?php
                }
                if(isLoginAs(array('member'))){
            ?>
            <li class="tab"><a target="_self" href="<?php echo $profile;?>"><?php echo $_SESSION['login_firstname'];?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $logout;?>">Logout</a></li>
            <?php

                }
            }else{
            ?>
            <li class="tab"><a target="_self" href="<?php echo $login;?>">Log in</a></li>
            <li class="tab"><a target="_self" href="<?php echo $register;?>">Register</a></li>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>
