<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";



// if(isset($_SESSION['login_id'])){
//
// //-----------------------------Search fucntion----------------------------------------------------//
// if($_GET['tourName'] != ""){
//     $tourName = $_GET['tourName'];
//     $sql= "SELECT t.tour_name,t.tour_description,t.rating,tt.tour_type,vt.vehicle_type,a.accommodation_level
// FROM tour t INNER JOIN tour_type tt ON t.tour_type_id = tt.tour_type_id
// 	INNER JOIN vehicle_type vt  ON t.vehicle_type_id = vt.vehicle_type_id
//     	INNER JOIN accommodation a ON t.accommodation_id = a.accommodation_id
//         	WHERE t.tour_name LIKE '$tourName%' ";
//     $result = mysqli_query( $GLOBALS['conn'] , $sql );
//
//     echo "<table border='1' align='center' width='500'>";
//     echo "<tr align='center' bgcolor='#CCCCCC'><td>UserId</td><td>UserName</td><td>UserPassword</td>";
//     while($show = mysqli_fetch_array($result)) {
//       echo "<tr>";
//       echo "<td>" .$show['tour_name'] .  "</td> ";
//       echo "<td>" .$show['tour_description'] .  "</td> ";
//       echo "<td>" .$show['rating'] .  "</td> ";
//       echo "<td>" .$show['tour_type'] .  "</td> ";
//       echo "<td>" .$show['vehicle_type'] .  "</td> ";
//       echo "<td>" .$show['accommodation_level'] .  "</td> ";
//       echo "</tr>";
//
//     }
//     echo "</table>";
//
//
//
//
// }
// }



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
      <div class="col-lg-9 mb-4">
        <h3 class="entry-title"><span><br>Search tour</span> </h3>

        <hr>
        <form  action="php_search_tour.php" method="get"  class="navbar-form navbar-center" role="form" >
										<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
												<input id="tourName" type="text" class="form-control" name="tourName" value="<?php echo $_GET['tourName'];?>" size="20" required>
										</div>
									 <input type="submit" class="btn btn-primary" value="Search " />


							 </form>
               <?php
               if(isset($_SESSION['login_id'])){

               //-----------------------------Search fucntion----------------------------------------------------//
               if($_GET['tourName'] != ""){
                   $tourName = $_GET['tourName'];
                   $sql= "SELECT t.tour_name,t.tour_description,t.rating,tt.tour_type,vt.vehicle_type,a.accommodation_level
               FROM tour t INNER JOIN tour_type tt ON t.tour_type_id = tt.tour_type_id
                 INNER JOIN vehicle_type vt  ON t.vehicle_type_id = vt.vehicle_type_id
                     INNER JOIN accommodation a ON t.accommodation_id = a.accommodation_id
                         WHERE t.tour_name LIKE '$tourName%' ";
                   $result = mysqli_query( $GLOBALS['conn'] , $sql );

                   echo "<table border='1' align='center' width='500'>";
                   echo "<tr align='center' bgcolor='#f5c6cb'><td>Tour name</td><td>Tour description</td><td>Rating</td><td>Tour type</td><td>Vehicle type</td><td>Accommodation</td>";
                   while($show = mysqli_fetch_array($result)) {
                     echo "<tr>";
                     echo "<td>" .$show['tour_name'] .  "</td> ";
                     echo "<td>" .$show['tour_description'] .  "</td> ";
                     echo "<td>" .$show['rating'] .  "</td> ";
                     echo "<td>" .$show['tour_type'] .  "</td> ";
                     echo "<td>" .$show['vehicle_type'] .  "</td> ";
                     echo "<td>" .$show['accommodation_level'] .  "</td> ";
                     echo "</tr>";

                   }
                   echo "</table>";




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
