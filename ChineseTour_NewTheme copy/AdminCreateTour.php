<?php
include 'module/session.php';
include 'db_config.php';
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}
?>
<!DOCTYPE html>
  <html>
<?php
    include 'component/header.php';
?>

<body>
<div class="container">
  <h3>Create Tour</h3>
  <form action="php_create_tour.php" enctype="multipart/form-data" method="post" name="create_tour">
    <div class="row">
        <div class="col s12 l6">
          <fieldset>
            <legend><b>Tour Details</b></legend>
          <!--  Text : Tour name  -->
          <div class="input-field" id="name" name="tour_description">

              <input placeholder="Tour description here" required name="tour_description" type="text"/>
              <label for="tour_description">Tour description</label>
          </div>
            <!--  Text : Highlight  -->
          <div class="input-field" id="highlight" name='highlight'>
              <input placeholder="Highlight" required name='highlight' type='text'/>
              <label for="highlight">Highlight</label>
          </div>
          <!--  Price sale  -->
          <div class="input-field" id="price" name='price'>
              <input placeholder="Price sale" required name='price' type='number' min="1"/>
              <label for="price">Price sale</label>
          </div>
          <!--  Max # of customer  -->
          <div class="input-field" id="max" name="max">
              <input placeholder="Max number of customer" required name='max' type='number' min="1"/>
              <label for="max">Max</label>
          </div>
          <!--  Region  -->
          <div class="input-field" id="region" name='price'>
              <input placeholder="Region" required name='region' type='text'/>
              <label for="region">Region</label>
          </div>
          <!--  Province  -->
          <div class="input-field" id="province" name='province'>
              <input placeholder="Province" required name='province' type='text'/>
              <label for="province">province</label>
          </div>
          </fieldset>
                      <!--Start-End Date-->
                      <div id="tour_round" class="col s12">
                        <div class="section"></div>
                        <fieldset>
                          <legend>Tour Round</legend>
                          <div class="col s6">
                            <span><b>Start Date</b></span>
                              <input required name='start_date[]' type='date'/>
                          </div>
                          <div class="col s6">
                            <span><b>End Date</b></span>
                              <input required name='end_date[]' type='date'/><br>
                          </div>
                        <input type="button" class="add_more_tr btn amber" value="Add More">
                        </fieldset>
                      </div>
        </div>
        <div class="col s12 l6">
          <div class="col s12 l4" id="type">
            <!--  Tour type  -->
            <h5>Tour Type</h5>
                    <?php
                        $sql = "SELECT * FROM tour_type";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                  ?>
                                  <div>
                                    <input type="checkbox" class="with-gap" name="type[]" value="<?php echo $row['tour_type_id'];?>" id="<?php echo $row['tour_type'];?>" checked/>
                                    <label for="<?php echo $row['tour_type'];?>"><?php echo $row['tour_type'];?></label>
                                  </div>
                                  <?php
                                }
                                // Free result set
                                mysqli_free_result($result);
                            } else{
            //                    echo "No records matching your query were found.";
                            }
                        } else{
            //                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                    ?>
                </div>
                <div class="col s12 l3" id="vehicel">
                  <!--  Vehicel  -->
                  <h5>Vehical</h5>
                          <?php
                              $sql = "SELECT * FROM vehicle_type";
                              if($result = mysqli_query($conn, $sql)){
                                  if(mysqli_num_rows($result) > 0){
                                      while($row = mysqli_fetch_array($result)){
                                        ?>
                                        <div>
                                          <input type="checkbox" class="with-gap" name="vehicel[]" value="<?php echo $row['vehicle_type_id'];?>" id="<?php echo $row['vehicle_type']; ?>" checked/>
                                          <label for="<?php echo $row['vehicle_type']; ?>"><?php echo $row['vehicle_type']; ?></label>
                                        </div>
                                          <?php
                                      }
                                      // Free result set
                                      mysqli_free_result($result);
                                  } else{
                  //                    echo "No records matching your query were found.";
                                  }
                              } else{
                  //                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                              }
                          ?>
                      </div>
                      <div class="col s12 l4" id="accommodation">
                        <!--  Accommodation  -->
                        <h5>Accommodation</h5>
                                <?php
                                    $sql = "SELECT * FROM accommodation";
                                    if($result = mysqli_query($conn, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                              ?>
                                              <div>
                                                <input type="checkbox" name="accommodation[]" value="<?php echo $row['accommodation_id'];?>" id="<?php echo $row['accommodation_level'];?>" checked/>
                                                <label for="<?php echo $row['accommodation_level'];?>"><?php echo $row['accommodation_level'];?></label>
                                              </div>
                                                <?php
                                              }
                                            // Free result set
                                            mysqli_free_result($result);
                                        } else{
                        //                    echo "No records matching your query were found.";
                                        }
                                    } else{
                        //                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                    }
                                ?>
                      </div>
            <!--  File[] : Image  -->
            <div class="col s12">
              <div class="section"></div>
              <div id="image">
                <label for="image"><b>Images</b></label>
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Upload image</span>
                    <input name='image_1' class='image' type='file' accept="image/*"/>
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
                    <input name='schedule' type='file' accept="application/pdf"/>
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
    </div>

  <div class="row">
    <div class="col s12 center">
      <button class="waves-effect waves-light btn amber" type="submit" name="submit"/>Submit</button>
    </div>
  </div>

</form>
</div>
<div class="section"></div>

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
            if(s < 10){
                s++;
                $(this).before("<div class='file-field input-field'><div class='btn'><span>Upload image</span><input name='image_" + s + "' class='image' type='file' accept='image/*'/></div><div class='file-path-wrapper'><input class='file-path validate' type='text' placeholder='Image here'></div></div>");
            }
        });

          // add more tour round
          $('.add_more_tr').click(function(e){
            e.preventDefault();
            $(this).before("<div class='col s6'><span><b>Start Date</b></span><input required name='start_date[]' type='date'/></div><div class='col s6'><span><b>End Date</b></span><input required name='end_date[]' type='date'/><br></div>");
            });
    });
    </script>
</body>
</html>
