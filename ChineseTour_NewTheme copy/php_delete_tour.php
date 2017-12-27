<?php
include 'db_config.php';
// include 'module/session.php';
// isAdmin();

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

$sql = "SELECT * FROM `tour_image` WHERE tour_id = $id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        $img_name = $row['img_name'];
        $flgDelete = unlink("images/tours/".$img_name);
        if($flgDelete){
          echo "File Deleted : " . $img_name;
        }else{
          echo "File can not delete : " . $img_name;
        }
    }
}

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

$sql = "DELETE FROM tour WHERE tour_id = $id";
mysqli_query($conn, $sql);
 ?>
