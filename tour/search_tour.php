<?php
// session_cache_limiter('private_no_expire');
include 'module/session.php';
// error_reporting (E_ALL ^ E_NOTICE);
include 'db_config.php';
// include 'module/del_book_tour.php';

require 'module/language/init.php';
// if(isset($_SESSION['tour_id'])){
// $tour_id = $_SESSION['tour_id'];
// }


$search_page = "search_tour.php";
if(isset($_GET['tour_type'])){
  $tour_type = $_GET['tour_type'];
}else{
  $tour_type = 1;
}

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
        <h4 class="center " >Search Tour</h4>
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
    if(isset($_POST['search'])){
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

      $tour = "tour_".$_COOKIE['lang'];


      $sql_search = "SELECT t.tour_description,tt.tour_type,ac.accommodation_level,vt.vehicle_type ,t.price,t.tour_id,t.highlight,t.available_seat
      FROM $tour t INNER JOIN tour_vehicle_type tv ON t.tour_id = tv.tour_id
      INNER JOIN vehicle_type vt ON tv.vehicle_type_id = vt.vehicle_type_id
      INNER JOIN tour_accommodation ta ON t.tour_id = ta.tour_id
      INNER JOIN accommodation ac ON ta.accommodation_id = ac.accommodation_id
      INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
      INNER JOIN tour_type tt on ttt.tour_type_id = tt.tour_type_id WHERE";


      if($tour_type_id!==''){
        $sql_search .= " ttt.tour_type_id =$tour_type_id ";
        // $sql_search.= "AND t.available_seat >=$amount_people";
      }

      for($i=0;$i<=4;$i++){
        if($i == 0 && !empty($accommodation_id[$i])){
          $sql_search .= " AND";
          $sql_search .= "(ta.accommodation_id ='$accommodation_id[$i]'";
          $flag_close_tag_acc = true;
        }else if(!empty($accommodation_id[$i])){
          $sql_search .=" OR ";
          $sql_search .=" ta.accommodation_id ='$accommodation_id[$i]'";
          $flag_close_tag_acc = true;
        }
      }
      if($flag_close_tag_acc == true){
        $sql_search .=")";
      }
      for ($j=0; $j<=3 ; $j++) {
        if($j ==0 && !empty($vehicle_id[$j])){
          $sql_search .=" AND ";
          $sql_search .="(tv.vehicle_type_id = '$vehicle_id[$j]' ";
          $flag_close_tag_vehicle = true;

        }else if(!empty($vehicle_id[$j])){
          $sql_search .= " OR ";
          $sql_search .= " tv.vehicle_type_id = '$vehicle_id[$j]' ";
          $flag_close_tag_vehicle = true;

        }
      }
      if($flag_close_tag_vehicle == true){
        $sql_search .=" )";
      }

      for ($k=0; $k <=1 ; $k++) {
        if ($k ==0 && !empty($region[$k])) {
          $sql_search .= " AND ";
          $sql_search .= "(t.region ='$region[$k]'";
          $flag_close_tag_region = true;
        }else if (!empty($region[$k])) {
          $sql_search .= " OR ";
          $sql_search .= " t.region ='$region[$k]'";
          $flag_close_tag_region = true;
          # code...
        }
      }
      if($flag_close_tag_region == true){
        $sql_search .= ")";
      }


      for ($l=0; $l <=2 ; $l++) {
        if ($l ==0 && !empty($province[$l])) {
          $sql_search .= " AND ";
          $sql_search .= "(t.province = '$province[$l]'";
          $flag_close_tag_pv = true;
        }else if (!empty($province[$l])) {
          $sql_search .= " OR ";
          $sql_search .= "t.province = '$province[$l]'";
          $flag_close_tag_pv = true;
        }
      }
      if($flag_close_tag_pv == true){
        $sql_search .= ")";

      }


      if($price1!='' and $price2 !=''){
        $sql_search .= " AND (t.price BETWEEN $price1 AND $price2)";
      }

      $sql_search .=" GROUP BY t.tour_id";
      $_SESSION['sql_search'] = $sql_search;

      //info per page
      $result = mysqli_query($conn,$sql_search);
      $num_row =mysqli_num_rows($result);
      $per_page = 5;
      if(isset($_GET['page'])){
          $page = $_GET['page'];
      }else{
          $page =1 ;
      }
      $prev_page = $page-1;
      $next_page = $page+1;

      $page_start = (($per_page*$page)-$per_page);

      if($num_row<=$per_page){
        $num_page = 1;
      }else if(($num_row%$per_page)==0){
        $num_page =($num_row/$per_page);
      }else{
        $num_page=($num_row/$per_page)+1;
        $num_page=(int)$num_page;
      }

      $sql_search .=  " ORDER BY t.tour_id ASC LIMIT $page_start,$per_page";


      $result = mysqli_query($conn,$sql_search);
      $count = mysqli_num_rows($result);
      // echo $sql_search."<br>";
      // echo "this is id ".$id;








      if($count !==0){


        while($show = mysqli_fetch_array($result)) {
          $tour_id = $show['tour_id'];
          $tour_type = $show['tour_type'];
          $seat_in_tour = $show['available_seat'];

          $sql_tour = "SELECT * FROM `tour_tour_type` INNER JOIN `tour_type` ON tour_tour_type.tour_type_id=tour_type.tour_type_id WHERE tour_id = $tour_id";
          $result_tour = mysqli_query($conn, $sql_tour);
          $tour_type_all ="";
          while ($type = mysqli_fetch_array($result_tour)) {
            $tour_type_all .= $type['tour_type']." ";
            # code...
          }

          $sql_acc = "SELECT * FROM `tour_accommodation` INNER JOIN `accommodation` ON tour_accommodation.accommodation_id=accommodation.accommodation_id WHERE tour_id = $tour_id";
          $result_acc = mysqli_query($conn, $sql_acc);
          $acc_all = "";

          while ($acc = mysqli_fetch_array($result_acc)) {
            $acc_all .= $acc['accommodation_level']." ";
            # code...
          }

          $sql_v = "SELECT * FROM `tour_vehicle_type` INNER JOIN `vehicle_type` ON tour_vehicle_type.vehicle_type_id=vehicle_type.vehicle_type_id WHERE tour_id = $tour_id";
          $result_v = mysqli_query($conn, $sql_v);
          $vehicle_all  = "";

          while ($v_all = mysqli_fetch_array($result_v)) {
            $vehicle_all .= $v_all['vehicle_type']." ";
            # code...
          }


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
          <h6>Tour Type :" .$tour_type_all .  "</h6>
          <h6>Accommodation :" .$acc_all .  "</h6>
          <h6>Vehicle : " .$vehicle_all.  "</h6>
          </div>
          <div class='col s12 l3 right-align'>
          <br/><br/>
          <h5>฿ " .$show['price'] .  "</h5>
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
        ?>
        <div class="right-align">
          <ul class="pagination">
            <?php

              if($prev_page){
                echo "<li class='disabled'><a href ='search_tour.php?page=$prev_page&seat=$amount_people'><i class='material-icons'>chevron_left</i></a></li>";
              }
              for($i =1;$i<=$num_page;$i++){
                if($i != $page){
                  echo "<li><a href='search_tour.php?page=$i&seat=$amount_people'>$i</a></li>";
                }else if($i = $page){
                  echo "<li class='active'><a href='search_tour.php?page=$i&seat=$amount_people'>$i</a></li>";
                }
              }
              if($page !=$num_page){
                echo "<li class='waves-effect'><a href='search_tour.php?page=$next_page&seat=$amount_people'><i class='material-icons'>chevron_right</i></a></li>";
              }


            ?>
          </ul>
        </div>

        <?php
      }else {
        echo "<h1>Nothing found</h1>";
      }
    }else if(isset($_GET['page'])){
      if(isset($_SESSION['sql_search'])){
        if(isset($_GET['seat'])){
          $amount_people = $_GET['seat'];

        }
        $sql_search = $_SESSION['sql_search'];
        $result = mysqli_query($conn,$sql_search);
        $num_row =mysqli_num_rows($result);
        $per_page = 5;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page =1 ;
        }
        $prev_page = $page-1;
        $next_page = $page+1;

        $page_start = (($per_page*$page)-$per_page);

        if($num_row<=$per_page){
          $num_page = 1;
        }else if(($num_row%$per_page)==0){
          $num_page =($num_row/$per_page);
        }else{
          $num_page=($num_row/$per_page)+1;
          $num_page=(int)$num_page;
        }
        $sql_search .=  " ORDER BY t.tour_id ASC LIMIT $page_start,$per_page";
        $result = mysqli_query($conn,$sql_search);
        $count = mysqli_num_rows($result);

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
          ?>
          <div class="right-align">
            <ul class="pagination">
              <?php

                if($prev_page){
                  echo "<li class='disabled'><a href ='search_tour.php?page=$prev_page&seat=$amount_people'><i class='material-icons'>chevron_left</i></a></li>";
                }
                for($i =1;$i<=$num_page;$i++){
                  if($i != $page){
                    echo "<li><a href='search_tour.php?page=$i&seat=$amount_people'>$i</a></li>";
                  }else if($i = $page){
                    echo "<li class='active'><a href='search_tour.php?page=$i&seat=$amount_people'>$i</a></li>";
                  }
                }
                if($page !=$num_page){
                  echo "<li class='waves-effect'><a href='search_tour.php?page=$next_page&seat=$amount_people'><i class='material-icons'>chevron_right</i></a></li>";
                }


              ?>
            </ul>
          </div>



    <?php

      }else {
        echo "<h1>Nothing found</h1>";
      }



      }


    }


    ?>


    <!--Pages-->

    <br/>
  </div>

  <!---                  Mobile Verison                  -->

  <!--Footer-->

  <?php
  include 'component/footer.php';
  ?>

</body>
</html>
