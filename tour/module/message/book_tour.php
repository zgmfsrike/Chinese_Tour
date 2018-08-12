<?php
// Book tour
if($msg ==  'session_book_expired') $result = message('Session book tour expired','Please try again','search_tour.php','');
if($msg == 'book_tour_succ') $result =  message('Success!','Send e-mail to member complete','booking_history.php','Go to home book status page');
if($msg == 'error_booking') $result =  message('Something went wrong','Please try again.','index.php','');
 ?>
