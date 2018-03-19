<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
?>

<!DOCTYPE html>
<html>
<body>
  <?php
  function message($header,$message,$link,$btn){
    $title = $header;
    $lang = $GLOBALS['lang'];
    include 'component/header.php';
    ?>
    <div class="container col s12">
      <form>
        <div class="row">
          <h1>
            <?php
            echo $header;
            ?>
          </h1>
          <div>
            <?php
            echo $message;
            ?>
          </div>
          <hr>
        </div>
        <div class="row">
          <button type="button" onclick=<?php echo (!$link == "") ? "window.location.href='$link'" : "history.go(-1)"; ?> class="waves-effect waves-light btn amber" value="<?php echo(!$btn == '') ? $btn : 'Back' ?>">
          <?php echo(!$btn == '') ? $btn : 'Back' ?>
          </button>
          </div>
          </form>
          </div>
          <?php
          return true;
        }
        ?>

        <?php
        // require 'module/message/session.php';

        if(isset($_GET['msg'])){
          $msg = $_GET['msg'];

          // add message -> $message = message(HEADER,message,LINK,BUTTON_VALUE);
          // use '' in LINK or BUTTON_VALUE to use DEFAULT as back button

          require 'module/message/session.php';
          require 'module/message/authentication.php';

          // manage_account.php

          // AUTHENTICATIO
          if($msg == 'create_news_succ')
          if(isset($_GET['id'])){
            $message = message('Success!','News has been created ','news.php?news_id='.$_GET['id'],'back to news page');
          }else{
            $message = message('Request not found','','','');
          }

          if($msg == 'del_news_succ') $message = message('Success!','News has been deleted ','index.php','Go to home page');


          if($msg == 'edit_news_succ')
          if(isset($_GET['id'])){
            $message = message('Success!','News has been changed ','news.php?news_id='.$_GET['id'],'back to news page');
          }else {
            $message = message('Request not found','','','');
          }



          if($msg == 'not_image') $message = message('Sorry!','Only jpg, gif, and png files are allowed. ','index.php','Go to home page');


          if($msg == 'not_pdf') $message = message('Sorry!','Only pdf file are allowed. ','index.php','Go to home page');


          //Index manage
          if($msg == 'uploadSucc') $message = message('Got it!',' The file has been uploaded.','index.php','Go to home page');

          if($msg == 'uploadNotSucc') $message = message('Sorry, your file was not uploaded.','Please check neither your file is too large, nor your file type is wrong (Only JPG, JPEG, PNG & GIF files are allowed).','index.php','Go to home page');


          // TOUR
          if($msg == 'create_tour_succ')
          if(isset($_GET['id'])){
            $message = message('Success!','Create tour successfully','tour.php?id='.$_GET['id'],'Back to tour page');
          }else{
            $message = message('Request not found','','','');
          }

          if($msg == 'delete_tour_succ')$message = message('Success!','Deleting tour successfully','index.php','Go to home page');

          if($msg == 'edit_tour_succ')
          if(isset($_GET['id'])){
            $message = message('Success!','Editing tour successfully','tour.php?id='.$_GET['id'],'Back to tour page');
          }else{
            $message = message('Request not found','','','');
          }

          if($msg == 'tour_not_found')$message = message('Sorry!','Tour not found.','index.php','Go to home page');


          // request
          if($msg == 'unknow_request') $message = message('Unknow request','Something went wrong, please try again.','','');

          if($msg == 'error') $message = message('Something went wrong','Please try again.','','');


          // Announce
          if($msg == 'success_update_announce') $message = message('Complete','Update announce complete','index.php','Go to home page');

          // under construction
          if($msg == 'under_construction') $message = message('This page is under construction','Sorry for inconvenient','index.php','Go to home page');

          // default
          if(!$message){
            message('Request not found','','','');
          }
      }else{
        message('Request not found.','','','');
      }
      ?>




      <!-- Footer -->
      <div class="section">
      </div>
      <?php
      include 'component/footer.php';
      ?>
      </body>
      </html>
