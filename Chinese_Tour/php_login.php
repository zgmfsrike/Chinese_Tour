<?php
session_start();

include "db_config.php";
include "module/hashing.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = ''.$_POST['password'].'';

    $query = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $objResult = mysqli_fetch_array($result);
        if ( verifyPassword($password,$objResult["password"]) ){
            $active = $objResult['active'];
            if ($active == 1){
                $_SESSION['login_id'] = $objResult['id'];
                $_SESSION['login_firstname'] = $objResult['first_name'];
                $_SESSION['user_type'] = "member";
                $_SESSION['start'] = time(); // Taking now logged in time.
                // Ending a session in 30 minutes from the starting time.
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                header("location: index.php");
            }else{
                // not confirmed
                header("location: messege.php?msg=not_active");
            }
        }else{
            header("location: messege.php?msg=login_invalid");
        }
    }else{
        header("location: messege.php?msg=login_invalid");
    }
}
?>
