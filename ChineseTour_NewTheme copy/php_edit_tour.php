
<?php
include "db_config.php";
error_reporting(E_ALL | E_STRICT);

//if(isset($_SESSION['login_id'])){

    if(isset($_POST['submit']) and isset($_POST['id'])){

        $id = $_POST['id'];

        // ===== Insert to "tour" table =====
        $tour_description   = $_POST["tour_description"];
        $tour_highlight     = $_POST["highlight"];
        $tour_region        = $_POST["region"];
        $tour_province      = $_POST["province"];
        $tour_price         = $_POST["price"];
        $tour_max           = $_POST["max"];

        $sql = "UPDATE `tour` SET ";
        $sql .= "`tour_description`='$tour_description' ";
        $sql .= ",`highlight`='$tour_highlight' ";
        $sql .= ",`region`='$tour_region' ";
        $sql .= ",`province`='$tour_province' ";
        $sql .= ",`price`='$tour_price' ";
        $sql .= ",`max_customer`='$tour_max' ";

        $sql .= "WHERE `tour_id` = '$id';";
        $result = mysqli_query( $GLOBALS['conn'] , $sql );
        if (!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            return false;
        }

        // ------------
        
        // ====== upload images + insert "tour_image" table =====
        
        $count = 0;
        $img[1] = '';
        $img[2] = '';
        $img[3] = '';
        $img[4] = '';
        $img[5] = '';
        $img[6] = '';
        $img[7] = '';
        $img[8] = '';
        $img[9] = '';
        $img[10] = '';
        
        $sql2 = "SELECT * FROM `tour_image` WHERE `tour_id` = ".$id;
        $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );
        $row2 = mysqli_fetch_array($result2);
        
        $img_dir = "images/tours/";
        
        for($i=1;$i<=10;$i++){
            
            $image = $row2['img'.$i];
            
            if(!isset($_FILES['image_'.$i]) || $_FILES['image_'.$i]['error'] == UPLOAD_ERR_NO_FILE){
                
                if(isset($_POST['delete_'.$i]) and $_POST['delete_'.$i] == '1'){
                    
                    if(file_exists($img_dir.$image)){
                        $flgDelete = unlink($img_dir.$image);
                        if($flgDelete){
                            echo "File Deleted : " . $id;
                        }else{
                            echo "File can not delete : " . $id;
                        }
                    }
    
                }else if($i > $count){
                    
                    $flgRename = rename($img_dir.$image, $img_dir.$id."_".$count.".jpg");
                    if($flgRename){
                        echo "images/tours/".$id."_".$i.".jpg : File Renamed";
                    }else{
                        echo "images/tours/".$id."_".$i.".jpg : File can not rename";
                    }
                    
                    $img[$count] = $id."_".$count.".jpg";
                    
                    $count += 1;
                    
                }
                
            // echo "Image : ".$i." no file ";
            // echo "<br>";
            }else {
                    if($image != ""){
                        if(file_exists($img_dir.$image)){
                            $flgDelete = unlink($img_dir.$image);
                        if($flgDelete){
                            echo "File Deleted : " . $id;
                        }else{
                            echo "File can not delete : " . $id;
                        }
                    }
                        
                        // ---- upload pic ----
                        $ext = pathinfo(basename($_FILES['image_'.$i]['name'] ),PATHINFO_EXTENSION);
              $check_ext = strtolower( $ext);
              echo "image : ". $i ." : ". $check_ext . "<br>";

              if($check_ext == "jpeg" or "jpg" or "png" or "gif"){
                // $new_image_name = $last_id.'_'.$count.".".$ext;
                $img_path = "images/tours/";


                $img_name = $_FILES['image_'.$i]['tmp_name'];
                $new_image_name = $last_id.'_'.$count;
                $dst = $img_path.$new_image_name ;

                if (($img_info = getimagesize($img_name)) === FALSE){
                    die("Image not found or not an image");
                }

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
                  unlink($img_path.$_FILES['image_'.$i]['name'] );

                // $upload_path = $img_path.$new_image_name;
                // $success = move_uploaded_file($_FILES['image_'.$i]['tmp_name'] ,$upload_path);
                if($success == FALSE){
                  echo "Cannot upload images";
                  exit();
                }
                  
                        // --------------------
                        $img[$count] = $new_image_name.".jpg";
                        
                        $count += 1;
                    }else{
                        // ---- upload pic ----
                        $ext = pathinfo(basename($_FILES['image_'.$i]['name'] ),PATHINFO_EXTENSION);
              $check_ext = strtolower( $ext);
              echo "image : ". $i ." : ". $check_ext . "<br>";

              if($check_ext == "jpeg" or "jpg" or "png" or "gif"){
                // $new_image_name = $last_id.'_'.$count.".".$ext;
                $img_path = "images/tours/";


                $img_name = $_FILES['image_'.$i]['tmp_name'];
                $new_image_name = $last_id.'_'.$count;
                $dst = $img_path.$new_image_name ;

                if (($img_info = getimagesize($img_name)) === FALSE){
                    die("Image not found or not an image");
                }

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
                  unlink($img_path.$_FILES['image_'.$i]['name'] );

                // $upload_path = $img_path.$new_image_name;
                // $success = move_uploaded_file($_FILES['image_'.$i]['tmp_name'] ,$upload_path);
                if($success == FALSE){
                  echo "Cannot upload images";
                  exit();
                }
                  
                        // --------------------
                        $img[$count] = $new_image_name.".jpg";
                        
                        $count += 1;
                    }
                    
                  }
                  // Free result set
                  mysqli_free_result($result);
              }
            }
            
        }
        
        for($i=1;$i<=10;$i++){
          if(!isset($_FILES['image_'.$i]) || $_FILES['image_'.$i]['error'] == UPLOAD_ERR_NO_FILE){
            // echo "Image : ".$i." no file ";
            // echo "<br>";
          }else {
            $count++;
            // echo "Image : ".$i." have file ";
            // echo "<br>";
              // -----Upload images-----
              $ext = pathinfo(basename($_FILES['image_'.$i]['name'] ),PATHINFO_EXTENSION);
              $check_ext = strtolower( $ext);
              echo "image : ". $i ." : ". $check_ext . "<br>";

              if($check_ext == "jpeg" or "jpg" or "png" or "gif"){
                // $new_image_name = $last_id.'_'.$count.".".$ext;
                $img_path = "images/tours/";


                $img_name = $_FILES['image_'.$i]['tmp_name'];
                $new_image_name = $last_id.'_'.$count;
                $dst = $img_path.$new_image_name ;

                if (($img_info = getimagesize($img_name)) === FALSE){
                    die("Image not found or not an image");
                }

                // $width = $img_info[0];
                // $height = $img_info[1];
                $width=960;
                $height=720;
                switch ($img_info[2]) {
                  case IMAGETYPE_GIF  : $src = imagecreatefromgif($img_name);  break;
                  case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img_name); break;
                  case IMAGETYPE_PNG  : $src = imagecreatefrompng($img_name);  break;
                  default : die("Unknown filetype");
                }
                $photoX = ImagesX($src);
                $photoY = ImagesY($src);

                $tmp = imagecreatetruecolor($width, $height);
                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $photoX, $photoY);
                $success= imagejpeg($tmp, $dst.".jpg");

                // $upload_path = $img_path.$new_image_name;
                // $success = move_uploaded_file($_FILES['image_'.$i]['tmp_name'] ,$upload_path);
                if($success == FALSE){
                  echo "Cannot upload images";
                  exit();
                }
                  $img[$count] = $new_image_name.".jpg";
          }

        }
      }
        // insert into image table
        
    $sql2 = "INSERT INTO tour_image(tour_id, img1, img2,img3,img4,img5,img6,img7,img8,img9,img10) VALUES ('$last_id','$img[1]','$img[2]','$img[3]','$img[4]','$img[5]','$img[6]','$img[7]','$img[8]','$img[9]','$img[10]')";
    $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );
        
        // ------------
        
        
        // ====== upload images + insert "tour_image" table =====
        $new_index = 1;
        
        $sql = "SELECT * FROM `tour_image` WHERE tour_id = $id";
        $result = mysqli_query($conn, $sql);
        
        
        for($i=1;$i<=10;$i++){
          $sql = "SELECT * FROM `tour_image` WHERE tour_id = $id AND img_index = $i";
          $result = mysqli_query($conn, $sql);
            if(isset($_POST['delete_'.$i])){
                if($_POST['delete_'.$i] == 1 && !isset($_FILES['image_'.$i])){
                }
                
            }

          if(!isset($_FILES['image_'.$i]) || $_FILES['image_'.$i]['error'] == UPLOAD_ERR_NO_FILE){
            // echo "Image : ".$i." no file ";
            // echo "<br>";
          }else {
            // echo "Image : ".$i." have file ";
            // echo "<br>";

              // -----Upload images-----
              $ext = pathinfo(basename($_FILES['image_'.$i]['name'] ),PATHINFO_EXTENSION);
              $check_ext = strtolower( $ext);
//              echo $check_ext;

              if($check_ext == "jpeg" or "jpg" or "png" or "gif"){

                if(mysqli_num_rows($result) > 0){
                  $row = mysqli_fetch_array($result);
                  $img_name = $row['img_name'];
                  // $flgDelete = unlink("images/tours/".$img_name);
                  // if($flgDelete){
                  //   echo "File Deleted : " . $img_name;
                  // }else{
                  //   echo "File can not delete : " . $img_name;
                  // }


                  // $new_image_name = $id.'_'.$i.".".$ext;
                  $img_path = "images/tours/";


                  $img = $_FILES['image_'.$i]['tmp_name'];
                  $new_image_name = $id.'_'.$i;
                  $dst = $img_path.$new_image_name ;

                  if (($img_info = getimagesize($img)) === FALSE)
                    die("Image not found or not an image");

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
                    unlink($img_path.$_FILES['image_'.$i]['name'] );



                  // $upload_path = $img_path.$new_image_name;
                  // $success = move_uploaded_file($_FILES['image_'.$i]['tmp_name'] ,$upload_path);
                  if($success == FALSE){
                    echo "Cannot upload images";
                    exit();
                  }
                  $image_name = $new_image_name.".jpg";

                  // ----------- insert ----------
                  $sql2 = "UPDATE `tour_image` SET ";
                  $sql2 .= "`img_name`='$image_name' ";
                  $sql2 .= "WHERE tour_id = '$id' AND img_index = '$i';";
                  $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );
                }else{
                  $count++;
                  // $new_image_name = $id.'_'.$count.".".$ext;
                  $img_path = "images/tours/";

                  $img = $_FILES['image_'.$i]['tmp_name'];
                  $new_image_name = $id.'_'.$count;
                  $dst = $img_path.$new_image_name ;

                  if (($img_info = getimagesize($img)) === FALSE)
                    die("Image not found or not an image");

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
                    unlink($img_path.$_FILES['image_'.$i]['name'] );



                  // $upload_path = $img_path.$new_image_name;
                  // $success = move_uploaded_file($_FILES['image_'.$i]['tmp_name'] ,$upload_path);
                  if($success == FALSE){
                    echo "Cannot upload images";
                    exit();
                  }
                  $image_name = $new_image_name.".jpg";



                  // ----------- insert ----------
                  $sql2 = "INSERT INTO tour_image(tour_id, img_index, img_name) VALUES ('$id','$count','$image_name')";
                  $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );
                }

          }

        }
      }

        // upload schedule + insert "tour_schedule" table
        if(!isset($_FILES['schedule']) || $_FILES['schedule']['error'] == UPLOAD_ERR_NO_FILE){
            // echo "Image : ".$i." no file ";
            // echo "<br>";
          }else {
            // echo "Image : ".$i." have file ";
            // echo "<br>";
              // -----Upload PDF-----
              $ext = pathinfo(basename($_FILES['schedule']['name'] ),PATHINFO_EXTENSION);
              $check_ext = strtolower( $ext);
              echo $check_ext;
            

              if($check_ext == "pdf"){
                $new_pdf_name = $id.".".$ext;
                $pdf_path = "pdf/tours_schedule/";
                $upload_path_pdf = $pdf_path.$new_pdf_name;
                  if(file_exists("pdf/tours_schedule/".$id.".pdf")){
                      $flgDelete = unlink("pdf/tours_schedule/".$id.".pdf");
                      if($flgDelete){
                          echo "File Deleted : " . $id;
                      }else{
                          echo "File can not delete : " . $id;
                      }
                  }
                $success = move_uploaded_file($_FILES['schedule']['tmp_name'] ,$upload_path_pdf);
                if($success == FALSE){
                  echo "Cannot upload pdf";
                  exit();
                }
              }else{
                echo "not pdf";
              }

          }

          $sql = "DELETE FROM tour_accommodation WHERE tour_id = $id";
          mysqli_query($conn, $sql);

          $sql = "DELETE FROM tour_tour_type WHERE tour_id = $id";
          mysqli_query($conn, $sql);

          $sql = "DELETE FROM tour_vehicle_type WHERE tour_id = $id";
          mysqli_query($conn, $sql);
        // ======= check box : type ========
            if(!empty($_POST['type'])) {
                // Counting number of checked checkboxes.
                $checked_count = count($_POST['type']);
                echo "You have selected tour type ".$checked_count." option(s): <br/>";
                // Loop to store and display values of individual checked checkbox.
                foreach($_POST['type'] as $selected) {
                    $sql = "INSERT INTO tour_tour_type(tour_id, tour_type_id) VALUES ('$id','$selected')";
                $result = mysqli_query( $GLOBALS['conn'] , $sql );
                }
            }else{
                echo "<b>Please Select Atleast One Option.</b>";
            }

        // ======= check box : vehicel ========
            if(!empty($_POST['vehicel'])) {
                // Counting number of checked checkboxes.
                $checked_count = count($_POST['vehicel']);
                echo "You have selected vehicel ".$checked_count." option(s): <br/>";
                // Loop to store and display values of individual checked checkbox.
                foreach($_POST['vehicel'] as $selected) {
                    $sql = "INSERT INTO tour_vehicle_type(tour_id, vehicle_type_id) VALUES ('$id','$selected')";
                $result = mysqli_query( $GLOBALS['conn'] , $sql );
                }
            }else{
                echo "<b>Please Select Atleast One Option.</b>";
            }

        // ======= check box : accommodation  ========
            if(!empty($_POST['accommodation'])) {
                // Counting number of checked checkboxes.
                $checked_count = count($_POST['accommodation']);
                echo "You have selected accommodation ".$checked_count." option(s): <br/>";
                // Loop to store and display values of individual checked checkbox.
                foreach($_POST['accommodation'] as $selected) {
                    $sql = "INSERT INTO tour_accommodation(tour_id, accommodation_id) VALUES ('$id','$selected')";
                $result = mysqli_query( $GLOBALS['conn'] , $sql );
                }
            }else{
                echo "<b>Please Select Atleast One Option.</b>";
            }

        // ======= Tour round ========
        $sql = "DELETE FROM tour_round WHERE tour_id = $id";
        mysqli_query($conn, $sql);

        if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
            for($i = 0; $i < count($_POST['start_date']);$i++ ){
                $start = $_POST['start_date'][$i];
                $end = $_POST['end_date'][$i];
                $sql = "INSERT INTO tour_round(tour_id, start_date_time,end_date_time) VALUES ('$id','$start','$end')";
                $result = mysqli_query( $GLOBALS['conn'] , $sql );
            }
        }
        header("location: message.php?msg=edit_tour_succ&id=$id");
    }else{
      header("location: message.php");
    }
?>
