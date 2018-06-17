<?php
include 'db_config.php';
include 'module/session.php';
include 'db_config.php';
if(!isLoginAs(array('admin'))){
  header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';
?>
<!DOCTYPE html>
<html>

<?php
$title = "Change Banner";
include 'component/header.php';
?>

<body>
  <div class="container">

    <form action="php_upload_banner.php" enctype="multipart/form-data" method="post">
      <div class="row">
        <div class="col s12">
          <div class="section"></div>
          <h3 class="center"><b>Change Banners</b></h3>
          <div class="section"></div>
          <!--  File[] : Image  -->
          <?php

          for ($i=1; $i<=5; $i++) {

            $filename = 'images/home' . $i . '.jpg';

            ?>
            <div class="row">
              <?php
              if (file_exists($filename)) {
                ?>
                <img src="images/home<?php echo $i;?>.jpg" height="300" width="450">
                <?php
              }
              ?>
              <div class="col s9 l8">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>File</span>
                    <input type="file" onchange="readURL(this);" name="banner<?php echo $i;?>" accept="image/jpeg">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner <?php echo $i;?>">
                  </div>
                  <!-- <div class="hide-on-med-and-down">
                  <img id="pic1" src="#" alt="your image" />
                </div> -->
              </div>
            </div>
            <div class="s3 l4">
              <button type="submit" class="btn green" value="Change" name="changeBanner<?php echo $i;?>">Change</button>
              <button type="submit" class="btn red" value="<?php echo $i;?>" name="delete"
              <?php
              if (!file_exists($filename)) {
                ?>
                disabled
                <?php
              }
              ?>
              >Delete</button>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
    <div class="row">

    </div>
  </form>
</div>
<div class="section"></div>

<?php
include 'component/footer.php';
?>
<!-- <script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#pic1')
.attr('src', e.target.result)
.width(150)
.height(150);
};

reader.readAsDataURL(input.files[0]);
}
}

function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#pic2')
.attr('src', e.target.result)
.width(150)
.height(150);
};

reader.readAsDataURL(input.files[0]);
}
}

</script> -->
</body>
</html>
