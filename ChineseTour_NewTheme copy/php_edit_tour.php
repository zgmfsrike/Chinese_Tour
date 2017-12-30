
<?php
include "db_config.php";
error_reporting(E_ALL | E_STRICT);

//if(isset($_SESSION['login_id'])){

    if(isset($_POST['submit']) and isset($_POST['id'])){

        $id = $_POST['id'];

        // ===== Insert to "tour" table =====
        $tour_description   = $_POST["tour_description"];
//        $tour_image         = $_POST["image[]"]; // **
        $tour_highlight     = $_POST["highlight"];
//        $tour_schedule      = $_POST["schedule"]; // **
        $tour_region        = $_POST["region"];
        $tour_province      = $_POST["province"];
        $tour_price         = $_POST["price"];
//        $tour_type          = $_POST["type"]; // **
//        $tour_vehicel       = $_POST["vehicel"]; // **
//        $tour_accommodation = $_POST["accommodation"]; // **
        $tour_max           = $_POST["max"];
//        $tour_round_start   = $_POST["start_date[]"]; // ***
//        $tour_round_end     = $_POST["end_date[]"]; // ***




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


        $sql = "SELECT * FROM `tour_image` WHERE tour_id = $id";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        // ====== upload images + insert "tour_image" table =====
        for($i=1;$i<=10;$i++){
          $sql = "SELECT * FROM `tour_image` WHERE tour_id = $id AND img_index = $i";
          $result = mysqli_query($conn, $sql);

          if(!isset($_FILES['image_'.$i]) || $_FILES['image_'.$i]['error'] == UPLOAD_ERR_NO_FILE){
            // echo "Image : ".$i." no file ";
            // echo "<br>";
          }else {
            // echo "Image : ".$i." have file ";
            // echo "<br>";

              // -----Upload images-----
              $ext = pathinfo(basename($_FILES['image_'.$i]['name'] ),PATHINFO_EXTENSION);
              $check_ext = strtolower( $ext);
              echo $check_ext;

              if($check_ext == "jpeg" or "jpg" or "png" or "gif"){

                if(mysqli_num_rows($result) > 0){
                  $row = mysqli_fetch_array($result);
                  $img_name = $row['img_name'];
                  $flgDelete = unlink("images/tours/".$img_name);
                  // if($flgDelete){
                  //   echo "File Deleted : " . $img_name;
                  // }else{
                  //   echo "File can not delete : " . $img_name;
                  // }


                  $new_image_name = $id.'_'.$i.".".$ext;
                  $img_path = "images/tours/";
                  $upload_path = $img_path.$new_image_name;
                  $success = move_uploaded_file($_FILES['image_'.$i]['tmp_name'] ,$upload_path);
                  if($success == FALSE){
                    echo "Cannot upload images";
                    exit();
                  }
                  $image_name = $new_image_name;

                  // ----------- insert ----------
                  $sql2 = "UPDATE `tour_image` SET ";
                  $sql2 .= "`img_name`='$image_name' ";
                  $sql2 .= "WHERE tour_id = '$id' AND img_index = '$i';";
                  $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );
                }else{
                  $count++;
                  $new_image_name = $id.'_'.$count.".".$ext;
                  $img_path = "images/tours/";
                  $upload_path = $img_path.$new_image_name;
                  $success = move_uploaded_file($_FILES['image_'.$i]['tmp_name'] ,$upload_path);
                  if($success == FALSE){
                    echo "Cannot upload images";
                    exit();
                  }
                  $image_name = $new_image_name;

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
        header("location: message.php?msg=edit_tour_succ");
    }else{
      header("location: message.php");
    }
?>
