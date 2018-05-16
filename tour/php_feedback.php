<?php
include "db_config.php";
if(isset($_POST['submit'])){
  $question = array();
  for ($i=1; $i <=15 ; $i++) {
    $question[$i] = $_POST['group_'.$i];
  }
  $feedback_id = $_POST['feedback_id'];
  $comment = mysql_real_escape_string($_POST['comment']);
  $status = 1;


  $sql_check_ref = "SELECT * FROM tour_round_member WHERE feedback_id = $feedback_id";
  $result_ref = mysqli_query($conn,$sql_check_ref);
  if($result_ref){
    $data = mysqli_fetch_array($result_ref);
    $tour_round_id = $data['tour_round_id'];
    $sql_insert_feedback = "UPDATE `feedback` SET `answer_1`=$question[1],
    `answer_2`=$question[2],`answer_3`=$question[3],`answer_4`=$question[4],`answer_5`=$question[5],`answer_6`=$question[6],`answer_7`=$question[7],
    `answer_8`=$question[8],`answer_9`=$question[9],`answer_10`=$question[10],`answer_11`=$question[11],`answer_12`=$question[12],`answer_13`=$question[13],
    `answer_14`=$question[14],`answer_15`=$question[15],`comment`=$comment,`enable`=$status WHERE feedback_id =$feedback_id";
    // $sql_insert_feedback = "insert INTO `feedback`(`tour_round_id`, `reference_code`, `answer_1`, `answer_2`, `answer_3`, `answer_4`,
    //    `answer_5`, `answer_6`, `answer_7`, `answer_8`, `answer_9`, `answer_10`, `answer_11`, `answer_12`, `answer_13`, `answer_14`,
    //    `answer_15`, `comment`, `enable`) VALUES ($tour_round_id,$ref_code,$question[1],$question[2],$question[3],$question[4],$question[5],$question[6],
    //    $question[7],$question[8],$question[9],$question[10],$question[11],$question[12],$question[13],$question[14],$question[15],$comment,$status)";
    $result_insert = mysqli_query($conn, $sql_insert_feedback);
    if($result_insert){
      header("location: message.php?msg=");
    }
  }
}
?>
