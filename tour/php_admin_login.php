<?php
session_start();
include 'db_config.php';
include "module/hashing.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = ''.$_POST['password'].'';

    $query = "SELECT * FROM administrator WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $objResult = mysqli_fetch_array($result);
        if ( verifyPassword($password,$objResult["password"]) ){
            $_SESSION['login_id'] = $objResult['id'];
            $_SESSION['login_firstname'] = $objResult['first_name'];
            $_SESSION['user_type'] = "admin";
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (60*30);
            header("location: index.php");
          }else{
              header("location: message.php?msg=login_invalid");
          }
      }else{
          header("location: message.php?msg=login_invalid");
      }
  }else{
      header("location: index.php");
  }
?>
