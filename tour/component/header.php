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

    <?php 
    if(isset($title) and $title == ""){
        $title = 'Chiang Mai Hong Thai Tour';
    }else{
        $title = 'Chiang Mai Hong Thai Tour';
    }
    ?>

    <title><?php echo "".$title;?></title>
</head>

<?php
// *** LINK ***
$link_index = 'index.php';
$link_about_us = 'about_us.php';

$link_meeting ='#';
$link_incentive ='#';
$link_convention ='#';
$link_exhibition ='#';
$link_business ='#';

$link_wechat = '#';
$link_tel = '#';
$link_mail ='mailto:chiangmaihongthai@hotmail.com';

$link_manage = 'manage.php';
$link_profile = 'profile.php';
$link_register = 'register.php';

$link_login = 'login.php';
$link_logout = 'logout.php';

// *** Content ***
require 'lang/language_switcher.php';

$lang = $_COOKIE['lang'];

switch($lang){
    case 'en': 
        $lang = 'english';
        break;
    case 'ch': 
        $lang = 'chinesse';
        break;
    case 'th': 
        $lang = 'thai';
        break;
    default:
        $lang = 'english';
}

$sql= "SELECT name,$lang FROM page_header";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $content = $row[$lang];
        switch($row['name']){
            case 'home':
                $string_index = $content;
                break;
            case 'meeting':
                $string_meeting = $content;
                break;
            case 'incentive':
                $string_incentive = $content;
                break;
            case 'convention':
                $string_convention = $content;
                break;
            case 'exhibition':
                $string_exhibition = $content;
                break;
            case 'business':
                $string_business = $content;
                break;
            case 'about':
                $string_about = $content;
                break;
            case 'login':
                $string_login = $content;
                break;
            case 'register':
                $string_register = $content;
                break;
        }
    }
} else {
    //    echo "0 results";
    header('message.php');
}


$sql= "SELECT  FROM ";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

?>

<nav class="nav-extended">
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo center hide-on-med-and-down"><img src="images/logo400x300.png" width=40% height=40% alt="logo"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <a href="index.php" class="show-on-medium-and-down hide-on-large-only">Chiangmai HongThai</a>
        <div class="hide-on-med-and-down"><div class="section"></div>
            <a class='dropdown-button btn right teal darken-3' href='#' data-activates='dropdown2'>Language</a>
            <ul id='dropdown2' class='dropdown-content'>
                <li><a href="<?php echo $new_url.$x."lang=ch"; ?>">Chinese</a></li>
                <li><a href="<?php echo $new_url.$x."lang=en"; ?>">English</a></li>
                <li><a href="<?php echo $new_url.$x."lang=th"; ?>">Thai</a></li>
            </ul>
        </div>



    </div>
    <div class="nav-wrapper hide-on-med-and-down"></div>
    <ul class="side-nav" id="mobile-demo">
        <li class="red darken-4"><div class="section"></div></li>
        <li class="red darken-4"><img src="images/logo400x300.png" width=40% height=40% alt="logo">
            <div class="divider"></div></li>
        <li><a href="<?php echo $link_index;?>"><?php echo $string_index;?></a></li>
        <li><a href="<?php echo $link_meeting;?>"><?php echo $string_meeting;?></a></li>
        <li><a href="<?php echo $link_incentive;?>"><?php echo $string_incentive;?></a></li>
        <li><a href="<?php echo $link_convention;?>"><?php echo $string_convention;?></a></li>
        <li><a href="<?php echo $link_exhibition;?>"><?php echo $string_exhibition;?></a></li>
        <li><a href="<?php echo $link_business;?>"><?php echo $string_business;?></a></li>
        <li><a href="<?php echo $link_about_us;?>"><?php echo $string_about;?></a></li>
        <li><div class="divider"></div></li>
        <?php
        if(isLoginAs(array('admin','member'))){
            if(isLoginAs(array('admin'))){
        ?>
        <li><a href="<?php echo $link_manage;?>">Manage</a></li>
        <li><a href="<?php echo $link_logout;?>">Logout</a></li>
        <?php
            }
            if(isLoginAs(array('member'))){
        ?>
        <li><a href="<?php echo $link_profile;?>"><?php echo $_SESSION['login_firstname'];?></a></li>
        <li><a href="<?php echo $link_logout;?>">Logout</a></li>
        <?php

            }
        }else{
        ?>
        <li><a href="<?php echo $link_login;?>"><?php echo $string_login;?></a></li>
        <li><a href="<?php echo $link_register;?>"><?php echo $string_register;?></a></li>
        <?php
        }
        ?>

        <li><div class="divider"></div></li>
        <li><a class='dropdown-button btn center red darken-4' href='#' data-activates='dropdown1'>Language</a>
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="<?php echo $new_url.$x."lang=ch"; ?>">Chinese</a></li>
                <li><a href="<?php echo $new_url.$x."lang=en"; ?>">English</a></li>
                <li><a href="<?php echo $new_url.$x."lang=th"; ?>">Thai</a></li>
            </ul></li>
    </ul>


    <div class="nav-content red darken-3 hide-on-med-and-down">
        <ul class="tabs tabs-fixed-width tabs-transparent container">
            <li class="tab"><a target="_self" href="<?php echo $link_index;?>"><?php echo $string_index;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_meeting;?>"><?php echo $string_meeting;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_incentive;?>"><?php echo $string_incentive;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_convention;?>"><?php echo $string_convention;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_exhibition;?>"><?php echo $string_exhibition;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_business;?>"><?php echo $string_business;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_about_us;?>"><?php echo $string_about;?></a></li>
            <li style="border-left: 1px solid #fff; border-radius: 0; height:50%; margin-top:1%;" class="tab"></li>

            <!--PHP : Check Login-->
            <?php
            if(isLoginAs(array('admin','member'))){
                if(isLoginAs(array('admin'))){
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_manage;?>">Manage</a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_logout;?>">Logout</a></li>
            <?php
                }
                if(isLoginAs(array('member'))){
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_profile;?>"><?php echo $_SESSION['login_firstname'];?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_logout;?>">Logout</a></li>
            <?php

                }
            }else{
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_login;?>">Log in</a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_register;?>">Register</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
