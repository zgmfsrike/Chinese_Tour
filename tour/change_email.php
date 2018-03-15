<?php
include 'db_config.php';
include('module/session.php');
if(!isLoginAs(array('admin','member'))){
    header('Location: message.php?msg=please_login');
}
//--------------------Link to another page -----------------------------------
$profile_page = "window.location.href='profile.php'";
$change_mail_func = "php_change_mail.php";
?>
<!DOCTYPE html>
<html>
    <?php
    $title = "Change Email";
    include 'component/header.php';
    ?>
    <body>
        <div class="container">
            <div class="section"></div>
            <div class="row">
                <div class="col s12 l3">
                    <div class="collection">
                        <a href="profile.php" class="collection-item active amber">Profile</a>
                        <a href="#" class="collection-item black-text">Purchase</a>
                        <a href="#" class="collection-item black-text">Record</a>
                    </div>
                </div>
                <div class="col s12 l9">

                    <h3>Change Email</h3>
                    <form action="<?php echo $change_mail_func; ?>" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-8">Email  <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input onkeyup="checkMail(); return false;" onfocusout="checkMail(); return false;" onchange="email_validate(this.value);" type="email" class="form-control" name="email" id="email" placeholder="Enter your new Email" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-8">Confirm Email <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input onkeyup="checkMail(); return false;" onfocusout="checkMail(); return false;" onchange="email_validate(this.value);" type="email" class="form-control" name="confirm_email" id="confirm_email" placeholder="confirm your Email"  required>
                                </div>
                                <span id="confirmMessage" class="confirmMessage"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-3 col-sm-9 float-none"><br>
                                <button type="submit" class="btn waves-effect waves-light green" value="save" name ="save">Save</button>
                                <button type="button" value="Cancel" onclick="<?php echo $profile_page; ?>" class="btn waves-effect waves-light red">Cancle</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <?php
        include 'component/footer.php';
        ?>
    </body>
</html>
