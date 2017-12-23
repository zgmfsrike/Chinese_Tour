<!DOCTYPE html>
  <html>
  <?php
  include('module/session.php');
  isAdmin();
   ?>
   <?php
      include 'component/adminHeader.php';
      ?>
<body>

      <!--Edit News Here-->

      <div class="container">
        <div class="row">
          <h3>Edit Announcement</h3>
            <form class="col s12">
              <div class="row">
                <h5>Say something!</h5>
                <form class="col s12 l6">
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Textarea</label>
                  </div>
                </form>
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
