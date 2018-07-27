<?php

include 'db_config.php';
$sql = "SELECT `time`, `reference_code`,(`time`< (NOW()-3000)) AS is_more_than_30_min FROM `booking_session`";
$result = mysqli_query($conn, $sql);


if($result){
  while ($show = mysqli_fetch_array($result)) {
    $reference_code = $show['reference_code'];
    $check_time = $show['is_more_than_30_min'];
    // echo $reference_code."<br />";
    // echo $check_time."<br />";
    if($check_time == 1){
      // echo "pass";
      $del_reserve_member = "DELETE FROM tour_round_member  WHERE  last_name ='' AND reference_code = '$reference_code'";
      $result_del = mysqli_query($conn, $del_reserve_member);


    }

  }
  $clear_all_session = "DELETE FROM `booking_session`";
  $result_clear = mysqli_query($conn, $clear_all_session);
}

?>
