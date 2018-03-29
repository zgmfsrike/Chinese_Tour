
<?php
include "db_config.php";
include "module/session.php";
error_reporting(E_ALL | E_STRICT);

if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}

function check(){
    $count = 1;
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
    $id = $_POST['id'];
    $sql2 = "SELECT * FROM `tour_image` WHERE `tour_id` = ".$id;
    $result2 = mysqli_query( $GLOBALS['conn'] , $sql2 );
    $row2 = mysqli_fetch_array($result2);
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
                }
                pl('$count = '.$count);
            }else{
                if($image != ''){
                    $img[$count] = $id.'_'.$count.'.jpg';
                    $count++;
                    pl('isset = FLASE');
                }
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

if(isset($_POST['submit']) and isset($_POST['id'])){

    $id = $_POST['id'];

    // ===== Insert to "tour" table =====
    $tour_description_en   = addslashes($_POST["tour_description_en"]);
    $tour_highlight_en     = addslashes($_POST["highlight_en"]);
    $tour_region_en        = addslashes($_POST["region_en"]);
    $tour_province_en      = addslashes($_POST["province_en"]);
    $tour_price_en         = $_POST["price_en"];

    $tour_description_ch   = addslashes($_POST["tour_description_ch"]);
    $tour_highlight_ch     = addslashes($_POST["highlight_ch"]);
    $tour_region_ch        = addslashes($_POST["region_ch"]);
    $tour_province_ch      = addslashes($_POST["province_ch"]);
    $tour_price_ch         = $_POST["price_ch"];

    $tour_description_th   = addslashes($_POST["tour_description_th"]);
    $tour_highlight_th     = addslashes($_POST["highlight_th"]);
    $tour_region_th        = addslashes($_POST["region_th"]);
    $tour_province_th      = addslashes($_POST["province_th"]);
    $tour_price_th         = $_POST["price_th"];

    $tour_max              = $_POST["max"];

    $sql = "UPDATE `tour_en` SET ";
    $sql .= "`tour_description`='$tour_description_en' ";
    $sql .= ",`highlight`='$tour_highlight_en' ";
    $sql .= ",`region`='$tour_region_en' ";
    $sql .= ",`province`='$tour_province_en' ";
    $sql .= ",`price`='$tour_price_en' ";
    $sql .= ",`max_customer`='$tour_max' ";

    $sql .= "WHERE `tour_id` = '$id';";

    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("location: message.php?msg=error");
    }

    $sql = "UPDATE `tour_ch` SET ";
    $sql .= "`tour_description`='$tour_description_ch' ";
    $sql .= ",`highlight`='$tour_highlight_ch' ";
    $sql .= ",`region`='$tour_region_ch' ";
    $sql .= ",`province`='$tour_province_ch' ";
    $sql .= ",`price`='$tour_price_ch' ";
    $sql .= ",`max_customer`='$tour_max' ";

    $sql .= "WHERE `tour_id` = '$id';";

    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("location: message.php?msg=error");
    }

    $sql = "UPDATE `tour_th` SET ";
    $sql .= "`tour_description`='$tour_description_th' ";
    $sql .= ",`highlight`='$tour_highlight_th' ";
    $sql .= ",`region`='$tour_region_th' ";
    $sql .= ",`province`='$tour_province_th' ";
    $sql .= ",`price`='$tour_price_th' ";
    $sql .= ",`max_customer`='$tour_max' ";

    $sql .= "WHERE `tour_id` = '$id';";

    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("location: message.php?msg=error");
    }

    // ------------

    // ====== upload images + insert "tour_image" table =====

    $count = 1;
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

            if(isset($_FILES['image_'.$i]) and $_FILES['image_'.$i]['name'] == ""){

                if(isset($_POST['delete_'.$i]) and $_POST['delete_'.$i] == '1'){

                    // DELETE
                    if(file_exists($img_dir.$image)){
                        $flgDelete = unlink($img_dir.$image);
                        if($flgDelete){
                            echo $_POST['delete_'.$i];
                        }else{
                            echo $_POST['delete_'.$i];
                        }
                    }
                }else if($i >= $count and $image != ''){

                    if($i > $count){
                        // RENAME
                        $flgRename = rename($img_dir.$image, $img_dir.$id."_".$count.".jpg");
                        if($flgRename){
                            echo "images/tours/".$id."_".$i.".jpg : File Renamed";
                        }else{
                            echo "images/tours/".$id."_".$i.".jpg : File can not rename";
                        }
                    }
                    $img[$count] = $id.'_'.$count.'.jpg';
                    $count++;

                }

            }else {
                if($image != ''){
                    $img[$count] = $id.'_'.$count.'.jpg';
                    $count++;
                    pl('isset = FLASE');
                }
            }

        }else {
            // File uploaded
            if($image != ""){
                if(file_exists($img_dir.$image)){
                    $flgDelete = unlink($img_dir.$image);
                    if($flgDelete){
                        echo "File Deleted : " . $id;
                    }else{
                        echo "File can not delete : " . $id;
                    }
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
                $new_image_name = $id.'_'.$count;
                $dst = $img_path.$new_image_name ;
                if (($img_info = getimagesize($img_name)) === FALSE){
                    header("location: message.php?msg=edit_tour_fail");
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

                // --------------------
                echo "TEST : ".$i." ".$count." 3";
                $img[$count] = $new_image_name.".jpg";

                $count += 1;
            }

        }
    }


    // insert into image table

    $sql3 = "UPDATE tour_image SET `img1` = '$img[1]', `img2` = '$img[2]',`img3` = '$img[3]',`img4` = '$img[4]',`img5` = '$img[5]',`img6` = '$img[6]',`img7` = '$img[7]',`img8` = '$img[8]',`img9` = '$img[9]',`img10` = '$img[10]' WHERE tour_id = $id";

    // ดูค่า
    //    $sum ='';
    //    for($i=1;$i<=10;$i++){
    //        $sum .= '['.$img[$i].']';
    //    }
    //    pl('=============================');
    //    pl('*SUMMARY*');
    //    pl($sum);
    //    pl($sql3);
    //
    //    exit();


    $result3 = mysqli_query( $GLOBALS['conn'] , $sql3 );
    // result upload image
    // ...

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
    header("location: message.php?msg=error");
}
?>
