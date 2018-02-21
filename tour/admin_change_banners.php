<?php
include 'module/session.php';
if(!isLoginAs(array('admin'))){
  header('Location: message.php?msg=unauthorized');
}
?>
<!DOCTYPE html>
<html>
<?php
$title = "Change Banner";
include 'component/header.php';
?>
<body>

  <!--Change Banners Here-->

  <div class="container">
    <div class="row">
      <h3>Change Banners</h3>
      <h5>Add Images</h5>
      <div class="col s12">
        <form action="php_upload_banner.php" method="POST" enctype="multipart/form-data">
          <!--Banner 1-->
          <div class="row">
            <div class="col s9 l8">
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="banner1">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 1">
                </div>
              </div>
            </div>
            <div class="s3 l4">
              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner1">Change</button>
            </div>

          </div>
          <!--Banner 2-->
          <div class="row">
            <div class="col s9 l8">
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="banner2">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 2">
                </div>
              </div>
            </div>
            <div class="s3 l4">
              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner2">Change</button>
            </div>
          </div>
          <!--Banner 3-->
          <div class="row">
            <div class="col s9 l8">
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="banner3">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 3">
                </div>
              </div>
            </div>
            <div class="s3 l4">
              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner3">Change</button>
            </div>
          </div>
          <!--Banner 4-->
          <div class="row">
            <div class="col s9 l8">
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="banner4">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 4">
                </div>
              </div>
            </div>
            <div class="s3 l4">
              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner4">Change</button>
            </div>
          </div>
          <!--Banner 5-->
          <div class="row">
            <div class="col s9 l8">
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="banner5">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 5">
                </div>
              </div>
            </div>
            <div class="s3 l4">
              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner5">Change</button>
            </div>
          </div>
          <!-- <div class="row">
          <div class="center col s12">
          <input type="submit" value="Cancel" onclick="window.location.href='Adminindex.php'" class="waves-effect waves-light btn red">
          <input name="changeAll" type="submit" class="waves-effect waves-light btn amber" value="Save All">
        </div>
      </div> -->
    </form>

  </div>
</div>
</div>

<!--Footer-->
<?php
include 'component/footer.php';
?>

</body>
</html>
