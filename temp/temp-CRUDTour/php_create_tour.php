
<?php
include "db_config.php";
error_reporting(E_ALL | E_STRICT);

//if(isset($_SESSION['login_id'])){
    
    if($_POST['submit']){
        
        // ===== Insert to "tour" table =====
        $tour_name          = $_POST["tour_name"];
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
        
        $sql= "INSERT INTO tour (name, highlight, region, province, price, max_customer) VALUES ('$tour_name','$tour_highlight','$tour_region','$tour_province','$tour_price','$tour_max')";
        $result = mysqli_query( $GLOBALS['conn'] , $sql );
        $last_id = mysqli_insert_id($GLOBALS['conn']);
        
        if (!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            return false;
        }
        
//        // ====== upload images + insert "tour_schedule" table =====
//        for($i=0;$i<count($_FILES[image]);$i++){
//          if(!isset($_FILES['newsPicAddtopic'.$i]) || $_FILES['newsPicAddtopic'.$i]['error'] == UPLOAD_ERR_NO_FILE){
//            // echo "Image : ".$i." no file ";
//            // echo "<br>";
//          }else {
//            // echo "Image : ".$i." have file ";
//            // echo "<br>";
//
//              // -----Upload images-----
//              $ext = pathinfo(basename($_FILES['newsPicAddtopic'.$i]['name'] ),PATHINFO_EXTENSION);
//              $check_ext = strtolower( $ext);
//              echo $check_ext;
//
//                $new_image_name = 'img_'.uniqid().".".$ext;
//                $img_path = "images/";
//                $upload_path = $img_path.$new_image_name;
//                $success = move_uploaded_file($_FILES['newsPicAddtopic'.$i]['tmp_name'] ,$upload_path);
//                if($success == FALSE){
//                  echo "Cannot upload images";
//                  exit();
//                }
//                $news_image = $new_image_name;
//
//                // ----------- insert ----------
//                $sql2 = "INSERT INTO news_image(news_id, news_image) VALUES ('$last_id','$news_image')";
//                $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );
//          }
//
//        }
        
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
                $new_pdf_name = 'pdf_'.uniqid().".".$ext;
                $pdf_path = "pdf/";
                $upload_path_pdf = $pdf_path.$new_pdf_name;
                $success = move_uploaded_file($_FILES['schedule']['tmp_name'] ,$upload_path_pdf);
                if($success == FALSE){
                  echo "Cannot upload pdf";
                  exit();
                }
                $path = $upload_path_pdf;

                // ---------------------------
                $sql3 = "INSERT INTO tour_schedule(tour_id, path) VALUES ('$last_id','$path')";
                $result3 = mysqli_query( $GLOBALS['conn'] , $sql3 );


              }else{
                echo "not pdf";
              }

          }
        
        // ======= check box : type ========
            if(!empty($_POST['type'])) {
                // Counting number of checked checkboxes.
                $checked_count = count($_POST['type']);
                echo "You have selected tour type ".$checked_count." option(s): <br/>";
                // Loop to store and display values of individual checked checkbox.
                foreach($_POST['type'] as $selected) {
                    $sql = "INSERT INTO tour_tour_type(tour_id, tour_type_id) VALUES ('$last_id','$selected')";
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
                    $sql = "INSERT INTO tour_vehicle_type(tour_id, vehicle_type_id) VALUES ('$last_id','$selected')";
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
                    $sql = "INSERT INTO tour_accommodation(tour_id, accommodation_id) VALUES ('$last_id','$selected')";
                $result = mysqli_query( $GLOBALS['conn'] , $sql );
                }
            }else{
                echo "<b>Please Select Atleast One Option.</b>";
            }
    
        // ======= Tour round ========
        if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
            for($i = 0; $i < count($_POST['start_date']);$i++ ){
                $start = $_POST['start_date'][$i];
                $end = $_POST['end_date'][$i];
                $sql = "INSERT INTO tour_round(tour_id, start_date_time,end_date_time) VALUES ('$last_id','$start','$end')";
                $result = mysqli_query( $GLOBALS['conn'] , $sql );
                
            }
            
        }
        
    }
?>