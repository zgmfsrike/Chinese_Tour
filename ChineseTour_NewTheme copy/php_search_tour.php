<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";

?>
<?php
include('module/session.php');
requireLogin();

 ?>

 <!DOCTYPE html>
   <html>
 <?php
       include 'component/header.php';
       // include 'module/session.php';
       // requireLogin();
       // include 'php_profile_func.php';
 ?>
 <body>
  <div class="container">
    <div class="row">

                  <div class="col s12">
                      <div class="section"></div>
                      <a href="php_search_tour.php" class="black-text"><h3>Search Tour</h3></a>
                          <div class="search-wrapper card">
                            <form action="php_search_tour.php" method="get" role="form" >
                              <div class="col s12 l10">
                                <div class="input-field">
                                  <input id="tourName" placeholder="Search Tour Here" type="text" name="tourName" value="<?php echo $_GET['tourName'];?>" size="20" required>
                                </div>
                              </div>
                                <div class="center col s12 l2">
                                  <input type="submit" class="btn-large waves-effect waves-light amber" value="Search " />
                                </div>
                            </form>
                          </div>
                 </div>

               <?php
               if(isset($_SESSION['login_id'])){

               //-----------------------------Search fucntion----------------------------------------------------//
               if($_GET['tourName'] != ""){
                   $tour_description = $_GET['tourName'];
                   $sql= "SELECT t.tour_description,t.rating,tt.tour_type,vt.vehicle_type,a.accommodation_level,t.tour_id
               FROM tour t INNER JOIN tour_type tt ON t.tour_type_id = tt.tour_type_id
                 INNER JOIN vehicle_type vt  ON t.vehicle_type_id = vt.vehicle_type_id
                     INNER JOIN accommodation a ON t.accommodation_id = a.accommodation_id
                         WHERE t.tour_description LIKE '$tour_description%' ";
                   $result = mysqli_query( $GLOBALS['conn'] , $sql );
                  $count = mysqli_num_rows($result);
                   if($count != 0){
                     echo "<table style='overflow-x:auto;' class='responsive-table table table-striped highlight centered'>";
                     echo "<thead>";
                     echo "<tr align='center'><th>Tour ID</th><th>Tour Description</th><th>Rating</th><th>Tour type</th><th>Vehicle type</th><th>Accommodation</th><th>View detail</th>";
                     echo "</tr>";
                     echo "</thead>";
                     while($show = mysqli_fetch_array($result)) {
                       $tourId = $show['tour_id'];
                       echo "<tr>";
                       // echo "<td align ='center'>" .$show['tour_name'] .  "</td> ";
                       echo "<td align ='center'>" .$tourId.  "</td> ";
                       echo "<td align ='center'>" .$show['tour_description'] .  "</td> ";
                       echo "<td align ='center'>" .$show['rating'] .  "</td> ";
                       echo "<td align ='center'>" .$show['tour_type'] .  "</td> ";
                       echo "<td align ='center'>" .$show['vehicle_type'] .  "</td> ";
                       echo "<td align ='center'>" .$show['accommodation_level'] .  "</td> ";
                       echo "<td align ='center'><input class='waves-effect waves-light btn green' type='button' value='View' onclick=\"window.location.href='http://localhost:8080/ChineseTour/Chinese_Tour/ChineseTour_NewTheme%20copy/show_tour_round.php?tourId=$tourId'\"></td>";
                       echo "</tr>";
                     }
                     echo "</table>";

                   }else{
                     echo "<h5>Nothing found ! , please try again.</h5>";
                   }
               }
               }

               ?>
    </div>
    <!-- /.row -->

  </div>

    <?php
    include 'component/footer.php';
    ?>
  <!-- /.container -->

<!--end side menu body-->
<script src="js/validate.js"></script>


</body>
</html>
