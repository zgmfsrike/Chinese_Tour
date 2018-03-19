<?php
// *** LINK ***
$link_index = 'index.php';
$link_about_us = 'about_us.php';

$link_meeting ='message.php?msg=under_construction';
$link_incentive ='message.php?msg=under_construction';
$link_convention ='message.php?msg=under_construction';
$link_exhibition ='message.php?msg=under_construction';
$link_business ='message.php?msg=under_construction';

$link_wechat = '#';
$link_tel = '#';
$link_mail ='mailto:chiangmaihongthai@hotmail.com';

$link_manage = 'manage.php';
$link_profile = 'profile.php';
$link_register = 'register.php';

$link_login = 'login.php';
$link_logout = 'logout.php';

// *** Content ***
require 'module/language_switcher.php';
require 'module/language/lang_header.php';
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
<<<<<<< HEAD
=======

    <?php
    if(!isset($title)){
        $title = 'Chiang Mai Hong Thai Tour';
    }else if($title == ""){
        $title = 'Chiang Mai Hong Thai Tour';
    }
    ?>

>>>>>>> language
    <title><?php echo "".$title;?></title>
</head>


<nav class="nav-extended">
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo center hide-on-med-and-down"><img src="images/logo400x300.png" width=40% height=40% alt="logo"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <a href="index.php" class="show-on-medium-and-down hide-on-large-only">Chiangmai HongThai</a>
        <div class="hide-on-med-and-down"><div class="section"></div>
        <a class='dropdown-button btn right teal darken-3' href='#' data-activates='dropdown2'>Language</a>
        <ul id='dropdown2' class='dropdown-content'>
          <li><a href="#!">中文</a></li>
          <li><a href="#!">English</a></li>
          <li><a href="#!">ไทย</a></li>
        </ul>
        </div>
    </div>

    <div class="nav-wrapper hide-on-med-and-down"></div>
        <ul class="side-nav" id="mobile-demo">
            <li class="red darken-4"><div class="section"></div></li>
            <li class="red darken-4"><img src="images/logo400x300.png" width=40% height=40% alt="logo">
            <div class="divider"></div></li>
<<<<<<< HEAD
        <li><a href="<?php echo $link_index;?>"><?php echo $string_index;?></a></li>
        <li><a href="<?php echo $link_meeting;?>"><?php echo $string_meeting;?></a></li>
        <li><a href="<?php echo $link_incentive;?>"><?php echo $string_incentive;?></a></li>
        <li><a href="<?php echo $link_convention;?>"><?php echo $string_convention;?></a></li>
        <li><a href="<?php echo $link_exhibition;?>"><?php echo $string_exhibition;?></a></li>
        <li><a href="<?php echo $link_business;?>"><?php echo $string_business;?></a></li>
        <li><a href="<?php echo $link_aboutus;?>"><?php echo $string_aboutus;?></a></li>
=======
        <li><a href="<?php echo $link_index;?>"><?php echo $string_header_index;?></a></li>
        <li><a href="<?php echo $link_meeting;?>"><?php echo $string_header_meeting;?></a></li>
        <li><a href="<?php echo $link_incentive;?>"><?php echo $string_header_incentive;?></a></li>
        <li><a href="<?php echo $link_convention;?>"><?php echo $string_header_convention;?></a></li>
        <li><a href="<?php echo $link_exhibition;?>"><?php echo $string_header_exhibition;?></a></li>
        <li><a href="<?php echo $link_business;?>"><?php echo $string_header_business;?></a></li>
        <li><a href="<?php echo $link_about_us;?>"><?php echo $string_header_about;?></a></li>
>>>>>>> language
        <li><div class="divider"></div></li>
        <?php
        if(isLoginAs(array('admin','member'))){
            if(isLoginAs(array('admin'))){
        ?>
        <li><a href="<?php echo $link_manage;?>">Manage</a></li>
<<<<<<< HEAD
        <li><a href="<?php echo $link_logout;?>"><?php echo $string_logout;?></a></li>
=======
        <li><a href="<?php echo $link_logout;?>"><?php echo $string_header_logout;?></a></li>
>>>>>>> language
        <?php
            }
            if(isLoginAs(array('member'))){
        ?>
        <li><a href="<?php echo $link_profile;?>"><?php echo $_SESSION['login_firstname'];?></a></li>
<<<<<<< HEAD
        <li><a href="<?php echo $link_logout;?>"><?php echo $string_logout;?></a></li>
=======
        <li><a href="<?php echo $link_logout;?>"><?php echo $string_header_logout;?></a></li>
>>>>>>> language
        <?php

                }
            }else{
            ?>
            <li><a href="<?php echo $login;?>">Log in</a></li>
            <li><a href="<?php echo $register;?>">Register</a></li>
            <?php
            }
        }else{
        ?>
        <li><a href="<?php echo $link_login;?>"><?php echo $string_header_login;?></a></li>
        <li><a href="<?php echo $link_register;?>"><?php echo $string_header_register;?></a></li>
        <?php
        }
        ?>

        <li><div class="divider"></div></li>
        <li><a class='dropdown-button btn center red darken-4' href='#' data-activates='dropdown1'>Language</a>
            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="#!">中文</a></li>
              <li><a href="#!">English</a></li>
              <li><a href="#!">ไทย</a></li>
            </ul></li>


        </ul>


    <div class="nav-content red darken-3 hide-on-med-and-down">
        <ul class="tabs tabs-fixed-width tabs-transparent container">
            <li class="tab"><a target="_self" href="<?php echo $link_index;?>"><?php echo $string_header_index;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_meeting;?>"><?php echo $string_header_meeting;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_incentive;?>"><?php echo $string_header_incentive;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_convention;?>"><?php echo $string_header_convention;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_exhibition;?>"><?php echo $string_header_exhibition;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_business;?>"><?php echo $string_header_business;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_about_us;?>"><?php echo $string_header_about;?></a></li>
            <li style="border-left: 1px solid #fff; border-radius: 0; height:50%; margin-top:1%;" class="tab"></li>

            <!--PHP : Check Login-->
            <?php
            if(isLoginAs(array('admin','member'))){
                if(isLoginAs(array('admin'))){
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_manage;?>">Manage</a></li>
            <?php
                }
                if(isLoginAs(array('member'))){
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_profile;?>"><?php echo $_SESSION['login_firstname'];?></a></li>
            <?php
                }
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_logout;?>"><?php echo $string_header_logout;?></a></li>
            <?php
            }else{
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_login;?>"><?php echo $string_header_login;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_register;?>"><?php echo $string_header_register;?></a></li>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>
