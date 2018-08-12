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
          <button type="button" onclick=<?php echo (!$link == "") ? "window.location.href='$link'" : "history.go(-1)"; ?> class="btn amber" value="<?php echo(!$btn == '') ? $btn : 'Back' ?>">
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
    require 'module/message/tour.php';
    require 'module/message/feedback.php';
    require 'module/message/book_tour.php';
    require 'module/message/news.php';
    require 'module/message/file_upload.php';

    // request
    if($msg == 'unknow_request') $result = message('Unknow request','Something went wrong, please try again.','','');

    if($msg == 'error') $result = message('Something went wrong','Please try again.','','');

    // Announce
    if($msg == 'success_update_announce') $result = message('Complete','Update announce complete','index.php','Go to home page');

    // under construction
    if($msg == 'under_construction') $result = message('This page is under construction','Sorry for inconvenient','index.php','Go to home page');

    // default - if the message is not match with all of above
    if(!isset($result)){
      message('Request not found','','','');
    }

  }else{
    // if no 'msg'
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
