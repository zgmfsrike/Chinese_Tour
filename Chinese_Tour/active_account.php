<?php
include "db_config.php";

    $id = $_GET['id'];
    $u = $_GET['u'];

    $sql = "SELECT * FROM member WHERE id = $id";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    $count = mysqli_num_rows($result);

   if($count == 1){
       
       $objResult = mysqli_fetch_array($result);
       $username = $username[0];
       $username = md5($objResult['username']);
       
       echo "$username<br>$u";
       
       if($u == $username){
           
           $active = $objResult['active'];
           if($active = 1){
               $sql = "UPDATE member SET active = 1 WHERE id = $id";
               $result = mysqli_query( $GLOBALS['conn'] , $sql );
           
               if($result){
                   echo "success";
               }else{
                   echo "no";
               }   
           }
       }else{
           echo "u != username";
       }
    }else{
        // This link has no longer valid
        header("location: index.php");
    }


?>