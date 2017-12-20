<!DOCTYPE html>
  <html>
  <?php
  include('module/session.php');
  requireLogin();
   ?>
   <?php
      include 'component/adminHeader.php';
      ?>
<body>

      <!--Edit News Here-->

      <div class="container">
        <div class="row">
          <h3>Change Banners</h3>
            <form class="col s12">
              <div class="row">
                <h5>Add Images</h5>
                <div class="col s12 l6">
                  <form action="#">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input type='file' onchange="readURL(this);" />
                        <img id="blah" src="http://placehold.it/180" alt="your image" style="max-width:180px;"/>
                      </div>
                    </div>
                  </form>
                  <form action="#">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                      </div>
                    </div>
                  </form>
                  <form action="#">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                      </div>
                    </div>
                  </form>
                  <form action="#">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                      </div>
                    </div>
                  </form>
                  <form action="#">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row col s12">
                <input name="Submit" type="submit" value="Cancel" onclick="window.location.href='Index.php'" class="waves-effect waves-light btn red">
                <input type="submit" class="waves-effect waves-light btn green" value="Save">
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
