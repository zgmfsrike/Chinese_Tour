<?php
include('module/session.php');

require 'module/language/init.php';

error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
// include "lib/pagination.php";
?>

<!DOCTYPE html>
<html>
<?php
$title = "Tour Round";
include 'component/header.php';
$link_news_list = "news_list.php";
?>
<body>
  <!-- Page Content -->
  <div class="container">
    <!-- Content Row -->
    <div class="row">

      <!-- Content Column -->
      <div class="col s12">
        <h3>News</h3>
      </div>

      <?php
      if(isset($_SESSION['login_id'])){

        //-----------------------------Search fucntion----------------------------------------------------//
        $sql = "SELECT * FROM news_".$_COOKIE['lang']."";
        $result = mysqli_query($conn, $sql);

        // $result = page_query($GLOBALS['conn'],$sql,2);
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
        $sql .=  " LIMIT $page_start,$per_page";
        $result = mysqli_query($conn,$sql);

        while ($show = mysqli_fetch_array($result)) {
          $news_topic = $show['topic'];
          $news_description = $show['short_description'];
          $news_created = $show['create_date'];
          $news_id = $show['news_id'];
          $link_news = "news.php?news_id=".$news_id;
          //show image
          $img_path = "./images/";
          $sql_img = "SELECT n.news_id,ni.news_image FROM news_".$_COOKIE['lang']." n INNER JOIN news_image ni on n.news_id = ni.news_id
          WHERE n.news_id = '$news_id'";
          $result_img = mysqli_query( $GLOBALS['conn'] , $sql_img );
          $show_img = mysqli_fetch_array($result_img);
          $img_name = $show_img['news_image'];
          $img_file = $img_path.$img_name;
        ?>
        <div class='row collection hide-on-med-and-down'>
        <div class='row'>
        <div class='col s12 l4'>
        <img class='materialboxed' width='400' src='<?php echo $img_file; ?>'>
        </div>
        <div class='col s12 l4'>
        <br/>
        <h4><a href="<?php echo $link_news;?>"><?php echo $news_topic;?></a></h4>
        <h5><?php echo $news_description; ?></h5>
        <h6>Created Date : <?php echo $news_created; ?></h6>
        </div>
        <div class='col s12 l3 right-align'>
        <br/><br/>
        <a href="<?php echo $link_news; ?>"><button type='button' class='btn ' name='button'>Read More</button></a>
        </div>
        </div>
        </div>

        <div class='row collection show-on-medium-and-down hide-on-large-only'>
        <div class='row center'>
        <div class='col s12 l4'>
        <img class='materialboxed' width='400' src='<?php echo $img_file; ?>'>
        </div>
        <div class='col s12 l4'>
        <br/>
        <h4><a href="<?php echo $link_news;?>"><?php echo $news_topic;?></a></h4>
        <h5><?php echo $news_description; ?></h5>
        <h6>Created Date : <?php echo $news_created; ?></h6>
        </div>
        <div class='col s12 l3 right-align'>
        <br/><br/>
        <a href="<?php echo $link_news; ?>"><button type='button' class='btn ' name='button'>Read More</button></a>
        </div>
        </div>
        </div>

        <?php
        }



      }

      ?>

      <ul class="pagination">
        <?php
        if($prev_page){
          echo "<li class='disabled'><a href ='$link_news_list&page=$prev_page'><i class='material-icons'>chevron_left</i></a></li>";
        }
        for($i =1;$i<=$num_page;$i++){
          if($i != $page){
            echo "<li><a href='$link_news_list&page=$i'>$i</a></li>";
          }else if($i = $page){
            echo "<li class='active'><a href='$link_news_list&page=$i'>$i</a></li>";
          }
        }
        if($page !=$num_page){
          echo "<li class='waves-effect'><a href='news_list.php&page=$next_page'><i class='material-icons'>chevron_right</i></a></li>";
        }
        ?>



      </ul>

      <!-- /.row -->

    </div>
  </div>
  <?php
  include 'component/footer.php';
  ?>
</body>
</html>
