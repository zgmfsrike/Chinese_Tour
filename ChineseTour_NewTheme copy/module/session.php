<?php
    session_start();
    include('db_config.php');

    $now = time();
if(isset($_SESSION['expire'])){
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header('location: message.php?msg=session_expired');
    }
}

    // check login session exist
    function requireLogin(){
        if(!isset($_SESSION['login_id'])){
            header('Location: message.php?msg=please_login');
        }


        // check login session expire
//        $now = time(); // Checking the time now when home page starts.
//        if ($now > $_SESSION['expire'] && isset($_SESSION['expire'])) {
//            session_destroy();
//            header('location: message.php?msg=session_expired');
//        }
    }

    function noLogin(){
        if(isset($_SESSION['login_id'])){
            header('Location: message.php?msg=login_already');
        }
    }
?>
