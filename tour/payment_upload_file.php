<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
$link_upload = "php_payment_upload.php";
?>
<!DOCTYPE html>
<html>

<script type='text/javascript'>
function preview_image(event)
{
  var reader = new FileReader();
  reader.onload = function()
  {
    var output = document.getElementById('output_image');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>

<body>
  <?php
  if(!isset($_SESSION['login_id'])){
    header('location: message.php?msg=please_login');
  }
  if(isset($_GET['ref'])){
    $ref_code = $_GET['ref'];
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

        ?>
      </div>
      <form action="<?php echo $link_upload; ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="ref_code" value="<?php echo $ref_code; ?>" style="display:none">
        <div class="container col s12">
          <div class="file-field input-field">
            <div class="btn">
              <span>Upload Image</span>
              <input name='image' class='image' type='file' accept="image/*" onchange="preview_image(event)"/>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Image here">
            </div>
          </div>
        </div>
        <img id="output_image"/>
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
