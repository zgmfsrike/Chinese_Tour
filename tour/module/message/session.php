<?php
if($msg == 'session_expired') $result = message('Session expired','Please login','login.php','Login');
if($msg == 'please_login') $result = message('You are not login','Please login first.','login.php','Login');
if($msg == 'login_already') $result = message('You are already login','','','');
?>
