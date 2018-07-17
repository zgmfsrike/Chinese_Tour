<?php
include 'module/session.php';
if(!isLoginAs(array('admin','member'))){
  header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';

error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
include "lib/pagination.php";

?>
<?php
// include('module/session.php');

?>

<!DOCTYPE html>
<html>
<?php
$title = "Tour Member";
include 'component/header.php';
?>
<body>

  <!-- Page Content -->
  <div class="container">
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col s12">
        <ul>
          <li>
            <h3 class="center"><b>Tour Round Member</b></h3>
          </li>
          <li class="right">
            <?php
            if(isLoginAs(array('admin'))){
              ?>
              <a href='tour_send_mail_all.php?tour_round_id=<?php echo $_GET['tour_round_id']; ?>'><input class='btn green' type='button' value='Send E-mail All'></a>
              <!-- <input type="button" class="waves-effect waves-light btn amber" value="Send All" name ="send_all" onclick="window.location.href ='http://localhost:8080/ChineseTour/Chinese_Tour/ChineseTour_NewTheme%20copy/tour_send_mail_all.php?tour_round_id=<?php echo $tour_round_id; ?>'"> -->
              <?php
            } ?>
          </li>
        </ul>
      </div>
    </div>
    <?php
    if(isset($_SESSION['login_id'])){


      //-----------------------------Search fucntion----------------------------------------------------//
      if($_GET['tour_round_id'] != ""){


        $sql= "SELECT trm.first_name,trm.middle_name,trm.last_name,trm.passport_id,trm.reservation_age,trm.avoid_food,trm.tour_round_member_id,trm.email
        FROM tour_round_member trm INNER JOIN tour_round tr ON trm.tour_round_id = tr.tour_round_id INNER JOIN member m ON trm.id = m.id
        WHERE trm.tour_round_id = $tour_round_id ";
        // $result = mysqli_query( $GLOBALS['conn'] , $sql );
        $result = page_query($GLOBALS['conn'],$sql,2);
        echo "<table style='overflow-x:auto; border: 1px solid gray;' class='responsive-table table table-striped highlight centered'>";
        echo "<thead>";
        echo "<tr align='center'><th>Member ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Passport Id</th><th>Reservation Age</th><th>Avoid Food</th><th>Email</th>";
        echo "</tr>";
        echo "</thead>";
        while($show = mysqli_fetch_array($result)) {
          $member_id = $show['tour_round_member_id'];

          echo "<tr>";
          echo "<td align ='center'>" . $member_id.  "</td> ";
          echo "<td align ='center'>" .$show['first_name'] .  "</td> ";
          echo "<td align ='center'>" .$show['middle_name'] .  "</td> ";
          echo "<td align ='center'>" .$show['last_name'] .  "</td> ";
          echo "<td align ='center'>" .$show['passport_id'] .  "</td> ";
          echo "<td align ='center'>" .$show['reservation_age'] .  "</td> ";
          echo "<td align ='center'>" .$show['avoid_food'] .  "</td> ";
          echo "<td align ='center'><a href='tour_send_mail.php?member_id=$member_id'>" .$show['email'] .  "</a></td> ";
          // echo "<td align ='center'><input  type='button' value='Send Mail' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/tour_send_mail.php?member_id=$member_id.'\"></td>";
          echo "</tr>";
        }
        echo "</table>";


      }
    }

    ?>
    <ul class="center">
      <?php
      page_echo_pagenums(6,true,true);
      ?>

    </ul>


    <!-- /.row -->


  </div>
  <?php
  include 'component/footer.php';
  ?>
  <?php
  if(isset($_SESSION['login_id'])){

    //-----------------------------Search fucntion----------------------------------------------------//
    if($_GET['tour_round_id'] != ""){

      $tour_round_id = $_GET['tour_round_id'];

      $sql= "SELECT trm.first_name,trm.middle_name,trm.last_name,trm.passport_id,trm.reservation_age,trm.avoid_food,trm.tour_round_member_id,trm.email
      FROM tour_round_member trm INNER JOIN tour_booking_history tbh ON trm.reference_code = tbh.reference_code
      WHERE tbh.tour_round_id = $tour_round_id ";

      if(isset($_GET['ref'])){
        $sql .= " AND trm.reference_code = '{$_GET['ref']}'";
      }

      // echo $sql;

      $result = mysqli_query($conn, $sql);
      $num_row =mysqli_num_rows($result);

      $per_page = 10;
      if(isset($_GET['page'])){
        $page = $_GET['page'];
      }else{
        $page =1 ;
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
        // $result = mysqli_query( $GLOBALS['conn'] , $sql );
        // $result = page_query($GLOBALS['conn'],$sql,2);
        echo "<table style='overflow-x:auto;border: 1px solid gray;border-radius: 8px; padding-right:10px; padding-left:10px;' class='responsive-table table table-striped highlight centered'>";
        echo "<thead>";
        echo "<tr align='center'><th>Member ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Passport Id</th><th>Reservation Age</th><th>Avoid Food</th><th>Email</th>";
        echo "</tr>";
        echo "</thead>";
        while($show = mysqli_fetch_array($result)) {
          $member_id = $show['tour_round_member_id'];

          echo "<tr>";
          echo "<td align ='center'>" . $member_id.  "</td> ";
          echo "<td align ='center'>" .$show['first_name'] .  "</td> ";
          echo "<td align ='center'>" .$show['middle_name'] .  "</td> ";
          echo "<td align ='center'>" .$show['last_name'] .  "</td> ";
          echo "<td align ='center'>" .$show['passport_id'] .  "</td> ";
          echo "<td align ='center'>" .$show['reservation_age'] .  "</td> ";
          echo "<td align ='center'>" .$show['avoid_food'] .  "</td> ";
          echo "<td align ='center'>";
          if(isLoginAs(array('admin'))){
            echo "<a href='tour_send_mail.php?member_id=$member_id'>";
          }
          echo $show['email'];
          if(isLoginAs(array('admin'))){
            echo "</a>";
          }
          echo "</td>";
          // echo "<td align ='center'><input  type='button' value='Send Mail' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/tour_send_mail.php?member_id=$member_id.'\"></td>";
          echo "</tr>";
        }
        echo "</table>";
      }
    }

    ?>
    <ul class="pagination center">
      <?php
      if($prev_page){
        echo "<li class='disabled'><a href ='tour_round_member.php?page=$prev_page&tour_round_id=$tour_round_id'><i class='material-icons'>chevron_left</i></a></li>";
      }
      for($i =1;$i<=$num_page;$i++){
        if($i != $page){
          echo "<li><a href='tour_round_member.php?page=$i&tour_round_id=$tour_round_id'>$i</a></li>";
        }else if($i = $page){
          echo "<li class='active'><a href='tour_round_member.php?page=$i&tour_round_id=$tour_round_id'>$i</a></li>";
        }
      }
      if($page !=$num_page){
        echo "<li class='waves-effect'><a href='tour_round_member.php?page=$next_page&tour_round_id=$tour_round_id'><i class='material-icons'>chevron_right</i></a></li>";
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
