<?php
include 'db_config.php';
include 'module/session.php';
if(isLoginAs(array('admin','member'))){
    header('Location: message.php?msg=login_already');
}

require 'module/language/init.php';
require 'module/language/lang_login.php';
?>
<!DOCTYPE html>
<html>
    <?php
    include 'component/header.php';
    ?>
    <body>

        <!--Login-->
        <div class="container">
            <div class="row">
                <div class="section"></div><div class="section"></div>
                <div class="col s10  offset-s1 m8 offset-m2 l6 offset-l3 z-depth-1">
                    <div class="section"></div>
                    <h5 id="title" class="center black-text"><?php echo $string_login_login;?></h5>
                    <div class="container">
                        <form action="php_login.php" data-toggle="validator" method="post">
                            <div class="row">
                                <div class="input-field">
                                    <input onkeyup="ValidateUsername(this)" id="username" type="text" name="username" id="username" minlength="3" maxlength="16" required/>
                                    <label for="username"><?php echo $string_login_username;?><b class="red-text"> *</b></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field">
                                    <input onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" id="inputPassword"/>
                                    <label for="password"><?php echo $string_login_password;?><b class="red-text"> *</b></label>
                                </div>
                            </div>
                            <div class="row col s12 center">
                                <button type="submit" class="waves-effect waves-light btn orange col s12 l5" name="login" value="Login"><?php echo $string_login_login;?></button>
                                <div class="col l2"></div>
                                <button type="button" onclick="window.location.href='register.php'" class="col s12 l5 waves-effect waves-light btn amber" value="Register"><?php echo $string_login_register;?></button>
                                <div class="section"></div>
                                <div class="section"></div>
                                <div class="section"></div>
                                <!-- <a href="/password/reset">Forgot Your Password?</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="section"></div>
        </div>

        <!--Footer-->
        <?php
        include 'component/footer.php';
        ?>

    </body>
</html>
