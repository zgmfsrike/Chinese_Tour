<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin'))){
  header('Location: message.php?msg=unauthorized');
}
//--------------------Link to another page -----------------------------------
$create_news_func = "php_create_news.php";
$manage_page = "window.location.href='manage.php'";

require 'module/language/init.php';
?>

<!DOCTYPE html>
<html>
<?php
$title = "Create News";
include 'component/header.php';
?>
<body>
  <!--Edit News Here-->

  <div class="container">
    <div class="row">
      <br/><br/>
      <h3 class="center"><b>Create News</b></h3>
      <br/>
      <form class="col s12" action=<?php echo $create_news_func; ?> method="post" enctype="multipart/form-data">

        <div style="border-style: solid;border-width: 1px;">
          <div class="row">
            <br/><h5 class="center"><b>English</b></h5>
            <div class="col s12">
              <div class="input-field col s12">
                <h5 for="newsTopic">News Topic (English)</h5>
                <input placeholder="News Topic (English)" id="newsTopic" type="text" class="validate" name="newsAddtopic_en" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 l12">
              <div class="input-field col s12">
                <h5 for="textarea1">News Content</h5>
                <textarea placeholder="News Content" id="textarea2" name="newsContent_en" class="materialize-textarea" required></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 l12">
              <div class="input-field col s12">
                <h5 for="textarea1">News Description</h5>
                <textarea placeholder="News Description" name="newsDescription_en" id="textarea1" class="materialize-textarea" required></textarea>
              </div>
            </div>
          </div>
        </div><br/>

        <div style="border-style: solid;border-width: 1px;">
          <div class="row">
            <br/><h5 class="center"><b>中文</b></h5>
            <div class="col s12 l12">
              <div class="input-field col s12">
                <h5 for="newsTopic">News Topic (中文)</h5>
                <input placeholder="News Topic (中文)" id="newsTopic" type="text" class="validate" name="newsAddtopic_ch" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 l12">
              <div class="input-field col s12">
                <h5 for="textarea1">News Content</h5>
                <textarea placeholder="News Content" id="textarea2" name="newsContent_ch" class="materialize-textarea" required></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 l12">
              <div class="input-field col s12">
                <h5 for="textarea1">News Description</h5>
                <textarea placeholder="News Description" name="newsDescription_ch" id="textarea1" class="materialize-textarea" required></textarea>
              </div>
            </div>
          </div>
        </div><br/>

        <div style="border-style: solid;border-width: 1px;">
          <div class="row">
            <br/><h5 class="center"><b>ภาษาไทย</b></h5>
            <div class="col s12 l12">
              <div class="input-field col s12">
                <h5 for="newsTopic">News Topic (ภาษาไทย)</h5>
                <input placeholder="News Topic (ภาษาไทย)" id="newsTopic" type="text" class="validate" name="newsAddtopic_th" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 l12">
              <div class="input-field col s12">
                <h5 for="textarea1">News Content</h5>
                <textarea placeholder="News Content" id="textarea2" name="newsContent_th" class="materialize-textarea" required></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 l12">
              <div class="input-field col s12">
                <h5 for="textarea1">News Description</h5>
                <textarea placeholder="News Description" name="newsDescription_th" id="textarea1" class="materialize-textarea" required></textarea>
              </div>
            </div>
          </div>
        </div>
        <br/>
        <div class="row">
          <h5><b>Add Images</b></h5>
          <div class="col s12">
            <div class="section"></div>
            <div id="image">
              <h5 for="image"><b>Images</b></h5>
              <div class="file-field input-field">
                <div class="btn">
                  <span>Upload image</span>
                  <input  name='newsPicAddtopic1'  class='image' type='file' accept="image/*"/>
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
            <div id="pdf">
              <div class="section"></div>
              <h5 for="pdf"><b>PDF</b></h5>
              <div class="file-field input-field">
                <div class="btn">
                  <span>Upload file</span>
                  <input  name='newsPdf1' class='pdf' type='file' accept="application/pdf"/>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="PDF here">
                </div>
              </div>
              <input type="button" class="add_more_pdf btn amber" value="Add More PDF">
              <!-- <label>Schedule</label>
              <input required name='schedule' type='file' value="" accept="application/pdf"/>
              <br> -->
            </div>
          </div>
        </div>
        <br/>
        <div class="row col s12 center">
          <button name="cancel" type="button" value="Cancel" onclick=<?php echo $manage_page; ?> class="btn red">Cancel</button>
          <button type="submit" name="save" class="btn green" value="Save">Save</button>
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
        $(this).before("<div class='file-field input-field'><div class='btn'><span>Upload image</span><input name='newsPicAddtopic" + s + "' class='image' type='file' accept='image/*'/></div><div class='file-path-wrapper'><input class='file-path validate' type='text' placeholder='Image here'></div></div>");
      }
    });

    $('.add_more_pdf').click(function(e){
      e.preventDefault();
      var e = document.getElementsByTagName('input');
      var j;
      var k = 0;
      for(j=0; j < e.length; j++) {
        if(e[j].type== "file" && e[j].className=="pdf" ) {
          k++;
        }
      }
      if(k < 5){
        k++;
        $(this).before("<div class='file-field input-field'><div class='btn'><span>Upload FILE</span><input name='newsPdf" + k + "' class='pdf' type='file' accept='application/pdf'/></div><div class='file-path-wrapper'><input class='file-path validate' type='text' placeholder='PDF here'></div></div>");
      }
    });
  });
  </script>
</body>
</html>
