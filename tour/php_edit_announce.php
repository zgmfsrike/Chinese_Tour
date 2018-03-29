<?php
// error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
include 'module/session.php';

if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}

//-----------------------------Create news fucntion----------------------------------------------------//
if(isset($_POST['save'])){

    $announce_en = addslashes($_POST['announce_en']);
    $announce_ch = addslashes($_POST['announce_ch']);
    $announce_th = addslashes($_POST['announce_th']);

    $sql = "UPDATE page_index SET `english` = '$announce_en',`chinese` = '$announce_ch',`thai` = '$announce_th' WHERE `name` = 'announcement_content'";
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
