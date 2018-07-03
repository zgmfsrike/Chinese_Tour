<?php

include 'db_config.php';

// check for post request
if(!isset($_POST['save'])){
  header('location: message.php?msg=unknown_request');
}
$tour_id = $_POST['tour_id'];
$sql_comment = "SELECT f.id FROM feedback f
INNER JOIN tour_round tr ON tr.tour_round_id = f.tour_round_id
INNER JOIN tour_".$_COOKIE['lang']." t on tr.tour_id = t.tour_id
WHERE t.tour_id =".$tour_id." AND f.filled_date != 0000-00-00";
$result_comment = mysqli_query($conn,$sql_comment);

$num_row =mysqli_num_rows($result_comment);
$counter = 1;
while ($show = mysqli_fetch_array($result_comment)) {
  $id = $show['id'];

  if(isset($_POST['enable_'.$id])){
    $enable = 1;
  }else{
    $enable = 0;
  }
  $sql_enable = "UPDATE `feedback` SET `enable`=$enable WHERE id = $id";
  $result_enable = mysqli_query($conn, $sql_enable);
  $counter++;
}







header('location: message.php?msg=edit_comment_success');


?>
