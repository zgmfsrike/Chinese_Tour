<?php
include "db_config.php";
include "module/hashing.php";
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = ''.$_POST['password'].'';

    $query = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $objResult = mysqli_fetch_array($result);
        if ( verifyPassword($password,$objResult["password"]) ){
            $_SESSION['login_id'] = $objResult['id'];
            $active = $objResult['active'];
            if ($active == 1){
                // confirmed
                header("location: index.html");
            }else{
                // not confirmed
                header("location: unconfirmed.html");
            }
        }else{
            header("location: fail.html");
        }
    }else{
//        $error = "Your Login Name or Password is invalid";
        header("location: login.html");
    }
}

?>
