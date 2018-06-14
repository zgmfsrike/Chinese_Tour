<?php
include('module/session.php');
if(!isLoginAs(array('admin'))){
  header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';

error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
// include "lib/pagination.php";
$link_manage_comment = "php_manage_comment.php";
if(isset($_GET['tour_id'])){
  $tour_id = $_GET['tour_id'];
}
?>

<!DOCTYPE html>
<html>
<?php
$title = "Tour Round";
include 'component/header.php';
?>
<body>
  <!-- Page Content -->
  <div class="container">
    <!-- Content Row -->
    <div class="row">

      <!-- Content Column -->
      <div class="col s12">
      </div>
      <div class="container col s12">
        <br/>
        <h3 class="center"><b>Comment Management</b></h3>
        <form action="<?php echo $link_manage_comment; ?>" method="post">
          <input type="text" name="tour_id" id='tour_id' value="<?php echo $tour_id;?>" style="display:none" >
          <table style='overflow-x:auto;' class='responsive-table table table-striped highlight centered'>
            <thead>
              <tr align='center'>
                <th>No.</th>
                <th>Feedback ID</th>
                <th>Reference Code</th>
                <th>Comment</th>
                <th>Enable</th>
              </tr>
            </thead>
            <tbody>

              <?php
              if(isset($_SESSION['login_id'])){


                //-----------------------------Comment---------------------------------------------------//
                $sql_comment = "SELECT * FROM feedback f
                INNER JOIN tour_round tr ON tr.tour_round_id = f.tour_round_id
                INNER JOIN tour_".$_COOKIE['lang']." t on tr.tour_id = t.tour_id
                WHERE t.tour_id =".$tour_id." AND f.filled_date != 0000-00-00";
                $result_comment = mysqli_query($conn,$sql_comment);


                // $result = page_query($GLOBALS['conn'],$sql,2);
                $num_row =mysqli_num_rows($result_comment);

                $per_page = 10;
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
                $sql_comment .=  " LIMIT $page_start,$per_page";
                $result_comment = mysqli_query($conn,$sql_comment);

                while ($show = mysqli_fetch_array($result_comment)) {
                  $id = $show['id'];
                  $feedback_id = $show['feedback_id'];
                  $reference_code =$show['group_member_ref'];
                  $comment = $show['comment'];
                  $enable = $show['enable'];




                  if($enable == 1){
                    $enable = "checked";
                  }else{
                    $enable = "";
                  }
                  ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $feedback_id;?></td>
                    <td><?php echo $reference_code; ?></td>
                    <td><?php echo $comment; ?></td>
                    <td>

                      <input type="checkbox" id="<?php echo $id;?>" name="enable_<?php echo $id;?>" <?php echo $enable?>/>
                      <label for="<?php echo $id;?>" ></label>
                    </td>
                  </tr>

                  <?php


                  ?>






                  <?php
                }



              }

              ?>
            </tbody>
          </table>
          <div class="center-align" style="margin-bottom:30px; margin-top:30px;">
            <input class="btn green" type="submit" name="save" value="Save">
          </div>
        </form>
      </div>

      <ul class="pagination">
        <?php
        if($prev_page){
          echo "<li class='disabled'><a href ='$link_manage_comment?page=$prev_page&tour_id=$tour_id'><i class='material-icons'>chevron_left</i></a></li>";
        }
        for($i =1;$i<=$num_page;$i++){
          if($i != $page){
            echo "<li><a href='$link_manage_comment?page=$i&tour_id=$tour_id'>$i</a></li>";
          }else if($i = $page){
            echo "<li class='active'><a href='$link_manage_comment?page=$i&tour_id=$tour_id'>$i</a></li>";
          }
        }
        if($page !=$num_page){
          echo "<li class='waves-effect'><a href='$link_manage_comment?page=$next_page&tour_id=$tour_id'><i class='material-icons'>chevron_right</i></a></li>";
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
