<?php
include 'db_config.php';

if($_GET['tour_id'] !==''&& $_GET['tour_type']!==''){
$tour_id = $_GET['tour_id'];
$tour_type = $_GET['tour_type'];

$sql ="SELECT t.tour_description,tt.tour_type,ac.accommodation_level,vt.vehicle_type ,t.price,tr.start_date_time,tr.end_date_time,tr.tour_round_id
FROM tour t INNER JOIN tour_vehicle_type tv ON t.tour_id = tv.tour_id
INNER JOIN vehicle_type vt ON tv.vehicle_type_id = vt.vehicle_type_id
INNER JOIN tour_accommodation ta ON t.tour_id = ta.tour_id
INNER JOIN accommodation ac ON ta.accommodation_id = ac.accommodation_id
INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
INNER JOIN tour_type tt on ttt.tour_type_id = tt.tour_type_id
INNER JOIN tour_round tr on t.tour_id = tr.tour_id
WHERE t.tour_id =$tour_id and tt.tour_type ='$tour_type'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);
$tour_description = $data['tour_description'];
$tour_type = $data['tour_type'];
$accommodation = $data['accommodation_level'];
$vehicle = $data['vehicle_type'];
$price = $data['price'];
$tour_round_id = $data['tour_round_id'];
echo "Tour Name : ".$tour_description;
echo "<br> Tour Type : ".$tour_type;
echo "<br> Accommodation : ".$accommodation;
echo "<br> Vehicle : ".$vehicle;
echo "<br> Price : ".$price;

}
?>
<br>
<form action="test_book_tour.php?tour_round_id=<?php echo $tour_round_id?>" method="POST">
<select name="date">
    <option disabled >Date</option>
    <?php
    $sql ="SELECT DISTINCT  tr.start_date_time,tr.end_date_time
    FROM tour t INNER JOIN tour_vehicle_type tv ON t.tour_id = tv.tour_id
    INNER JOIN vehicle_type vt ON tv.vehicle_type_id = vt.vehicle_type_id
    INNER JOIN tour_accommodation ta ON t.tour_id = ta.tour_id
    INNER JOIN accommodation ac ON ta.accommodation_id = ac.accommodation_id
    INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
    INNER JOIN tour_type tt on ttt.tour_type_id = tt.tour_type_id
    INNER JOIN tour_round tr on t.tour_id = tr.tour_id
    WHERE t.tour_id =$tour_id and tt.tour_type ='$tour_type' ";
    $result = mysqli_query($conn,$sql);
    while ($show = mysqli_fetch_array($result)) {
      $start_date_time = date("d-m-Y", strtotime($show['start_date_time']));
      $end_date_time = date("d-m-Y", strtotime($show['end_date_time']));
      echo "<option value='$start_date_time to $end_date_time'>".$start_date_time." to ".$end_date_time."</option>";
    }

    ?>
</select>
<?php
//check total customer
$sql="SELECT t.max_customer FROM tour t WHERE t.tour_id =$tour_id";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);
$total_customer = $data['max_customer'];
//check customer in tour
$sql_2 = "SELECT *
FROM tour_round_member trm INNER JOIN tour_round tr ON trm.tour_round_id = tr.tour_round_id
INNER JOIN tour t ON tr.tour_id = t.tour_id
WHERE t.tour_id= $tour_id";
$result_2 = mysqli_query($conn,$sql_2);
$customer_in_tour = mysqli_num_rows($result_2);
if($total_customer == $customer_in_tour){
  $seat_available = 'No seats available';
}else if($total_customer > $customer_in_tour) {
  // $seat_available = $customer_in_tour."/".$total_customer;
  $seat_available = 'Seat available';
}

?>
<br>Status : <?php echo $seat_available;?>
<br>Amount of people : <input name='amount_people' type='number' min=1 max=<?php echo $total_customer-$customer_in_tour?> style="width: 50px;" required></input>
<button type="submit" name="book">Book</button>
</form>
<!-- <a href="test_book_tour.php?tour_round_id=<?php echo $tour_round_id?>"><button>Book</button></a> -->
