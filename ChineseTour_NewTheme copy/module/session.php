<?php
session_start();
$now = time();
if(isset($_SESSION['expire'])){
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header('location: message.php?msg=session_expired');
    }else{
      $_SESSION['expire'] = $now + (60*30);
    }
}

include 'authentication';
?>
