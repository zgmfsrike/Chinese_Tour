<?php
include('module/session.php');
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';

error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
// include "lib/pagination.php";
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
        <h3>Tour Round</h3>
      </div>

               <?php
               if(isset($_SESSION['login_id'])){

               //-----------------------------Search fucntion----------------------------------------------------//
               if($_GET['tourId'] != ""){
                   $tourId = $_GET['tourId'];
                   $sql= "SELECT * FROM tour_round tr WHERE tr.tour_id = $tourId";
                   $result = mysqli_query( $GLOBALS['conn'] , $sql );
                  // $result = page_query($GLOBALS['conn'],$sql,2);
                  $num_row =mysqli_num_rows($result);

                  $per_page = 3;
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


                   echo "<table style='overflow-x:auto;' class='responsive-table table table-striped highlight centered'>";
                   echo "<thead>";
                   echo "<tr align='center'><th>TourRound Id</th><th>Trip status</th><th>Start Date</th><th>End date</th><th>Departure Point</th><th>DropOff Point</th><th>Member</th>";
                   echo "</tr>";
                   echo "</thead>";
                   $id = 1;
                   while($show = mysqli_fetch_array($result)) {
                     $tour_round_id = $show['tour_round_id'];

                     echo "<tr>";
                     echo "<td align ='center'>" .$id .  "</td> ";
                     echo "<td align ='center'>" .$show['trip_status'] .  "</td> ";
                     echo "<td align ='center'>" .$show['start_date_time'] .  "</td> ";
                     echo "<td align ='center'>" .$show['end_date_time'] .  "</td> ";
                     echo "<td align ='center'>" .$show['departure_point'] .  "</td> ";
                     echo "<td align ='center'>" .$show['drop_off_point'] .  "</td> ";
                     // echo "<td align ='center'><input class='waves-effect waves-light btn green' type='button' value='View' onclick=\"window.location.href='http://localhost:8080/Chinese_TourChineseTour_NewTheme%20copy/tour_round_member.php?tour_round_id=$tour_round_id'\"></td>";
                     echo "<td align ='center'><a href='tour_round_member.php?tour_round_id=$tour_round_id'><button class='waves-effect waves-light btn green' type='button' value='View'>View</button></a></td>";
                     echo "</tr>";
                     $id++;

                   }
                   echo "</table>";

               }
               }

               ?>
               <ul class="pagination">
                 <?php
                 if($prev_page){
                   echo "<li class='disabled'><a href ='show_tour_round.php?page=$prev_page&tourId=$tourId'><i class='material-icons'>chevron_left</i></a></li>";
                 }
                 for($i =1;$i<=$num_page;$i++){
                   if($i != $page){
                     echo "<li><a href='show_tour_round.php?page=$i&tourId=$tourId'>$i</a></li>";
                   }else if($i = $page){
                     echo "<li class='active'><a href='show_tour_round.php?page=$i&tourId=$tourId'>$i</a></li>";
                   }
                 }
                 if($page !=$num_page){
                   echo "<li class='waves-effect'><a href='show_tour_round.php?page=$next_page&tourId=$tourId'><i class='material-icons'>chevron_right</i></a></li>";
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
