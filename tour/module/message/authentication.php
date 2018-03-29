<?php
if($msg == 'unauthorized') $message = message('Unauthorized','','','');
if($msg == 'login_invalid') $message = message('Login fail','Username or Password are invalid.','','Back to Login page');
if($msg == 'not_active') $message = message('Login fail','Please active your account from your e-mail.','','Back to Login page');
if($msg == 'reg_succ') $message = message('Registration Success!','Please active your account from your e-mail.','index.php','Go to homepage');
if($msg == 'reg_fail_confirm_password') $message = message('Register fail!','Confirm password does not match.','','');
if($msg == 'reg_fail_username') $message = message('Register fail!','This username is already used','','');
if($msg == 'reg_fail_email') $message = message('Register fail!','This email address is already used','','');
// ++active_account
if($msg == 'active_succ') $message = message('Thank you!','account has been actived','index.php','Go to home page');
if($msg == 'active_fail') $message = message('Fail to acctive !','Please try again later.','index.php','Go to home page');
if($msg == 'active_already') $message = message('Sorry!','Your account had already actived.','index.php','Go to home page');
if($msg == 'active_error') $message = message('Error!','Request does not match, please check link again.','index.php','Go to home page');
?>
