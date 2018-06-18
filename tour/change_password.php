<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin','member'))){
    header('Location: message.php?msg=please_login');
}

require 'module/language/init.php';
require 'module/language/lang_change_password.php';

$id = $_SESSION['login_id'];
//--------------------Link to another page -----------------------------------
$profile_page = "window.location.href='profile.php'";
$profile = 'profile';
$change_pass_func = "php_change_pass.php?id=".$id;
?>

<!DOCTYPE html>
<html>
    <?php
    $title = $string_change_password_title;
    include 'component/header.php';
    ?>
    <body>
        <div class="container">
            <div class="section"></div>
            <div class="row">
                <div class="col s12 l3">
                    <div class="collection">
                        <a href="profile.php" class="collection-item active amber"><?php echo $profile;?></a>
                        <!-- <a href="#" class="collection-item black-text">Purchase</a>
                        <a href="#" class="collection-item black-text">Record</a> -->
                    </div>
                </div>
                <div class="col s12 l9">
                    <h3><?php echo $string_change_password_change_password;?></h3>
                    <form action="<?php echo $change_pass_func; ?>" method="post" >
                        <div class="form-group">
                            <label class="control-label col-sm-8"><?php echo $string_change_password_password;?> <span class="red-text">*</span></label>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" minlength="4" maxlength="16" class="form-control" id="inputPassword" placeholder="<?php echo $string_change_password_password_placeholder;?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-8"><?php echo $string_change_password_new_password;?> <span class="red-text">*</span></label>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input required name="npassword" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="nPassword" placeholder="<?php echo $string_change_password_new_password_placeholder;?>" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-8"><?php echo $string_change_password_confirm_password;?> <span class="red-text">*</span></label>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input onkeyup="checknewPass(); return false;" type="password" class="form-control inputpass" name="cpassword" minlength="4" maxlength="16" id="cpassword" placeholder="<?php echo $string_change_password_new_password_placeholder;?>" required>
                                    <span id="confirmMessage" class="confirmMessage"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-3 col-sm-9 float-none"><br>
                                <button type="submit" class="btn green" value="save" name ="save"><?php echo $string_change_password_save;?></button>
                                <button type="button" value="Cancel" onclick="<?php echo $profile_page; ?>" class="btn red"><?php echo $string_change_password_cancle;?></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- /.container -->
        <?php
        include 'component/footer.php';
        ?>

        <!--end side menu body-->
        <script src="js/validate2.js"></script>
    </body>
</html>
