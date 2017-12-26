<?php
session_cache_expire(30);
error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
//----------------------------Wait for session---------------------------------------------//
session_start();

if(isset($_SESSION['login_id'])){
//-----------------------------Create news fucntion----------------------------------------------------//
if($_POST['save']){
  $news_topic = $_POST['newsAddtopic'];
  // $news_image = $_FILES['newsPicAddtopic1'];
  $news_description = $_POST['newsDescription'];
  $news_content = $_POST['newsContent'];
  $start_date = date("Y-m-d");


  //$news_content = $_POST['newsContent'];

  if($news_topic != "" && $news_description !=""){
    $sql= "INSERT INTO news (create_date, topic, short_description,content)
    VALUES ('$start_date','$news_topic','$news_description','$news_content')";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    $last_id = mysqli_insert_id($GLOBALS['conn']);

    if ($result) {

        for($i=1;$i<6;$i++){
          if(!isset($_FILES['newsPicAddtopic'.$i]) || $_FILES['newsPicAddtopic'.$i]['error'] == UPLOAD_ERR_NO_FILE){
            // echo "Image : ".$i." no file ";
            // echo "<br>";
          }else {
            // echo "Image : ".$i." have file ";
            // echo "<br>";

              // -----Upload PDF-----
              $ext = pathinfo(basename($_FILES['newsPicAddtopic'.$i]['name'] ),PATHINFO_EXTENSION);
              $check_ext = strtolower( $ext);

              if($check_ext == "jpeg" or "jpg" or "png" or "gif"){
                // $new_pdf_name = 'pdf_'.uniqid().".".$ext;
                // $pdf_path = "pdf/";
                // $upload_path_pdf = $pdf_path.$new_pdf_name;
                // $success = move_uploaded_file($_FILES['newsPicAddtopic'.$i]['tmp_name'] ,$upload_path_pdf);
                // if($success == FALSE){
                //   echo "Cannot upload pdf";
                //   exit();
                // }
                // $news_pdf = $new_pdf_name;
                //
                // // ---------------------------
                // $sql3 = "INSERT INTO news_pdf(news_id, news_pdf) VALUES ('$last_id','$news_pdf')";
                // $result3 = mysqli_query( $GLOBALS['conn'] , $sql3 );
                //





                $new_image_name = 'img_'.$last_id.'_'.$i.'.'.$ext;
                $img_path = "images/";
                $upload_path = $img_path.$new_image_name;

                $images = $_FILES['newsPicAddtopic'.$i]["tmp_name"];
            		copy($_FILES['newsPicAddtopic'.$i]["tmp_name"],"images/".$_FILES['newsPicAddtopic'.$i]["name"]);
            		$width=100; //*** Fix Width & Heigh (Autu caculate) ***//
            		$size=GetimageSize($images);
            		$height=round($width*$size[1]/$size[0]);
            		$images_orig = ImageCreateFromJPEG($images);
            		$photoX = ImagesX($images_orig);
            		$photoY = ImagesY($images_orig);
            		$images_fin = ImageCreateTrueColor($width, $height);
            		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
            		$success= ImageJPEG($images_fin,"images/".  $new_image_name);
            		ImageDestroy($images_orig);
            		ImageDestroy($images_fin);



                // $success = move_uploaded_file($_FILES['newsPicAddtopic'.$i]['tmp_name'] ,$upload_path);
                if($success == FALSE){
                  echo "Cannot upload images";
                  exit();
                }
                $news_image = $new_image_name;

                // ---------------------------
                $sql2 = "INSERT INTO news_image(news_id, news_image) VALUES ('$last_id','$news_image')";
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

            $ext = pathinfo(basename($_FILES['newsPdf'.$j]['name'] ),PATHINFO_EXTENSION);
            $check_ext = strtolower( $ext);

            $old_pdf_name = basename($_FILES['newsPdf'.$j]['name']);
            // echo $old_pdf_name;
            // $sql_add_pdf_name = "INSERT INTO `news_pdf`( `pdf_name`) VALUES ('$old_pdf_name') WHERE news_id ='$last_id'";
            // $add_name = mysqli_query($GLOBALS['conn'] , $sql_add_pdf_name);


              $new_pdf_name = 'pdf_'.$last_id.'_'.$j.'.'.$ext;
              $pdf_path = "pdf/";
              $upload_path_pdf = $pdf_path.$new_pdf_name;
              $success = move_uploaded_file($_FILES['newsPdf'.$j]['tmp_name'] ,$upload_path_pdf);
              if($success == FALSE){
                echo "Cannot upload pdf";
                exit();
              }
              $news_pdf = $new_pdf_name;

              // ---------------------------
              $sql3 = "INSERT INTO news_pdf(news_id, news_pdf,pdf_name) VALUES ('$last_id','$news_pdf','$old_pdf_name')";
              $result3 = mysqli_query( $GLOBALS['conn'] , $sql3 );







          }

        }



        header("location: message.php?msg=create_news_succ");

  }


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// -------------------------




    }



}



?>
