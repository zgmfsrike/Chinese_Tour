<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_database = "chinese_tour";

// create connection
$conn = mysqli_connect($servername,$username,$password,$db_database);
mysqli_set_charset($conn,"utf8");

// check connection
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}
?>