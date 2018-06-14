<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
$link_upload = "php_payment_upload.php";
?>
<!DOCTYPE html>
<html>
<body>
  <?php
  if(!isset($_SESSION['login_id'])){
    header('location: message.php?msg=please_login');
  }
  if(isset($_GET['ref_code'])){
    $ref_code = $_GET['ref_code'];
  }


  ?>

  <?php
  $title = "Payment Upload File";
  include 'component/header.php';
  ?>
  <!-- News Here-->

  <div class="container">
    <div class="row">
      <div class="container col s12">
        <br>
        <h3 class="center"><b>Payment Upload File</b></h3>
        <h5 class="left">Reference Code : <?php echo $ref_code; ?></h5>
        <?php
        $sql = "SELECT * FROM book_status WHERE reference_code = '$ref_code'";
        $result = mysqli_query($conn, $sql);
        if($result){
          $data = mysqli_fetch_array($result);
          $file = $data['upload_file'];
        }
        if($file !==""){
          $path = "payment_file/";
          $img = $path.$file;
          ?>
          <div class='card-image'>
          <img src='<?php echo $img."?".filemtime($img);?>'  height='350' width='400'>
          <span class='card-title' style="white-space: nowrap;width: 12em;overflow: hidden;text-overflow: ellipsis;"></span>
          </div>

          <?php


        }

         ?>
      </div>
      <form action="<?php echo $link_upload; ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="ref_code" value="<?php echo $ref_code; ?>" style="display:none">
        <div class="container col s12">
          <div class="file-field input-field">
            <div class="btn">
              <span>Upload Image</span>
              <input name='image' class='image' type='file' accept="image/*"/>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Image here">
            </div>
          </div>
        </div>
        <div class="row col s12 center">
          <a href="payment.php"><button name="cancel" type="button" value="Cancel"  class="waves-effect waves-light btn red">Cancel</button></a>
          <button type="submit" name="save" class="waves-effect waves-light btn green" value="Save">Save</button>
        </div>


      </form>



    </div>
  </div>


  <!--Footer-->
  <?php
  include 'component/footer.php';
  ?>


</body>
</html>
