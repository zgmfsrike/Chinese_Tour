<?php
include "db_config.php";

if(isset($_GET['id']) and isset($_GET['u']) and isset($_GET['m']) ){
    $id = $_GET['id'];
    $u = $_GET['u'];
    $m = $_GET['m'];


    $sql = "SELECT * FROM member WHERE id = '$id'";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    if(!$result){
        msg("<h1>Sorry!</h1><h3>Something went wrong, please try again later.</h3>");
    }
    $count = mysqli_num_rows($result);

    if($count == 1){
        $objResult = mysqli_fetch_array($result);
        $email = $objResult['email'];


        if($email == $m){
            //  msg("<h1>Sorry!</h1><h3>Your email had already changed</h3>");
            header("location: message.php?msg=email_change_already");
        }else{
            //  $sql = "UPDATE member SET active = 1 WHERE id = $id";
            $sql= "UPDATE `member` SET `email`='$m' WHERE id = $id   ";
            $result = mysqli_query( $GLOBALS['conn'] , $sql );

            if($result){
                // msg("<h1>Thank you!</h1><h3>Your email has been changed</h3>");
                header("location: message.php?msg=email_change_succ");
            }else{
                //  msg("<h1>Sorry!</h1><h3>Something went wrong, please try again later.</h3>");
                header("location: message.php?msg=email");
            }
        }
    }else{
        //  msg("<h1>Error!</h1><h3>Request does not match, please check link again.</h3>");
        header("location: message.php?msg=email_error");
    }
}else{
    // msg("<h1>Error!</h1><h3>Request does not match, please check link again.</h3>");
    header("location: message.php?msg=email_error");
}

?>
