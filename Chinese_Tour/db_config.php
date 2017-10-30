<?php
    $servername = "localhost";
    $username = "root";
//    $password = "7744536";
    $password = "";
    $db_database = "chinese_tour";

    // create connection
    $conn = mysqli_connect($servername,$username,$password,$db_database);

    // check connection
    if(! $conn ) {
      die('Could not connect: ' . mysql_error());
    }
?>
