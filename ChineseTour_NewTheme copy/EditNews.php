<?php
include 'module/session.php';
isLogin();
include "db_config.php";
if($_GET['news_id'] != ""){
  $news_id = $_GET['news_id'];
  $_SESSION['news_id'] = $news_id;

  $sql= "SELECT n.news_id,n.topic,n.content,n.short_description FROM news n WHERE n.news_id = '$news_id'";
  $result = mysqli_query( $GLOBALS['conn'] , $sql );
  $show = mysqli_fetch_array($result);
  $news_topic = $show['topic'];
  $news_description = $show['short_description'];
  $news_content = $show['content'];


  // ----------- IMG & PDF---------------
  $sql_db =  "SELECT n.topic,n.topic,n.short_description,ni.news_image,np.news_pdf
  FROM news n INNER JOIN news_image ni ON n.news_id = ni.news_id  INNER JOIN news_pdf np ON n.news_id = np.news_id
  WHERE n.news_id = $news_id" ;
  $result_db = mysqli_query($conn,$sql_db);
  $data =  mysqli_fetch_array($result_db);


  // ----------------------------------------

  // -------------Only IMG---------- ------
  $sql_db_img = "SELECT n.topic,n.short_description,ni.news_image
  FROM news n INNER JOIN news_image ni on n.news_id = ni.news_id
  WHERE n.news_id = $news_id";
  $result_img = mysqli_query($conn,$sql_db_img);



  // ---------------------------------------

// -----------------------Only PDF-------------------
  $sql_db_pdf = "SELECT n.topic,n.short_description,np.news_pdf
  FROM news n INNER JOIN news_pdf np ON n.news_id = np.news_id
  WHERE n.news_id = $news_id";
  $result_pdf = mysqli_query($conn,$sql_db_pdf);


// --------------------------------------------------

// if($data){
//   // echo "Have img & pdf";
//
//   // $news_image = $data['news_image'];
//   // $news_pdf = $data['news_pdf'];
// }else if($data_img) {
//   // echo "Have img no pdf";
//
//   // $news_image = $data_img['news_image'];
// }else if($data_pdf){
//   // echo "Have pdf no img";
//
//   // $news_pdf = $data_pdf['news_pdf'];
// }

}
// $data = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
?>
<body>

    <!-- Body -->
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h3 class="entry-title"><span><br><br>Create News</span> </h3>
          <hr>
        <form class="form-horizonta" action="php_edit_news.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="col-md-8 col-sm-9">
              <label for="control-label col-sm-8"><h5>Topic</h5></label>
              <div class="col-md-8">
                <div class="input-group">
                  <input required type="text" class="form-control" value="<?php echo $news_topic ?>" name="newsAddtopic">
                </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-8 col-sm-9">
            <label for="control-label col-sm-8"><h5>Add images</h5></label>
            <?php
            $count_img = 1;
            $count_pdf = 1;
            $img_path = "./images/";

            if($data){
              // echo "Have img & pdf";
              $sql_show_img = "SELECT ni.news_image
                                FROM news n INNER JOIN news_image ni on n.news_id =ni.news_id WHERE n.news_id = '$news_id'";
              $result_show_img = mysqli_query($conn,$sql_show_img);
              while ($data_db_img = mysqli_fetch_array($result_show_img)) {
                $img_file = $img_path.$data_db_img['news_image'];
                echo "<br>Current images : ".$data_db_img['news_image'];
                echo "<br><img src ='$img_file' width='200' height='150'>";
                echo "<input class='form-control' type='file' name='newsPicAddtopic".$count_img."' accept='image/*'>";
                $count_img++;
              }
              for($i = $count_img;$i<6;$i++){
                echo "<input class='form-control' type='file' name='newsPicAddtopic".$i."'  accept='image/*'>";
              }

              $sql_show_pdf = "SELECT np.news_pdf
                                FROM news n INNER JOIN news_pdf np on n.news_id =np.news_id WHERE n.news_id = '$news_id'";
              $result_show_pdf = mysqli_query($conn,$sql_show_pdf);
                echo "<br><h5>Add PDF</h5>";
              while ($data_db_pdf =mysqli_fetch_array($result_show_pdf)){

                echo "<br>Current file : ".$data_db_pdf['news_pdf'];
                echo "<input class='form-control' type='file' name='newsPdf".$count_pdf."' accept='application/pdf'>";
                $count_pdf++;
              }
              for($g = $count_pdf;$g<6;$g++){
                echo "<input class='form-control' type='file' name='newsPdf".$g."' accept='application/pdf'>";
              }



              // }
            }else if($data_img = mysqli_fetch_array($result_img)) {

              $sql_show_img = "SELECT ni.news_image
                                FROM news n INNER JOIN news_image ni on n.news_id =ni.news_id WHERE n.news_id = '$news_id'";
              $result_show_img = mysqli_query($conn,$sql_show_img);
              while ($data_db_img = mysqli_fetch_array($result_show_img)) {
                $img_file = $img_path.$data_db_img['news_image'];
                echo "<br>Current images : ".$data_db_img['news_image'];
                echo "<br><img src ='$img_file' width='200' height='150'>";
                echo "<input class='form-control' type='file' name='newsPicAddtopic".$count_img."' accept='image/*'>";
                $count_img++;
              }
              for($i = $count_img;$i<6;$i++){
                echo "<input class='form-control' type='file' name='newsPicAddtopic".$i."'  accept='image/*'>";
              }

              echo "<br><h5>Add PDF</h5>";
              for($g = 1;$g<6;$g++){

                echo "<input class='form-control' type='file' name='newsPdf".$g."' accept='application/pdf'>";
              }
              // echo "Have img no pdf";

            }else if($data_pdf = mysqli_fetch_array($result_pdf)){
              // echo "Have pdf no img";
              for($i = 1;$i<6;$i++){
                echo "<input class='form-control' type='file' name='newsPicAddtopic".$i."'  accept='image/*'>";
              }

              $sql_show_pdf = "SELECT np.news_pdf
                                FROM news n INNER JOIN news_pdf np on n.news_id =np.news_id WHERE n.news_id = '$news_id'";
              $result_show_pdf = mysqli_query($conn,$sql_show_pdf);
                echo "<br><h5>Add PDF</h5>";
              while ($data_db_pdf =mysqli_fetch_array($result_show_pdf)){

                echo "<br>Current file : ".$data_db_pdf['news_pdf'];
                echo "<input class='form-control' type='file' name='newsPdf".$count_pdf."' accept='application/pdf'>";
                $count_pdf++;
              }
              for($g = $count_pdf;$g<6;$g++){
                echo "<input class='form-control' type='file' name='newsPdf".$g."' accept='application/pdf'>";
              }


            }

            ?>

        </div>

        </div>
        <div class="form-group">
          <div class="col-md-8 col-sm-9">
            <label for="control-label col-sm-8"><h5>Description</h5></label>
            <textarea required name="newsDescription" rows="8"   cols="80" maxlength="500" minlength="10"><?php echo $news_description ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-8 col-sm-9">
            <label for="control-label col-sm-8"><h5>Content</h5></label>
            <textarea required name="newsContent" rows="8"   cols="80" maxlength="500" minlength="10"><?php echo $news_content ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-8 col-sm-9">
            <input name="save" type="submit" class="btn btn-danger btn-md" value="Save">
          <input name="cancel" type="button" value="Cancel" onclick="window.location.href='http://localhost/Chinese_Tour/ChineseTour_NewTheme%20copy/view_news.php?news_id=<?php echo $news_id?>'" class="btn btn-warning">

          </div>
        </div>
        </form>
    </div>
    </div>
    </div>


    <!-- Footer -->
    <?php
      include 'component/footer.php';
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
