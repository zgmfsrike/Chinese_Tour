<?php
include("mailer.php");
            $to       =   "nayzaa2010@hotmail.com";
            $subject  =   "Hello";
            $message  =   "hello <i>how are you.</i>";
            $name     =   "Mail tester";
            $mailsend =   sendMail($to,$subject,$message,$name);
            if($mailsend==1){
                echo '<h2>email sent.</h2>';
            }
            else{
                echo '<h2>There are some issue.</h2>';
            }
?>