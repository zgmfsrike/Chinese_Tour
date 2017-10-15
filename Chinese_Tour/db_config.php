<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_database = "tj";

    // create connection
    $conn = mysqli_connect($servername,$username,$password,$db_database);

    // check connection
    if(! $conn ) {
      die('Could not connect: ' . mysql_error());
    }
?>
