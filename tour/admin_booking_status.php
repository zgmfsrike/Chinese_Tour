<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';
// require 'module/language/lang_profile.php';
?>

<!DOCTYPE html>
<html>
<?php
include 'php_profile_func.php';
$title = "Booking history";

include 'component/header.php';

$query_tour_round_id = '';
if(isset($_GET['tour_round_id'])){
  $query_tour_round_id .= "AND TR.tour_round_id = " . $_GET['tour_round_id'];
}
?>

<body>
  <!-- body -->
  <div class="container">

    <!-- Waiting -->
    <div class="section"></div>
    <h4><b>Payment slip checking</b></h4>
    <table class="responsive-table centered highlight" style="border: 1px solid gray;border-radius: 8px; overflow-x:auto;">
      <thead>
        <tr>
          <th class="center-align">Tour description</th>
          <th class="center-align">Ref code</th>
          <th class="center-align">Start</th>
          <th class="center-align">End</th>
          <th class="center-align">Details</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql =  "SELECT distinct  T.tour_description, BH.reference_code , TR.start_date_time, TR.end_date_time, BH.status FROM tour_booking_history BH ";
        $sql .= "LEFT JOIN tour_round TR ON BH.tour_round_id = TR.tour_round_id ";
        $sql .= "LEFT JOIN tour_en T ON TR.tour_id = T.tour_id ";
        $sql .= "WHERE BH.status=2 ";
        $sql .= $query_tour_round_id;
        // echo $sql;
        $result = mysqli_query($conn,$sql);

        while($data = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $data['tour_description'];?></td>
            <td><?php echo $data['reference_code'];?></td>
            <td><?php echo $data['start_date_time'];?></td>
            <td><?php echo $data['end_date_time'];?></td>
            <td>
              <a href="booking_detail.php?ref=<?php echo $data['reference_code'];?>"><b>Detail</b></a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <div class="section"></div>

    <!-- No payment -->
    <h4><b>Waiting for payment slip</b></h4>
    <table class="centered highlight responsive-table" style="border: 1px solid gray;border-radius: 8px; overflow-x:auto;">
      <thead>
        <tr>
          <th class="center-align">Tour description</th>
          <th class="center-align">Ref code</th>
          <th class="center-align">Start</th>
          <th class="center-align">End</th>
          <th class="center-align">Details</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql =  "SELECT distinct  T.tour_description, BH.reference_code , TR.start_date_time, TR.end_date_time, BH.status FROM tour_booking_history BH ";
        $sql .= "LEFT JOIN tour_round TR ON BH.tour_round_id = TR.tour_round_id ";
        $sql .= "LEFT JOIN tour_en T ON TR.tour_id = T.tour_id ";
        $sql .= "WHERE BH.status=1 ";
        $sql .= $query_tour_round_id;
        // echo $sql;
        $result = mysqli_query($conn,$sql);

        while($data = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $data['tour_description'];?></td>
            <td><?php echo $data['reference_code'];?></td>
            <td><?php echo $data['start_date_time'];?></td>
            <td><?php echo $data['end_date_time'];?></td>
            <td>
              <a href="booking_detail.php?ref=<?php echo $data['reference_code'];?>"><b>Detail</b></a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <div class="section"></div>

    <!-- Payment confirmed -->
    <h4><b>Complete</b></h4>
    <table class="centered highlight responsive-table" style="border: 1px solid gray;border-radius: 8px; overflow-x:auto;">
      <thead>
        <tr>
          <th class="center-align">Tour description</th>
          <th class="center-align">Ref code</th>
          <th class="center-align">Start</th>
          <th class="center-align">End</th>
          <th class="center-align">Details</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql =  "SELECT distinct  T.tour_description, BH.reference_code , TR.start_date_time, TR.end_date_time, BH.status FROM tour_booking_history BH ";
        $sql .= "LEFT JOIN tour_round TR ON BH.tour_round_id = TR.tour_round_id ";
        $sql .= "LEFT JOIN tour_en T ON TR.tour_id = T.tour_id ";
        $sql .= "WHERE BH.status=3 ";
        $sql .= $query_tour_round_id;
        // echo $sql;
        $result = mysqli_query($conn,$sql);

        while($data = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $data['tour_description'];?></td>
            <td><?php echo $data['reference_code'];?></td>
            <td><?php echo $data['start_date_time'];?></td>
            <td><?php echo $data['end_date_time'];?></td>
            <td>
              <a href="booking_detail.php?ref=<?php echo $data['reference_code'];?>"><b>Detail</b></a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <div class="section"></div>
  </div>

  <?php
  include 'component/footer.php';
  ?>
</body>
