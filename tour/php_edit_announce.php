<?php
error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
include 'module/session.php';

if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}

//-----------------------------Create news fucntion----------------------------------------------------//
if(isset($_POST['save'])){
    
    $announce = addslashes($_POST['announce']);

    $sql = "UPDATE announcement SET `content` = '$announce' WHERE `name` = 'announce'";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    
    if($result){
        header('Location: message.php?msg=success_update_announce');
    }else{
        header('Location: message.php?msg=error');
    }

}else{
    header('Location: message.php?msg=error');
}
?>