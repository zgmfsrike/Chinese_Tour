
<?php
include 'module/session.php';
include 'db_config.php';




?>
<!DOCTYPE html>
<html>
    <?php
     $title = "Trip Member";
      include 'component/header.php';
      $php_tour_add_member_info = "php_tour_add_member_info.php";
      if(isset($_SESSION['book_tour_expired'])){
        $time = $_SESSION['book_tour_expired'];
      }else {
        $time = 'nothing';
      }

      if(isset($_SESSION['result_price']) and isset($_SESSION['departure_location'])
    and isset($_SESSION['dropoff_location'])){
      $result_price = $_SESSION['result_price'];
      $departure_location = $_SESSION['departure_location'];
      $dropoff_location = $_SESSION['dropoff_location'];

      }
?>
<body>

  <div class="container">
    <form action='<?php echo $php_tour_add_member_info;?>' method="POST">
    <div class="row">
      <h3>Confirm Information</h3><br/>
      <div class="section"></div>
      <fieldset>
        <legend>Tour Group Member</legend>
        <!--Member row-->

          <!--Name-->
          <?php
          if(isset($_SESSION['seat'])){
              $amount_people = $_SESSION['seat'];
          }

          $counter = 1;
          for($i=1; $i<=$amount_people;$i++){
            if(isset($_SESSION['tour']['p'.$i]['first_name']) and isset($_SESSION['tour']['p'.$i]['email'])){
              echo "
              <div class='row'>
                <div class='col s2 center'>
                  <ul>
                    <li><b>#".$counter."</b></li>
                  </ul>
                </div>
              <div class='col s2 center'>
                <ul>
                  <li>".$_SESSION['tour']['p'.$i]['first_name'] ."</li>
                </ul>
              </div>
              <!--Email-->
              <div class='col s5'>
                <ul>
                  <li>".$_SESSION['tour']['p'.$i]['email']."</li>
                </ul>
              </div>
              </div>
              ";
              $counter++;

            }


          }

          ?>


      <!--End row-->
      </fieldset>
      <div class="section"></div>
      <fieldset>
        <legend>Tour Attribute</legend>
        <div class="col s12">
          <ul>
            <?php
            if(isset($_SESSION['tour_round']) and isset($_SESSION['tour_type'])){
              $tour_round_id = $_SESSION['tour_round'];
              $tour_type_id =  $_SESSION['tour_type'];
              $sql ="SELECT *
                FROM tour_round tr INNER JOIN tour t on tr.tour_id = t.tour_id
                 INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
                 INNER JOIN tour_type tt ON tt.tour_type_id = ttt.tour_type_id
                 INNER JOIN tour_vehicle_type tvt on t.tour_id = tvt.tour_id
                 INNER JOIN vehicle_type vt on tvt.vehicle_type_id = vt.vehicle_type_id
                 INNER JOIN tour_accommodation ta on t.tour_id = ta.tour_id
                 INNER JOIN accommodation a on ta.accommodation_id = a.accommodation_id
                 WHERE tr.tour_round_id = $tour_round_id and ttt.tour_type_id = $tour_type_id";
              $result = mysqli_query($conn,$sql);
              $data = mysqli_fetch_array($result);


            }

            ?>
            <li><b>Tour Type :  </b><?php echo $data['tour_type'];?></li>
            <li><b>Vehicle : </b><?php echo $data['vehicle_type'];?></li>
            <li><b>Accommodation : </b><?php echo $data['accommodation_level'];?></li>
            <li><b>Departure Location : </b><?php echo $departure_location;?></li>
            <li><b>Drop off Location : </b><?php echo $dropoff_location;?></li>
            <li><b>Start Date : </b><?php echo $data['start_date_time'];?></li>
            <li><b>End Date : </b><?php echo $data['end_date_time'];?></li>
            <li><b>Price : </b><?php echo $result_price?></li>
          </ul>
        </div>
      </fieldset>
    </div>
    <div class="row">
        <div class="section"></div>
      <div class="center col s12">
        <button name="submit" type="submit" class="btn amber" value="Sign Up">Confirm</button>
      </div>
    </div>
    <div class="section"></div>
  </form>
  </div>

      <!--Footer-->
      <?php
      include 'component/footer.php';
      ?>

    </body>
  </html>
