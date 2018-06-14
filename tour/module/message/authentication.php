<?php
if($msg == 'unauthorized') $result = message('Unauthorized','','','');
if($msg == 'login_invalid') $result = message('Login fail','Username or Password are invalid.','','Back to Login page');
if($msg == 'not_active') $result = message('Login fail','Please active your account from your e-mail.','','Back to Login page');
if($msg == 'reg_succ') $result = message('Registration Success!','Please active your account from your e-mail.','index.php','Go to homepage');
if($msg == 'reg_fail_confirm_password') $result = message('Register fail!','Confirm password does not match.','','');
if($msg == 'reg_fail_username') $result = message('Register fail!','This username is already used','','');
if($msg == 'reg_fail_email') $result = message('Register fail!','This email address is already used','','');
// ++active_account
if($msg == 'active_succ') $result = message('Thank you!','account has been actived','index.php','Go to home page');
if($msg == 'active_fail') $result = message('Fail to acctive !','Please try again later.','index.php','Go to home page');
if($msg == 'active_already') $result = message('Sorry!','Your account had already actived.','index.php','Go to home page');
if($msg == 'active_error') $result = message('Error!','Request does not match, please check link again.','index.php','Go to home page');
?>
