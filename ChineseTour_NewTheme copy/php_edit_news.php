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
    $news_topic = addslashes($news_topic);
    // $news_image = $_FILES['newsPicAddtopic1'];

    $news_description = $_POST['newsDescription'];
    $news_description = addslashes($news_description);
    $last_edit_date = date("Y-m-d");


    $news_content = $_POST['newsContent'];
    $news_content = addslashes($news_content);


    if($news_topic != "" && $news_description !=""){
      $sql= "UPDATE `news` SET `last_edit_date`='$last_edit_date',`topic`='$news_topic',
      `short_description`='$news_description',`content`='$news_content' WHERE news_id = $news_id";
      $result = mysqli_query( $GLOBALS['conn'] , $sql );
      // $last_id = mysqli_insert_id($GLOBALS['conn']);

      // $sql_img = "SELECT ni.news_image
      //             FROM news n INNER JOIN news_image ni on n.news_id =ni.news_id";
      // $result_img = mysqli_query($GLOBALS['conn'],$sql_img);
      // $data_img = mysqli_fetch_array($result_img);


      if ($result) {
        $news_id = explode(".", $news_id);
        $sql = "SELECT * FROM `news_image` WHERE news_id = '$news_id[0]'";
        $result_c = mysqli_query($conn, $sql);
        $count_img = mysqli_num_rows($result_c);

        $sql_pdf = "SELECT * FROM `news_pdf` WHERE news_id = '$news_id[0]' ";
        $result_pdf = mysqli_query($conn, $sql_pdf);
        $count_pdf = mysqli_num_rows($result_pdf);
        // echo "COUNT PDF : ".$count_pdf;
        $count = 1;
        $count_p = 1;
        $img_dir = "images/";

        $add_index_img = 1;
        $count_index = 1;






        // echo "NEws : ".$news_id[0];

        for($i=1;$i<6;$i++){
          $img_db = $img_name['news_image'];
          $sql_index = "SELECT * FROM `news_image` WHERE news_id = '$news_id[0]' AND img_index ='$i'";
          $result_index = mysqli_query($conn, $sql_index);
          // $count_asda = mysqli_num_rows($result_index);
          // echo $count_asda;
          // $count_img = mysqli_num_rows($result_index);
          $show_img_db = mysqli_fetch_array($result_index);
          $image = $show_img_db['news_image'];




          // $old_img = "img_".$news_id[0]."_".$i;
          if(!isset($_FILES['newsPicAddtopic'.$i]) || $_FILES['newsPicAddtopic'.$i]['error'] == UPLOAD_ERR_NO_FILE){



            if(isset($_FILES['newsPicAddtopic'.$i]) and $_FILES['newsPicAddtopic'.$i]['name'] =="" ){
              $sql_check = "SELECT * FROM `news_image` WHERE news_id = '$news_id[0]' AND img_index ='$count'";
              $result_check = mysqli_query($conn,$sql_check);
              $count_check = mysqli_num_rows($result_check);
              if(isset($_POST['delete_'.$i]) and $_POST['delete_'.$i] =='1'){
                echo "Test : ".$image;

                //delete
                if(file_exists($img_dir.$image)){
                  $flgDelete = unlink($img_dir.$image);
                  if($flgDelete){
                    echo $_POST['delete_'.$i];
                  }else{
                    echo $_POST['delete_'.$i];
                  }

                  $sql_del = "DELETE FROM `news_image` WHERE news_id = '$news_id[0]' AND img_index='$i'";
                  $result_del = mysqli_query($conn,$sql_del);

                }
              }else if($i>=$count ){
                if($i>$count and $count_check == 0){
                  $flgRename = rename($img_dir.$image,$img_dir."img_".$news_id[0]."_".$count.".jpg");
                  if($flgRename){
                    echo "images/img_".$news_id[0]."_".$count.".jpg : File Renamed";

                  }else{
                    echo "images/img_".$news_id[0]."_".$count.".jpg : File cannot Renamed";
                  }
                  $img_name_change = "img_".$news_id[0]."_".$count.".jpg";
                  $sql_change_name = "UPDATE `news_image` SET `news_image`='$img_name_change',`img_index`='$count' WHERE news_id = '$news_id[0]'
                  AND img_index ='$i'";
                  $result_change = mysqli_query($conn,$sql_change_name);
                }
                $count++;

              }
            }else{
              $count++;
            }

          }else {
            // echo "Image : ".$i." have file ";
            // echo "<br>";
            $file_type = $_FILES['newsPicAddtopic'.$i]['type'];

            $allowed = array("image/jpeg", "image/gif", "image/png");
            if(!in_array($file_type, $allowed)) {
              header("location: message.php?msg=not_image");

              exit();

            }
            $sql_check = "SELECT * FROM `news_image` WHERE news_id = '$news_id[0]' AND img_index ='$c'";
            $result_check = mysqli_query($conn,$sql_check);
            $count_check = mysqli_num_rows($result_check);






            // -----Upload PDF-----
            $ext = pathinfo(basename($_FILES['newsPicAddtopic'.$i]['name'] ),PATHINFO_EXTENSION);
            $check_ext = strtolower( $ext);
            // echo $check_ext;

            if(mysqli_num_rows($result_index) > 0){
              echo $new_image_name;
              $img_path = "images/";


              $img = $_FILES['newsPicAddtopic'.$i]['tmp_name'];
              $new_image_name = 'img_'.$news_id[0].'_'.$count;
              $dst = $img_path.$new_image_name ;

              if (($img_info = getimagesize($img)) === FALSE)
              die("Image not found or not an image");

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
              // unlink($img_path.$_FILES['newsPicAddtopic'.$i]['name'] );






              // $upload_path = $img_path.$new_image_name.'.'.$ext;
              // if(file_exists($upload_path)){
              //       unlink($upload_path);
              //
              //   }

              // $success = move_uploaded_file($_FILES['newsPicAddtopic'.$i]['tmp_name'] ,$upload_path);
              if($success == FALSE){
                echo "Cannot upload images";
                exit();
              }


              $news_image = $new_image_name.".jpg";

              // ---------------------------
              $sql2 = "UPDATE `news_image` SET `news_image`='$news_image',img_index ='$count' WHERE img_index = '$i' AND news_id = '$news_id[0]' ";
              $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );


              // $sql_result_update = "SELECT `news_image` FROM `news_image` WHERE news_image LIKE '$news_image%'";
              // $result_update = mysqli_query($GLOBALS['conn'] , $sql_result_update );
              // $count_row = mysqli_num_rows($result_update);



            }else {
              // echo "No img from db";

              $file_type = $_FILES['newsPicAddtopic'.$i]['type'];

              $allowed = array("image/jpeg", "image/gif", "image/png");
              if(!in_array($file_type, $allowed)) {
                header("location: message.php?msg=not_image");

                exit();

              }
              $sql_check_img = "SELECT * FROM `news_image` WHERE news_id = $news_id[0]";
              $result = mysqli_query($conn,$sql_check_img);
              $row = mysqli_num_rows($result);
              $add_index_img = $row+1;

              // $count_img++;
              $img_path = "images/";

              $img = $_FILES['newsPicAddtopic'.$i]['tmp_name'];
              $new_image_name = 'img_'.$news_id[0].'_'.$add_index_img;
              $dst = $img_path.$new_image_name ;

              if (($img_info = getimagesize($img)) === FALSE)
              die("Image not found or not an image");

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
              // unlink($img_path.$_FILES['newsPicAddtopic'.$i]['name'] );






              // $upload_path = $img_path.$new_image_name.'.'.$ext;
              // if(file_exists($upload_path)){
              //       unlink($upload_path);
              //
              //   }

              // $success = move_uploaded_file($_FILES['newsPicAddtopic'.$i]['tmp_name'] ,$upload_path);
              if($success == FALSE){
                echo "Cannot upload images";
                exit();
              }


              $news_image = $new_image_name.".jpg";


              $sql_add = "INSERT INTO news_image(news_id, news_image,img_index) VALUES ('$news_id[0]','$news_image','$add_index_img')";
              $result_add = mysqli_query( $GLOBALS['conn'],$sql_add);
              $add_index_img++;

            }

            // if($check_ext == "jpeg" or "jpg" or "png" or "gif"){

            // $new_image_name = 'img_'.$news_id[0].'_'.$i.'.'.$ext;





            // }

          }

        }
        for($j=1;$j<6;$j++){
          echo "================ ".$j."=======================================";
          $sql_index_pdf = "SELECT * FROM `news_pdf` WHERE news_id = '$news_id[0]' AND pdf_index ='$j'";
          $result_index_pdf = mysqli_query($conn, $sql_index_pdf);
          $pdf_dir = "pdf/";


          $show_pdf_db = mysqli_fetch_array($result_index_pdf);
          $pdf = $show_pdf_db['news_pdf'];



          // echo $count_pdf;
          // $old_pdf = "pdf_".$news_id[0]."_".$j;
          if(!isset($_FILES['newsPdf'.$j]) || $_FILES['newsPdf'.$j]['error'] == UPLOAD_ERR_NO_FILE){

            if(isset($_FILES['newsPdf'.$j]) and $_FILES['newsPdf'.$j]['name'] ==""){

              $sql_check = "SELECT * FROM `news_pdf` WHERE news_id ='$news_id[0]'AND pdf_index = '$count_p'";
              $result_check = mysqli_query($conn,$sql_check);
              $count_check = mysqli_num_rows($result_check);
              // echo "$count_check";
              // echo "before del pdf";
              if(isset($_POST['delete_pdf_'.$j]) and $_POST['delete_pdf_'.$j] == '1'){
                echo "j :".$j."<br>";
                echo "count :".$count_p."<br>";


                if(file_exists($pdf_dir.$pdf)){
                  echo "complete";
                  $flgDelete=unlink($pdf_dir.$pdf);
                  if($flgDelete){
                    echo "succ";
                  }else{
                    echo "fail";
                  }
                  $sql_del = "DELETE FROM `news_pdf` WHERE news_id = '$news_id[0]' AND pdf_index='$j'";
                  $result_del = mysqli_query($conn,$sql_del);

                }

              }else if($j>=$count_p and $pdf!=''){
                // echo "j :".$j."<br>";
                echo "countp :".$count_p."<br>";
                // echo "try to chnage name";
                if($j>$count_p and $count_check== 0 and $count_p!=1){
                  // echo "change step 1()";
                  $flgRename = rename($pdf_dir.$pdf,$pdf_dir."pdf_".$news_id[0]."_".$count_p.".pdf");
                }
                $pdf_name_change = "pdf_".$news_id[0]."_".$count_p.".pdf";
                echo $pdf_name_change."<br>";

                $sql_change_name = "UPDATE `news_pdf` SET `news_pdf`='$pdf_name_change',`pdf_index`='$count_p' WHERE news_id = '$news_id[0]'
                AND pdf_index ='$j'";
                $result_change = mysqli_query($conn,$sql_change_name);
                if($result_change){
                  echo "change name : ".$pdf_name_change;
                }
                echo "helooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo";
                $count_p++;

              }

            }else{



            }
            // echo "PDF : ".$j." no file ";
            // echo "<br>";
          }else {
            $file_type = $_FILES['newsPdf'.$j]['type'];

            $allowed = array("application/pdf");
            if(!in_array($file_type, $allowed)) {

              header("location: message.php?msg=not_pdf");

              exit();

            }

            // -----Upload PDF-----
            $ext = pathinfo(basename($_FILES['newsPdf'.$j]['name'] ),PATHINFO_EXTENSION);
            $check_ext = strtolower( $ext);
            if(mysqli_num_rows($result_index_pdf) > 0){


              $old_pdf_name = basename($_FILES['newsPdf'.$j]['name']);
              // echo $old_pdf_name;

              // echo $check_ext;

              // if($check_ext == "pdf"){
              $new_pdf_name = 'pdf_'.$news_id[0].'_'.$count_p.'.'.$ext;
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
              $sql3 = "UPDATE `news_pdf` SET `news_pdf`='$news_pdf',`pdf_name`='$old_pdf_name',`pdf_index` ='$count_p'
              WHERE news_id = '$news_id[0]' AND pdf_index = '$j'";
              $result3 = mysqli_query( $GLOBALS['conn'] , $sql3 );
              $count_p++;



            }else{
              echo "test insert";
              $file_type = $_FILES['newsPdf'.$j]['type'];

              $allowed = array("application/pdf");
              if(!in_array($file_type, $allowed)) {

                header("location: message.php?msg=not_pdf");

                exit();

              }

              // echo "PDF :".$j." count  : ".$count_pdf;
              $old_pdf_name = basename($_FILES['newsPdf'.$j]['name']);
              // echo $old_pdf_name;

              // echo $check_ext;

              if($check_ext == "pdf"){
                $new_pdf_name = 'pdf_'.$news_id[0].'_'.$count_p.'.'.$ext;
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


                $sql_add_pdf = "INSERT INTO news_pdf(news_id, news_pdf,pdf_name,pdf_index) VALUES ('$news_id[0]','$news_pdf','$old_pdf_name','$count_p')";
                $result_add = mysqli_query( $GLOBALS['conn'],$sql_add_pdf);
                $count_p++;

              }





            }


          }

        }

        header("location: message.php?msg=edit_news_succ&id=".$news_id[0]);
      }


    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    // -------------------------




  }



}



?>
