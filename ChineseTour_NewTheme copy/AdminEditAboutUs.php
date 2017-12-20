<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
?>
<body>

      <!--Edit News Here-->

      <div class="container">
          <h3>Edit Anout Us</h3>
          <div class="row">
            <div class="col s12">
              <h5>Say something! (section 1)</h5>
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">Textarea</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <h5>Say something! (section 2)</h5>
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">Textarea</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 l6">
            <h5>Change Image</h5>
              <form action="#">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>File</span>
                    <input type="file">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload file">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <h5>Change Contact Us</h5>
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">Textarea</label>
              </div>
            </div>
        </div>
          </div>
          <div class="row col s12 center">
              <input name="Submit" type="submit" value="Cancel" onclick="window.location.href='AdminaboutUs.php'" class="waves-effect waves-light btn red">
              <input type="submit" class="waves-effect waves-light btn green" value="Save">
          </div>
      </div>

      <!--Footer-->
      <?php
      include 'component/footer.php';
      ?>

    </body>
  </html>
