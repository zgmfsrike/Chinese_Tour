<?php

include "db_config.php";
include "module/hashing.php";
include 'module/session.php';


if(isset($_SESSION['login_id'])){
  $member_id = $_SESSION['login_id'];

  if(isset($_POST['save'])){
    $ref_code = $_POST['ref_code'];
    // echo $ref_code;

    // echo "hello stage 1 <br />";
    if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE){
      echo "Error Upload File";
      header("location: message.php?msg=error");
    }else{
      $ext = pathinfo(basename($_FILES['image']['name'] ),PATHINFO_EXTENSION);
      $file_type = $_FILES['image']['type'];
      $allowed = array("image/jpeg","image/png");
      if(!in_array($file_type, $allowed)) {
        header("location: message.php?msg=not_image");
        exit();
      }
      $img_path = "images/payments/";
      $img = $_FILES['image']['tmp_name'];
      $dst =$img_path.$ref_code;

      if (($img_info = getimagesize($img)) === FALSE){
        //     // header("location: message.php?msg=not_image");
        //     // exit();
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
      $image_name = $ref_code.".jpg";

      $sql = "UPDATE `tour_booking_history` SET `uploaded_file`='$image_name', `status` = 2 WHERE reference_code = '$ref_code'";
      $result = mysqli_query($conn, $sql);
      if($result){
        header("location: message.php?msg=uploadSucc");
      }


    }
  }
}

?>
