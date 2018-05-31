<?php
include 'module/session.php';
include 'db_config.php';

// require 'module/language_switcher.php';
require 'module/language/init.php';
?>

<?php
if(isset($_GET['type']) AND isset($_GET['style']) AND isset($_GET['plan'])){

}

if(isset($_GET['type'])){

  if($_GET['type'] == 'meeting'){

    if(isset($_GET['style']) AND isset($_GET['plan'])){

      $style = $_GET['style'];
      $plan = $_GET['plan'];

      // tour
      $sql = "SELECT * FROM tour_meeting WHERE style = $style AND plan = '$plan'";
      $result = mysqli_query($conn, $sql);

      // echo $sql;
      // exit();

      if(mysqli_num_rows($result) == 0){
        // error no data
        header("location: message.php?msg=tour_not_found");
        return false;
      }

      $data = mysqli_fetch_array($result);

      $tour_title = $data['title'];
      $pdf = $data['pdf'];

    }

  }

}

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
        <div class="section"></div>
        <div class="row">
          <h3 class=""> <?php echo $tour_title; ?></h3>
        </div>
    <div class="row card">
      <div class="col s12">
        <h5>Plan</h5><hr/>
          <embed src="pdf/tours_static_detail/meeting/<?php echo $pdf; ?>" type="application/pdf"   height="900px" width="100%"><br>
            <a href="pdf/tours_static_detail/meeting/<?php echo $pdf; ?>">download</a>
        </div>
      </div>

    </div>

<!--Footer-->
<?php
include 'component/footer.php';
?>
</body>
</html>
<?php
// }else{
//   header("location: message.php");
// }
?>
