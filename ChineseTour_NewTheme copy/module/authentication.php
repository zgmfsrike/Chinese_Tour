<?php
    // check login session exist
    function isLogin(){
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

    function isNotLogin(){
        if(isset($_SESSION['login_id'])){
            header('Location: message.php?msg=login_already');
        }
    }

    function isAdmin(){
      if(isset($_SESSION['user_type']) and $_SESSION['user_type'] != "admin"){
          header('Location: index.php');
      }
    }
?>
