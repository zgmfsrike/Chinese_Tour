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

    <h2>No payment</h2>
    <table class="responsive-table centered">
      <thead>
        <tr>
          <th class="center-align">Tour description</th>
          <th class="center-align">Start</th>
          <th class="center-align">End</th>
          <th class="center-align">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_SESSION['login_id'];
        $sql =  "SELECT distinct  T.tour_description, TR.start_date_time, TR.end_date_time, BS.status FROM tour_booking_status BS ";
        $sql .= "LEFT JOIN tour_round_member RM ON BS.member_id = RM.id ";
        $sql .= "LEFT JOIN tour_round TR ON RM.tour_round_id = TR.tour_round_id ";
        $sql .= "LEFT JOIN tour_en T ON TR.tour_id = T.tour_id ";
        $sql .= "WHERE BS.status=1";
        // echo $sql;
        $result = mysqli_query($conn,$sql);

        while($data = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $data['tour_description'];?></td>
            <td><?php echo $data['start_date_time'];?></td>
            <td><?php echo $data['end_date_time'];?></td>
            <td><?php echo $data['status'];?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>

    <h2>Waiting for confirmation</h2>
    <table class="responsive-table centered">
      <thead>
        <tr>
          <th class="center-align">Tour description</th>
          <th class="center-align">Start</th>
          <th class="center-align">End</th>
          <th class="center-align">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_SESSION['login_id'];
        $sql =  "SELECT distinct  T.tour_description, TR.start_date_time, TR.end_date_time, BS.status FROM tour_booking_status BS ";
        $sql .= "LEFT JOIN tour_round_member RM ON BS.member_id = RM.id ";
        $sql .= "LEFT JOIN tour_round TR ON RM.tour_round_id = TR.tour_round_id ";
        $sql .= "LEFT JOIN tour_en T ON TR.tour_id = T.tour_id ";
        $sql .= "WHERE BS.status=2";
        // echo $sql;
        $result = mysqli_query($conn,$sql);

        while($data = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $data['tour_description'];?></td>
            <td><?php echo $data['start_date_time'];?></td>
            <td><?php echo $data['end_date_time'];?></td>
            <td><?php echo $data['status'];?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>

    <h2>Payment confirmed</h2>
    <table class="responsive-table centered">
      <thead>
        <tr>
          <th class="center-align">Tour description</th>
          <th class="center-align">Start</th>
          <th class="center-align">End</th>
          <th class="center-align">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_SESSION['login_id'];
        $sql =  "SELECT distinct  T.tour_description, TR.start_date_time, TR.end_date_time, BS.status FROM tour_booking_status BS ";
        $sql .= "LEFT JOIN tour_round_member RM ON BS.member_id = RM.id ";
        $sql .= "LEFT JOIN tour_round TR ON RM.tour_round_id = TR.tour_round_id ";
        $sql .= "LEFT JOIN tour_en T ON TR.tour_id = T.tour_id ";
        $sql .= "WHERE BS.status=3";
        // echo $sql;
        $result = mysqli_query($conn,$sql);

        while($data = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $data['tour_description'];?></td>
            <td><?php echo $data['start_date_time'];?></td>
            <td><?php echo $data['end_date_time'];?></td>
            <td><?php echo $data['status'];?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php
  include 'component/footer.php';
  ?>
</body>
