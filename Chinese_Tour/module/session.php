<?php
    session_start();
    include('db_config.php');
    if(isset( $_SESSION['login_id'] )){
        $user_id = $_SESSION['login_id'];
    }else{
        header("Location: index.php");
    }

   $ses_sql = mysqli_query($connection,"SELECT * FROM users WHERE id = '{$user_id}' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
?>