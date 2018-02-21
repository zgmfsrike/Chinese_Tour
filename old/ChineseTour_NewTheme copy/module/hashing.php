<?php

    function hashPassword($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }

    function verifyPassword($password , $hash){
        return password_verify($password, $hash);
    }

?>
