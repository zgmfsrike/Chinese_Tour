<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin','member'))){
  header('Location: message.php?msg=please_login');
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
?>

<body>
  <!-- body -->
  <div class="container">

    <!-- Waiting -->
    <div class="section"></div>
    <h4><b>Overall</b></h4>
    <table class="responsive-table centered highlight" style="border: 1px solid gray;border-radius: 8px; overflow-x:auto;">
      <thead>
        <tr>
          <th class="center-align">Tour description</th>
          <th class="center-align">Start</th>
          <th class="center-align">End</th>
          <th class="center-align">booked/all</th>
          <th class="center-align">waiting/checking/completed</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql =  "SELECT distinct T.tour_id, T.tour_description, T.max_customer, TR.start_date_time, TR.end_date_time, RM.reference_code, BH.status FROM tour_en T ";
        $sql .= "FULL JOIN tour_round TR ON TR.tour_id = T.tour_id ";
        $sql .= "FULL JOIN tour_round_member RM ON RM.tour_round_id = TR.tour_round_id ";
        $sql .= "FULL JOIN tour_booking_history BH ON BH.reference_code = RM.reference_code ";
        $sql .= "WHERE TR.start_date_time >= CURDATE();";
        echo $sql. "<br>";
        $result = mysqli_query($conn,$sql);

        while($data = mysqli_fetch_array($result)) {

          $sql2 = "SELECT TR.tour_round_id, T.max_customer, COUNT( RM.tour_round_member_id ) AS count_booked, SUM( CASE WHEN BH.status = 3 THEN 1 ELSE 0 END ) AS sum_complete ";
          $sql2 .= "FROM tour_round TR ";
          $sql2 .= "JOIN tour_round_member RM ON RM.id = TR.tour_round_id ";
          $sql2 .= "JOIN tour_en T ON T.tour_id = TR.tour_id ";
          $sql2 .= "JOIN tour_booking_history BH ON BH.reference_code = RM.reference_code ";
          $sql2 .= "WHERE TR.start_date_time >= CURDATE();";
          // echo $sql2 . "<br>";
          ?>
          <tr>
            <td><?php echo $data['tour_description'];?></td>
            <td><?php echo $data['start_date_time'];?></td>
            <td><?php echo $data['end_date_time'];?></td>
            <td></td>
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
