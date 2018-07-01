<?php
include 'module/session.php';
include 'db_config.php';

// require 'module/language_switcher.php';
require 'module/language/init.php';
?>

<?php
if(isset($_GET['id'])){
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
            <label>Amount of People</label>
            <label class="show-on-medium-and-down hide-on-large-only">Amount of People</label>
            <select class="browser-default" name='amount_people' required>
              <option value="" disabled selected>Amount of People</option>
              <option value='1'>1</option>
              <option value='2'>2</option>
              <option value='3'>3</option>
              <option value='4'>4</option>
              <option value='5'>5</option>
              <option value='6'>6</option>
              <option value='7'>7</option>
              <option value='8'>8</option>
              <option value='9'>9</option>
              <option value='10'>10</option>
            </select>

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
              <button type="submit" class="btn orange" name="book" value="Book">Book</button>
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
            <a href="admin_edit_tour.php?id=<?php echo $id?>" class="btn-large btn-floating tooltipped right red" data-position="top" data-delay="50" data-tooltip="Edit Tour"><i class="material-icons">settings</i></a>
            <a href="#" id='del_button' onclick="warning();" class="btn-large btn-floating tooltipped red" data-position="top" data-delay="50" data-tooltip="Delete"><i class="material-icons">delete</i></a>
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
            <?php
            $sql_comment = "SELECT * FROM feedback f
            INNER JOIN tour_round tr ON tr.tour_round_id = f.tour_round_id
            INNER JOIN tour_".$_COOKIE['lang']." t on tr.tour_id = t.tour_id
            WHERE t.tour_id =".$id." AND f.filled_date != 0000-00-00 AND f.enable = 1";
            $result_comment = mysqli_query($conn,$sql_comment);

            $num_row =mysqli_num_rows($result_comment);

            $per_page = 3;
            if(isset($_GET['page'])){
              $page = $_GET['page'];
            }else{
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
            $sql_comment .=  " LIMIT $page_start,$per_page";
            $result_comment = mysqli_query($conn,$sql_comment);

            while ($show = mysqli_fetch_array($result_comment)) {
              $comment= $show['comment'];
              $feedback_id = $show['feedback_id'];
              $fill_date = $show['filled_date'];
             ?>

            <li><div class="chip"><?php echo $feedback_id; ?></div> <?php echo $fill_date;?><span>: <?php echo $comment; ?></span> </li>

            <?php
              }

             ?>
          </ul>
          <ul class="pagination center">
            <?php
            if($prev_page){
              echo "<li class='disabled'><a href ='tour.php?page=$prev_page&id=$id'><i class='material-icons'>chevron_left</i></a></li>";
            }
            for($i =1;$i<=$num_page;$i++){
              if($i != $page){
                echo "<li><a href='tour.php?page=$i&id=$id'>$i</a></li>";
              }else if($i = $page){
                echo "<li class='active'><a href='tour.php?page=$i&id=$id'>$i</a></li>";
              }
            }
            if($page !=$num_page){
              echo "<li class='waves-effect'><a href='tour.php?page=$next_page&id=$id'><i class='material-icons'>chevron_right</i></a></li>";
            }
            ?>



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
