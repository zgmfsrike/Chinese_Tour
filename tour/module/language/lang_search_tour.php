<?php
$table_name = "page_search_tour";
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $content = $row[$lang];
    switch($row['name']){
      case 'title':
      $string_index_title = $content;
      break;
      case 'announcement':
      $string_index_announcement = $content;
      break;
      case 'news':
      $string_index_news = $content;
      break;
      case 'announcement_content':
      $string_index_announcement_cont = $content;
      break;
      case 'readmore':
      $string_index_readmore = $content;
      break;
    }
  }
} else {
  //    echo "0 results";
  header('message.php?msg=unknow_request');
}
?>
