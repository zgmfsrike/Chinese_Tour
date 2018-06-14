<?php
if($msg == 'edit') $result = message('Success!','You information has been update','profile.php','Go to profile page');
// ++ Change mail
if($msg == 'email_change_succ') $result = message('Success!','Your email has been changed.','profile.php','Go to profile page');
if($msg == 'email_change') $result = message('Email confirmation is already send','Please confirm again in your email.','profile.php','Go to profile page');
if($msg == 'email_change_already') $result = message('Sorry!','Your email had already changed.','profile.php','Go to profile page');
if($msg == 'email_fail') $result = message('Fail to change email!','Please try again later.','profile.php','Go to profile page');
if($msg == 'email_error') $result = message('Error!','Request does not match, please check link again.','profile.php','Go to profile page');
if($msg == 'email_old') $result = message('Sorry!','This is your current email, please try again.','','');
if($msg == 'email_not_match') $result = message('Sorry!','Your email is not match, please try again','','');
if($msg == 'email_already_use') $result = message('Sorry!','Your email is already used , please try again','','');
// ++Change Password
if($msg == 'incorrect_password') $result = message('Sorry!','Password is incorrect, please try again.','','');
if($msg == 'change_password_succ') $result = message('Success!','Your password has been changed.','profile.php','Go to profile page');
if($msg == 'change_password_fail') $result = message('Sorry!','Something went wrong, please try again.','','');
if($msg == 'change_password_fail_confirm_password') $result = message('Sorry!','Confirm password does not match.','','');
if($msg == 'email_send_succ') $result = message('Success!','E-mail has already send to member ','index.php','Go to home page');
 ?>
