<?php
include 'module/session.php';
include 'db_config.php';

// $edit_feedback_question = "php_edit_feedback_question.php";
$edit_feedback_question = "php_edit_feedback_form.php";

$sql = "SELECT * FROM feedback_question WHERE version = (SELECT MAX(version) FROM feedback_question)";
$result = mysqli_query($conn,$sql);

 ?>


<html>

<form action="<?php echo $edit_feedback_question; ?>" method="post">
  <?php
  for($i = 1; $i <= 15; $i++){

    $row = mysqli_fetch_array($result);

    $question = $row['question'];
    $enable = $row['enable'];

    if($enable == 1){
      $enable = "checked";
    }else{
      $enable = "";
    }


    echo 'Q'.$i.': <input type="text" name="question_'.$i.'" value="'.$question.'"/> enable: <input type="checkbox" name="enable_'.$i.'" '.$enable.'/> <br>';
  }
   ?>
<input type="submit" name="save" value="Save">

</form>
</html>
