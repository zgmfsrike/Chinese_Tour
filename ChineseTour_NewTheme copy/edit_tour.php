<?php
include 'db_config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // tour
    $sql = "SELECT * FROM `tour` WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $tour_description = $data['tour_description'];
    $hightlight = $data['highlight'];
    $region = $data['region'];
    $province = $data['province'];
    $price = $data['price'];
    $max_customer = $data['max_customer'];
    $rating = $data['rating'];
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
      $(document).ready(function(){
          // add more image
        $('.add_more_image').click(function(e){
          e.preventDefault();
            var e = document.getElementsByTagName('input');
            var i;
            var s = 0;
            for(i=0; i < e.length; i++) {
                if(e[i].type== "file" && e[i].className=="image" ) {
                    s++;
                }
            }
            if(s < 10){
              s++;
              $(this).before("<input name='image_" + s + "' class='image' type='file' accept='image/*'/><br>");
            }
        });

          // add more tour round
          $('.add_more_tr').click(function(e){
            e.preventDefault();
            $(this).before("<input required name='start_date[]' type='date'/><input required name='end_date[]' type='date'/><br>");
            });
    });
    </script>
</head>
<body>
<div id="wrapper">
<form action="php_edit_tour.php" enctype="multipart/form-data" method="post" name="edit_tour">
<!--  Text : Tour name  -->
    <div id="name" name="tour_name">
        <label>Tour name</label>
        <input required name='tour_name' type='text' value="<?php echo $tour_description; ?>"/>
        <br>
    </div>

<!--  File[] : Image**  -->
    <div id="image">
        <label>Image</label><br>
        <?php
        $sql = "SELECT * FROM `tour_image` WHERE tour_id = $id";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
          $i = 1;
            while($row = mysqli_fetch_array($result)){
                $img_name = $row['img_name'];
                ?>
                <img src="images/tours/<?php echo $img_name;?>" height="200" width="300">
                <input name='image_<?php echo $i ?>' type='file' class='image' accept="image/*"/><br>
                <?php
                $i++;
            }
            // Free result set
            mysqli_free_result($result);
        }
        ?>
        <input type="button" class="add_more_image" value="Add More">
    </div>

<!--  Text : Highlight  -->
  <div id="highlight">
        <label>Highlight</label>
        <input required name='highlight' type='text' value="<?php echo $hightlight; ?>"/>
        <br>
    </div>

<!--  PDF File : Schedule**  -->
  <div id="schedule">
        <label>Schedule</label><br>
        <?php
        $sql = "SELECT * FROM `tour_schedule` WHERE tour_id = $id";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $file_name = $row['file_name'];
            ?>
            <embed src="pdf/tours_schedule/<?php echo $file_name; ?>" type="application/pdf"   height="500px" width="30%"><br>
            <?php
            // Free result set
            mysqli_free_result($result);
        }
         ?>
        <input required name='schedule' type='file' value="" accept="application/pdf"/>
        <br>
    </div>

<!--  Region  -->
    <div id="region">
        <label>Region</label>
        <input required name='region' type='text' value="<?php echo $region; ?>"/>
        <br>
    </div>
<!--  Province  -->
    <div id="province">
        <label>Province</label>
        <input required name='province' type='text' value="<?php echo $province; ?>"/>
        <br>
    </div>
<!--  Price sale  -->
    <div id="price">
        <label>Price sale</label>
        <input required name='price' type='number' value="<?php echo $price; ?>"/>
        <br>
    </div>
<!--  Tour type  -->
    <div id="type">
        <label>Tour type</label>
        <?php
            $sql = "SELECT tour_type.tour_type_id,tour_type.tour_type,ttt.tour_id FROM tour_type LEFT JOIN (SELECT * FROM tour_tour_type WHERE tour_id = $id) AS ttt ON tour_type.tour_type_id = ttt.tour_type_id ORDER BY tour_type.tour_type_id ASC";
            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <input type="checkbox" name="type[]" value="<?php echo $row['tour_type_id'];?>"  <?php echo ($row['tour_id'] != "") ? 'checked':''?>><?php echo $row['tour_type'];?></input>
                    <?php
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else{
//                    echo "No records matching your query were found.";
                }
            } else{
//                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        ?>
        <br>
    </div>
<!--  Vehicel  -->
    <div id="vehicel">
        <label>Vehicel</label>
        <?php
            $sql = "SELECT vehicle_type.vehicle_type_id,vehicle_type.vehicle_type,tvt.tour_id FROM vehicle_type
            LEFT JOIN (SELECT * FROM tour_vehicle_type WHERE tour_id = $id) AS tvt ON vehicle_type.vehicle_type_id = tvt.vehicle_type_id
            ORDER BY vehicle_type.vehicle_type_id ASC";
            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      ?>
                      <input type="checkbox" name="vehicel[]" value="<?php echo $row['vehicle_type_id'];?>"  <?php echo ($row['tour_id'] != "") ? 'checked':''?>><?php echo $row['vehicle_type'];?></input>
                      <?php
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else{
//                    echo "No records matching your query were found.";
                }
            } else{
//                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        ?>
        <br>
    </div>
<!--  Accommodation  -->
    <div id="accommodation">
        <label>Accommodation</label>
        <?php
            $sql = "SELECT * FROM accommodation";
            $sql = "SELECT accommodation.accommodation_id,accommodation.accommodation_level,ta.tour_id FROM accommodation
            LEFT JOIN (SELECT * FROM tour_accommodation WHERE tour_id = $id) AS ta ON accommodation.accommodation_id = ta.accommodation_id
            ORDER BY accommodation.accommodation_id ASC";
            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      ?>
                      <input type="checkbox" name="accommodation[]" value="<?php echo $row['accommodation_id'];?>"  <?php echo ($row['tour_id'] != "") ? 'checked':''?>><?php echo $row['accommodation_level'];?></input>
                      <?php
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else{
//                    echo "No records matching your query were found.";
                }
            } else{
//                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        ?>
        <br>
    </div>
<!--  Max # of customer  -->
       <div id="max">
        <label>Max</label>
        <input required name='max' type='number' value="<?php echo $max_customer; ?>"/>
        <br>
    </div>


<!--  Tour round  -->
    <div id="tour_round">
           <label>Start date</label><label>End date</label><br>
           <?php
           $sql = "SELECT * FROM `tour_round` WHERE tour_id = $id";
           $result = mysqli_query($conn, $sql);
           if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_array($result)){
               $start_date = $row['start_date_time'];
               $end_date = $row['end_date_time'];
               ?>
               <input required name='start_date[]' type='date' value="<?php echo $start_date; ?>"/>
               <input required name='end_date[]' type='date' value="<?php echo $end_date; ?>"/><br>
               <?php
             }
               // Free result set
               mysqli_free_result($result);
           }
            ?>
           <input type="button" class="add_more_tr" value="Add More">
       </div>
    <input type="submit" name="save"/>
</form>
</div>
</body>
</html>
<?php }else{
  echo "No id provide";
} ?>
