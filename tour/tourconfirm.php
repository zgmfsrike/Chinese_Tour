
<?php
include 'module/session.php';
include 'db_config.php';
require 'module/language/init.php';

if(!isset($_SESSION['book_info'])){
  header('Location: message.php?msg=error_booking');
}



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
      $departure_location_id = $_SESSION['departure_location'];
      $dropoff_location_id = $_SESSION['dropoff_location'];


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
              <div class='col s2 center'>
                <ul>
                  <li>".$_SESSION['tour']['p'.$i]['email']."</li>
                </ul>
              </div>
              <div class='col s2 center'>
                <ul>
                  <li>Avoid Food : ".$_SESSION['tour']['p'.$i]['avoidfood']."</li>
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
            // if(isset($_SESSION['tour_round']) and isset($_SESSION['tour_type'])){
              if(isset($_SESSION['tour_round'])){
              $tour_round_id = $_SESSION['tour_round'];
              $tour_id = $_SESSION['tour_id'];
              // $tour_type_id =  $_SESSION['tour_type']

              $tour = "tour_".$_COOKIE['lang'];
              // $sql ="SELECT *
              //   FROM tour_round tr INNER JOIN $tour t on tr.tour_id = t.tour_id
              //    INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
              //    INNER JOIN tour_type tt ON tt.tour_type_id = ttt.tour_type_id
              //    INNER JOIN tour_vehicle_type tvt on t.tour_id = tvt.tour_id
              //    INNER JOIN vehicle_type vt on tvt.vehicle_type_id = vt.vehicle_type_id
              //    INNER JOIN tour_accommodation ta on t.tour_id = ta.tour_id
              //    INNER JOIN accommodation a on ta.accommodation_id = a.accommodation_id
              //    WHERE tr.tour_round_id = $tour_round_id and ttt.tour_type_id = $tour_type_id";
              $sql ="SELECT *
                FROM tour_round tr INNER JOIN $tour t on tr.tour_id = t.tour_id
                 INNER JOIN tour_tour_type ttt ON t.tour_id = ttt.tour_id
                 INNER JOIN tour_type tt ON tt.tour_type_id = ttt.tour_type_id
                 INNER JOIN tour_vehicle_type tvt on t.tour_id = tvt.tour_id
                 INNER JOIN vehicle_type vt on tvt.vehicle_type_id = vt.vehicle_type_id
                 INNER JOIN tour_accommodation ta on t.tour_id = ta.tour_id
                 INNER JOIN accommodation a on ta.accommodation_id = a.accommodation_id
                 WHERE tr.tour_round_id = $tour_round_id";
              $result = mysqli_query($conn,$sql);
              $data = mysqli_fetch_array($result);
              //tour type
              $sql_tour = "SELECT * FROM `tour_tour_type` INNER JOIN `tour_type` ON tour_tour_type.tour_type_id=tour_type.tour_type_id WHERE tour_id = $tour_id";
              $result_tour = mysqli_query($conn, $sql_tour);
              $tour_type_all ="";
              while ($type = mysqli_fetch_array($result_tour)) {
                $tour_type_all .= $type['tour_type']." ";
                $_SESSION['tour_type_all']= $tour_type_all;
                # code...
              }
              //accommodation

              $sql_acc = "SELECT * FROM `tour_accommodation` INNER JOIN `accommodation` ON tour_accommodation.accommodation_id=accommodation.accommodation_id WHERE tour_id = $tour_id";
              $result_acc = mysqli_query($conn, $sql_acc);
              $acc_all = "";

              while ($acc = mysqli_fetch_array($result_acc)) {
                $acc_all .= $acc['accommodation_level']." ";
                $_SESSION['acc_all'] = $acc_all;
                # code...
              }
              //vehicle type
              $sql_v = "SELECT * FROM `tour_vehicle_type` INNER JOIN `vehicle_type` ON tour_vehicle_type.vehicle_type_id=vehicle_type.vehicle_type_id WHERE tour_id = $tour_id";
              $result_v = mysqli_query($conn, $sql_v);
              $vehicle_all  = "";


              while ($v_all = mysqli_fetch_array($result_v)) {
                $vehicle_all .= $v_all['vehicle_type']." ";
                $_SESSION['vehicle_all'] = $vehicle_all;

                # code...
              }
              $departure_lang = ' departure_'.$_COOKIE['lang'];

              $sql_departure_location = "SELECT $departure_lang AS departure FROM `departure_location` WHERE departure_id =".$departure_location_id;
              $result_departure = mysqli_query($conn, $sql_departure_location);
              $d_location = mysqli_fetch_array($result_departure);
              $departure_location = $d_location['departure'];
              $_SESSION['departure_location'] = $departure_location ;


              $dropoff_lang = 'dropoff_'.$_COOKIE['lang'];
              $sql_dropoff_location = "SELECT $dropoff_lang AS dropoff FROM `dropoff_location` WHERE dropoff_id = ".$dropoff_location_id;
              $result_dropoff = mysqli_query($conn, $sql_dropoff_location);
              $drop_location = mysqli_fetch_array($result_dropoff);
              $dropoff_location = $drop_location['dropoff'];
              $_SESSION['dropoff_location'] = $dropoff_location;





            }
            // <li><b>Tour Type :  </b><?php echo $tour_type_all;</li>

            ?>

            <li><b>Vehicle : </b><?php echo $vehicle_all;?></li>
            <li><b>Accommodation : </b><?php echo $acc_all;?></li>
            <li><b>Departure Location : </b><?php echo $departure_location;?></li>
            <li><b>Drop off Location : </b><?php echo $dropoff_location;?></li>
            <li><b>Start Date : </b><?php echo $data['start_date_time'];?></li>
            <li><b>End Date : </b><?php echo $data['end_date_time'];?></li>
            <li><b>Price : </b><?php echo $result_price?> ฿</li>
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
