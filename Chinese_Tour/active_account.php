<?php
include "db_config.php";

if(isset($_GET['id']) and isset($_GET['h'])){
    $id = $_GET['id'];
    $h = $_GET['h'];

    $sql = "SELECT * FROM member WHERE id = '$id' AND hash = '$h'";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    
    // can not SELECT from data base
    if(!$result){
        header("location: messege.php?msg=active_fail");
    }
    
    $count = mysqli_num_rows($result);
   if($count == 1){
       $objResult = mysqli_fetch_array($result);
           $active = $objResult['active'];
           if($active == 0){
               $sql = "UPDATE member SET active = 1 WHERE id = $id";
               $result = mysqli_query( $GLOBALS['conn'] , $sql );
           
               if($result){
                   header("location: messege.php?msg=active_succ");
               }else{
                   header("location: messege.php?msg=active_fail");
               }   
           }else{
               header("location: messege1.php?msg=active_already");
           }
       }else{
           header("location: messege2.php?msg=active_error");
       }
    }else{
       header("location: messege3.php?msg=active_error");
    }
?>