<?php
session_cache_expire(30);
error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
//----------------------------Wait for session---------------------------------------------//
session_start();

if(isset($_SESSION['login_id']) && isset($_SESSION['news_id'])){
//-----------------------------Create news fucntion----------------------------------------------------//
if($_POST['save']){
  $news_id =  $_SESSION['news_id'];
  $news_topic = $_POST['newsAddtopic'];
  // $news_image = $_FILES['newsPicAddtopic1'];
  $news_description = $_POST['newsDescription'];
  $last_edit_date = date("Y-m-d");


  //$news_content = $_POST['newsContent'];

  if($news_topic != "" && $news_description !=""){
    $sql= "UPDATE `news` SET `last_edit_date`='$last_edit_date',`topic`='$news_topic',
    `short_description`='$news_description' WHERE news_id = $news_id";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    // $last_id = mysqli_insert_id($GLOBALS['conn']);

    // $sql_img = "SELECT ni.news_image
    //             FROM news n INNER JOIN news_image ni on n.news_id =ni.news_id";
    // $result_img = mysqli_query($GLOBALS['conn'],$sql_img);
    // $data_img = mysqli_fetch_array($result_img);


    if ($result) {
      $news_id = explode(".", $news_id);
      // echo "NEws : ".$news_id[0];

        for($i=1;$i<6;$i++){
          $old_img = "img_".$news_id[0]."_".$i;
          if(!isset($_FILES['newsPicAddtopic'.$i]) || $_FILES['newsPicAddtopic'.$i]['error'] == UPLOAD_ERR_NO_FILE){
            echo "Image : ".$i." no file ";
            // echo "<br>";
          }else {
            // echo "Image : ".$i." have file ";
            // echo "<br>";

              // -----Upload PDF-----
              $ext = pathinfo(basename($_FILES['newsPicAddtopic'.$i]['name'] ),PATHINFO_EXTENSION);
              $check_ext = strtolower( $ext);
              // echo $check_ext;


              // if($check_ext == "jpeg" or "jpg" or "png" or "gif"){

                $new_image_name = 'img_'.$news_id[0].'_'.$i.'.'.$ext;
                echo $new_image_name;
                $img_path = "images/";
                $upload_path = $img_path.$new_image_name;
                if(file_exists($upload_path)){
                      unlink($upload_path);

                  }
                $success = move_uploaded_file($_FILES['newsPicAddtopic'.$i]['tmp_name'] ,$upload_path);
                if($success == FALSE){
                  echo "Cannot upload images";
                  exit();
                }
                $news_image = $new_image_name;

                // ---------------------------
                $sql2 = "UPDATE `news_image` SET `news_image`='$news_image' WHERE news_image LIKE '$old_img%' ";
                $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );

                $sql_result_update = "SELECT `news_image` FROM `news_image` WHERE news_image LIKE '$news_image%'";
                $result_update = mysqli_query($GLOBALS['conn'] , $sql_result_update );
                $count_row = mysqli_num_rows($result_update);



                if($count_row  == 0){

                  $sql_add = "INSERT INTO news_image(news_id, news_image) VALUES ('$news_id[0]','$news_image')";
                  $result_add = mysqli_query( $GLOBALS['conn'],$sql_add);

                }


              // }

          }

        }
        for($j=1;$j<6;$j++){
          $old_pdf = "pdf_".$news_id[0]."_".$j;
          if(!isset($_FILES['newsPdf'.$j]) || $_FILES['newsPdf'.$j]['error'] == UPLOAD_ERR_NO_FILE){
            echo "PDF : ".$j." no file ";
            // echo "<br>";
          }else {
            // echo "Image : ".$i." have file ";
            // echo "<br>";

              // -----Upload PDF-----
              $ext = pathinfo(basename($_FILES['newsPdf'.$j]['name'] ),PATHINFO_EXTENSION);
              $check_ext = strtolower( $ext);

              $old_pdf_name = basename($_FILES['newsPdf'.$j]['name']);
              // echo $old_pdf_name;

              // echo $check_ext;

              if($check_ext == "pdf"){
                $new_pdf_name = 'pdf_'.$news_id[0].'_'.$j.'.'.$ext;
                $pdf_path = "pdf/";
                $upload_path_pdf = $pdf_path.$new_pdf_name;
                if(file_exists($upload_path_pdf)){
                      unlink($upload_path_pdf);
                  }
                $success = move_uploaded_file($_FILES['newsPdf'.$j]['tmp_name'] ,$upload_path_pdf);
                if($success == FALSE){
                  echo "Cannot upload pdf";
                  exit();
                }
                $news_pdf = $new_pdf_name;

                // ---------------------------
                $sql3 = "UPDATE `news_pdf` SET `news_pdf`='$news_pdf',`pdf_name`='$old_pdf_name' WHERE news_pdf LIKE '$old_pdf%'";
                $result3 = mysqli_query( $GLOBALS['conn'] , $sql3 );


                $sql_result_update = "SELECT `news_pdf` FROM `news_pdf` WHERE news_pdf LIKE '$news_pdf%'";
                $result_update = mysqli_query($GLOBALS['conn'] , $sql_result_update );
                $count_row = mysqli_num_rows($result_update);
                echo"row".$count_row;

                if($count_row  == 0){
                  echo "fail to update";
                  $sql_add_pdf = "INSERT INTO news_pdf(news_id, news_pdf,pdf_name) VALUES ('$news_id[0]','$news_pdf','$old_pdf_name')";
                  $result_add = mysqli_query( $GLOBALS['conn'],$sql_add_pdf);

                }


              }

          }

        }

        header("location: message.php?msg=edit_news_succ");
  }


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// -------------------------




    }



}



?>
