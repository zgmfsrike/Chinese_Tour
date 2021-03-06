<?php
// *** Content ***
require 'module/language_switcher.php';
require 'module/language/lang_header.php';
require 'module/string/string_header.php';
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

  <?php
  if(!isset($title)){
    $title = 'Chiang Mai Hong Thai Tour';
  }else if($title == ""){
    $title = 'Chiang Mai Hong Thai Tour';
  }
  ?>

  <title><?php echo "".$title;?></title>
</head>


<nav class="nav-extended">
  <div class="nav-wrapper">
    <a href="index.php" class="brand-logo center hide-on-med-and-down"><img src="images/logo400x300.png" width=40% height=40% alt="logo"></a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"><?php echo $icon_menu;?></i></a>
    <a href="index.php" class="show-on-medium-and-down hide-on-large-only"><?php echo $string_header_name;?></a>
    <div class="hide-on-med-and-down">
      <div class="section"></div>
      <a class='dropdown-button btn right teal darken-3' href='#' data-activates='dropdown2'><?php echo $string_header_lang; ?></a>
      <ul id='dropdown2' class='dropdown-content'>
        <li><a href="<?php echo $new_url.$x."lang=ch"; ?>"><?php echo $string_header_lang_chinese; ?></a></li>
        <li><a href="<?php echo $new_url.$x."lang=en"; ?>"><?php echo $string_header_lang_english; ?></a></li>
        <li><a href="<?php echo $new_url.$x."lang=th"; ?>"><?php echo $string_header_lang_thai; ?></a></li>
      </ul>
    </div>
  </div>

  <div class="nav-wrapper hide-on-med-and-down"></div>
  <ul class="side-nav" id="mobile-demo">
    <li class="red darken-4"><div class="section"></div></li>
    <li class="red darken-4"><img src="images/logo400x300.png" width=40% height=40% alt="logo"></li>
    <div class="divider"></div>
    <li><a href="<?php echo $link_index;?>"><?php echo $string_header_index;?></a></li>
    <li><a href="<?php echo $link_meeting;?>"><?php echo $string_header_meeting;?></a></li>
    <li><a href="<?php echo $link_incentive;?>"><?php echo $string_header_incentive;?></a></li>
    <li><a href="<?php echo $link_convention;?>"><?php echo $string_header_convention;?></a></li>
    <li><a href="<?php echo $link_exhibition;?>"><?php echo $string_header_exhibition;?></a></li>
    <li><a href="<?php echo $link_business;?>"><?php echo $string_header_business;?></a></li>
    <li><a href="<?php echo $link_about_us;?>"><?php echo $string_header_about;?></a></li>
    <li><div class="divider"></div></li>
    <?php
    if(isLoginAs(array('admin','member'))){
      if(isLoginAs(array('admin'))){
        ?>
        <li><a href="<?php echo $link_manage;?>"><?php echo $string_header_manage;?></a></li>
        <li><a href="<?php echo $link_logout;?>"><?php echo $string_header_logout;?></a></li>
        <?php
      }
      if(isLoginAs(array('member'))){
        ?>
        <li><a href="<?php echo $link_profile;?>"><?php echo $_SESSION['login_firstname'];?></a></li>
        <li><a href="<?php echo $link_logout;?>"><?php echo $string_header_logout;?></a></li>
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
    <li><a class='dropdown-button btn center red darken-4' href='#' data-activates='dropdown1'><?php echo $string_header_lang; ?></a>
      <ul id='dropdown1' class='dropdown-content'>
        <li><a href="<?php echo $new_url.$x."lang=ch"; ?>"><?php echo $string_header_lang_chinese; ?></a></li>
        <li><a href="<?php echo $new_url.$x."lang=en"; ?>"><?php echo $string_header_lang_english; ?></a></li>
        <li><a href="<?php echo $new_url.$x."lang=th"; ?>"><?php echo $string_header_lang_thai; ?></a></li>
      </ul>
    </li>


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
          <!-- <li class="tab"><a target="_self" href="<?php echo $link_manage;?>"><?php echo $string_header_manage;?></a></li> -->
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
<?php
if (isLoginAs(array('admin'))) {
  include 'component/manage.php';
}
?>
