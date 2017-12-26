<?php
include 'module/session.php';
 ?>
<!DOCTYPE html>
  <html>
   <?php
      include 'component/header.php';
      ?>
<body>
      <!--Edit News Here-->
      <div class="container">
        <div class="row">
          <h3>Edit Tour</h3>
            <form>
              <div class="row">
                <div class="col s12">
                  Sales Price :
                  <div class="input-field inline">
                    <input onkeyup="validatephone(this);" id="salePrice" type="text" class="validate">
                    <label for="salePrice">Sale Price</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <h5>Add Images</h5>
                <div class="col s12 l6">
                  <form action="#">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file">
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
                        <input type="file">
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
                        <input type="file">
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
                        <input type="file">
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
                        <input type="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
              <div class="col s12 l6">
                <form method="post">
                  <label>Tour Type</label>
                    <select class="browser-default" name="tourType" required>
                      <option value="">Please select</option>
                      <option value="1">Meeting</option>
                      <option value="2">Incentive</option>
                      <option value="3">Conversion</option>
                      <option value="4">Foxhibition</option>
                      <option value="5">Business</option>
                    </select>
                </form>
              </div>
              </div>
              <div class="row">
                <div class="col s12 l6">
                  <form method="post">
                    <label>Vehicle</label>
                      <select class="browser-default" name="vehicle" required>
                        <option value="">Please select</option>
                        <option value="1">Van</option>
                        <option value="2">Helicopter</option>
                        <option value="3">Bus</option>
                        <option value="4">Motorbike</option>
                        <option value="5">Car</option>
                      </select>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col s12 l6">
                  <form method="post">
                    <label>Accommodation</label>
                      <select class="browser-default" name="accommodation" required>
                        <option value="">Please select</option>
                        <option value="1">Hotel</option>
                        <option value="2">Hostel</option>
                        <option value="3">Home Stay</option>
                        <option value="4">Airbnb</option>
                        <option value="5">Other</option>
                      </select>
                  </form>
                </div>
              </div>
              <div class="row">
                <form class="col s12 l6">
                  <h5>Description</h5>
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Textarea</label>
                  </div>
                </form>
              </div>
              <div class="row col s12">
                <input name="Submit" type="submit" value="Cancel" onclick="window.location.href='AdminTourInfo.php'" class="waves-effect waves-light btn red">
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
