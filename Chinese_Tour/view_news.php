<?php
include 'module/session.php';
requireLogin();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chinese Tour</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>
    <!-- Navigation -->
  <?php
    include 'component/header.php';

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

  <div class="container">
    <br><br><br>
    <h2><?php echo $news_topic; ?></h2>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <?php
    $img_path = "./images/";
    $c = 1;
    while ($show_img = mysqli_fetch_array($result_img)) {
      $img_name = $show_img['news_image'];
      $img_file = $img_path.$img_name;
      $active ="";
      if($c==1){
        $active = "active";
        $c++;
      }
      echo "<div class='carousel-item ".$active."'>";
      echo "<img class='d-block w-100 h-400' src='$img_file' alt='$c'>";
      echo "</div>";


    }


    ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

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

    <br><br><h2>Content</h2>
    <p><?php echo $news_content;?></p>
  </div>
  <div >
    <?php
    echo "<td align ='center'><input class='btn btn-warning' type='button' value='Edit' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/EditNews.php?news_id=$news_id.'\"></td>";
    echo "<td align ='center'><input class='btn btn-danger' type='button' value='Delete' onclick=\"window.location.href='http://localhost/Chinese_Tour/Chinese_Tour/DeleteNews.php?news_id=$news_id.'\"></td>";
     ?>
  </div>
</div>


    <!-- Body -->

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
