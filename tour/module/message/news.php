<?php
// news
if($msg == 'create_news_succ')
if(isset($_GET['id'])){
  $result = message('Success!','News has been created ','news.php?news_id='.$_GET['id'],'back to news page');
}else{
  $result = message('Request not found','','','');
}


if($msg == 'del_news_succ') $result = message('Success!','News has been deleted ','index.php','Go to home page');


if($msg == 'edit_news_succ')
if(isset($_GET['id'])){
  $result = message('Success!','News has been updated.','news.php?news_id='.$_GET['id'],'back to news page');
}else {
  $result = message('Request not found','','','');
}
 ?>
