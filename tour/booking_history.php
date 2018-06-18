<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin','member'))){
  header('Location: message.php?msg=please_login');
}

require 'module/language/init.php';
// require 'module/language/lang_profile.php';

if(!isset($_SESSION['login_id'])){
  header("location: message.php");
}
?>

<!DOCTYPE html>
<html>
<?php
include 'php_profile_func.php';
$title = "Booking history";

include 'component/header.php';

$link_tour_detail = 'booking_detail.php?ref=';
?>

<body>
  <!-- body -->
  <div class="container">
    <div class="section"></div>
    <h4><b>Booking History</b></h4>
    <table class="responsive-table centered" style="border: 1px solid gray;border-radius: 8px;">
      <thead>
        <tr>
          <th class="center-align">Ref. code</th>
          <th class="center-align">Tour description</th>
          <th class="center-align">Start</th>
          <th class="center-align">End</th>
          <th class="center-align">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_SESSION['login_id'];
        $sql =  "SELECT distinct  BH.reference_code, T.tour_description, TR.start_date_time, TR.end_date_time, S.status_{$_COOKIE['lang']} AS status, BH.status AS status_id FROM tour_booking_history BH ";
        $sql .= "LEFT JOIN tour_round_member RM ON BH.member_id = RM.id ";
        $sql .= "LEFT JOIN tour_round TR ON RM.tour_round_id = TR.tour_round_id ";
        $sql .= "LEFT JOIN tour_{$_COOKIE['lang']} T ON TR.tour_id = T.tour_id ";
        $sql .= "LEFT JOIN booking_status S ON BH.status = S.id ";
        $sql .= "WHERE BH.member_id=$id";
        // echo $sql;
        $result = mysqli_query($conn,$sql);

        $num_row =mysqli_num_rows($result);

        $per_page = 10;
        $page = $_GET['page'];
        if(!$_GET['page']){
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

        $sql .=  " LIMIT $page_start,$per_page";
        $result = mysqli_query($conn,$sql);

        while($data = mysqli_fetch_array($result)) {
          $ref_code = $data['reference_code'];
          ?>
          <tr>
            <td><?php echo $data['reference_code'];?></td>
            <td><?php echo $data['tour_description'];?></td>
            <td><?php echo $data['start_date_time'];?></td>
            <td><?php echo $data['end_date_time'];?></td>
            <td><?php echo $data['status'];?> <?php echo $data['status_id'] == 1 ? "(<a href='{$link_tour_detail}{$ref_code}')>upload</a>)" : "" ;?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>

    <ul class="pagination center">
      <?php
      if($prev_page){
        echo "<li class='disabled'><a href ='$link?page=$prev_page'><i class='material-icons'>chevron_left</i></a></li>";
      }
      for($i =1;$i<=$num_page;$i++){
        if($i != $page){
          echo "<li><a href='$link?page=$i'>$i</a></li>";
        }else if($i = $page){
          echo "<li class='active'><a href='$link?page=$i'>$i</a></li>";
        }
      }
      if($page !=$num_page){
        echo "<li class='waves-effect'><a href='$link?page=$next_page'><i class='material-icons'>chevron_right</i></a></li>";
      }
      ?>
    </ul>

  </div>

  <?php
  include 'component/footer.php';
  ?>
</body>
