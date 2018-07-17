<?php
$table_name = "page_static_convention";
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $content = $row[$lang];
    switch($row['name']){
      case 'title':
      $string_convention_title = $content;
      break;
      case 'type1':
      $string_convention_type1 = $content;
      break;
      case 'type2':
      $string_convention_type2 = $content;
      break;
      case 'type3':
      $string_convention_type3 = $content;
      break;
    }
  }
} else {
  //    echo "0 results";
  header('message.php?msg=unknow_request');
}
?>