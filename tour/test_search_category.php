<?php
session_cache_limiter('private_no_expire');
error_reporting (E_ALL ^ E_NOTICE);
include('module/session.php');
include 'db_config.php';
include 'module/del_book_tour.php';
if(isset($_GET['tour_type'])){
  $tour_type = $_GET['tour_type'];
}
$search_page = "test_search_category.php?";
?>
<form action="<?php echo $search_page; ?>" method="post">
  <div>Tour type :
    <select name='tour_type_id'>
      <option value='1'<?php if($tour_type =="casual") echo "selected";?>>Casual</option>
      <option value='2'<?php if($tour_type =="meeting") echo "selected";?>>Meeting</option>
      <option value='3'<?php if($tour_type =="incentive") echo "selected";?>>Incentive</option>
      <option value='4'<?php if($tour_type =="convention") echo "selected";?>>Convention</option>
      <option value='5'<?php if($tour_type =="exhibition") echo "selected";?>>Exhibition</option>
      <option value='6'<?php if($tour_type =="business") echo "selected";?>>Business</option>
    </select>
  </div>
  <div>Accommodation :
    <select name='accommodation_id'>
      <option value="">Please select</option>
      <option value='1'>1-star</option>
      <option value='2'>2-star</option>
      <option value='3'>3-star</option>
      <option value='4'>4-star</option>
      <option value='5'>5-star</option>
    </select>
  </div>
  <div>Vehicle :
    <select name='vehicle_id'>
      <option value="">Please select</option>
      <option value='1'>4-seat</option>
      <option value='2'>9-seat</option>
      <option value='3'>14-seat</option>
      <option value='4'>VIP</option>
    </select>
  </div>
  <div>Region :
    <input type="checkbox" id="region1" name="region1" value="northern" />
    <label for="region1">Northern</label>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" id="region2" name="region2" value="central"/>
    <label for="region2">Central</label>
  </div>
  <div>Province :
    <input type="checkbox" id="province1" name="province1" value="chiangmai" />
    <label for="province1">Chiangmai</label>
    <input type="checkbox" id="province2" name="province2" value="chiangrai" />
    <label for="province2">Chiangrai</label>
    <input type="checkbox" id="province3" name="province3" value="bangkok" />
    <label for="province3">Bangkok</label>
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

  <input type="submit" name="search" value="search">
</form>


<?php

if($_POST['search']){
  $tour_type_id = $_POST['tour_type_id'];
  // echo $tour_type_id;
  $accommodation_id = $_POST['accommodation_id'];
  // echo $accommodation_id;
  $vehicle_id = $_POST['vehicle_id'];
  // if($_POST['region1'] =='' and $_POST['region2'] ==''){
    $region1 =$_POST['region1'];
    $region2 =$_POST['region2'];
  // }


  $province1 =$_POST['province1'];
  $province2 =$_POST['province2'];

  $province3 =$_POST['province3'];

  $price1 = $_POST['price1'];
  $price2 = $_POST['price2'];

  $sql = 'SELECT t.tour_description,tt.tour_type,ac.accommodation_level,vt.vehicle_type ,t.price,t.tour_id,t.highlight
  FROM tour t INNER JOIN tour_vehicle_type tv ON t.tour_id = tv.tour_id
  INNER JOIN vehicle_type vt ON tv.vehicle_type_id = vt.vehicle_type_id
  INNER JOIN tour_accommodation ta ON t.tour_id = ta.tour_id
  INNER JOIN accommodation ac ON ta.accommodation_id = ac.accommodation_id
  INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
  INNER JOIN tour_type tt on ttt.tour_type_id = tt.tour_type_id WHERE';
  if($tour_type_id!==''){
    $sql .= " ttt.tour_type_id =$tour_type_id " ;
  }
  if($accommodation_id != ''){
    $sql .= " AND ta.accommodation_id =$accommodation_id  ";
  }
  if($vehicle_id !=''){
    $sql .=" AND tv.vehicle_type_id=$vehicle_id ";
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
  // echo $sql."<br>";
  $result = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result);
  if($count !==0){
    // echo "Row : ".$count."<br>";
    echo "<table style='overflow-x:auto;' class='responsive-table table table-striped highlight centered'>";
    echo "<thead>";
    echo "<tr align='center'><th>Tour Name</th><th>Tour Type</th><th>Accommodation</th><th>Vehicle</th><th>Price</th>";
    echo "</tr>";
    echo "</thead>";
    while($show = mysqli_fetch_array($result)) {
      $tour_id = $show['tour_id'];
      $tour_type = $show['tour_type'];
      echo "<tr>";
      echo "<td align ='center'>" .$show['tour_description'] .  "</td> ";
      echo "<td align ='center'>" .$show['tour_type'] .  "</td> ";
      echo "<td align ='center'>" .$show['accommodation_level'] .  "</td> ";
      echo "<td align ='center'>" .$show['vehicle_type'] .  "</td> ";
      echo "<td align ='center'>" .$show['price'] .  "</td> ";
      echo "<td align ='center'><a href='test_tour_select.php?tour_id=$tour_id&tour_type=$tour_type'><button class='waves-effect waves-light btn green' type='button' value='View'>Select</button></a></td>";
      echo "</tr>";

    }
    echo "</table>";
  }else {
    echo "Nothning found";
  }

}


?>
