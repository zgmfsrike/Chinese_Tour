<?php
include 'db_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>

    <!-- Site Properties -->
    <title>Chiang Mai Hongthai Business and Consultant Enterprise</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <?php
    include 'component/header.php';
    ?>
    <br><br><br><br>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // tour
    $sql = "SELECT * FROM `tour` WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
        
    $tour_name = $data['name'];
    $hightlight = $data['highlight'];
    $region = $data['region'];
    $province = $data['province'];
    $price = $data['price'];
    $max_customer = $data['max_customer'];
    $rating = $data['rating'];
    
    echo 'name : ' . $tour_name .'<br>';
    echo 'hightlight : ' . $hightlight .'<br>';
    echo 'region : ' . $region .'<br>';
    echo 'province : ' . $province .'<br>';
    echo 'max_customer : ' . $max_customer .'<br>';
    echo 'rating : ' . $rating .'<br>';
    
    // images
    $sql = "SELECT * FROM `tour_image` WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $img_name = $row['img_name'];
            echo '<img src="images/tours/'.$img_name.'">';
        }
        // Free result set
        mysqli_free_result($result);
    }
    
    echo '<br><br>';
    
    // schedule
    $sql = "SELECT * FROM `tour_schedule` WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $file_name = $row['file_name'];
        echo '<embed src="pdf/tours_schedule/'.$file_name.'" type="application/pdf"   height="1000px" width="100%" class="responsive">
<a href="pdf/tours_schedule/'.$file_name.'">download</a>';
        // Free result set
        mysqli_free_result($result);
    }

    echo '<br><br>';
    
    // tour type
    $sql = "SELECT * FROM `tour_tour_type` INNER JOIN `tour_type`
ON tour_tour_type.tour_type_id=tour_type.tour_type_id WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo 'Tour type : <ul>';
        while($row = mysqli_fetch_array($result)){
            $type = $row['tour_type'];
            echo '<li>'.$type.'</li>';
        }
        echo '</ul>';
        // Free result set
        mysqli_free_result($result);
    }
    
    echo '<br><br>';
    
    // vehicle
    $sql = "SELECT * FROM `tour_vehicle_type` INNER JOIN `vehicle_type`
ON tour_vehicle_type.vehicle_type_id=vehicle_type.vehicle_type_id WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo 'Tour type : <ul>';
        while($row = mysqli_fetch_array($result)){
            $type = $row['vehicle_type'];
            echo '<li>'.$type.'</li>';
        }
        echo '</ul>';
        // Free result set
        mysqli_free_result($result);
    }
    
    
    
    echo '<br><br>';
    
    // accommodation
    $sql = "SELECT * FROM `tour_accommodation` INNER JOIN `accommodation`
ON tour_accommodation.accommodation_id=accommodation.accommodation_id WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo 'Accommodation : <ul>';
        while($row = mysqli_fetch_array($result)){
            $acc = $row['accommodation_level'];
            echo '<li>'.$acc.'</li>';
        }
        echo '</ul>';
        // Free result set
        mysqli_free_result($result);
    }
    
    
    
    echo '<br><br>';
    
    // tour round
    $sql = "SELECT * FROM `tour_round` WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo 'Tour round : <ul>';
        while($row = mysqli_fetch_array($result)){
            $start = $row['start_date_time'];
            echo '<div>Start date : '.$start.'</div>';
            $end = $row['end_date_time'];
            echo '<div>End date : '.$end.'</div>';
        }
        echo '</ul>';
        // Free result set
        mysqli_free_result($result);
    }
}
    ?>
    
    <?php
    include 'component/footer.php';
    ?>
</body>
</html>
    