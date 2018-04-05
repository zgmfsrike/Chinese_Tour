<?php
// session_cache_limiter('private_no_expire');
include 'module/session.php';
// error_reporting (E_ALL ^ E_NOTICE);
include 'db_config.php';
// include 'module/del_book_tour.php';

require 'module/language/init.php';

if(isset($_GET['tour_type'])){
  $tour_type = $_GET['tour_type'];
}else{
  $tour_type = 1;
}
$search_page = "search_tour.php";
if(isset($_POST['tour_type_id'])){
  $tour_type = $_POST['tour_type_id'];

}
if(isset($_POST['amount_people'])){
  $amount_people = $_POST['amount_people'];
}
if(!empty($_POST['accommodation'])){
  $accommodation_id = $_POST['accommodation'];
}
// echo $accommodation_id;
if(!empty($_POST['vehicle'])){
  $vehicle_id = $_POST['vehicle'];
}

if(!empty($_POST['region'])){
  $region = $_POST['region'];
}

if(!empty($_POST['province'])){
  $province = $_POST['province'];
}
?>
<!DOCTYPE html>
<html>
<?php
$title = "Search Tour";
include 'component/header.php';


?>
<body>

  <div class="container">
    <!-- Desktop Version -->
    <form action="<?php echo $search_page; ?>" method="post">
      <!--Search Part 1-->
      <div class="row">
        <div class="section"></div>
        <h4 class="center">Search Tour</h4>
        <ul class="collection">

          <li class="collection-item">Tour Type
            <select class="browser-default" name='tour_type_id'>
              <option value='1'<?php if($tour_type =="1") echo "selected";?>>Casual</option>
              <option value='2'<?php if($tour_type =="2") echo "selected";?>>Meeting</option>
              <option value='3'<?php if($tour_type =="3") echo "selected";?>>Incentive</option>
              <option value='4'<?php if($tour_type =="4") echo "selected";?>>Convention</option>
              <option value='5'<?php if($tour_type =="5") echo "selected";?>>Exhibition</option>
              <option value='6'<?php if($tour_type =="6") echo "selected";?>>Business</option>
            </select>
          </li>
          <li class="collection-item">Accommodation :
            <input type="checkbox" id="accommodation1" name="accommodation[]" value="1" <?php  if(!empty($accommodation_id)){foreach ($accommodation_id as $key => $value) {if($value ==1) echo "checked";};};?>  />
            <label for="accommodation1">1 Star</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="accommodation2" name="accommodation[]" value="2"<?php  if(!empty($accommodation_id)){foreach ($accommodation_id as $key => $value) {if($value ==2) echo "checked";};};?>  />
            <label for="accommodation2">2 Stars</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="accommodation3" name="accommodation[]" value="3"<?php  if(!empty($accommodation_id)){foreach ($accommodation_id as $key => $value) {if($value ==3) echo "checked";};};?> />
            <label for="accommodation3">3 Stars</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="accommodation4" name="accommodation[]"value="4"<?php  if(!empty($accommodation_id)){foreach ($accommodation_id as $key => $value) {if($value ==4) echo "checked";};};?> />
            <label for="accommodation4">4 Stars</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="accommodation5" name="accommodation[]" value="5"<?php  if(!empty($accommodation_id)){foreach ($accommodation_id as $key => $value) {if($value ==5) echo "checked";};};?> />
            <label for="accommodation5">5 Stars</label>
          </li>
          <li class="collection-item">Vehicle :

            <input type="checkbox" id="vehicle1" name="vehicle[]" value="1"<?php  if(!empty($vehicle_id)){foreach ($vehicle_id as $key => $value) {if($value ==1) echo "checked";};};?>/>
            <label for="vehicle1">4-seat</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="vehicle2" name="vehicle[]"value="2" <?php  if(!empty($vehicle_id)){foreach ($vehicle_id as $key => $value) {if($value ==2) echo "checked";};};?>/>
            <label for="vehicle2">9-seat</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="vehicle3" name="vehicle[]" value="3"<?php  if(!empty($vehicle_id)){foreach ($vehicle_id as $key => $value) {if($value ==3) echo "checked";};};?>/>
            <label for="vehicle3">14-seat</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="vehicle4" name="vehicle[]" value="4"<?php  if(!empty($vehicle_id)){foreach ($vehicle_id as $key => $value) {if($value ==4) echo "checked";};};?>/>
            <label for="vehicle4">VIP</label>

          </li>
          <li class="collection-item">Region :

            <input type="checkbox" id="region1" name="region[]" value="northern" <?php if(!empty($region)){foreach ($region as $key => $value) {if($value =="northern") echo "checked";};};?> />
            <label for="region1">Northern</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="region2" name="region[]" value="central" <?php if(!empty($region)){foreach ($region as $key => $value) {if($value =="central") echo "checked";};};?>/>
            <label for="region2">Central</label>

          </li>

          <li class="collection-item">Province :
            <!-- <div class="secondary-content"> -->
            <input type="checkbox" id="province1" name="province[]" value="chiangmai" <?php if(!empty($province)){foreach ($province as $key => $value){if($value =="chiangmai") echo "checked";};};?> />
            <label for="province1">Chiangmai</label>
            <input type="checkbox" id="province2" name="province[]" value="chiangrai"<?php if(!empty($province)){foreach ($province as $key => $value){if($value =="chiangrai") echo "checked";};};?> />
            <label for="province2">Chiangrai</label>
            <input type="checkbox" id="province3" name="province[]" value="bangkok" <?php if(!empty($province)){foreach ($province as $key => $value){if($value =="bangkok") echo "checked";};};?>/>
            <label for="province3">Bangkok</label>
            <!-- </div> -->

          </li>

        </ul>
      </div>

      <!--Search Part2-->
      <div class="row ">
        <div class="collection">
          <br class="hide-on-med-and-down" />
          <div class="col s12 l2">
            <label class="show-on-medium-and-down hide-on-large-only">Rating</label>
            <select class="browser-default">
              <option value="" disabled selected>Rating</option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
            </select>
          </div>
          <div class="col s12 l2">
            <label class="show-on-medium-and-down hide-on-large-only">Popularity</label>
            <select class="browser-default">
              <option value="" disabled selected>Popularity</option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
            </select>
          </div>
          <div class="col s12 l1">
            <label class="show-on-medium-and-down hide-on-large-only">Alphabet</label>
            <select class="browser-default">
              <option value="" disabled selected>Alphabet</option>
              <option value="1">A to Z</option>
              <option value="2">Z to A</option>
            </select>
          </div>
          <div class="col s12 l1">
            <label class="show-on-medium-and-down hide-on-large-only">Price</label>
            <select class="browser-default">
              <option value="" disabled selected>Price</option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
            </select>
            <br class="hide-on-med-and-down" />
          </div>
          <div class="col s12 l1">
            <label class="show-on-medium-and-down hide-on-large-only">Amount of People</label>
            <select class="browser-default" name='amount_people' required>
              <option value="" disabled selected>Amount of People</option>
              <option value='1' <?php if(isset($amount_people) && $amount_people ==1) echo "selected";?>>1</option>
              <option value='2'<?php if(isset($amount_people) && $amount_people ==2) echo "selected";?>>2</option>
              <option value='3'<?php if(isset($amount_people) && $amount_people ==3) echo "selected";?>>3</option>
              <option value='4'<?php if(isset($amount_people) && $amount_people ==4) echo "selected";?>>4</option>
              <option value='5'<?php if(isset($amount_people) && $amount_people ==5) echo "selected";?>>5</option>
              <option value='6'<?php if(isset($amount_people) && $amount_people ==6) echo "selected";?>>6</option>
              <option value='7'<?php if(isset($amount_people) && $amount_people ==7) echo "selected";?>>7</option>
              <option value='8'<?php if(isset($amount_people) && $amount_people ==8) echo "selected";?>>8</option>
              <option value='9'<?php if(isset($amount_people) && $amount_people ==9) echo "selected";?>>9</option>
              <option value='10'<?php if(isset($amount_people) && $amount_people ==10) echo "selected";?>>10</option>
            </select>
          </div>
          <div class="col s12 l4">
            <div class="input-field inline">
              <text class="left">Price range&emsp;</text>
              <input name="price1" type="number" class="validate browser-default col s3" min="0" onkeyup="validatephone(this);" placeholder="1000">
              <span class="col s1">-</span>
              <input name="price2" type="number" class="validate browser-default col s3" min="0" onkeyup="validatephone(this);" placeholder="9000">
            </div>
          </div>
          <div class="col s12 l1 center">
            <input class="btn red" type="submit" name="search" value="GO">
            <br/><br/>
          </div>
        </div>
      </div>

    </form>




    <?php
    if($_POST['search']){
      $tour_type_id = $_POST['tour_type_id'];
      $_SESSION['tour_type'] = $tour_type_id;
      // echo $tour_type_id;
      $flag_close_tag_acc = false;
      $flag_close_tag_vehicle = false;
      $flag_close_tag_region= false;
      $flag_close_tag_pv = false;





      $price1 = $_POST['price1'];
      $price2 = $_POST['price2'];

      $amount_people = $_POST['amount_people'];


      $sql = 'SELECT t.tour_description,tt.tour_type,ac.accommodation_level,vt.vehicle_type ,t.price,t.tour_id,t.highlight,t.available_seat
      FROM tour t INNER JOIN tour_vehicle_type tv ON t.tour_id = tv.tour_id
      INNER JOIN vehicle_type vt ON tv.vehicle_type_id = vt.vehicle_type_id
      INNER JOIN tour_accommodation ta ON t.tour_id = ta.tour_id
      INNER JOIN accommodation ac ON ta.accommodation_id = ac.accommodation_id
      INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
      INNER JOIN tour_type tt on ttt.tour_type_id = tt.tour_type_id WHERE';
      if($tour_type_id!==''){
        $sql .= " ttt.tour_type_id =$tour_type_id AND t.available_seat >=$amount_people" ;
      }

      for($i=0;$i<=4;$i++){
        if($i == 0 && !empty($accommodation_id[$i])){
          $sql .= " AND";
          $sql .= "(ta.accommodation_id ='$accommodation_id[$i]'";
          $flag_close_tag_acc = true;
        }else if(!empty($accommodation_id[$i])){
          $sql .=" OR ";
          $sql .=" ta.accommodation_id ='$accommodation_id[$i]'";
          $flag_close_tag_acc = true;
        }
      }
      if($flag_close_tag_acc == true){
        $sql .=")";
      }
      for ($j=0; $j<=3 ; $j++) {
        if($j ==0 && !empty($vehicle_id[$j])){
          $sql .=" AND ";
          $sql .="(tv.vehicle_type_id = '$vehicle_id[$j]' ";
          $flag_close_tag_vehicle = true;

        }else if(!empty($vehicle_id[$j])){
          $sql .= " OR ";
          $sql .= " tv.vehicle_type_id = '$vehicle_id[$j]' ";
          $flag_close_tag_vehicle = true;

        }
      }
      if($flag_close_tag_vehicle == true){
        $sql .=" )";
      }

      for ($k=0; $k <=1 ; $k++) {
        if ($k ==0 && !empty($region[$k])) {
          $sql .= " AND ";
          $sql .= "(t.region ='$region[$k]'";
          $flag_close_tag_region = true;
        }else if (!empty($region[$k])) {
          $sql .= " OR ";
          $sql .= " t.region ='$region[$k]'";
          $flag_close_tag_region = true;
          # code...
        }
      }
      if($flag_close_tag_region == true){
        $sql .= ")";
      }


      for ($l=0; $l <=2 ; $l++) {
        if ($l ==0 && !empty($province[$l])) {
          $sql .= " AND ";
          $sql .= "(t.province = '$province[$l]'";
          $flag_close_tag_pv = true;
        }else if (!empty($province[$l])) {
          $sql .= " OR ";
          $sql .= "t.province = '$province[$l]'";
          $flag_close_tag_pv = true;
        }
      }
      if($flag_close_tag_pv == true){
        $sql .= ")";

      }


      if($price1!='' and $price2 !=''){
        $sql .= " AND (t.price BETWEEN $price1 AND $price2)";
      }

      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);
      // echo $sql."<br>";




      if($count !==0){
        while($show = mysqli_fetch_array($result)) {
          $tour_id = $show['tour_id'];
          $tour_type = $show['tour_type'];
          $seat_in_tour = $show['available_seat'];


          $link = "tour.php?id=".$tour_id."&seat=".$amount_people;


          echo "
          <div class='row collection hide-on-med-and-down'>
          <div class='row'>
          <div class='col s12 l4'>
          <img class='materialboxed' width='250' src='images/wechatQR.jpg'>
          </div>
          <div class='col s12 l4'>
          <br/>
          <h5><a href='tour.php?id=$tour_id'>" .$show['tour_description'] .  "</a></h5>
          <h6>Tour Type :" .$show['tour_type'] .  "</h6>
          <h6>Accommodation :" .$show['accommodation_level'] .  "</h6>
          <h6>Vehicle : " .$show['vehicle_type'] .  "</h6>
          </div>
          <div class='col s12 l3 right-align'>
          <br/><br/>
          <h5>฿ " .$show['price'] .  "</h5>
          <h6>Available Seat :".$seat_in_tour."</h6><br/>
          <a href='$link'><button type='button' class='btn ' name='button'>Select</button></a>
          </div>
          </div>
          </div>

          <div class='row collection show-on-medium-and-down hide-on-large-only'>
          <div class='row center'>
          <div class='col s12 l4'>
          <img class='materialboxed' width='250' src='images/wechatQR.jpg'>
          </div>
          <div class='col s12 l4'>
          <br/>
          <h5><a href='tour.php?id=$tour_id'>" .$show['tour_description'] .  "</a></h5>
          <h6>Tour Type :" .$show['tour_type'] .  "</h6>
          <h6>Accommodation :" .$show['accommodation_level'] .  "</h6>
          <h6>Vehicle : " .$show['vehicle_type'] .  "</h6>
          </div>
          <div class='col s12 l3 right-align'>
          <br/><br/>
          <h5>฿ " .$show['price'] .  "</h5>
          <h6>Available Seat :".$seat_in_tour."</h6><br/>
          <a href='$link'><button type='button' class='btn ' name='button'>Select</button></a>
          </div>
          </div>
          </div>
          ";

        }
      }else {
        echo "Nothning found";
      }
    }


    ?>


    <!--Pages-->
    <div class="right-align">
      <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!">4</a></li>
        <li class="waves-effect"><a href="#!">5</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
      </ul>
    </div>
    <br/>
  </div>

  <!---                  Mobile Verison                  -->

  <!--Footer-->

  <?php
  include 'component/footer.php';
  ?>

</body>
</html>
