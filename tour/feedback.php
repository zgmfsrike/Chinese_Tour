<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
require 'module/language/lang_index.php';
?>
<!DOCTYPE html>
<html>
<?php
$feedback_id="";
if(isset($_GET['feedback_id'])){
  $feedback_id = $_GET['feedback_id'];
}
$link = "php_feedback.php";
$title = "Feedback Form";
// include 'component/header.php';
?>
<?php
$title = "Chiang Mai Hong Thai Tour";
include 'component/header.php';
?>
<body>
  <div class="container col s12">
    <form action=<?php echo $link;?> method="POST">
      <br/>
      <h3 class="center"><b>Feedback Form</b></h3>
      <div>
        <table class="responsive-table centered">
          <thead>
            <tr>
              <th class="center-align">Very Unsatisfied</th>
              <th class="center-align">Unsatisfied</th>
              <th class="center-align">Question</th>
              <th class="center-align">Neutral</th>
              <th class="center-align">Satisfied</th>
              <th class="center-align">Very Satisfied</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $sql = "SELECT * FROM feedback_question WHERE version = (SELECT MAX(version) FROM feedback_question) AND enable=1";
            $result = mysqli_query($conn, $sql);
            if($result){
              $counter = 1;
              while($data = mysqli_fetch_array($result)){
                $question = $data['question'];
                // $question = "Q!";
                ?>
                <tr >
                  <td><?php echo $question;?></td>
                  <td>
                    <input class="with-gap" type="radio" id="radio1_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="1"   />
                    <label for="radio1_g<?php echo $counter;?>"></label>
                  </td>
                  <td>
                    <input class="with-gap" type="radio" id="radio2_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="2"   />
                    <label for="radio2_g<?php echo $counter;?>"></label>
                  </td>
                  <td>
                    <input class="with-gap" type="radio" id="radio3_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="3"   />
                    <label for="radio3_g<?php echo $counter;?>"></label>
                  </td>
                  <td>
                    <input class="with-gap" type="radio" id="radio4_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="4"   />
                    <label for="radio4_g<?php echo $counter;?>"></label>
                  </td>
                  <td>
                    <input class="with-gap" type="radio" id="radio5_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="5"   />
                    <label for="radio5_g<?php echo $counter;?>"></label>
                  </td>
                </tr>
                <?php
                $counter++;
              }
            }

            ?>

          </tbody>
        </table>
      </div>

        <input type="text" name="feedback_id" id='feedback_id' value="<?php if($feedback_id !==""){ echo $feedback_id;}?>" style="display:none" >
        <br/>

        <div style="margin-right:30px; margin-left:10px;">
          <lable for="comment" class="hide-on-med-and-down show-on-large">Comment</lable>
          <textarea placeholder="Comment Here" id="comment" name="comment" class="materialize-textarea" style="overflow-y: scroll; border: 1px solid;padding: 10px; margin-top:10px;"></textarea>
        </div>


      <div class="right-align">
        <input class="btn green " type="submit" name="submit" value="Confirm"><br/>
        <br/>
      </div>


    </form>
  </div>

</body>

<!--Footer-->
<?php
include 'component/footer.php';
?>


</html>
