<?php
$table_name = 'page_booking_history';
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $content = $row[$lang];
    switch($row['name']){
      case 'title':
      $string_booking_history_title = $content;
      break;
      case 'ref':
      $string_booking_history_ref = $content;
      break;
      case 'description':
      $string_booking_history_description = $content;
      break;
      case 'start':
      $string_booking_history_start = $content;
      break;
      case 'end':
      $string_booking_history_end = $content;
      break;
      case 'status':
      $string_booking_history_status = $content;
      break;
      case 'details':
      $string_booking_history_details = $content;
      break;
    }
  }
} else {
  //    echo "0 results";
  header('message.php?msg=unknow_request');
}
?>
