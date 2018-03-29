<?php
// session_cache_limiter('private_no_expire');
include 'module/session.php';
error_reporting (E_ALL ^ E_NOTICE);
include 'db_config.php';
// include 'module/del_book_tour.php';
if(isset($_GET['tour_type'])){
  $tour_type = $_GET['tour_type'];
}
$search_page = "search_tour.php";
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
            <input type="checkbox" id="accommodation1" name="accommodation1" value="1" />
            <label for="accommodation1">1 Star</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="accommodation2" name="accommodation2" value="2" />
            <label for="accommodation2">2 Stars</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="accommodation3" name="accommodation3" value="3"/>
            <label for="accommodation3">3 Stars</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="accommodation4" name="accommodation4"value="4"/>
            <label for="accommodation4">4 Stars</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="accommodation5" name="accommodation5" value="5"/>
            <label for="accommodation5">5 Stars</label>
          </li>
          <li class="collection-item">Vehicle :

            <input type="checkbox" id="vehicle1" name="vehicle1" value="1"/>
            <label for="vehicle1">4-seat</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="vehicle2" name="vehicle2"value="2" />
            <label for="vehicle2">9-seat</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="vehicle3" name="vehicle3" value="3"/>
            <label for="vehicle3">14-seat</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="vehicle4" name="vehicle4" value="4"/>
            <label for="vehicle4">VIP</label>

          </li>
          <li class="collection-item">Region :

            <input type="checkbox" id="region1" name="region1" value="northern" />
            <label for="region1">Northern</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="region2" name="region2" value="central"/>
            <label for="region2">Central</label>

          </li>

          <li class="collection-item">Province :
            <!-- <div class="secondary-content"> -->
            <input type="checkbox" id="province1" name="province1" value="chiangmai" />
            <label for="province1">Chiangmai</label>
            <input type="checkbox" id="province2" name="province2" value="chiangrai" />
            <label for="province2">Chiangrai</label>
            <input type="checkbox" id="province3" name="province3" value="bangkok" />
            <label for="province3">Bangkok</label>
            <!-- </div> -->

          </li>

        </ul>
      </div>

      <!--Search Part2-->
      <div class="row card">
        <div class="input-field col s1">
          <select>
            <option value="" disabled selected>Rating</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="input-field col s2">
          <select>
            <option value="" disabled selected>Popularity</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="input-field col s2">
          <select>
            <option value="" disabled selected>Alphabet</option>
            <option value="1">A to Z</option>
            <option value="2">Z to A</option>
          </select>
        </div>
        <!-- <div class="input-field col s1">
        <select>
        <option value="" disabled selected>Price</option>
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
      </select>
    </div> -->
    <div class="input-field col s1">
      <select name='amount_people' required>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        <option value='7'>7</option>
        <option value='8'>8</option>
        <option value='9'>9</option>
        <option value='10'>10</option>
      </select>
    </div>
    <div class="col s12 l5">
      Price range
      <div class="input-field inline">
        <input type="number" class="validate" min="0" name="price1" value="" onkeyup="validatephone(this);">
        <label></label>
      </div>
      -
      <div class="input-field inline">
        <input type="number" class="validate" min="0" name="price2" value="" onkeyup="validatephone(this);">
        <label></label>
      </div>
    </div>
    <div class="col s1 right">
      <br>
      <input class="btn  red" type="submit" name="search" value="GO">
    </div>

  </div>

</form>




<?php
if($_POST['search']){
  $tour_type_id = $_POST['tour_type_id'];
  $_SESSION['tour_type'] = $tour_type_id;
  // echo $tour_type_id;



  $accommodation_id1 = $_POST['accommodation1'];
  $accommodation_id2 = $_POST['accommodation2'];
  $accommodation_id3 = $_POST['accommodation3'];
  $accommodation_id4 = $_POST['accommodation4'];
  $accommodation_id5 = $_POST['accommodation5'];
  // echo $accommodation_id;
  $vehicle_id1 = $_POST['vehicle1'];
  $vehicle_id2 = $_POST['vehicle2'];
  $vehicle_id3 = $_POST['vehicle3'];
  $vehicle_id4 = $_POST['vehicle4'];
  // if($_POST['region1'] =='' and $_POST['region2'] ==''){
  $region1 =$_POST['region1'];
  $region2 =$_POST['region2'];
  // }


  $province1 =$_POST['province1'];
  $province2 =$_POST['province2'];
  $province3 =$_POST['province3'];

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
  if($accommodation_id1 !="" or $accommodation_id2 !="" or $accommodation_id3 !="" or$accommodation_id4 !="" or $accommodation_id5 !=""){
    $sql .= " AND (ta.accommodation_id ='$accommodation_id1' OR ta.accommodation_id ='$accommodation_id2' OR ta.accommodation_id ='$accommodation_id3'
      OR ta.accommodation_id ='$accommodation_id4' OR ta.accommodation_id ='$accommodation_id5') ";
    }
    if($vehicle_id1 !='' or $vehicle_id2 !='' or $vehicle_id3 !='' or $vehicle_id4 !=''){
      $sql .=" AND (tv.vehicle_type_id='$vehicle_id1' or tv.vehicle_type_id='$vehicle_id2' or tv.vehicle_type_id='$vehicle_id3' or tv.vehicle_type_id='$vehicle_id4' ) ";
    }

    if($region1 !="" or $region2 !=""){
      $sql .=" AND (t.region ='$region1' OR t.region ='$region2') ";
    }
    if($province1 !='' or $province2 !='' or $province3 !=''){
      $sql .= " AND (t.province = '$province1' OR t.province = '$province2' OR t.province = '$province3' )";
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
        <div class='row collection'>
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
