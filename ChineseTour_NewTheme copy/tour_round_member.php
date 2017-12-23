<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";

?>
<?php
include('module/session.php');
isLogin();
$tour_round_id = $_GET['tour_round_id'];

 ?>

 <!DOCTYPE html>
   <html>
 <?php
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
            <h3>Tour Round Member</h3>
          </li>
          <li class="right">
            <input type="button" class="waves-effect waves-light btn amber" value="Send All" name ="send_all" onclick="window.location.href ='http://localhost:8080/ChineseTour/Chinese_Tour/ChineseTour_NewTheme%20copy/tour_send_mail_all.php?tour_round_id=<?php echo $tour_round_id; ?>'">
        </li>
        </ul>
      </div>

               <?php
               if(isset($_SESSION['login_id'])){


               //-----------------------------Search fucntion----------------------------------------------------//
               if($_GET['tour_round_id'] != ""){


                   $sql= "SELECT m.first_name,m.middle_name,m.last_name,trm.passport_id,trm.reservation_age,trm.avoid_food,trm.group_member,m.id,m.email
                          FROM tour_round_member trm INNER JOIN tour_round tr ON trm.tour_round_id = tr.tour_round_id INNER JOIN member m ON trm.id = m.id
                          WHERE trm.tour_round_id = $tour_round_id ";
                   $result = mysqli_query( $GLOBALS['conn'] , $sql );
                   echo "<table style='overflow-x:auto;' class='responsive-table table table-striped highlight centered'>";
                   echo "<thead>";
                   echo "<tr align='center'><th>Member ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Passport Id</th><th>Reservation Age</th><th>Avoid Food</th><th>Group Member</th><th>Email</th>";
                   echo "</tr>";
                   echo "</thead>";
                   while($show = mysqli_fetch_array($result)) {
                     $member_id = $show['id'];

                     echo "<tr>";
                     echo "<td align ='center'>" . $member_id.  "</td> ";
                     echo "<td align ='center'>" .$show['first_name'] .  "</td> ";
                     echo "<td align ='center'>" .$show['middle_name'] .  "</td> ";
                     echo "<td align ='center'>" .$show['last_name'] .  "</td> ";
                     echo "<td align ='center'>" .$show['passport_id'] .  "</td> ";
                     echo "<td align ='center'>" .$show['reservation_age'] .  "</td> ";
                     echo "<td align ='center'>" .$show['avoid_food'] .  "</td> ";
                     echo "<td align ='center'>" .$show['group_member'] .  "</td> ";
                     echo "<td align ='center'><a href='http://localhost:8080/Chinese_Tour/ChineseTour_NewTheme%20copy/tour_send_mail.php?member_id=$member_id'>" .$show['email'] .  "</a></td> ";
                     // echo "<td align ='center'><input  type='button' value='Send Mail' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/tour_send_mail.php?member_id=$member_id.'\"></td>";
                     echo "</tr>";
                   }
                   echo "</table>";
               }
               }

               ?>


    <!-- /.row -->

</div>
</div>
    <?php
    include 'component/footer.php';
    ?>
</body>
</html>