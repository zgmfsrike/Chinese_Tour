<!DOCTYPE html>
  <html>
  <?php
  include('module/session.php');
  isLogin();
   ?>
   <?php
      include 'component/adminHeader.php';
      ?>
<body>
      <!--Edit News Here-->

      <div class="container">
        <div class="row">
          <h3>Edit News</h3>
            <form>
              <div class="row">
                <div class="col s12">
                  News Topic :
                  <div class="input-field inline">
                    <input id="newsTopic" type="text" class="validate">
                    <label for="newsTopic">Topic</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <h5>Add Images</h5>
                <div class="col s12">
                  <div class="section"></div>
                  <div id="image">
                    <label for="image"><b>Images</b></label>
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Upload image</span>
                        <input name='image_1' required class='image' type='file' accept="image/*"/>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Image here">
                      </div>
                    </div>
                      <!-- <label>Image</label><br>
                      <input name='image_1' required class='image' type='file' accept="image/*"/><br> -->
                      <input type="button" class="add_more_image btn amber" value="Add More Image">
                  </div>
                  <!--  PDF File : Schedule  -->
                  <div id="schedule">
                    <div class="section"></div>
                    <label for="schedule"><b>Schedule</b></label>
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Upload file</span>
                        <input required name='schedule' required type='file' accept="application/pdf"/>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Schedule here">
                      </div>
                    </div>
                          <!-- <label>Schedule</label>
                          <input required name='schedule' type='file' value="" accept="application/pdf"/>
                          <br> -->
                  </div>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script>
            $(document).ready(function(){
                // add more image
              $('.add_more_image').click(function(e){
                e.preventDefault();
                  var e = document.getElementsByTagName('input');
                  var i;
                  var s = 0;
                  for(i=0; i < e.length; i++) {
                      if(e[i].type== "file" && e[i].className=="image" ) {
                          s++;
                      }
                  }
                  if(s < 5){
                      s++;
                      $(this).before("<div class='file-field input-field'><div class='btn'><span>Upload image</span><input name='image_" + s + "' class='image' type='file' accept='image/*'/></div><div class='file-path-wrapper'><input class='file-path validate' type='text' placeholder='Image here'></div></div>");
                  }
              });
          });
          </script>
    </body>
  </html>
