<?php
include 'module/session.php';
include 'db_config.php';
?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // tour
    $sql = "SELECT * FROM `tour` WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
      //error no data
      echo "No data match";
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
  ?>


<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
?>
<body>

    <!--tour body-->
    <div class="container">
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
                  while($row = mysqli_fetch_array($result)){
                      $img_name = $row['img_name'];
                      ?>
                      <li>
                      <img src="images/tours/<?php echo $img_name;?>">
                    </li>
                      <?php
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
            <h5 class="center-align">Sale Price : <?php echo $price; ?> ฿</h5>
            <p class="center-align">Satisfaction <?php echo $rating; ?>% from xxxx people</p>
            <p class="center-align">xxxx people travelled</p><br/>
          </div>

          <ul>
            <li>Tour type :
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

            <li>Vehicle :
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
            <li>Accommodation :
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
          <form method="post">
            <label>Departure Location</label>
              <select class="browser-default" name="depart" required>
                <option value="">Please select</option>
                <option value="1">Chiangmai</option>
                <option value="2">Bangkok</option>
                <option value="3">Nar More</option>
                <option value="4">Lung More</option>
                <option value="5">Suandork</option>
                <option value="6">Khu Mueang</option>
              </select>
          </form>
          <form method="post">
            <label>Drop off Location</label>
              <select class="browser-default" name="dropOff" required>
                <option value="">Please select</option>
                <option value="1">Chiangmai</option>
                <option value="2">Bangkok</option>
                <option value="3">Nar More</option>
                <option value="4">Lung More</option>
                <option value="5">Suandork</option>
                <option value="6">Khu Mueang</option>
              </select>
          </form>
          <div class="section"></div>
          <div class="col s12 l6">
            <label for="datepicker">Start Date</label>
            <input type="text" id="datepicker">
          </div>
          <div class="col s12 l6">
            <label for="datepicker">End Date</label>
            <input type="text" id="datepicker2">
          </div>
          <div class="center col s12">
            <input type="submit" class="waves-effect waves-light btn orange" name="book" value="Book">
          </div>
        </div>
      </div>
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
              <embed src="pdf/tours_schedule/<?php echo $file_name; ?>" type="application/pdf"   height="800px" width="90%"><br>
          <a href="pdf/tours_schedule/'.$file_name.'">download</a>
              <?php
              // Free result set
              mysqli_free_result($result);
          }
           ?>
        </div>
      </div>

      <div class="row">
        <div class="col s12">
          <a href="AdminEditTour.php?id=<?php echo $id?>" class="btn-large btn-floating tooltipped right waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Edit Tour"><i class="material-icons">settings</i></a>
          <a href="#" id='del_button' onclick="warning();" class="btn-large btn-floating tooltipped waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Delete"><i class="material-icons">delete</i></a>

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
            confirmButtonText: '<a style="color:white" href ="DeleteNews.php?news_id=<?php echo $news_id; ?>">Yes, delete it!</a>'
          }).then((result) => {
            if (result.value) {
              swal(
                // let url = getElementById('del_button').innerHTML = "<a href ='DeleteNews.php?news_id=<?php echo $news_id; ?>'></a>";

                // '<a href ="DeleteNews.php?news_id=<?php echo $news_id; ?>">Deleted</a>!'
                // 'Your file has been deleted.',
                // 'success'
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
  echo "No id provide";
}
   ?>
