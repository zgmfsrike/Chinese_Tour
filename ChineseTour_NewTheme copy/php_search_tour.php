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
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>

    <!-- Site Properties -->
    <title>Chiang Mai Hongthai Business and Consultant Enterprise</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

</head>
<body>
  <!-- Navigation -->
  <?php
    include 'component/header.php';
    ?>
  <br><br>
  <!-- Page Content -->
  <div class="container">
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="list-group admin-menu">
          <hr>
          <a href="Profile.php" class="list-group-item list-group-item-danger active text-white"><i class="fa fa-user fa-fw"></i>Profile</a>
          <a href="Purchase.php" class="list-group-item list-group-item-danger text-white"><i class="fa fa-shopping-cart fa-fw"></i>Purchase</a>
          <a href="Record.php" class="list-group-item list-group-item-danger text-white"><i class="fa fa-clipboard fa-fw"></i>Record</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-md-7 mb-5">
        <h3 class="entry-title"><span><br>Search tour</span> </h3>

        <hr>
        <form  action="php_search_tour.php" method="get"  class="navbar-form navbar-center" role="form" >
										<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
												<input id="tourName" type="text" class="form-control" name="tourName" value="<?php echo $_GET['tourName'];?>" size="20" required>
                        <input type="submit" class="btn btn-primary" value="Search " /><br><br>
										</div>
                    <br>


							 </form>
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
                     echo "<table border='1' align='center' width='700'>";
                     echo "<tr align='center' bgcolor='#f5c6cb'><td>Tour ID</td><td>Tour Description</td><td>Rating</td><td>Tour type</td><td>Vehicle type</td><td>Accommodation</td><td>View detail</td>";
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
                       echo "<td align ='center'><input type='button' value='View' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/show_tour_round.php?tourId=$tourId'\"></td>";
                       echo "</tr>";

                     }
                     echo "</table>";


                   }else{
                     echo "<h2>Nothing found ! , please try again.</h2>";
                   }





               }
               }

               ?>
    </div>
    <!-- /.row -->

  </div>
</div>
    <?php
    include 'component/footer.php';
    ?>
  <!-- /.container -->

<!--end side menu body-->
<script src="js/validate.js"></script>


</body>
</html>
