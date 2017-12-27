<?php
include 'module/session.php';

if(isLoginAs(array('admin','member'))){
    echo 'true';
}else{
    echo 'false';
}
?>