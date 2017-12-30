<?php
include('module/session.php');
 ?>
<!DOCTYPE html>
  <html>
  <?php
   //isAdmin();
  include "db_config.php";
   ?>
   <?php
      include 'component/header.php';
      ?>
<body>
  <?php

    if($_GET['news_id'] != ""){

      $news_id = $_GET['news_id'];
      // ----------- IMG & PDF---------------
      $sql_img = "SELECT n.news_id,ni.news_image FROM news n INNER JOIN news_image ni on n.news_id = ni.news_id
                  WHERE n.news_id = '$news_id'";
      $result_img = mysqli_query( $GLOBALS['conn'] , $sql_img );

      $sql= "SELECT n.news_id,n.topic,n.content FROM news n WHERE n.news_id = '$news_id'";
      $result = mysqli_query( $GLOBALS['conn'] , $sql );
      $show = mysqli_fetch_array($result);
      $news_topic = $show['topic'];
      $news_content = $show['content'];

      $sql_pdf = "SELECT n.news_id,np.news_pdf,np.pdf_name
      FROM news n INNER JOIN news_pdf np on n.news_id = np.news_id
      WHERE n.news_id = $news_id";

      $result_pdf = mysqli_query($GLOBALS['conn'] , $sql_pdf);

    }

  ?>
      <!--Edit News Here-->

      <div class="container">
        <div class="section"></div>
        <div class="slider">
          <ul class="slides">

            <?php
            $img_path = "./images/";
            $c = 1;
            while ($show_img = mysqli_fetch_array($result_img)) {
              $img_name = $show_img['news_image'];
              $img_file = $img_path.$img_name;
              // $active ="";
              // if($c==1){
              //   $active = "active";
              //   $c++;
              // }
              // echo "<div class='carousel-item ".$active."'>";
              // echo "<img class='d-block w-100 h-400' src='$img_file' alt='$c'>";
              // echo "</div>";
              echo "<li>
                <img src='$img_file'>
              </li>";


            }


            ?>




          </ul>
        </div>
        <div>
          <?php
          $txt = "PDF_";
          $pdf_path = "./pdf/";
          $i = 1;

          while ($show_pdf = mysqli_fetch_array($result_pdf)) {
            $show_txt = $txt.$i;
            $pdf_name = $show_pdf['pdf_name'];

            $pdf_file = $pdf_path.$pdf_name;
            echo "<br><a href='$pdf_file' download='$pdf_name'><h4>".$pdf_name."</h4></a>";
            // echo "<a href='$pdf_file' download='$pdf_name'></a>";
            // echo "<iframe src='$pdf_file' width='700' height='500'></iframe>";
            $i++;

          }


          ?>

        </div>
      </div>

      <div class="container">
          <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-content black-text">
                  <span class="card-title" id="newsTopic"><?php echo $news_topic; ?></span>
                  <ul>
                    <li>
                      <?php echo $news_content; ?>
                      </li>
                  </ul>
                </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="right">
          <a href="EditNews.php?news_id=<?php echo $news_id; ?>" class="btn-large btn-floating tooltipped waves-effect waves-light amber" data-position="top" data-delay="50" data-tooltip="Edit News"><i class="material-icons">edit</i></a>
          <a href="#" id='del_button' onclick="warning();" class="btn-large btn-floating tooltipped waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Delete"><i class="material-icons">delete</i></a>
        </div>
      </div>
      </div>

      <!--Footer-->
      <?php
      include 'component/footer.php';
      ?>

      <!-- ย้ายไปไฟล์ js แยกแล้วใช้ไม่ได้อะ เลยแปะไว้ตรงนี้แทน งง -0- -->
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
      }

      </script>

    </body>
  </html>
