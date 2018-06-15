<?php
include('module/session.php');

require 'module/language/init.php';

error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
// include "lib/pagination.php";
$link = "payment.php";
if(!isset($_SESSION['login_id'])){
  header('location: message.php?msg=please_login');
}

?>

<!DOCTYPE html>
<html>
<?php
$title = "Tour Round";
include 'component/header.php';
?>
<body>
  <!-- Page Content -->
  <div class="container">
    <!-- Content Row -->
    <div class="row">
      <!-- Content Column -->
      <div class="col s12">
        <a href='profile.php?'><button type='button' class='btn amber ' name='button'>Back</button></a>

      </div>
      <div class="container col s12">
        <br/>
        <h3 class="center"><b>Payment</b></h3>
        <input type="text" name="tour_id" id='tour_id' value="<?php echo $tour_id;?>" style="display:none" >
        <table style='overflow-x:auto;' class='responsive-table table table-striped highlight centered'>
          <thead>
            <tr align='center'>
              <th>Reference Code</th>
              <th>Payment Status</th>
              <th>Expiry Date</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php
            if(isset($_SESSION['login_id'])){
              $member_id = $_SESSION['login_id'];
              //-----------------------------Show Payment---------------------------------------------------//
              $sql_show_payment = "SELECT * FROM book_status WHERE member_id = $member_id";
              $result_show_payment = mysqli_query($conn, $sql_show_payment);


              // $result = page_query($GLOBALS['conn'],$sql,2);
              $num_row =mysqli_num_rows($result_show_payment);

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
              $sql_show_payment .=  " LIMIT $page_start,$per_page";
              $result_show_payment = mysqli_query($conn,$sql_show_payment);

              while ($show = mysqli_fetch_array($result_show_payment)) {
                $ref_code = $show['reference_code'];
                $payment_status = $show['status'];
                $expiry_date = $show['expiry_date'];

                switch ($payment_status) {
                  case '1':
                  $status = "Confirmed";
                  break;

                  default:
                  $status = "Not Confirmed";
                  break;
                }

                ?>
                <tr>
                  <td><?php echo $ref_code; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><?php echo $expiry_date; ?></td>
                  <td>
                    <a href='payment_upload_file.php?ref_code=<?php echo $ref_code;?>'><button type='button' class='btn ' name='button'>PAYMENT</button></a>
                  </td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>

      <ul class="pagination">
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

      <!-- /.row -->

    </div>
  </div>
  <?php
  include 'component/footer.php';
  ?>
</body>
</html>
