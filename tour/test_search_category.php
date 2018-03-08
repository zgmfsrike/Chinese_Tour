<?php
include 'db_config.php';

$tour_type = '1';
$accommodation = '';
$vehicle = '';

$region1 = '';
$region2 = '';
$region3 = '';
$province1 = '';
$province2 = '';
$province3 = '';
$price1 = '0';
$price2 = '0';

$sql = 'SELECT t.tour_description,tt.tour_type,ac.accommodation_level,vt.vehicle_type ,t.price,t.tour_id,t.highlight
FROM tour t INNER JOIN tour_vehicle_type tv ON t.tour_id = tv.tour_id
INNER JOIN vehicle_type vt ON tv.vehicle_type_id = vt.vehicle_type_id
INNER JOIN tour_accommodation ta ON t.tour_id = ta.tour_id
INNER JOIN accommodation ac ON ta.accommodation_id = ac.accommodation_id
INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
INNER JOIN tour_type tt on ttt.tour_type_id = tt.tour_type_id WHERE';
if($tour_type!==''){
  $sql .= " ttt.tour_type_id =$tour_type " ;
}
if($accommodation !== ''){
  $sql .= " AND ta.accommodation_id =$accommodation  ";
}
if($vehicle !==''){
  $sql .=" AND tv.vehicle_type_id=$vehicle ";
}
if($region1 !=='' or $region2 !== '' or $region3 !== ''){
  $sql .=" AND (t.region ='$region1' OR t.region ='$region2' OR t.region ='$region3') ";
}
if($province1 !=='' or $province2 !=='' or $province3 !==''){
  $sql .= " AND (t.province = '$province1' OR t.province = '$province2' OR t.province = '$province3' )";
}
if($price1 !=='0' && $price2 !=='0'){
  $sql .= " AND (t.price BETWEEN $price1 AND $price2)";
}
// echo $sql;
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
echo "Row : ".$count."<br>";
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

?>
