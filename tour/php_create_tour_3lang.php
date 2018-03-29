<?php
include "db_config.php";
// error_reporting(E_ALL | E_STRICT);
//if(isset($_SESSION['login_id'])){

if(isset($_POST['submit'])){

    // ===== Insert to "tour" table =====
    $tour_description_en   = addslashes($_POST["tour_description_en"]);
    $tour_highlight_en     = addslashes($_POST["highlight_en"]);
    $tour_region_en        = addslashes($_POST["region_en"]);
    $tour_province_en      = addslashes($_POST["province_en"]);
    $tour_description_ch   = addslashes($_POST["tour_description_ch"]);
    $tour_highlight_ch     = addslashes($_POST["highlight_ch"]);
    $tour_region_ch        = addslashes($_POST["region_ch"]);
    $tour_province_ch      = addslashes($_POST["province_ch"]);
    $tour_description_th   = addslashes($_POST["tour_description_th"]);
    $tour_highlight_th     = addslashes($_POST["highlight_th"]);
    $tour_region_th        = addslashes($_POST["region_th"]);
    $tour_province_th      = addslashes($_POST["province_th"]);
    $tour_price         = $_POST["price"];
    $tour_max           = $_POST["max"];

    // $sql.= "tour_description_ch, highlight_ch, region_ch, province_ch,";
    // $sql.= "tour_description_th, highlight_th, region_th, province_th,";

    // $sql.="'$tour_description_ch','$tour_highlight_ch','$tour_region_ch','$tour_province_ch',";
    // $sql.="'$tour_description_th','$tour_highlight_th','$tour_region_th','$tour_province_th',";

    $sql= "INSERT INTO tour_en (tour_description, highlight, region, province,";
    $sql.=" price, max_customer)";
    $sql.="VALUES ('$tour_description_en','$tour_highlight_en','$tour_region_en','$tour_province_en',";
    $sql.="'$tour_price','$tour_max')";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );

    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }

    $sql= "INSERT INTO tour_ch (tour_description, highlight, region, province,";
    $sql.=" price, max_customer)";
    $sql.="VALUES ('$tour_description_ch','$tour_highlight_ch','$tour_region_ch','$tour_province_ch',";
    $sql.="'$tour_price','$tour_max')";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );

    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }

    $sql= "INSERT INTO tour_th (tour_description, highlight, region, province,";
    $sql.=" price, max_customer)";
    $sql.="VALUES ('$tour_description_th','$tour_highlight_th','$tour_region_th','$tour_province_th',";
    $sql.="'$tour_price','$tour_max')";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );

    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }

    $last_id = mysqli_insert_id($GLOBALS['conn']);
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
            $new_pdf_name = $last_id.".".$ext;
            $pdf_path = "pdf/tours_schedule/";
            $upload_path_pdf = $pdf_path.$new_pdf_name;
            $success = move_uploaded_file($_FILES['schedule']['tmp_name'] ,$upload_path_pdf);
            if($success == FALSE){
                echo "Cannot upload pdf";
                exit();
            }
            $schedule_pdf = $new_pdf_name;

            // ---------------------------
            $sql3 = "INSERT INTO tour_schedule(tour_id, file_name) VALUES ('$last_id','$schedule_pdf')";
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

        $img[$count] = $new_image_name.".jpg";
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
            echo "<br><br>date : " . $start;
            $end = $_POST['end_date'][$i];
            $sql = "INSERT INTO tour_round(tour_id, start_date_time,end_date_time) VALUES ('$last_id','$start','$end')";
            $result = mysqli_query( $GLOBALS['conn'] , $sql );
        }
    }
    header("location: message.php?msg=create_tour_succ&id=$last_id");
}else{
    header("location: message.php");
}
?>
