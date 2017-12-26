<!DOCTYPE html>
  <html>
<?php
    include 'component/adminHeader.php';
    include 'db_config.php';
?>

<body>
<div class="container">
  <h3>Create Tour</h3>
  <div class="section"></div>
  <form action="php_create_tour.php" enctype="multipart/form-data" method="post" name="create_tour">
  <div class="row">
    <div class="col s12 l6" id="name">
      <!--  Text : Tour name  -->
      <div class="input-field" id="name" name="tour_name">
          <input placeholder="Tour name here" required name="tour_name" type="text"/>
          <label for="tour_name">Tour name</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 l6">
      <!--  File[] : Image  -->
          <div id="image">
            <div class="file-field input-field">
              <div class="btn">
                <span>Image</span>
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
    </div>
    <div class="col s12 l6">
            <!--  PDF File : Schedule  -->
              <div id="schedule">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>FILE</span>
                    <input required name='schedule' required type='file' accept="application/pdf"/>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="File here">
                  </div>
                </div>
                    <!-- <label>Schedule</label>
                    <input required name='schedule' type='file' value="" accept="application/pdf"/>
                    <br> -->
                </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 l6" id="highlight">
      <!--  Text : Highlight  -->
      <div class="input-field" id="highlight" name='highlight'>
          <input placeholder="Highlight" required name='highlight' type='text'/>
          <label for="highlight">Highlight</label>
      </div>
    </div>
    <div class="col s12 l3" id="price">
        <!--  Price sale  -->
        <div class="input-field" id="price" name='price'>
            <input placeholder="Price sale" required name='price' type='number' min="1"/>
            <label for="price">Price sale</label>
        </div>
    </div>
    <div class="col s12 l3" id="max">
      <!--  Max # of customer  -->
        <div class="input-field" id="max" name="max">
            <input placeholder="Max number of customer" required name='max' type='number' min="1"/>
            <label for="max">Max</label>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 l6" id="region">
      <!--  Region  -->
      <div class="input-field" id="region" name='price'>
          <input placeholder="Region" required name='region' type='text'/>
          <label for="region">Region</label>
      </div>
    </div>
    <div class="col s12 l6" id="province">
      <!--  Province  -->
      <div class="input-field" id="province" name='province'>
          <input placeholder="Province" required name='province' type='text'/>
          <label for="province">province</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 l4" id="type">
      <!--  Tour type  -->
      <h5>Tour Type</h5>
      <p>
        <input class="with-gap" name="group1" type="radio" id="casual" />
        <label for="casual">Casual</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="meeting" />
        <label for="meeting">Meeting</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="Incentive" />
        <label for="Incentive">Incentive</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="Convention" />
        <label for="Convention">Convention</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="Exhibition" />
        <label for="Exhibition">Exhibition</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="Business" />
        <label for="Business">Meeting</label>
      </p>
          <div id="type">
              <label>Tour type</label>
              <?php
                  $sql = "SELECT * FROM tour_type";
                  if($result = mysqli_query($conn, $sql)){
                      if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_array($result)){
                              echo '<input type="checkbox" name="type[]" value="'.$row['tour_type_id'].'"  checked>'.$row['tour_type']. '</input>';
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
    </div>
    <div class="col s12 l4" id="vehicel">
      <!--  Vehicel  -->
      <h5>Vehical</h5>
      <p>
        <input class="with-gap" name="group1" type="radio" id="4-seat" />
        <label for="4-seat">4 seat</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="9-seat" />
        <label for="9-seat">9 seat</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="14-seat" />
        <label for="14-seat">14 seat</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="VIP" />
        <label for="VIP">VIP</label>
      </p>

          <div id="vehicel">
              <label>Vehicel</label>
              <?php
                  $sql = "SELECT * FROM vehicle_type";
                  if($result = mysqli_query($conn, $sql)){
                      if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_array($result)){
                              echo '<input type="checkbox" name="vehicel[]" value="'.$row['vehicle_type_id'].' " checked>'.$row['vehicle_type']. '</input>';
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
    </div>
    <div class="col s12 l4" id="accommodation">
      <!--  Accommodation  -->
      <h5>Accommodation</h5>
      <p>
        <input class="with-gap" name="group1" type="radio" id="1-star" />
        <label for="1-star">1 Star</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="2-star" />
        <label for="2-star">2 Stars</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="3-star" />
        <label for="3-star">3 Stars</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="4-star" />
        <label for="4-star">4 Stars</label>
      </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="5-star" />
        <label for="5-star">5 Stars</label>
      </p>
          <div id="accommodation">
              <label>Accommodation</label>
              <?php
                  $sql = "SELECT * FROM accommodation";
                  if($result = mysqli_query($conn, $sql)){
                      if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_array($result)){
                              echo '<input type="checkbox" name="accommodation[]" value="'.$row['accommodation_id'].'" checked>'.$row['accommodation_level']. '</input>';
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
    </div>
  </div>

  <div class="row">
      <div id="tour_round">
      <div class="col s12 l4">
          <span>Start Date</span>
            <input required name='start_date[]' type='date'/>
          <span>End Date</span>
            <input required name='end_date[]' type='date'/><br>
        <input type="button" class="add_more_tr btn amber" value="Add More">
      </div>
      </div>
  </div>
  <div class="row">
    <div class="col s12 center">
      <input class="waves-effect waves-light btn amber" type="submit" name="submit"/>
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
                $(this).before("<input name='image_" + s + "' required class='image' type='file' accept='image/*'/><br/><br/>");
            }
        });

          // add more tour round
          $('.add_more_tr').click(function(e){
            e.preventDefault();
            $(this).before("<span>Start Date</span><input required name='start_date[]' type='date'/><span>End Date</span><input required name='end_date[]' type='date'/><br>");
            });
    });
    </script>
</body>
</html>
