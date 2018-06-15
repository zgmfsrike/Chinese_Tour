<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
?>

<!DOCTYPE html>
<html>
<body>
  <?php
  include 'component/header.php';
  ?>
  <?php
  function message($header,$message,$link,$btn){
    $title = $header;
    $lang = $GLOBALS['lang'];

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

    // add message -> $result = message(HEADER,message,LINK,BUTTON_VALUE);
    // use '' in LINK or BUTTON_VALUE to use DEFAULT as back button

    require 'module/message/session.php';
    require 'module/message/authentication.php';
    require 'module/message/manage_account.php';

    if($msg ==  'session_book_expired') $result = message('Session book tour expired','Please try again','search_tour.php','');

    // manage_account.php

    // AUTHENTICATION
    if($msg == 'create_news_succ')
    if(isset($_GET['id'])){
      $result = message('Success!','News has been created ','news.php?news_id='.$_GET['id'],'back to news page');
    }else{
      $result = message('Request not found','','','');
    }

    if($msg == 'del_news_succ') $result = message('Success!','News has been deleted ','index.php','Go to home page');


    if($msg == 'edit_news_succ')
    if(isset($_GET['id'])){
      $result = message('Success!','News has been updated.','news.php?news_id='.$_GET['id'],'back to news page');
    }else {
      $result = message('Request not found','','','');
    }

    if($msg == 'not_image') $result = message('Sorry!','Only jpg, gif, and png files are allowed. ','index.php','Go to home page');


    if($msg == 'not_pdf') $result = message('Sorry!','Only pdf file are allowed. ','index.php','Go to home page');


    //Index manage
    if($msg == 'uploadSucc') $result = message('Success!',' The file has been uploaded.','index.php','Go to home page');

    if($msg == 'uploadNotSucc') $result = message('Sorry, your file was not uploaded.','Please check neither your file is too large, nor your file type is wrong (Only JPG, JPEG, PNG & GIF files are allowed).','index.php','Go to home page');


    // TOUR
    if($msg == 'create_tour_succ')
    if(isset($_GET['id'])){
      $result = message('Success!','Create tour successfully','tour.php?id='.$_GET['id'],'Back to tour page');
    }else{
      $result = message('Request not found','','','');
    }

    if($msg == 'delete_tour_succ') $result = message('Success!','Deleting tour successfully','index.php','Go to home page');

    if($msg == 'edit_tour_succ')
    if(isset($_GET['id'])){
      $result = message('Success!','Editing tour successfully','tour.php?id='.$_GET['id'],'Back to tour page');
    }else{
      $result = message('Request not found','','','');
    }

    if($msg == 'tour_not_found')$result = message('Sorry!','Tour not found.','index.php','Go to home page');


    // request
    if($msg == 'unknow_request') $result = message('Unknow request','Something went wrong, please try again.','','');

    if($msg == 'error') $result = message('Something went wrong','Please try again.','','');


    // Announce
    if($msg == 'success_update_announce') $result = message('Complete','Update announce complete','index.php','Go to home page');

    // under construction
    if($msg == 'under_construction') $result = message('This page is under construction','Sorry for inconvenient','index.php','Go to home page');

    if($msg == 'book_tour_succ') $result =  message('Success!','Send e-mail to member complete','index.php','Go to home page');

    // feedback
    if($msg == 'edit_feedback_question_complete') $result =  message('Success!','Edit feedback form successfully.','','');
    if($msg == 'feedback_send_succ') $result =  message('Success!','Feedback has already send.','','');
    if($msg == 'feedback_send_fail') $result =  message('Sorry!','Something went wrong, please try again.','','');
    if($msg == 'feedback_succ') $result =  message('Success!','Send success','','');
    if($msg == 'edit_comment_success') $result =  message('Success!','Edit comment successfully','','');




    // default
    if(!isset($result)){
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
