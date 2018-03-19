<?php
include('module/session.php');
include 'db_config.php';
  $del_id = $_GET['del'];
  echo $del_id;
  $group_member = $_GET['group'];
  echo $group_member;
  $sql ="DELETE FROM `tour_round_member` WHERE id =$del_id AND group_member=$group_member ";
  $result = mysqli_query($conn,$sql);
  // if($result){
  //   echo "del success";
  // }


?>
