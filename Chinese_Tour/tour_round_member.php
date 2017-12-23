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
$tour_round_id = $_GET['tour_round_id'];

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
        <h3 class="entry-title"><span><br>Tour Round Member</span> </h3>

        <hr>
          <input type="button" class="btn btn-danger btn-md" value="Send All" name ="send_all" onclick="window.location.href ='http://localhost/Chinese_Tour/Chinese_Tour/tour_send_mail_all.php?tour_round_id=<?php echo $tour_round_id; ?>'">

          <br>
               <?php
               if(isset($_SESSION['login_id'])){


               //-----------------------------Search fucntion----------------------------------------------------//
               if($_GET['tour_round_id'] != ""){


                   $sql= "SELECT m.first_name,m.middle_name,m.last_name,trm.passport_id,trm.reservation_age,trm.avoid_food,trm.group_member,m.id,m.email
                          FROM tour_round_member trm INNER JOIN tour_round tr ON trm.tour_round_id = tr.tour_round_id INNER JOIN member m ON trm.id = m.id
                          WHERE trm.tour_round_id = $tour_round_id ";
                   $result = mysqli_query( $GLOBALS['conn'] , $sql );


                   echo "<br>";
                   echo "<table border='1' align='center' width='900'>";
                   echo "<tr align='center' bgcolor='#f5c6cb'><td>Member ID</td><td>First Name</td><td>Middle Name</td><td>Last Name</td><td>Passport Id</td><td>Reservation Age</td><td>Avoid Food</td><td>Group Member</td><td>Email</td>";
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
                     echo "<td align ='center'><a href='http://localhost/Chinese_Tour/Chinese_Tour/tour_send_mail.php?member_id=$member_id'>" .$show['email'] .  "</a></td> ";


                     // echo "<td align ='center'><input  type='button' value='Send Mail' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/tour_send_mail.php?member_id=$member_id.'\"></td>";

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
