<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin'))){
  header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';
?>
<!DOCTYPE html>
<html>

<?php
$title = "Create Tour";
include 'component/header.php';
?>

<script>
function selectEnd(elem){

  var index = elem.getAttribute('datagrp');
  var input = document.getElementById("end"+index).value;

  console.log(index);
  console.log(input);

  document.getElementById("start"+index).setAttribute('max',input);

}

function selectStart(elem){

  var index = elem.getAttribute('datagrp');
  var input = document.getElementById("start"+index).value;

  console.log(index);
  console.log(input);

  document.getElementById("end"+index).setAttribute('min',input);

}

function initDate(index){

  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0

  var yyyy = today.getFullYear();
  if(dd<10){
    dd='0'+dd;
  }
  if(mm<10){
    mm='0'+mm;
  }
  var date = yyyy+'-'+mm+'-'+dd;

  if(typeof index !== "undefined"){

    console.log(date);
    console.log("start"+index);
    console.log("end"+index);

    document.getElementById("start"+index).setAttribute('min',date);
    document.getElementById("end"+index).setAttribute('min',date);

  }else{

    console.log(date);

    $('.start').attr('min', date);
    $('.end').attr('min', date);

  }

}
</script>

<body>
  <div class="container">
    <h3>Create Tour</h3>
    <form action="php_create_tour.php" enctype="multipart/form-data" method="post" name="create_tour">
      <div class="row">
        <div class="col s12 l6">
          <fieldset>
            <legend><b>Tour Details (English)</b></legend>
            <!--  Text : Tour name  -->
            <div class="input-field" id="name" name="tour_description">
              <input placeholder="Tour description here" required name="tour_description_en" type="text"/>
              <label for="tour_description">Tour description</label>
            </div>
            <!--  Text : Highlight  -->
            <div class="input-field" id="highlight" name='highlight'>
              <input placeholder="Highlight" required name='highlight_en' type='text'/>
              <label for="highlight">Highlight</label>
            </div>
            <!--  Region  -->
            <div  id="region" name='region'>
              <label>Region</label>
              <select class="browser-default" name='region_en' required>
                <option selected value='Northern'>Northern</option>
              </select><br />
            </div>
            <!--  Province  -->
            <div  id="province" name='province'>
              <!-- <input placeholder="Province" required name='province_en' type='text'/>-->
              <label>Province</label>
              <select class="browser-default" name='province_en' required>
                <option selected disabled>Please Select</option>
                <option value='Chiang Mai'>Chiang Mai</option>
                <option value='Chiang Rai'>Chiang Rai</option>
                <option value='Lamphun'>Lamphun</option>
                <option value='Lampang'>Lampang</option>
                <option value='Uttaradit'>Uttaradit</option>
                <option value='Phrae'>Phrae</option>
                <option value='Nan'>Nan</option>
                <option value='Phayao'>Phayao</option>
                <option value='Mae Hong Son'>Mae Hong Son</option>
              </select><br />


            </div>
            <!--  Price sale  -->
            <div class="input-field" id="price" name='price'>
              <input placeholder="Price sale" required name='price_en' type='number' min="1"/>
              <label for="price">Price sale</label>
            </div>
          </fieldset>
          <br>
          <fieldset>
            <legend><b>Tour Details (Chinese)</b></legend>
            <!--  Text : Tour name  -->
            <div class="input-field" id="name" name="tour_description">

              <input placeholder="Tour description here" required name="tour_description_ch" type="text"/>
              <label for="tour_description">Tour description</label>
            </div>
            <!--  Text : Highlight  -->
            <div class="input-field" id="highlight" name='highlight'>
              <input placeholder="Highlight" required name='highlight_ch' type='text'/>
              <label for="highlight">Highlight</label>
            </div>
            <!--  Region  -->
            <div  id="region" name='region'>
              <label>Region</label>
              <select class="browser-default" name='region_ch' required>
                <option selected value='Northern'>Northern</option>
              </select><br />
            </div>
            <!--  Province  -->
            <div id="province" name='province'>
              <!-- <input placeholder="Province" required name='province_ch' type='text'/>
              <label for="province">province</label> -->
              <label>Province</label>
              <select class="browser-default" name='province_ch' required>
                <option selected disabled>Please Select</option>
                <option value='Chiang Mai'>Chiang Mai</option>
                <option value='Chiang Rai'>Chiang Rai</option>
                <option value='Lamphun'>Lamphun</option>
                <option value='Lampang'>Lampang</option>
                <option value='Uttaradit'>Uttaradit</option>
                <option value='Phrae'>Phrae</option>
                <option value='Nan'>Nan</option>
                <option value='Phayao'>Phayao</option>
                <option value='Mae Hong Son'>Mae Hong Son</option>
              </select><br />

            </div>
            <!--  Price sale  -->
            <div class="input-field" id="price" name='price'>
              <input placeholder="Price sale" required name='price_ch' type='number' min="1"/>
              <label for="price">Price sale</label>
            </div>
          </fieldset>
          <br>
          <fieldset>
            <legend><b>Tour Details (Thai)</b></legend>
            <!--  Text : Tour name  -->
            <div class="input-field" id="name" name="tour_description">

              <input placeholder="Tour description here" required name="tour_description_th" type="text"/>
              <label for="tour_description">Tour description</label>
            </div>
            <!--  Text : Highlight  -->
            <div class="input-field" id="highlight" name='highlight'>
              <input placeholder="Highlight" required name='highlight_th' type='text'/>
              <label for="highlight">Highlight</label>
            </div>
            <!--  Region  -->
            <div  id="region" name='region'>
              <label>Region</label>
              <select class="browser-default" name='region_th' required>
                <option selected value='Northern'>Northern</option>
              </select><br />
            </div>
            <!--  Province  -->
            <div id="province" name='province'>
              <!-- <input placeholder="Province" required name='province_th' type='text'/>
              <label for="province">province</label> -->
              <label>Province</label>
              <select class="browser-default" name='province_th' required>
                <option selected disabled>Please Select</option>
                <option value='Chiang Mai'>Chiang Mai</option>
                <option value='Chiang Rai'>Chiang Rai</option>
                <option value='Lamphun'>Lamphun</option>
                <option value='Lampang'>Lampang</option>
                <option value='Uttaradit'>Uttaradit</option>
                <option value='Phrae'>Phrae</option>
                <option value='Nan'>Nan</option>
                <option value='Phayao'>Phayao</option>
                <option value='Mae Hong Son'>Mae Hong Son</option>
              </select><br />
            </div>
            <!--  Price sale  -->
            <div class="input-field" id="price" name='price'>
              <input placeholder="Price sale" required name='price_th' type='number' min="1"/>
              <label for="price">Price sale</label>
            </div>
          </fieldset>
          <!--Start-End Date-->
        </div>
        <div class="col s12 l6">
          <!--  Max # of customer  -->
          <div class="input-field" id="max" name="max">
            <input placeholder="Max number of customer" required name='max' type='number' min="1"/>
            <label for="max">Max</label>
          </div>
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
                header("location: message.php?msg=error");
              }
            } else{
              header("location: message.php?msg=error");
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
                header("location: message.php?msg=error");
              }
            } else{
              header("location: message.php?msg=error");
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
                header("location: message.php?msg=error");
              }
            } else{
              header("location: message.php?msg=error");
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
              <input type="button" class="add_more_image btn amber" value="Add More Image">
              <span id="limit" style="color: red;"></span>
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
            </div>
          </div>
          <div id="tour_round" class="col s12">
            <div class="section"></div>
            <fieldset>
              <legend>Tour Round</legend>
              <div class="trdate">
                <div class="col s6">
                  <span><b>Start Date</b></span>
                  <input required name='start_date[]' type='date' id="start1" class="start" datagrp="1" onchange="selectStart(this)"/>
                </div>
                <div class="col s6">
                  <span><b>End Date</b></span>
                  <input required name='end_date[]' type='date' id="end1" class="end"  datagrp="1" onchange="selectEnd(this)"/><br>
                </div>
              </div>
              <input type="button" class="add_more_tr btn amber" value="Add More">
            </fieldset>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col s12 center">
          <button class="waves-effect waves-light btn amber" type="submit" name="submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <div class="section"></div>

  <?php
  include 'component/footer.php';
  ?>
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
      }else{
        document.getElementById('limit').innerHTML = "<br>Can not add more image.";
      }
    });

    // add more tour round
    $('.add_more_tr').click(function(e){
      e.preventDefault();
      var e = document.getElementsByClassName('trdate');
      var i;
      var s = 0;
      for(i=0; i < e.length; i++) {
        if(e[i].className=="trdate") {
          s++;
        }
      }
      s++
      //                    $(this).before('<div class="trdate"><div class="col s6"><span><b>Start Date</b></span><input required name="start_date_'+ s +'" type="date" id="start'+s+'" class="start" datagrp="'+s+'" onchange="selectStart(this)"/></div><div class="col s6"><span><b>End Date</b></span><input required name="end_date_'+s+'" type="date" id="end'+s+'" class="end"  datagrp="'+s+'" onchange="selectEnd(this)"/><br></div></div>');
      $(this).before('<div class="trdate"><div class="col s6"><span><b>Start Date</b></span><input required name="start_date[]" type="date" id="start'+s+'" class="start" datagrp="'+s+'" onchange="selectStart(this)"/></div><div class="col s6"><span><b>End Date</b></span><input required name="end_date[]" type="date" id="end'+s+'" class="end"  datagrp="'+s+'" onchange="selectEnd(this)"/><br></div><a href="#" class="remove_field">Remove</a><br /></div>');
    })
    $(this).on("click",".remove_field", function(e){ //user click on remove text
      e.preventDefault(); $(this).parent('div').remove(); ;
      initDate(s);

    });

    initDate();

  });

  </script>
</body>
</html>
