<?php
// file uploaded
if($msg == 'not_image') $result = message('Sorry!','Only jpg, gif, and png files are allowed. ','index.php','Go to home page');
if($msg == 'not_pdf') $result = message('Sorry!','Only pdf file are allowed. ','','Back');
if($msg == 'uploadSucc') $result = message('Success!',' The file has been uploaded.','index.php','Go to home page');
if($msg == 'uploadNotSucc') $result = message('Sorry, your file was not uploaded.','Please check neither your file is too large, nor your file type is wrong (Only JPG, JPEG, PNG & GIF files are allowed).','index.php','Go to home page');
 ?>
