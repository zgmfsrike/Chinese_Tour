<?php
if($msg == 'session_expired') $message = message('Session expired','Please login','login.php','Login');
if($msg == 'please_login') $message = message('You are not login','Please login first.','login.php','Login');
if($msg == 'login_already') $message = message('You are already login','','','');
?>
