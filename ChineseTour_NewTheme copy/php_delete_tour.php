<?php
include 'db_config.php';
include 'module/session.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // tour
    $sql = "SELECT * FROM `tour` WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
        //error no data
        header("location: message.php?msg=tour_not_found");
        return false;
    }
    $data = mysqli_fetch_array($result);
}else{
    header("location: message.php?msg=unknow_request&id=1");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM `tour_image` WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        for($i = 1; $i <= 10; $i++){
            $img = $row['img'.$i];
            if($img != ''){
                $flgDelete = unlink("images/tours/".$img);
                if($flgDelete){
                    echo "File Deleted : " . $img;
                }else{
                    echo "File can not delete : " . $img;
                }
            }
        }
        // Free result set
        mysqli_free_result($result);
    }

    if(file_exists("pdf/tours_schedule/".$id.".pdf")){
        $flgDelete = unlink("pdf/tours_schedule/".$id.".pdf");
        if($flgDelete){
            echo "File Deleted : " . $id;
        }else{
            echo "File can not delete : " . $id;
        }
    }

    $sql = "DELETE FROM tour_image WHERE tour_id = $id";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tour_schedule WHERE tour_id = $id";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tour_round WHERE tour_id = $id";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tour_accommodation WHERE tour_id = $id";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tour_tour_type WHERE tour_id = $id";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tour_vehicle_type WHERE tour_id = $id";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tour WHERE tour_id = $id";
    mysqli_query($conn, $sql);

    header("location: message.php?msg=delete_tour_succ");
}
?>
