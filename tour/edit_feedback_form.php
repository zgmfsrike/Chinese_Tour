<?php
include 'module/session.php';
include 'db_config.php';
require 'module/language/init.php';
require 'module/language/lang_index.php';

// $edit_feedback_question = "php_edit_feedback_question.php";
$edit_feedback_question = "php_edit_feedback_form.php";

$sql = "SELECT * FROM feedback_question WHERE version = (SELECT MAX(version) FROM feedback_question)";
$result = mysqli_query($conn,$sql);

 ?>
<!DOCTYPE html>
<html>
<?php
$title = "Chiang Mai Hong Thai Tour";
include 'component/header.php';
?>
<body>

<div class="container col s12">
  <br/>
  <h3 class="center"><b>Feedback Questionnaire</b></h3>
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
  <div class="center-align" style="margin-bottom:30px; margin-top:30px;">
    <input class="btn green" type="submit" name="save" value="Save">
  </div>
  </form>
</div>

  <!--Footer-->
  <?php
  include 'component/footer.php';
  ?>

</body>
</html>
