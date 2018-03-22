<?php
// *** LINK ***
$link_index = 'index.php';
$link_aboutus = 'about_us.php';

$link_meeting ='search_tour.php?tour_type=meeting';
$link_incentive ='search_tour.php?tour_type=incentive';
$link_convention ='search_tour.php?tour_type=convention';
$link_exhibition ='search_tour.php?tour_type=exhibition';
$link_business ='search_tour.php?tour_type=business';

$link_wechat = '#';
$link_tel = '#';
$link_mail ='contact.php';

$link_manage = 'manage.php';
$link_profile = 'profile.php';
$link_register = 'register.php';

$link_login = 'login.php';
$link_logout = 'logout.php';

// *** Content ***
require 'lang/language_switcher.php';

$lang = $_COOKIE['lang'];

switch($lang){
    case 'ch':
        $string_index = '主页';
        $string_meeting = '会议旅游';
        $string_incentive = '奖励旅游';
        $string_convention = '专题会晤旅游';
        $string_exhibition = '会展旅游';
        $string_business = '商务旅游';
        $string_aboutus = '关于我们';
        $string_login = '登录';
        $string_register = '注册';
        $string_logout = '登出';
        //login page
        $string_username = '用户名';
        $string_password ='密码';
        //about_us page
        $string_aboutus_topic = '清迈宏泰旅游公司商业领域';
        $string_contact = '联系方式';
        $string_wechat = '微信：591198421 or HTCE888';
        $string_tel = '电话号码：081-025-0351';
        $string_email = '邮箱：ChiangMaihongthai@hotmail.com';
        //register page
        $string_account_info ='账号信息';
        $string_confirm_password ='再次确认密码';
        $string_personal_info = '个人信息';
        $string_first_name = '姓氏';
        $string_middle_name ='名字的中间的那个字';
        $string_last_name = '名字的最后一个字';
        $string_birth = '出生日期';
        $string_occupation = '职业';
        $string_salary = '收入';
        $string_mail = '邮箱号';
        $string_country_code = '城市编码';
        $string_tel_number ='电话号码';
        $string_address = '地址';
        $string_city ='城市';
        $string_province = '省份';
        $string_zipcode = '邮政编码';
        $string_cancel = '取消';
        $string_save = '保存';


        break;
    case 'th':
        $string_index = 'หน้าหลัก';
        $string_meeting = 'Meeting Tour';
        $string_incentive = 'Incentive Tour';
        $string_convention = 'Convention Tour';
        $string_exhibition = 'Exhibition Tour';
        $string_business = 'Business Tour';
        $string_aboutus = 'เกี่ยวกับเรา';
        $string_login = 'ลงชื่อเข้าใช้';
        $string_register = 'สมัครสมาชิก';
        $string_logout = 'ออกจากระบบ';
        //login page
        $string_username = 'ชื่อผู้ใช้งาน';
        $string_password ='รหัสผ่าน';
        //about_us page
        $string_aboutus_topic = 'Chiangmai Hong Thai Business Consultant';
        $string_contact = 'ติดต่อเรา';
        $string_wechat = 'WeChat : 591198421 or HTCE888';
        $string_tel = 'โทร : 081-025-0351';
        $string_email = 'Email: chiangmaihongthai@hotmail.com';
        //register page
        $string_account_info ='ข้อมูลเกี่ยวกับบัญชี';
        $string_confirm_password ='ยืนยันรหัสผ่าน';
        $string_personal_info = 'ข้อมูลส่วนบุคคล';
        $string_first_name = 'ชื่อ';
        $string_middle_name ='ชื่อกลาง';
        $string_last_name = 'นามสกุล';
        $string_birth = 'วันเกิด';
        $string_occupation = 'อาชีพ';
        $string_salary = 'รายได้';
        $string_mail = 'E-mail';
        $string_country_code = 'รหัสประเทศ';
        $string_tel_number ='หมายเลขโทรศัพท์';
        $string_address = 'ที่อยุ่';
        $string_city ='เมือง';
        $string_province = 'จังหวัด';
        $string_zipcode = 'รหัสไปรษณีย์';
        $string_cancel = 'ยกเลิก';
        $string_save = 'บันทึก';

        break;
    case 'en':
    default:
        $string_index = 'Home';
        $string_meeting = 'Meeting Tour';
        $string_incentive = 'Incentive Tour';
        $string_convention = 'Convention Tour';
        $string_exhibition = 'Exhibition Tour';
        $string_business = 'Business Tour';
        $string_aboutus = 'About Us';
        $string_login = 'Sign In';
        $string_register = 'Register';
        $string_logout = 'Sign Out';
        //login page
        $string_username = 'Username';
        $string_password ='Password';
        //about_us page
        $string_aboutus_topic = 'Chiangmai Hong Thai Business Consultant';
        $string_contact = 'Contact us';
        $string_wechat = 'WeChat : 591198421 or HTCE888';
        $string_tel = 'Tel : 081-025-0351';
        $string_email = 'Email: chiangmaihongthai@hotmail.com';
        //register page
        $string_account_info ='Account information';
        $string_confirm_password ='Confirm password';
        $string_personal_info = 'Personal information';
        $string_first_name = 'First name';
        $string_middle_name ='Middle name';
        $string_last_name = 'Last name';
        $string_birth = 'Birthday';
        $string_occupation = 'Occupation';
        $string_salary = 'Salary';
        $string_mail = 'E-mail';
        $string_country_code = 'Country code';
        $string_tel_number ='Telephone Number';
        $string_address = 'Address';
        $string_city ='City';
        $string_province = 'Province';
        $string_zipcode = 'Zipcode';
        $string_cancel = 'Cancel';
        $string_save = 'Save';
}


if(isset($title) and $title == ""){
    $title = 'Chiang Mai Hong Thai Tour';
}else{
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
        <a class='dropdown-button btn right teal darken-3' href='#' data-activates='dropdown2'>Language</a>
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
        <li><a href="<?php echo $link_index;?>"><?php echo $string_index;?></a></li>
        <li><a href="<?php echo $link_meeting;?>"><?php echo $string_meeting;?></a></li>
        <li><a href="<?php echo $link_incentive;?>"><?php echo $string_incentive;?></a></li>
        <li><a href="<?php echo $link_convention;?>"><?php echo $string_convention;?></a></li>
        <li><a href="<?php echo $link_exhibition;?>"><?php echo $string_exhibition;?></a></li>
        <li><a href="<?php echo $link_business;?>"><?php echo $string_business;?></a></li>
        <li><a href="<?php echo $link_aboutus;?>"><?php echo $string_aboutus;?></a></li>
        <li><div class="divider"></div></li>
        <?php
        if(isLoginAs(array('admin','member'))){
            if(isLoginAs(array('admin'))){
        ?>
        <li><a href="<?php echo $link_manage;?>">Manage</a></li>
        <li><a href="<?php echo $link_logout;?>"><?php echo $string_logout;?></a></li>
        <?php
            }
            if(isLoginAs(array('member'))){
        ?>
        <li><a href="<?php echo $link_profile;?>"><?php echo $_SESSION['login_firstname'];?></a></li>
        <li><a href="<?php echo $link_logout;?>"><?php echo $string_logout;?></a></li>
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
            <li class="tab"><a target="_self" href="<?php echo $link_index;?>"><?php echo $string_index;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_meeting;?>"><?php echo $string_meeting;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_incentive;?>"><?php echo $string_incentive;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_convention;?>"><?php echo $string_convention;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_exhibition;?>"><?php echo $string_exhibition;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_business;?>"><?php echo $string_business;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_aboutus;?>"><?php echo $string_aboutus;?></a></li>
            <li style="border-left: 1px solid #fff; border-radius: 0; height:50%; margin-top:1%;" class="tab"></li>

            <!--PHP : Check Login-->
            <?php
            if(isLoginAs(array('admin','member'))){
                if(isLoginAs(array('admin'))){
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_manage;?>">Manage</a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_logout;?>"><?php echo $string_logout;?></a></li>
            <?php
                }
                if(isLoginAs(array('member'))){
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_profile;?>"><?php echo $_SESSION['login_firstname'];?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_logout;?>"><?php echo $string_logout;?></a></li>
            <?php

                }
            }else{
            ?>
            <li class="tab"><a target="_self" href="<?php echo $link_login;?>"><?php echo $string_login;?></a></li>
            <li class="tab"><a target="_self" href="<?php echo $link_register;?>"><?php echo $string_register;?></a></li>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>
