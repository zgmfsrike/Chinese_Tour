<?php
include "db_config.php";

      $target_dir = "images/";
      $changeBanner = array('changeBanner1','changeBanner2','changeBanner3','changeBanner4','changeBanner5');
      $banner = array('banner1','banner2','banner3','banner4','banner5');
      
      if (isset($_POST[$changeBanner[0]])) {
        $temp = $banner[0];
        $submit = $changeBanner[0];
        $m = 1;
      }elseif (isset($_POST[$changeBanner[1]])) {
        $temp = $banner[1];
        $submit = $changeBanner[1];
        $m = 2;
      }elseif (isset($_POST[$changeBanner[2]])) {
        $temp = $banner[2];
        $submit = $changeBanner[2];
        $m = 3;
      }elseif (isset($_POST[$changeBanner[3]])) {
        $temp = $banner[3];
        $submit = $changeBanner[3];
        $m = 4;
      }elseif (isset($_POST[$changeBanner[4]])) {
        $temp = $banner[4];
        $submit = $changeBanner[4];
        $m = 5;
      }
      $target_file = $target_dir . basename($_FILES["$temp"]["name"]);
      $filename = $_FILES["$temp"]["name"];
      $filetemp = $_FILES["$temp"]["tmp_name"];
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST[$submit])) {
        $check = getimagesize($_FILES["$temp"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }

        // Check file size
        if ($_FILES["$temp"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
        } else {
          $changeFilename = explode(".",$filename);
          $newname="home$m.".$changeFilename['1'];
          move_uploaded_file($filetemp,'images/'.$newname);
          echo "Got it! The file has been uploaded.";
        }



?>
