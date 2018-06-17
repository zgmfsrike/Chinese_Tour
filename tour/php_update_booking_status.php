<?php
include "db_config.php";

if( isset($_POST['status_id']) AND isset($_POST['ref_code']) ) {

  $status_id = $_POST['status_id'];
  $ref_code = $_POST['ref_code'];

  $sql = "UPDATE `tour_booking_history` SET `status` = '$status_id' ";

  $sql .= "WHERE `reference_code` = '$ref_code'";

  // echo $sql;
  // exit();

  $result = mysqli_query( $conn , $sql );
  if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("location: message.php?msg=error");
  }
  header("location: booking_detail.php?ref=" . $ref_code);
}
?>
