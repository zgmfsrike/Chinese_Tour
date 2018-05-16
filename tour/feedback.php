<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
require 'module/language/lang_index.php';
?>
<!DOCTYPE html>
<html>
<?php
if(isset($_GET['feedback_id'])){
  $feedback_id = $_GET['feedback_id'];
}
$link = "php_feedback.php";
$title = "Feedback Form";
include 'component/header.php';
?>
<body>
  <div class="container">
    <form action=<?php echo $link;?> method="POST">
      <h1>Feedback Form</h1>
      <div>
        <table class="responsive-table">
          <thead>
            <tr>
              <th>Question</th>
              <th>Very Satisfied</th>
              <th>Satisfied</th>
              <th>Neutral</th>
              <th>Unsatisfied</th>
              <th>Very Unsatisfied</th>

            </tr>
          </thead>
          <tbody>
            <?php

            $sql="SELECT * FROM feedback_question WHERE enable = 1";
            $result = mysqli_query($conn, $sql);
            if($result){
              $counter = 1;
              while($data = mysqli_fetch_array($result)){
                $question = $data['question'];
                // $question = "Q!";
                ?>
                <tr>
                  <td><?php echo $question;?></td>
                  <td>
                    <input class="with-gap" type="radio" id="radio1_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="1"   />
                    <label for="rad1_g<?php echo $counter;?>"></label>
                  </td>
                  <td>
                    <input class="with-gap" type="radio" id="radio2_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="2"   />
                    <label for="rad2_g<?php echo $counter;?>"></label>
                  </td>
                  <td>
                    <input class="with-gap" type="radio" id="radio3_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="3"   />
                    <label for="rad3_g<?php echo $counter;?>"></label>
                  </td>
                  <td>
                    <input class="with-gap" type="radio" id="radio4_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="4"   />
                    <label for="rad4_g<?php echo $counter;?>"></label>
                  </td>
                  <td>
                    <input class="with-gap" type="radio" id="radio5_g<?php echo $counter;?>" name="group_<?php echo $counter;?>" value="5"   />
                    <label for="rad5_g<?php echo $counter;?>"></label>
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
      <input type="text" name="ref_code" id='feedback_id' value="<?php if($feedback_id !==""){ echo $feedback_id;}?>" style="display:none" >
      <lable for="comment">Comment</lable>
      <textarea id="comment" name="commment"></textarea>
      <div class="right-align">
        <input class="btn green " type="submit" name="submit" value="Confirm"><br />
      </div>
      <p>

      </p>


    </form>
  </div>

</body>

<!--Footer-->

<?php
include 'component/footer.php';
?>


</html>
