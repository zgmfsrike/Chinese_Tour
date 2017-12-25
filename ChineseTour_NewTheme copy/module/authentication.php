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

// isLoginAs(array('admin','member'))
    function isLoginAs($user_type){
        if(!isset($_SESSION['login_id'])){
            header('Location: message.php?msg=please_login');
        }
        $lenght = count($user_type);
        if($lenght == 0){
            echo 'no type is set';
//            return FALSE;
        }
        $i;
        for($i = 0; $i < $lenght; $i++){
            if(isset($_SESSION['user_type']) and strcasecmp($_SESSION['user_type'],$user_type[$i]) == 0){
                return TRUE;
            }
        }
        return FALSE;
    }
?>
