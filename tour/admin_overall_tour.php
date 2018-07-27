<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin'))){
  header('Location: message.php?msg=please_login');
}

require 'module/language/init.php';
// require 'module/language/lang_profile.php';
?>

<!DOCTYPE html>
<html>
<?php
// include 'php_profile_func.php';
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
          <th class="center-align">reserved/max<br />(seats)</th>
          <th class="center-align">checking/waiting/complete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql =  "SELECT distinct * , TR.start_date_time AS date FROM tour_round TR ";
        $sql .= "JOIN tour_en T ON T.tour_id = TR.tour_id ";
        $sql .= "WHERE TR.start_date_time >= CURDATE() ";
        $sql .= "ORDER BY date ASC";
        // echo $sql. "<br>";
        $result = mysqli_query($conn,$sql);

        while($data = mysqli_fetch_array($result)) {

          $tour_round_id = $data['tour_round_id'];
          $tour_description = $data['tour_description'];
          $max_seat = $data['max_customer'];

          // SUM( CASE WHEN BH.status = 3 THEN 1 ELSE 0 END ) AS sum_complete
          $sql2 = "SELECT COUNT( RM.tour_round_member_id ) AS count_booked ";
          $sql2 .= "FROM tour_round TR ";
          $sql2 .= " LEFT JOIN tour_booking_history BH ON BH.tour_round_id = TR.tour_round_id ";
          $sql2 .= " LEFT JOIN tour_round_member RM ON RM.reference_code = BH.reference_code ";
          // $sql2 .= "UNION ";
          // $sql2 .= "SELECT *, COUNT( RM.tour_round_member_id ) AS count_booked ";
          // $sql2 .= "FROM tour_round TR ";
          // $sql2 .= "RIGHT JOIN tour_round_member RM ON RM.id = TR.tour_round_id ";
          // $sql2 .= "JOIN tour_en T ON T.tour_id = TR.tour_id ";
          // $sql2 .= "JOIN tour_booking_history BH ON BH.reference_code = RM.reference_code ";
          $sql2 .= "WHERE TR.tour_round_id = $tour_round_id;";
          // echo $sql2 . "<br>";
          $result2 = mysqli_query($conn,$sql2);
          $data2 = mysqli_fetch_array($result2);

          // print_r($data2);

          $count_booked = $data2['count_booked'];
          // echo $count_booked . "<br>";

          $sql2 = "SELECT SUM( CASE WHEN BH.status = 1 THEN 1 ELSE 0 END ) AS sum_waiting, SUM( CASE WHEN BH.status = 2 THEN 1 ELSE 0 END ) AS sum_checking, SUM( CASE WHEN BH.status = 3 THEN 1 ELSE 0 END ) AS sum_complete ";
          $sql2 .= "FROM tour_booking_history BH ";
          // $sql2 .= "JOIN tour_round_member RM ON RM.reference_code = BH.reference_code ";
          $sql2 .= "WHERE BH.tour_round_id = $tour_round_id;";
          // echo $sql2 . "<br>";
          $result2 = mysqli_query($conn,$sql2);
          $data2 = mysqli_fetch_array($result2);

          $sum_waiting = $data2['sum_waiting'] == "" ? "0" : $data2['sum_waiting'];
          $sum_checking = $data2['sum_checking'] == "" ? "0" : $data2['sum_checking'];
          $sum_complete = $data2['sum_complete'] == "" ? "0" : $data2['sum_complete'];

          ?>
          <tr>
            <td><?php echo $data['tour_description'];?></td>
            <td><?php echo $data['start_date_time'];?></td>
            <td><?php echo $data['end_date_time'];?></td>
            <td><?php echo $count_booked;?>/<?php echo $max_seat;?></td>
            <td>
              <a href="admin_booking_status.php<?php echo "?tour_round_id=" . $tour_round_id?>">
                <?php echo $sum_checking;?>/<?php echo $sum_waiting;?>/<?php echo $sum_complete;?>
              </a>
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
