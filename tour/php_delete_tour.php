<?php
include 'db_config.php';
include 'module/session.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];

  // tour
  $sql = "SELECT * FROM `tour` WHERE tour_id = $id";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) == 0){
    //error no tour data
    header("location: message.php?msg=tour_not_found");
  }
}else{
  //error no GET['id']
  header("location: message.php?msg=unknow_request&errorId=1");
}

$id = $_GET['id'];

$sql = "SELECT * FROM `tour_image` WHERE tour_id = $id";
$result = mysqli_query($conn, $sql);

// DELETE IMAGE
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_array($result);
  for($i = 1; $i <= 10; $i++){
    $img = $row['img'.$i];
    if($img != ''){
      $flgDelete = unlink("images/tours/".$img);
      if($flgDelete){
        echo "File Deleted : " . $img;
      }else{
        echo "File can not delete : " . $img;
      }
    }
  }
  // Free result set
  mysqli_free_result($result);
}

// DELETE SCHEDULE PDF
if(file_exists("pdf/tours_schedule/".$id.".pdf")){
  $flgDelete = unlink("pdf/tours_schedule/".$id.".pdf");
  if($flgDelete){
    echo "File Deleted : " . $id;
  }else{
    echo "File can not delete : " . $id;
  }
}

$sql = "DELETE FROM tour_image WHERE tour_id = $id";
mysqli_query($conn, $sql);

$sql = "DELETE FROM tour_schedule WHERE tour_id = $id";
mysqli_query($conn, $sql);

$sql = "DELETE FROM tour_round WHERE tour_id = $id";
mysqli_query($conn, $sql);

$sql = "DELETE FROM tour_accommodation WHERE tour_id = $id";
mysqli_query($conn, $sql);

$sql = "DELETE FROM tour_tour_type WHERE tour_id = $id";
mysqli_query($conn, $sql);

$sql = "DELETE FROM tour_vehicle_type WHERE tour_id = $id";
mysqli_query($conn, $sql);

$sql = "DELETE FROM tour_en WHERE tour_id = $id";
mysqli_query($conn, $sql);

$sql = "DELETE FROM tour_ch WHERE tour_id = $id";
mysqli_query($conn, $sql);

$sql = "DELETE FROM tour_th WHERE tour_id = $id";
mysqli_query($conn, $sql);

header("location: message.php?msg=delete_tour_succ");
?>
