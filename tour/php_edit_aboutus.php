<?php
// error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
include 'module/session.php';

if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}

//-----------------------------Create news fucntion----------------------------------------------------//
if(isset($_POST['save'])){

    $about_en = addslashes($_POST['about_en']);
    $about_ch = addslashes($_POST['about_ch']);
    $about_th = addslashes($_POST['about_th']);

    $sql = "UPDATE page_about SET `english` = '$about_en',`chinese` = '$about_ch',`thai` = '$about_th' WHERE `name` = 'about_content'";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );

    if($result){
        header('Location: message.php?msg=success_update_announce');
    }else{
        header('Location: message.php?msg=error');
    }

}else{
    header('Location: message.php?msg=error1');
}
?>
