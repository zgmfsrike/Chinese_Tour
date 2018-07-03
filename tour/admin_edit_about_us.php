<?php
include 'db_config.php';
include('module/session.php');
if(!isLoginAs(array('admin'))){
  header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';
?>
<!DOCTYPE html>
<html>
<?php
$title = "Edit About Us";
include 'component/header.php';

$sql = "SELECT * FROM `page_about` WHERE name = 'about_content'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0){
  header("location: message.php");
}
$data = mysqli_fetch_array($result);
$about_en = $data['english'];
$about_ch = $data['chinese'];
$about_th = $data['thai'];
?>
<body>

  <!--Edit News Here-->

  <div class="container">
    <form class="col s12" method="post" name="announce" action="php_edit_aboutus.php">
      <h3 class="center"><b>Edit About Us</b></h3>
      <div class="row">
        <div class="col s12">
          <h5>About us in English</h5>
          <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" name="about_en"><?php echo $about_en;?></textarea>
            <label for="textarea1">Enlish</label>
          </div>
        </div>
        <div class="col s12">
          <h5>About us in Chinese</h5>
          <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" name="about_ch"><?php echo $about_ch;?></textarea>
            <label for="textarea1">Chinese</label>
          </div>
        </div>
        <div class="col s12">
          <h5>About us in Thai</h5>
          <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" name="about_th"><?php echo $about_th;?></textarea>
            <label for="textarea1">Thai</label>
          </div>
        </div>
      </div>
    </div>
    <div class="row col s12 center">
      <button name="Submit" type="submit" value="Cancel" onclick="window.location.href='index.php'" class="btn red">Cancel</button>
      <button type="submit" class="btn green" value="save" name="save">Save</button>
    </div>
  </form>
</div>

<!--Footer-->
<?php
include 'component/footer.php';
?>

</body>
</html>
