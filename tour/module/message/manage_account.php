<?php
if($msg == 'edit') $message = message('Success!','You information has been update','profile.php','Go to profile page');
// ++ Change mail
if($msg == 'email_change_succ') $message = message('Success!','Your email has been changed.','profile.php','Go to profile page');
if($msg == 'email_change') $message = message('Email confirmation is already send','Please confirm again in your email.','profile.php','Go to profile page');
if($msg == 'email_change_already') $message = message('Sorry!','Your email had already changed.','profile.php','Go to profile page');
if($msg == 'email_fail') $message = message('Fail to change email!','Please try again later.','profile.php','Go to profile page');
if($msg == 'email_error') $message = message('Error!','Request does not match, please check link again.','profile.php','Go to profile page');
if($msg == 'email_old') $message = message('Sorry!','This is your current email, please try again.','','');
if($msg == 'email_not_match') $message = message('Sorry!','Your email is not match, please try again','','');
if($msg == 'email_already_use') $message = message('Sorry!','Your email is already used , please try again','','');
// ++Change Password
if($msg == 'incorrect_password') $message = message('Sorry!','Password is incorrect, please try again.','','');
if($msg == 'change_password_succ') $message = message('Success!','Your password has been changed.','profile.php','Go to profile page');
if($msg == 'change_password_fail') $message = message('Sorry!','Something went wrong, please try again.','','');
if($msg == 'change_password_fail_confirm_password') $message = message('Sorry!','Confirm password does not match.','','');
if($msg == 'email_send_succ') $message = message('Success!','E-mail has already send to member ','index.php','Go to home page');
 ?>
