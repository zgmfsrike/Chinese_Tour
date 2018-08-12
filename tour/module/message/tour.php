<?php
// TOUR
if($msg == 'create_tour_succ')
if(isset($_GET['id'])){
  $result = message('Success!','Create tour successfully','tour.php?id='.$_GET['id'],'Back to tour page');
}else{
  $result = message('Request not found','','','');
}

if($msg == 'delete_tour_succ') $result = message('Success!','Deleting tour successfully','search_all_tour.php','Go to list tour page');

if($msg == 'edit_tour_succ')
if(isset($_GET['id'])){
  $result = message('Success!','Editing tour successfully','tour.php?id='.$_GET['id'],'Back to tour page');
}else{
  $result = message('Request not found','','','');
}

if($msg == 'tour_not_found')$result = message('Sorry!','Tour not found.','index.php','Go to home page');
 ?>
