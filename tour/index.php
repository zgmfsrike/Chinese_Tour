<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
require 'module/language/lang_index.php';
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
        <li>
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
        </li>
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
      $sql= "SELECT n.news_id,n.topic,n.short_description FROM news_".$_COOKIE['lang']." n";
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
        $img_file = $img_path.$img_name;
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
        <a href='news.php?news_id=$news_id'>"."READ MORE"."</a>
        </div>
        </div>
        </div>";

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
