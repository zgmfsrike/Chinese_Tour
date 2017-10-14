<?php
include "database/db_config.php";
include "module/hashing.php";
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = '' . $_POST['password'] . '';

    $query = "SELECT * FROM kuylai WHERE username = '$username'";
    $select_user_query = mysqli_query($conn, $query);

    $result = mysqli_fetch_array($select_user_query,MYSQLI_ASSOC);
    $count = mysqli_num_rows($select_user_query);

    if($count == 1){
      $hash_row = $result['password'];
      $hash = '' . $hash_row[0] . '';
      $id = $row['id'];
      if ( verifyPassword($password,$hash) ){
          $_SESSION['login_id'] = $id[0];
          header("location: login1.html");
      }else{
        header("location: ล๊อคอินไม่ผ่านสัส.html");
      }
    }else{
        $error = "Your Login Name or Password is invalid";
        header("location: login.html");
    }
    //
    // $id = $row['id'];
    // echo 'id = ' . $id;
}

?>
