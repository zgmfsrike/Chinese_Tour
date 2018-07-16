<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
require 'module/language/lang_index.php';

$string_index_tour = "Tours";
$time = time();
?>
<!DOCTYPE html>
<html>
<?php
if(isset($_SESSION['login_id'])){
  $user_id = $_SESSION['login_id'];
  $query = "SELECT * FROM member WHERE id = '$user_id'";
  $result = mysqli_query($conn, $query);
  $objResult = mysqli_fetch_array($result);
  $username = $objResult['username'];
}

$link_all_news = "news_list.php";
$tour = "tour_".$_COOKIE['lang'];


$sql_tour_3 = "SELECT * FROM tour_".$_COOKIE['lang']." t INNER JOIN tour_round tr ON t.tour_id = tr.tour_id  " ;
// $sql_tour_3 .="where NOT tr.start_date_time < CURDATE() and tr.end_date_time >CURDATE()";
$sql_tour_3 .= "GROUP BY tr.tour_id DESC LIMIT 3";
$result_tour_3 = mysqli_query( $GLOBALS['conn'] , $sql_tour_3 );


?>
<?php
$title = "Chiang Mai Hong Thai Tour";
include 'component/header.php';
?>
<body>
  <!--Admin Manage-->
  <div id="home" class="col s12">
    <div class="slider">
      <ul class="slides">
        <?php
        for($i=1; $i<=5; $i++){
          $filename = 'images/home' . $i . '.jpg';
          if (file_exists($filename)) {
            ?>
            <li>
              <img src="images/home<?php echo $i;?>.jpg?<?php echo $time;?>" >
            </li>
            <?php
          }
        }
        ?>

        <!-- <li>
        <img src="images/home1.jpg">
        <div class="caption center-align">
        <h3>Welcome!</h3>
        <h5 class="light grey-text text-lighten-3">We're Chiangmai Hong Thai Business Consultant</h5>
      </div>
    </li>
    <li>
    <img src="images/home2.jpg">
  </li>
  <li>
  <img src="images/home3.jpg">
</li>
<li>
<img src="images/home4.jpg">
</li>
<li>
<img src="images/home5.jpg">
</li> -->
</ul>
</div>

<!--Notice-->
<div class="container row">
  <div class="col s12 m12">
    <div class="row">
      <div class="col s12 m12">
        <div class="card orange lighten-1">
          <div class="card-content white-text">
            <span class="card-title"><?php echo $string_index_announcement;?> <i class="material-icons">announcement</i></span>
            <blockquote>
              <?php echo  $string_index_announcement_cont; ?>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--News-->
<div class="container row">
  <h3><?php echo $string_index_news;?></h3>
</div>
<div class="container row">
  <?php
  $sql= "SELECT n.news_id,n.topic,n.short_description FROM news_".$_COOKIE['lang']." n ORDER BY n.news_id DESC limit 3";
  $result = mysqli_query( $GLOBALS['conn'] , $sql );
  $img_path = "./images/";

  while($show = mysqli_fetch_array($result)) {
    $news_id = $show['news_id'];
    $sql_img = "SELECT n.news_id,ni.news_image FROM news_".$_COOKIE['lang']." n INNER JOIN news_image ni on n.news_id = ni.news_id
    WHERE n.news_id = '$news_id'";
    $result_img = mysqli_query( $GLOBALS['conn'] , $sql_img );
    $show_img = mysqli_fetch_array($result_img);
    $img_name = $show_img['news_image'];
    if(!$show_img){
      $img_name = "No_Image_Available.png";
    }
    $img_file = $img_path.$img_name."?".$time;
    echo "<div class='col s12 m4'>
    <div class='card small'>
    <div class='card-image'>

    <img src='$img_file'  height='263' width='370'>
    <span class='card-title' style='white-space: nowrap;width: 12em;overflow: hidden;text-overflow: ellipsis;'>".$show['topic']."</span>
    </div>
    <div class='card-content'>
    <p style='white-space: nowrap;width: 17em;overflow: hidden;text-overflow: ellipsis;'>".$show['short_description']."</p>
    </div>
    <div class='card-action'>
    <a href='news.php?news_id=$news_id'>"."$string_index_readmore"."</a>
    </div>
    </div>
    </div>";

  }
  ?>

</div>
<div class="container row">
  <a href='<?php echo $link_all_news; ?>'><button type='button' class='btn ' name='button'>View All News</button></a>
</div>
<div class="container row">

    <h3><?php echo $string_index_tour;?></h3>
  </div>
  <div class="container row">
    <?php
    $count = mysqli_num_rows($result_tour_3);
    if($count != 0){

      ?>
    <?php
    while($show_tour = mysqli_fetch_array($result_tour_3)) {
      $tour_id = $show_tour['tour_id'];
      //get amount customer
      $sql_show_max_customer = "SELECT * FROM $tour WHERE tour_id = $tour_id";
      $result_max_customer = mysqli_query($conn, $sql_show_max_customer);
      $show = mysqli_fetch_array($result_max_customer);

      $sql_show_customer = "SELECT * FROM tour_round_member trm INNER JOIN tour_round tr ON trm.tour_round_id = tr.tour_round_id
      INNER JOIN $tour t ON tr.tour_id = t.tour_id WHERE t.tour_id = $tour_id";

      $result_show_customer = mysqli_query($conn, $sql_show_customer);
      if($result_show_customer){
        $count_customer = mysqli_num_rows($result_show_customer);
      }else{
        $count_customer = 0;
      }

      $max_customer =  $show['max_customer'];
      $seat_in_tour = $max_customer-$count_customer;
      if($seat_in_tour>0){
        //-------------------------------------------------------------------------------

        $current_date = date('Y-m-d');

        //
        // $sql_tour = "SELECT * FROM `tour_tour_type` INNER JOIN `tour_type` ON tour_tour_type.tour_type_id=tour_type.tour_type_id WHERE tour_id = $tour_id";
        // $result_tour = mysqli_query($conn, $sql_tour);
        // $tour_type_all ="";
        // while ($type = mysqli_fetch_array($result_tour)) {
        //   $tour_type_all .= $type['tour_type']." ";
        //   # code...
        // }

        $sql_acc = "SELECT * FROM `tour_accommodation` INNER JOIN `accommodation` ON tour_accommodation.accommodation_id=accommodation.accommodation_id WHERE tour_id = $tour_id";
        $result_acc = mysqli_query($conn, $sql_acc);
        $acc_all = "";

        while ($acc = mysqli_fetch_array($result_acc)) {
          $acc_all .= $acc['accommodation_level']." ";
          # code...
        }

        $sql_v = "SELECT * FROM `tour_vehicle_type` INNER JOIN `vehicle_type` ON tour_vehicle_type.vehicle_type_id=vehicle_type.vehicle_type_id WHERE tour_id = $tour_id";
        $result_v = mysqli_query($conn, $sql_v);
        $vehicle_all  = "";

        while ($v_all = mysqli_fetch_array($result_v)) {
          $vehicle_all .= $v_all['vehicle_type']." ";
          # code...
        }

        $sql_tour_img = "SELECT * FROM `tour_image` where tour_id = $tour_id";
        $result_tour_img = mysqli_query($conn, $sql_tour_img);
        $path = "images/tours/";
        if($result_tour_img){

          $data = mysqli_fetch_array($result_tour_img);
          $tour_img = $path.$data['img1']."?".$time;
        }else{
          $tour_img ="";
        }
        // <h6>Tour Type :" .$tour_type_all .  "</h6>
        $link = "tour.php?id=".$tour_id."";
        echo "
        <div class='row collection '>
        <div class='row'>
        <div class='col s12 l4'>
        <img class='materialboxed' width='300'  src='$tour_img'>
        </div>
        <div class='col s12 l4'>
        <br/>
        <h5><a href='tour.php?id=$tour_id'>" .$show_tour['tour_description'] .  "</a></h5>

        <h6>Accommodation :" .$acc_all .  "</h6>
        <h6>Vehicle : " .$vehicle_all.  "</h6>
        </div>
        <div class='col s12 l3 right-align'>
        <br/><br/>
        <h5>฿ " .$show_tour['price'] .  "</h5>
        <a href='$link'><button type='button' class='btn ' name='button'>Select</button></a>
        </div>
        </div>
        </div>
        ";
        //----------------------------------------------------------------------------------------------------

      }

    }
  }
  ?>
</div>
</div>


<!--Footer-->
<?php
include 'component/footer.php';
?>

</body>
</html>
