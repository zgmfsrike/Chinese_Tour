<?php
include 'module/session.php';
include 'db_config.php';

// require 'module/language_switcher.php';
require 'module/language/init.php';
?>

<?php
if(isset($_GET['type']) AND isset($_GET['style']) AND isset($_GET['plan'])){



}



  $id = $_GET['id'];
  $_SESSION['tour_id'] = $id;

  // tour
  $sql = "SELECT * FROM tour_".$_COOKIE['lang']." WHERE tour_id = $id";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 0){
    //error no data
    // header("location: message.php?msg=tour_not_found");
    // return false;
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
  // $title = $tour_description;
  include 'component/header.php';
  ?>
  <body>

    <!--tour body-->
    <div class="container">
      <form action="<?php echo $trip_page;?>" method="POST">
        <div class="section"></div><div class="section"></div>
        <div class="row">
          <h3 class=""> <?php echo $tour_description; ?></h3>
          <div class="col s12">
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

      </div>
    </form>
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
          <embed src="pdf/tours_static_detail/<?php echo $file_name; ?>" type="application/pdf"   height="800px" width="90%"><br>
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
    confirmButtonText: '<a style="color:white" href ="php_delete_tour.php?id=<?php echo $id; ?>">Yes, delete it!</a>'
  }).then((result) => {
    if (result.value) {
      swal(
      )
    }
  })
}
</script>
</body>
</html>
<?php
// }else{
//   header("location: message.php");
// }
?>
