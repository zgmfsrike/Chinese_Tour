<?php
include 'module/session.php';
requireLogin();
?>



<!------------------------------------------------------------- HTML  ------------------------------------------------------------>
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
  <?php
  if(isset($_SESSION['login_id'])){


  //-----------------------------Search fucntion----------------------------------------------------//
      $sql= "SELECT n.news_id ,n.create_date, n.last_edit_date,n.topic,n.short_description FROM news n";
      $result = mysqli_query( $GLOBALS['conn'] , $sql );


      echo "<br>";
      echo "<table border='1' align='center' width='900'>";
      echo "<tr align='center' bgcolor='#f5c6cb'>
      <td>News ID</td>
      <td>News Create Date</td>
      <td>News Last Edit Date</td>
      <td>News Topic</td>
      <td>News Description</td>
      <td></td>
      <td></td>";
      while($show = mysqli_fetch_array($result)) {
        $news_id = $show['news_id'];
        echo "<tr>";
         echo "<td align ='center'>" . $news_id.  "</td> ";
        echo "<td align ='center'>" .$show['create_date'] .  "</td> ";
        echo "<td align ='center'>" .$show['last_edit_date'] .  "</td> ";
        echo "<td align ='center'>" .$show['topic'] .  "</td> ";
        echo "<td align ='center'>" .$show['short_description'] .  "</td> ";
        echo "<td align ='center'><input class='btn btn-warning' type='button' value='Edit' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/EditNews.php?news_id=$news_id.'\"></td>";
        echo "<td align ='center'><input class='btn btn-danger' type='button' value='Delete' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/DeleteNews.php?news_id=$news_id.'\"></td>";
        // echo "<td align ='center'>" .$show['reservation_age'] .  "</td> ";
        // echo "<td align ='center'>" .$show['avoid_food'] .  "</td> ";
        // echo "<td align ='center'>" .$show['group_member'] .  "</td> ";
        // echo "<td align ='center'><a href='http://localhost/Chinese_Tour/Chinese_Tour/tour_send_mail.php?member_id=$member_id'>" .$show['email'] .  "</a></td> ";


        // echo "<td align ='center'><input  type='button' value='Send Mail' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/tour_send_mail.php?member_id=$member_id.'\"></td>";

        echo "</tr>";

      }
      echo "</table><br>";






  }

  ?>
  <!-- /.container -->
    <?php
    include 'component/footer.php';
    ?>

<!--end side menu body-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

</body>
</html>
