<?php
if(isset($_POST['save'])){

    if(isset($_SESSION['login_id'])){
	   $id = $_SESSION['login_id'];
	   $password = $_POST['password'];
    
        $query = "SELECT * FROM member WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
    
        if($count == 1){
            $objResult = mysqli_fetch_array($result);
            if(verifyPassword($password,$objResult["password"])){
                $npassword = $_POST["npassword"];
                $cpassword = $_POST['cpassword'];
                if($npassword == $cpassword){
                    $npassword = hashPassword($npassword);
                    $query= "UPDATE `member` SET `password`= '$npassword' WHERE id = $id ";
                    $result = mysqli_query( $GLOBALS['conn'] , $query);
                    if($result){
                        header("location: message.php?msg=change_password_succ");
                    }else{
                        header("location: message.php?msg=change_password_fail");
                    }
                }else{
                    header("location: message.php?msg=change_password_fail_confirm_password");
                }
            }else{
                header("location: message.php?msg=incorrect_password");
            }
        }else{
            header("location: message.php?msg=change_password_fail");
        }
    }else{
        header("location: message.php?msg=change_password_fail");
    }
}
?>