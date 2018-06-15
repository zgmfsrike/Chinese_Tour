<?php
include('module/session.php');
error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
include "lib/pagination.php";

require 'module/language/init.php';
//--------------------Link to another page -----------------------------------
$search_all_func ="php_search_tour.php";
?>
<?php
if(!isLoginAs(array('admin'))){
  header('Location: message.php?msg=unauthorized');
}

?>

<!DOCTYPE html>
<html>
<?php
$title = "Search Tour";
include 'component/header.php';
// include 'module/session.php';
// isLogin();
// include 'php_profile_func.php';

$sql = "SELECT * FROM tour_".$_COOKIE['lang'];


// $result = page_query($GLOBALS['conn'],$sql,3);
$result = mysqli_query($conn,$sql);
$num_row =mysqli_num_rows($result);

$per_page = 5;
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


$sql .=  " ORDER BY tour_id ASC LIMIT $page_start,$per_page";
$result = mysqli_query($conn,$sql);



?>
<body>
  <div class="container">
    <div class="row">


      <h3>Search Tour</h3>

      <a href="search_all_tour.php" class="btn" >Search All</a>
      <form  action=<?php echo $search_all_func; ?> method="get"  class="navbar-form navbar-center" role="form" >

        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="tourName" type="text" class="form-control" name="tourName" value="<?php echo $_GET['tourName'];?>" size="20" >
          <input type="submit" class="btn btn-primary" value="Search " /><br><br>

        </div>
        <br>


      </form>

      <?php
      if(isset($_SESSION['login_id'])){
        $count = mysqli_num_rows($result);
        if($count != 0){
          ?>
          <table style='overflow-x:auto;' class='responsive-table table table-striped highlight centered'>
            <thead>
              <tr align='center'>
                <th>Tour ID</th>
                <th>Tour Description</th>
                <?php
                // <th>Rating</th><th>Tour type</th><th>Vehicle type</th><th>Accommodation</th><th>View detail</th>";
                ?>
              </tr>
            </thead>
            <?php

            while($show = mysqli_fetch_array($result)) {
              $tourId = $show['tour_id'];

              ?>
              <tr>
                <?php
                // echo "<td align ='center'>" .$show['tour_name'] .  "</td> ";
                ?>
                <td align ='center'><?php echo $tourId;?></td>
                <td align ='center'><?php echo $show['tour_description'];?></td>
                <?php
                // echo "<td align ='center'>" .$show['rating'] .  "</td> ";
                // echo "<td align ='center'>" .$show['tour_type'] .  "</td> ";
                // echo "<td align ='center'>" .$show['vehicle_type'] .  "</td> ";
                // echo "<td align ='center'>" .$show['accommodation_level'] .  "</td> ";
                // echo "<td align ='center'><input class='waves-effect waves-light btn green' type='button' value='View' onclick=\"window.location.href='http://localhost:8080/Chinese_Tour/ChineseTour_NewTheme%20copy/show_tour_round.php?tourId=$tourId'\"></td>";
                ?>
                <td align ='center'>
                  <a href='show_tour_round.php?tourId=<?php echo $tourId;?>'><input class='waves-effect waves-light btn green' type='button' value='Tour round'></a>
                  <a href='tour.php?id=<?php echo $tourId;?>'><input class='waves-effect waves-light btn green' type='button' value='Detail'></a>
                  <a href='admin_manage_comment.php?tour_id=<?php echo $tourId;?>'><input class='waves-effect waves-light btn green' type='button' value='View Comment'></a>
                </td>
              </tr>
              <?php
            }
            ?>
          </table><br>
          <ul class="pagination">
            <?php
            if($prev_page){
              echo "<li class='disabled'><a href ='search_all_tour.php?page=$prev_page'><i class='material-icons'>chevron_left</i></a></li>";
            }
            for($i =1;$i<=$num_page;$i++){
              if($i != $page){
                echo "<li><a href='search_all_tour.php?page=$i'>$i</a></li>";
              }else if($i = $page){
                echo "<li class='active'><a href='search_all_tour.php?page=$i'>$i</a></li>";
              }
            }
            if($page !=$num_page){
              echo "<li class='waves-effect'><a href='search_all_tour.php?page=$next_page'><i class='material-icons'>chevron_right</i></a></li>";
            }
            ?>



          </ul>

          <?php


        }


        //-----------------------------Search fucntion----------------------------------------------------//
        if($_GET['tourName'] != ""){

          $tour_description = $_GET['tourName'];
          $sql= "SELECT t.tour_description,
          -- t.rating,tt.tour_type,vt.vehicle_type,a.accommodation_level,
          t.tour_id
          FROM tour t
          -- INNER JOIN tour_type tt ON t.tour_type_id = tt.tour_type_id
          -- INNER JOIN vehicle_type vt  ON t.vehicle_type_id = vt.vehicle_type_id
          -- INNER JOIN accommodation a ON t.accommodation_id = a.accommodation_id
          WHERE t.tour_description LIKE '%$tour_description%' ";
          // $result = mysqli_query( $GLOBALS['conn'] , $sql );
          $result = mysqli_query($conn,$sql);
          $num_row =mysqli_num_rows($result);

          $per_page = 1;
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
          $sql .=  " ORDER BY tour_id ASC LIMIT $page_start,$per_page";
          $result = mysqli_query($conn,$sql);

          $count = mysqli_num_rows($result);
          if($count != 0){
            ?>
            <table style='overflow-x:auto;' class='responsive-table table table-striped highlight centered'>
              <thead>
                <tr align='center'>
                  <th>Tour ID</th>
                  <th>Tour Description</th>
                  <?php
                  // <th>Rating</th><th>Tour type</th><th>Vehicle type</th><th>Accommodation</th><th>View detail</th>";
                  ?>
                </tr>
              </thead>
              <?php
              while($show = mysqli_fetch_array($result)) {
                $tourId = $show['tour_id'];
                ?>
                <tr>
                  <?php
                  // echo "<td align ='center'>" .$show['tour_name'] .  "</td> ";
                  ?>
                  <td align ='center'><?php echo $tourId;?></td>
                  <td align ='center'><?php echo $show['tour_description'];?></td>
                  <?php
                  // echo "<td align ='center'>" .$show['rating'] .  "</td> ";
                  // echo "<td align ='center'>" .$show['tour_type'] .  "</td> ";
                  // echo "<td align ='center'>" .$show['vehicle_type'] .  "</td> ";
                  // echo "<td align ='center'>" .$show['accommodation_level'] .  "</td> ";
                  // echo "<td align ='center'><input class='waves-effect waves-light btn green' type='button' value='View' onclick=\"window.location.href='http://localhost:8080/Chinese_Tour/ChineseTour_NewTheme%20copy/show_tour_round.php?tourId=$tourId'\"></td>";
                  ?>
                  <td align ='center'>
                    <a href='show_tour_round.php?tourId=<?php echo $tourId;?>'><input class='waves-effect waves-light btn green' type='button' value='Tour round'></a>
                    <a href='tour.php?id=<?php echo $tourId;?>'><input class='waves-effect waves-light btn green' type='button' value='Detail'></a>
                    <a href='admin_manage_comment.php?tour_id=<?php echo $tourId;?>'><input class='waves-effect waves-light btn green' type='button' value='View Comment'></a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </table><br>
            <ul class="pagination">
              <?php
              if($prev_page){
                echo "<li class='disabled'><a href ='search_all_tour.php?page=$prev_page'><i class='material-icons'>chevron_left</i></a></li>";
              }
              for($i =1;$i<=$num_page;$i++){
                if($i != $page){
                  echo "<li><a href='search_all_tour.php?page=$i'>$i</a></li>";
                }else if($i = $page){
                  echo "<li class='active'><a href='search_all_tour.php?page=$i'>$i</a></li>";
                }
              }
              if($page !=$num_page){
                echo "<li class='waves-effect'><a href='search_all_tour.php?page=$next_page'><i class='material-icons'>chevron_right</i></a></li>";
              }
              ?>



            </ul>


            <?php

          }else{
            ?>
            <h5>Nothing found ! , please try again.</h5>
            <?php
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
