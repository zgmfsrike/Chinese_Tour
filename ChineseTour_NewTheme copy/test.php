<?php
//$flgRename = rename("images/tours/5_1.jpg", "images/tours/5_4.jpg");
//if($flgRename)
//{
//echo "File Rename";
//}
//else
//{
//echo "File can not rename";
//}

$a[0] = 'test';
echo $a[0];

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

    $id = $_POST['id'];

    $sql2 = "SELECT * FROM `tour_image` WHERE `tour_id` = ".$id;
    $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );
    $row2 = mysqli_fetch_array($result2);

<<<<<<< HEAD
    for($i=1;$i<=10;$i++){
        pl('===== '.$i.' =====');
        $image = $row2['img'.$i];

        if(!isset($_FILES['image_'.$i]) || $_FILES['image_'.$i]['error'] == UPLOAD_ERR_NO_FILE){

            pl('NOFILE or ERROR ?');

            if(isset($_FILES['image_'.$i]) and $_FILES['image_'.$i]['name'] == ""){

                pl('No input file');
                pl('Delete status : '.isset($_POST['delete_'.$i]).'  ||  '.$_POST['delete_'.$i]);

                if(isset($_POST['delete_'.$i]) and $_POST['delete_'.$i] == '1'){

                    // DELETE
                    pl('DELETE image'.$i);
                }else if($i >= $count and $image != ''){
                    if($i > $count){
                        // RENAME
                        pl('RENAME '.$id.'_'.$i.' to '.$id.'_'.$count);
                    }
                    $img[$count] = $id.'_'.$count.'.jpg';
                    $count++;
=======
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
>>>>>>> CRUDTour2
                }
                pl('$count = '.$count);
            }else{
                pl('isset = FLASE');
            }

        }else{
            pl('File uploaded');
            if($image != ""){
                pl('DELETE image');
            }
            pl('UPLOADE image');
            $img[$count] = $id.'_'.$count.'.jpg';
            $count++;
            pl('$count = '.$count);
        }
    }

    $sum ='';
    for($i=1;$i<=10;$i++){
        $sum .= '['.$img[$i].']';
    }
    pl('=============================');
    pl('*SUMMARY*');
    pl($sum);

}

function pl($string){
    echo $string.'<br>';
}
//
//check();
//exit();
?>
