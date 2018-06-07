<?php
include 'module/session.php';
include 'db_config.php';

// require 'module/language_switcher.php';
require 'module/language/init.php';
?>

<?php
if(isset($_GET['id'])){
  if(isset($_GET['seat'])){
    $seat = $_GET['seat'];
    $_SESSION['seat'] = $seat;
  }
  $id = $_GET['id'];
  $_SESSION['tour_id'] = $id;

  // tour
  $sql = "SELECT * FROM tour_".$_COOKIE['lang']." WHERE tour_id = $id";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 0){
    //error no data
    header("location: message.php?msg=tour_not_found");
    return false;
  }

  $data = mysqli_fetch_array($result);
  $tour_description = $data['tour_description'];
  $hightlight = $data['highlight'];
  $region = $data['region'];
  $province = $data['province'];
  $price = $data['price'];
  $max_customer = $data['max_customer'];
  $rating = $data['rating'];

  $trip_page = 'php_reserve_member.php';
  ?>


  <!DOCTYPE html>
  <html>
  <?php
  $title = $tour_description;
  include 'component/header.php';
  ?>
  <body>

    <!--tour body-->
    <div class="container">
      <form action="<?php echo $trip_page;?>" method="POST">
        <div class="section"></div><div class="section"></div>
        <div class="row">
          <h3 class=""> <?php echo $tour_description; ?></h3>
          <div class="col s12 l6">
            <div class="slider">
              <ul class="slides">
                <?php
                $sql = "SELECT * FROM `tour_image` WHERE tour_id = $id";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  $row = mysqli_fetch_array($result);
                  for($i = 1; $i <= 10; $i++){
                    $img = $row['img'.$i];
                    if($img != ''){
                      ?>
                      <li>
                        <img src="images/tours/<?php echo $img;?>">
                      </li>
                      <?php
                    }
                  }
                  // Free result set
                  mysqli_free_result($result);
                }
                ?>
              </ul>
            </div>
          </div>
          <div class="col s12 l6">
            <div class="card"><br/>
              <h5 class="center-align"><b>Sale Price : <span id='price' name='price'></span> ฿</b></h5>
              <p class="center-align">Satisfaction <?php echo $rating; ?>% from xxxx people</p>
              <p class="center-align"><b>Highlight :</b> <?php echo $hightlight; ?></p><br/>
            </div>

            <ul>
              <li><b>Tour type :</b>
                <?php
                $sql = "SELECT * FROM `tour_tour_type` INNER JOIN `tour_type` ON tour_tour_type.tour_type_id=tour_type.tour_type_id WHERE tour_id = $id";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $type = $row['tour_type'];
                    echo '<span> '.$type.' </span>';
                  }
                  // Free result set
                  mysqli_free_result($result);
                }
                ?>
              </li>

              <li><b>Vehicle :</b>
                <?php
                $sql = "SELECT * FROM `tour_vehicle_type` INNER JOIN `vehicle_type` ON tour_vehicle_type.vehicle_type_id=vehicle_type.vehicle_type_id WHERE tour_id = $id";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $type = $row['vehicle_type'];
                    echo '<span> '.$type.' </span>';
                  }
                  // Free result set
                  mysqli_free_result($result);
                }
                ?>
              </li>
              <li><b>Accommodation :</b>
                <?php
                $sql = "SELECT * FROM `tour_accommodation` INNER JOIN `accommodation` ON tour_accommodation.accommodation_id=accommodation.accommodation_id WHERE tour_id = $id";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $acc = $row['accommodation_level'];
                    echo '<span> '.$acc.' </span>';
                  }
                  // Free result set
                  mysqli_free_result($result);
                }
                ?>
              </li>
            </ul>

            <label>Departure Location</label>
            <select class="browser-default" name="depart" required>
              <!-- <option value="">Please select</option> -->
              <option value="Airport">Airport</option>
            </select>

            <label>Drop off Location</label>
            <select class="browser-default" name="dropOff" required id='dropOff' onchange="dropChange()">
              <!-- <option value="">Please select</option> -->
              <option value="Airport">Airport</option>
              <option value="Nimman">Nimman(+300)</option>
              <option value="Lung More">Lung More(+500)</option>
              <option value="Suandork">Suandork(+400)</option>
              <option value="Khu Mueang">Khu Mueang(+200)</option>
            </select>

            <input type="text" name="result_price" id='result_price' value="" style="display:none" >

            <label>Tour round</label>
            <select class="browser-default" name="tour_round" required>
              <option value="">Please select</option>
              <?php
              $sql = "SELECT * FROM `tour_round` WHERE tour_id = $id";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                  $tour_round_id = $row['tour_round_id'];
                  $start_date_time = date("d-m-Y", strtotime($row['start_date_time']));
                  $end_date_time = date("d-m-Y", strtotime($row['end_date_time']));
                  ?>
                  <option value="<?php echo $tour_round_id; ?>"><?php echo $start_date_time; ?> to <?php echo $end_date_time; ?></option>
                  <?php
                }}
                ?>
              </select>
              <div class="section"></div>
              <!-- <div class="col s12 l6">
              <label for="datepicker">Start Date</label>
              <input type="text" id="datepicker">
            </div>
            <div class="col s12 l6">
            <label for="datepicker">End Date</label>
            <input type="text" id="datepicker2">
          </div> -->

          <div class="center col s12">
            <?php
            if(isLoginAs(array('member'))){
              ?>
              <button type="submit" class="waves-effect waves-light btn orange" name="book" value="Book">Book</button>
              <?php
            }else if (!(isLoginAs(array('member')) || isLoginAs(array('admin')))){
              ?>
              <button type="submit" class="waves-effect btn orange disabled" name="book" value="Book">Book</button>
              <p class="center" style="color:red;"><b>Please login before booking</b></p>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </form>
    <div class="section"></div>
    <div class="row card">
      <div class="col s12">
        <h5>Schedule</h5><hr/>
        <?php
        $sql = "SELECT * FROM `tour_schedule` WHERE tour_id = $id";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_array($result);
          $file_name = $row['file_name'];

          ?>
          <embed src="pdf/tours_schedule/<?php echo $file_name; ?>" type="application/pdf"   height="800px" width="100%"><br>
            <a href="pdf/tours_schedule/<?php echo $file_name; ?>">download</a>
            <?php
            // Free result set
            mysqli_free_result($result);
          }
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <?php
          if(isLoginAs(array('admin'))){
            ?>
            <a href="admin_edit_tour.php?id=<?php echo $id?>" class="btn-large btn-floating tooltipped right waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Edit Tour"><i class="material-icons">settings</i></a>
            <a href="#" id='del_button' onclick="warning();" class="btn-large btn-floating tooltipped waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Delete"><i class="material-icons">delete</i></a>
            <?php
          }
          ?>
        </div>
      </div>

      <div class="section"></div>
      <div class="row card">
        <div class="col s12">
          <h5>Comment</h5><hr/>
          <div class="col s6 left">
            <h4>XXX%</h4>
            <p>Satisfaction from xxx people</p>
          </div>
          <div class="col s6 right-align">
            <ul>
              <li>Tour: xx%</li>
              <li>Guide: xx%</li>
              <li>Location: xx%</li>
              <li>Service: xx%</li>
            </ul>
          </div>
        </div>
        <div class="col s12">
          <ul>
            <li><div class="chip">niranam@gmail.com</div> <span>: ...</span> </li>
            <li><div class="chip">ana@gmail.com</div>: ggez</li>
            <li><div class="chip">noburaz@gmail.com</div>: salt</li>
            <li><div class="chip">longcomment@gmail.com</div>:I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.
            </li>
          </ul>
        </div>
      </div>
      <div class="section"></div>
    </div>

<!--Footer-->
<?php
include 'component/footer.php';
?>

<script>
var price_id = document.getElementById('price');
price_id.innerHTML = <?php echo intval($price);?>;
var result_price = document.getElementById('result_price');
result_price.value = <?php echo intval($price);?>;
function dropChange(){
  var dropOff = document.getElementById('dropOff').value;
  switch (dropOff) {
    case "Airport": var drop_price = 0;
    break;
    case "Nimman": var drop_price = 300;
    break;
    case "Lung More": var drop_price = 500;
    break;
    case "Suandork": var drop_price = 400;
    break;
    case "Khu Mueang": var drop_price = 200;
    break;
    default:

  }

  price.innerHTML =  <?php echo intval($price);?>+ parseInt(drop_price);
  result_price.value = <?php echo intval($price);?>+ parseInt(drop_price);

}
</script>
<!--สคริปปุ่มโดนแก้กับ Delete Tour แล้วอะนะ-->
<script type="text/javascript">
function warning(){
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '<a style="color:white" href ="php_delete_tour.php?id=<?php echo $id; ?>">Yes, delete it!</a>'
  }).then((result) => {
    if (result.value) {
      swal(
      )
    }
  })
  //อันนี้คืออันออริจิ เผื่ออยากได้
  //           swal({
  //   title: 'Are you sure?',
  //   text: "You won't be able to revert this!",
  //   type: 'warning',
  //   showCancelButton: true,
  //   confirmButtonColor: '#3085d6',
  //   cancelButtonColor: '#d33',
  //   confirmButtonText: 'Yes, delete it!'
  // }).then((result) => {
  //   if (result.value) {
  //     swal(
  //       'Deleted!',
  //       'Your file has been deleted.',
  //       'success'
  //     )
  //   }
  // })
}
</script>
</body>
</html>
<?php
}else{
  header("location: message.php");
}
?>
