<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_database = "chinese_tour";

    // create connection
    $conn = mysqli_connect($servername,$username,$password,$db_database);

    // check connection
    if(! $conn ) {
      die('Could not connect: ' . mysql_error());
    }
?>

/*
        $servername = "localhost";
        $username = "chiang41_admin";
        $password = "chiang41_root";
        $db_database = "chiang41_chinesetour";

        // create connection
        $conn = mysqli_connect($servername,$username,$password,$db_database);

        // check connection
        if(! $conn ) {
          die('Could not connect: ' . mysql_error());
        }
        */
