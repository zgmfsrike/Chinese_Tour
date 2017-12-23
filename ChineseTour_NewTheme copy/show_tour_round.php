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

      <!-- Content Column -->
      <div class="col s12">
        <h3>Tour Round</h3>
      </div>

               <?php
               if(isset($_SESSION['login_id'])){

               //-----------------------------Search fucntion----------------------------------------------------//
               if($_GET['tourId'] != ""){
                   $tourId = $_GET['tourId'];
                   $sql= "SELECT * FROM tour_round tr WHERE tr.tour_id = $tourId";
                   $result = mysqli_query( $GLOBALS['conn'] , $sql );
                   echo "<table style='overflow-x:auto;' class='responsive-table table table-striped highlight centered'>";
                   echo "<thead>";
                   echo "<tr align='center'><th>TourRound Id</th><th>Trip status</th><th>Start Date</th><th>End date</th><th>Departure Point</th><th>DropOff Point</th><th>Member</th>";
                   echo "</tr>";
                   echo "</thead>";
                   while($show = mysqli_fetch_array($result)) {
                     $tour_round_id = $show['tour_round_id'];

                     echo "<tr>";
                     echo "<td align ='center'>" .$show['tour_round_id'] .  "</td> ";
                     echo "<td align ='center'>" .$show['trip_status'] .  "</td> ";
                     echo "<td align ='center'>" .$show['start_date_time'] .  "</td> ";
                     echo "<td align ='center'>" .$show['end_date_time'] .  "</td> ";
                     echo "<td align ='center'>" .$show['departure_point'] .  "</td> ";
                     echo "<td align ='center'>" .$show['drop_off_point'] .  "</td> ";
                     echo "<td align ='center'><input class='waves-effect waves-light btn green' type='button' value='View' onclick=\"window.location.href='http://localhost:8080/Chinese_Tour/ChineseTour_NewTheme%20copy/tour_round_member.php?tour_round_id=$tour_round_id'\"></td>";
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
