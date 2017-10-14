<?php

    function hashPassword($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }

    function verifyPassword($password , $hash){
        if(password_verify($password, $hash)) {
            return true;
        } else{
            return false;
        }
    }

?>