<?php
    session_start();
    include('db_config.php');
    if(isset( $_SESSION['login_id'] )){
        $user_id = $_SESSION['login_id'];
    }else{
        header("Location: login.php");
    }

    $query = "SELECT * FROM member WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $objResult = mysqli_fetch_array($result);
    $username = $objResult['username'];

    echo "Hi ". $username ."!<br>";
    
?>

<a href="logout.php">logout</a>