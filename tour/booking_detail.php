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
$title = "Booking Detail";

include 'component/header.php';

$ref_code = $_GET['ref'];
?>

<body>
  <!-- body -->
  <div class="container">

    <!-- Waiting -->
    <h2>Booking detail</h2>
    <table class="responsive-table centered">
      <tbody>
        <?php
        $id = $_SESSION['login_id'];
        $sql =  "SELECT distinct  T.tour_description, BH.reference_code , TR.start_date_time, TR.end_date_time, BH.status FROM tour_booking_history BH ";
        $sql .= "LEFT JOIN tour_round_member RM ON BH.member_id = RM.id ";
        $sql .= "LEFT JOIN tour_round TR ON RM.tour_round_id = TR.tour_round_id ";
        $sql .= "LEFT JOIN tour_en T ON TR.tour_id = T.tour_id ";
        $sql .= "WHERE BH.reference_code = '$ref_code'";
        // echo $sql;
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($result)
        ?>
        <tr>
          <td><?php echo $data['tour_description'];?></td>
          <td><?php echo $data['reference_code'];?></td>
          <td><?php echo $data['start_date_time'];?></td>
          <td><?php echo $data['end_date_time'];?></td>
          <td>
            <a href="booking_detail.php?ref=<?php echo $data['reference_code'];?>">>Detail<</a>
          </td>
        </tr>
      </tbody>
    </table>

  </div>

  <?php
  include 'component/footer.php';
  ?>
</body>
