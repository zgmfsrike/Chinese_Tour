<?php
// error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
//include "db_config.php";
include "module/hashing.php";
//----------------------------Wait for session---------------------------------------------//
include 'module/session.php';


if(isset($_SESSION['login_id'])){
  //-----------------------------Create news fucntion----------------------------------------------------//
  if(isset($_POST['save'])){
    $news_topic_en = $_POST['newsAddtopic_en'];
    // $news_image = $_FILES['newsPicAddtopic1'];
    $news_description_en = $_POST['newsDescription_en'];
    $news_content_en = $_POST['newsContent_en'];

    $news_topic_ch = $_POST['newsAddtopic_ch'];
    // $news_image = $_FILES['newsPicAddtopic1'];
    $news_description_ch = $_POST['newsDescription_ch'];
    $news_content_ch = $_POST['newsContent_ch'];

    $news_topic_th = $_POST['newsAddtopic_th'];
    // $news_image = $_FILES['newsPicAddtopic1'];
    $news_description_th = $_POST['newsDescription_th'];
    $news_content_th = $_POST['newsContent_th'];

    $start_date = date("Y-m-d");


    //$news_content = $_POST['newsContent'];

    if($news_topic_en != "" && $news_description_en !="" && $news_topic_ch != "" && $news_description_ch !="" && $news_topic_th != "" && $news_description_th !=""){
      $sql= "INSERT INTO news_en (create_date, topic, short_description,content)
      VALUES ('$start_date','$news_topic_en','$news_description_en','$news_content_en')";
      $result = mysqli_query( $GLOBALS['conn'] , $sql );

      $sql= "INSERT INTO news_ch (create_date, topic, short_description,content)
      VALUES ('$start_date','$news_topic_ch','$news_description_ch','$news_content_ch')";
      $result = mysqli_query( $GLOBALS['conn'] , $sql );

      $sql= "INSERT INTO news_th (create_date, topic, short_description,content)
      VALUES ('$start_date','$news_topic_th','$news_description_th','$news_content_th')";
      $result = mysqli_query( $GLOBALS['conn'] , $sql );

      $last_id = mysqli_insert_id($GLOBALS['conn']);

      if ($result) {
        $count_img = 0;
        $count_pdf = 0;

        for($i=1;$i<6;$i++){
          if(!isset($_FILES['newsPicAddtopic'.$i]) || $_FILES['newsPicAddtopic'.$i]['error'] == UPLOAD_ERR_NO_FILE){
            // echo "Image : ".$i." no file ";
            // echo "<br>";
            echo "error upload";
          }else {
            // echo "Image : ".$i." have file ";
            // echo "<br>";
            $count_img++;
            // -----Upload PDF-----
            $ext = pathinfo(basename($_FILES['newsPicAddtopic'.$i]['name'] ),PATHINFO_EXTENSION);
            // $check_ext = strtolower($ext);

            $file_type = $_FILES['newsPicAddtopic'.$i]['type'];

            $allowed = array("image/jpeg", "image/gif", "image/png");
            if(!in_array($file_type, $allowed)) {
              header("location: message.php?msg=not_image");

              exit();
            }

            // if($check_ext == "jpeg" or "jpg" or "png" or "gif"){


            $img_path = "images/";

            $img = $_FILES['newsPicAddtopic'.$i]['tmp_name'];
            $new_image_name = 'img_'.$last_id.'_'.$count_img;
            $dst = $img_path.$new_image_name ;

            if (($img_info = getimagesize($img)) === FALSE){
              //     // header("location: message.php?msg=not_image");
              //     // exit();
            }
            // $width = $img_info[0];
            // $height = $img_info[1];
            $width=1280;
            $height=500;
            switch ($img_info[2]) {
              case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
              case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
              case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
              default : die("Unknown filetype");
            }
            $photoX = ImagesX($src);
            $photoY = ImagesY($src);

            $tmp = imagecreatetruecolor($width, $height);
            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $photoX, $photoY);
            $success= imagejpeg($tmp, $dst.".jpg");
            if($success == FALSE){
              echo "Cannot upload images";
              exit();
            }
            $news_image = $new_image_name.".jpg";

            // ---------------------------
            $sql2 = "INSERT INTO news_image(news_id, news_image,img_index) VALUES ('$last_id','$news_image','$count_img')";
            $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );


          }

        }

      }
      for($j=1;$j<6;$j++){
        if(!isset($_FILES['newsPdf'.$j]) || $_FILES['newsPdf'.$j]['error'] == UPLOAD_ERR_NO_FILE){
          // echo "Image : ".$i." no file ";
          // echo "<br>";
        }else {
          // echo "Image : ".$i." have file ";
          // echo "<br>";
          $file_type = $_FILES['newsPdf'.$j]['type'];

          $allowed = array("application/pdf");
          if(!in_array($file_type, $allowed)) {

            header("location: message.php?msg=not_pdf");

            exit();

          }
          $count_pdf++;

          $ext = pathinfo(basename($_FILES['newsPdf'.$j]['name'] ),PATHINFO_EXTENSION);
          // $check_ext = strtolower( $ext);

          $old_pdf_name = basename($_FILES['newsPdf'.$j]['name']);
          // echo $old_pdf_name;
          // $sql_add_pdf_name = "INSERT INTO `news_pdf`( `pdf_name`) VALUES ('$old_pdf_name') WHERE news_id ='$last_id'";
          // $add_name = mysqli_query($GLOBALS['conn'] , $sql_add_pdf_name);


          $new_pdf_name = 'pdf_'.$last_id.'_'.$count_pdf.'.'.$ext;
          $pdf_path = "pdf/";
          $upload_path_pdf = $pdf_path.$new_pdf_name;
          $success = move_uploaded_file($_FILES['newsPdf'.$j]['tmp_name'] ,$upload_path_pdf);
          if($success == FALSE){
            echo "Cannot upload pdf";
            exit();
          }
          $news_pdf = $new_pdf_name;

          // ---------------------------
          $sql3 = "INSERT INTO news_pdf(news_id, news_pdf,pdf_name,pdf_index) VALUES ('$last_id','$news_pdf','$old_pdf_name','$count_pdf')";
          $result3 = mysqli_query( $GLOBALS['conn'] , $sql3 );







        }

      }



      header("location: message.php?msg=create_news_succ&id=".$last_id);

    }


  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  // -------------------------

}else{
  echo 'no login session';
}



?>
